
<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Form Tambah Harian OPERATOR</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/harian_operator/update_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_harian_operator" name="id_harian_operator" value="<?php echo $query['id_harian_operator'] ;?>" type="hidden" >
			  <div class="form-group">
				  <label class="col-sm-2 control-label">Date</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tanggal" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" value="<?php echo $query['tanggal'] ;?>" name="tanggal">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Waktu Lapor</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['waktu_lapor'] ;?>"  data-required="true" name="waktu_lapor">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Pilih Operator</label>
				  <div class="col-sm-10">
					<?php 
						foreach($user as $users){
							if($users['id_team'] == $id['id_team']){
								$checked = "";
								$id_pelapor = explode(",",$query['id_pelapor']);
								$id_pelapor = preg_replace('/\s+/', '', $id_pelapor);

								foreach($id_pelapor as $id_pelapors){
									if ($users['id_user']==$id_pelapors){
										$checked = "checked";
									}
								}
								

						?>
						<div class="checkbox">
						<label>
						<input type="checkbox" value="<?php echo $users['id_user'];?>" <?php echo $checked;?> name="operator[]">
						<?php echo $users['nama_lengkap'];
						?>
						</label>
						</div>
						<?php
							}
						}
						?>
				  </div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Shift</label>
					<div class="col-sm-8">
						<select name="shift" class="form-control m-b">
						<?php 
						$shift1checked = "";
						$shift2checked = "";
						$shift3checked = "";

						if ($query['shift'] == 1){
							$shift1checked = "selected";
						} else if ($query['shift'] == 2){
							$shift2checked = "selected";
						} else {
							$shift3checked = "selected";
						}

						?>

						<option value="1" <?php echo $shift1checked; ?> >Shift 1</option>
						<option value="2" <?php echo $shift2checked; ?> >Shift 2</option>
						<option value="3" <?php echo $shift3checked; ?> >Shift 3</option>
                        </select>
					 </div>
					<div class="col-sm-8" id="col_operator">
						
					</div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Waktu Kejadian</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['waktu_kejadian'] ;?>"  data-required="true" name="waktu_kejadian">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Kejadian</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("kejadian",$query['kejadian']);?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Tindak Lanjut</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['tindak_lanjut'] ;?>"  data-required="true" name="tindak_lanjut">
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
$('.tanggal').datepicker();
</script>
<!-- wysiwyg -->
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/demo.js" cache="false"></script>