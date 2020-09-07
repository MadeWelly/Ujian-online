<!-- Table row -->
      <div class="row">
        <div class="col-md-12 pt-2">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
            Semester Satu</h3>
            <div class="card-tools"><small class="pull-right">Date : <?php echo  date('Y-m-d H:i:s ') ?></small></div>
            </div>
            <div class="card-body">
          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
            <tr>
              <th>No</th>
              <th>Ujian</th>
              <th>Matkul</th>
              <th>Dosen</th>
              <th>Nilai</th>
              <th>Grade</th>
            </tr>
            </thead>
  
            <tbody>
              <?php $no = 1; foreach ($hasil as $hsl) { ?>

              <tr role="row" class="odd">
                <td><?php echo $no++ ?></td>
                <td><?php echo $hsl->ujian_name ?></td>
                <td><?php echo $hsl->matkul_name ?></td>
                <td><?php echo $hsl->dosen_name ?></td>
                <td><?php echo $hsl->nilai ?></td>
                <td>B</td>
              </tr>
              <?php } ?>
            </tbody>
          
          </table>
        </div>


        <div class="card-footer">
          <a href="<?php echo site_url('admin/invoicePrint/').$mahasiswa->id_msw."/".'1' ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>

      </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Semester Dua</h3>
              <div class="card-tools">
                <small class="pull-right">Date : <?php echo  date('Y-m-d H:i:s ') ?></small>
              </div>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Ujian</th>
                  <th>Matkul</th>
                  <th>Dosen</th>
                  <th>Nilai</th>
                  <th>Grade</th>
                </tr>
                </thead>
  
            <tbody>
              <?php $no = 1; foreach ($hasil2 as $hsl) { ?>
              <tr role="row" class="odd">
                <td><?php echo $no++ ?></td>
                <td><?php echo $hsl->ujian_name ?></td>
                <td><?php echo $hsl->matkul_name ?></td>
                <td><?php echo $hsl->dosen_name ?></td>
                <td><?php echo $hsl->nilai ?></td>
                <td>B</td>
              </tr>
              <?php } ?>
            </tbody>
          
          </table>
        </div>
         <div class="card-footer">
          <a href="<?php echo site_url('admin/invoicePrint/').$mahasiswa->id_msw."/".'2' ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Semester Tiga</h3>
              <div class="card-tools">
                <small class="pull-right">Date : <?php echo  date('Y-m-d H:i:s ') ?></small>
              </div>
            </div>
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
            <tr>
              <th>No</th>
              <th>Ujian</th>
              <th>Matkul</th>
              <th>Dosen</th>
              <th>Nilai</th>
              <th>Grade</th>
            </tr>
            </thead>
  
            <tbody>
              <?php if (@$hasil3==null){

              }else{
              $no = 1; foreach ($hasil3 as $hsl) { ?>
              <tr role="row" class="odd">
                <td><?php echo $no++ ?></td>
                <td><?php echo $hsl->ujian_name ?></td>
                <td><?php echo $hsl->matkul_name ?></td>
                <td><?php echo $hsl->dosen_name ?></td>
                <td><?php echo $hsl->nilai ?></td>
                <td>B</td>
              </tr>
              <?php } ?>
            <?php   } ?>
            </tbody>
          
          </table>
        </div>
        <div class="card-footer">
          <a href="<?php echo site_url('admin/invoicePrint/').$mahasiswa->id_msw."/".'3' ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Semester Empat</h3>
              <div class="card-tools">
                <small class="pull-right">Date : <?php echo  date('Y-m-d H:i:s ') ?></small>
              </div>
            </div>
            <div class="card-body">
              <table id="example4" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
            <tr>
              <th>No</th>
              <th>Ujian</th>
              <th>Matkul</th>
              <th>Dosen</th>
              <th>Nilai</th>
              <th>Grade</th>
            </tr>
            </thead>
  
            <tbody>
              <?php if (@$hasil4==null){

              }else{
              $no = 1; foreach ($hasil4 as $hsl) { ?>
              <tr role="row" class="odd">
                <td><?php echo $no++ ?></td>
                <td><?php echo $hsl->ujian_name ?></td>
                <td><?php echo $hsl->matkul_name ?></td>
                <td><?php echo $hsl->dosen_name ?></td>
                <td><?php echo $hsl->nilai ?></td>
                <td>B</td>
              </tr>
              <?php } ?>
            <?php   } ?>
            </tbody>
          
          </table>
        </div>
                <div class="card-footer">
          <a href="<?php echo site_url('admin/invoicePrint/').$mahasiswa->id_msw."/".'4' ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
        <!-- /.col -->
      </div>

