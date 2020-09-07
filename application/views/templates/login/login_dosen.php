<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/login.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert2/sweetalert2.min.css">
  <!-- Google Font -->
</head>

  <body>
    <div class="login">
      <?php  
        echo validation_errors('<div class="alert alert-danger">', '</div>');
        if ($this->session->flashdata('failed')) {
          echo '<div class="alert alert-danger">';
          echo $this->session->flashdata('failed');
          echo '</div>';
        }

        ?>

      <div class="avatar">
        <i class="fa fa-user"></i>
      </div>

      <h2>Login Dosen</h2>
<?php echo form_open('login/dosen','class="login-form"'); ?>
      <div class="box-login">
        <i class="fa fa-envelope"></i>
        <input type="text" name="noinduk" placeholder="Email">
      </div>

      <div class="box-login">
        <i class="fa fa-lock"></i>
        <input type="password" name="password" placeholder="Password">
      </div>
          <button type="submit" class="btn-login">Login</button>
<?php echo form_close(); ?>
      <div class="bottom">
        <a href="">Register</a>
        <a href="">Forgot Password</a>
      </div>
    </div>



    <script type="text/javascript">
      function sweetalertclick(){
        Swal.fire({
          type: 'success',
        })
      }
    </script>
  </body>
</html>
