<?php
  require_once('../config/koneksi.php');
  if(isset($_POST['btn_up'])){
    $id = $_POST['idbaru'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jns_kelamin = $_POST['jns_kelamin'];
    $nik = $_POST['nik'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    $up = mysqli_query($con, "UPDATE tbl_user SET nama='$nama',
    tgl_lahir='$tgl_lahir',
    jns_kelamin='$jns_kelamin',
    nik='$nik',
    no_telp='$no_telp',
    alamat='$alamat',
    email='$email' WHERE id_user='$id'");

    if($up){
      header('location:pengguna.php?stat=update_success');
    }else{
      header('location:pengguna.php?stat=update_failed');
    }
  }
?>
