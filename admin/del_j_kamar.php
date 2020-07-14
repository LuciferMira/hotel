<?php
  require_once('../config/koneksi.php');
  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $gambar = $_GET['gmb'];

      $del = mysqli_query($con, "DELETE FROM tbl_tipe WHERE id_tipe='$id'");
      if($del){
        unlink('assets/gmb/'.$gambar);
        header('location:j_kamar.php?stat=delete_success');
      }else{
        header('location:j_kamar.php?stat=delete_failed');
      }
  }
?>
