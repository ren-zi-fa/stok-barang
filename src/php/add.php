<?php

error_reporting(0);
include_once '../config/koneksi.php';

function tambahData($post){
    $con = koneksi();


    $tanggal = $post['tanggal'];
    $namaBarang = $post['namaBarang'];
    $kodeBarang = $post['kodeBarang'];
    $stokAwal = $post['stokAwal'];
    $masuk = $post['masuk'];
    $keluar = $post['keluar'];
    $stokAkhir = $post['stokAkhir'];
 

    $query = "INSERT INTO tbl_stok (`kode_barang`, `namaBarang`, `stokAwal`, `masuk`, `keluar`, `stokAKhir`, `tanggal`) Values ('$kodeBarang', '$namaBarang', '$stokAwal', '$masuk', '$keluar', '$stokAkhir', '$tanggal')";

    $result = mysqli_query($con, $query);
    if($result){
        echo "<script>alert('data berhasil ditambah');
        window.location.href = '../pages/inputDataBarang.php';</script>";
        
    } else {
        echo "<script>alert('data gagal ditambah');
        window.location.href = '../pages/inputDataBarang.php';</script>
        ";
    }
}



function tambahDataPenjualan($post){
    $con = koneksi();

    $kodeBarang = $post['kodeBarang'];
    $hargaAwal = $post['hargaAwal'];
    $hargaJual = $post['hargaJual'];
    $keuntungan = $post['keuntungan'];
    
    $query = "INSERT INTO tbl_barang (`kodeBarang`, `harga_awal`, `harga_jual`, `keuntungan`) Values ('$kodeBarang', '$hargaAwal', '$hargaJual', '$keuntungan')";

    $result = mysqli_query($con, $query);
    if($result){
        echo "<script>alert('data berhasil ditambah');
        window.location.href = '../pages/inputPenjualan.php';</script>";
        
    } else {
        echo "<script>alert('data gagal ditambah');
        window.location.href = '../pages/inputPenjualan.php';</script>
        ";
    }
}

?>

