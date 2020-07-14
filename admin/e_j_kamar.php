<?php
  require_once('head.php');
  $title = "Administrator Hotel | Edit Kamar";

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $call = mysqli_query($con, "SELECT * FROM tbl_tipe WHERE id_tipe='$id'");
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
                            <h2 class="pageheader-title">Edit Jenis Kamar </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Halaman Utama</a></li>
                                        <li class="breadcrumb-item"><a href="j_kamar.php" class="breadcrumb-link">Jenis Kamar</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Jenis Kamar</li>
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
                            <h5 class="card-header">Edit Jenis Kamar</h5>
                            <div class="card-body">
                                <form method="post" action="up_j_kamar.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="idbaru" value="<?php echo $data['id_tipe']; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Tipe Kamar</label>
                                        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_tipe']; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" row="3" name="des"><?php echo $data['deskripsi']; ?></textarea>
                                      </div>
                                      <div class="form-group">
                                          <label>Tarif</label>
                                          <input type="number" class="form-control" name="tarif" value="<?php echo $data['tarif']; ?>">
                                      </div>
                                      <div class="form-group">
                                          <label>Foto</label>
                                          <img src="assets/gmb/<?php echo $data['foto']; ?>" class="form-control">
                                          <input type="hidden" name="foto_lama" value="<?php echo $data['foto']; ?>">
                                          <input type="file" class="form-control" name="foto" value="<?php echo $data['foto']; ?>">
                                      </div>
                                      <div class="form-group">
                                          <label>Total Kamar</label>
                                          <input type="number" class="form-control" name="total" value="<?php echo $data['kamar_tersedia']; ?>">
                                      </div>
                                <button class="btn btn-success" name="btn_up">
                                    <i class="fa fa-check"></i>
                                    Simpan
                                </button>
                                <a href="j_kamar.php" class="btn btn-danger">
                                    <i class="fa fa-times"></i>
                                    Batal
                                </a>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once('footer.php'); ?>
