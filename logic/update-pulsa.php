<?php
    include '../koneksi.php';
    include('../session.php');
    if (isset($_POST['submit'])) {
        $idpulsa = $_POST['idpulsa'];
        $nama = $_POST['nama'];
        $jatah = $_POST['jatah'];
        $terpakai = $_POST['terpakai'];
        $sisa = $_POST['sisa'];
        $query = "UPDATE tb_pulsa SET nama='$nama',jatah='$jatah',terpakai='$terpakai',sisa='$sisa' WHERE idpulsa='$idpulsa'";
        $result = mysqli_query($koneksi_db, $query);
        if (!$result) {
            header('location: ../edit-pulsa.php?id='.$idpulsa);
        }

        $date = date("Y-m-d");
        $keterangan = 'Pembelian Pulsa oleh '. $nama;
        $last_id = 'pulsa-' . $idpulsa;
        $querySaldo = "UPDATE tb_saldo SET tanggal='$date', keterangan='$keterangan', jumlah='$terpakai', jenis_transaksi='kredit' WHERE id_transaksi='$last_id'";
        $resultSaldo = mysqli_query($koneksi_db, $querySaldo);
        if ($resultSaldo) {
            header('location: ../tampildatapulsa.php');
        } 
    }

?>