<div class="row">
  <div class="col-md-12">
  <div class="card mt-2">
    <div class="card-header">
      <h3 class="card-title">Hasil Ujian:</h3>
    </div>

    <div class="card-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Nama Ujian</th>
            <th>Nilai</th>
            <th>Benar</th>
            <th>Salah</th>
            <th>Tgl</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php  $no = 1 ; ?> 
        <?php foreach ($get_hasil as $hasil_ujian) {?>
        <tbody>
          <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $hasil_ujian->nim ?></td>
            <td><?php echo $hasil_ujian->msw_name ?></td>
            <td><?php echo $hasil_ujian->ujian_name?></td>
            <td><?php echo $hasil_ujian->nilai ?></td>
            <td><?php echo $hasil_ujian->j_benar?></td>
            <td><?php echo $hasil_ujian->j_salah?></td>
            <td><?php echo $hasil_ujian->date?></td>
            <td>
              <a href="<?php site_url(); ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash ">Delete</i></a>
            </td>
          </tr>
        </tbody>
         <?php } ?>
      </table>
    </div>
  </div>
</div>

</div>