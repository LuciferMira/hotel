<?php
  require_once('head.php');
  $title = "Administrator Hotel | Detail Transaksi";

  if(isset($_GET['id'])){
    $idtrans = $_GET['id'];

    $call = mysqli_query($con, "SELECT * FROM tbl_transaksi
      INNER JOIN tbl_user ON tbl_transaksi.id_user = tbl_user.id_user
      INNER JOIN tbl_tipe ON tbl_transaksi.id_tipe = tbl_tipe.id_tipe WHERE id_transaksi='$idtrans'");
    $data = mysqli_fetch_array($call);
  }
?>
<title><?php echo $title; ?></title>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Detail Transaksi </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Halaman Utama</a></li>
                                        <li class="breadcrumb-item"><a href="transaksi.php" class="breadcrumb-link">Transaksi</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Detail Transaksi</h5>
                            <div class="card-body">
                                <form>
                                    <!-- <div class="form-group">
                                      <label for="exampleInputEmail1">Id</label>
                                      <input type="text" class="form-control" id="" aria-describedby="emailHelp">
                                    </div> -->
                                    <div class="form-group">
                                      <label>Nama Pemesan</label>
                                      <input type="text" class="form-control" value="<?php echo $data['nama']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Tipe Kamar</label>
                                      <input type="text" class="form-control" value="<?php echo $data['nama_tipe']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Jumah Kamar</label>
                                      <input type="text" class="form-control" value="<?php echo $data['jumlah_kamar']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Tanggal Checkin</label>
                                      <input type="text" class="form-control" value="<?php echo $data['tgl_in']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Tanggal Checkout</label>
                                      <input type="text" class="form-control" value="<?php echo $data['tgl_out']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Total Bayar</label>
                                      <input type="text" class="form-control" value="<?php echo $data['total']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Sisa</label>
                                      <input type="text" class="form-control" value="<?php echo $data['sisa']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                      <label>Status</label>
                                      <input type="text" class="form-control" value="<?php echo $data['status']; ?>" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once('footer.php'); ?>
