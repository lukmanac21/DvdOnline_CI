<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
    <meta charset="utf-8">
    <title>Movie List</title>
    <!--Load file bootstrap.css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id = "page-top">
	<?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

       <?php $this->load->view("admin/_partials/sidebar.php") ?>

       <div id="content-wrapper">

          <div class="container-fluid">
            <h1>New <strong>Movie</strong></h1>
            <br>
            <?php echo form_open_multipart('upload/upload_file'); ?>
            <div class="form-row">
                <div class="form-group col-md-6">
<!--                     <label for="inputptitle"  >Movie Name</label> -->
                    <input type="text" name="ptitle" class="form-control" id="ptitle" placeholder="Movie Name">
                </div>

                <div class="form-group col-md-6">
<!--                     <label for="inputpprice">Movie Price</label> -->
                    <input type="number" name="pprice" class="form-control" id="pprice" placeholder="Movie Price">
                </div>
            </div>
            <div class="form-row">
         <div class="form-group col-md-6">
            <!-- <label for="inputptitle"  >Movie Year Release</label> -->
             <input type="number" name="pyear" class="form-control" id="pyear" placeholder="Movie Year Release">
         </div>

            <div class="form-group col-md-6">
                <select class="form-control">
                    <?php 

                    foreach($groups as $row)
                    { 
                      echo '<option value="'.$row->cat_p_id.'">'.$row->cat_p_title.'</option>';
                  }
                  ?>
              </select>
          </div>
      </div>

          <div class="form-group">
             <textarea type="text-area" name="pdesc" class="form-control" id="pdesc" placeholder="Movie Descripton" rows="3"></textarea>
         </div>
          <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
      <br><br>

      <div class="form-group pull-right">
         <button type="submit" id="addmovie" class="btn btn-primary">Add New Movie</button>
     </div>
 </div>
 <?php echo form_close(); ?>


</form>
</div>
<!-- /.container-fluid -->

<!-- Sticky Footer -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>

</body>
</html>