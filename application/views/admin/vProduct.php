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

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

		<!-- Icon Cards-->
<h1>Data <strong>Movie</strong></h1>
 
    <table class="table table-striped">
<thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Movie Name</th>
                <th>Movie Images</th>
                <th>Movie Price</th>
                <th>Movie Keyword</th>
                <th>Movie Description</th>
                <th colspan="2">Action</th>
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
                    <td><?php echo $tmpl->product_keyword; ?></td>
                    <td><?php echo $tmpl->product_desc; ?></td>
                    <td><a href="#" class="btn btn-info a-btn-slide-text">
        				<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        				<span><strong>Edit</strong></span>            
    					</a></td>
                    <td><a href="#" class="btn btn-dark a-btn-slide-text">
       					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        				<span><strong>Delete</strong></span>            
    					</a></td>
                </tr>
            <?php $i++;
            $numstart++; } ?>
        </tbody>
    </table>



		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->
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