<!DOCTYPE html>
<?php if($this->session->userdata('status') == "login"){
  redirect(base_url('C_aset/view_barang'));
} ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Customer Relation Officer | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="shorcut icon" type="image/png" href="<?php echo base_url(); ?>assets/cro.png">

</head>
<body class="hold-transition login-page" style="background-color:#b82d3a;">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url(); ?>assets/index2.html" style="color:white;"><b>Customer Relation Officer</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masukkan username dan password</p>

      <form action="<?php echo base_url(); ?>C_login/aksilogin" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="user" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pass" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
            <button type="submit" class="btn btn-primary btn-block" style="background-color:#b82d3a; border-color:#b82d3a;">Sign In</button>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <?php
        if($this->session->flashdata('gagal')){
        echo	'<center><p style="color:red">Username / password salah!</p></center>';
      }?>
      <p class="login-box-msg">CRO - 2020. Super Sukses Motor</p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>
</html>
