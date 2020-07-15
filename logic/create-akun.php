<?php
    session_start();
    include '../koneksi.php';
    if (isset($_POST['submit'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $klarifikasi = $_POST['klarifikasi'];
       
        // cek apakah kode sudah ada
        $search = "SELECT * FROM tb_dataakun WHERE kode_akun='$kode'";
        $result = mysqli_query($koneksi_db, $search);

        if ($result->num_rows > 0) {
            $_SESSION['pesan'] = 'maaf kode sudah digunakan';
            header('location: ../setting-akun.php');
        } else {
            $query = "INSERT INTO tb_dataakun SET kode_akun='$kode', nama_akun='$nama', klarifikasi='$klarifikasi'";
            $result = mysqli_query($koneksi_db, $query);
            if (!$result) {
                $_SESSION['pesan'] = 'gagal menyimpan data';
                header('location: ../setting-akun.php');
            }

            $_SESSION['pesan'] = 'berhasil menyimpan data';
            header('location: ../setting-akun.php');
        }
        
        
    }
?>