<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Account</title>
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
<?php
  require_once('config/koneksi.php');
  if(isset($_POST['btn_login'])){
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $login = mysqli_query($con, "SELECT * FROM tbl_user WHERE email='$email' AND password='$pass'");
    $row = mysqli_num_rows($login);
    if($row>0){
      $data = mysqli_fetch_array($login);
      $akses = $data['akses'];
      session_start();
      $_SESSION['idusr'] = $data['id_user'];
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['tgl'] = $data['tgl_lahir'];
      $_SESSION['kk'] = $data['nik'];
      $_SESSION['jk'] = $data['jns_kelamin'];
      $_SESSION['add'] = $data['alamat'];
      $_SESSION['mail'] = $data['email'];
      $_SESSION['no'] = $data['no_telp'];
      if($akses=='adm'){
        header('location:admin/index.php?stat=login_success');
      }elseif($akses=='usr'){
        header('location:index.php?stat=login_success');
      }else{
        header('location:error.php');
      }
    }else{
      header('location:login.php?stat=login_failed');
    }
  }
?>
<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-body">
                <form action="" method="post">
                    <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Login gagal</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="password" placeholder="Password" name="password">
                    </div>
                    <!-- <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn_login">Sign in</button>
                    <a href="index.php" class="btn btn-danger btn-lg btn-block">Exit</a>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="sign-up.php" class="footer-link">Create An Account</a>
                  </div>
                <!-- <div class="card-footer-item card-footer-item-bordered">
                    <a href="forgot-password.php" class="footer-link">Forgot Password</a>
                </div> -->
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
