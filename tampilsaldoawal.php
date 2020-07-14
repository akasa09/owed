<?
include('koneksi.php');

include('session.php');
?>
<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DATA SALDO AWAL</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="homeadmin.php">Home</a></li>
                        <li class="breadcrumb-item active">DATA SALDO AWAL</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
            <div class="col-sm-15 text-left">
                <a href="inputsaldo.php"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                </a>
                <br><br>

                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID SALDO</th>
                                <th>TANGGAL</th>
                                <th>KETERANGAN</th>
                                <th>NOMINAL</th>
                                <th>AKSI</th>
                            <tr>
                        </thead>
                        <?php
                        include 'koneksi.php';
                        $i = 0;
                        $ambil = "SELECT * FROM tb_saldo";
                        $hasil = mysqli_query($koneksi_db, $ambil);
                        $id = 0;
                        while ($data = mysqli_fetch_array($hasil)) {
                            $id++;

                            echo "
                            <tr>
                            <td>" . $id . "</td>
                            <td>" . $data['idsaldo'] . "</td>
                            <td>" . $data['tanggal'] . "</td>
                            <td>" . $data['keterangan'] . "</td>
                            <td>" . $data['jumlah'] . "</td>
                           
                            <td>
                          
                    <a href=\"?id=" . $data[0] . "\"><i class='fas fa-edit'></i>
                    </a>" . " ||
                     <a href=\"?id=" . $data[0] . "\"  onclick='return checkDelete()'><i class='fas fa-trash-alt'></i></a>
                     " . "
                    </td>
                   
                    </tr>

                    
                            ";
                        }

                        ?>


                    </table>
                </div>

            </div>
        </div>
    </div>

    <?php
    include('includes/js.php');
    ?>