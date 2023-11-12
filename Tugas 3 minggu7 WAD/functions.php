<?php 

$conn = mysqli_connect("localhost", "root", "", "tokoabc");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }

    return $rows;
}

function tambah($data) {
    global $conn;

    $kodebarang = $data["kodebarang"];
    $namabarang = $data["namabarang"];
    $hargajual = $data["hargajual"];
    $stokbarang = $data["stokbarang"];

    $gambarbarang = upload();
    if(!$gambarbarang) {
        return false;
    } 

    $query = "INSERT INTO barang VALUES ('$kodebarang', '$namabarang', '$hargajual', '$stokbarang', '$gambarbarang')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambarbarang']['name'];
    $ukuranFile = $_FILES['gambarbarang']['size'];
    $error = $_FILES['gambarbarang']['error'];
    $tmpName = $_FILES['gambarbarang']['tmp_name'];

    if($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('File harus berupa gambar');
        </script>";
        return false;
    }

    if($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    move_uploaded_file($tmpName, 'img/'.$namaFile);
    return $namaFile;
}

function hapus($kode) {
    global $conn;
    
    $query = "DELETE FROM barang WHERE kode = '$kode'";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $kodebarang = $data["kodebarang"];
    $namabarang = $data["namabarang"];
    $hargajual = $data["hargajual"];
    $stokbarang = $data["stokbarang"];
    $gambarbarang = $data["gambarbarang"];

    $query = "UPDATE barang SET kode = '$kodebarang', nama = '$namabarang', harga = '$hargajual', stok = '$stokbarang', gambar = '$gambarbarang' WHERE kode = '$kodebarang'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>