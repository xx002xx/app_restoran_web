<div class="content-wrapper">
   <section class="content">
      <div class="box box-warning box-solid">
         <div class="box-header with-border">
            <h3 class="box-title"><?php echo strtoupper($button) ?> DATA RESTORAN</h3>
         </div>
         <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

            <table class='table table-bordered'>

               <tr>
                  <td width='200'>Nama Restoran <?php echo form_error('nama_restoran') ?></td>
                  <td><input type="text" class="form-control" name="nama_restoran" id="nama_restoran"
                        placeholder="Nama Restoran" value="<?php echo $nama_restoran; ?>" /></td>
               </tr>

               <tr>
                  <td width='200'>Deskripsi <?php echo form_error('deskripsi') ?></td>
                  <td> <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi"
                        placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td>
               </tr>

               <tr>
                  <td width='200'>Foto <?php echo form_error('foto') ?></td>
                  <td> <input type="file" name="foto"></td>
               </tr>

               <tr>
                  <td></td>
                  <td>
                     <input type="hidden" name="id_restoran" value="<?php echo $id_restoran; ?>" />
                     <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i>
                        <?php echo $button ?></button>
                     <a href="<?php echo site_url('restoran') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i>
                        Kembali</a>
                  </td>
               </tr>

            </table>
         </form>
      </div>
   </section>
</div>