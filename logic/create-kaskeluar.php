<?php
    session_start();
    include '../koneksi.php';
    if (isset($_POST['submit'])) {
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $query = "INSERT INTO tb_kaskeluar SET tanggal='$tanggal',keterangan='$keterangan',jumlah='$jumlah'";
        $result = mysqli_query($koneksi_db, $query);
        if (!$result) {
            $_SESSION['pesan'] = 'data gagal disimpan';
            header('location: ../kaskeluar.php');
        } else {
            $last_id = 'kredit-' . mysqli_insert_id($koneksi_db);
            $querySaldo = "INSERT INTO tb_saldo SET id_transaksi='$last_id', tanggal='$tanggal', keterangan='$keterangan', jumlah='$jumlah', jenis_transaksi='kredit'";
            $resultSaldo = mysqli_query($koneksi_db, $querySaldo);
            if ($resultSaldo) {
                $_SESSION['pesan'] = 'data berhasil disimpan';
                header('location: ../kaskeluar.php');
            } else {
                $_SESSION['pesan'] = 'data gagal disimpan';
                header('location: .../kaskeluar.php');
            }
        }
    }
?>