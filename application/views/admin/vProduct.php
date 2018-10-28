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
  <link href="<?php echo base_url().'assets/datatables/css/dataTables.bootstrap.css'?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id = "page-top">
	<?php $this->load->view("admin/_partials/navbar.php") ?>
  <div id="wrapper">

   <?php $this->load->view("admin/_partials/sidebar.php") ?>

   <div id="content-wrapper">

    <div class="container-fluid">
      <h1>Data <strong>Movie</strong></h1>
      <button class="btn btn-success" data-toggle="modal" data-target="#addProduct" onclick=""><i class="fas fa-fw fa-plus"></i> Add Data</button>
      <br>
      <br>

      <table id="table" class="table table-striped table-bordered table-active" cellspacing="0" width="100%">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Category</th>
            <th>Movie Name</th>
            <th>Movie Images</th>
            <th>Movie Price</th>
            <th>Movie Release</th>
            <th>Movie Description</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <!--Fetch data dari database-->
          <?php $i=1;
          $numstart = $this->uri->segment(4) + 1;
          ?>
          <?php foreach($tampil as $tmpl) {;?>
            <tr>
             <td><?php echo $numstart; ?></td>
             <td><?php echo $tmpl->cat_p_title; ?></td>
             <td><?php echo $tmpl->product_title; ?></td>
             <td><img src="<?= base_url ()?>assets/product_images/<?php  echo $tmpl->product_img1;?>" width="80px" height="80px" class="img-thumbnail"></td>
             <td><?php echo $tmpl->product_price; ?></td>
             <td><?php echo $tmpl->product_release; ?></td>
             <td><?php echo $tmpl->product_desc; ?></td>
             <td><a class="btn btn-info a-btn-slide-text" data-toggle="modal" data-target="#edit<?php echo $tmpl->id_product; ?>"><i class="fas fa-fw fa-edit"></i>        
            </a></td>
            <td><a href="#" class="btn btn-danger a-btn-slide-text" data-toggle="modal" data-target="#delete<?php echo $tmpl->id_product; ?>">
              <i class="fas fa-fw fa-trash"></i>
            </a></td>
          </tr>
          <?php $i++;
          $numstart++; } ?>
        </tbody>
      </table>
      <div class="modal fade" id="addProduct">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
           <div class="modal-header">
            <h4 class="modal-title">New Movie</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <?php echo form_open_multipart('admin/Product/addProduct'); ?>
            <div class="form-group">
              <input type="text" name="ptitle" class="form-control" id="ptitle" placeholder="Movie Name">
            </div>
            <div class="form-group">
              <input type="number" name="pprice" class="form-control" id="pprice" placeholder="Movie Price">
            </div>           
            <div class="form-group">
              <input type="number" name="pyear" class="form-control" id="pyear" placeholder="Movie Year Release">
            </div>

            <div class="form-group">
              <select class="form-control" id="pcat" name="pcat" placeholder="Movie Category">
                <?php 
                foreach ($groups as $row) {
                  echo "<option value='".$row->id_cat_p."'>".$row->cat_p_title."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
             <textarea type="text-area" name="pdesc" class="form-control" id="pdesc" placeholder="Movie Descripton" rows="3"></textarea>
           </div>
           <div class="custom-file">
            <input type="file" class="custom-file-input" id="pimages" name="pimages">
            <label class="custom-file-label" for="pimages">Choose file</label>
          </div>
        </div>
        <div class="modal-footer">
          <div class="form-group pull-right">
           <button type="submit" id="addmovie" class="btn btn-primary">Add New Movie</button>
         </div>
       </div>
       <?php echo form_close(); ?>
     </div>
   </div>
 </div>
 <?php foreach($tampil as $tmpl) {;?>
 <div class="modal fade" id="edit<?php echo $tmpl->id_product;?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header">
      <h4 class="modal-title">Edit Movie</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <?php echo form_open_multipart('admin/Product/editProduct'); ?>
      <div class="form-group">
        <input type="hidden" name="pid" value="<?php echo $tmpl->id_product; ?>">
        <input type="text" name="ptitle" class="form-control" id="ptitle" value="<?php echo $tmpl->product_title; ?>">
      </div>
      <div class="form-group">
        <input type="number" name="pprice" class="form-control" id="pprice" value="<?php echo $tmpl->product_price; ?>">
      </div>           
      <div class="form-group">
        <input type="number" name="pyear" class="form-control" id="pyear" placeholder="Movie Year Release" value="<?php echo $tmpl->product_release; ?>">
      </div>

      <div class="form-group">
        <select class="form-control" id="pcat" name="pcat" placeholder="Movie Category">
          <?php 
          foreach ($groups as $row) {
            echo "<option value='".$row->id_cat_p."'>".$row->cat_p_title."</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
       <textarea type="text-area" name="pdesc" class="form-control" id="pdesc" placeholder="Movie Descripton" rows="3"><?php echo $tmpl->product_desc; ?></textarea>
     </div>
     <div class="custom-file">
      <input type="file" class="custom-file-input" id="pimages" name="pimages" required>
      <label class="custom-file-label" for="pimages">Choose file</label>
    </div>
  </div>
  <div class="modal-footer">
    <div class="form-group pull-right">
     <button type="submit" id="addmovie" class="btn btn-primary">Add New Movie</button>
   </div>
 </div>
 <?php echo form_close(); ?>
</div>
</div>
</div>
<div class="modal fade" id="delete<?php echo $tmpl->id_product; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this movie ?
      </div>
      <div class="modal-footer">
        <?php echo form_open('admin/Product/deleteProduct') ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="pidelete" value="<?php echo $tmpl->id_product; ?>">
        <button type="submit" class="btn btn-primary">Delete</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</div>
<?php $this->load->view("admin/_partials/footer.php") ?>
<div class="row">
  <div class="col">
    <!--Tampilkan pagination-->
    <?php echo $pagination; ?>
  </div>
</div>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>

</body>
</html>