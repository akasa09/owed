<script src="Jss/jquery-2.2.3.min.js"></script>
<script src="Jss/bootstrap.min.js"></script>
<?php
include('koneksi.php');
include('session.php');
?>

<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/navbar.php");
?>

<!-- get data untuk update -->
<?php
$idbensin = $_GET['id'];
include 'koneksi.php';
$ambildata = "SELECT * FROM tb_bensin WHERE idbensin='$idbensin'";
$hasil = mysqli_query($koneksi_db, $ambildata);
$aray = mysqli_fetch_assoc($hasil);

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
                    <h2 class="text-center">INPUT BENSIN</h2>
                    <a href="tampildatabensin.php"><button type="button" class="btn btn-danger"><i class="fas fa-window-close"></i></button>
                    </a>
                    <br><br>
                    <form role="form" method="POST" action="logic/update-bensin.php">
                        <div class="form-group" method="post">
                            <label>NAMA</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    <input type="hidden" name="idbensin" value="<?= $aray['idbensin'] ?>">
                                    <input type="text" class="form-control" name="nama" placeholder="masukan nama" value="<?= $aray['nama'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>JATAH BENSIN</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                    <input type="text" class="form-control" name="jatah" id="jatah" placeholder="masukan nominal" value="<?= $aray['jatah'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>TERPAKAI</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <input type="text" class="form-control" name="terpakai" id="terpakai" placeholder="masukan nominal" value="<?= $aray['terpakai'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>SISA</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <input type="text" class="form-control" name="sisa" id="sisa" value="<?= $aray['sisa'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <button id="btn" type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="reset" name="reset" class="btn btn-danger">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#jatah").keyup(function() {
            total = $("#jatah").val() - $("#terpakai").val();
            $("#sisa").val(total);
        });

        $("#terpakai").keyup(function() {
            total = $("#jatah").val() - $("#terpakai").val();
            $("#sisa").val(total);
        });
    </script>
    <?php
    include("includes/js.php");
    ?>