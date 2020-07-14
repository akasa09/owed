<?php
    include '../koneksi.php';
    include('../session.php');
    if (isset($_POST['idkas'])) {
       
        $idkas = $_POST['idkas'];
        $query = "DELETE FROM tb_kaskeluar WHERE idkaskeluar='$idkas'";
        $result = mysqli_query($koneksi_db, $query);
        if (!$result) {
            header('location: ../tampilkaskeluar.php');
        }

        $last_id = 'kredit-' . $idkas;
        $querySaldo = "DELETE FROM tb_saldo WHERE id_transaksi='$last_id'";
        $resultSaldo = mysqli_query($koneksi_db, $querySaldo);
        if ($resultSaldo) {
            header('location: ../tampilkaskeluar.php');
        } 
    }

?>