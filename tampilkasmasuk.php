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
                    <h1 class="m-0 text-dark">DATA KAS MASUK</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="homeadmin.php">Home</a></li>
                        <li class="breadcrumb-item active">DATA KAS MASUK</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
            <div class="col-sm-15 text-left">
                <a href="kasmasuk.php"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button></a>
                <br><br>
                <div class="card-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID KAS</th>
                                <th>TANGGAL</th>
                                <th>KETERANGAN</th>
                                <th>JUMLAH</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <?php
                        include 'koneksi.php';
                        $ambildata = "SELECT * FROM tb_kasmasuk";
                        $hasil = mysqli_query($koneksi_db, $ambildata);
                        $id = 0;
                        while ($row = mysqli_fetch_array($hasil)) {
                            $id++;
                            echo "
                            <tr>
                            <th>" . $id . "</th>
                            <th>" . $row['idkas'] . "</th>
                            <th>" . $row['tanggal'] . "</th>
                            <th>" . $row['keterangan'] . "</th>
                            <th>" . $row['jumlah'] . "</th>
                            <td>

                            <a href=\"edit-kasmasuk.php?id=" . $row[0] . "\"><i class='fas fa-edit'></i>
                            </a>" . " ||
                             <a class='deleted' href=\"#\" data-link='". $row['idkas'] ."'><i class='fas fa-trash-alt'></i></a>
                             " . "
                            <form id='form_". $row['idkas'] ."' action='logic/delete-kasmasuk.php' method='POST'>
                                <input type='hidden' name='idkas' value='". $row['idkas'] ."' />
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

    <?php include("includes/js.php") ?>