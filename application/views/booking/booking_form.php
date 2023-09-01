<div class="content-wrapper">
   <section class="content">
      <div class="box box-warning box-solid">
         <div class="box-header with-border">
            <h3 class="box-title"><?php echo strtoupper($button) ?> DATA BOOKING</h3>
         </div>
         <form action="<?php echo $action; ?>" method="post">

            <table class='table table-bordered'>

               <tr>
                  <td width='200'>Email <?php echo form_error('email') ?></td>
                  <td><input type="text" readonly class="form-control" name="email" id="email" placeholder="Email"
                        value="<?php echo $email; ?>" /></td>
               </tr>

               <tr>
                  <td width='200'>Tanggal <?php echo form_error('tanggal') ?></td>
                  <td><input type="date" readonly class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal"
                        value="<?php echo $tanggal; ?>" /></td>
               </tr>

               <tr>
                  <td width='200'>Nomor Booking <?php echo form_error('nomor_booking') ?></td>
                  <td><input type="text" readonly class="form-control" name="nomor_booking" id="nomor_booking"
                        placeholder="Nomor Booking" value="<?php echo $nomor_booking; ?>" /></td>
               </tr>

               <tr>
                  <td width='200'>Meja <?php echo form_error('meja') ?></td>
                  <td><input type="text" readonly class="form-control" name="meja" id="meja" placeholder="Meja"
                        value="<?php echo $meja; ?>" /></td>
               </tr>

               <tr>
                  <td width='200'>Id Restoran <?php echo form_error('id_restoran') ?></td>
                  <td><input type="text" readonly class="form-control" name="id_restoran" id="id_restoran"
                        placeholder="Id Restoran" value="<?php echo $id_restoran; ?>" /></td>
               </tr>

               <tr>
                  <td width='200'>Status <?php echo form_error('status') ?></td>
                  <td>
                     <select class="form-control" name="status" id="status">
                        <option value="Dipesan" <?php if($status == "Dipesan") echo "selected"; ?>>Dipesan</option>
                        <option value="Sudah Datang" <?php if($status == "Sudah Datang") echo "selected"; ?>>Sudah
                           Datang</option>
                        <option value="Batal" <?php if($status == "Batal") echo "selected"; ?>>Batal</option>
                     </select>
                  </td>
               </tr>

               <tr>
                  <td></td>
                  <td>
                     <input type="hidden" name="id_book" value="<?php echo $id_book; ?>" />
                     <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i>
                        <?php echo $button ?></button>
                     <a href="<?php echo site_url('booking') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i>
                        Kembali</a>
                  </td>
               </tr>

            </table>
         </form>
      </div>
   </section>
</div>