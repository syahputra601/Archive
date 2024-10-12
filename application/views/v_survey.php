<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Survey</h1>
        </div><!-- /.col -->
        <div class="col-md-12">
          <hr>
          <!-- <form class="" action="<?php echo base_url() ?>C_cro/getcustmonth" method="post">
        <div class="row">
          <div class="col-md-2">
            <label>Bulan</label>
            <select class="form-control bulan" name="bulan" required>
              <option value="">--Pilih Bulan--</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
          <div class="col-md-2">
            <label>Tahun</label>
            <?php $thn = date('Y');?>
            <select class="form-control tahun" name="tahun" required>
              <option value="">--Pilih Tahun--</option>
              <option class="thnskrg" value="<?php echo $thn ?>"><?php echo $thn ?></option>
              <option class="thnlama" value="<?php echo $thn-1 ?>"><?php echo $thn-1 ?></option>
            </select>
          </div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary btnsub" name="button" style="margin-top:30px;">Submit</button>
          </div>
        </div>
      </form><br> -->
      <form action="<?php echo base_url() ?>C_cro/getcustmonthcbg" method="POST">
        <div class="row">
          <div class="col-md-3">
            <label>Area</label>
            <select class="form-control" name="area" id="area" required>
              <option value="999">--Pilih Area--</option>
              <?php foreach($area as $a) {?>
                <option value="<?php echo $a->id_company ?>"><?php echo $a->nama ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-3">
            <label>Cabang</label>
            <select class="form-control" name="cabang" id="cabang" required>
              <option value="">--Pilih Cabang--</option>
            </select>
          </div>
          <div class="col-md-3">
            <button class="btn btn-primary" type="submit" style="margin-bottom: -73px;">Filter</button>
          </div>
        </div>
      </form>
      <br>
      <div class="row">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Customer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tipe</th>
                  <th>Cabang</th>
                  <th>Nama</th>
                  <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach($cust as $a) {?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                      <?php 
                      if($a->tipe_cust == 1){
                        echo 'Sales';
                      }else{
                        echo 'Service';
                      }
                      ?>
                    </td>
                    <td><?php echo $a->nama ?></td>
                    <td><?php echo $a->nama_cust ?></td>
                    <td><a href="<?php echo base_url(); ?>C_cro/detsurv/<?php echo $a->id_surv ?>" class=""><i class="far fa-eye nav-icon" style="color:black"></i></a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- /.content -->
</div>
