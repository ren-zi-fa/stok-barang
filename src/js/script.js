// function validate(form) {
//   var inputTag = form.find("input");
//   for (var i = 0; i < inputTag.length; i++) {
//     if (inputTag[i].value == "" || inputTag[i].value == null) {
//       return false;
//     }
//   }
//   return true;
// };
// // ambil data dari input
// $(document).ready(function () {
//   $("#form-simpan").on("click", function (e) {
//     e.preventDefault();
//     var form = $("#form-simpan");
//     var data = $("#form-simpan").serialize();
//     if (validate(form)) {
//       createData(data);
//     } else {
//       var alert = $("#alert-fill");
//       alert.addClass("alertp-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400");
//       alert.html("Please fill all form!");
//     }
//   });
// });

// simpan
// function createData(data) {
//   $.ajax({
//     url: "process/tambah.php",
//     type: "POST",
//     data: data,
//     success: function (response) {
//       response = JSON.parse(response);
//       alert(response)
//       if (response.status == "success") {
//         alert("data berhasil disimpan",response.message);
//       } else {
//         alert("data gagal disimpan",response.message);
       
//       }
//     },
//   });
// }


