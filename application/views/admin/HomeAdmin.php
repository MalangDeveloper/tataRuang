<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Hallo, 
              <?php echo $this->session->userdata("nama");?>
              <i class="far fa-laugh-beam" style="font-size:24px;"></i></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-9 col-sm-9  ">
              <ul class="stats-overview">
                <li>
                  <span class="name"> Total Penyakit </span>
                  <!-- <span class="value text-success">
                    <?php foreach($totalPenyakit as $tampilPenyakit) { ?>
                      <span><?php echo $tampilPenyakit->total ?></span> </a>
                    <?php } ?>
                  </span> -->
                </li>
                <li>
                  <span class="name"> Total Basis Kasus </span>
                  <span class="value text-success">
                    <!-- <?php foreach($totalKasus as $tampilKasus) { ?>
                      <span><?php echo $tampilKasus->total ?></span> </a>
                    <?php } ?> -->
                  </span>
                </li>
                <li class="hidden-phone">
                  <span class="name"> Total Data Pemeriksaan </span>
                  <span class="value text-success">
                    <!-- <?php foreach($totalPemeriksaan as $tampilPemeriksaan) { ?>
                      <span><?php echo $tampilPemeriksaan->total ?></span> </a>
                    <?php } ?> -->
                  </span>
                </li>
              </ul><br/>

              <!-- <div class="x_content">
                <canvas id="mybarChart"></canvas>
              </div> -->

              <div class="x_content" style="text-align: center;">
                <img src="<?php echo base_url();?>Gambar/hd2.gif" class="img-fluid" alt="hd" height="400px" />
              </div>
              <br><br>
              
              <div id="mainb" style="height:350px;"></div>
                    </div>

                    <!-- start project-detail sidebar -->
                    <div class="col-md-3 col-sm-3  ">

                      <section class="panel">

                        <div class="x_title">
                          <h2>Description</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <h3 class="pink"><i class="fa fa-desktop"></i> Tata Ruang Laboratorium</h3>

                          <p>Sistem untuk mengelola tata ruang laboratorium di Universitas Islam Malang</p>
                          <br />
                        </div>
                      </section>

                    </div>
                    <!-- end project-detail sidebar -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>