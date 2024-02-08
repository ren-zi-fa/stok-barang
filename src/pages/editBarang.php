<?php

include_once '../config/koneksi.php';
$con = koneksi();

$kodeBarang = $_GET['kodeBarang'];

$query =mysqli_query($con,"SELECT * FROM tbl_barang WHERE kodeBarang ='$kodeBarang'") ;
$tampil = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $con = koneksi();
   
    $harga_jual = $_POST['hargaJual'];
    $kodeBarang = $_POST['kodeBarang'];
    $harga_awal = $_POST['hargaAwal'];
    $keuntungan = $_POST['keuntungan'];
    
        $query = "UPDATE tbl_barang
                  SET kodeBarang = '$kodeBarang',
                  harga_jual = '$harga_jual',
                  harga_awal = '$harga_awal',
                  keuntungan = '$keuntungan'
                  WHERE kodeBarang = '$kodeBarang'";
    
        $update = mysqli_query($con, $query);
    
        if ($update) {
            echo "<script>
                alert('Data berhasil diupdate');
                window.location.href = '../pages/laporanBarang.php';
                </script>";
        } else {
            echo "<script>
            alert('Data gagal diupdate');
            window.location.href = '../pages/laporanBarang.php';
            </script>";
        }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/output.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <title>edit</title>
</head>

<body>

    <?php
    include './sidebar.php'
    ?>
    <div class="p-4 sm:ml-64 ">

        <div class="max-w-md  mt-10 mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
            <!-- simpan data -->
            <span class="text-sm text-red-600">* masukkan kode barang yg sudah ada jika nama barang tidak muncul berarti kode nya salah, dan tidak bisa menginputkan kode-barang yg sama 2 kali</span>
            <div class="text-center block mb-10 font-bold underline tracking-wide text-lg">Edit Data Penjualan </div>
            <form method="post" >
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-10">
                    <tr>
                        <td class="px-6 py-4"> <label for="kode-barang" class="block mb-2 px-4  text-sm font-medium text-gray-900 dark:text-white">Kode Barang </label></td>
                        <td class="px-6 py-4"><input type="text" name="kodeBarang" id="kodeBarang" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onkeyup="autofill()" value="<?php echo $tampil['kodeBarang'];?>" readonly></td>
                    </tr>
                   

                    <tr>
                        <td class="px-6 py-4"><label for="harga-jual" class="block mb-2 px-4  text-sm font-medium text-gray-900 dark:text-white">Harga jual </label></td>
                        <td class="px-6 py-4">
                            <input type="number" id="harga-jual" name="hargaJual" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $tampil['harga_jual'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <label for="harga-awal" class="block mb-2 px-4  text-sm font-medium text-gray-900 dark:text-white">Harga awal</label>
                        </td>
                        <td class="px-6 py-4">
                            <input type="number" name="hargaAwal" id="harga-awal" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $tampil['harga_awal'];?>">
                        </td>
                    </tr>

                    <tr>
                        <td class="px-6 py-4"><label for="keuntungan" class="block mb-2 px-4  text-sm font-medium text-gray-900 dark:text-white">Keuntungan</label></td>
                        <td class="px-6 py-4"> <input type="number" name="keuntungan" id="keuntungan" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $tampil['keuntungan'];?>"> </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td> <button type="submit" class="ms-6 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-10 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" name="update" id="submitButton">Edit</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


    <script>
        function autofill() {
            var kodeBarang = $("#kodeBarang").val();
            $.ajax({
                url: '../process/auto-fill.php?kodeBarang=' + kodeBarang,
                data: kodeBarang,
                success: function(dataBarang) {
                    var json = dataBarang,
                        obj = JSON.parse(json)
                    $('#namabarang').val(obj.namaBarang);
                }

            })
        }
        $('#harga-awal, #harga-jual').on('change keyup', function() {
            var hargaAwal = parseInt($("#harga-awal").val());
            var hargaJual = parseInt($("#harga-jual").val());

            var keuntungan = hargaJual - hargaAwal;
            $('#keuntungan').attr('value', keuntungan);
        })
    </script>
    <script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="../../node_modules/flowbite/dist/datepicker.js"></script>
</body>

</html>