<?php
  require_once('../config/koneksi.php');
  $email = $_GET['email'];
  $query = mysqli_query($con, "SELECT * FROM tbl_user WHERE email='$email' AND akses='usr'");
  $res = mysqli_fetch_array($query);
  $data = array(
            'nama' => $res['nama'],
            'jk' => $res['jns_kelamin'],);
  echo json_encode($data);
?>
