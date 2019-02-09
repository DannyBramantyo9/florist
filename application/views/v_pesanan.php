<h2 align="center">Histori Pesanan</h2>
<?= $this->session->flashdata('pesan'); ?>
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td>No. Nota</td>
			<td>Tanggal Pembelian</td>
			<td>Nama Pembeli</td>
			<td>Total Harga</td>
			<td>Kasir</td>
			<td></td>
			<!-- <td>Detail</td> -->
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach($tampil_pesanan as $psn):
		$no++; ?>
		<tr>
			<td><?= $psn->no_transaksi ?></td>
			<td><?= $psn->tanggal_beli ?></td>
			<td><?= $psn->pembeli ?></td>
			<td><?= $psn->total_harga ?></td>
			<td><?= $psn->username ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
