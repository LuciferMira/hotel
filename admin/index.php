<?php
  require_once('head.php');
  $title = "Administrator Hotel | Dashboard";
  $bln = date('m');

  $num_kamar = mysqli_query($con, "SELECT SUM(kamar_tersedia)as kamar FROM tbl_tipe");
  $data_kamar = mysqli_fetch_array($num_kamar);

  $num_user = mysqli_query($con, "SELECT COUNT(nama)as nama FROM tbl_user WHERE akses='usr'");
  $data_user = mysqli_fetch_array($num_user);

  $num_prof = mysqli_query($con, "SELECT SUM(total)as profit FROM tbl_transaksi WHERE status='done'");
  $data_prof = mysqli_fetch_array($num_prof);

  $num_book = mysqli_query($con, "SELECT COUNT(status)as book FROM tbl_transaksi WHERE status='book'");
  $data_book = mysqli_fetch_array($num_book);
?>
<title><?php echo $title; ?></title>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                  <?php
                    if(intval($data_kamar['kamar'])-intval($data_book['book'])==0){?>
                      <div class="alert alert-danger" role="alert">
                          Kamar Tidak Ada yang Tersedia!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    <?php } ?>
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Halaman Utama </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item active" aria-current="page">Halaman Utama</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">

                            <!-- ============================================================== -->
                            <!-- sales  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Kamar Tersedia</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php if($data_kamar['kamar']>0){echo intval($data_kamar['kamar'])-intval($data_book['book']);}else{echo "0";} ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end sales  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- new customer  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Costumer</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php if($data_user['nama']>0){echo $data_user['nama'];}else{echo "0";} ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end new customer  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- visitor  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Profit This Month</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php if($data_prof['profit']>0){echo $data_prof['profit'];}else{echo "0";} ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end visitor  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- total orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Booking</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php if($data_book['book']>0){echo $data_book['book'];}else{echo "0";} ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total orders  -->
                            <!-- ============================================================== -->
                        </div>
                        <br><br><br><br><br><br><br><br><br><br>
                    </div>
                </div>
            </div>
<?php require_once('footer.php'); ?>
