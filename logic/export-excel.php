<?php
include("../includes/header.php");
include('../session.php');
?>

<!-- ambil data dari database -->
<?php
include '../koneksi.php';
$ambildata = "SELECT * FROM tb_saldo";
$hasil = mysqli_query($koneksi_db, $ambildata);
?>
    
<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=LaporanKas.xls");
?>
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
            <th>" . $id . "</th>
            <th>" . $row['tanggal'] . "</th>
            <th>" . $row['keterangan'] . "</th>";
            if ($row['jenis_transaksi'] == 'debit'){
                echo "<th>" . $row['jumlah'] . "</th>";
            } else { echo "<th></th>"; }
            if ($row['jenis_transaksi'] == 'kredit'){
                echo "<th>" . $row['jumlah'] . "</th>";
            } else { echo "<th></th>"; }
            echo "
            <th>" . $saldo . "</th>
            </tr>
            
            ";
        }
        ?>
        </table>
        </div>
    </body>
</html>