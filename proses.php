<?php
include "koneksi.php";

$hapus1=mysql_query("DELETE FROM c1_1");
$hapus2=mysql_query("DELETE FROM c1_2"); 
$hapus3=mysql_query("DELETE FROM c1_3"); 

$hapus4=mysql_query("DELETE FROM c2_1"); 
$hapus5=mysql_query("DELETE FROM c2_2"); 
$hapus6=mysql_query("DELETE FROM c2_3"); 

$hapus7=mysql_query("DELETE FROM c3_1"); 
$hapus8=mysql_query("DELETE FROM c3_2"); 
$hapus9=mysql_query("DELETE FROM c3_2"); 


echo "<b>Centroid Awal</b>";
echo "<table border=1><tr bgcolor=orange>
<td><b><center>Cluster</td>
<td><b><center>Kecamatan</td>
<td><b><center>Luas Panen</td>
<td><b><center>Produksi</td>
<td><b><center>Produktivitas</td>
</tr>";
$queryk=mysql_query("SELECT * FROM tb_kmeans ORDER BY kd_kec LIMIT 3");
$i=1;
while($var=mysql_fetch_array($queryk)){
echo "<tr>
<td>C$i</td>
<td>$var[kecamatan]</td>
<td>$var[luas_panen]</td>
<td>$var[produksi]</td>
<td>$var[produktivitas]</td>
</tr>";
$i++;
}

$row1=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0001' ");
$satu=mysql_fetch_array($row1);
$row2=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0002' ");
$dua=mysql_fetch_array($row2);
$row3=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0003' ");
$ti=mysql_fetch_array($row3);
$row4=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0004' ");
$pa=mysql_fetch_array($row4);
$row5=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0005' ");
$ma=mysql_fetch_array($row5);
$row6=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0006' ");
$nam=mysql_fetch_array($row6);
$row7=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0007' ");
$tu=mysql_fetch_array($row7);
$row8=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0008' ");
$la=mysql_fetch_array($row8);
$row9=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0009' ");
$se=mysql_fetch_array($row9);
$row10=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0010' ");
$lu=mysql_fetch_array($row10);
$row11=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0011' ");
$seb=mysql_fetch_array($row11);
$row12=mysql_query("SELECT * FROM tb_kmeans WHERE kd_kec='KEC0012' ");
$dul=mysql_fetch_array($row12);

$c1x=$satu['luas_panen'];
$c1y=$satu['produksi'];
$c1z=$satu['produktivitas'];
$c2x=$dua['luas_panen'];
$c2y=$dua['produksi'];
$c2z=$dua['produktivitas'];
$c3x=$ti['luas_panen'];
$c3y=$ti['produksi'];
$c3z=$ti['produktivitas'];

$jx1= sqrt(pow($satu['luas_panen'] - $c1x, 2)+ pow($satu['produksi'] - $c1y, 2) + pow($satu['produktivitas'] - $c1z, 2));
$jy1= sqrt(pow($satu['luas_panen'] - $c2x, 2)+ pow($satu['produksi'] - $c2y, 2) + pow($satu['produktivitas'] - $c2z, 2));
$jz1= sqrt(pow($satu['luas_panen'] - $c3x, 2)+ pow($satu['produksi'] - $c3y, 2) + pow($satu['produktivitas'] - $c3z, 2));

$jx2= sqrt(pow($dua['luas_panen'] - $c1x, 2)+ pow($dua['produksi'] - $c1y, 2) + pow($dua['produktivitas'] - $c1z, 2));
$jy2= sqrt(pow($dua['luas_panen'] - $c2x, 2)+ pow($dua['produksi'] - $c2y, 2) + pow($dua['produktivitas'] - $c2z, 2));
$jz2= sqrt(pow($dua['luas_panen'] - $c3x, 2)+ pow($dua['produksi'] - $c3y, 2) + pow($dua['produktivitas'] - $c3z, 2));

$jx3= sqrt(pow($ti['luas_panen'] - $c1x, 2)+ pow($ti['produksi'] - $c1y, 2) + pow($ti['produktivitas'] - $c1z, 2));
$jy3= sqrt(pow($ti['luas_panen'] - $c2x, 2)+ pow($ti['produksi'] - $c2y, 2) + pow($ti['produktivitas'] - $c2z, 2));
$jz3= sqrt(pow($ti['luas_panen'] - $c3x, 2)+ pow($ti['produksi'] - $c3y, 2) + pow($ti['produktivitas'] - $c3z, 2));

