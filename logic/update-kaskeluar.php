<?php
    include '../koneksi.php';
    include('../session.php');
    if (isset($_POST['submit'])) {
        $idkas = $_POST['idkas'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $query = "UPDATE tb_kaskeluar SET tanggal='$tanggal', keterangan='$keterangan', jumlah='$jumlah' WHERE idkaskeluar='$idkas'";
        $result = mysqli_query($koneksi_db, $query);
        if (!$result) {
            header('location: ../edit-kaskeluar.php?id='.$idkas);
        }

        $last_id = 'kredit-' . $idkas;
        $querySaldo = "UPDATE tb_saldo SET tanggal='$tanggal', keterangan='$keterangan', jumlah='$jumlah', jenis_transaksi='kredit' WHERE id_transaksi='$last_id'";
        $resultSaldo = mysqli_query($koneksi_db, $querySaldo);
        if ($resultSaldo) {
            header('location: ../edit-kaskeluar.php?id='.$idkas);
        } 
    }

?>