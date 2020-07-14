<?php
  require_once('head.php');
  $title = "Hotel | Booking Process";
  $time = date_default_timezone_set("Asia/Jakarta");
  $skrg = date('yy-m-d');


  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $call = mysqli_query($con, "SELECT * FROM tbl_tipe WHERE id_tipe='$id'");
    $data = mysqli_fetch_array($call);
  }

  if(isset($_POST['btn_psn'])){
    $ids = $_POST['idusr'];
    $tipe = $_POST['idtipe'];
    $jml = $_POST['jml'];
    $tgl_psn = $skrg;
    $tgl_in = $_POST['in'];
    $tgl_out = $_POST['out'];
    $total = $_POST['total'];

    $exe = mysqli_query($con, "INSERT INTO tbl_transaksi VALUES('','$ids','$tipe','$jml','$tgl_psn','$tgl_in','$tgl_out','$total','','','book')");
    if($exe){
      header('location:success.php');
    }else{
      header('location:failed.php');
    }
  }

?>
  <title><?php echo $title; ?></title>

  <!-- bradcam_area_start -->
  <div class="bradcam_area breadcam_bg">
      <h3>Booking Ruangan</h3>
  </div>
  <!-- bradcam_area_end -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
                <h3 class="mb-30">Proses Pemesanan</h3>
                <?php
                  if(isset($_SESSION['nama'])){ ?>
                    <form action="" method="post">
                      <input type="hidden" value="<?php echo $_SESSION['idusr']; ?>" name="idusr">
                      <input type="hidden" value="<?php echo $id; ?>" name="idtipe">
                      <input type="hidden" value="<?php echo $data['tarif']; ?>" name="price" id="price">
                      <div class="mt-10">
                          <label>Jumlah Kamar</label>
                          <input type="number" placeholder="Jumlah Kamar"
                              onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jumlah Kamar'" required
                              class="single-input" id="jml" name="jml">
                      </div>
                      <div class="mt-10">
                          <label>Tanggal Checkin</label>
                          <input type="date" placeholder="Tanggal Checkin"
                              onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tanggal Checkin'" required
                              class="single-input" id="in" name="in" value="<?php echo $skrg; ?>">
                      </div>
                      <div class="mt-10">
                          <label>Tanggal Checkout</label>
                          <input type="date" placeholder="Tanggal Checkout"
                              onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tanggal Checkout'" required
                              class="single-input" id="out" name="out">
                      </div>
                      <div class="mt-10">
                          <label>Total Hari Menginap</label>
                          <input type="number" placeholder="Total Hari Menginap"
                              onfocus="this.placeholder = ''" onblur="this.placeholder = 'Total Hari Menginap'" required
                              class="single-input" id="hr" name="hr">
                      </div>
                      <div class="mt-10">
                          <label>Total</label>
                          <input type="number" placeholder="Total"
                              onfocus="this.placeholder = ''" onblur="this.placeholder = 'Total'" required
                              readonly class="single-input" id="total" name="total">
                      </div>

                <?php
              }else{
                ?>
                <div class="mt-10">
                    <!-- <label for="">Nama Depan</label> -->
                    <!-- <input type="text" name="first_name" placeholder="Nama Depan"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required
                        class="single-input"> -->
                        <label>Anda Belum Login, Silahkan Login terlebih dahulu</label>
                        <a href="login.php" class="button rounded-0 warning-bg text-white w-100 btn_1 boxed-btn">Login</a>
                </div>
              <?php } ?>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Kategori Kamar</h4>
                     <ul class="list cat-list">
                         <li>
                            <img class="img-fluid" src="admin/assets/gmb/<?php echo $data['foto']; ?>" alt="" width="300px" height="300px">
                         </li>
                        <li>
                            <p style="text-align:center;color:rgb(52, 150, 189);font-size:30px;">Rp <?php echo $data['tarif']; ?></p>
                        </li>
                        <li>

                        </li>
                     </ul>
                  </aside>
                  <button type="submit" name="btn_psn" class="button rounded-0 warning-bg text-white w-100 btn_1 boxed-btn">Booking</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

    <?php require_once('footer.php'); ?>
