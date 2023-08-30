
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA RESTORAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Restoran</td>
				<td><?php echo $nama_restoran; ?></td>
			</tr>
	
			<tr>
				<td>Deskripsi</td>
				<td><?php echo $deskripsi; ?></td>
			</tr>
	
			<tr>
				<td>Foto</td>
				<td><?php echo $foto; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('restoran') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>