$jx4= sqrt(pow($pa['luas_panen'] - $c1x, 2)+ pow($pa['produksi'] - $c1y, 2) + pow($pa['produktivitas'] - $c1z, 2));
$jy4= sqrt(pow($pa['luas_panen'] - $c2x, 2)+ pow($pa['produksi'] - $c2y, 2) + pow($pa['produktivitas'] - $c2z, 2));
$jz4= sqrt(pow($pa['luas_panen'] - $c3x, 2)+ pow($pa['produksi'] - $c3y, 2) + pow($pa['produktivitas'] - $c3z, 2));

$jx5= sqrt(pow($ma['luas_panen'] - $c1x, 2)+ pow($ma['produksi'] - $c1y, 2) + pow($ma['produktivitas'] - $c1z, 2));
$jy5= sqrt(pow($ma['luas_panen'] - $c2x, 2)+ pow($ma['produksi'] - $c2y, 2) + pow($ma['produktivitas'] - $c2z, 2));
$jz5= sqrt(pow($ma['luas_panen'] - $c3x, 2)+ pow($ma['produksi'] - $c3y, 2) + pow($ma['produktivitas'] - $c3z, 2));

$jx6= sqrt(pow($nam['luas_panen'] - $c1x, 2)+ pow($nam['produksi'] - $c1y, 2) + pow($nam['produktivitas'] - $c1z, 2));
$jy6= sqrt(pow($nam['luas_panen'] - $c2x, 2)+ pow($nam['produksi'] - $c2y, 2) + pow($nam['produktivitas'] - $c2z, 2));
$jz6= sqrt(pow($nam['luas_panen'] - $c3x, 2)+ pow($nam['produksi'] - $c3y, 2) + pow($nam['produktivitas'] - $c3z, 2));

$jx7= sqrt(pow($tu['luas_panen'] - $c1x, 2)+ pow($tu['produksi'] - $c1y, 2) + pow($tu['produktivitas'] - $c1z, 2));
$jy7= sqrt(pow($tu['luas_panen'] - $c2x, 2)+ pow($tu['produksi'] - $c2y, 2) + pow($tu['produktivitas'] - $c2z, 2));
$jz7= sqrt(pow($tu['luas_panen'] - $c3x, 2)+ pow($tu['produksi'] - $c3y, 2) + pow($tu['produktivitas'] - $c3z, 2));

$jx8= sqrt(pow($la['luas_panen'] - $c1x, 2)+ pow($la['produksi'] - $c1y, 2) + pow($la['produktivitas'] - $c1z, 2));
$jy8= sqrt(pow($la['luas_panen'] - $c2x, 2)+ pow($la['produksi'] - $c2y, 2) + pow($la['produktivitas'] - $c2z, 2));
$jz8= sqrt(pow($la['luas_panen'] - $c3x, 2)+ pow($la['produksi'] - $c3y, 2) + pow($la['produktivitas'] - $c3z, 2));

$jx9= sqrt(pow($se['luas_panen'] - $c1x, 2)+ pow($se['produksi'] - $c1y, 2) + pow($se['produktivitas'] - $c1z, 2));
$jy9= sqrt(pow($se['luas_panen'] - $c2x, 2)+ pow($se['produksi'] - $c2y, 2) + pow($se['produktivitas'] - $c2z, 2));
$jz9= sqrt(pow($se['luas_panen'] - $c3x, 2)+ pow($se['produksi'] - $c3y, 2) + pow($se['produktivitas'] - $c3z, 2));

$jx10= sqrt(pow($lu['luas_panen'] - $c1x, 2)+ pow($lu['produksi'] - $c1y, 2) + pow($lu['produktivitas'] - $c1z, 2));
$jy10= sqrt(pow($lu['luas_panen'] - $c2x, 2)+ pow($lu['produksi'] - $c2y, 2) + pow($lu['produktivitas'] - $c2z, 2));
$jz10= sqrt(pow($lu['luas_panen'] - $c3x, 2)+ pow($lu['produksi'] - $c3y, 2) + pow($lu['produktivitas'] - $c3z, 2));

$jx11= sqrt(pow($seb['luas_panen'] - $c1x, 2)+ pow($seb['produksi'] - $c1y, 2) + pow($seb['produktivitas'] - $c1z, 2));
$jy11= sqrt(pow($seb['luas_panen'] - $c2x, 2)+ pow($seb['produksi'] - $c2y, 2) + pow($seb['produktivitas'] - $c2z, 2));
$jz11= sqrt(pow($seb['luas_panen'] - $c3x, 2)+ pow($seb['produksi'] - $c3y, 2) + pow($seb['produktivitas'] - $c3z, 2));

