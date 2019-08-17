
<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Form Tambah Mutasi harian hk</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/mutasi_harian_hk/simpan_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_mutasi_harian_hk" name="id_mutasi_harian_hk" type="hidden" >
			  	<div class="form-group">
				  <label class="col-sm-2 control-label">Date</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tanggal" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" value="<?php
					$datecek = date('G');
					if ($datecek < 8){
						echo date("Y-m-d", strtotime("yesterday"));
					} else {
						echo date("Y-m-d");
					}
					?>" name="tanggal">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Pilih Personal</label>
				  <div class="col-sm-10">
					<?php 
						foreach($user as $users){
							if($users['id_team'] == 48){
								$checked = "";
								if ($users['id_user']==$id['id_user']){
									$checked = "checked";
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

								

						?>
						<div class="checkbox">
						<label>
						<input type="checkbox" value="<?php echo $sub_teams['id_sub_team'];?>" name="id_sub_team[]">
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
						$shiftcek = date('2018-01-01 G:i'); 
						$shift1checked = "";
						$shift2checked = "";
						$shift3checked = "";

						$jam0730 = date('2018-01-01 7:30');
						$jam0959 = date('2018-01-01 9:59');
						$jam1000 = date('2018-01-01 10:00');
						$jam1600 = date('2018-01-01 16:00');
						$jam2300 = date('2018-01-01 23:00');

						if (($shiftcek > $jam0730) && ($shiftcek <= $jam0959)){
							$shift1checked = "selected";
						} else if (($shiftcek >= $jam1000) && ($shiftcek < $jam1600)){
							$shift1checked = "selected";
						} else if (($shiftcek >= $jam1600) && ($shiftcek < $jam2300)) {
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
					<input class="form-control"  type="text"  value=""  data-required="true" name="kegiatan">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Lokasi</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value=""  data-required="true" name="lokasi">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Waktu Awal</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo date('Y-m-d G:i:s'); ?>"  data-required="true" name="jam_awal">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Waktu Akhir</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo date('Y-m-d G:i:s'); ?>"  data-required="true" name="jam_akhir">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Keterangan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" name="keterangan">
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