function openModal() {
    document.getElementById("modal").style.display = "block";
}

function closeModal() {
    document.getElementById("modal").style.display = "none";
}

function validasi() {
    let nama = document.getElementById("nama").value;
    let kategori = document.getElementById("kategori").value;
    let harga = document.getElementById("harga").value;
    let stok = document.getElementById("stok").value;

    if (nama === "" || kategori === "" || harga === "" || stok === "") {
        alert("Semua data wajib diisi!");
        return false;
    }

    if (harga <= 0 || stok < 0) {
        alert("Harga atau stok tidak valid!");
        return false;
    }

    return true;
}
