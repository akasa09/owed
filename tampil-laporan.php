<?
include('koneksi.php');
include('session.php');
?>
<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<!-- ambil data dari database -->
<?php
include 'koneksi.php';
$ambildata = "SELECT * FROM tb_saldo";
$hasil = mysqli_query($koneksi_db, $ambildata);

if (isset($_GET['start_date']) && isset($_GET['end_date']) && $_GET['start_date'] !== '' && $_GET['start_date'] !== '')
{
    $start = $_GET['start_date'];
    $end   = $_GET['end_date'];
    $ambildata = "SELECT * FROM tb_saldo where tanggal BETWEEN '$start' AND '$end'";
    $hasil = mysqli_query($koneksi_db, $ambildata);
} 
elseif (isset($_GET['akun']) && $_GET['akun'] !== '')
{
    $akun = $_GET['akun'];
    $ambildata = "SELECT * FROM tb_saldo WHERE keterangan LIKE '$akun'; ";
    $hasil = mysqli_query($koneksi_db, $ambildata);
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DATA LAPORAN</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="homeadmin.php">Home</a></li>
                        <li class="breadcrumb-item active">DATA LAPORAN</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
            <div class="col-sm-12 text-left">
            <div class="card-body">
            <div class="col-sm-6"> 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Pencarian Berdasarkan Tanggal
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-search-akun">
                    Pencarian Berdasarkan Akun
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="search-date" action="tampil-laporan.php" method="get">
                    <div class="form-group">
                        <label for="dateFilter" class="control-label">Filter Tanggal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input id="filterDate" type="text" class="form-control" value="" readonly>
                            <input id="start" type="hidden" name="start_date" class="form-control">
                            <input id="end" type="hidden" name="end_date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Cari</button>
                </div>
                </form>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!--- modal search akun --->
    <?php
        $opsi      = "SELECT * FROM tb_dataakun";
        $hasilOpsi = mysqli_query($koneksi_db, $opsi);
    ?>
    <div class="modal fade" id="modal-search-akun" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                <form id="search-akun" action="tampil-laporan.php" method="get">
                    <div class="form-group">
                        <label for="akunFilter" class="control-label">Filter Nama Akun</label>
                        <div class="col-sm-8">
                            <select name="akun" id="selectakun" class="form-control">
                                <?php
                                    echo "<option value=''> --select-- </option>";
                                    while ($row = mysqli_fetch_array($hasilOpsi)) {
                                        echo "<option value='". $row['nama_akun'] ."'>". $row['nama_akun'] ."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Cari</button>
                </div>
                </form>
            </div>
          <!-- /.modal-content -->
            </div>
        <!-- /.modal-dialog -->
        </div>

    <div class="card">
        <div class="card-header">
            <div class="col-sm-15 text-left">
                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>TANGGAL</th>
                                <th>KETERANGAN</th>
                                <th>DEBIT</th>
                                <th>KREDIT</th>
                            </tr>
                        </thead>
                        <?php
                        
                        $id = 0;
                        $saldo = 0;
                        while ($row = mysqli_fetch_array($hasil)) {
                            $id++;
                            if($row['jenis_transaksi'] == 'debit') {
                                $saldo += intval($row['jumlah']);
                            } else {
                                $saldo -= intval($row['jumlah']);
                            }
                            echo "
                            <tr>
                            <td>" . $id . "</td>
                            <td>" . $row['tanggal'] . "</td>
                            <td>" . $row['keterangan'] . "</td>";
                            if ($row['jenis_transaksi'] == 'debit'){
                                echo "<td> Rp." . number_format($row['jumlah'], 2, ",", ".") . "</td>";
                            } else { echo "<td></td>"; }
                            if ($row['jenis_transaksi'] == 'kredit'){
                                echo "<td> Rp." . number_format($row['jumlah'], 2, ",", ".") . "</td>";
                            } else { echo "<td></td>"; }
                            echo "
                            </tr>
                            ";
                        }
                        ?>
                    </table>
                </div>
            </div>
            <a href="logic/export-excel.php">
            <button class="btn btn-success col-sm-2 float-right">Export Excel</button>
            <button class="btn btn-primary disabled" onclick="window.print()">Print this page</button>
            </a>
        </div>
    </div>
</div>
</div>
</div>

<?php include("includes/js.php") ?>