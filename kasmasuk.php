<?php
include('koneksi.php');
include('session.php');
?>

<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/navbar.php");
?>

<?php
$ambildata = "SELECT * FROM tb_dataakun";
$hasil = mysqli_query($koneksi_db, $ambildata);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">INPUT KAS MASUK</h1>
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
                            <label for="dateFilter" class="control-label">TANGGAL</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <input type="date" class="form-control" name="tanggal"">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" method="post">
                            <label>PILIH AKUN</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
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

                        <?php
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
        <div class="card">
            <div class="card-body">
                <div class="col-sm-15">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>KETERANGAN</th>
                            <th>DEBIT</th>
                            <th>KREDIT</th>
                        </tr>
                    </thead>
                    <?php
                    $ambildata = "SELECT * FROM tb_saldo";
                    $hasil = mysqli_query($koneksi_db, $ambildata);
                        $id = 0;
                    $totaldebit = 0;
                    $totalkredit = 0;
                    while ($row = mysqli_fetch_array($hasil)) {
                        $id++;
                        echo "
                        <tr>
                        <td>" . $id . "</th>
                        <td>" . $row['keterangan'] . "</th>";
                        if ($row['jenis_transaksi'] == 'debit'){
                            $totaldebit += $row['jumlah'];
                            echo "<td> Rp." . number_format($row['jumlah'], 2, ",", ".") . "</td>";
                        } else { echo "<td></td>"; }
                        if ($row['jenis_transaksi'] == 'kredit'){
                            $totalkredit += $row['jumlah'];
                            echo "<td> Rp." . number_format($row['jumlah'], 2, ",", ".") . "</td>";
                        } else { echo "<td></td>"; }
                        echo "</tr>";
                    }
                    ?>
                    <tfoot>
                        <tr>
                            <td colspan="2" style="text-align:right;">Total</td>
                            <td>Rp <?= number_format($totaldebit, 2, ",", ".") ?></td>
                            <td>Rp <?= number_format($totalkredit, 2, ",", ".") ?></td>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("includes/js.php");
    ?>