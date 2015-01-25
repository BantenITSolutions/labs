<style type="text/css">
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


<h4>Hello, <?php echo Yii::app()->user->nama_lengkap; ?></h4>

<h5>Pengumuman Terbaru</h5>

<?php
$list= Yii::app()->db->createCommand('select * from tbl_pengumuman order by id_pengumuman DESC limit 3')->queryAll();
?>

<table border="1" cellpadding="5" cellspacing="0">
	<tr>
		<td>No.</td>
		<td>Judul</td>
	</tr>
	<?php
		$no = 1;
		foreach ($list as $key => $value) {
			echo '<tr><td width="20">'.$no.'</td>';
	?>
		<td><a href="#" onClick="popup('<?php echo Yii::app()->baseUrl; ?>/mahasiswa_pengumuman/<?php echo $value['id_pengumuman']; ?>')"><?php echo $value['judul']; ?></a></td></tr>
	<?php
			$no++;
		}
	?>
</table>