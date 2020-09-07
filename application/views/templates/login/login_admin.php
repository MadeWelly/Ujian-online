<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/s/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/s/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/s/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/s/adminLTE/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/s/adminLTE/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/s/sweetalert2/sweetalert2.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/s/font.googleapis.css">
</head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        
      </div>

        <?php  
        echo validation_errors('<div class="alert alert-danger">', '</div>');
        if ($this->session->flashdata('failed')) {
          echo '<div class="alert alert-danger">';
          echo $this->session->flashdata('failed');
          echo '</div>';
        }

        ?>

         <div class="login-box">
  
          <?php echo form_open('login/admin','class="login-form"'); ?>
              <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
              <div class="form-group">
                <label class="control-label">ID Admin</label>
                <input class="form-control" type="text" placeholder="Nomor Induk Mahasiswa" autofocus name="noinduk">
              </div>
              <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" type="password" placeholder="Password" name="password">
              </div>
              <div class="form-group">
                <div class="utility">
                  <div class="animated-checkbox">
                    <label>
                      <input type="checkbox"><span class="label-text">Stay Signed in</span>
                    </label>
                  </div>
                  <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                </div>
              </div>
              <div class="form-group btn-container">
                <button onclick="sweetalertclick()" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
              </div>
          <?php echo form_close(); ?>
        
        
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>

    <script type="text/javascript">
      function sweetalertclick(){
        Swal.fire({
          type: 'success',
        })
      }
    </script>
  </body>
</html>