


<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Form Tambah Risalah</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/risalah/simpan_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_risalah" name="id_risalah" type="hidden" >
			  <div class="form-group">
				  <label class="col-sm-2 control-label">Date</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tanggal" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true"  name="tanggal">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Judul</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  type="text"  data-required="true" name="judul">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Data</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("data","");?>
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