$jx12= sqrt(pow($dul['luas_panen'] - $c1x, 2)+ pow($dul['produksi'] - $c1y, 2) + pow($dul['produktivitas'] - $c1z, 2));
$jy12= sqrt(pow($dul['luas_panen'] - $c2x, 2)+ pow($dul['produksi'] - $c2y, 2) + pow($dul['produktivitas'] - $c2z, 2));
$jz12= sqrt(pow($dul['luas_panen'] - $c3x, 2)+ pow($dul['produksi'] - $c3y, 2) + pow($dul['produktivitas'] - $c3z, 2));


if ($jx1<$jy1 && $jx1<$jz1){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$satu[luas_panen]','$satu[produksi]','$satu[produktivitas]')");
	$ket='C1';
} elseif ($jy1<$jx1 && $jy1<$jz1){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$satu[luas_panen]','$satu[produksi]','$satu[produktivitas]')");
	$ket='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$satu[luas_panen]','$satu[produksi]','$satu[produktivitas]')");
	$ket='C3';
}


if ($jx2<$jy2 && $jx2<$jz2){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$dua[luas_panen]','$dua[produksi]','$dua[produktivitas]')");
	$ket2='C1';
} elseif ($jy2<$jx2 && $jy2<$jz2){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$dua[luas_panen]','$dua[produksi]','$dua[produktivitas]')");
	$ket2='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$dua[luas_panen]','$dua[produksi]','$dua[produktivitas]')");
	$ket2='C3';
}


if ($jx3<$jy3 && $jx3<$jz3){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$ti[luas_panen]','$ti[produksi]','$ti[produktivitas]')");
	$ket3='C1';
} elseif ($jy3<$jx3 && $jy3<$jz3){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$ti[luas_panen]','$ti[produksi]','$ti[produktivitas]')");
	$ket3='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$ti[luas_panen]','$ti[produksi]','$ti[produktivitas]')");
	$ket3='C3';
}


if ($jx4<$jy4 && $jx4<$jz4){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$pa[luas_panen]','$pa[produksi]','$pa[produktivitas]')");
	$ket4='C1';
} elseif ($jy4<$jx4 && $jy4<$jz4){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$pa[luas_panen]','$pa[produksi]','$pa[produktivitas]')");
	$ket4='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$pa[luas_panen]','$pa[produksi]','$pa[produktivitas]')");
	$ket4='C3';
}


if ($jx5<$jy5 && $jx5<$jz5){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$ma[luas_panen]','$ma[produksi]','$ma[produktivitas]')");
	$ket5='C1';
} elseif ($jy5<$jx5 && $jy5<$jz5){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$ma[luas_panen]','$ma[produksi]','$ma[produktivitas]')");
	$ket5='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$ma[luas_panen]','$ma[produksi]','$ma[produktivitas]')");
	$ket5='C3';
}


if ($jx6<$jy6 && $jx6<$jz6){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$nam[luas_panen]','$nam[produksi]','$nam[produktivitas]')");
	$ket6='C1';
} elseif ($jy6<$jx6 && $jy6<$jz6){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$nam[luas_panen]','$nam[produksi]','$nam[produktivitas]')");
	$ket6='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$nam[luas_panen]','$nam[produksi]','$nam[produktivitas]')");
	$ket6='C3';
}


if ($jx7<$jy7 && $jx7<$jz7){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$tu[luas_panen]','$tu[produksi]','$tu[produktivitas]')");
	$ket7='C1';
} elseif ($jy7<$jx7 && $jy7<$jz7){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$tu[luas_panen]','$tu[produksi]','$tu[produktivitas]')");
	$ket7='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$tu[luas_panen]','$tu[produksi]','$tu[produktivitas]')");
	$ket7='C3';
}


if ($jx8<$jy8 && $jx8<$jz8){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$la[luas_panen]','$la[produksi]','$la[produktivitas]')");
	$ket8='C1';
} elseif ($jy8<$jx8 && $jy8<$jz8){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$la[luas_panen]','$la[produksi]','$la[produktivitas]')");
	$ket8='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$la[luas_panen]','$la[produksi]','$la[produktivitas]')");
	$ket8='C3';
}


