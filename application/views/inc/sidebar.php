<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: none; position: fixed;">
    <!-- Brand Logo -->
  <a href="<?php echo base_url($this->uri->segment(1)); ?>" class="brand-link">
    <img src="<?php echo base_url() ?>asset/dist/img/logo.jpg"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8;size:100px">
    <span class="brand-text font-weight-light">Satyagama</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="" style="color:white; padding-top:2px; 
      ">
       <span class="jam"></span>
      </div>
      <div class="info">
      </div>
    </div>
<?php if (@$this->mahasiswa) {?>
    <!-- Sidebar Menu -->
    <nav class='mt-2'>
      <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class='nav-item'>
          <a href='<?php echo site_url('mahasiswa/dashboard') ?>' class='nav-link'>
            <i class='nav-icon fa fa-home'></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class='nav-item'>
          <a href='<?php echo site_url('mahasiswa/ujian') ?>' class='nav-link'>
            <i class='nav-icon fa fa-edit'></i>
            <p>
              Ujian
            </p>
          </a>
        </li>
        <li class='nav-item'>
          <a href='<?php echo site_url('mahasiswa/hasil') ?>' class='nav-link'>
            <i class='nav-icon fa fa-check-square'></i>
            <p>
              Hasil
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <?php }elseif(@$this->dosen) {?>
    <!-- Sidebar Menu -->
    <nav class='mt-2'>
      <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class='nav-item'>
          <a href='<?php echo site_url('dosen/dashboard') ?>' class='nav-link'>
            <i class='nav-icon fa fa-home'></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class='nav-item'>
          <a href='<?php echo site_url('dosen/buat_ujian') ?>' class='nav-link'>
            <i class='nav-icon fa fa-edit'></i>
            <p>
              Buat Ujian
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>
              Bank Soal
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('dosen/bank/' . 'uts') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>UTS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('dosen/bank/' . 'uas') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>UAS</p>
              </a>
            </li>
          </ul>
        </li>
         <li class='nav-item'>
          <a href='<?php echo site_url('dosen/hasil_ujian') ?>' class='nav-link'>
            <i class='nav-icon fa fa-check-square'></i>
            <p>
              Hasil Mahasiswa
            </p>
          </a>
        </li>
      </ul>
    </nav>

   <?php }elseif(@$this->admin) {?>
    <!-- Sidebar Menu -->
    <nav class='mt-2'>
      <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class='nav-item'>
          <a href='<?php echo site_url('admin/dashboard') ?>' class='nav-link'>
            <i class='nav-icon fas fa-home'></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              User
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('admin/master_mahasiswa') ?>" class="nav-link">
                <i class="fas fa-user-graduate nav-icon"></i>
                <p>Mahasiswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('admin/master_dosen')?>" class="nav-link">
                <i class="fas fa-user-tie nav-icon"></i>
                <p>Dosen</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-edit"></i>
            <p>
              Ujian
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('admin/ujian/').'uts'?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>UTS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('admin/ujian/').'uas' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>UAS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('admin/Test') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>TEST</p>
              </a>
            </li>
          </ul>
        </li>
         <li class='nav-item'>
          <a href="<?php echo site_url('admin/userNotactive') ?>" class='nav-link'>
            <i class='nav-icon fas fa-user-alt-slash'></i>
            <p>
              User Not Active
            </p>
          </a>
        </li>
      </ul>
    </nav>
  <?php }?>
  </div>
</aside>

<script type="text/javascript">
    function jam() {
    var time = new Date(),
        hours = time.getHours(),
        minutes = time.getMinutes(),
        seconds = time.getSeconds();
    document.querySelectorAll('.jam')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
      
    function harold(standIn) {
        if (standIn < 10) {
          standIn = '0' + standIn
        }
        return standIn;
        }
    }
    setInterval(jam, 1000);
</script>