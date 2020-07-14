<?php
include('koneksi.php');
include('session.php');
?>

<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/navbar.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-15">
                    <h2 class="text-center">INPUT KAS AWAL</h2>
                    <hr>
                    <form role="form" method="POST" action="inputsaldo.php">
                        <div class="form-group" method="post">
                            <label>ID SALDO</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                                    <input type="text" class="form-control" name="idsaldo" placeholder="masukan id saldo awal">
                                </div>
                            </div>
                        </div>
                        <div class="form-group " method="post">
                            <label>TANGGAL</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                    <input type="text" class="form-control" name="tanggal" placeholder="tahun-bulan-tanggal">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>KETERANGAN</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-bookmark"></i></div>
                                    <input type="text" class="form-control" name="keterangan" placeholder="masukan keterangan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>JUMLAH</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                    <input type="text" class="form-control" name="jumlah" placeholder="masukan jumlah saldo">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-danger">RESET</button>
                </div>
            </div>
        </div>
        <?php
        include 'koneksi.php';

        if (isset($_POST['submit'])) {
            $idsaldo = $_POST['idsaldo'];
            $tanggal = $_POST['tanggal'];
            $keterangan = $_POST['keterangan'];
            $jumlah = $_POST['jumlah'];
            $query = "INSERT INTO tb_saldo SET idsaldo='$idsaldo',tanggal='$tanggal',keterangan='$keterangan',jumlah='$jumlah'";
            $result = mysqli_query($koneksi_db, $query);
            if ($result) {
                echo '<script language="javascript">';
                echo 'alert("Data Berhasil disimpan")';

                echo '</script>';
            }
            header("location:tampilansaldoawal.php");
        }

        ?>

        </form>
    </div>




    <?php
    include("includes/js.php");
    ?>