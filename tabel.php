<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Part 2 : Membuat table dengan Bootstrap</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="tabel.js"></script>
</head>
<body>
	<div class="container col-md-7">
	<h1>Cara Membuat table dengan Bootstrap | www.malasngoding.com</h1>
	<table class="table table-bordered table-striped" id="rowTable">
		<thead>
			<tr>
				<th class="col-md-1">No</th>
				<th class="col-md-3">Makanan</th>
				<th class="col-md-3">Harga</th>				
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Bakso</td>
				<td>12.000</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Mie Goreng</td>
				<td>7.000</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Nasi Goreng</td>
				<td>15.000</td>
			</tr>
			<tr>
				<td>4</td>
				<td>Sate Padang</td>
				<td>17.000</td>
			</tr>
			<tr>
				<td>5</td>
				<td>Nasi Soto</td>
				<td>20.000</td>
			</tr>
		</tbody>
	</table>
	<input id="addRow" type="button" value="Tambah Baris (+)" /> <input id="deleteRow" type="button" value="Hapus Baris (-)" />
	</div>
</body>
</html>