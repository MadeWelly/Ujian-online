 <script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js"></script>
 <script>
     tinymce.init({
         selector: 'textarea'
     });
 </script>
 <?php echo $this->session->flashdata('update_ujian') ?>
 <?php echo $this->session->flashdata('success') ?>
 <div class="row">
     <div class="col-md-3 pt-1">
        <div class="card card-outline card-orange">
            <div class="card-header">
                 <h3 class="card-title">Informasi Ujian</h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
             </div>
             <div class="card-footer p-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                         Nama Ujian <span class="float-right badge bg-gray"><?php echo $ujian->ujian_name ?></span>
                    </li>
                    <li class="nav-item">
                        Jumlah Soal<span class="float-right badge bg-gray">
                         <?php echo $ujian->jumlah_soal ?></span>
                    </li>
                    <li class="nav-item">                         
                        Tgl Mulai<span class="float-right badge bg-gray"> 
                         <?php echo $ujian->date_start ?></span>
                    </li>
                    <li>
                       Tgl Akhir<span class="float-right badge bg-gray">
                        <?php echo $ujian->date_exp ?></span>
                    </li>

                     <li>
                        Waktu<span class="float-right badge bg-gray">
                         <?php echo $ujian->waktu ?></span>
                     </li>
                </ul>
            </div>
            <div class="card p-1">
                  <div class="input-group">
                      <button type="button" class="btn btn-secondary btn-block" id="btnNew">
  Update Ujian
</button>
                  </div>
            </div>
         </div>
              <style type="text/css">
        .my-modal{
         position: fixed;
    top: 0;
    left: 0;
    z-index: 1050;
    display: none;
    width: 100%;
    height: 100%;
    overflow: hidden;
    outline: 0;
}
     </style>
         
         <!-- Navigasi Soal Ganda -->
        <div class="card card-outline card-orange">
            <div class="card-header">
                 <h3 class="card-title">Navigasi Soal Ganda</h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
             </div>
             <div class="card-footer p-0">
                 <ul class="pagination p-1">
                     <?php if ($soal_p == null) {
                            
                            echo $this->session->flashdata('nul');
                        } else {
                            $no = 1;
                            $nu = 1;
                            foreach ($soal_p as $s) { ?>
                             <li class="page-item">
                                 <button class="btn bg-gray" id="btnPg<?php echo $nu++ ?>" 
                                    data-id="<?php echo $s->id_soal ?>" 
                                    data-tgl="<?php echo $s->soal ?>" 
                                    data-file="<?php echo $s->file_soal ?>"
                                    file-a="<?php echo $s->file_a ?>"
                                    file-b="<?php echo $s->file_b ?>"
                                    file-c="<?php echo $s->file_c ?>"
                                    file-d="<?php echo $s->file_d ?>"
                                    file-e="<?php echo $s->file_e ?>"
                                    data-namadosen="<?php echo $s->opsi_a ?>" 
                                    data-matkul="<?php echo $s->opsi_b ?>" 
                                    data-ujian="<?php echo $s->opsi_c ?>" 
                                    data-j_soal="<?php echo $s->opsi_d ?>" 
                                    data-benar="<?php echo $s->opsi_e ?>" 
                                    data-salah="<?php echo $s->jawaban ?>"> <?php echo $no++ ?>
                                 </button>
                             </li><?php }?> <span id="totalPg" data-nilai="<?php echo $no-1?>"></span>
                                   <?php } ?>
                 </ul>
             </div>
         </div>
         <!-- Navigasi Soal Essay -->
        <div class="card card-outline card-orange">
            <div class="card-header">
                 <h3 class="card-title">Navigasi Soal Essay</h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
             </div>
             <div class="card-footer p-1">
                 <ul class="pagination">
                     <?php if (@$soal_e == null) {
                            echo $this->session->flashdata('nul');
                        } else {
                            $no = 1;
                            $nu = 1;
                            foreach ($soal_e as $s) { ?>
                             <li class="page-item">
                                 <button class="btn btn-secondary" id="btnEsay<?php echo $nu++?>"
                                    data-soal="<?php echo $s->soal_essay ?>" 
                                    data-id="<?php echo $s->id_essay ?>"
                                    file-esay="<?php echo $s->file_essay ?>"> <?php echo $no++ ?>
                                 </button>
                             </li>
                        <?php }} ?>
                        <span id="totalEsay" total-esay="<?php echo $no-1 ?>"></span>
                 </ul>
             </div>
         </div>
     </div>

<!-- MODAL UJIAN BARU -->
         <div class="modal fade" id="makeNew" style="background-color:rgba(0,0,0,0.5);">
             <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                        <h3>Update Ujian</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                     <?php echo form_open('dosen/buat_baru') ?>
                     <div class="modal-body" style="text-align: center;">
                         <h4>Apa Anda Yakin Ingin Update...?</h4>
                     </div>

                     <!-- Modal footer -->
                     <div class="modal-footer">
                         <!-- <input type="hidden" name="hapus" id="hapusData" /> -->
                         <button type="submit" class="btn btn-warning btn-block">Yes</button>
                         <button type="button" class="btn btn-danger btn-block" style="margin-top: 0" data-dismiss="modal">No</button>
                     </div>
                     <?php echo form_close();?>
                 </div>
             </div>
         </div>

