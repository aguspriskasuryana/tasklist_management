<?php

//echo form_open_multipart(site_url()."/master/user/tambah_user/".$id,array("id"=>"form-materi"));

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Info Phonebook</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/phonebook/simpan_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_phonebook" name="id_phonebook" type="hidden" >
				<div class="form-group">
				  <label class="col-lg-2 control-label">Phonebook</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="nama" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Alamat</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="alamat" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">No Telp</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="no_tlp" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Instansi</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="instansi" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">ket</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="ket" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">email</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="email" >
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
