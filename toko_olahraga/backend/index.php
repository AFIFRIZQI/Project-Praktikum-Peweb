<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if (!$conn) {
    die("Koneksi database gagal!");
}

$data = mysqli_query($conn, "SELECT * FROM produk_olahraga");

if (!$data) {
    die("Query gagal: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Produk Olahraga</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script src="script.js"></script>
<div class="container">
    <div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Tambah Produk Olahraga</h2>

        <form method="post" action="tambah.php" onsubmit="return validasi()">
            <label>Nama Produk</label>
            <input type="text" id="nama" name="nama">

            <label>Kategori</label>
            <input type="text" id="kategori" name="kategori">

            <label>Harga</label>
            <input type="number" id="harga" name="harga">

            <label>Stok</label>
            <input type="number" id="stok" name="stok">

            <button type="submit" name="simpan">Simpan</button>
        </form>
    </div>
</div>

    <h1>Data Produk Olahraga</h1>

    <button class="btn btn-add" onclick="openModal()">+ Tambah Produk</button>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; while($d = mysqli_fetch_assoc($data)){ ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['nama_produk'] ?></td>
                <td><?= $d['kategori'] ?></td>
                <td>Rp <?= number_format($d['harga']) ?></td>
                <td><?= $d['stok'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-edit">Edit</a>
                    <a href="hapus.php?id=<?= $d['id'] ?>" 
                       class="btn btn-delete"
                       onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
