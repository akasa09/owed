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
                    <h2 class="text-center">INPUT KAS MASUK</h2>
                    <hr>
                    <a href="tampilkasmasuk.php"><button type="button" class="btn btn-danger"><i class="fas fa-window-close"></i></button>
                    </a>
                    <br><br>
                    <form role="form" method="POST" action="kasmasuk.php">
                        <div class="form-group" method="post">
                            <label>ID KAS</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-unlock-alt"></i>
                                    </div>
                                    <input type="text" class="form-control" name="idkas" placeholder="masukan id kas masuk">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>TANGGAL</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <input type="text" class="form-control" name="tanggal" placeholder="tahun bulan tanggal">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>KETERANGAN</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan" placeholder="masukan keterangan pakai">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>JUMLAH</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <input type="text" class="form-control" name="jumlah" placeholder="masukan jumlah uang">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="reset" name="reset" class="btn btn-danger">RESET</button>

                        <?php
                        include 'koneksi.php';
                        if (isset($_POST['submit'])) {
                            $idkas = $_POST['idkas'];
                            $tanggal = $_POST['tanggal'];
                            $keterangan = $_POST['keterangan'];
                            $jumlah = $_POST['jumlah'];
                            $query = "INSERT INTO tb_kasmasuk SET tanggal='$tanggal',keterangan='$keterangan',jumlah='$jumlah'";
                            $result = mysqli_query($koneksi_db, $query);
                            if (!$result) {
                                echo '<script language="javascript">';
                                echo 'alert("Data gagal disimpan")';

                                echo '</script>';
                            }

                            $last_id = 'debit-' . mysqli_insert_id($koneksi_db);
                            $querySaldo = "INSERT INTO tb_saldo SET id_transaksi='$last_id', tanggal='$tanggal', keterangan='$keterangan', jumlah='$jumlah', jenis_transaksi='debit'";
                            $resultSaldo = mysqli_query($koneksi_db, $querySaldo);
                            if ($resultSaldo) {
                                echo '<script language="javascript">';
                                echo 'alert("Data berhasil disimpan")';

                                echo '</script>';
                            } 
                        }

                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("includes/js.php");
    ?>