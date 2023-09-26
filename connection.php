<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthscope";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
mysqli_select_db($conn, $dbname);

?>