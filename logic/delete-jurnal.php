
<?php
    session_start();
    include '../koneksi.php';
    include('../session.php');
    if (isset($_POST['kode_akun'])) {
       
        $kode_akun = $_POST['kode_akun'];
        $query = "DELETE FROM tb_dataakun WHERE kode_akun='$kode_akun'";
        $result = mysqli_query($koneksi_db, $query);
        if (!$result) {
            $_SESSION['pesan'] = 'gagal hapus data';
            header('location: ../tampil-jurnal.php');
        } else {
            $_SESSION['pesan'] = 'berhasil hapus data';
            header('location: ../tampil-jurnal.php');
        }
    }

?>