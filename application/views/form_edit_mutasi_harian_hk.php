
<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Form Tambah Mutasi harian hk</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/mutasi_harian_hk/update_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_mutasi_harian_hk" name="id_mutasi_harian_hk" value="<?php echo $query['id_mutasi_harian_hk'] ;?>" type="hidden" >
			  	<div class="form-group">
				  <label class="col-sm-2 control-label">Date</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tanggal" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" value="<?php echo $query['tanggal'] ;?>"  name="tanggal">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Pilih Personal</label>
				  <div class="col-sm-10">
					<?php 
						foreach($user as $users){
							if($users['id_team'] == 48){
								$checked = "";
								$id_pelapor = explode(",",$query['indeks_tamu']);
								$id_pelapor = preg_replace('/\s+/', '', $id_pelapor);

								foreach($id_pelapor as $id_pelapors){
									if ($users['id_user']==$id_pelapors){
										$checked = "checked";
									}
								}

						?>
						<div class="checkbox">
						<label>
						<input type="checkbox" value="<?php echo $users['id_user'];?>" <?php echo $checked;?> name="users[]">
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
				  <label class="col-sm-2 control-label">Sub team</label>
				  <div class="col-sm-10">
					<?php 
						foreach($sub_team as $sub_teams){
							if($sub_teams['id_team'] == 48){

								$checkedx = "";
								$id_sub = explode(",",$query['id_sub_team']);
								$id_sub = preg_replace('/\s+/', '', $id_sub);

								foreach($id_sub as $id_subs){
									if ($sub_teams['id_sub_team']==$id_subs){
										$checkedx = "checked";
									}
								}

						?>
						<div class="checkbox">
						<label>
						<input type="checkbox" value="<?php echo $sub_teams['id_sub_team'];?>" <?php echo $checkedx;?> name="id_sub_team[]">
						<?php echo $sub_teams['sub_team_name'];
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
					<div class="col-sm-8" id="col_spv">
						
					</div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Kegiatan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['kegiatan'] ;?>"  data-required="true" name="kegiatan">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Lokasi</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['lokasi'] ;?>"  data-required="true" name="lokasi">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Waktu Awal</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" value="<?php echo $query['jam_awal'] ;?>" data-required="true" name="jam_awal">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Waktu Akhir</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['jam_akhir'] ;?>"  data-required="true" name="jam_akhir">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Keterangan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" value="<?php echo $query['keterangan'] ;?>" data-required="true" name="keterangan">
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