<style type="text/css">
	.funkyradio input[type="radio"]:hover:not(:checked) ~ label, .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
color: #888;
}
.funkyradio input[type="radio"]:empty ~ label, .funkyradio input[type="checkbox"]:empty ~ label {
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
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="card mt-2">
			<div class="card-header">
				<h3 class="card-title">Soal Pilihan Ganda<span id="soalke"></span></h3>
				<div class="card-tools" id="waktu">
					<span class="badge bg-red" id="response">Sisa Waktu <span class="sisawaktu" data-time="2019-09-27 10:34:04"></span></span>
					<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
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
					<?php if($soal == false){
					// print_r($soal);die;
					echo $this->session->flashdata('nul');
					}else{
					$no = 1;
					foreach ($get_soal as $soal) { ?>
					<?php echo form_open('mahasiswa/koreksi') ?>
					<!--  -->
					
		<div class="funkyradio" style="margin-left: 17px ">
					<div class="funkyradio-success"><span style="margin-right: 10px; margin-left: -20px "><?php echo$no++ . '.'; ?></span><br>
						<label for="opsi_a_2">
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
						<?php echo $soal->opsi_a ?>
						<div <?php echo $soal->file_a== null ? "style='display:none'" : "" ?>>
							<img src="<?php echo base_url('upload/'.$soal->file_a)?>" width="200" height="200"><br>
						</div>
						<div class="w-25"></div>
					</label>
				</div>


				<div class="funkyradio-success"><span style="margin-right: 10px; ">B.</span>
					<input type="radio" id="opsi_b_2" name="opsi_1[<?php echo $soal->id_soal ?>]" value="B" >
					<label for="opsi_b_2">
						<div <?php echo $soal->file_b== null ? "style='display:none'" : "" ?>>
						<img src="<?php echo base_url('upload/'.$soal->file_b)?>" width="200" height="200"><br>
					</div>
						<?php echo $soal->opsi_b ?>
						<div class="w-25"></div>
					</label>
				</div>

			<div class="funkyradio-success"><span style="margin-right: 10px; ">C.</span>
				<input type="radio" id="opsi_c_2" name="opsi_1[<?php echo $soal->id_soal ?>]" value="C" >
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
<?php }}?>
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
			<a href="<?php echo site_url('dosen/') ?>"></a>
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
<div class="card" style="margin-top: -10px">
<div class="card-header">
<h3 class="card-title">SOAL ESSAY<span id="soalke"></span></h3>
<div class="card-tools" id="waktu">
<span class="badge bg-red" id="response">Sisa Waktu <span class="sisawaktu" data-time="2019-09-27 10:34:04"></span></span>
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
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
<?php if($soal_e == false){
// print_r($soal);die;
echo $this->session->flashdata('nul');
}else{
$no = 1; foreach ($soal_e as $s) { ?>
<?php echo form_open('mahasiswa/koreksi') ?>
<!--  -->
<div class="funkyradio" style="margin-left: 17px ">
<div class="funkyradio-success">
	<span style="margin-right: 10px; margin-left: -20px "><?php echo$no++ . '.'; ?></span><br>	
	<label for="opsi_a_2">
<?php echo  $s->soal_essay ?>
<div <?php echo $s->file_essay== null ? "style='display:none'" : "" ?>>
						<img src="<?php echo base_url('upload/'.$s->file_essay)?>" width="200" height="200">
					</div>
<div class="w-25"></div>
</label>
</div>
</div>
<?php }}?>
<div class="box-footer text-center">
<?php
		$url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
?>
<a class="btn btn-danger" href="<?=$url?>">Go Back</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
	document.getElementById('response').innerHTML =
<?php echo $get_soal->waktu ?> + ":" + 00;
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