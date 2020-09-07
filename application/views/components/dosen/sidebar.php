<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="img/pict.ico" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $row_dosen->nama_dosen ?></p>
          <p class="app-sidebar__user-designation">Dosen</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="<?php echo site_url('dosen') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Hasil Ujian</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i>#</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i>#</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="<?php echo site_url('dosen/buat_soal'); ?>"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Buat Soal</span></a></li>
        <li><a class="app-menu__item" href="<?php echo site_url('dosen/bank_soal') ?>"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Bank Soal</span></a></li>
        <li><a class="app-menu__item" href="<?php echo site_url('dosen/hasil_ujian') ?>"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Hasil Ujian</span></a></li>


      </ul>
    </aside>
