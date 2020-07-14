<?php
  require_once('head.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $callkamar = mysqli_query($con, "SELECT * FROM tbl_tipe WHERE id_tipe='$id'");
    $num_sewa = mysqli_query($con, "SELECT COUNT(id_tipe) as book WHERE status='book' AND id_tipe='$id'");
    $data = mysqli_fetch_array($callkamar);
    if($num_sewa==null){
      $datab="";
    }else{
      $datab = mysqli_fetch_array($num_sewa);
    }
  }
  $title = "Hotel | Room Type ".$data['nama_tipe'];
?>
  <title><?php echo $title; ?></title>

  <!-- bradcam_area_start -->
  <div class="bradcam_area breadcam_bg">
      <h3><?php echo $data['nama_tipe']; ?> Room</h3>
  </div>
  <!-- bradcam_area_end -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="admin/assets/gmb/<?php echo $data['foto']; ?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?php echo $data['nama_tipe']; ?> Room</h2>
                     <p class="excert">
                        Fasilitas terdiri dari:<br> <?php echo $data['deskripsi']; ?><br>
                        Harga hanya <?php echo $data['tarif']; ?>/Hari<br>
                        Kamar yang tersedia :
                        <?php if($datab==null){
                          echo $data['kamar_tersedia'];
                        }else{
                          echo intval($data['kamar_tersedia'])-intval($datab['book']);
                        }?>
                     </p>
                  </div>
               </div>
               <!-- <div class="navigation-top">
                  <div class="navigation-area">
                     <div class="row">
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                           <div class="thumb">
                              <a href="deluxe.html">
                                 <img class="img-fluid" src="assets/img/offers/1.png" alt="" width="60px" height="60px">
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="deluxe.html">
                                 <span class="lnr text-white ti-arrow-left"></span>
                              </a>
                           </div>
                           <div class="detials">
                              <p>Prev Post</p>
                              <a href="deluxe.html">
                                 <h4>Deluxe Room</h4>
                              </a>
                           </div>
                        </div>
                        <div
                           class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                           <div class="detials">
                              <p>Next Post</p>
                              <a href="signature.html">
                                 <h4>Couple Room</h4>
                              </a>
                           </div>
                           <div class="arrow">
                              <a href="signature.html">
                                 <span class="lnr text-white ti-arrow-right"></span>
                              </a>
                           </div>
                           <div class="thumb">
                            <a href="signature.html">
                                <img class="img-fluid" src="assets/img/offers/2.png" alt="" width="60px" height="60px">
                             </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Kategori Kamar</h4>
                     <ul class="list cat-list">
                        <li>
                           <a href="deluxe.html" class="d-flex">
                              <p>Deluxe Room</p>
                           </a>
                        </li>
                        <li>
                           <a href="signature.html" class="d-flex">
                              <p>Signature Room</p>
                           </a>
                        </li>
                        <li>
                           <a href="couple.html" class="d-flex">
                              <p>Couple Room</p>
                           </a>
                        </li>
                     </ul>
                  </aside>
               </div>
            </div>
         </div>
      </div> -->
   </section>
   <!--================ Blog Area end =================-->

    <?php require_once('footer.php'); ?>
