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
                <p>SELAMAT DATANG <?= strtoupper($_SESSION['login_user']); ?></p>
            </center>

        </div>

    </div>


</div>

<?php
include("includes/js.php");
?>