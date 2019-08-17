<?php

//echo form_open_multipart(site_url()."/master/user/tambah_user/".$id,array("id"=>"form-materi"));

?>
<section class="scrollable wrapper">
	



	<div class="column">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Info User </header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/user/update_data_detail'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input value="<?php echo $query['id_user'] ;?>" id="id_user" name="id_user" type="hidden" >
			  <input value="<?php echo $query['id_role'] ;?>" id="id_role" name="id_role" type="hidden" >
				
				<div class="form-group">
				  <label class="col-lg-2 control-label">User</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="nama_user" value="<?php echo $query['username'] ;?>" disabled>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Nama</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="nama_lengkap" value="<?php echo $query['nama_lengkap'] ;?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Kartu Id (SIM/KTP/KK)</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="id_kartu" value="<?php echo $query['id_kartu'] ;?>">
				  </div>
				</div>
				
				<!-- <div class="form-group">
				<label class="col-lg-2 control-label">Role</label>
					<div class="col-sm-10">
						<select name="posisi" id="posisi" class="form-control m-b">
						<?php foreach($role as $roles){
						if ($roles['id_role'] == $query['id_role']){
							?>
							<option value="<?php echo $roles['id_role']?>" selected><?php echo $roles['nama_role']?></option>
							<?php
						} else {
						?>
							<option value="<?php echo $roles['id_role']?>" ><?php echo $roles['nama_role']?></option>
						<?php 
							}
						}

						?>
                        </select>
					 </div>
				</div> -->

				<div class="form-group">
				<label class="col-lg-2 control-label">Company</label>
					<div class="col-sm-10">
						<select name="company" id="company" class="form-control m-b">
						<option value="0" >-</option>
						<?php foreach($company as $companys){
						if ($companys['id_company'] == $query['id_company']){
							?>
							<option value="<?php echo $companys['id_company'];?>" selected><?php echo $companys['nama_company']?></option>
							<?php
						} else {
						?>
							<option value="<?php echo $companys['id_company'];?>" ><?php echo $companys['nama_company']?></option>
						<?php 
							}
						}

						?>
                        </select>
					 </div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Team</label>
					<div class="col-sm-10">
						<select name="team" id="team" class="form-control m-b">
						<?php foreach($team as $teams){
						if ($teams['id_team'] == $query['id_team']){
							?>
							<option value="<?php echo $teams['id_team'];?>" selected><?php echo $teams['nama']?></option>
							<?php
						} else {
						?>
							<option value="<?php echo $teams['id_team'];?>" ><?php echo $teams['nama']?></option>
						<?php 
							}
						}

						?>
                        </select>
					 </div>
				</div>

				<div class="form-group">
				  <label class="col-lg-2 control-label">Email</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="email" value="<?php echo $query['email'] ;?>">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-lg-2 control-label">Alamat</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="alamat" value="<?php echo $query['alamat'] ;?>">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-lg-2 control-label">No Telp</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="no_phone" value="<?php echo $query['no_phone'] ;?>">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-lg-2 control-label">Telegram Id</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="telegram_id" value="<?php echo $query['telegram_id'] ;?>">
				  </div>
				</div>
				
				<span id="confirmMessage" class="confirmMessage"></span>
				<div class="form-group">
				  <div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
					<button type="button" class="btn btn-white" onclick="window.history.back()">Batal</button>
					<button type="button" class="btn btn-white" onclick="window.location.href='<?php echo site_url('user/edit_user_detail_password/'.$query['id_user']); ?>'"">Ubah Password</button>
				  </div>
				</div>
			  </form>
			</div>
		  </section>
		</div>
	</div>

	<div class="column">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Images</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/user/aksi_upload'); ?>" method="post" enctype="multipart/form-data">
			    <?php echo $this->csrf->get_html(); ?>
			  	<input value="<?php echo $query['id_user'] ;?>" id="id_user" name="id_user" type="hidden" >
		        <div class="clearfix m-b">
                       <a href="#" class="thumb pull-left m-r">
                          <img src="<?php 
                          	$file = $query['img_file'];
                          	$img = "images/avatar_default.jpg"; 
							if ($file){
								$img = "images/".$query['img_file']; 
							}
							echo base_url($img);

							?>" class="img-circle">
                        </a>
                      <div class="clear">
                        <div class="h3 m-t-xs m-b-xs"><?php echo $query['nama_lengkap'] ;?></div>
                        <small class="text-muted"><i class="fa fa-map-marker"></i><?php echo $query['email'] ;?></small>
                      </div>                
                    </div>

				<div class="form-group">
				  <div class="col-lg-10">
					<input type="file" class="btn btn-default"  accept=".jpg" name="berkas"><button type="submit" class="btn btn-sm btn-primary"  id="btn_simpan">Simpan</button>
				  </div>
				</div>
				<div class="form-group">
				  	<div class="col-lg-10">
					maksimal ukuran foto 2Mb
					</div>
				</div>
								
				<span id="confirmMessage" class="confirmMessage"></span>
				
			  </form>
			</div>
		  </section>
		</div>
	</div>


</section>
