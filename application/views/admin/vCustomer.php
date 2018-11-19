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
    <br>
    <br>
    <table id="table" class="table table-striped table-bordered table-dark" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Country</th>
                <th>Address</th>
                <th>Slider Images</th>
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
                    <td><?php echo $tmpl->customer_name; ?></td>
                    <td><?php echo $tmpl->customer_email; ?></td>
                    <td><?php echo $tmpl->phone_number; ?></td>
                    <td><?php echo $tmpl->city?></td>
                    <td><?php echo $tmpl->country?></td>
                    <td><?php echo $tmpl->address; ?></td>
                    <td><img src="<?= base_url ()?>assets/customer_images/<?php  echo $tmpl->image;?>" width="15%" class="img-thumbnail"></td>

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