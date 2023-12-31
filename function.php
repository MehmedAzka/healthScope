<?php
require "connection.php";
session_start();

// REGISTER
if (isset($_POST['regis-user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $date = date('Y-m-d H:i:s');

    // Pengecekan konfirmasi kata sandi
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($password !== $confirmPassword) {
        $_SESSION['error'] = "Confirm password does not match";
        header("location: register.php");
        exit();
    } else {
        $split = explode('.', $_FILES['photo']['name']);
        $extention = $split[count($split) - 1];

        $photo = $username . '.' . $extention;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $role = $_POST['role'];

        $dir = "user_pp/";
        $tmpFile = $_FILES['photo']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $photo);

        $sqlTake = $conn->query("SELECT * FROM user WHERE email='$email' OR username='$username'");

        if (mysqli_num_rows($sqlTake) > 0) {
            $_SESSION['error'] = "Username or email has been registered";
            header("location: register.php");
            exit();
        } else {
            $sql = "INSERT INTO user (username, email, pass, photo, role, created_date) VALUES ('$username', '$email', '$passwordHash', '$photo', '$role', '$date')";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['error'] = "You have registered";
                header("location: index.php");
                exit();
            } else {
                $_SESSION['error'] = "Terjadi kesalahan. Silakan coba lagi!";
                header("location: register.php");
                exit();
            }
        }
    }
}

