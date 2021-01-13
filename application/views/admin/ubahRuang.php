<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>Edit Ruang</h3>
          <div class="clearfix"></div>
        </div><br>
        <?php foreach($ruang as $key) {?>
          <?=form_open_multipart('Ruang/prosesUbahRuang/'.$key->id_ruang)?>
          <div class="form-group row">
          <input type="hidden" name="id_ruang" value="<?php echo $key->id_ruang ?>">
            <label class="col-sm-3 col-form-label"> Kode Lab </label>
            <div class="col-sm-8">
              <input type="text" name="kode_lab" class="form-control" placeholder="Kode Lab" value="<?php echo $key->kode_lab ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Nama Ruang </label>
            <div class="col-sm-8">
              <input type="text" name="nama_ruang" class="form-control" placeholder="Nama Ruang" value="<?php echo $key->nama_ruang ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Nama Gedung </label>
            <div class="col-sm-8">
            <input type="text" name="nama_gedung" class="form-control" placeholder="Nama Ruang" value="<?php echo $key->nama_gedung ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Total Kapasitas </label>
            <div class="col-sm-8">
            <input type="text" name="total_kapasitas" class="form-control" placeholder="Total Kapasitas" value="<?php echo $key->total_kapasitas ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Catatan </label>
            <div class="col-sm-8">
              <textarea rows="5" cols="40" name="catatan" class="form-control" placeholder="Catatan"><?php echo $key->catatan ?></textarea>
            </div>
          </div>
          <div class="page-header">
            <input type="submit" class="btn btn-success" value="EDIT">&nbsp;&nbsp;
            <a href="<?php echo base_url()?>Penyakit"><button type="button" class="btn btn-danger">KEMBALI</button></a>
          </div>
          <?php echo form_close(); ?>
        <?php } ?>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>