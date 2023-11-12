<?php 

require 'functions.php';

if(isset($_POST["tambah"])) {
    if(tambah($_POST) > 0) {
        echo "
            <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN</title>
</head>
<body>
    <h1>Tambah Data Barang</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="kodebarang">Kode Barang : </label>
                <input type="text" name="kodebarang" id="kodebarang" required>
            </li>
            <li>
                <label for="namabarang">Nama Barang : </label>
                <input type="text" name="namabarang" id="namabarang" required>
            </li>
            <li>
                <label for="hargajual">Harga Barang : </label>
                <input type="text" name="hargajual" id="hargajual" required>
            </li>
            <li>
                <label for="stokbarang">Stok Barang : </label>
                <input type="text" name="stokbarang" id="stokbarang" required>
            </li>
            <li>
                <label for="gambarbarang">Gambar Barang : </label>
                <input type="file" id="gambarbarang" name="gambarbarang" required>
            </li>
            <li>
                <button type="submit" name="tambah">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>