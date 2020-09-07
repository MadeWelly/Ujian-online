<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap_4/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  </head>

<body onload="window.print();">
<div class="wrapper pt-2 pl-5 pr-5">
  <!-- Main content -->
      <!-- title row -->
      <div class="row">
        <div class="col-md-6 m-0 p-0">
          <h2 class="page-header">
          <img src="<?php echo base_url("assets/img/Logo.jpg")?>" height=70 width="70" alt="logo">
            <span class=""> Universitas Satyagama. </span>
          </h2>
        </div>
        <div class="col-md-6 mt-4">
          <span class="float-right">Date : <?php echo  date('Y-m-d H:i:s ') ?></span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center"><hr><h3>Hasil Ujian Semester </h3><br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <strong>From :</strong>
                    <address>
            Admin, Inc.<br>
            Fakultas Teknologi Industri<br>
            Cengkareng Jakarta Barat 15217<br>
            Phone: (804) 123-5432<br>
            Email: info@satyagama.com
          </address>
        
        </div>

        <div class="col-sm-6 invoice-col" style="padding-left: 260px">
          <strong>To :</strong>
          <address>
            <span id="nim">Nim : <strong><?php echo $mahasiswa->nim ?></strong></span><br>
            <span id="nama">Nama : <strong><?php echo $mahasiswa->msw_name ?></strong></span><br>
            <span id="jurusan">Prody : <strong><?php echo $mahasiswa->prody_name ?></strong></span><br>
            <span id="semester">Semester : <strong><?php echo $mahasiswa->class_name ?></strong></span><br>
            <span id="email">Email : <strong><?php echo $mahasiswa->email ?></strong></span><br>
          </address>

        </div>
      </div>

      <div class="row">
        <div class="col-md-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Ujian</th>
              <th>Matkul</th>
              <th>Dosen</th>
              <th>Nilai</th>
              <th>Grade</th>
            </tr>
            </thead>
  
            <tbody>
              <?php $no = 1; foreach ($hasil as $hsl) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $hsl->ujian_name ?></td>
                <td><?php echo $hsl->matkul_name ?></td>
                <td><?php echo $hsl->dosen_name ?></td>
                <td><?php echo $hsl->nilai ?></td>
                <td>B</td>
              </tr>
              <?php } ?>
            </tbody>
          
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-6">
          <p class="lead">Catatan :</p>
          <textarea placeholder="Tulis disini..." class="form-control" rows="6" id="comment" name="text"></textarea>  
          </p>
        </div>
        <!-- /.col -->
        <div class="col-md-6 text-center">
          <p class="lead">Jakarta, <?php echo  date('d-F-Y ') ?></p>
          <br><br><br><br><br>
          <span><p class="lead">(Pihak Fakultas)</p></span>        
        </div>
      </div> 
          <footer class="bg-info mt-3 p-2" id="footer">
      <div class="float-right d-sm-block">
        <strong>Copyright &copy; 2019-<?php echo date("Y");?><a href="http://adminlte.io"> Made Of TI</a>.</strong> All rights
      reserved. 
      </div>
      <b>Ujian Online</b>
    </footer>  
 
  </div>
</body>
</html>
