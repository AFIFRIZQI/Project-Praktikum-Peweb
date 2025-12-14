<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM produk_olahraga WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Edit Produk Olahraga</h1>

    <form method="post" onsubmit="return validasiEdit()">
        <label>Nama Produk</label>
        <input type="text" id="nama" name="nama" value="<?= $d['nama_produk'] ?>">

        <label>Kategori</label>
        <input type="text" id="kategori" name="kategori" value="<?= $d['kategori'] ?>">

        <label>Harga</label>
        <input type="number" id="harga" name="harga" value="<?= $d['harga'] ?>">

        <label>Stok</label>
        <input type="number" id="stok" name="stok" value="<?= $d['stok'] ?>">

        <button type="submit" name="update">Update Produk</button>
        <a href="index.php" class="btn btn-delete" style="display:block;text-align:center;margin-top:10px;">
            Batal
        </a>
    </form>
</div>

<script>
function validasiEdit() {
    let nama = document.getElementById("nama").value;
    let kategori = document.getElementById("kategori").value;
    let harga = document.getElementById("harga").value;
    let stok = document.getElementById("stok").value;

    if (!nama || !kategori || !harga || !stok) {
        alert("⚠️ Semua data wajib diisi!");
        return false;
    }

    if (harga <= 0 || stok < 0) {
        alert("❌ Harga atau stok tidak valid!");
        return false;
    }

    return confirm("Yakin ingin mengupdate produk ini?");
}
</script>

</body>
</html>

<?php
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE produk_olahraga SET
        nama_produk='$_POST[nama]',
        kategori='$_POST[kategori]',
        harga='$_POST[harga]',
        stok='$_POST[stok]'
        WHERE id='$id'");

    header("Location: index.php");
}
?>
