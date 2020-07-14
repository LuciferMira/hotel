<?php
  if(isset($_GET['stat'])){
    $stat = $_GET['stat'];
    $cls = "";
    $psn = "";

    if($stat == "input_success"){
      $cls = "alert alert-success";
      $psn = "Input success";
    }elseif($stat == "input_failed"){
      $cls = "alert alert-danger";
      $psn = "Input failed";
    }elseif($stat == "delete_success"){
      $cls = "alert alert-success";
      $psn = "Delete success";
    }elseif($stat == "delete_failed"){
      $cls = "alert alert-danger";
      $psn = "Delete failed";
    }elseif($stat == "update_success"){
      $cls = "alert alert-success";
      $psn = "Update success";
    }elseif($stat == "update_failed"){
      $cls = "alert alert-danger";
      $psn = "Update failed";
    }elseif($stat == "file_too_large"){
      $cls = "alert alert-danger";
      $psn = "Input Failed, File Size is Too Large";
    }elseif($stat == "file_ext"){
      $cls = "alert alert-danger";
      $psn = "Input Failed, File Extension is not Allowed";
    }elseif($stat == "unlink_failed"){
      $cls = "alert alert-danger";
      $psn = "Unlink Failed";
    }else{
      $cls = "alert alert-danger";
      $psn = "Error";
    }
  ?>
<!-- ALERT -->
<div class="<?php echo $cls; ?>" role="alert">
    <?php echo $psn; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- ALERT -->
<?php } ?>
