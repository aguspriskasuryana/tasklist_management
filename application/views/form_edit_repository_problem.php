<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Info Repository Problem</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/repository_problem/update_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input value="<?php echo $query['id_repository_problem'] ;?>" id="id_repository_problem" name="id_repository_problem" type="hidden" >
			  	
				
				<div class="form-group">
				  <label class="col-sm-2 control-label">Permasalahan</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("permasalahan",$query['permasalahan'] );?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Langkah</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("langkah",$query['langkah'] );?>
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