<?php 
// mengaktifkan session php
if(!isset($_SESSION)){
    session_start();
}

// menghapus semua session
session_destroy();

// mengalihkan halaman ke halaman index
header("location:index.php");
?>