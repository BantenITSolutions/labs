<script type="text/javascript">
	window.print();
</script>
<style type="text/css">
body{
	font-family: Arial;
	font-size: 12px;
	padding: 0px;
	margin: 20px 70px;
}
h3{
	font-size: 18px;
	text-align: center;
}
table{
	font-size: 12px;
	width: 100%;
	border-collapse: collapse;
}
.detail-view{
	text-align: left;
}
.detail-view tbody tr th{
	padding: 5px;
}
</style>
<h3><?php echo $_SESSION['site_name']; ?></h3>

<table border="1" cellpadding="5" cellspacing="0">
	<tr>
		<td>Kode</td>
		<td>Nama Barang</td>
		<td>Tahun</td>
		<td>Merk</td>
		<td>Jumlah</td>
		<td>Keadaan</td>
		<td>Lokasi Barang</td>
		<td>Keterangan</td>
	</tr>

<?php
foreach($model as $m){
	echo '<tr><td>'.$m->kode_barang.'</td>';
	echo '<td>'.$m->nama_barang.'</td>';
	echo '<td>'.$m->tahun.'</td>';
	echo '<td>'.$m->merk.'</td>';
	echo '<td>'.$m->jumlah.'</td>';
	echo '<td>'.$m->keadaan.'</td>';
	echo '<td>'.$m->lokasi_barang.'</td>';
	echo '<td>'.$m->keterangan.'</td></tr>';
}

?>
</table>