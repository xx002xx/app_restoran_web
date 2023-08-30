<div class="content-wrapper">
   <section class="content">
      <div class="box box-warning box-solid">
         <div class="box-header with-border">
            <h3 class="box-title"><?php echo strtoupper($button) ?> DATA PRODUK</h3>
         </div>
         <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

            <table class='table table-bordered'>

               <tr>
                  <td width='200'>Kode Produk <?php echo form_error('kode_produk') ?></td>
                  <td><input type="text" class="form-control" name="kode_produk" id="kode_produk"
                        placeholder="Kode Produk" value="<?php echo $kode_produk; ?>" /></td>
               </tr>

               <tr>
                  <td width='200'>Nama Produk <?php echo form_error('nama_produk') ?></td>
                  <td><input type="text" class="form-control" name="nama_produk" id="nama_produk"
                        placeholder="Nama Produk" value="<?php echo $nama_produk; ?>" /></td>
               </tr>

               <tr>
                  <td width='200'>Id Kategori <?php echo form_error('id_kategori') ?></td>
                  <td>
                     <?php echo cmb_dinamis('id_kategori', 'kategori', 'nama_kategori', 'id_kategori', $id_kategori,'DESC') ?>
                  </td>
               </tr>

               <tr>
                  <td width='200'>Harga <?php echo form_error('harga') ?></td>
                  <td><input type="number" class="form-control" name="harga" id="harga" placeholder="Harga"
                        value="<?php echo $harga; ?>" /></td>
               </tr>

               <tr>
                  <td width='200'>Foto Produk <?php echo form_error('foto_produk') ?></td>
                  <td><input type="file" name="foto_produk"> </td>
               </tr>
               <input type="hidden" class="form-control" name="id_restoran" id="id_restoran" placeholder="Id Restoran"
                  value="<?php echo $this->session->userdata('id_restoran'); ?>" />
               <tr>
                  <td></td>
                  <td>
                     <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>" />
                     <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i>
                        <?php echo $button ?></button>
                     <a href="<?php echo site_url('produk') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i>
                        Kembali</a>
                  </td>
               </tr>

            </table>
         </form>
      </div>
   </section>
</div>