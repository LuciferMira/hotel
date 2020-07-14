<?php
  require_once('../config/koneksi.php');
  $idbaru = $_POST['idbaru'];
  $nama_tipe = $_POST['nama'];
  $deskripsi = $_POST['des'];
  $tarif = $_POST['tarif'];
  $total = $_POST['total'];
  $foto_lama = $_POST['foto_lama'];
  $eks	= array('png','jpg');
  $nama_foto = $_FILES['foto']['name'];
  $x = explode('.', $nama_foto);
  $ekstensi = strtolower(end($x));
  $ukuran	= $_FILES['foto']['size'];
  $file_tmp = $_FILES['foto']['tmp_name'];

  if($nama_foto!=null){
    if(in_array($ekstensi, $eks) === true){
      if($ukuran < 5044070){
        $del = unlink('assets/gmb/'.$foto_lama);
        if($del){
          move_uploaded_file($file_tmp, 'assets/gmb/'.$nama_foto);
          $query = mysqli_query($con, "UPDATE tbl_tipe SET nama_tipe='$nama_tipe',
          deskripsi='$deskripsi',
          tarif='$tarif',
          foto='$nama_foto',
          kamar_tersedia='$total' WHERE id_tipe='$idbaru'");
          if($query){
            header('location:j_kamar.php?stat=update_success');
          }else{
            header('location:j_kamar.php?stat=update_failed');
          }
        }else{
          header('location:j_kamar.php?stat=unlink_failed');
        }
        }else{
          header('location:j_kamar.php?stat=file_too_large');
        }
    }else{
      header('location:j_kamar.php?stat=file_ext');
    }
}else{
  $query = mysqli_query($con, "UPDATE tbl_tipe SET nama_tipe='$nama_tipe',
  deskripsi='$deskripsi',
  tarif='$tarif',
  kamar_tersedia='$total' WHERE id_tipe='$idbaru'");
  if($query){
    header('location:j_kamar.php?stat=update_success');
  }else{
    header('location:j_kamar.php?stat=update_failed');
  }
}
?>
