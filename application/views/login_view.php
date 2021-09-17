<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login เข้าสู่ระบบ E-Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <?php echo link_tag('bootstrap/plugins/fontawesome-free/css/all.min.css');?>


  <!-- Theme style -->
  <?php echo link_tag('bootstrap/dist/css/adminlte.min.css');?>

<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.all.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>E-Inventory</b> System</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="<?php echo site_url('login/check_login');?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="mem_username" placeholder="Username" autocomplete="off" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="mem_password" autocomplete="off" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('bootstrap/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('bootstrap/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('bootstrap/dist/js/adminlte.js');?>"></script>
 <script type="text/javascript">
    <?php  if ($this->session->flashdata('login_error')):?>
        Swal.fire({
          icon: 'warning',
          title: 'Oops...',
          text: 'Username or Password ไม่ถูกต้อง!!'
        })
    <?php endif;?>
  </script>
</body>
</html>
