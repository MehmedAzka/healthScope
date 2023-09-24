<?php
require "connection.php";


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


// FUNCTION TO ADD DISCUSSION DATA
if (isset($_POST['diss-submit'])) {
    $diss = htmlspecialchars($_POST['diss']);
    $created_by = 1;
    $date = date('Y-m-d');

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

// DELETE DATA #DISCUSSION
$delete = function ($tabel, $id) use ($conn) {
    $query = "DELETE FROM $tabel WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
};

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

// FUNGSI AMBIL 1 DATA
$find = function ($tabel, $id) use ($conn) {
    $data = $conn->query("SELECT * FROM $tabel WHERE id=$id");
    return $data;
};

// ADD DATA HEALTH
if (isset($_POST['health-submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $subtitle = htmlspecialchars($_POST['subtitle']);
    $created_by = 1;
    $date = date('Y-m-d');

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $split = explode('.', $_FILES['image']['name']);
        $extention = $split[count($split) - 1];
        $upload_file = $title . '.' . $extention;

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

// DELETE DATA HAVE IMAGE
$delete = function ($tabel, $id, $imageField, $imageDir) use ($conn) {
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

if (isset($_POST['delete-h-content'])) {
    $id_to_delete = $_POST['h_content_id'];

    $delete_result = $delete('h_topic', $id_to_delete, 'image', 'health_image/');

    if ($delete_result) {
        header("location: health.php");
    } else {
        echo "Terjadi kesalahan saat menghapus data.";
    }
}
?>