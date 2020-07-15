<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">PT.PNM VENTURA SYARIAH</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <li class="nav-item has-treeview">
                        <a href="tampil-akun.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    MENU MASTER
                                    <i class="fas fa-angle"></i>
                                </p>
                            </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                TRANSAKSI
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="tampilkasmasuk.php" class="nav-link">
                                    <i class="far fa-edit nav-icon"></i>
                                    <p>DATA KAS MASUK</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="tampilkaskeluar.php" class="nav-link">
                                    <i class="far fa-edit nav-icon"></i>
                                    <p>DATA KAS KELUAR</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="tampil-laporan.php" class="nav-link">
                                    <i class="far fa-edit nav-icon"></i>
                                    <p>DATA LAPORAN</p>
                                </a>
                            </li> -->
                        </ul>
                    <!-- <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-wallet"></i>
                            <p>
                                AMBIL UANG
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="tampildatabensin.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>DATA BENSIN</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="tampildatapulsa.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>DATA PULSA</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="nav-item has-treeview">
                        <a href="tampil-laporan.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    BUKU BESAR
                                    <i class="fas fa-angle"></i>
                                </p>
                            </a>
                    </li>
                    <li class="nav-item has-treeview">
                    <a href="#" class="nav-link form-logout">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                LOG OUT
                                <i class="fas fa-angle"></i>
                            </p>
                        </a>
                    <form action="logic/logout.php" id="form-logout" method="post">
                        <input type="hidden" name="logout" value="<?= $_SESSION['login_user'] ?>">
                    </form>
                    
                    </li>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>