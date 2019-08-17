<?php

//echo form_open_multipart(site_url()."/master/user/tambah_user/".$id,array("id"=>"form-materi"));

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Info Team</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/team/update_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input value="<?php echo $query['id_team'] ;?>" id="id_team" name="id_team" type="hidden" >
				<div class="form-group">
				  <label class="col-lg-2 control-label">Team</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="nama" value="<?php echo $query['nama'] ;?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Team</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="keterangan" value="<?php echo $query['keterangan'] ;?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Jabatan</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="jabatan" value="<?php echo $query['jabatan'] ;?>">
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