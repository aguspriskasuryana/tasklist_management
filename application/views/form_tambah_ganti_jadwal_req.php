<?php
$id = $this->session->userdata('user_data');
//echo form_open_multipart(site_url()."/master/user/tambah_user/".$id,array("id"=>"form-materi"));

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Form Tambah Form Task Req </header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/ganti_jadwal_req/simpan_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_ganti_jadwal_req"  name="id_ganti_jadwal_req"  type="hidden" >
			  <input id="id_user"  name="id_user" value="<?php echo $id['id_user']  ?>"  type="hidden" >
			  <input id="date_req" name="date_req" value="<?php echo date('Y-m-d H:i:s');  ?>" type="hidden" >
				<div class="form-group">
				<label class="col-lg-2 control-label">Task List</label>
					<div class="col-sm-10">
						<select name="id_task" id="id_task" class="form-control m-b">
						<option value="select" >select</option>
						<?php foreach($task_list_team as $task_list_team){
						?>
						<option value="<?php echo $task_list_team['id_task_list'];?>" ><?php echo $task_list_team['aktifitas']?></option>
						<?php }?>
                        </select>
					 </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">User</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="nama_lengkap" value=" <?php echo $id['nama_lengkap']  ?>" >
				  </div>
				</div>

				<div class="form-group">
				<label class="col-lg-2 control-label">Jam Awal</label>
					<div class="col-sm-10">
						<select name="jam_awal" id="jam_awal" class="form-control m-b" >
						<option value="0" selected>-</option>
						</select>
					</div>
				</div>

				<div class="form-group">
				  <label class="col-lg-2 control-label">Jam Baru</label>
				  <div class="col-lg-10">
					<input type="time" class="form-control" data-required="true"  placeholder="ex: 07:00:00" name="jam_baru" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Tanggal Awal</label>
				  <div class="col-sm-10">
						<select name="tanggal_lama" id="tanggal_lama" class="form-control m-b" >
						<option value="0" selected>-</option>
						</select>
					</div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Tanggal Baru</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tbaru" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" name="tanggal_baru">
				  </div>
				</div>
				
				<span id="confirmMessage" class="confirmMessage"></span>
				<div class="form-group">
				  <div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Simpan</button>
					<button type="button" class="btn btn-white" onclick="window.history.back()">Batal</button>
				  </div>
				</div>
			  </form>
			</div>
		  </section>
		</div>
	</div>
</section>

<script>
$(document).ready(function () {
$(".tgl").click(function(e){
	$(this).remove();
});
});

$('.tawal').datepicker();

$('.tbaru').datepicker();


$('.datepickers').datepicker()
  .on('changeDate', function(ev) {
	
    //alert(new Date(ev.date));
	//console.log($('#tanggal').val());
	var a = '<input class="btn btn-sm btn-primary tgl" size="16" type="button" value="'+$('#tanggal').val()+'"><input class="tgl" size="16" type="text" name="tanggal[]" value="'+$('#tanggal').val()+'" style="display:none">';
	$('#col_tanggal').append(a);
	
});

$('#id_task').change(function(){
	var a = $(this).val();

	$.getJSON('<?php echo site_url('ganti_jadwal_req/get_data_jam');?>', {id_task: a}, function(data) {
	var opt = '';
		$.each(data, function(i,v) {
			if (v!=""){
			opt += '<option value="'+v+'">'+v+'</option>';
			}
		});

		$('#jam_awal').empty().append(opt);
	
	});

	$.getJSON('<?php echo site_url('ganti_jadwal_req/get_data_tanggal');?>', {id_task: a}, function(data) {
	var opt = '';
		$.each(data, function(i,v) {
			if (v!=""){
			opt += '<option value="'+v+'">'+v+'</option>';
			}
		});

		$('#tanggal_lama').empty().append(opt);
	
	});
	

	})

</script>
