<?php
session_start();
if(!isset($_SESSION['nama'])){
  // header('location:login.php?status=login_timeout');
  // exit();
}else{
  $nama = $_SESSION['nama'];
  $tgll = $_SESSION['tgl'];
  $kk = $_SESSION['kk'];
  $jk = $_SESSION['jk'];
  $add = $_SESSION['add'];
  $mail = $_SESSION['mail'];
  $no = $_SESSION['no'];
}
?>
