<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "pbl";

// Buat koneksi
$db = new mysqli($server, $username, $password, $database);

// Periksa koneksi
if ($db->connect_error) {
    die("Koneksi Gagal: " . $db->connect_error);
}
?>
