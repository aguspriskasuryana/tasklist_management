<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Info Keluarga</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/keluarga/simpan_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input value="" id="id_keluarga" name="id_keluarga" type="hidden" >
				<div class="form-group">
				<label class="col-lg-2 control-label">Keluarga</label>
					<div class="col-sm-10">
						<select name="id_user" id="id_user" class="form-control m-b">
						<?php 
						foreach($list_user as $users){
						if ($users['id_user'] == $id['id_user']){

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
				<label class="col-lg-2 control-label">Hubungan</label>
					<div class="col-sm-10">
						<select name="hubungan" id="hubungan" class="form-control m-b">
						<?php foreach($hubungan as $hubungans){
						
							?>
							
							<option value="<?php echo $hubungans;?>" ><?php echo $hubungans?></option>
						<?php 
						}

						?>
                        </select>
					 </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Nama</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="nama" value="">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Alamat</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="alamat" value="">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">No Telp</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="no_tlp" value="">
				  </div>
				</div>

				<span id="confirmMessage" class="confirmMessage"></span>
				<div class="form-group">
				  <div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
					<button type="button" class="btn btn-white" onclick="window.history.back()">Batal</button>
				  </div>
				</div>
			  </form>
			</div>
		  </section>
		</div>
	</div>
</section>
