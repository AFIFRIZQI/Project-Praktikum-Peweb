<?php
$conn = mysqli_connect("localhost", "root", "", "toko_olahraga");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
