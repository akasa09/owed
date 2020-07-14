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
                    <h2 class="text-center">INPUT DATA AKUN</h2>
                    <hr>
                    <a href="tampil-jurnal.php"><button type="button" class="btn btn-danger"><i class="fas fa-window-close"></i></button>
                    </a>
                    <br><br>
                    <form role="form" method="POST" action="logic/create-jurnal.php">
                        <div class="form-group" method="post">
                            <label>KODE AKUN</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <input type="text" class="form-control" name="kode" placeholder="masukan kode akun">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>NAMA AKUN</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                    <input type="text" class="form-control" name="nama" placeholder="masukan nama akun">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>KLARIFIKASI</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-align-left"></i>
                                    </div>
                                    <input type="text" class="form-control" name="klarifikasi" placeholder="masukan klarifikasi akun">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="reset" name="reset" class="btn btn-danger">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['pesan'])) {
        echo '<script language="javascript">';
        echo 'alert("'. $_SESSION['pesan'] .'")';
        echo '</script>';
    }
    unset($_SESSION['pesan']);
    include("includes/js.php");
    ?>