<?php
session_start();
if(!isset($_SESSION['nama']) AND $_SESSION['aks'] != 'adm'){
  header('location:../login.php?status=login_timeout');
  exit();
}else{
  $id = $_SESSION['id'];
  $nama = $_SESSION['nama'];
  $alamat = $_SESSION['add'];
  // $kota = $_SESSION['kota'];
  // $telp = $_SESSION['telp'];
  // $email = $_SESSION['email'];
  // $aks = $_SESSION['aks'];
}
?>
