<script src="<?php echo base_url() ?>s/assets/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <?php echo $this->session->flashdata('update_ujian'); ?>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <?php
                        echo validation_errors('<div class="alert alert-danger">', '</div>');
                        if ($this->session->flashdata('error')) {
                            echo '<div class="alert alert-danger">';
                            echo $this->session->flashdata('error');
                            echo '</div>';
                        }

                        ?>

                        <?php echo form_open_multipart('dosen/buat_ujian') ?>
                        <div class="form-group col-sm-12">

                            <input type="hidden" name="jurusan" id="" value="<?php echo $semester_jurusan->prody_id ?>">
                            <input type="hidden" name="kelas" id="" value="<?php echo $semester_jurusan->class_id ?>">
                            <input type="hidden" value="<?php echo $row_dosen->id_dosen ?>" name="id_dosen">
                            <input type="hidden" value="<?php echo $row_dosen->matkul_id ?>" name="matkul_dosen">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="waktu" class="control-label">Nama Ujian</label>

                            <select required="required" name="nama_ujian" id="jawaban" class="form-control select2" style="width:100%!important">
                                <option value="" disabled selected>Pilih Ujian</option>
                                <option value="UTS">UTS</option>
                                <option value="UAS">UAS</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="waktu" class="control-label">Jumlah Soal</label>
                            <input required="required" value="" type="number" name="jumlah_soal" placeholder="Total soal" id="bobot" class="form-control">
                            <small class="help-block" style="color: #dc3545"></small>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="waktu" class="control-label">Waktu</label>
                            <input required="required" value="" type="number" name="waktu" placeholder="Menit" id="bobot" class="form-control">
                            <small class="help-block" style="color: #dc3545"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date range:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" name="start" class="form-control pull-right" id="reservation">
                            </div>
                            <!-- <div class="col-md-6">p</div> -->
                            <!-- /.input group -->
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label>Date range:</label> -->
                            <div class="input-group" style="margin-top: 24px;">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" name="end" class="form-control pull-right" id="reservation">
                            </div>
                            <!-- <div class="col-md-6">p</div> -->
                            <!-- /.input group -->
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