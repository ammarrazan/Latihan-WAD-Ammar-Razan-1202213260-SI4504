<?php 

require 'functions.php';

$barangs = query("SELECT * FROM barang");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN</title>
    <style>
        img {
            width: 128px;
            height: 128px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Daftar Barang Toko ABC</h1>

    <a href="tambah.php">Tambah Data Barang</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Harga Barang</th>
            <th>Stok Barang</th>
        </tr>

        <?php $i = 1 ?>
        <?php foreach ($barangs as $barang) : ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <a href="ubah.php?id=<?= $barang["kode"] ?>">Ubah</a>
                <a href="hapus.php?id=<?= $barang["kode"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</a>
            </td>
            <td>
                <img src="../img/<?= $barang["gambar"] ?>" alt="">
            </td>
            <td><?= $barang["nama"] ?></td>
            <td><?= $barang["kode"] ?></td>
            <td><?= $barang["harga"] ?></td>
            <td><?= $barang["stok"] ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach ?>

    </table>
    
</body>
</html>