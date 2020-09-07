 <aside class="main-sidebar" style="position: fixed;">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
     <!-- Sidebar user panel -->
     <div class="user-panel" style="text-align: center; color: white">
       <div class="pull-left image">
         <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
       </div>
     </div>
     <!-- search form -->

     <!-- /.search form -->
     <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu" data-widget="tree">
       <li class="header">MAIN NAVIGATION</li>
       <li class="<?php echo $this->uri->segment(2) == 'mahasiswa' ? 'active' : '' ?>">
         <a href="<?php echo site_url('mahasiswa/dashboard') ?>">
           <i class="fa fa-home"></i> <span>Dashboard</span>
           <span class="pull-right-container">
           </span>
         </a>
       </li>
       <li class="<?php echo $this->uri->segment(2) == 'get_list_ujian' ? 'active' : '' ?>">
         <a href="<?php echo site_url('mahasiswa/ujian') ?>" data_smtr="<?php echo $row_mahasiswa->kelas_id ?>">
           <i class="app-menu__icon fa fa-edit"></i> <span>Ujian</span>
           <span class="pull-right-container">
           </span>
         </a>
       </li>
       <li>
         <a href="<?php echo site_url('mahasiswa/hasil') ?>">
           <i class="fa fa-check-square-o"></i> <span>Hasil</span>
           <span class="pull-right-container">
           </span>
         </a>
       </li>
     </ul>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script type="text/javascript">
       $('.idData').click(function() {
         var smtr = $(this).attr('data-smtr');
         var jrs = $(this).attr('data-jrs');
         $('#hapusData').val(smtr)
         $('#waktuData').val(jrs)
         // $('#myModal').modal('show')
       })
     </script>
   </section>
 </aside>