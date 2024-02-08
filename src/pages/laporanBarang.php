<?php
session_start();

if ($_SESSION['username'] == '') {
    echo "<script>
			window.location.href='./pages/form_login.php'
		  </script>";
    exit;
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/output.css" rel="stylesheet">

    <title>laporanBarang</title>
</head>

<body>
<?php
    include './sidebar.php'
 ?>

    <div class="p-4 sm:ml-64 ">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-red-600   dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Kode Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah stok
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keuntungan per barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                         Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require '../config/koneksi.php';
                    $con = koneksi();
                    $query = "SELECT tbl_barang.id,
                                    tbl_barang.kodeBarang, 
                                    tbl_barang.harga_awal,
                                    tbl_barang.harga_jual,
                                    tbl_barang.keuntungan,
                                    tbl_stok.namaBarang,
                                    tbl_stok.stokAwal,
                                    tbl_stok.masuk,
                                    tbl_stok.stokAkhir
                                FROM  tbl_barang
                                  INNER JOIN tbl_stok ON tbl_barang.kodeBarang = tbl_stok.kode_barang";
                   
                    $result = mysqli_query($con, $query);
                  
                    while ($show = mysqli_fetch_array($result)) { 
                      ?> 
                       <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $show['kodeBarang']; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $show['namaBarang']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $show['harga_awal']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $show['stokAkhir']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $show['keuntungan']; ?>
                            </td>
                            <td class="px-6 py-4 ">
                                <a href="editBarang.php?kodeBarang=<?php echo $show['kodeBarang']?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>|
                                <a href="../php/deleteBarang.php?kodeBarang=<?php echo $show['kodeBarang']?>"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                            </td>
                        </tr>           
                        
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>


    <script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="../../node_modules/flowbite/dist/datepicker.js"></script>
</body>

</html>
