<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Form Assigner</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_assigner'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
				<div class="form-group">
				<label class="col-lg-2 control-label">Team</label>
					<div class="col-sm-6">
						<select name="team" id="team" class="form-control m-b">
						<option value="*">All Team</option>
						<?php foreach($team as $teams){
						?>
						<option value="<?php echo $teams['id_team'];?>"><?php echo $teams['nama']?></option>
						<?php }?>
                        </select>
					 </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Pilih Supervisor</label>
				  <div class="col-sm-10">
					<?php 
						foreach($user as $users){
							if($users['id_role'] == 3){
						?>
						<div class="checkbox">
						<label>
						<input type="checkbox" value="<?php echo $users['id_user'];?>" name="spv[]">
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
					<div class="col-sm-10">
						<select name="shift" class="form-control m-b">
						<option value="1">Shift 1</option>
						<option value="2">Shift 2</option>
						<option value="3">Shift 3</option>
                        </select>
					 </div>
					<div class="col-sm-10" id="col_spv">
						
					</div>
				</div>
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