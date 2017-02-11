<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--
Project      : Data Karyawan CRUD MySQLi (Create, read, Update, Delete) PHP, MySQLi dan Bootstrap
Author		 : Hakko Bio Richard, A.Md
Website		 : http://www.niqoweb.com
Blog         : http://www.acchoblues.blogspot.com
Email	 	 : hakkobiorichard[at]gmail.com
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Klustering K-means</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">Data</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="">Data</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Master Data</a></li>
					<li class="active"><a href="add.php">Tambah Data</a></li>
					<li class="active"><a href="proses.php">Proses Algoritma Klustering K-means</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<center><h2>Luas Panen, Rata-rata Produksi Padi Sawah Menurut Kecamatan di Kabupaten Sukoharjo</h2>
			</center>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$kd_kec = $_GET['kd_kec'];
				$cek = mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='$kd_kec'");
				if(mysql_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysql_query("DELETE FROM tb_kmeans WHERE kd_kec='$kd_kec'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
			
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Kode Kecamatan</th>
					<th>Kecamatan</th>
                    <th>Luas Panen (ha)</th>
                    <th>Produksi (ton)</th>
					<th>Produktivitas (kw/ha)</th>
					<th>Tools</th>
				</tr>
				<?php
				$sql = mysql_query("SELECT * FROM tb_kmeans ORDER BY kd_kec ASC");
				if(mysql_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
				}else{
					$no = 1;
					while($row = mysql_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['kd_kec'].'</td>
                            <td>'.$row['kecamatan'].'</td>
                            <td>'.$row['luas_panen'].'</td>
							<td>'.$row['produksi'].'</td>
                            <td>'.$row['produktivitas'].'</td>
							<td>	
								<a href="edit.php?kd_kec='.$row['kd_kec'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&kd_kec='.$row['kd_kec'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['kecamatan'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>