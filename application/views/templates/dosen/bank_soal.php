<br>
<div class="row">
  <div class="col-md-12">
  <div class="box">
    <div class="box-body">
      <h3>List Soal :</h3>
      
      <table class="table table-bordered table-light">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Ujian</th>
            <th>Soal</th>
            <th>Jawaban</th>
            <th>Waktu</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php  $no = 1 ; ?> 
        <?php foreach($soal_dosen as $soal) { ?> 
          <tr>
            <td id=""><?php echo $no++?></td>
            <td id=""><?php echo $soal->nama_ujian ?></td>
            <td id=""><?php echo word_limiter($soal->soal, 12) ?></td>
            <td id=""><?php echo $soal->jawaban ?></td>
            <td id=""><?php echo $soal->waktu?></td>
            <td>
              
              <button type="submit" class="btn btn-success detailSoal" 
              data-soal="<?php echo $soal->soal?>"
              data-a="<?php echo $soal->opsi_a?>"
              data-b="<?php echo $soal->opsi_b?>"
              data-c="<?php echo $soal->opsi_c?>"
              data-d="<?php echo $soal->opsi_d?>"
              data-e="<?php echo $soal->opsi_e?>"
              data-jawaban="<?php echo $soal->jawaban?>"><i class="fa fa-pencil"></i>/Detail</button>
            
              <button class="btn btn-danger hapusData" data-id="<?php echo $soal->id_soal?>"><i class="glyphicon glyphicon-trash"></i>/Delete</button>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      <!-- <?php echo $this->db->last_query();  ?> -->
    </div>
  </div>
</div>

</div>

<!-- modal hapus -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <?php echo form_open('dosen/delete_soal') ?>
        <div class="modal-body" style="text-align: center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><b>Hapus Soal</b></h3>
          <h4>Apa Anda Yakin Ingin Menghapus...?</h4>
        </div>
          
          <!-- Modal footer -->
        <div class="modal-footer">
          <input type="hidden" name="hapus" id="hapusData" />
          <button type="submit" class="btn btn-warning">Delete</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal detail -->
<!-- The Modal -->
  <div class="modal fade" id="detailModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Detail Soal</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <ul class="list-group" id="myList">
            <h4><b>Soal</b></h4>
            <p id="soal"></p>

            <h5><b>Jawaban A</b></h5>
            <p id="a"></p>
            
            <h5><b>Jawaban B</b></h5>
            <p id="b"></p>

            <h5><b>Jawaban C</b></h5>
            <p id="c"></p>

            <h5><b>Jawaban D</b></h5>
            <p id="d"></p>

            <h5><b>Jawaban E</b></h5>
            <p id="e"></p>

            <h5><b>Jawaban Benar</b></h5>
            <p id="jawaban"></p>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('.hapusData').click(function(){
    var id = $(this).attr('data-id');
    $('#hapusData').val(id)
    $('#myModal').modal('show')
  })
</script>

<script type="text/javascript">
  $('.detailSoal').click(function(){
    $('#detailModal').modal('show');
    var soal = $(this).attr('data-soal');
    var a = $(this).attr('data-a');
    var b = $(this).attr('data-b');
    var c = $(this).attr('data-c');
    var d = $(this).attr('data-d');
    var e = $(this).attr('data-e');
    var jawaban = $(this).attr('data-jawaban');
    document.getElementById("soal").innerHTML = soal;
    document.getElementById("a").innerHTML = a;
    document.getElementById("b").innerHTML = b;
    document.getElementById("c").innerHTML = c;
    document.getElementById("d").innerHTML = d;
    document.getElementById("e").innerHTML = e;
    document.getElementById("jawaban").innerHTML = jawaban;
    // $('#soal').val(soal)
    // $('#a').val(a)
    // $('#b').val(b)
    // $('#c').val(c)
    // $('#d').val(d)
    // $('#e').val(e)
    // $('#jawaban').val(jawaban)
  })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
