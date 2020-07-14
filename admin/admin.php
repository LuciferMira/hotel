<?php
  require_once('head.php');
  $title = "Administrator Hotel | Admin";

  if(isset($_POST['btn_submit'])){
    $nama = $_POST['nama'];
    $jns = $_POST['jns_kelamin'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $akses = "adm";

    $insert = mysqli_query($con, "INSERT INTO tbl_user VALUES('','$nama','','$jns','','','','$email','$pass','$akses')");
    if($insert){
      header('location:admin.php?stat=input_success');
    }else{
      header('location:admin.php?stat=input_failed');
    }
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
                            <h2 class="pageheader-title">Admin </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Admin</li>
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
                            <h5 class="card-header">Tabel Admin</h5>
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa fa-plus-square"></i>
                                        Tambah Admin
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <h5>Nama</h5>
                                                <input type="text" class="form-control" name="nama">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Jenis Kelamin</h5>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="jns_kelamin" class="custom-control-input" value="L"><span class="custom-control-label">Laki-Laki</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="jns_kelamin" class="custom-control-input" value="P"><span class="custom-control-label">Perempuan</span>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Email</h5>
                                                    <input type="email" class="form-control" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <h5>Password</h5>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" name="btn_submit">Simpan</button>
                                        </div>
                                      </form>
                                    </div>
                                    </div>
                                </div>
                                <a href="c_admin.php" class="btn btn-primary" target="_blank"><i class="fa fa-file"></i> Cetak</a><br><br>
                                <?php require_once('alert.php'); ?>
                                <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No Telp</th>
                                        <th scope="col">Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1;
                                      $call = mysqli_query($con, "SELECT * FROM tbl_user WHERE akses='adm' ORDER BY id_user");
                                      $row = mysqli_num_rows($call);
                                      if($row>0){
                                      while($data = mysqli_fetch_array($call)){
                                      ?>
                                      <tr>
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['jns_kelamin']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><?php echo $data['no_telp']; ?></td>
                                        <td>
                                            <!-- <a href="e_admin.php?id=<?php echo $data['id_user']; ?>" class="btn btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a> -->
                                            <a href="d_admin.php?id=<?php echo $data['id_user']; ?>" class="btn btn-primary btn-circle">
                                                <i class="fas fa-list"></i>
                                            </a>
                                            <a href="del_admin.php?id=<?php echo $data['id_user']; ?>" class="btn btn-danger btn-circle">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                      </tr>
                                    <?php $no++;}}else{?>
                                      <tr>
                                        <td colspan="6">Tidak Ada Data</td>
                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once('footer.php'); ?>
