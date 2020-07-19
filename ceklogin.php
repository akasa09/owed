<?php
session_start();
include('koneksi.php');
$username = $_POST['username'];
$password = $_POST['password'];
$error = '';
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT * FROM tb_user WHERE username='$username' and password='$password'";
$result = $koneksi_db->query($query) or die($koneksi_db->error . __LINE__);
if ($result->num_rows > 0) {
    $_SESSION['login_user'] = $username;
    header('location:homeadmin.php');
} else {
    header('location:index.php');
}
