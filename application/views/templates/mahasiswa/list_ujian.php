<div class="row">
  <div class="col-md-12">
    <div class="card" style="margin-top: 20px;">
      <div class="card-header">
        <h3 class="card-title">DataTable Ujian Sekarang</h3>
      </div>
            <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Ujian</th>
              <th>Mata Kuliah</th>
              <th>Dosen</th>
              <th>Jumlah Soal</th>
              <th>Waktu</th>
              <th>Expired</th>
              <th>Aksi</th>
            </tr>
          </thead>
          
          
            <?php $no = 1;
            foreach ($get_list as $list) { 
              echo $list->msw_name;
              if ($list->id_ujian == $list->ujian_id){

              }else{ ?>
          <tbody>
            <tr role="row" class="odd">
            
            <td><?php echo $no++ ?></td>
            <td><?php echo $list->ujian_name ?></td>
            <td><?php echo $list->matkul_name ?></td>
            <td><?php echo $list->dosen_name ?></td>
            <td><?php echo $list->jumlah_soal ?></td>
            <td><?php echo $list->waktu ?> Menit</td>
            <td><?php echo $list->date_start;echo ' | '; echo$list->date_exp?></td>
            <td>
            <?php
                  $mulai = $list->date_start; // waktu mulai
                  $exp = $list->date_exp; // batas waktu
                  $url = site_url('mahasiswa/get_soal/' . $list->matkul_id);
                  if (!(strtotime($mulai) <= time() and time() >= strtotime($exp))) {
                    echo "<button class='btn btn-info idData' data-idUjian='$list->id_ujian' data-idDosen='$list->dosen_id' data-idMatkul='$list->matkul_id' data-waktu='$list->waktu'><i class='fa fa-edit'></i> IKuti</button>";
                    // echo "<a href=$url><span class='btn btn-info'> _IKuti_ </span></a>";
                    // if($list->ujian_id){
                    //   echo 'hide'.$list->ujian_id;
                    // }elseif($list->ujian_id==null){
                    //   echo "<button class='btn btn-info idData' data-idUjian='$list->id_ujian' data-idDosen='$list->dosen_id' data-idMatkul='$list->matkul_id' data-waktu='$list->waktu'><i class='fa fa-edit'></i> IKuti</button>";
                    // }
                  } else {
                    echo "<button disabled class='btn btn-danger'>Expired</button>";
                  }
                }
                

                ?>
              </td>
            </tr>
          </tbody>
          <?php } ?>
        </table>
      </div>
            <!-- /.card-body -->
    </div>

          <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open('mahasiswa/get_soal') ?>
      <div class="modal-header">
       <h4 class="modal-title">System Says</h4>    
       <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="text-align: center;">
        Apa Anda Yakin Ingin Mulai Ujian Sekarang...?
        Waktu Mengerjakan Soal Akan Berjalan Ketika Anda Menekan Tombol Mulai!
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-between">
        <input type="hidden" name="id_u" id="idUjn" />
        <input type="hidden" name="id_d" id="idDsn" />
        <input type="hidden" name="id_m" id="idMtk" />
        <input type="hidden" name="waktu" id="waktuData" />

        <button type="submit" class="btn btn-warning">Mulai</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

          <div class="card" style="margin-top:">
            <div class="card-header">
              <h3 class="card-title">DataTable Riwayat Ujian</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php if ($get_list == null) {
                echo '
                      <div class="box-body">
                        <div class="callout callout-">
                          <h3><i class="fa fa-bullhorn"></i> Ujian Belom Ada</h4>
                          </div>
                          </div>

                          ';
              } else { ?>
              <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Ujian</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Jumlah Soal</th>
                    <th>Waktu</th>
                    <th>Expired</th>
                    <th>Keterangan</th>

                  </tr>
                </thead>
                <?php $no = 1;
          foreach ($id_u as $u) { ?>
          <tbody>
            <tr role="row" class="odd">
              <td><?php echo $no++ ?></td>
              <td><?php echo $u->ujian_name ?></td>
              <td><?php echo $u->matkul_name ?></td>
              <td><?php echo $u->dosen_name ?></td>
              <td><?php echo $u->jumlah_soal ?></td>
              <td><?php echo $u->waktu ?> Menit</td>
              <td><?php echo $u->date_start. ' | ' . $u->date_exp ?></td>
              <td>
                <?php
                    $mulai = $u->date_start; // waktu mulai
                    $exp = $u->date_exp; // batas waktu
                    $url = site_url('mahasiswa/get_soal/' . $u->matkul_id);
                    if ($u->id_ujian) {
                      echo "<span class='btn btn-success'><i class='fa fa-check'></i></span>";
                    }
                    ?>
              </td>
            </tr>
          </tbody>
        <?php } ?>
      </table>
    <?php } ?>
  </div> 
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('.idData').click(function(){
    var idUjian = $(this).attr('data-idUjian');
    var idDosen = $(this).attr('data-idDosen');
    var idMatkul = $(this).attr('data-idMatkul');
    var waktu = $(this).attr('data-waktu');
    $('#idUjn').val(idUjian)
    $('#idDsn').val(idDosen)
    $('#idMtk').val(idMatkul)
    $('#waktuData').val(waktu)
    $('#myModal').modal('show')
    //fade
          $(".modal-backdrop").removeClass("modal-backdrop");
       var zinde = document.getElementById('zindex');
       var bgColor = document.getElementById('myModal');
        zinde.style.zIndex = "0";
        bgColor.style.background = "rgba(0, 0, 0, 0.5)";
  })
</script>