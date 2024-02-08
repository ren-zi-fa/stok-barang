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
    <script src="../js/jquery.js"></script>
    <title>inputStok</title>
</head>

<body>

    <?php
    include './sidebar.php'
    ?>

    <div class="p-4 sm:ml-64 ">
        <div class="max-w-md  mt-3 mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
            <!-- simpan data -->
            <div class="" id="alert-fill"></div>
            <form method="post" id="form-simpan" action="../process/tambah.php">
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-buttons type="text" id="tanggal" name="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" autocomplete="off">
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tr>
                        <td class="px-6 py-4"><label for="nama-barang" class="block mb-2 px-4  text-sm font-medium text-gray-900 dark:text-white">Nama Barang </label>
                        </td>
                        <td class="px-6 py-4"><input type="text" id="namabarang" name="namaBarang" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4"> <label for="kode-barang" class="block mb-2 px-4  text-sm font-medium text-gray-900 dark:text-white">Kode Barang </label></td>
                        <td class="px-6 py-4"><input type="text" name="kodeBarang" id="kode-barang" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <label for="stok-awal" class="block mb-2 px-4  text-sm font-medium text-gray-900 dark:text-white">Stok Awal</label>
                        </td>
                        <td class="px-6 py-4">
                            <input type="number" name="stokAwal" id="stok-awal" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4"><label for="masuk" class="block mb-2 px-4  text-sm font-medium text-gray-900 dark:text-white">Masuk </label></td>
                        <td class="px-6 py-4">
                            <input type="number" id="masuk" name="masuk" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4"><label for="keluar" class="block mb-2 px-4  text-sm font-medium text-gray-900 dark:text-white">Keluar </label></td>
                        <td class="px-6 py-4"> <input type="number" name="keluar" id="keluar" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4"> <label for="stok-akhir" class="block mb-2 px-4  text-sm font-medium text-gray-900 dark:text-white">Stok Akhir</label></td>
                        <td class="px-6 py-4">
                            <input type="number" id="stok-akhir" name="stokAkhir" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> <button type="submit" class="ms-6 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-10 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" name="simpan" id="submitButton">Submit</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script>
        $('#masuk, #keluar, #stok-awal').on('change keyup', function() {
            var masuk = parseInt($('#masuk').val())
            var stokAwal = parseInt($('#stok-awal').val()) 
            var keluar = parseInt($('#keluar').val()) 

            var hasil = stokAwal + masuk - keluar;

            $('#stok-akhir').val(hasil);
        });
    </script>

    <script src="../../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="../../node_modules/flowbite/dist/datepicker.js"></script>
</body>

</html>