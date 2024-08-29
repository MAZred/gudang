<?php

include("config.php");

if( isset($_GET['id_barang']) ){

    // ambil id dari query string
    $id = $_GET['id_barang'];

    // buat query hapus
    $sql = "DELETE FROM table_barang WHERE id_barang=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: table-barang.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>