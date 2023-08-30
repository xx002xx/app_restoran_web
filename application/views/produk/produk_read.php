
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA PRODUK</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Kode Produk</td>
				<td><?php echo $kode_produk; ?></td>
			</tr>
	
			<tr>
				<td>Nama Produk</td>
				<td><?php echo $nama_produk; ?></td>
			</tr>
	
			<tr>
				<td>Id Kategori</td>
				<td><?php echo $id_kategori; ?></td>
			</tr>
	
			<tr>
				<td>Harga</td>
				<td><?php echo $harga; ?></td>
			</tr>
	
			<tr>
				<td>Foto Produk</td>
				<td><?php echo $foto_produk; ?></td>
			</tr>
	
			<tr>
				<td>Id Restoran</td>
				<td><?php echo $id_restoran; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('produk') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>