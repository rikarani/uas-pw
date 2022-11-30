<?php
require "fungsi.php";

$id = $_GET["id"];

if (hapusUser($id) > 0) {
  echo "<script>
          alert('Berhasil Menghapus User');
          window.location.href = 'user_list.php';
        </script>";
}