if ($jx9<$jy9 && $jx9<$jz9){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$se[luas_panen]','$se[produksi]','$se[produktivitas]')");
	$ket9='C1';
} elseif ($jy9<$jx9 && $jy9<$jz9){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$se[luas_panen]','$se[produksi]','$se[produktivitas]')");
	$ket9='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$se[luas_panen]','$se[produksi]','$se[produktivitas]')");
	$ket9='C3';
}


if ($jx10<$jy10 && $jx10<$jz10){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$lu[luas_panen]','$lu[produksi]','$lu[produktivitas]')");
	$ket10='C1';
} elseif ($jy10<$jx10 && $jy10<$jz10){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$lu[luas_panen]','$lu[produksi]','$lu[produktivitas]')");
	$ket10='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$lu[luas_panen]','$lu[produksi]','$lu[produktivitas]')");
	$ket10='C3';
}


if ($jx11<$jy11 && $jx11<$jz11){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$seb[luas_panen]','$seb[produksi]','$seb[produktivitas]')");
	$ket11='C1';
} elseif ($jy11<$jx11 && $jy11<$jz11){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$seb[luas_panen]','$seb[produksi]','$seb[produktivitas]')");
	$ket11='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$seb[luas_panen]','$seb[produksi]','$seb[produktivitas]')");
	$ket11='C3';
}


if ($jx12<$jy12 && $jx12<$jz12){
	//$jx1="$cluster1[]";
	mysql_query("INSERT INTO c1_1(x,y,z) VALUE('$dul[luas_panen]','$dul[produksi]','$dul[produktivitas]')");
	$ket12='C1';
} elseif ($jy12<$jx12 && $jy12<$jz12){
	//$jy1="$cluster2[]";
	mysql_query("INSERT INTO c2_1(x,y,z) VALUE('$dul[luas_panen]','$dul[produksi]','$dul[produktivitas]')");
	$ket12='C2';
} else {
	mysql_query("INSERT INTO c3_1(x,y,z) VALUE('$dul[luas_panen]','$dul[produksi]','$dul[produktivitas]')");
	$ket12='C3';
}


echo "<table border=1><tr bgcolor=orange>
<td><b><center>No</td>
<td><b><center>Jarak C1</td>
<td><b><center>Jarak C2</td>
<td><b><center>Jarak C3</td>
<td><b><center>Cluster</td>
</tr></br></br>";
echo "<b>Jarak Data dengan Pusat Cluster</b>";
echo "<tr>
<td>1</td>
<td>$jx1</td>
<td>$jy1</td>
<td>$jz1</td>
<td>$ket</td>
</tr>
<tr>
<td>2</td>
<td>$jx2</td>
<td>$jy2</td>
<td>$jz2</td>
<td>$ket2</td>
</tr>
<tr>
<td>3</td>
<td>$jx3</td>
<td>$jy3</td>
<td>$jz3</td>
<td>$ket3</td>
</tr>
<tr>
<td>4</td>
<td>$jx4</td>
<td>$jy4</td>
<td>$jz4</td>
<td>$ket4</td>
</tr>
<tr>
<td>5</td>
<td>$jx5</td>
<td>$jy5</td>
<td>$jz5</td>
<td>$ket5</td>
</tr>
<tr>
<td>6</td>
<td>$jx6</td>
<td>$jy6</td>
<td>$jz6</td>
<td>$ket6</td>
</tr>
<tr>
<td>7</td>
<td>$jx7</td>
<td>$jy7</td>
<td>$jz7</td>
<td>$ket7</td>
</tr>
<tr>
<td>8</td>
<td>$jx8</td>
<td>$jy8</td>
<td>$jz8</td>
<td>$ket8</td>
</tr>
<tr>
<td>9</td>
<td>$jx9</td>
<td>$jy9</td>
<td>$jz9</td>
<td>$ket9</td>
</tr>
<tr>
<td>10</td>
<td>$jx10</td>
<td>$jy10</td>
<td>$jz10</td>
<td>$ket10</td>
</tr>
<tr>
<td>11</td>
<td>$jx11</td>
<td>$jy11</td>
<td>$jz11</td>
<td>$ket11</td>
</tr>
<tr>
<td>12</td>
<td>$jx12</td>
<td>$jy12</td>
<td>$jz12</td>
<td>$ket12</td>
</tr>"
;

