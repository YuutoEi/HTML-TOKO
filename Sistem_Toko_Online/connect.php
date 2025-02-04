<?php
session_start();

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'user';

$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (mysqli_connect_errno()) {
    echo '<b>Koneksi database gagal :</b> ' . mysqli_connect_error();
    exit;
}

?>