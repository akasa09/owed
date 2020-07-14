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
                    <h1 class="m-0 text-dark">DATA PULSA</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="homeadmin.php">Home</a></li>
                        <li class="breadcrumb-item active">DATA PULSA</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
            <div class="col-sm-15 text-left">
                <a href="inputpulsa.php"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                </a>
                <br><br>
                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>JATAH PULSA</th>
                                <th>TERPAKAI</th>
                                <th>SISA</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <?php
                        include 'koneksi.php';
                        $ambildata = "SELECT * FROM tb_pulsa";
                        $hasil = mysqli_query($koneksi_db, $ambildata);
                        $id = 0;
                        while ($data = mysqli_fetch_array($hasil)) {
                            $id++;
                            echo "
                            <tr>
                            <td>" . $id . "</td>
                            <td>" . $data['nama'] . "</td>
                            <td>Rp." . number_format($data['jatah'], 2, ",", ".") . "</td>
                            <td>Rp." . number_format($data['terpakai'], 2, ",", "."). "</td>
                            <td>Rp." . number_format($data['sisa'], 2, ",", ".") . "</td>
                            <td>
                            <a href=\"edit-pulsa.php?id=" . $data['idpulsa'] . "\"><i class='fas fa-edit'></i>
                            </a>" . " ||
                             <a class='deleted' href=\"#\" data-link='". $data['idpulsa'] ."'><i class='fas fa-trash-alt'></i></a>
                             " . "
                            <form id='form_". $data['idpulsa'] ."' action='logic/delete-pulsa.php' method='POST'>
                                <input type='hidden' name='idpulsa' value='". $data['idpulsa'] ."' />
                            </form>
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
    include("includes/js.php");

    ?>