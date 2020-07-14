
<?php
    session_start();
    include '../koneksi.php';
    include('../session.php');
    if (isset($_POST['id_jurnal'])) {
       
        $id_jurnal = $_POST['id_jurnal'];
        $query = "DELETE FROM tb_jurnal WHERE id_jurnal='$id_jurnal'";
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