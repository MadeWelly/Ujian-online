<br>
<div class="row" style="font-family: Georgia, serif">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Ujian Anda </h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <?php if ($get_list == null) {
          echo '
            <div class="box-body">
              <div class="callout callout-">
                <h3><i class="fa fa-bullhorn"></i> Ujian Belom Ada</h4>
                </div>
                </div>

                ';
        } elseif ($get_list != null) { ?>

          <table class="table table-light">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Ujian</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Jumlah Soal</th>
                <th>Waktu</th>
                <th>Mulai</th>
                <th>Sampai</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php $no = 1;
              foreach ($get_list as $list) { ?>
              <tbody>
                <tr>
                  <!-- <?php echo $id = $list->id_ujian; ?> -->
                  <?php
                      // print_r($get_list);die;
                      if ($list->id_ujian == $list->ujian_id) {
                        // echo $id = $list->ujian_id;
                        if ($list->id_ujian == $list->ujian_id) { }
                      } else {
                        ?>
                    <td><?php echo $list->id_ujian; ?></td>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $list->ujian_name ?></td>
                    <td><?php echo $list->matkul_name ?></td>
                    <td><?php echo $list->dosen_name ?></td>
                    <td><?php echo $list->jumlah_soal ?></td>
                    <td><?php echo $list->waktu ?> Menit</td>
                    <td><?php echo $list->date_start ?></td>
                    <td><?php echo $list->date_exp ?></td>
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
                            echo "<button class='btn btn-danger'>Expired</button>";
                          }
                        }

                        ?>
                    </td>
                </tr>
              </tbody>
            <?php } ?>
          </table>
        <?php } ?>
        <!-- <?php echo $this->db->last_query();  ?> -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <?php echo form_open('mahasiswa/get_soal') ?>
      <div class="modal-body" style="text-align: center;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3><b>Ujian Online</b></h3>
        <h4>Apa Anda Yakin Ingin Mulai UJian Sekarang...?</h4>
        <h4>Waktu Mengerjakan Soal Akan Berjalan Ketika Anda Menekan Tombol Mulai!</h4>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
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
<div class="box" style="font-family: Georgia, serif">
  <div class="box-header with-border">
    <h3 class="box-title">Riwayat Ujian: </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body">
    <?php if ($get_list == null) {
      echo '
            <div class="box-body">
              <div class="callout callout-">
                <h3><i class="fa fa-bullhorn"></i> Ujian Belom Ada</h4>
                </div>
                </div>

                ';
    } else { ?>

      <table class="table  table-light">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Ujian</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Jumlah Soal</th>
            <th>Waktu</th>
            <th>Mulai</th>
            <th>Sampai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php $no = 1;
          foreach ($id_u as $u) { ?>
          <tbody>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $u->ujian_name ?></td>
              <td><?php echo $u->matkul_name ?></td>
              <td><?php echo $u->dosen_name ?></td>
              <td><?php echo $u->jumlah_soal ?></td>
              <td><?php echo $u->waktu ?> Menit</td>
              <td><?php echo $u->date_start ?></td>
              <td><?php echo $u->date_exp ?></td>
              <td>
                <?php
                    $mulai = $u->date_start; // waktu mulai
                    $exp = $u->date_exp; // batas waktu
                    $url = site_url('mahasiswa/get_soal/' . $u->matkul_id);
                    if ($u->id_ujian) {
                      echo "<button class='btn btn-danger'>Done</button>";
                    }
                    ?>
              </td>
            </tr>
          </tbody>
        <?php } ?>
      </table>
    <?php } ?>
    <!-- <?php echo $this->db->last_query();  ?> -->
  </div>
</div>
</div>
</div>

<!-- <?php
      $duration = "";
      $duration = $list->waktu;
      // print_r($duration);die;
      $this->session->set_userdata(array(
        'duration' => $duration,
        'start_time' => date("Y-m-d H:i:s")
      ));

      $end_time = $end_time = date('Y-m-d H:i:s', strtotime('+' . $this->session->userdata('duration') . 'minutes', strtotime($this->session->userdata('start_time'))));
      // print_r($end_time);die;

      $this->session->set_userdata(['end_time' => $end_time]);
      ?> -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('.idData').click(function() {
    var idUjian = $(this).attr('data-idUjian');
    var idDosen = $(this).attr('data-idDosen');
    var idMatkul = $(this).attr('data-idMatkul');
    var waktu = $(this).attr('data-waktu');
    $('#idUjn').val(idUjian)
    $('#idDsn').val(idDosen)
    $('#idMtk').val(idMatkul)
    $('#waktuData').val(waktu)
    $('#myModal').modal('show')
  })
</script>