<?php
  require_once('head.php');
  $title = "Administrator Hotel | Detail User";

  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $call = mysqli_query($con, "SELECT * FROM tbl_user WHERE id_user='$id'");
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
                            <h2 class="pageheader-title">Detail Pengguna </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-link">Halaman Utama</a></li>
                                        <li class="breadcrumb-item"><a href="pengguna.php" class="breadcrumb-link">Pengguna</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Detail Pengguna</li>
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
                            <h5 class="card-header">Detail Pengguna</h5>
                            <div class="card-body">
                              <form action="" method="post">
                                <input type="hidden" value="<?php echo $data['id_user']; ?>" name="idbaru">
                                  <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" disabled name="nama" value="<?php echo $data['nama']; ?>" disabled>
                                  </div>
                                  <div class="form-group">
                                      <h5>Tanggal Lahir</h5>
                                  <input type="date" class="form-control" disabled name="tgl" value="<?php echo $data['tgl_lahir']; ?>">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <?php if($data['jns_kelamin']=='L'){?>
                                          <div class="input-group">
                                              <label class="custom-control custom-radio custom-control-inline">
                                                  <input type="radio" disabled name="jns_kelamin" checked class="custom-control-input"><span class="custom-control-label">Laki-Laki</span>
                                              </label>
                                              <label class="custom-control custom-radio custom-control-inline">
                                                  <input type="radio" disabled name="jns_kelamin" class="custom-control-input"><span class="custom-control-label">Perempuan</span>
                                              </label>
                                          </div>
                                        <?php }else{ ?>
                                          <div class="input-group">
                                              <label class="custom-control custom-radio custom-control-inline">
                                                  <input type="radio" disabled name="jns_kelamin" class="custom-control-input"><span class="custom-control-label">Laki-Laki</span>
                                              </label>
                                              <label class="custom-control custom-radio custom-control-inline">
                                                  <input type="radio" disabled name="jns_kelamin" checked class="custom-control-input"><span class="custom-control-label">Perempuan</span>
                                              </label>
                                          </div>
                                        <?php }?>
                                    </div>
                                    <div class="form-group">
                                        <h5>NIK</h5>
                                        <input type="text" class="form-control" disabled name="nik" value="<?php echo $data['nik']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <h5>No Telpon</h5>
                                        <input type="text" class="form-control" disabled name="no_telp" value="<?php echo $data['no_telp']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <h5>Alamat</h5>
                                        <textarea class="form-control" name="alamat" disabled><?php echo $data['alamat']?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" disabled class="form-control" value="<?php echo $data['email']; ?>" name="email">
                                    </div>

                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once('footer.php'); ?>
