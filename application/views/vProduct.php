<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Movie List</title>
    <!--Load file bootstrap.css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<div class="container">
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
            <?php $i=1; ?>
            <?php foreach($tampil as $tmpl) {;?>
                <tr>
                	<td><?php echo $i; ?></td>
                    <td><?php echo $tmpl->cat_p_title; ?></td>
                    <td><?php echo $tmpl->product_title; ?></td>
                    <td><img src=".base_url(product_images/'.<?php echo$tmpl->product_img1;?>')." width="80px" height="80px" ></td>
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
            <?php $i++; } ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
        </div>
    </div>
      
 
</div>
<!--Load file bootstrap.js-->
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>

</body>
</html>