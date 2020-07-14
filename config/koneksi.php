<?php
  $con = mysqli_connect("localhost","root","","db_hotel");
  if(!$con){ ?>
    <script>alert('Koneksi Gagal!');</script><?php
  }
?>
