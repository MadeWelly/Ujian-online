          <style type="text/css">
            .custom-control-label::after{
              left: -1.5rem;
            }
            .custom-control-label::before{
              left: -1.5rem;
            }
            .form-control {
              background-color: #3d719a1a;
            }
          </style>
<div class="row">
  <div class="col-sm-6 offset-3 pt-3">    
    <div class="card card-navy">
      <div class="card-header with-border">
        <h2 class="card-title">Update Data Dosen</h2>
      </div>
      <?php echo form_open('admin/update_dosen') ?>
        <div class="card-body">
          <input type="hidden" name="id_dosen" value="<?php echo $dosen_byid->id_dosen ?>">
          <input type="hidden" name="matkul_id" value="<?php echo $dosen_byid->matkul_id ?>">
          <div class="form-group row">
            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nim</label>
            <div class="col-md-10">
              <input name="nip" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $dosen_byid->nidn ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-md-10">
              <input name="nama" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $dosen_byid->dosen_name ?>">
            </div>
          </div>
           <div class="form-group row">
            <label for="exampleInputFile" class="col-sm-2 col-form-label">Email</label>
            <div class="col-md-10">
              <input name="email" type="email" class="form-control" id="exampleInputPassword1" value="<?php echo $dosen_byid->email ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputFile" class="col-sm-2 col-form-label">Password</label>
            <div class="col-md-10">
              <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="<?php echo $dosen_byid->password ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputFile" class="col-sm-2 col-form-label">Mata Kuliah</label>
            <div class="col-md-10">
              <input type="text" name="matkul" class="form-control" id="exampleInputPassword1" value="<?php echo $matkul->matkul_name ?>" placeholder="Isi Matkul" required="">
            </div>
          </div>
          <div class="form-group row">
            <label for="exampleInputFile" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-md-10">
              <select required="required" name="jurusan" id="jawaban" class="form-control select2" style="width:100%!important">
                  <option value="" disabled selected>Pilih Jurusan</option>
                  <?php foreach ($jurusan as $jrsn) {?>
                  <option <?php echo $jrsn->id_prody==$matkul->prody_id ? "selected='selected' ":" " ?> value="<?php echo $jrsn->id_prody ?>">
                    <?php echo $jrsn->prody_name ?></option>
                <?php } ?>
              </select>
            </div>          
          </div>
          <div class="form-group row">
            <label for="exampleInputFile" class="col-sm-2 col-form-label">Semester</label>
            <div class="col-md-10">
              <select required="required" name="semester" id="jawaban" class="form-control select2" style="width:100%!important">
                <option value="" disabled selected>Pilih Semester</option>
                <?php foreach ($semester as $smstr) { ?>
                 <option <?php echo $smstr->id_class==$matkul->class_id ? "selected='selected'" : "" ?> value="<?php echo $smstr->id_class ?>"><?php echo $smstr->class_name ?></option>
                 <?php echo $matkul->class_id ?>
              <?php } ?>
              </select>
            </div>          
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-2">
            <div class="custom-control custom-checkbox pl-4">
              <input class="custom-control-input" type="radio" id="customCheckbox1" value="1" name="status" checked />
              <label for="customCheckbox1" class="custom-control-label">
                   Active
              </label>
            </div>
          </div>
          <div class="col-sm-4">
                        <div class="custom-control custom-checkbox">
             
                  <input class="custom-control-input" type="radio" id="customCheckbox2" value="0" name="status"  /> 
                   <label for="customCheckbox2" class="custom-control-label">
                    Not Active
              </label>
            </div>
          </div>
          </div>
        <!-- /.box-body -->

         <div class="card-footer">
                      <a href="" class="btn bg-navy"><i class="fa fa-arrow-left"></i> Batal</a>
                      <button type="submit" id="submit" class="btn bg-purple float-right"><i class="fa fa-save"></i> Simpan</button>
                  </div>
                </div>
             
            <?php echo form_close() ?>
    </div>
  </div>
</div>