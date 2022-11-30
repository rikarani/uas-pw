<?php
require "fungsi.php";

$id = $_GET["id"];

if (hapusUser($id) > 0) {
  echo "<script>
          alert('Berhasil Menghapus User');
          window.location.href = '../../public/admin/user_list.php';
        </script>";
}
