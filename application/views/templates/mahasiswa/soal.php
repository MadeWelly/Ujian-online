<style type="text/css">
	.funkyradio input[type="radio"]:hover:not(:checked) ~ label, .funkyradio input[type="checkcard"]:hover:not(:checked) ~ label {
    color: #888;
}
.funkyradio input[type="radio"]:empty ~ label, .funkyradio input[type="checkcard"]:empty ~ label {
    line-height: 2em;
    cursor: pointer;
}
.funkyradio label {
    font-weight: normal;
}
p {
    margin: 0 0 10px;
}
* {
    -webkit-card-sizing: border-card;
    -moz-card-sizing: border-card;
    card-sizing: border-card;
}
</style>
<div class="row">
<div class="col-sm-8 offset-2 mt-3">                                                                                                             
	    <div class="card card-primary">
			<div class="card-header with-border">
	             <h3 class="card-title"><span class="badge bg-blue">Soal #<span id="soalke"></span> </span></h3>
	            <div class="card-tools pull-right" id="waktu">Sisa waktu anda
	                <span class="badge bg-red" id="response">Sisa Waktu <span class="sisawaktu" data-time="2019-09-27 10:34:04"></span></span>
	                <button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	            </div>
	        </div>
            <div class="card-body">
                <input type="hidden" name="id_soal_1" value="2">
                <input type="hidden" name="rg_1" id="rg_1" value="N">
                <div class="step" id="widget_1">
                	<div class="text-center">
                		<div class="w-25"></div>
                	</div>

                	<?php 
                	$jumlah = $row;
                	$no = 1;                		
                	?>

                	<?php foreach ($get_soal as $soal) { ?>
                	<?php echo form_open('mahasiswa/koreksi') ?>
						
						<input type="hidden" name="id_ujian" value="<?php echo $id_ujian->id_ujian; ?>">
                		<input type="hidden" name="id[]" value="<?php echo $soal->id_soal ?>">
                		<input type="hidden" name="jumlah" value="<?php echo $jumlah ?>">
                		<input type="hidden" name="id_dosen" value="<?php echo $soal->dosen_id ?>">
                		<input type="hidden" name="id_matkul" value="<?php echo $soal->matkul_id ?>">
                		<input type="hidden" name="smstr" value="<?php echo $smstr ?>">

                	<div class="funkyradio" style="margin-left: 17px ">
						<div class="funkyradio-success"><span style="margin-right: 10px; margin-left: -20px "><?php echo$no++ . '.'; ?></span><br>
							<label for="">
								<?php echo  $soal->soal ?>
								<div <?php echo $soal->file_soal== null ? "style='display:none'" : "" ?>>
									<img src="<?php echo base_url('upload/'.$soal->file_soal)?>" width="200" height="200">
								</div>
								<div class="w-25"></div>
							</label>
						</div>

                		<div class="funkyradio-success"><span style="margin-right: 10px; ">A.</span>
							<input type="radio" id="opsi_a_2" name="opsi_1[<?php echo $soal->id_soal ?>]" value="A" >
							<label for="opsi_a_2">
								<?php echo  $soal->opsi_a ?>
								<div <?php echo $soal->file_a== null ? "style='display:none'" : "" ?>>
							<img src="<?php echo base_url('upload/'.$soal->file_a)?>" width="200" height="200"><br>
						</div>
								<div class="w-25"></div>
							</label>
						</div>
						<div class="funkyradio-success"><span style="margin-right: 10px; ">B.</span>
							<input type="radio" id="opsi_b_2" name="opsi_1[<?php echo $soal->id_soal ?>]" value="B" > 
							<label for="opsi_b_2">
							<?php echo $soal->opsi_b ?>
							<div <?php echo $soal->file_b== null ? "style='display:none'" : "" ?>>
							<img src="<?php echo base_url('upload/'.$soal->file_b)?>" width="200" height="200"><br>
						</div>
							<div class="w-25"></div>
						</label>
						</div>
						<div class="funkyradio-success"><span style="margin-right: 10px; ">C.</span>
							<input type="checkbox" id="opsi_c_2" name="opsi_1[<?php echo $soal->id_soal ?>]" value="C" > 
							<label for="opsi_c_2">
								<?php echo $soal->opsi_c ?>
								<div <?php echo $soal->file_c== null ? "style='display:none'" : "" ?>>
							<img src="<?php echo base_url('upload/'.$soal->file_c)?>" width="200" height="200"><br>
						</div>
								<div class="w-25"></div>
							</label>
						</div>
						<div class="funkyradio-success"><span style="margin-right: 10px; ">D.</span>
							<input type="radio" id="opsi_d_2" name="opsi_1[<?php echo $soal->id_soal ?>]" value="D" > 
							<label for="opsi_d_2">
							<?php echo $soal->opsi_d ?>
							<div <?php echo $soal->file_d== null ? "style='display:none'" : "" ?>>
							<img src="<?php echo base_url('upload/'.$soal->file_d)?>" width="200" height="200"><br>
						</div>
							<div class="w-25"></div>
							</label>
						</div>
						<div class="funkyradio-success"><span style="margin-right: 10px; ">E.</span>
							<input type="radio" id="opsi_e_2" name="opsi_1[<?php echo $soal->id_soal ?>]" value="E" > 
							<label for="opsi_e_2">
							<?php echo $soal->opsi_d ?>
							<div <?php echo $soal->file_e== null ? "style='display:none'" : "" ?>>
							<img src="<?php echo base_url('upload/'.$soal->file_e)?>" width="200" height="200"><br>
						</div>
							<div class="w-25"></div>
							</label>
						</div>
					</div>
					<?php }?>
								
			       <div class="card-footer text-center">
			            <input type="submit" class=" action submit btn btn-danger" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda ?')" value="Selesai">
			        </div>
			        
			        <!-- Jika waktu habis -->
					<div class="modal fade" id="myModal">
					  <div class="modal-dialog modal-sm">
					    <div class="modal-content">
					        <div class="modal-body" style="text-align: center;">
					          <h3><b>Ujian Online</b></h3>
					          <h2><i class="fa fa-bell"></i></h2>
					          <h4>Waktu Mengerjakan Soal Telah Habis!</h4>
					        </div>
					          
					          <!-- Modal footer -->
					        <div class="modal-footer">
					          <input type="submit" class=" action submit btn btn-danger" value="Selesai">
					        </div>
					      </form>
					    </div>
					  </div>
					</div>

			    </form>
				</div>
        	</div>
	     </div>           
	</form> 
</div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


<script>
	document.getElementById('response').innerHTML =
  <?php echo $id_ujian->waktu ?> + ":" + 00;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('response').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  // if(m<0){alert('timer completed')}
  if(m<0){$('#myModal').modal('show')}
	
  if(onclick){window.location = 'http://google.com'}
  
  document.getElementById('response').innerHTML =
    m + ":" + s;
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}
</script>