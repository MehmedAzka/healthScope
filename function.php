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
    $stmt->bind_param("i", $id); // "i" mengindikasikan tipe data integer
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
?>