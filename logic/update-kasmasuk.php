<?php
    include '../koneksi.php';
    include('../session.php');
    if (isset($_POST['submit'])) {
        $idkas = $_POST['idkas'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $query = "UPDATE tb_kasmasuk SET tanggal='$tanggal', keterangan='$keterangan', jumlah='$jumlah' WHERE idkas='$idkas'";
        $result = mysqli_query($koneksi_db, $query);
        if (!$result) {
            header('location: ../edit-kasmasuk.php?id='.$idkas);
        }

        $last_id = 'debit-' . $idkas;
        $querySaldo = "UPDATE tb_saldo SET tanggal='$tanggal', keterangan='$keterangan', jumlah='$jumlah', jenis_transaksi='debit' WHERE id_transaksi='$last_id'";
        $resultSaldo = mysqli_query($koneksi_db, $querySaldo);
        if ($resultSaldo) {
            header('location: ../edit-kasmasuk.php?id='.$idkas);
        } 
    }

?>