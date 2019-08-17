
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-10">
		<section class="panel">
			<header class="panel-heading font-bold">Form Tambah Task</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_user" name="id_user" type="hidden" >
				<div class="form-group">
				  <label class="col-lg-2 control-label">Nama Task</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="nama_task">
				  </div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Tanggal</label>
					<div class="col-sm-8">
						<input class="form-control"  size="16" type="text" name="tanggalx" id="tanggalx" data-date-format="yyyy-mm-dd" title="#catatan : '*,' = Setiap Hari,  '1,' = Senin Jumat,  date Ex: 2018-01-01, 2018-02-01#" style="width:600px; height:120px;">
						<div class="checkbox">

							<button class="btn btn-white monday" data-toggle="button">
							  <i class="fa fa-check text"></i>
							  <i class="fa fa-check text-active text-danger"></i>Senin
							</button>

							<button class="btn btn-white tuesday" data-toggle="button">
							  <i class="fa fa-check text"></i>
							  <i class="fa fa-check text-active text-danger"></i>Selasa
							</button>

							<button class="btn btn-white wednesday" data-toggle="button">
							  <i class="fa fa-check text"></i>
							  <i class="fa fa-check text-active text-danger"></i>Rabu
							</button>

							<button class="btn btn-white thursday" data-toggle="button">
							  <i class="fa fa-check text"></i>
							  <i class="fa fa-check text-active text-danger"></i>Kamis
							</button>

							<button class="btn btn-white friday" data-toggle="button">
							  <i class="fa fa-check text"></i>
							  <i class="fa fa-check text-active text-danger"></i>Jumat
							</button>

							<button class="btn btn-white saturday" data-toggle="button">
							  <i class="fa fa-check text"></i>
							  <i class="fa fa-check text-active text-danger"></i>Sabtu
							</button>

							<button class="btn btn-white sunday" data-toggle="button">
							  <i class="fa fa-check text"></i>
							  <i class="fa fa-check text-active text-danger"></i>Minggu
							</button>
							                        
                        </div>
					</div>
					<div class="col-sm-2">

						<input class="btn btn-sm btn-success datepickers" size="16" type="button" value="Pilih Tanggal" id="tanggal" data-date-format="yyyy-mm-dd">
						<br />
						
					</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Jam</label>
					<div class="col-sm-10" id="col_jam">
						
					</div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label"></label>
				<div class="col-sm-10">
						<span class="combodate"><select class="hour form-control" style="width: auto;">
							<option value=""></option>
							<option value="00">00</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option></select>&nbsp;:&nbsp;
						<select class="minute form-control" style="width: auto;">
							<option value=""></option>
							<option value="00">00</option>
							<option value="05">05</option>
							<option value="10">10</option>
							<option value="15">15</option>
							<option value="20">20</option>
							<option value="25">25</option>
							<option value="30">30</option>
							<option value="35">35</option>
							<option value="40">40</option>
							<option value="45">45</option>
							<option value="50">50</option>
							<option value="55">55</option></select>&nbsp;:&nbsp;
						<select class="second form-control" style="width: auto;">
							<option value=""></option>
							<option value="00">00</option>
							<option value="05">05</option>
							<option value="10">10</option>
							<option value="15">15</option>
							<option value="20">20</option>
							<option value="25">25</option>
							<option value="30">30</option>
							<option value="35">35</option>
							<option value="40">40</option>
							<option value="45">45</option>
							<option value="50">50</option>
							<option value="55">55</option></select>
							<input class="btn btn-sm btn-success" type="button" id="btn_jam" value="Submit">
							</span>
						</div>
					</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">File BPO</label>
				  <div class="col-lg-10">
					<input type="file" class="btn btn-default"  class="form-control" value="http://126.2.0.252/dashboard/bpo/" accept=".pdf" name="link_bpo">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Expired Date</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control expired" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" value="2025-12-31" name="expired_date">
				  </div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Team</label>
					<div class="col-sm-6">
						<select name="team" id="team" class="form-control m-b">
						<?php foreach($team as $teams){
						?>
						<option value="<?php echo $teams['id_team'];?>"><?php echo $teams['nama']?></option>
						<?php }?>
                        </select>
					 </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Duration</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" value="" name="duration">
				  </div>
				</div>
				<div class="form-group">
                     <label class="col-sm-2 control-label">With Capture</label>
                     <div class="col-sm-10">
                       <label class="switch">
                         <input type="checkbox" name="with_img_valid" value="1" id="with_img_valid">
                         <span></span>
                       </label>
                     </div>
                </div>

				<div class="form-group">
				<label class="col-lg-2 control-label">Form</label>
					<div class="col-sm-6">
						<?php foreach($form as $x => $x_value) {
						?>
						<input type="checkbox" class="form-check-input" id="<?php echo $x;?>" name="<?php echo $x;?>" value="<?php echo $x;?>"> <?php echo $x_value?> <br>
						<?php }?>
					 </div>
				</div>
				<span id="confirmMessage" class="confirmMessage"></span>
				<div class="form-group">
				  <div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
					<button type="button" class="btn btn-white" onclick="window.history.back()">Batal</button>
				  </div>
				</div>
