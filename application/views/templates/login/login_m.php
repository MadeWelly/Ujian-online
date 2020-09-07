<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ujian Online</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/login.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <!-- Google Font -->
</head>
<style type="text/css">
  .alert {
  text-align: center;
  position: absolute;
  top:10%;
  left: 50%;
  transform: translate(-50%, -50%);
  background:rgba(255, 0, 0, 0.64);
  padding: 20px;
  width: 270px;
  box-shadow: 0 0 10px 5px black;
}
</style>

  <body>

            <?php  
        echo validation_errors('<div class="alert">', '</div>');
        if ($this->session->flashdata('failed')) {
          echo '<div class="alert">';
          echo $this->session->flashdata('failed');
          echo '</div>';
        }

        ?>
    <div class="login">
      <div class="avatar">
        <i class="fa fa-user"></i>
      </div>

      <?php if (@$this->uri->segment(2)== 'mahasiswa') {
        echo "<h2>Login Mahasiswa</h2>";
        echo form_open('login/mahasiswa','class="login-form"');
      }elseif (@$this->uri->segment(2)== 'dosen') {
        echo "<h2>Login Dosen</h2>";
        echo form_open('login/dosen','class="login-form"');
      }elseif (@$this->uri->segment(2)== 'admin') {
        echo "<h2>Login Admin</h2>";
        echo form_open('login/admin','class="login-form"');
      } ?>


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
