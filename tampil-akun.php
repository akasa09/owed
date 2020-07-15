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
                    <h1 class="m-0 text-dark">DATA AKUN</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="homeadmin.php">Home</a></li>
                        <li class="breadcrumb-item active">DATA AKUN</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
            <div class="col-sm-12 text-left">
                <a href="setting-akun.php"><button type="button" class="btn btn-primary "><i class="fas fa-plus"></i></button>
                </a>
                <br><br>
                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>KODE AKUN</th>
                                <th>NAMA AKUN</th>
                                <th>KLARIFIKASI</th>
                            </tr>
                        </thead>
                        <?php
                        include 'koneksi.php';
                        $ambildata = "SELECT * FROM tb_dataakun";
                        $hasil = mysqli_query($koneksi_db, $ambildata);
                        $id = 0;
                        while ($data = mysqli_fetch_array($hasil)) {
                            $id++;
                            echo "
                            <tr>
                            <td>" . $data['kode_akun'] . "</td>
                            <td>" . $data['nama_akun'] . "</td>
                            <td>" . $data['klarifikasi'] . "</td>
                            <td>
                            <a href=\"edit-akun.php?id=" . $data['kode_akun'] . "\"><i class='fas fa-edit'></i>
                            </a>" . " ||
                             <a class='deleted' href=\"#\" data-link='". $data['kode_akun'] ."'><i class='fas fa-trash-alt'></i></a>
                             " . "
                            <form id='form_". $data['kode_akun'] ."' action='logic/delete-akun.php' method='POST'>
                                <input type='hidden' name='kode_akun' value='". $data['kode_akun'] ."' />
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
    if (isset($_SESSION['pesan'])) {
        echo '<script language="javascript">';
        echo 'alert("'. $_SESSION['pesan'] .'")';
        echo '</script>';
    }
    unset($_SESSION['pesan']);
    include("includes/js.php");

    ?>