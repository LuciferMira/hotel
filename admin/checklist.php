<?php
require_once('../config/koneksi.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $exe = mysqli_query($con, "UPDATE tbl_transaksi SET status='done' WHERE id_transaksi='$id'");
    if($exe){
      header('location:transaksi.php?stat=update_success');
    }else{
      header('location:transaksi.php?stat=update_failed');
    }
  }

?>
