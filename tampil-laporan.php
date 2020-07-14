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
?>
<script  type="text/javascript">
    $(document).ready(function(){
        $('.dateFilter').datepicker({
            dateFormat: "yy-mm-dd"
        });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
            <div class="col-sm-15 text-left">
                <div class="card-body">
                <h5>CARI BERDASARKAN</h5>
                <label>Periode Tanggal </label> 
                <div class="col-sm-8"> 
                <form method='post' action=''>
                    Start Date <input type='text' class='dateFilter' name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>'>
                
                    End Date <input type='text' class='dateFilter' name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>'>

                    <input type='submit' name='but_search' value='Search'>
                </form>
                </div>
            </div>
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
                                <th>SALDO</th>
                            </tr>
                        </thead>
                        <?php
                        $data = "SELECT * FROM tb_saldo";
                        // Date filter
                        if(isset($_POST['but_search'])){
                            $fromDate = $_POST['fromDate'];
                            $endDate = $_POST['endDate'];

                            if(!empty($fromDate) && !empty($endDate)){
                            $data .= " and date_of_join 
                                            between '".$fromDate."' and '".$endDate."' ";
                            }
                        }


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
                            <td> Rp." . number_format($saldo, 2, ",", ".") . "</td>
                            </tr>
                            
                            ";
                        }
                        // <td>

                        //     <a href=\"?id=" . $row[0] . "\"><i class='fas fa-edit'></i>
                        //     </a>" . " ||
                        //      <a href=\"?id=" . $row[0] . "\"  onclick='return checkDelete()'><i class='fas fa-trash-alt'></i></a>
                        //      " . "

                        //     </td>

                        ?>
                    </table>
                </div>
            </div>
            <a href="logic/export-excel.php">
            <button class="btn btn-success col-sm-2 float-right">Export Excel</button>
            </a>
        </div>
    </div>

    <?php include("includes/js.php") ?>

    <script>
        $("#bukubesar").DataTable();

        

        // function setDateRangePicker(input1, input2){  
        //     $(input1).datetimepicker({    
        //         format: "YYYY-MM-DD",    useCurrent: false  })  
        //         $(input1).on("change.datetimepicker", function (e) {    
        //             $(input2).val("")        
        //             $(input2).datetimepicker('minDate', e.date);    
        //             })  
        //         $(input2).datetimepicker({    
        //             format: "YYYY-MM-DD",    
        //             useCurrent: false  
        //             })
        // }
    </script>