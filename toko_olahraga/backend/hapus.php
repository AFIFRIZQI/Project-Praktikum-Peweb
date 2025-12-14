<?php
include 'koneksi.php';
mysqli_query($conn, "DELETE FROM produk_olahraga WHERE id='$_GET[id]'");
header("location:index.php");
?>
