
<?php
    include '../koneksi.php';
    include('../session.php');
    if (isset($_POST['idpulsa'])) {
       
        $idpulsa = $_POST['idpulsa'];
        $query = "DELETE FROM tb_pulsa WHERE idpulsa='$idpulsa'";
        $result = mysqli_query($koneksi_db, $query);
        if (!$result) {
            header('location: ../tampildatapulsa.php');
        }

        $last_id = 'pulsa-' . $idpulsa;
        $querySaldo = "DELETE FROM tb_saldo WHERE id_transaksi='$last_id'";
        $resultSaldo = mysqli_query($koneksi_db, $querySaldo);
        if ($resultSaldo) {
            header('location: ../tampildatapulsa.php');
        } 
    }

?>