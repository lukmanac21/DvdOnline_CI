<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	echo "<h1>Halaman Mhs</h1>
	<table>
			<tr>
    			<th>Nrp</th>
    			<th>Nama</th>
    			<th>Action</th>
    		</tr>";
	foreach($m as $row){
		$editLink = "<a href ='/dvdOnline/index.php/mahasiswa/show/$row->nrp/$row->nama'>Edit</a>";
	echo "
			<tr>
				<td>$row->nrp</td>
				<td>$row->nama</td>
				<td>$editLink</td
			</tr>";
}
?>

</body>
</html>