</section>
<script>
$(document).ready(function () {
$(".tgl").click(function(e){
	$(this).remove();
});
});

$('.expired').datepicker();

$('.datepickers').datepicker()
  .on('changeDate', function(ev) {
	
    //alert(new Date(ev.date));
	//console.log($('#tanggal').val());
	//var a = '<input class="btn btn-sm btn-primary tgl" size="16" type="button" value="'+$('#tanggal').val()+'"><input class="tgl" size="16" type="text" name="tanggal[]" value="'+$('#tanggal').val()+'" style="display:none">';
	//$('#col_tanggal').append(a);

	var x = document.getElementById("tanggalx").value; 
	//var a = '<input class="btn btn-sm btn-primary tgl" size="16" type="button" value="'+$('#tanggal').val()+'"><input class="tgl" size="16" type="text" name="tanggal[]" value="'+$('#tanggal').val()+'" style="display:none">';
	document.getElementById("tanggalx").value = x+$('#tanggal').val()+', '
	
});

$('#btn_jam').click(function(){
	var c = $('.hour').val()+':'+$('.minute').val()+':'+$('.second').val();
	if($('.hour').val() != '' && $('.minute').val() != '' && $('.second').val() != ''){
	var b = '<input class="btn btn-sm btn-primary jam" size="16" type="button" value="'+c+'"><input class="jam" size="16" type="text" name="jam[]" value="'+c+'" style="display:none">';
	$('#col_jam').append(b);
	}
});

$('.monday').click(function(e) {
	if($(this).hasClass('active') == false){
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Monday, ', '');
		document.getElementById("tanggalx").value = mystring+'Monday, '
	} else {
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Monday, ', '');
		document.getElementById("tanggalx").value = mystring;
	}
});

$('.tuesday').click(function(e) {
	if($(this).hasClass('active') == false){
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Tuesday, ', '');
		document.getElementById("tanggalx").value = mystring+'Tuesday, '
	} else {
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Tuesday, ', '');
		document.getElementById("tanggalx").value = mystring;
	}
});

$('.wednesday').click(function(e) {
	if($(this).hasClass('active') == false){
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Wednesday, ', '');
		document.getElementById("tanggalx").value = mystring+'Wednesday, '
	} else {
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Wednesday, ', '');
		document.getElementById("tanggalx").value = mystring;
	}
});

$('.thursday').click(function(e) {
	if($(this).hasClass('active') == false){
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Thursday, ', '');
		document.getElementById("tanggalx").value = mystring+'Thursday, '
	} else {
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Thursday, ', '');
		document.getElementById("tanggalx").value = mystring;
	}
});

$('.friday').click(function(e) {
	if($(this).hasClass('active') == false){
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Friday, ', '');
		document.getElementById("tanggalx").value = mystring+'Friday, '
	} else {
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Friday, ', '');
		document.getElementById("tanggalx").value = mystring;
	}
});

$('.saturday').click(function(e) {
	if($(this).hasClass('active') == false){
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Saturday, ', '');
		document.getElementById("tanggalx").value = mystring+'Saturday, '
	} else {
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Saturday, ', '');
		document.getElementById("tanggalx").value = mystring;
	}
});


$('.sunday').click(function(e) {
	if($(this).hasClass('active') == false){
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Sunday, ', '');
		document.getElementById("tanggalx").value = mystring+'Sunday, '
	} else {
		var mystring = document.getElementById("tanggalx").value; 
		mystring = mystring.replace('Sunday, ', '');
		document.getElementById("tanggalx").value = mystring;
	}
});


</script>