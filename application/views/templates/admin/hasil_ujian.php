<div class="row">
  <div class="col-md-12">
  <div class="box">
    <div class="box-body">
      <h3>Hasil Ujian:</h3>

      <table class="table table-bordered table-light">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nim</th>
            <th>Nama Mahsiswa</th>
            <th>Jususan</th>
            <th>Semester</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php  $no = 1 ; ?> 
        <?php foreach ($hasil as $hasil_m) {?>
        <tbody>
          <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $hasil_m->nim?></td>
            <td><?php echo $hasil_m->nama?></td>
            <td><?php echo $hasil_m->nama_jurusan?></td>
            <td><?php echo $hasil_m->kelas_semester?></td>
            <td>
              <a href="<?php echo site_url('admin/invoice_ujian'); ?>" class="btn btn-success"><i class="fa fa-">Detail</i></a>
              <!-- <a href="<?php site_url(); ?>" class="btn btn-info"><i class="fa fa-">Print</i></a> -->
              <button class="btn btn-info detailHasil"
              data-nim="<?php echo $hasil_m->nim ?>"
              data-n_mahasiswa="<?php echo $hasil_m->nama ?>"
              data-jurusan="<?php echo $hasil_m->nama_jurusan ?>"
              data-semester="<?php echo $hasil_m->kelas_semester ?>"
              data-email="<?php echo $hasil_m->email ?>"
              data-ujian="<?php echo $hasil_m->nama_ujian ?>"
              data-matkul="<?php echo $hasil_m->nama_matkul ?>"
              data-dosen="<?php echo $hasil_m->nama_dosen ?>"
              data-nilai="<?php echo $hasil_m->nilai ?>"
              > Detail </button>
            </td>
          </tr>
        </tbody>
         <?php }?>
      </table>
      <!-- <?php echo $this->db->last_query();  ?> -->
    </div>
  </div>
</div>

</div>

<div class="modal fade" id="detailHasil">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
      <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Universitas Satyagama.
            <small class="pull-right">Date: 2/10/2014</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
          From
          <address>
            <strong>Admin, Inc.</strong><br>
            Fakultas Teknologi Industri<br>
            Cengkareng Jakarta Barat 15217<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          To
          <address>
            <strong id="nim"></strong><br>
            <span id="nama"></span><br>
            <span id="jurusan"></span><br>
            <span id="semester"></span><br>
            <span id="email"></span><br>
            Phone: (555) 539-1037<br>
          </address>
        </div>
        <!-- /.col -->
       <!--  <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
        </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Ujian</th>
              <th>Matkul</th>
              <th>Dosen</th>
              <th>Nilai</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Call of Duty</td>
              <td>455-981-221</td>
              <td>El snort testosterone trophy driving gloves handsome</td>
              <td>$64.50</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Catatan:</p>


          <textarea placeholder="Tulis disini" class="form-control" rows="5" id="comment" name="text"></textarea>
            
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6" style="text-align: center;">
          <p class="lead">Jakarta 19-October-2019</p>
          <br><br><br><br><br>
          <span><p class="lead">(Pihak Fakultas)</p></span>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="<?php echo site_url('admin/invoicePrint') ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content <--></-->
        
      </div>
    </div>
</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script type="text/javascript">
    $('.detailHasil').click(function(){
      $('#detailHasil').modal('show')
      var nim = $(this).attr('data-nim');
      var nama = $(this).attr('data-n_mahasiswa');
      var jurusan = $(this).attr('data-jurusan');
      var semester = $(this).attr('data-semester');
      var email = $(this).attr('data-email');
      var ujian = $(this).attr('data-ujian');
      var matkul = $(this).attr('data-matkul');
      var dosen = $(this).attr('data-dosen');
      var nilai = $(this).attr('data-nilai');
      document.getElementById("nim").innerHTML = nim;
      document.getElementById("nama").innerHTML = nama;
      document.getElementById("jurusan").innerHTML = jurusan;
      document.getElementById("semester").innerHTML = semester;
      document.getElementById("email").innerHTML = email;
      document.getElementById("dosen").innerHTML = dosen;
      document.getElementById("matkul").innerHTML = matkul;
      document.getElementById("ujian").innerHTML = ujian;
      document.getElementById("nilai").innerHTML = nilai;
    })
  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
