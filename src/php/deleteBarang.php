<?php
include_once '../config/koneksi.php';

$koneksi = koneksi();

$kodeBarang = $_GET['kodeBarang'];
$query = "DELETE FROM tbl_barang WHERE kodeBarang = '$kodeBarang'";

$hapus = mysqli_query($koneksi,$query);

if ($hapus) {
    echo "<script>
        alert('Data berhasil dihapus');
        window.location.href = '../pages/laporanBarang.php';
        </script>";
} else {
    echo "<script>
    alert('Data gagal dihapus');
    window.location.href = '../pages/laporanBarang.php';
    </script>";
}




?>