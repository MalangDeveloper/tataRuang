<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA PEMESANAN</h3>
          <div class="clearfix"></div>
        </div><br>

        <?php if ($this->session->flashdata('success')) {?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php } elseif($this->session->flashdata('hapus')) { ?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('hapus'); ?> 
          </div>
        <?php } elseif($this->session->flashdata('error')) {?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?> 
          </div>
        <?php } ?>

        <form class="form-horizontal" method="post" action="<?php echo base_url().'/Staff/simpanPemesanan'?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Fakultas</label>            
            <div class="col-xs-8">
              <select class='form-control' id='fakultas' name='id_fakultas' required>
                <option value="">-- Pilih Fakultas--</option>
                <?php foreach ($fakultas as $a) {
                  echo '<option value="'.$a->id_fakultas.'" ';
                  echo '>'.$a->nama_fakultas.'</option>';
                }?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Kursus</label>
            <div class="col-xs-8">
              <select class='form-control' id='kursus' name='id_kursus' required>
                <option value="">-- Pilih Kursus--</option>
                <?php foreach ($kursus as $a) {
                  echo '<option value="'.$a->id_kursus.'" ';
                  echo '>'.$a->nama_kursus.'</option>';
                }?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Nama Instruktur</label>
            <div class="col-xs-8">
              <select class='form-control' id='instruktur' name='id_instruktur' required>
                <option value="">-- Pilih Instruktur--</option>
                <?php foreach ($instruktur as $a) {
                  echo '<option value="'.$a->id_instruktur.'" ';
                  echo '>'.$a->nama_instruktur.'</option>';
                }?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Ruang</label>
            <div class="col-xs-8">
              <select class='form-control' id='ruang' name='id_ruang' required>
                <option value="">-- Pilih Ruang--</option>
                <?php foreach ($ruang as $a) {
                  echo '<option value="'.$a->id_ruang.'" ';
                  echo '>'.$a->nama_ruang.' - Gedung: '.$a->nama_gedung.'</option>';
                }?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Tanggal</label>
            <div class="col-xs-8">
              <input type="date" name="tanggal" class="form-control" format="Y/m/d">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Jam Awal</label>
            <div class="col-xs-8">
              <input type="time" name="jam_awal" class="form-control" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Jam Akhir</label>
            <div class="col-xs-8">
              <input type="time" name="jam_akhir" class="form-control" >
            </div>
          </div>                  
        </div>
        <div class="pull-right"><button class="btn btn-info">Simpan</button></div><br><br>
        <hr>
      </form>


        <table class="table table-striped table-bordered data">
          <thead>
            <tr class="bg-group">
              <th width="5px">NO</th>
              <th>Kode Lab</th>
              <th>Nama Ruang</th>
              <th>Gedung</th>
              <th>Tanggal</th>
              <th>Jam Awal</th>
              <th>Jam Akhir</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              foreach ($pemesanan as $key) 
              {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->kode_lab;?></td>
              <td><?php echo $key->nama_ruang;?></td>
              <td><?php echo $key->nama_gedung;?></td>
              <td><?php echo $key->tanggal;?></td>
              <td><?php echo $key->jam_awal;?></td>
              <td><?php echo $key->jam_akhir;?></td>
            </tr>
            <?php
              $no++;
              }
            ?>
          </tbody>
        </table>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-- ============ MODAL ADD BARANG =============== -->
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Pemesanan</h3>
      </div>
      
    </div>
  </div>
</div>
<!--END MODAL ADD BARANG-->

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>