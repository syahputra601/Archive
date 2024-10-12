<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail Survey</h1>
        </div><!-- /.col -->
        <div class="col-sm-12">
          <hr>
        </div>
      </div><!-- /.row -->
      <a href="<?php echo base_url() ?>C_cro/viewsurvey" class="btn btn-secondary">Back</a>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-9">
          <div class="row text-center mb-3">
            <div class="col-md-4">
              <label>Telepon 1</label><br>
              <?php if(isset($det->telepon1)){ ?>
              <a href="tel:<?php echo $det->telepon1 ?>" class="btn btn-primary"><i class="fas fa-phone"></i> <?php echo $det->telepon1 ?></a>
              <?php } ?>
            </div>
            <div class="col-md-4">
              <label>Telepon 2</label><br>
              <?php if(isset($det->telepon2)){ ?>
              <a href="tel:<?php echo $det->telepon2 ?>" class="btn btn-primary"><i class="fas fa-phone"></i> <?php echo $det->telepon2 ?></a>
              <?php } ?>
            </div>
            <div class="col-md-4">
              <label>Telepon 3</label><br>
              <?php if(isset($det->hp)){ ?>
              <a href="tel:<?php echo $det->hp ?>" class="btn btn-primary"><i class="fas fa-phone"></i> <?php echo $det->hp ?></a>
              <?php } ?>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title float-left">Data Survey</h3>
              <h3 class="card-title float-right">
              <?php
              if($det->tipe_cust == 1){
                echo '<b>Sales</b>';
              }else{
                echo '<b>Service</b>';
              }
              ?>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <label>Nama</label>
                  <input type="text" name="" value="<?php echo $det->nama_cust ?>" class="form-control" readonly>
                </div>
                <div class="col-md-4">
                  <label>Cabang</label>
                  <input type="text" name="" value="<?php echo $det->nama ?>" class="form-control" readonly>
                </div>
                <div class="col-md-4">
                  <label>Tanggal Invoice</label>
                  <input type="text" name="" value="<?php echo date('d F Y', strtotime($det->tgl_inv)) ?>" class="form-control" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label>Tipe Motor</label>
                  <input type="text" name="" value="<?php echo $det->type ?>" class="form-control" readonly>
                </div>
                <div class="col-md-4">
                  <label>Diskon</label>
                  <input type="text" name="" value="<?php echo number_format($det->diskon) ?>" class="form-control" readonly>
                </div>
                <div class="col-md-4">
                  <label>Respon</label>
                  <select class="form-control" name="">
                  <option value="">--Pilih Respon--</option>
                  <?php foreach($resp as $a){ ?>
                    <option value="<?php echo $a->id_respon ?>"><?php echo $a->nm_respon ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <hr>
              <div class="row">
                <?php foreach($quest as  $a) {?>
                  <div class="col-md-3">
                    <label><?php echo $a->nm_quest ?></label>
                    <?php if(isset($det->id_detsurv)) {?>
                    <input type="text" value="<?php echo $a->id_quest ?>">
                    <?php } ?>
                    <select class="form-control" name="" id="">
                      <?php for ($i=1; $i < 11 ; $i++) { ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                <?php } ?>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button class="btn btn-primary btndetsurv">Simpan</button>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