<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Semester Lima</h3>
              <div class="card-tools">
                <small class="pull-right">Date : <?php echo  date('Y-m-d H:i:s ') ?></small>
              </div>
            </div>
            <div class="card-body">
              <table id="example5" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
            <tr>
              <th>No</th>
              <th>Ujian</th>
              <th>Matkul</th>
              <th>Dosen</th>
              <th>Nilai</th>
              <th>Grade</th>
            </tr>
            </thead>
  
            <tbody>
              <?php if (@$hasil5==null){

              }else{
              $no = 1; foreach ($hasil5 as $hsl) { ?>
              <tr role="row" class="odd">
                <td><?php echo $no++ ?></td>
                <td><?php echo $hsl->ujian_name ?></td>
                <td><?php echo $hsl->matkul_name ?></td>
                <td><?php echo $hsl->dosen_name ?></td>
                <td><?php echo $hsl->nilai ?></td>
                <td>B</td>
              </tr>
              <?php } ?>
            <?php   } ?>
            </tbody>
          
          </table>
        </div>
        <div class="card-footer">
          <a href="<?php echo site_url('admin/invoicePrint/').$mahasiswa->id_msw."/".'5' ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
        <!-- /.col -->
      </div>

 <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Semester Enam</h3>
              <div class="card-tools">
                <small class="pull-right">Date : <?php echo  date('Y-m-d H:i:s ') ?></small>
              </div>
            </div>
            <div class="card-body">
              <table id="example6" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
            <tr>
              <th>No</th>
              <th>Ujian</th>
              <th>Matkul</th>
              <th>Dosen</th>
              <th>Nilai</th>
              <th>Grade</th>
            </tr>
            </thead>
  
            <tbody>
              <?php if (@$hasil6==null){

              }else{
              $no = 1; foreach ($hasil6 as $hsl) { ?>
              <tr role="row" class="odd">
                <td><?php echo $no++ ?></td>
                <td><?php echo $hsl->ujian_name ?></td>
                <td><?php echo $hsl->matkul_name ?></td>
                <td><?php echo $hsl->dosen_name ?></td>
                <td><?php echo $hsl->nilai ?></td>
                <td>B</td>
              </tr>
              <?php } ?>
            <?php   } ?>
            </tbody>
          
          </table>
        </div>
        <div class="card-footer">
          <a href="<?php echo site_url('admin/invoicePrint/').$mahasiswa->id_msw."/".'6' ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
        <!-- /.col -->
      </div>

  <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Semester Tujuh</h3>
              <div class="card-tools">
                <small class="pull-right">Date : <?php echo  date('Y-m-d H:i:s ') ?></small>
              </div>
            </div>
            <div class="card-body">
              <table id="example7" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
            <tr>
              <th>No</th>
              <th>Ujian</th>
              <th>Matkul</th>
              <th>Dosen</th>
              <th>Nilai</th>
              <th>Grade</th>
            </tr>
            </thead>
  
            <tbody>
              <?php if (@$hasil7==null){

              }else{
              $no = 1; foreach ($hasil7 as $hsl) { ?>
              <tr role="row" class="odd">
                <td><?php echo $no++ ?></td>
                <td><?php echo $hsl->ujian_name ?></td>
                <td><?php echo $hsl->matkul_name ?></td>
                <td><?php echo $hsl->dosen_name ?></td>
                <td><?php echo $hsl->nilai ?></td>
                <td>B</td>
              </tr>
              <?php } ?>
            <?php   } ?>
            </tbody>
          
          </table>
        </div>
        <div class="card-footer">
          <a href="<?php echo site_url('admin/invoicePrint/').$mahasiswa->id_msw."/".'7' ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
        <!-- /.col -->
      </div>

<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Semester Tujuh</h3>
              <div class="card-tools">
                <small class="pull-right">Date : <?php echo  date('Y-m-d H:i:s ') ?></small>
              </div>
            </div>
            <div class="card-body">
              <table id="example8" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
            <tr>
              <th>No</th>
              <th>Ujian</th>
              <th>Matkul</th>
              <th>Dosen</th>
              <th>Nilai</th>
              <th>Grade</th>
            </tr>
            </thead>
  
            <tbody>
              <?php if (@$hasil8==null){

              }else{
              $no = 1; foreach ($hasil8 as $hsl) { ?>
              <tr role="row" class="odd">
                <td><?php echo $no++ ?></td>
                <td><?php echo $hsl->ujian_name ?></td>
                <td><?php echo $hsl->matkul_name ?></td>
                <td><?php echo $hsl->dosen_name ?></td>
                <td><?php echo $hsl->nilai ?></td>
                <td>B</td>
              </tr>
              <?php } ?>
            <?php   } ?>
            </tbody>
          
          </table>
        </div>
        <div class="card-footer">
          <a href="<?php echo site_url('admin/invoicePrint/').$mahasiswa->id_msw."/".'8' ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
        <!-- /.col -->
      </div>
