
<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Form Edit</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/form_sksm/update_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_form_sksm" name="id_form_sksm" value="<?php echo $query['id_form_sksm'] ;?>" type="hidden" >
			  

				<div class="form-group">
				<label class="col-lg-2 control-label">Type</label>
					<div class="col-sm-8">
						<select name="type" id="type" class="form-control m-b">
						<?php foreach($tipe_surat as $tipe_surats){
						if ($tipe_surats == $query['type']){
							?>
							<option value="<?php echo $tipe_surats;?>" selected><?php echo $tipe_surats?></option>
							<?php
						} else {
						?>
							<option value="<?php echo $tipe_surats;?>" ><?php echo $tipe_surats?></option>
						<?php 
							}
						}

						?>
                        </select>
					 </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Bendel</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['bendel'] ;?>" placeholder="Ex : 'SP'" data-required="true" name="bendel">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Pengirim_divisi</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['pengirim_divisi'] ;?>"  data-required="true" name="pengirim_divisi">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">pengirim_uker</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['pengirim_uker'] ;?>"  data-required="true" name="pengirim_uker">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">tujuan_divisi</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['tujuan_divisi'] ;?>"  name="tujuan_divisi">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">tanggal_dit</label>
				  <div class="col-sm-8">
					<input class="input-sm input-s form-control tanggal" type="text" data-date-format="yyyy-mm-dd"  value="<?php echo $query['tanggal_dit'] ;?>"  name="tanggal_dit">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Tanggal Surat</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tanggal" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" value="<?php echo $query['tanggal_surat'] ;?>" name="tanggal_surat">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">no_sk</label>
				  <div class="col-sm-2">
					<input class="form-control"  type="text"  value="<?php echo $query['no_sk'] ;?>" name="no_sk">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">no_surat</label>
				  <div class="col-sm-2">
					<input class="form-control"  type="text"  value="<?php echo $query['no_surat'] ;?>" name="no_surat">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">ket</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['ket'] ;?>"  name="ket">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">prihal</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['prihal'] ;?>"  data-required="true" name="prihal">
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
$('.tanggaldit').datepicker();
</script>
<!-- wysiwyg -->
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/demo.js" cache="false"></script>