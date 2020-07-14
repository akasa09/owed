<?php
    include '../koneksi.php';
    include('../session.php');
    if (isset($_POST['submit'])) {
        $kode = $_POST['kode_akun'];
        $nama = $_POST['nama_akun'];
        $klarifikasi = $_POST['klarifikasi'];
       
        // cek apakah kode sudah ada
        $search = "SELECT * FROM tb_dataakun WHERE kode_akun='$kode', id_akun <> '$id_akun'";
        $result = mysqli_query($koneksi_db, $search);

        if ($result->num_rows > 0) {
            $_SESSION['pesan'] = 'maaf kode sudah digunakan';
            header('location: ../setting-jurnal.php?id='.$id_akun);
        } else {
            $query = "UPDATE tb_dataakun SET kode_akun='$kode', nama_akun='$nama', klarifikasi='$klarifikasi' WHERE id_akun = '$id_akun'";
            $result = mysqli_query($koneksi_db, $query);
            if (!$result) {
                $_SESSION['pesan'] = 'gagal update data';
                header('location: ../setting-jurnal.php?id='.$id_akun);
            }

            $_SESSION['pesan'] = 'berhasil update data';
            header('location: ../setting-jurnal.php?id='.$id_akun);
        }
    }

?>