<!-- MODAL PG-->
     <div class="modal fade" id="detailPg"  style="background-color:rgba(0,0,0,0.5);">
         <div class="modal-dialog">
             <div class="modal-content" style="overflow: auto;">
                 <div class="modal-header">
                    <h4 class="modal-title">Soal</h4>
                     <button type="button" class="close" data-dismiss="modal"><i class="fas fa-close"></i></button>
                 </div>
                 <?php echo form_open('dosen/deleteSoal') ?>
                 <!-- Modal body -->
                 <div class="modal-body">
                     <ul class="list-group" id="myList">
                         <div class="" style="text-align: center;">
                             <h4><b>Soal</b></h4>
                             <a href="<?php echo base_url('asset/bisnis.jpg') ?>"><img hidden="" id="file_soal" src="" width="200" height="200"></a>     
                             <p id="tgl"></p>

                            <?php 
                            $abc = ['A','B','C','D','E'];
                            foreach ($abc as $ae) {?>
                            
                             <h4><b><?php echo $ae ?></b></h4>
                             <img id="file<?php echo $ae?>" src="" width="200" height="200">             <p id="<?php echo 'jawaban_'.$ae ?>"></p>
                        <?php }?>
<!-- 
                             <h5><b>B</b></h5>
                             <img hidden="" id="file" src="" width="200" height="200"> 
                             <p id="matkul"></p>

                             <h5><b>C</b></h5>
                             <img hidden="" id="file" src="" width="200" height="200"> 
                             <p id="ujian"></p>

                             <h5><b>D</b></h5>
                             <img hidden="" id="file" src="" width="200" height="200"> 
                             <p id="j_soal"></p>

                             <h5><b>E</b></h5>
                             <img hidden="" id="file" src="" width="200" height="200"> 
                             <p id="benar"></p>
 -->
                             <h5><b>Jawaban</b></h5>
                             <p id="salah"></p>
                         </div>
                     </ul>
                 
                 <!-- Modal footer -->
                 <div class="modal-footer">
                     <input type="hidden" name="hapus" id="hapusData" />
                     <input type="hidden" name="soal" value="pg" />
                     <button class="btn btn-warning btn-block " href=""><b>Edit</b></button>
                     <button type="submit" class="btn btn-danger btn-block" style="margin-top: 0">Delete</button>
                 </div>
                 </div>
             </div>
             <?php echo form_close() ?>
         </div>
     </div>

<!-- MODAL ESSAY -->
     <div class="modal fade" id="detailEssay" style="background-color:rgba(0,0,0,0.5);">
         <div class="modal-dialog">
             <?php echo form_open('dosen/deleteSoal') ?>
             <div class="modal-content">

                 <!-- Modal Header -->
                 <div class="modal-header">
                    <h4 class="modal-title">Soal</h4>
                     <button type="button" class="close" data-dismiss="modal">×</button>
                     
                 </div>

                 <!-- Modal body -->
                 <div class="modal-body">
                     <ul class="list-group" id="myList">
                         <div class="" style="text-align: center;">
                             <h4><b>Soal</b></h4>
                             <img id="file_esay" src="" width="200" height="200">
                             <p id="soal_e"></p>
                             <h4><b></b></h4>

                         </div>
                     </ul>
                 </div>
                 <!-- Modal footer -->
                 <div class="modal-footer">
                     <input type="hidden" name="hapus" id="id_essay" />
                     <input type="hidden" name="soal" value="essay" />

                     <button type="submit" class="btn btn-block btn-warning">Edit</button>
                     <button type="submit" class="btn btn-block btn-danger" data-id="" style="margin-top:0 ">Delete</button>
                 </div>
             </div>
             <?php echo form_close() ?>
         </div>
     </div>
