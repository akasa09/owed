<?php
    include '../koneksi.php';
    include('../session.php');
    if (isset($_POST['submit'])) {
        $idbensin = $_POST['idbensin'];
        $nama = $_POST['nama'];
        $jatah = $_POST['jatah'];
        $terpakai = $_POST['terpakai'];
        $sisa = $_POST['sisa'];
        $query = "UPDATE tb_bensin SET nama='$nama',jatah='$jatah',terpakai='$terpakai',sisa='$sisa' WHERE idbensin='$idbensin'";
        $result = mysqli_query($koneksi_db, $query);
        if (!$result) {
            header('location: ../edit-bensin.php?id='.$idbensin);
        }

        $date = date("Y-m-d");
        $keterangan = 'Pembelian Bensin oleh '. $nama;
        $last_id = 'bensin-' . $idbensin;
        $querySaldo = "UPDATE tb_saldo SET tanggal='$date', keterangan='$keterangan', jumlah='$terpakai', jenis_transaksi='kredit' WHERE id_transaksi='$last_id'";
        $resultSaldo = mysqli_query($koneksi_db, $querySaldo);
        if ($resultSaldo) {
            header('location: ../tampildatabensin.php');
        } 
    }

?>