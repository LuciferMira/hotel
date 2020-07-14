<?php
require_once('../config/koneksi.php');
if(isset($_POST['btn_submit'])){
  $jns_cus = $_POST['jns_cus'];
  $email = $_POST['email'];
  $namapsn = $_POST['nama'];
  $tipe = $_POST['tipe'];
  $jml = $_POST['jml'];
  $tgl_in = $_POST['in'];
  $tgl_out = $_POST['out'];
  $hari = $_POST['hr'];
  $total = $_POST['total'];
  $bayar = $_POST['pay'];
  $sisa = $_POST['sisa'];
  if($jns_cus=='L'){
    $call_id = mysqli_query($con,"SELECT id_user FROM tbl_user WHERE email='$email' AND akses='usr'");
    $dataid = mysqli_fetch_array($call_id);
    $idusr = $dataid['id_user'];

    $pross = mysqli_query($con, "INSERT INTO tbl_transaksi VALUES('','$idusr','$tipe','$jml','','$tgl_in','$tgl_out','$total','$bayar','$sisa','book')");
    if($pross){
      header('location:transaksi.php?stat=input_success');
    }else{
      mysqli_error($con);
      header('location:transaksi.php?stat=input_failed');
    }
  }elseif($jns_cus=='B'){
      $prosusr = mysqli_query($con,"INSERT INTO tbl_user VALUES('','$namapsn','','','','','','$email','','usr')");
      $call_id = mysqli_query($con,"SELECT id_user FROM tbl_user WHERE email='$email' AND akses='usr'");
      $dataid = mysqli_fetch_array($call_id);
      $idusr = $dataid['id_user'];

      $pross = mysqli_query($con, "INSERT INTO tbl_transaksi VALUES('','$idusr','$tipe','$jml','','$tgl_in','$tgl_out','$total','$bayar','$sisa','book')");
      if($pross && $prosusr){
        header('location:transaksi.php?stat=input_success');
      }else{
        mysqli_error($con);
        // header('location:transaksi.php?stat=input_failed');
      }
  }else{
    header('location:transaksi.php?stat=error');
  }
}
?>
