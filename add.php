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
			<h2>Data &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			mysql_connect("localhost","root","");
			mysql_select_db("db_kmeans");

			
				function autonumber($tabel, $kolom, $lebar=0, $awalan='')
					{
    					$query="select $kolom from $tabel order by $kolom desc limit 1";
    					$hasil=mysql_query($query);
    					$jumlahrecord = mysql_num_rows($hasil);
    					if($jumlahrecord == 0)
        					$nomor=1;
    					else{
   					        $row=mysql_fetch_array($hasil);
        					$nomor=intval(substr($row[0],strlen($awalan)))+1;
    				    }
    					if($lebar>0)
        					$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
    					else
        					$angka = $awalan.$nomor;
    						return $angka;
					}



			if(isset($_POST['add'])){
				$kd_kec		     = $_POST['kd_kec'];
				$kecamatan		 = $_POST['kecamatan'];
				$luas_panen	 	 = $_POST['luas_panen'];
				$produksi	     = $_POST['produksi'];
				$produktivitas   = $_POST['produktivitas'];
				
				$cek = mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='$kd_kec'");
				if(mysql_num_rows($cek) == 0){

						$insert = mysql_query("INSERT INTO tb_kmeans(kd_kec, kecamatan, luas_panen, produksi, produktivitas)
															VALUES('$kd_kec','$kecamatan', '$luas_panen', '$produksi', '$produktivitas')") or die(mysql_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
					}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Kecamatan Sudah Ada..!</div>';
				}
			}
			?>
			
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Kode Kecamatan :</label>
					<div class="col-sm-2">
						<input type="text" name="kd_kec" class="form-control" value="<?=autonumber("tb_kmeans","kd_kec",4,"KEC")?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Kecamatan :</label>
					<div class="col-sm-2">
							<select name="kecamatan" class="form-control" required>
							<option value="">Pilih Kecamatan</option>
                			<option value="Weru">Weru</option>
                			<option value="Bulu">Bulu</option>
                			<option value="Tawangsari">Tawangsari</option>
                			<option value="Sukoharjo">Sukoharjo</option>
                			<option value="Nguter">Nguter</option>
                			<option value="Bendosari">Bendosari</option>
                			<option value="Sukoharjo">Polokarto</option>
                			<option value="Mojolaban">Mojolaban</option>
                			<option value="Grogol">Grogol</option>
                			<option value="Baki">Baki</option>
                			<option value="Gatak">Gatak</option>
                			<option value="Kartasura">Kartasura</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Luas Panen (ha) :</label>
					<div class="col-sm-4">
						<input type="text" name="luas_panen" class="form-control" placeholder="Luas Panen (ha)" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Produksi (ton) :</label>
					<div class="col-sm-4">
						<input type="text" name="produksi" class="form-control" placeholder="Produksi (ton)" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Produktivitas (kw/ha) :</label>
					<div class="col-sm-3">
						<input name="produktivitas" class="form-control" placeholder="Produktivitas (kw/ha)" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
						<a href="index.php" class="btn btn-sm btn-danger">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>