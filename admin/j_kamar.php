<?php
  require_once('head.php');
  $title = "Administrator Hotel | Kamar";

  if(isset($_POST['btn_submit'])){
    $nama_tipe = $_POST['nama'];
    $deskripsi = $_POST['des'];
    $tarif = $_POST['tarif'];
    $total = $_POST['total'];
    $eks	= array('png','jpg','jpeg');
    $nama_foto = $_FILES['foto']['name'];
    $x = explode('.', $nama_foto);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    if(in_array($ekstensi, $eks) === true){
      if($ukuran < 5044070){
        move_uploaded_file($file_tmp, 'assets/gmb/'.$nama_foto);
        $query = mysqli_query($con,"INSERT INTO tbl_tipe VALUES(NULL, '$nama_tipe','$deskripsi','$tarif','$nama_foto','$total')");
        if($query){
          header('location:j_kamar.php?stat=input_success');
        }else{
          header('location:j_kamar.php?stat=input_failed');
        }
      }else{
        header('location:j_kamar.php?stat=file_too_large');
      }
    }else{
      header('location:j_kamar.php?stat=file_ext');
    }
  }
?>
<title><?php echo $title; ?></title>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Jenis Kamar </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-link">Halaman Utama</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Jenis Kamar</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Tabel Jenis Kamar</h5>
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa fa-plus-square"></i>
                                        Tambah Jenis Kamar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="" enctype="multipart/form-data">
                                                  <div class="form-group">
                                                    <label>Nama Tipe Kamar</label>
                                                    <input type="text" class="form-control" name="nama">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Deskripsi</label>
                                                      <textarea class="form-control" row="3" name="des"></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Tarif</label>
                                                    <div class="row">
                                                      <div class="col-md-10">
                                                        <input type="number" class="form-control" name="tarif">
                                                      </div>
                                                      <div class="col-md-2">
                                                        <label> / Night</label>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Foto</label>
                                                      <input type="file" class="form-control" name="foto">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Total Kamar</label>
                                                      <input type="number" class="form-control" name="total">
                                                  </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" name="btn_submit">Simpan</button>
                                        </div>
                                      </form>
                                    </div>
                                    </div>
                                </div>
                                <a href="c_kamar.php" class="btn btn-primary" target="_blank"><i class="fa fa-file"></i> Cetak</a><br><br>
                                <?php require_once('alert.php'); ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Tipe</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Tarif</th>
                                            <th scope="col">Total Kamar</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $no=1;
                                        $call = mysqli_query($con, "SELECT * FROM tbl_tipe ORDER BY id_tipe");
                                        $num = mysqli_num_rows($call);
                                        if($num>0){
                                          while($data = mysqli_fetch_array($call)){
                                      ?>
                                        <tr>
                                            <th scope="row"><?php echo $no++; ?></th>
                                            <td><?php echo $data['nama_tipe']; ?></td>
                                            <td><?php echo substr($data['deskripsi'],0,20).". . ."; ?></td>
                                            <td><?php echo $data['tarif']; ?></td>
                                            <td><?php echo $data['kamar_tersedia']; ?></td>
                                            <td><img style="max-height:200px;max-width:200px;" class="img-responsive" src="assets/gmb/<?php echo $data['foto']; ?>"></td>
                                            <td>
                                                <a href="e_j_kamar.php?id=<?php echo $data['id_tipe']; ?>" class="btn btn-warning btn-circle">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="d_j_kamar.php?id=<?php echo $data['id_tipe']; ?>" class="btn btn-primary btn-circle">
                                                    <i class="fas fa-list"></i>
                                                </a>
                                                <a href="del_j_kamar.php?id=<?php echo $data['id_tipe']; ?>&&gmb=<?php echo $data['foto']; ?>" class="btn btn-danger btn-circle">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                      <?php } }else{?>
                                        <tr>
                                          <td colspan="5">Tidak Ada Data</td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once('footer.php'); ?>
