<div class="row">
  <div class="col-md-3">
    

 
  </div>
  <div class="col-md-2">
  </div>
  <div class="col-md-3">
  </div>

</div>

<div class="row">
  <div class="col-md-12 pt-2">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List Dosen :</h3>
      <div class="card-tools">
                <a class="btn btn-success" href="<?php echo site_url('admin/add_dosen')?>">
          <i class="fa fa-user-plus"></i> <span>Dosen</span>
          
        </a>
      </div>
    </div>
      <div class="card-body">
      <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nidn</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Email</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
                   <?php  $no = 1 ; ?> 
        <?php foreach($get_dosen as $dosen) { ?>

          <tr role="row" class="odd">
            <td><?php echo $no++?></td>
            <td><?php echo $dosen->nidn ?></td>
            <td><?php echo $dosen->dosen_name ?></td>
            <td><?php echo $dosen->matkul_name ?></td>
            <td><?php echo $dosen->email ?></td>

            <td>
              <a href="<?php echo site_url('admin/update_dosen/'.$dosen->id_dosen) ?>" class="btn btn-success"><i class="fas fa-user-edit"></i> Edit</a>
              <button class="btn btn-danger hapusData" data-id="<?php echo $dosen->id_dosen ?>"><i class="fas fa-trash"></i> Delete</button>
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
        <?php echo form_open('admin/delete_dosen') ?>
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
    $('.hapusData').click(function(){
      var id = $(this).attr('data-id');
      $('#hapusData').val(id)
      $('#myModal').modal('show')
    })
  </script>
 <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  -->
