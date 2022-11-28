<?php
session_start();

// Copot Session
// $_SESSION = [];
session_unset();
session_destroy();

// Pindahkan ke Halaman Login
header("Location: public/login.php");
