<?php
include ("session.php");
?>
<?php
include("includes/header.php");
include("includes/sidebar.php");
include("includes/navbar.php");
include("includes/contenWrap.php");
?>
<div class="container">
    <div class="col-sm-12 text-right">
        <div class="jumbotron">
            <center>
                <h2>PT.PNMVS</h2>
                <h3>PT PERMODALAN NASIONAL MADANI VENTURA SYARIAH</h3>
                <img src="css/logo.png" alt="" style="width:200px; height:auto;">
                <h5>Jalan Pondok Raya No 5A, Duren Sawit, Jakarta Timur</h5>
                </br>
                <h5>- SELAMAT DATANG <?= strtoupper($_SESSION['login_user']); ?> -</h5>
            </center>

        </div>

    </div>


</div>

<?php
include("includes/js.php");
?>