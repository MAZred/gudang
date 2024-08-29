<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "data_barang";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

// table barang
if(isset($_POST['tambah-barang'])){

    // ambil data dari formulir
    $supplier = $_POST['supplierB'];
    $nama_barang = $_POST['namaB'];
    $jenis_barang = $_POST['jenisbarang'];
    $satuan = $_POST['satuanbarang'];
    $rak = $_POST['rakbarang'];
    $stok = $_POST['stokbarang'];
    

    // buat query
    $sql = "INSERT INTO table_barang (supplier, nama_barang, jenis_barang, satuan, gudang, stok) VALUE ('$supplier', '$nama_barang', '$jenis_barang', '$satuan', '$rak', '$stok')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: table-barang.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: table-barang.php?status=gagal');
    }
}    

// table pengajuan
if(isset($_POST['pengajuan'])){

    // ambil data dari formulir
    $id_user = $_POST['ID_User'];
    $nama_barang = $_POST['Nama_Barang'];
    $id_barang = $_POST['ID_Barang'];
    $stok = $_POST['Jumlah'];


    // buat query
    $sql = "INSERT INTO table_pengajuan (id_user, nama_barang, id_barang,stok) VALUE ('$id_user', '$nama_barang', '$id_barang', '$stok')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: table-pengajuan.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: table-pengajuan.php?status=gagal');
    }
}    


?>