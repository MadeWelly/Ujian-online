<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="img/pict.ico" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">WeLL</p>
          <p class="app-sidebar__user-designation">Informatika</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="<?php echo site_url('mahasiswa') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Data Profile</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i> Mahasiswa</a></li>
            <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i>Orang Tua & Wali</a></li>
          </ul>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo site_url('mahasiswa/get_list_ujian/'. $row_mahasiswa->kelas_id.'/'.$row_mahasiswa->jurusan_id); ?>"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Ujian</span></a></li>
        
      </ul>
    </aside>
