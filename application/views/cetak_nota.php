<h2 align="center">Nota</h2>
No Nota			: <?= $transaksi->no_transaksi ?> <br>
Day, Date 		: <?= $transaksi->tanggal_beli ?> <br>
Customer	 	: <?= $transaksi->pembeli ?> <br>
Cashier			: <?= $this->session->userdata('username'); ?> <br> <br>

<table border="1" style="border-collapse: collapse;">
	<tr>
		<th>No</th>
		<th>Car Type</th>
		<th>Price</th>
		<th>QTY</th>
		<th>Subtotal</th>
	</tr>
		<?php $no=0; foreach($this->trans->detail_pembelian($transaksi->no_transaksi) as $bunga): $no++; ?>
		<tr>
			<th><?=$no?></th>
			<th><?=$bunga->tipe_bunga?></th>
			<th><?= number_format($bunga->harga)?></th>
			<th><?=$bunga->jumlah?></th>
			<th><?= number_format(($bunga->harga*$bunga->jumlah)) ?></th>
		</tr>
	<?php endforeach ?>
		<tr>
			<th colspan="4">Grand Total</th>
			<th><?= number_format($transaksi->total_harga) ?></th>
		</tr>
</table>
<br>
Uang bayar : <?= $this->session->userdata('bayar'); ?> <br>
Kembalian : <?= $this->session->userdata('kembalian'); ?><br><br>

<a href="<?=base_url('index.php/transaksi')?>">Back</a>
<script type="text/javascript">
	window.print();
	// location.href="<?=base_url('index.php/transaksi')?>"
</script>
