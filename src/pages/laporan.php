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

    <title>laporan</title>
</head>

<body>
<?php
    include './sidebar.php'
 ?>

    <div class="p-4 sm:ml-64 ">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-blue-500   dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Kode Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Input
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Barang
                        </th>
                        <th scope="col" class="px-6 py-3">
                         Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../config/koneksi.php';
                    $con = koneksi();
                    $query = "SELECT * FROM tbl_stok";
                    $result = mysqli_query($con, $query);

                    while ($show = mysqli_fetch_array($result)) { ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $show['kode_barang']; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $show['namaBarang']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $show['tanggal']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $show['stokAkhir']; ?>
                            </td>
                            <td class="px-6 py-4 ">
                                <a href="edit.php?kode_barang=<?php echo $show['kode_barang']?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>|
                                <a href="../php/delete.php?kode_barang=<?php echo $show['kode_barang']?>"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
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