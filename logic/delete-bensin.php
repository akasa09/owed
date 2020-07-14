
<?php
    include '../koneksi.php';
    include('../session.php');
    if (isset($_POST['idbensin'])) {
       
        $idbensin = $_POST['idbensin'];
        $query = "DELETE FROM tb_bensin WHERE idbensin='$idbensin'";
        $result = mysqli_query($koneksi_db, $query);
        if (!$result) {
            header('location: ../tampildatabensin.php');
        }

        $last_id = 'bensin-' . $idbensin;
        $querySaldo = "DELETE FROM tb_saldo WHERE id_transaksi='$last_id'";
        $resultSaldo = mysqli_query($koneksi_db, $querySaldo);
        if ($resultSaldo) {
            header('location: ../tampildatabensin.php');
        } 
    }

?>