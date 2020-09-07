 <aside class="main-sidebar" style="position: fixed;">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
     <!-- Sidebar user panel -->
     <div class="user-panel">
       <div class="pull-left image">
         <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
       </div>
     </div>
     <!-- search form -->
     <!-- /.search form -->
     <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu" data-widget="tree">
       <li class="header">MAIN NAVIGATION</li>
       <li>
         <a href="<?php echo site_url('dosen/dashboard') ?>">
           <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           <span class="pull-right-container">
           </span>
         </a>
       </li>
       <li>
         <a href="<?php echo site_url('dosen/buat_ujian'); ?>">
           <i class="app-menu__icon fa fa-edit"></i> <span>Buat Ujian</span>
           <span class="pull-right-container">
           </span>
         </a>
       </li>

       <li class="treeview">
         <a href="#">
           <i class="fa  fa-briefcase"></i> <span>Bank Soal</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span>
         </a>
         <ul class="treeview-menu">
           <li class="active"><a href="<?php echo site_url('dosen/bank/' . 'uts') ?>"><i class="fa fa-circle-o"></i> UTS</a></li>
           <li><a href="<?php echo site_url('dosen/bank/' . 'uas') ?>"><i class="fa fa-circle-o"></i> UAS </a></li>
         </ul>
       </li>
       <li>
         <a href="<?php echo site_url('dosen/hasil_ujian') ?>">
           <i class="fa fa-clipboard"></i><span>Hasil Ujian</span>
           <span class="pull-right-container">
           </span>
         </a>
       </li>
     </ul>