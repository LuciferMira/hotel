<?php ob_end_flush(); ?>
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                 Copyright &copy Code Explorer 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
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
    $("select[name=tipe]").on('change', () => {
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
        let price = $("select[name=tipe] option:selected").data('price') || 0;
        let pay = $('#pay').val() || 0;
        let chin = $('#in').val() || $('#in').val(year+"-"+month+"-"+day);
        let hr = $('#hr').val() || 1;
        let tomorrow = (d.getDate()+hr).toString();
        if(tomorrow<10){
          tomorrow = "0"+tomorrow;
        }
        let chout = $('#out').val() || $('#out').val(year+"-"+month+"-"+tomorrow);
        $('#total').val(jml * price * hr);
        $('#sisa').val($('#total').val() - pay);
    });
    $('#jml').on('change', () => {
        let jml = $('#jml').val() || 1;
        let price = $("select[name=tipe] option:selected").data('price') || 0;
        let pay = $('#pay').val() || 0;
        let hr = $('#hr').val() || 0;
        $('#total').val(jml * price * hr);
        $('#sisa').val($('#total').val() - pay);
    });
    $('#pay').on('change', () => {
        let jml = $('#jml').val() || 1;
        let price = $("select[name=tipe] option:selected").data('price') || 0;
        let pay = $('#pay').val() || 0;
        let hr = $('#hr').val() || 0;
        $('#total').val(jml * price * hr);
        $('#sisa').val($('#total').val() - pay);
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
        let price = $("select[name=tipe] option:selected").data('price') || 0;
        let pay = $('#pay').val() || 0;
        let hr = $('#hr').val() || 1;
        let tomorrow = (d.getDate()+parseInt(hr)).toString();
        if(tomorrow<10){
          tomorrow = "0"+tomorrow;
        }
        let chout = $('#out').val(year+"-"+month+"-"+tomorrow);
        $('#total').val(jml * price * hr);
        $('#sisa').val($('#total').val() - pay);
    });
  </script>
<!-- bootstap bundle js -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="assets/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="assets/vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->
<script src="assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>
