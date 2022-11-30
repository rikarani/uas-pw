<?php
require "fungsi.php";

$id = $_GET["id"];

if (hapusHotel($id) > 0) {
  echo "<script>
          alert('Berhasil Menghapus Hotel');
          window.location.href = '../../public/admin/hotel_list.php';
        </script>";
}
