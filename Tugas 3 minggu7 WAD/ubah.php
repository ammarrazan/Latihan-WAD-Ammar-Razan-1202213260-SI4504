<?php 

require 'functions.php';

$kode = $_GET["id"];
$barang = query("SELECT * FROM barang WHERE kode = '$kode'")[0];

if(isset($_POST["ubah"])) {
    if(ubah($_POST) > 0) {
        echo "
            <script>
            alert('Data berhasil diubah!');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Data gagal diubah!');
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

    <form action="" method="post">
        <ul>
            <li>
                <label for="kodebarang">Kode Barang : </label>
                <input type="text" name="kodebarang" id="kodebarang" value="<?= $barang["kode"] ?>" required>
            </li>
            <li>
                <label for="namabarang">Nama Barang : </label>
                <input type="text" name="namabarang" id="namabarang" value="<?= $barang["nama"] ?>" required>
            </li>
            <li>
                <label for="hargajual">Harga Barang : </label>
                <input type="text" name="hargajual" id="hargajual" value="<?= $barang["harga"] ?>" required>
            </li>
            <li>
                <label for="stokbarang">Stok Barang : </label>
                <input type="text" name="stokbarang" id="stokbarang" value="<?= $barang["stok"] ?>" required>
            </li>
            <li>
                <label for="gambarbarang">Gambar Barang : </label>
                <input type="text" name="gambarbarang" id="gambarbarang" value="<?= $barang["gambar"] ?>" required>
            </li>
            <li>
                <button type="submit" name="ubah">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>