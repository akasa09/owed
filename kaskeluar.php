<?php
include('koneksi.php');
include('session.php');
?>

<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/navbar.php");
?>

<!-- get data untuk keterangan -->
<?php
$ambildata = "SELECT * FROM tb_dataakun";
$hasil = mysqli_query($koneksi_db, $ambildata);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) hehe-->
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
                    <h2 class="text-center">INPUT KAS KELUAR</h2>
                    <hr>
                    <a href="tampilkaskeluar.php"><button type="button" class="btn btn-danger"><i class="fas fa-window-close"></i></button>
                    </a>
                    <br><br>
                    <form role="form" method="POST" action="logic/create-kaskeluar.php">
                        <div class="form-group" method="post">
                            <label>NO TRANSAKSI</label>
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
                                    <input type="date" class="form-control" name="tanggal" placeholder="tahun bulan tanggal">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>PILIH AKUN</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-archive"></i>
                                    </div>
                                    <select name="keterangan" id="" class="form-control">
                                    <?php
                                        while ($row = mysqli_fetch_array($hasil)) {
                                            echo "
                                            <option value='" . $row['nama_akun'] . "'> [". strtoupper($row['kode_akun']) . "] - " . strtoupper($row['nama_akun']) ."
                                            </option>";
                                        }
                                    ?>
                                    </select>
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