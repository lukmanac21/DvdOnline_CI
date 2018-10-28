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
                <th>Date Create</th>
                <th>Slider Name</th>
                <th>Slider Images</th>
                <th>Slider Status</th>
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
                    <td><?php echo $tmpl->date_created; ?></td>
                    <td><?php echo $tmpl->slide_name; ?></td>
                    <td><img src="<?= base_url ()?>assets/slider_images/<?php  echo $tmpl->slide_images;?>" width="15%" class="img-thumbnail"></td>
                    <td><?php echo $tmpl->slider_status; ?></td>
                    <td><a href="#" class="btn btn-info a-btn-slide-text">
                        <span class="fas fa-fw fa-edit" aria-hidden="true"></span>
                        <span></span>            
                    </a></td>
                    <td><a href="#" class="btn btn-danger a-btn-slide-text">
                        <span class="fas fa-fw fa-trash" aria-hidden="true"></span>
                        <span></span>            
                    </a></td>
                </tr>
                <?php $i++;
                $numstart++; } ?>
            </tbody>
        </table>



    </div>

    <script type="text/javascript">
        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax 
        }
</script>
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