<script type="text/javascript">
window.print();
</script>
<h3>Peminjaman Barang</h3>

<div class="portlet">
<div class="portlet-decoration">
<div class="portlet-title">
</div>
</div>
<div class="portlet-content">

	<table cellpadding="5">
		<tr>
			<td>Nama Mahasiswa</td>
			<td>:</td>
			<td><?php echo $model->Mahasiswa->nama; ?></td>
		</tr>
		<tr>
			<td>Kode Barang</td>
			<td>:</td>
			<td><?php echo $model->Barang->kode_barang; ?></td>
		</tr>
		<tr>
			<td>Nama Barang</td>
			<td>:</td>
			<td><?php echo $model->Barang->nama_barang; ?></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>:</td>
			<td><?php echo $model->jumlah_pinjaman; ?></td>
		</tr>
		<tr>
			<td>Lokasi</td>
			<td>:</td>
			<td><?php echo $model->Barang->lokasi_barang; ?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td>Peminjaman = <?php echo $model->tgl_peminjaman; ?> | Pengembalian = <?php echo $model->tgl_pengembalian; ?></td>
		</tr>
	</table>

</div>
</div>
