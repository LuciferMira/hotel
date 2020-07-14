<?php
  require_once('head.php');
  $title = "Administrator Hotel | Transaksi";
  $skrg = date('yy-m-d');
  $tgl = substr($skrg,8,2);
  $besok = date($tgl+1);

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

      $pross = mysqli_query($con, "INSERT INTO tbl_transaksi VALUES('','$idusr','$tipe','$jml','$skrg','$tgl_in','$tgl_out','$total','$bayar','$sisa','book')");
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

        $pross = mysqli_query($con, "INSERT INTO tbl_transaksi VALUES('','$idusr','$tipe','$jml','$skrg','$tgl_in','$tgl_out','$total','$bayar','$sisa','book')");
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
                            <h2 class="pageheader-title">Transaksi </h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Halaman Utama</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
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
                            <h5 class="card-header">List Transaksi</h5>
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa fa-plus-square"></i>
                                        Tambah Transaksi
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
                                            <form action="" method="post">
                                              <div class="row">
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <h5>Jenis Customer</h5>
                                                  <label class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" onclick="EnableDisableTextBox()" name="jns_cus" class="custom-control-input" id="br" value="B"><span class="custom-control-label">Baru</span>
                                                  </label>
                                                  <label class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" onclick="EnableDisableTextBox()" name="jns_cus" class="custom-control-input" id="lm" value="L"><span class="custom-control-label">Lama</span>
                                                  </label>
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" disabled onkeyup="isi_otomatis()" onblur="isi_otomatis()" class="form-control" id="email" name="email">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Nama Pemesan</label>
                                                      <input type="text" class="form-control" id="nama" name="nama" disabled="disabled">
                                                  </div>
                                                  <!-- <div class="form-group">
                                                    <h5>Jenis Kelamin</h5>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" disabled name="jns_kelamin" class="custom-control-input" value="L" id="lk"><span class="custom-control-label">Laki-Laki</span>
                                                    </label>
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" disabled name="jns_kelamin" class="custom-control-input" value="P" id="pr"><span class="custom-control-label">Perempuan</span>
                                                    </label>
                                                  </div> -->
                                              </div>
                                              <!-- Pemisah -->
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Tipe Kamar</label>
                                                <select class="form-control" name="tipe">
                                                  <option>--Pilih Tipe Kamar--</option>
                                                  <?php
                                                    $call = mysqli_query($con, "SELECT * FROM tbl_tipe");
                                                    while($tipe = mysqli_fetch_array($call)){
                                                  ?>
                                                  <option value="<?php echo $tipe['id_tipe']; ?>" data-price="<?php echo $tipe['tarif']; ?>" id="tipe"><?php echo $tipe['nama_tipe']; ?></option>
                                                <?php } ?>
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                  <label>Jumlah Kamar</label>
                                                  <input type="number" class="form-control" id="jml" name="jml">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Checkin</label>
                                                    <input type="date" class="form-control" id="in" name="in">
                                                </div>
                                                <div class="form-group">
                                                  <label>Tanggal Checkout</label>
                                                  <input type="date" class="form-control" id="out" name="out">
                                                </div>
                                                <div class="form-group">
                                                  <label>Total Hari Sewa</label>
                                                  <input type="number" class="form-control" id="hr" name="hr">
                                                </div>
                                                <div class="form-group">
                                                  <label>Total Bayar</label>
                                                  <input type="number" class="form-control" id="total" name="total" readonly>
                                                </div>
                                                <div class="form-group">
                                                  <label>Bayar</label>
                                                  <input type="number" class="form-control" id="pay" name="pay">
                                                </div>
                                                <div class="form-group">
                                                  <label>Sisa</label>
                                                  <input type="number" class="form-control" id="sisa" name="sisa" readonly>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reset()">Tutup</button>
                                            <button type="submit" class="btn btn-primary" name="btn_submit">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                <a href="c_transaksi.php" class="btn btn-primary" target="_blank"><i class="fa fa-file"></i> Cetak</a><br><br>
                                <?php require_once('alert.php'); ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pemesan</th>
                                            <th scope="col">Tipe Kamar</th>
                                            <th scope="col">Jumlah Kamar</th>
                                            <th scope="col">Tanggal Masuk</th>
                                            <th scope="col">Tanggal Keluar</th>
                                            <th scope="col">Total Bayar</th>
                                            <th scope="col">Sisa</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      $no = 1;
                                      $calltrs = mysqli_query($con, "SELECT * FROM tbl_transaksi
                                        INNER JOIN tbl_user ON tbl_transaksi.id_user = tbl_user.id_user
                                        INNER JOIN tbl_tipe ON tbl_transaksi.id_tipe = tbl_tipe.id_tipe order by tgl_psn desc");
                                      while($data = mysqli_fetch_array($calltrs)){
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $no; ?></th>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['nama_tipe']; ?></td>
                                            <td><?php echo $data['jumlah_kamar']; ?></td>
                                            <td><?php echo $data['tgl_in']; ?></td>
                                            <td><?php echo $data['tgl_out']; ?></td>
                                            <td>Rp. <?php echo $data['total']; ?></td>
                                            <td>Rp. <?php echo $data['sisa']; ?></td>
                                            <?php if($data['status']=='done'){?>
                                              <td>
                                                  <!-- <a href="e_transaksi.php" class="btn btn-success btn-circle">
                                                      <i class="fas fa-check"></i>
                                                  </a> -->
                                                  <a href="d_transaksi.php?id=<?php echo $data['id_transaksi']; ?>" class="btn btn-primary btn-circle">
                                                      <i class="fas fa-list"></i>
                                                  </a>
                                                  <!-- <a href="" class="btn btn-danger btn-circle">
                                                      <i class="fa fa-times"></i>
                                                  </a> -->
                                              </td>
                                            <?php }else{ ?>
                                            <td>
                                                <a href="checklist.php?id=<?php echo $data['id_transaksi']; ?>" class="btn btn-success btn-circle">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="d_transaksi.php?id=<?php echo $data['id_transaksi']; ?>" class="btn btn-primary btn-circle">
                                                    <i class="fas fa-list"></i>
                                                </a>
                                                <a target="_blank" href="c_bukti.php?id=<?php echo $data['id_transaksi']; ?>" class="btn btn-secondary btn-circle">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                            </td>
                                          <?php } ?>
                                        </tr>
                                      <?php $no++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php require_once('footer.php'); ?>
