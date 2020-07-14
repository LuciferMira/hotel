<?php
  require_once('head.php');
  $title = "Hotel | Transaction Success"
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
         <h1 style="text-align: center;">Selamat Pesanan anda sedang kami proses, Silahkan cetak bukti pembayaran dibawah ini</h1>
         <p>
            <a href="c_bukti.php" target="_blank" class="button rounded-0 warning-bg text-white w-100 btn_1 boxed-btn">Cetak Bukti</a>
         </p><br><br>
         <p style="text-align: center;">Terima kasih atas kepercayaan anda kepada kami.</p>
         <p>
            <a href="index.php" class="button rounded-0 warning-bg text-white w-100 btn_1 boxed-btn">Kembali</a>
         </p>
      </div>
   </section>
   <!--================ Blog Area end =================-->

    <?php require_once('footer.php'); ?>