// LOGIN
if (isset($_POST['login-user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = $conn->query("SELECT * FROM user WHERE username = '$username'");


    if (mysqli_num_rows($sql) == 1) {
        $row = mysqli_fetch_assoc($sql);
        if (password_verify($password, $row['pass'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['photo'] = $row['photo'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['created_date'] = $row['created_date'];

            if ($_SESSION['role'] == 'user') {
                header("location: home.php");
                exit();
            } elseif ($_SESSION['role'] == 'admin') {
                header("location: home.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Wrong username or password";
            header("location: index.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Not found username";
        header("location: index.php");
        exit();
    }
}

// READ DATA #DISCUSSION
$select = function ($tabel, $order) use ($conn) {
    $data = $conn->query("SELECT * FROM $tabel ORDER BY $order DESC LIMIT 13");
    return $data;
};


// ADD DATA
$insert = function ($tabel, $data) use ($conn) {
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $query = "INSERT INTO $tabel ($columns) VALUES ($values)";
    $result = $conn->query($query);
    return $result;
};

// DELETE DATA 
$delete = function ($tabel, $id) use ($conn) {
    $query = "DELETE FROM $tabel WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
};

// FUNGSI AMBIL 1 DATA
$find = function ($tabel, $id) use ($conn) {
    $query = "SELECT * FROM $tabel WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id); // "i" adalah tipe data integer, sesuaikan jika tipe data berbeda
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
};

// DELETE DATA HAVE IMAGE
$deleteImage = function ($tabel, $id, $imageField, $imageDir) use ($conn) {
    $query = "SELECT $imageField FROM $tabel WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($image);
    $stmt->fetch();
    $stmt->close();

    if (!empty($image) && file_exists($imageDir . $image)) {
        unlink($imageDir . $image);
    }

    $query = "DELETE FROM $tabel WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
};

// EDIT PROFILE PARAMS
$update = function ($tabel, $data, $id) use ($conn) {
    $update_values = '';
    foreach ($data as $key => $value) {
        $update_values .= "$key='$value', ";
    }
    $update_values = rtrim($update_values, ', '); // Menghapus koma terakhir dan spasi

    $query = "UPDATE $tabel SET $update_values WHERE id=$id";
    $result = $conn->query($query);
    return $result;
};

// EDIT PROFILE FUNCTION
if (isset($_POST['edit-profile'])) {
    $id = $_POST['id'];
    $data = [];

    if (!empty($_POST['username'])) {
        $data['username'] = $_POST['username'];
    }

    if (!empty($_POST['photo'])) {
        $data['photo'] = $_POST['photo'];
    }

    if (!empty($_POST['email'])) {
        $data['email'] = $_POST['email'];
    }

    if (!empty($_POST['pass'])) {
        $passwordHash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $data['pass'] = $passwordHash;
    }

    // Memeriksa apakah ada data yang akan diupdate
    if (!empty($data)) {
        $data['created_date'] = date('Y-m-d H:i:s');
        $tabel = "user";

        $result = $update($tabel, $data, $id);

        if ($result) {
            header("location: profile.php");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Tidak ada data yang diisi untuk diperbarui.";
    }
}

// COMMENT ADD
if (isset($_POST['dp-submit'])) {
    $des = $_GET['forum'];

    $name = $_SESSION['id'];
    $comment = htmlspecialchars($_POST['dp-input']);
    $commented = $des;
    $date = date('Y-m-d H:i:s');

    $data_to_insert = array(
        'username' => $name,
        'comment' => $comment,
        'commented' => $commented,
        'created_date' => $date
    );

    $insert_result = $insert('comment', $data_to_insert);

    if ($insert_result) {
        header("location: discussion_page.php?forum=" . $des);
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
}

// DELETE COMMENT
if (isset($_POST['delete-c-content'])) {
    $des = $_POST['forum'];

    $id_to_delete = $_POST['c-id'];

    if (!empty($id_to_delete)) {
        $delete_result = $delete('comment', $id_to_delete);

        if ($delete_result) {
            header("location: discussion_page.php?forum=" . $des);
        } else {
            echo "Terjadi kesalahan saat menghapus data.";
        }
    }
}

// FUNCTION TO ADD DISCUSSION DATA
if (isset($_POST['diss-submit'])) {
    $diss = htmlspecialchars($_POST['diss']);
    $created_by = $_SESSION['id'];
    $date = date('Y-m-d H:i:s');

    $data_to_insert = array(
        'title' => $diss,
        'created_by' => $created_by,
        'created_date' => $date,
    );

    $insert_result = $insert('discussion', $data_to_insert);

    if ($insert_result) {
        header("location: discussion.php");
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
}


// DISCUSSION
if (isset($_POST['delete-submit'])) {
    $id_to_delete = $_POST['id_to_delete'];

    if (!empty($id_to_delete)) {
        $delete_result = $delete('discussion', $id_to_delete);

        if ($delete_result) {
            header("location: discussion.php");
        } else {
            echo "Terjadi kesalahan saat menghapus data.";
        }
    }
}


// ADD DATA HEALTH
if (isset($_POST['health-submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $subtitle = htmlspecialchars($_POST['subtitle']);
    $created_by = $_SESSION['id'];
    $date = date('Y-m-d H:i:s');

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $split = explode('.', $_FILES['image']['name']);
        $extention = $split[count($split) - 1];
        $upload_file = uniqid() . '.' . $extention;

        $dir = "health_image/";
        $tmpFile = $_FILES['image']['tmp_name'];

        if (move_uploaded_file($tmpFile, $dir . $upload_file)) {
            $data_to_insert = array(
                'title' => $title,
                'subtitle' => $subtitle,
                'image' => $upload_file,
                'created_by' => $created_by,
                'created_date' => $date
            );

            $insert_result = $insert('h_topic', $data_to_insert);

            if ($insert_result) {
                header("location: health.php");
            } else {
                echo "Terjadi kesalahan saat menyimpan data.";
            }
        } else {
            echo "Gagal mengunggah file gambar.";
        }
    } else {
        echo "Gagal mengunggah file gambar.";
    }
}

// DELETE HEALTH CONTENT
if (isset($_POST['delete-h-content'])) {
    $id_to_delete = $_POST['h_content_id'];

    $delete_result = $deleteImage('h_topic', $id_to_delete, 'image', 'health_image/');

    if ($delete_result) {
        header("location: health.php");
    } else {
        echo "Terjadi kesalahan saat menghapus data.";
    }
}
?>