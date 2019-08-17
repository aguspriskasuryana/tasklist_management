<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Info Gangguan </header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/gangguan/update_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input value="<?php echo $query['id_gangguan'] ;?>" id="id_gangguan" name="id_gangguan" type="hidden" >
			  	<div class="form-group">
				  <label class="col-sm-2 control-label">Tanggal Laporan</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tanggal_laporan" size="16" type="text" data-date-format="yyyy-mm-dd hh:mm:ss" data-required="true" value="<?php echo $query['tanggal_laporan'] ;?>" name="tanggal_laporan">
				  </div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Pelapor</label>
					<div class="col-sm-10">
						<select name="id_pelapor" id="id_pelapor" class="form-control m-b">
						<?php 
						foreach($list_user as $users){
						if ($users['id_user'] == $query['id_pelapor']){

							?>
							<option value="<?php echo $users['id_user'];?>" selected><?php echo $users['nama_lengkap']?></option>
						<?php } else {	?>
							<option value="<?php echo $users['id_user'];?>" ><?php echo $users['nama_lengkap']?></option>
						<?php 
							}
						}
						?>
                        </select>
					 </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Lokasi</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  data-required="true" value="<?php echo $query['lokasi'] ;?>" name="lokasi">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Kejadian</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("kejadian",$query['kejadian'] );?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Tanggal Lanjutan</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tanggal_lanjutan" size="16" type="text" data-date-format="yyyy-mm-dd hh:mm:ss" data-required="true" value="<?php echo $query['tanggal_lanjutan'] ;?>" name="tanggal_lanjutan">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">lanjutan</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("lanjutan",$query['lanjutan'] );?>
				  </div>
				</div>

				<div class="form-group">
				<label class="col-lg-2 control-label">Status</label>
					<div class="col-sm-10">
						<select name="status" id="status" class="form-control m-b">
						<?php foreach($status as $statuss){
						if ($statuss == $query['status']){
							?>
							<option value="<?php echo $statuss;?>" selected><?php echo $statuss?></option>
							<?php
						} else {
						?>
							<option value="<?php echo $statuss;?>" ><?php echo $statuss?></option>
						<?php 
							}
						}

						?>
                        </select>
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
$('.tanggal_laporan').datepicker();
$('.tanggal_lanjutan').datepicker();
</script>