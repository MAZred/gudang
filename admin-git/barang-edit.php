<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){
    
    // ambil data dari formulir
    $id_barang = $_POST['id_barang'];
    $supplier = $_POST['editSupplier'];
    $nama_barang = $_POST['editNama'];
    $jenis_barang = $_POST['editJenis'];
    $satuan = $_POST['editSatuan'];
    $rak = $_POST['editRak'];
    $stok = $_POST['editStok'];

    // buat query update
    $sql = "UPDATE table_barang SET supplier='$supplier', nama_barang='$nama_barang', jenis_barang='$jenis_barang', satuan='$satuan', gudang='$rak', stok='$stok' WHERE id_barang='$id_barang'";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        //kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: table-barang.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>