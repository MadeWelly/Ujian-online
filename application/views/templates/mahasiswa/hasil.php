<div class="row">
  <div class="col-md-12">
    <?php echo $this->session->flashdata('delete_success'); ?>
    <div class="card" style="margin-top: 20px;">
      <div class="card-header">
        <h3 class="card-title">DataTable Ujian Sekarang</h3>
      </div>
       <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Ujian</th>
              <th>Matkul</th>
              <th>Dosen</th>
              <th>Nilai</th>
              <th>Tgl</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <?php  $no = 1 ; ?> 
          <?php foreach ($get_hasil as $hasil_ujian) {?>
          <tbody>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $hasil_ujian->ujian_name ?></td>
              <td><?php echo $hasil_ujian->matkul_name; ?></td>
              <td><?php echo $hasil_ujian->dosen_name ?></td>
              <td><?php echo $hasil_ujian->nilai?></td>
              <td><?php echo $hasil_ujian->date ?></td>
              <td>
                <button class="btn btn-info detailHasil" id=""
                data-tgl="<?php echo $hasil_ujian->date ?>"
                data-namadosen="<?php echo $hasil_ujian->dosen_name ?>"
                data-matkul="<?php echo $hasil_ujian->matkul_name ?>"
                data-ujian="<?php echo $hasil_ujian->ujian_name ?>"
                data-j_soal="<?php echo $hasil_ujian->jumlah_soal ?>"
                data-benar="<?php echo $hasil_ujian->j_benar ?>"
                data-salah="<?php echo $hasil_ujian->j_salah ?>"
                data-nilai="<?php echo $hasil_ujian->nilai ?>"><i class="fa fa-eye"></i> Detail</button>
                <!-- <a href="<?php site_url('mahasiswa/delete_hasil'); ?>" class="btn btn-danger"><i class="fa fa-">Delete</i></a> -->
                 <button class="btn btn-danger hapusData" data-id="<?php echo $hasil_ujian->id_hasil?>"><i class="glyphicon glyphicon-trash"></i> Delete</button>

              </td>
            </tr>
          </tbody>
           <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal detail hasil -->
 <div class="modal fade" id="detailHasil">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Hasil Ujian Anda</h3>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <ul class="list-group" id="myList">
            <div class="" style="text-align: center;">
            <h4><b>Tanggal</b></h4>
            <p id="tgl"></p>

            <h4><b>Dosen</b></h4>
            <p id="dosen"></p>

            <h5><b>Mata Kuliah</b></h5>
            <p id="matkul"></p>
            
            <h5><b>Nama Ujian</b></h5>
            <p id="ujian"></p>

            <h5><b>Jumlah Soal</b></h5>
            <p id="j_soal"></p>

            <h5><b>Jawaban Benar</b></h5>
            <p id="benar"></p>

            <h5><b>Jawaban Salah</b></h5>
            <p id="salah"></p>

              <h5><b>Nilai</b></h5>
              <h2 id="nilai"></h2>
            </div>
          </ul>  
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <!-- <input type="text" name="soal_id" id="" /> -->
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> 
      </div>
    </div>
  </div>

<!-- modal hapus -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <?php echo form_open('mahasiswa/delete_hasil') ?>
        <div class="modal-body" style="text-align: center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><b>Hapus Hasil</b></h3>
          <h4>Apa Anda Yakin Ingin Menghapus...?</h4>
        </div>
          
          <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="hapus" id="hapusData" />
          <button type="submit" class="btn btn-warning">Delete</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
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

  <script type="text/javascript">
    $('.detailHasil').click(function(){
      $('#detailHasil').modal('show')
               $(".modal-backdrop").removeClass("modal-backdrop");
         var zinde = document.getElementById('zindex');
         zinde.style.zIndex = "0";
      var tgl = $(this).attr('data-tgl');
      var dosen = $(this).attr('data-namadosen');
      var matkul = $(this).attr('data-matkul');
      var ujian = $(this).attr('data-ujian');
      var j_soal = $(this).attr('data-j_soal');
      var benar = $(this).attr('data-benar');
      var salah = $(this).attr('data-salah');
      var nilai = $(this).attr('data-nilai');
      document.getElementById("tgl").innerHTML = tgl;
      document.getElementById("dosen").innerHTML = dosen;
      document.getElementById("matkul").innerHTML = matkul;
      document.getElementById("ujian").innerHTML = ujian;
      document.getElementById("j_soal").innerHTML = j_soal;
      document.getElementById("benar").innerHTML = benar;
      document.getElementById("salah").innerHTML = salah;
      document.getElementById("nilai").innerHTML = nilai;
    })
  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
