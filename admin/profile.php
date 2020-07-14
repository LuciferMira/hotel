<?php
  require_once('head.php');
  $title = "Administrator Hotel | My Profile";
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
                            <h2 class="pageheader-title">Profile </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Halaman Utama</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="card mb-4 py-5 border-bottom-danger">
                                <div class="card-body">
                                  <!-- <div class="row">
                                    <div class="col-lg-4">
                                      <div class="row">
                                        <div class="col-lg-12"> -->
                                          <!-- <div class="card-header py-10">

                                              <div class="col-lg-12">
                                                <img src="../img/profile/profile.jpg" width="260" height="260">
                                              </div>
                                              <br>
                                              <div class="col-lg-12">
                                                <a href="#" class="btn btn-success btn-block">
                                                  <span class="icon text-white-50">
                                                    <i class="fas fa-image fa-fw"></i>
                                                  </span>
                                                  <span class="text">Pilih Foto</span>
                                                </a> -->
                                                <!-- Button trigger modal -->
                                                <!-- <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                                                  <i class="fas fa-key fa-fw"></i>
                                                   Ubah Kata Sandi
                                                </button> -->

                                                <!-- Modal -->
                                                <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Ganti Password</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <form>
                                                          <div class="form-group">
                                                            <label for="exampleInputPassword1">Password Lama</label>
                                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="exampleInputPassword1">Password Baru</label>
                                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
                                                            <input type="password" class="form-control" id="exampleInputPassword1">
                                                          </div>
                                                        </form>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                        <button type="button" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div> -->
                                          <!-- </div>
                                        </div>
                                        <div class="col-lg-12">
                                          <br> -->

                                        <!-- </div>
                                      </div>
                                    </div> -->
                                    <!-- <div class="col-lg-8"> -->
                                      <div class="row">
                                        <div class="col-lg-12">
                                            <h5><p><b>Biodata Diri</b></p></h5>
                                            <hr>
                                            <table class="table table-borderless">
                                              <tbody>
                                                <tr>
                                                  <td>Nama</td>
                                                  <td><?php echo $_SESSION['nama']; ?></td>
                                                </tr>
                                                <tr>
                                                  <td>Tanggal Lahir</td>
                                                  <td><?php echo $_SESSION['tgl']; ?></td>
                                                </tr>
                                                <tr>
                                                  <td>NIK</td>
                                                  <td><?php echo $_SESSION['kk']; ?></td>
                                                </tr>
                                                <tr>
                                                  <td>Jenis Kelamin</td>
                                                  <td><?php echo $_SESSION['jk']; ?></td>
                                                </tr>
                                                <tr>
                                                  <td>Alamat</td>
                                                  <td><?php echo $_SESSION['add']; ?></td>
                                                </tr>
                                              </tbody>
                                            </table>

                                            <h5><p><b>Kontak</b></p></h5>
                                            <hr>
                                            <table class="table table-borderless">
                                              <tbody>
                                                <tr>
                                                  <td>Email</td>
                                                  <td><?php echo $_SESSION['mail']; ?></td>
                                                </tr>
                                                <tr>
                                                  <td>No. Handphone</td>
                                                  <td><?php echo $_SESSION['no']; ?></td>
                                                </tr>
                                              </tbody>
                                            </table>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <!-- </div>
                              </div>
                            </div>
                          </div> -->
                    </div>
                </div>
            </div>
<?php require_once('footer.php'); ?>
