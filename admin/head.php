<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
</head>
<?php
  ob_start();
  require_once('../config/koneksi.php');
  require_once('session.php');
?>
<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">Hotel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                      <?php
                      $q = mysqli_query($con, "select count(status) as book from tbl_transaksi where status='book'");
                      $notif = mysqli_fetch_array($q);
                      if($notif['book']>0){?>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i>
                              <span class="badge badge-primary"><?php echo $notif['book']; ?></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notifikasi</div>
                                    <div class="notification-list">
                                      <?php $query = mysqli_query($con, "SELECT id_transaksi, nama,nama_tipe,jumlah_kamar,tgl_psn,tgl_in,tgl_out,total,status
                                        FROM tbl_transaksi inner join tbl_user on tbl_transaksi.id_user = tbl_user.id_user
                                        inner join tbl_tipe on tbl_transaksi.id_tipe = tbl_tipe.id_tipe where status='book' order by tgl_psn desc limit 3");
                                      while($data = mysqli_fetch_array($query)){?>
                                        <div class="list-group">
                                            <div class="notification-title" style="font-size:5px;">
                                                <a style="font-size:15px;" class="nav-link" href="d_transaksi.php?id=<?php echo $data['id_transaksi']; ?>">
                                                  <?php echo $data['nama']." - kelas ".$data['nama_tipe']; ?>
                                                </a>
                                            </div>
                                        </div>
                                      <?php } ?>
                                      <div class="list-group">
                                          <div class="notification-title" style="font-size:5px;">
                                      <a href="transaksi.php" class="nav-link" style="font-size:10px; font-style:underline;">Read More</a>
                                    </div>
                                </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">
                                        User
                                    </h5>
                                    <!-- <span class="status"></span><span class="ml-2">Online</span> -->
                                </div>
                                <a class="dropdown-item" href="profile.php"><i class="fas fa-cog mr-2"></i>My Profile</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="index.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php">
                                    <i class="fa fa-fw fa-user-circle"></i>
                                    Halaman Utama
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="transaksi.php">
                                    <i class="fab fa-fw fa-wpforms"></i>
                                    Transaksi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="j_kamar.php">
                                    <i class="fas fa-bed"></i>
                                    Jenis Kamar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-list"></i>Pengguna</a>
                                <div id="submenu-2" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pengguna.php">Pengguna</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="admin.php">Admin</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
