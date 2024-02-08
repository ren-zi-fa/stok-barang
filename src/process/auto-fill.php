<?php
$con = mysqli_connect("localhost","renzi","renzi","stokbarang");
if(!$con){
    die(" database gagal terkoneksi");
}
$kodeBarang = $_GET['kodeBarang'];
$query = mysqli_query( $con," SELECT * FROM tbl_stok WHERE kode_barang = '$kodeBarang'");
$data = mysqli_fetch_array($query);

// $barang = array (
//     'kodeBarang'=>$data['kode_barang'],
//     'namaBarang'
// );

echo json_encode($data);


?>
