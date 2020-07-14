<?php ob_end_flush(); ?>
<!-- footer -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Alamat
                        </h3>
                        <p class="footer_text"> Jalan Tribata No. 2 Cempaka Permai, Gading Cempaka, <br>
                            Bengkulu, Provinsi Bengkulu</p>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Navigation
                        </h3>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
        </div>
    </div>
</footer>

<!-- link that opens popup -->

<!-- JS here -->
<script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="admin/assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">

function reset(){
  var baru = document.getElementById("br");
  var lama = document.getElementById("lm");
  var nama = document.getElementById("nama");
  var email = document.getElementById("email");
  var lk = document.getElementById("lk");
  var pr = document.getElementById("pr");
  var tipe = document.getElementById("tipe");
  var jml = document.getElementById("jml");
  var chin = document.getElementById("in");
  var chout = document.getElementById("out");
  var total = document.getElementById("total");
  var pay = document.getElementById("pay");
  var sisa = document.getElementById("sisa");

  email.value="";
  email.disabled=true;
  nama.value="";
  nama.disabled=true;
  baru.checked=false;
  lama.checked=false;
  tipe.selected="--Pilih Tipe Kamar--";
  jml.value=0;
  chin.value="";
  chout.value="";
  total.value="";
  pay.value="";
  sisa.value="";
  // lk.checked=false;
  // pr.checked=false;
}
function EnableDisableTextBox() {
        var baru = document.getElementById("br");
        var nama = document.getElementById("nama");
        var email = document.getElementById("email");
        // var lk = document.getElementById("lk");
        // var pr = document.getElementById("pr");
        if(baru.checked==true){
          nama.value="";
          email.value="";
          // lk.disabled=false;
          // pr.disabled=false;
          nama.disabled=false;
          email.disabled=false;
          email.focus();
        }else if(baru.checked==false){
          nama.value="";
          email.value="";
          // lk.disabled=true;
          // pr.disabled=true;
          nama.disabled=true;
          email.disabled=false;
          email.focus();
        }else{
          alert('Error');
        }
    }
    function isi_otomatis(){
        var email = $("#email").val();
        $.ajax({
            url: 'auto_data.php',
            data:"email="+email ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nama').val(obj.nama);
            $('#lk').checked();
        });
    }
    $('#jml').on('change', () => {
      let d = new Date();
      let day = d.getDate().toString();
      let month = (d.getMonth()+1).toString();
      let year = d.getFullYear().toString();
      if(day<10){
        day = "0"+day;
      }


      if(month<10){
        month = "0"+month;
      }
        let jml = $('#jml').val() || 1;
        let price = $("#price").val() || 0;
        let pay = $('#pay').val() || 0;
        let hr = $('#hr').val() || 1;
        let tomorrow = (d.getDate()+parseInt(hr)).toString();
        if(tomorrow<10){
          tomorrow = "0"+tomorrow;
        }
        let chout = $('#out').val(year+"-"+month+"-"+tomorrow);
        $('#total').val(jml * price * hr);
    });
    $('#pay').on('change', () => {
        let jml = $('#jml').val() || 1;
        let price = $("#price").val() || 0;
        let pay = $('#pay').val() || 0;
        let hr = $('#hr').val() || 0;
        $('#total').val(jml * price * hr);
    });
    $('#hr').on('change', () => {
      let d = new Date();
      let day = d.getDate().toString();
      let month = (d.getMonth()+1).toString();
      let year = d.getFullYear().toString();
      if(day<10){
        day = "0"+day;
      }


      if(month<10){
        month = "0"+month;
      }
        let jml = $('#jml').val() || 1;
        let price = $("#price").val() || 0;
        let pay = $('#pay').val() || 0;
        let hr = $('#hr').val() || 1;
        let tomorrow = (d.getDate()+parseInt(hr)).toString();
        if(tomorrow<10){
          tomorrow = "0"+tomorrow;
        }
        let chout = $('#out').val(year+"-"+month+"-"+tomorrow);
        $('#total').val(jml * price * hr);
    });
  </script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/ajax-form.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/scrollIt.js"></script>
<script src="assets/js/jquery.scrollUp.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/nice-select.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/gijgo.min.js"></script>

<!--contact js-->
<script src="assets/js/contact.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/mail-script.js"></script>

<script src="assets/js/main.js"></script>
<script>
    $('#datepicker').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
         rightIcon: '<span class="fa fa-caret-down"></span>'
     }
    });
    $('#datepicker2').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
         rightIcon: '<span class="fa fa-caret-down"></span>'
     }

    });
</script>



</body>

</html>
