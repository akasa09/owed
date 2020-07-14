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
                    <h2 class="text-center">INPUT PULSA</h2>
                    <a href="tampildatapulsa.php"><button type="button" class="btn btn-danger"><i class="fas fa-window-close"></i></button>
                    </a>
                    <br><br>
                    <form role="form" method="POST" action="inputpulsa.php">
                        <div class="form-group" method="post">
                            <label>NAMA</label>
                            <div class="input-group" method="post">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="masukan nama ">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>JATAH PULSA</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                    <input type="text" class="form-control" name="jatah" id="jatah" placeholder="masukan jatah pulsa">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>TERPAKAI</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                    <input type="text" class="form-control" name="terpakai" id="terpakai" placeholder="masukan uang yang terpakai">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>SISA</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                                    <input type="text" class="form-control" name="sisa" id="sisa" readonly>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="reset" name="reset" class="btn btn-danger">RESET</button>
                        <?php
                        include 'koneksi.php';
                        if (isset($_POST['submit'])) {
                            $nama = $_POST['nama'];
                            $jatah = $_POST['jatah'];
                            $terpakai = $_POST['terpakai'];
                            $sisa = $_POST['sisa'];
                            $query = "INSERT INTO tb_pulsa SET nama='$nama',jatah='$jatah',terpakai='$terpakai',sisa='$sisa'";
                            $result = mysqli_query($koneksi_db, $query);
                            if (!$result) {
                                echo '<script language="javascript">';
                                echo 'alert("Data gagal disimpan")';

                                echo '</script>';
                            }

                            $date = date("Y-m-d");
                            $keterangan = 'Pembelian Pulsa oleh '. $nama;

                            $last_id = 'pulsa-' . mysqli_insert_id($koneksi_db);
                            $querySaldo = "INSERT INTO tb_saldo SET id_transaksi='$last_id', tanggal='$date', keterangan='$keterangan', jumlah='$terpakai', jenis_transaksi='kredit'";
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