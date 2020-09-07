<br>
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>List Ujian:</h3>
      </div>
      <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Ujian</th>
              <th>Nama Matkul</th>
              <th>Jumlah Soal</th>
              <th>Durasi</th>
              <th>Tgl Mulai</th>
              <th>Tgl Akhir</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <?php 
          if (@$bankUts) {
          $no = 1; foreach($bankUts as $u) { ?>
          <tbody>
            <tr>
              <td><?php echo $no++?></td>
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
              <a class="btn btn-info" href="<?php echo site_url('dosen/viewSoal/'.$u->id_ujian)?>"><i class="fa fa-eye"></i> Lihat Soal</a>
              <button class="btn btn-danger hapusData" data-id="<?php echo $u->id_ujian?>"><i class="glyphicon glyphicon-trash"></i> Delete</button>
              </td>
            </tr>
          </tbody>
          <?php }?>
        </table>
      <?php }elseif($bankUas){
      $no = 1; foreach($bankUas as $u) { ?>
    <tbody>
      <tr>
        <td><?php echo $no++?></td>
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
        <a class="btn btn-info" href="<?php echo site_url('dosen/viewSoal/'.$u->id_ujian)?>"><i class="fa fa-eye"></i> Lihat Soal</a>
        <button class="btn btn-danger hapusData" data-id="<?php echo $soal->id_soal?>"><i class="glyphicon glyphicon-trash"></i> Delete</button>
        </td>
      </tr>
    </tbody>
    <?php }}?>
  </table>
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
          <input type="hidden" name="idMatkul" id="hapusData" />
          <input type="hidden" name="waktu" id="waktuData" />

          <button type="submit" class="btn btn-warning">Mulai</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

