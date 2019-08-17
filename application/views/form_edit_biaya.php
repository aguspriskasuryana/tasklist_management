<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Info biaya</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/biaya/update_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_biaya" name="id_biaya" value="<?php echo $query['id_biaya'] ?>" type="hidden" >
			  <input id="user_akses" name="user_akses" value="<?php echo $id['id_user'] ?>" type="hidden" >
				<div class="form-group">
				<label class="col-lg-2 control-label">Rek</label>
					<div class="col-sm-10">
						<select name="no_reks" id="no_reks" class="form-control m-b">
						

                        <?php foreach($par_rek as $par_reks){
						if ($par_reks['no_rek'] == $query['no_reks']){
							?>
							<option value="<?php echo $par_reks['no_rek'];?>" selected><?php echo $par_reks['no_rek']?> - <?php echo $par_reks['name']?></option>
							<?php
						} else {
						?>
							<option value="<?php echo $par_reks['no_rek'];?>" ><?php echo $par_reks['no_rek']?> - <?php echo $par_reks['name']?></option>
						<?php 
							}
						}

						?>
                        </select>

					 </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Keterangan</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="keterangans" value="<?php echo $query['keterangans'] ?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Jumlah</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="jumlah" value="<?php echo $query['jumlah'] ?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Tanggal</label>
				  <div class="col-lg-10">
					<input class="input-sm input-s form-control tanggal" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true"  value="<?php echo $query['tanggal'] ?>" name="tanggal">
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
<script>
$('.tanggal').datepicker();
</script>