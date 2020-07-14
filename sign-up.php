<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up Account</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->
<?php
  require_once('config/koneksi.php');
  if(isset($_POST['btn_submit'])){
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl'];
    $jns = $_POST['jns_kelamin'];
    $nik = $_POST['nik'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $akses = "usr";
    $confirm = $_POST['confirm'];

    if($confirm==null){
      header('location:sign-up.php?stat=confirm');
    }

    $insert = mysqli_query($con, "INSERT INTO tbl_user VALUES('','$nama','$tgl_lahir','$jns','$nik','$no_telp','$alamat','$email','$pass','$akses')");
    if($insert){
      header('location:index.php?stat=input_success');
    }else{
      header('location:index.php?stat=input_failed');
    }
  }
?>
<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" action="" method="post">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrations Form</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
              <div class="form-group">
                  <h5>Nama</h5>
              <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <h5>Tanggal Lahir</h5>
            <input type="date" class="form-control" name="tgl">
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
                  <h5>NIK</h5>
                  <input type="text" class="form-control" name="nik">
              </div>
              <div class="form-group">
                  <h5>No Telpon</h5>
                  <input type="text" class="form-control" name="no_telp">
              </div>
              <div class="form-group">
                  <h5>Alamat</h5>
                  <textarea class="form-control" name="alamat"></textarea>
              </div>
              <div class="form-group">
                  <h5>Email</h5>
                  <input type="email" class="form-control" name="email">
              </div>
              <div class="form-group">
                  <h5>Password</h5>
                  <input type="password" class="form-control" name="password">
              </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="confirm"><span class="custom-control-label">By creating an account, you agree the <a href="about.php" target="_blank">terms and conditions</a></span>
                    </label>
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit" name="btn_submit">Register My Account</button>
                </div>

                <!-- <div class="form-group row pt-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <button class="btn btn-block btn-social btn-facebook " type="button">Facebook</button>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn  btn-block btn-social btn-twitter" type="button">Twitter</button>
                    </div>
                </div> -->
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="login.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>


</html>
