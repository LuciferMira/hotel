<?php
  require_once('head.php');
  $title = "Hotel | Home Page"
?>
  <title><?php echo $title; ?></title>
  <!-- slider_area_start -->
  <div class="slider_area">
      <div class="slider_active owl-carousel">
          <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="slider_text text-center">
                              <h3>Selamat Datang</h3>
                              <p>Di website booking kamar hotel</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="single_slider  d-flex align-items-center justify-content-center slider_bg_2">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="slider_text text-center">
                              <h3>Selamat Datang</h3>
                              <p>Di website booking kamar hotel</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- slider_area_end -->
    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>Tentang Kami</span>
                            <h3>Hotel Mewah Dengan  <br>
                                Pemandangan Alamnya Nan Indah</h3>
                        </div>
                        <p>Hotel sederhana dan fleksibel yang menyuguhkan penamdangan alam yang indah
                            dan didedikasikan untuk menyediakan layanan dari hati,
                            standar tanpa kompromi untuk keselamatan dan kebersihan,
                            dan memberi kepuasan kepada para travelers.</p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb d-flex">
                        <div class="img_1">
                            <img src="assets/img/about/about_1.png" alt="">
                        </div>
                        <div class="img_2">
                            <img src="assets/img/about/about_2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- offers_area_start -->
    <div class="offers_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>Kamar Yang Disediakan</h3>
                    </div>
                </div>
            </div>
            <div class="row">
              <?php
                $calltipe = mysqli_query($con, "SELECT * FROM tbl_tipe ORDER BY id_tipe");
                while($datat = mysqli_fetch_array($calltipe)){
              ?>
                <div class="col-xl-4 col-md-4">
                    <div class="single_offers">
                        <div class="about_thumb">
                            <img src="admin/assets/gmb/<?php echo $datat['foto']; ?>" alt="">
                        </div>
                        <h3 style="text-align: center;"><?php echo $datat['nama_tipe']; ?> Room</h3>
                        <ul>
                            <!-- <li>3 Orang Dewasa & 2 Anak-anak</li>
                            <li>Pemandangan Laut</li> -->
                            <?php echo $datat['deskripsi']; ?>
                        </ul>
                        <a href="booking.php?id=<?php echo $datat['id_tipe']; ?>" class="book_now">book now</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- offers_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb2 d-flex">
                        <div class="img_1">
                            <img src="assets/img/about/1.png" alt="">
                        </div>
                        <div class="img_2">
                            <img src="assets/img/about/2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>Delicious Food</span>
                            <h3>Kami Menyajikan Makanan Segar Dan <br>
                                Lezat</h3>
                        </div>
                        <p>Hotel kami juga menyediakan makanan yang tentu saja lezat dan berasan dari bahan yang masih sangat segar bagi demi menjaga kepuasan para pelanggan kami.
                            Dan kami juga memilih bahan makanan yang berkualitas bagi para pelanggan kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <!-- forQuery_start -->
    <!-- <div class="forQuery">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-md-12">
                    <div class="Query_border">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="Query_text">
                                    <p>Hubungi Kami</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="phone_num">
                                    <a href="#" class="mobile_no">+10 576 377 4789</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- forQuery_end-->

    <?php require_once('footer.php'); ?>
