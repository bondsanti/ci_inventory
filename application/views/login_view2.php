<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login เข้าสู่ระบบ E-Inventory</title>

   <link rel="icon" type="image/png" href="<?php echo site_url('img/logo/dowr.png');?>"/>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.all.min.js"></script>


<style type="text/css" media="screen">

</style>

 <?php echo link_tag('bootstrap/login/login.css');?>


</head>
<body>

  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="<?php echo site_url('img/logo/dowr.png');?>" class="brand_logo" alt="Logo">
          </div>
        </div>

        <div class="d-flex justify-content-center form_container">

          <form action="<?php echo site_url('login/check_login');?>" method="post">
          <div class="form-group">
              <div class="custom-control">
               <h3><b>E-Inventory</b> System</h3>
              </div>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" name="mem_username" placeholder="Username" autocomplete="off" onblur="check();" required>
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control" name="mem_password" autocomplete="off" placeholder="Password">
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlInline">
               
              </div>
            </div>
              <div class="d-flex justify-content-center mt-3 login_container">
                <button type="submit" class="btn login_btn">Sign In</button>

           </div>
          </form>
        </div>
    
     <div class="mt-4">
          <div class="d-flex justify-content-center links">
            
          </div>
          <div class="d-flex justify-content-center links">
      
          </div>
        </div>
      </div>
    </div>
  </div>

    <script type="text/javascript">
    <?php  if ($this->session->flashdata('login_error')):?>
         const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        
      })

      Toast.fire({
        icon: 'error',
        title: 'Username or Password ไม่ถูกต้อง!!'
      })
    <?php endif;?>
  </script>
</body>
</html>