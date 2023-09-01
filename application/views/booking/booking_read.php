
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA BOOKING</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Email</td>
				<td><?php echo $email; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal</td>
				<td><?php echo $tanggal; ?></td>
			</tr>
	
			<tr>
				<td>Nomor Booking</td>
				<td><?php echo $nomor_booking; ?></td>
			</tr>
	
			<tr>
				<td>Meja</td>
				<td><?php echo $meja; ?></td>
			</tr>
	
			<tr>
				<td>Id Restoran</td>
				<td><?php echo $id_restoran; ?></td>
			</tr>
	
			<tr>
				<td>Status</td>
				<td><?php echo $status; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('booking') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>