<!-- END MODAL -->



     <style type="text/css">
        .maximize{
    left: -323px;
    max-height: 100%!important;
    /* max-width: 100%!important; */
    /* position: fixed; */
    /* top: 61px; */
    width: 137%!important;
    /*z-index: 9999;*/
}
.hidden{
    display: none;
}
     </style>
     <div class="col-md-9 p-1" style="z-index:0">
        <div id="add_maximize" class="card card-outline card-orange" style="z-index:0">
            <div class="card-header" style="z-index:0">
                 <h3 class="card-title">Buat Soal Pilihan Ganda</h3>
                 <div class="card-tools pull-right">
                    <!-- <a href="#max">#</a> -->
                    <button type="button" class="btn btn-tool" id="max"><i class="fas fa-expand" id="icons"></i>
                  </button>
                  <button type="button" class="btn btn-tool hidden" id="min"><i class="fas fa-compress" id="icons"></i>
                  </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                 </div>
             </div>
             <div class="card-footer">
                 <div class="row">
                     <div class="col-sm-12 col-sm-offset">

                         <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            if ($this->session->flashdata('error')) {
                                echo '<div class="alert alert-danger">';
                                echo $this->session->flashdata('error');
                                echo '</div>';
                            }
                            ?>

                         <?php echo form_open_multipart('dosen/proses_buat_soal') ?>
                         <div class="form-group col-sm-12">
                             <input type="hidden" value="<?php echo $ujian->dosen_id ?>" name="id_dosen">
                             <input type="hidden" value="<?php echo $ujian->id_ujian ?>" name="ujianId">
                             <input type="hidden" value="<?php echo $ujian->matkul_id ?>" name="matkul_dosen">
                         </div>

                         <div class="col-sm-12">
                             <label for="file">Soal : </label>
                             <div class="form-group">
                                 <input type="file" name="file_soal" class="form-control">
                                 <small class="help-block" style="color: #dc3545"></small>
                             </div>
                             <div class="form-group">
                                 <textarea name="soal" id="" class="form-control froala-editor"></textarea>
                                 <small class="help-block" style="color: #dc3545"></small>
                             </div>
                         </div>


                         <?php
                            $abjad = ['a', 'b', 'c', 'd', 'e'];
                            foreach ($abjad as $abj) :
                                $ABJ = strtoupper($abj); // Abjad Kapital
                                ?>

                             <div class="col-sm-12">
                                 <label for="file">Jawaban <?= $ABJ; ?></label>
                                 <div class="form-group">
                                     <input type="file" name="file_<?= $abj; ?>" class="form-control">
                                     <small class="help-block" style="color: #dc3545"><?= form_error('file_' . $abj) ?></small>
                                 </div>
                                 <div class="form-group">
                                     <textarea name="jawaban_<?= $abj; ?>" id="jawaban_<?= $abj; ?>" class="form-control froala-editor"><?= set_value('jawaban_a') ?></textarea>
                                     <small class="help-block" style="color: #dc3545"><?= form_error('jawaban_' . $abj) ?></small>
                                 </div>
                             </div>

                         <?php endforeach; ?>

                         <div class="form-group col-sm-12">
                             <label for="jawaban" class="control-label">Kunci Jawaban</label>
                             <select required="required" name="jawaban" id="jawaban" class="form-control select2" style="width:100%!important">
                                 <option value="" disabled selected>Pilih Kunci Jawaban</option>
                                 <option value="A">A</option>
                                 <option value="B">B</option>
                                 <option value="C">C</option>
                                 <option value="D">D</option>
                                 <option value="E">E</option>
                             </select>
                             <small class="help-block" style="color: #dc3545"></small>
                         </div>
                         <div class="form-group pull-right">
                             <a href="" class="btn btn-flat btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                             <button type="submit" id="submit" class="btn btn-flat bg-purple"><i class="fa fa-save"></i> Simpan</button>
                         </div>
                         <?php echo form_close() ?>
                     </div>
                 </div>
             </div>
         </div>



        <div id="add_maximize" class="card card-outline card-orange" style="z-index:0">
            <div class="card-header" style="z-index:0">
                 <h3 class="card-title">Buat Soal Essay</h3>
                 <div class="card-tools pull-right">
                    <!-- <a href="#max">#</a> -->
                    <button type="button" class="btn btn-tool" id="max"><i class="fas fa-expand" id="icons"></i>
                  </button>
                  <button type="button" class="btn btn-tool hidden" id="min"><i class="fas fa-compress" id="icons"></i>
                  </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                 </div>
             </div>
             <div class="card-footer">
                 <div class="row">
                     <div class="col-sm-12 col-sm-offset">

                         <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            if ($this->session->flashdata('error')) {
                                echo '<div class="alert alert-danger">';
                                echo $this->session->flashdata('error');
                                echo '</div>';
                            }
                            ?>

                         <?php echo form_open_multipart('dosen/proses_buat_soal') ?>
                         <div class="form-group col-sm-12">
                             <input type="hidden" value="<?php echo $ujian->dosen_id ?>" name="id_dosen">
                             <input type="hidden" value="<?php echo $ujian->id_ujian ?>" name="ujianId">
                             <input type="hidden" value="<?php echo $ujian->matkul_id ?>" name="matkul_dosen">
                         </div>

                         <div class="col-sm-12">
                             <label for="file">Soal : </label>
                             <div class="form-group">
                                 <input type="file" name="file_essay" class="form-control">
                                 <small class="help-block" style="color: #dc3545"></small>
                             </div>
                             <div class="form-group">
                                 <textarea name="soal_essay" id="" class="form-control froala-editor"></textarea>
                                 <small class="help-block" style="color: #dc3545"></small>
                             </div>
                         </div>

                         <div class="form-group pull-right">
                             <a href="" class="btn btn-flat btn-default"><i class="fa fa-arrow-left"></i> Batal</a>
                             <button type="submit" id="submit" class="btn btn-flat bg-purple"><i class="fa fa-save"></i> Simpan</button>
                         </div>
                         <?php echo form_close() ?>
                     </div>
                 </div>
             </div>
         </div>



     </div>
 </div>
 </div>

<script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>asset/buat_soal1.js"></script>
 