$x1 = mysql_query("SELECT AVG(x) as xc1 from c1_1");
$ratax1=mysql_fetch_array($x1);
$y1 = mysql_query("SELECT AVG(y) as yc1 from c1_1");
$ratay1=mysql_fetch_array($y1);
$z1 = mysql_query("SELECT AVG(z) as zc1 from c1_1");
$rataz1=mysql_fetch_array($z1);


$x2 = mysql_query("SELECT AVG(x) as xc2 from c2_1");
$ratax2=mysql_fetch_array($x2);
$y2 = mysql_query("SELECT AVG(y) as yc2 from c2_1");
$ratay2=mysql_fetch_array($y2);
$z2 = mysql_query("SELECT AVG(z) as zc2 from c2_1");
$rataz2=mysql_fetch_array($z2);


$x3 = mysql_query("SELECT AVG(x) as xc3 from c3_1");
$ratax3=mysql_fetch_array($x3);
$y3 = mysql_query("SELECT AVG(y) as yc3 from c3_1");
$ratay3=mysql_fetch_array($y3);
$z3 = mysql_query("SELECT AVG(z) as zc3 from c3_1");
$rataz3=mysql_fetch_array($z3);

echo "<table border=1><tr bgcolor=orange>
<td><b><center>Centroid</td>
<td><b><center>x</td>
<td><b><center>y</td>
<td><b><center>z</td>
</tr></br></br>";
echo "<b>Centroid Baru 1</b>";
echo "<tr>
<td>C1</td>
<td>$ratax1[xc1]</td>
<td>$ratay1[yc1]</td>
<td>$rataz1[zc1]</td>
</tr>
<tr>
<td>C2</td>
<td>$ratax2[xc2]</td>
<td>$ratay2[yc2]</td>
<td>$rataz2[zc2]</td>
</tr>
<tr>
<td>C3</td>
<td>$ratax3[xc3]</td>
<td>$ratay3[yc3]</td>
<td>$rataz3[zc3]</td>
</tr>";

echo "<table border=1><tr bgcolor=orange>
<td><b><center>Kecamatan</td>
<td><b><center>Jarak C1</td>
<td><b><center>Jarak C2</td>
<td><b><center>Jarak C3</td>
<td><b><center>Cluster</td>
</tr></br></br>";

echo "<b>Jarak Data Dengan Pusat Cluster</b>";

$q=1;
$jx=array();
$jy=array();
$jz=array();
$ket=array();
$query=mysql_query("SELECT * FROM tb_kmeans ORDER BY kd_kec");
while($var=mysql_fetch_array($query)){
$jx['q']= sqrt(pow($var['luas_panen'] - $ratax1['xc1'], 2)+ pow($var['produksi'] - $ratay1['yc1'], 2) + pow($var['produktivitas'] - $rataz1['zc1'], 2));
$jy['q']= sqrt(pow($var['luas_panen'] - $ratax2['xc2'], 2)+ pow($var['produksi'] - $ratay2['yc2'], 2) + pow($var['produktivitas'] - $rataz2['zc2'], 2));
$jz['q']= sqrt(pow($var['luas_panen'] - $ratax3['xc3'], 2)+ pow($var['produksi'] - $ratay3['yc3'], 2) + pow($var['produktivitas'] - $rataz3['zc3'], 2));
if ($jx['q']<$jy['q'] && $jx['q']<$jz['q']){
	if ($q) {mysql_query("INSERT INTO c1_2(x,y,z) VALUE('$var[luas_panen]','$var[produksi]','$var[produktivitas]')");};
	$ket['q']='C1';
} elseif ($jy['q']<$jx['q'] && $jy['q']<$jz['q']) {
	if ($q) {mysql_query("INSERT INTO c2_2(x,y,z) VALUE('$var[luas_panen]','$var[produksi]','$var[produktivitas]')");};
	$ket['q']='C2';
} else {
	if ($q) {mysql_query("INSERT INTO c3_2(x,y,z) VALUE('$var[luas_panen]','$var[produksi]','$var[produktivitas]')");};
	$ket['q']='C3';
}

echo "<tr>
<td>$var[kecamatan]</td>
<td>$jx[q]</td>
<td>$jy[q]</td>
<td>$jz[q]</td>
<td>$ket[q]</td>
</tr>";
}

$x1s = mysql_query("SELECT AVG(x) as xc1s from c1_2");
$ratax1s=mysql_fetch_array($x1s);
$y1s = mysql_query("SELECT AVG(y) as yc1s from c1_2");
$ratay1s=mysql_fetch_array($y1s);
$z1s = mysql_query("SELECT AVG(z) as zc1s from c1_2");
$rataz1s=mysql_fetch_array($z1s);


