<?php
session_start();
include "koneksi.php";

$user_check = $_SESSION['login_user'];
$sql = "SELECT * FROM tb_user where username='$user_check'";
$ses = mysqli_query($koneksi_db, $sql);
$row = mysqli_fetch_assoc($ses);
$login_session = $row['nama'];

if (!isset($_SESSION['login_user'])) {
   header('location: index.php');
}

?>