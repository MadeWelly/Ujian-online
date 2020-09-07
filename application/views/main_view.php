<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ujian Online</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap_4/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert2/sweetalert2.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/font.googleapis.css">

    <style type="text/css">

    </style>
</head>

<body class="dashboard hold-transition skin-blue sidebar-mini sidebar-collapse" id="modals">
  <div class="loading" id="loading">
  </div>

  <div class="wrapper">

    <?php
    if (@$this->dosen) {
      $this->load->view('inc/navbar');
      $this->load->view('inc/sidebar');
    } elseif (@$this->mahasiswa) {
      $this->load->view('inc/navbar');
      $this->load->view('inc/sidebar');
    } elseif (@$this->admin) {
      $this->load->view('inc/navbar');
      $this->load->view('inc/sidebar');
    }
    ?>

    <div class="content-wrapper" style="background:transparent;
     background-size:100%;
     opacity: 0.8">
      <!-- Content Header (Page header) -->
      <!-- <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php
          if (@$this->dosen) {
            echo "Dosen";
          } elseif (@$this->mahasiswa) {
            echo "Mahasiswa";
          } elseif ($this->admin) {
            echo "Admin";
          }
          ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
               <?php foreach ($this->uri->segments as $segment) : ?>
            <?php
              $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
              // print_r($segment);
              $is_active =  $url == $this->uri->uri_string;
              ?>


            <li class="breadcrumb-item <?php echo $is_active ? 'active' : '' ?>">
              <?php if ($is_active) : ?>
                <?php echo ucfirst($segment) ?>
              <?php else : ?>
                <a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
              </ol>
            </div>
          </div>
        </div> /.container-fluid -->

      <section class="content" style="margin-top:">
         <div class="container-fluid">
          <div class="row">
            <div class="col-12">
          <!-- <section class="col nav-tabs-custom">     -->
            <?php $this->load->view($page); ?>
          <!-- </section> -->
            </div>
          </div>
        </div>
      </section>

    </div>
    <footer class="main-footer bg-dark" id="footer">
      <div class="float-right d-none d-sm-block">
        <strong>Copyright &copy; 2019-<?php echo date("Y");?><a href="http://adminlte.io"> Made Of TI</a>.</strong> All rights
      reserved. 
      </div>
      <b>Ujian Online</b>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
  </div>



  <script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <script src="<?php echo base_url() ?>assets/sweetalert2/sweetalert2.all.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>assets/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap_4/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap_4/js/bootstrap.min.js"></script>
<script>
  $(function () {
    var an = 0;
    for (var i = 0; i <= 8; i++) {
        $("#example"+an++).DataTable();
    }
    $().DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<!-- <script>
  $(function () {
    $("#example3").DataTable();
    $('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script> -->

<script type="text/javascript">
     $(document).ready(function() {
  
     $("#max").click(function() {
       $("#add_maximize").addClass("maximize");
       $("#max").addClass("hidden");
       $("#min").removeClass("hidden");
     })
 });
</script>
<script type="text/javascript">
     $(document).ready(function() {
     $("#min").click(function() {
       $("#add_maximize").removeClass("maximize");
       $("#max").removeClass("hidden");
       $("#min").addClass("hidden");
     })
 });
 </script>

 <script type="text/javascript">
    
    //dropdown sigout
    $('#navZindex').click(function() {
        var zind = document.getElementById('zindex');
        zind.style.zIndex = "1";
    })
    
    //buat ujian baru
    $('#btnNew').click(function() {
        $('#makeNew').modal('show');
        $(".modal-backdrop").removeClass("modal-backdrop");
        var zinde = document.getElementById('zindex');
        zinde.style.zIndex = "0";
    })



    //alert(delete)
    $('.hapusData').click(function(){
      var id = $(this).attr('data-id');
      $('#hapusData').val(id)
      $('#myModal').modal('show')
      $(".modal-backdrop").removeClass("modal-backdrop");
       var zinde = document.getElementById('zindex');
       var bgColor = document.getElementById('myModal');
        zinde.style.zIndex = "0";
        bgColor.style.background = "rgba(0, 0, 0, 0.5)";
    })

    var loading = document.getElementById('loading');
    window.addEventListener('load',function(){
      loading.style.display="none";
    });
 </script>

</body>

</html>