$x2s = mysql_query("SELECT AVG(x) as xc2s from c2_2");
$ratax2s=mysql_fetch_array($x2s);
$y2s= mysql_query("SELECT AVG(y) as yc2s from c2_2");
$ratay2s=mysql_fetch_array($y2s);
$z2s= mysql_query("SELECT AVG(z) as zc2s from c2_2");
$rataz2s=mysql_fetch_array($z2s);


$x3s= mysql_query("SELECT AVG(x) as xc3s from c3_2");
$ratax3s=mysql_fetch_array($x3s);
$y3s= mysql_query("SELECT AVG(y) as yc3s from c3_2");
$ratay3s=mysql_fetch_array($y3s);
$z3s = mysql_query("SELECT AVG(z) as zc3s from c3_2");
$rataz3s=mysql_fetch_array($z3s);

echo "<table border=1><tr bgcolor=orange>
<td><b><center>Centroid</td>
<td><b><center>x</td>
<td><b><center>y</td>
<td><b><center>z</td>
</tr></br></br>";
echo "<b>Centroid Baru 2</b>";
echo "<tr>
<td>C1</td>
<td>$ratax1s[xc1s]</td>
<td>$ratay1s[yc1s]</td>
<td>$rataz1s[zc1s]</td>
</tr>
<tr>
<td>C2</td>
<td>$ratax2s[xc2s]</td>
<td>$ratay2s[yc2s]</td>
<td>$rataz2s[zc2s]</td>
</tr>
<tr>
<td>C3</td>
<td>$ratax3s[xc3s]</td>
<td>$ratay3s[yc3s]</td>
<td>$rataz3s[zc3s]</td>
</tr>";

echo "<table border=1><tr bgcolor=orange>
<td><b><center>Kecamatan</td>
<td><b><center>Jarak C1</td>
<td><b><center>Jarak C2</td>
<td><b><center>Jarak C3</td>
<td><b><center>Cluster</td>
</tr></br></br>";

echo "<b>Jarak Data Dengan Pusat Cluster</b>";

$q_2=1;
$jx_2=array();
$jy_2=array();
$jz_2=array();
$ket_2=array();
$query=mysql_query("SELECT * FROM tb_kmeans ORDER BY kd_kec");
while($var=mysql_fetch_array($query)){
$jx_2['q_2']= sqrt(pow($var['luas_panen'] - $ratax1s['xc1s'], 2)+ pow($var['produksi'] - $ratay1s['yc1s'], 2) + pow($var['produktivitas'] - $rataz1s['zc1s'], 2));
$jy_2['q_2']= sqrt(pow($var['luas_panen'] - $ratax2s['xc2s'], 2)+ pow($var['produksi'] - $ratay2s['yc2s'], 2) + pow($var['produktivitas'] - $rataz2s['zc2s'], 2));
$jz_2['q_2']= sqrt(pow($var['luas_panen'] - $ratax3s['xc3s'], 2)+ pow($var['produksi'] - $ratay3s['yc3s'], 2) + pow($var['produktivitas'] - $rataz3s['zc3s'], 2));
if ($jx_2['q_2']<$jy_2['q_2'] && $jx_2['q_2']<$jz_2['q_2']){
	mysql_query("INSERT INTO c1_3(x,y,z) VALUE('$jx_2[q_2]','$jy_2[q_2]','$jz_2[q_2]')");
	$ket_2['q_2']='C1 (Produksi Sedang)';
} elseif ($jy_2['q_2']<$jx_2['q_2'] && $jy_2['q_2']<$jz_2['q_2']) {
	mysql_query("INSERT INTO c2_3(x,y,z) VALUE('$jx_2[q_2]','$jy_2[q_2]','$jz_2[q_2]')");
	$ket_2['q_2']='C2 (Produksi Rendah)';
} else {
	mysql_query("INSERT INTO c3_3(x,y,z) VALUE('$jx_2[q_2]','$jy_2[q_2]','$jz_2[q_2]')");
	$ket_2['q_2']='C3 (Produksi Tinggi)';
}

echo "<tr>
<td>$var[kecamatan]</td>
<td>$jx_2[q_2]</td>
<td>$jy_2[q_2]</td>
<td>$jz_2[q_2]</td>
<td>$ket_2[q_2]</td>
</tr>";
}


?>