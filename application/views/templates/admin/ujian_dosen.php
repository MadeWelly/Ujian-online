<br>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
          <div class="card-header">
          <h3 class="card-title">Hasil Ujian:</h3>
        </div>
        <div class="card-body">

          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
            <tr>
              <th>No.</th>
              <th>Dosen</th>
              <th>Ujian</th>
              <th>Matkul</th>
              <th>Soal</th>
              <th>Durasi</th>
              <th>Tgl Mulai</th>
              <th>Tgl Akhir</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $no = 1; foreach($uts as $u) { ?>
            <tr role="row" class="odd">
              <td><?php echo $no++?></td>
              <td><?php echo $u->dosen_name?></td>
              <td><?php echo $u->ujian_name?></td>
              <td><?php echo $u->matkul_name ?></td>
              <td><?php echo $u->jumlah_soal?> Soal</td>
              <td><?php echo $u->waktu?> Menit</td>
              <td><?php echo $u->date_start?></td>
              <td><?php echo $u->date_exp?></td>
              <td>
                <?php 
                $mulai = $u->date_start;
                $exp = $u->date_exp;
                if (!(strtotime($mulai) <= time() AND time() >= strtotime($exp))) {
                  // echo "<a href=$url><span class='btn btn-info'> _IKuti_ </span></a>";
                    echo "<button class='btn btn-success'>Aktive</button>";
                  } else {
                  echo "<button class='btn disabled'>Expired</button>";
                  } ?>
              </td>
              <td>
              <a class="btn btn-info" href="<?php echo site_url('admin/soalDosen/'.$u->id_ujian)?>"><i class="fa fa-eye"></i> Lihat Soal</a>
              <button class="btn btn-danger hapusData" data-id="<?php echo $soal->id_soal?>"><i class="glyphicon glyphicon-trash"></i> Delete</button>
              </td>
            </tr>
            <?php }?>
          </tbody>
          
        </table>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open('mahasiswa/get_soal') ?>
      <div class="modal-header">
        <h4 class="modal-title">Ujian Online</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          
      </div>
        <div class="modal-body">
          <h4>Apa Anda Yakin Ingin Menghapus Ujian</h4>

        </div>
          
          <!-- Modal footer -->
        <div class="modal-footer justify-content-between">
          <input type="hidden" name="idMatkul" id="hapusData" />
          <input type="hidden" name="waktu" id="waktuData" />

          <button type="submit" class="btn btn-warning">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('.idData').click(function(){
    var id = $(this).attr('data-id');
    var waktu = $(this).attr('data-waktu');
    $('#hapusData').val(id)
    $('#waktuData').val(waktu)
    $('#myModal').modal('show')
  })
</script>
