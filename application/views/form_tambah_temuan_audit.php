


<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Form Tambah Temuan Audit</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/temuan_audit/simpan_data'); ?>" method="post" enctype="multipart/form-data">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_temuan_audit" name="id_temuan_audit" type="hidden" >
			  
			  <div class="form-group">
				  <label class="col-sm-2 control-label">Tema Temuan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" name="tema_temuan">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Judul Temuan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" name="judul_temuan">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Deskripsi</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("deskripsi","");?>
				  </div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Kategori</label>
					<div class="col-sm-8">
						<select name="kategori_temuan" class="form-control m-b">
						<option value="Minor" >Minor</option>
						<option value="Moderate" >Moderate</option>
						<option value="Major" >Major</option>
                        </select>
					 </div>
					
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Rekomendasi</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("rekomendasi","");?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Batas Waktu RPM</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("batas_waktu_rpm","");?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">realisasi</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("realisasi","");?>
				  </div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">status</label>
					<div class="col-sm-8">
						<select name="status" class="form-control m-b">
						<option value="memadai" >Memadai</option>
						<option value="dalam_pemantauan" >Dalam Pemantauan</option>
						<option value="tidak_memadai" >Tidak Memadai</option>
                        </select>
					 </div>
				</div>

				<div class="form-group">
				<label class="col-lg-2 control-label">file</label>
					<div class="col-sm-8">
						<input type="file" class="btn btn-default"  accept="*" name="file">
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