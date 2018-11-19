<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
    <meta charset="utf-8">
    <title>Slider List</title>
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

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
    -->
    <?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

    <!-- Icon Cards-->
    <h1>Data <strong>Slider</strong></h1>
    <button class="btn btn-success" onclick=""><i class="fas fa-fw fa-plus"></i> Add Data</button>
    <br>
    <br>
    <table id="table" class="table table-striped table-bordered table-dark" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Explaination</th>
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
                    <td><?php echo $tmpl->cat_p_desc; ?></td>
                     <td><a class="btn btn-info a-btn-slide-text" data-toggle="modal" data-target="#edit<?php echo $tmpl->id_cat_p; ?>"><i class="fas fa-fw fa-edit"></i>        
            </a></td>
            <td><a href="#" class="btn btn-danger a-btn-slide-text" data-toggle="modal" data-target="#delete<?php echo $tmpl->id_cat_p; ?>">
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
            <h4 class="modal-title">New Category</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <?php echo form_open_multipart('admin/Product/addProduct'); ?>
            <div class="form-group">
              <input type="text" name="ctitle" class="form-control" id="ptitle" placeholder="Category Name">
            </div>
            <div class="form-group">
              <input type="text" name="ccat" class="form-control" id="pprice" placeholder="Category Description">
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
 <div class="modal fade" id="edit<?php echo $tmpl->id_cat_p;?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <div class="modal-header">
      <h4 class="modal-title">Edit Category</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <?php echo form_open_multipart('admin/Category/editCategory'); ?>
      <div class="form-group">
        <input type="hidden" name="pid" value="<?php echo $tmpl->id_cat_p; ?>">
        <input type="text" name="ctitle" class="form-control" id="ptitle" value="<?php echo $tmpl->cat_p_title; ?>">
      </div>
      <div class="form-group">
        <input type="text" name="ccat" class="form-control" id="pprice" value="<?php echo $tmpl->cat_p_desc; ?>">
      </div>           

  </div>
  <div class="modal-footer">
    <div class="form-group pull-right">
     <button type="submit" id="addcategory" class="btn btn-primary">Save</button>
   </div>
 </div>
 <?php echo form_close(); ?>
</div>
</div>
</div>
<div class="modal fade" id="delete<?php echo $tmpl->id_cat_p; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this category ?
      </div>
      <div class="modal-footer">
        <?php echo form_open('admin/Category/deleteCategory') ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="cdelete" value="<?php echo $tmpl->id_cat_p; ?>">
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