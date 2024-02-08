<?php
include_once '../config/koneksi.php';

$koneksi = koneksi();

$kode_barang = $_GET['kode_barang'];
$query = "DELETE FROM tbl_stok WHERE kode_barang = '$kode_barang'";

$hapus = mysqli_query($koneksi,$query);

if ($hapus) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location.href = '../pages/laporan.php';
        </script>";
} else {
    echo "<script>
    alert('Data gagal dihapus');
    window.location.href = '../pages/laporan.php';
    </script>";
}




?>