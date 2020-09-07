<link rel="stylesheet" href="<?php echo base_url() ?>assets/mystyle.css">

<div class="row">
  <div class="col-md-12 pt-2">
  
  <?php echo $this->session->flashdata('success'); ?>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List Mahasiswa :</h3>
          <div class="dropdown">

            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Prody
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php foreach ($get_jurusan as $jurusan) {?>
        <a class="dropdown-item" href="<?php echo site_url('admin/master_mahasiswa/').$jurusan->id_prody ?>"><?php echo $jurusan->prody_name ?></a>
        <?php }?>
  </div>
</div>

  

      <div class="card-tools">
                <a class="btn-lg btn-success" href="<?php echo site_url('admin/add_mahasiswa')?>">
          <i class="fa fa-user-plus"></i> <span>Mahasiswa</span>
          <span class="pull-right-container">
          </span>
        </a>
      </div>
    </div>
    <div class="card-body">

      <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Semester</th>
            <th>Email</th>
            <th>Action</th>
          
          </tr>
        </thead> 
         
        <tbody>
          <?php  $no = 1 ; ?>
          <?php foreach($get_mahasiswa_jurusan as $mahasiswa) { ?>
          <tr role="row" class="odd">
            <td><?php echo $no++?></td>
            <td><?php echo $mahasiswa->nim ?></td>
            <td><?php echo $mahasiswa->msw_name ?></td>
            <td><?php echo $mahasiswa->prody_name ?></td>
            <td><?php echo $mahasiswa->class_id ?></td>
            <td><?php echo $mahasiswa->email ?></td>
            <td>
              <a href="<?php echo site_url('admin/invoice_ujian/'.$mahasiswa->id_msw); ?>" class="btn btn-info"><i class="fa fa-clipboard"></i> Krs</a>
            
              <a href="<?php echo site_url('admin/update_mahasiswa/'.$mahasiswa->id_msw); ?>" class="btn btn-success"><i class="fas fa-user-edit"></i> Edit</a>
           
              <button class="btn btn-danger hapusData" data-id="<?php echo $mahasiswa->id_msw ?>"><i class="fas fa-trash"></i> Delete</button>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>

  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <?php echo form_open('admin/delete_mahasiswa') ?>
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            Apa Anda Yakin Ingin Menghapus...?
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer justify-content-between">
            <input type="hidden" name="hapus" id="hapusData" />
            <button type="submit" class="btn btn-warning">Yes</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
          </div>
        </form>
      </div>
    </div>
  </div> 

</div>





