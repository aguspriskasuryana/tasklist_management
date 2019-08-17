
<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Form Edit</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/telp_activity/update_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_telp_activity" name="id_telp_activity" value="<?php echo $query['id_telp_activity'] ;?>" type="hidden" >
			  <div class="form-group">
				  <label class="col-sm-2 control-label">Tanggal</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tanggal" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" value="<?php echo $query['tanggal'] ;?>" name="tanggal">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Nama Pemohon</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['nama_pemohon'] ;?>"  data-required="true" name="nama_pemohon">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">No Pesawat</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['no_pesawat'] ;?>"  data-required="true" name="no_pesawat">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Asal Penelpon</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['asal_penelpon'] ;?>"  data-required="true" name="asal_penelpon">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Nama dituju</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['nama_dituju'] ;?>"  data-required="true" name="nama_dituju">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Instansi</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['instansi'] ;?>"  data-required="true" name="instansi">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">No Telp Tujuan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['no_tlpn_tujuan'] ;?>"  data-required="true" name="no_tlpn_tujuan">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Keperluan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['keperluan'] ;?>"  data-required="true" name="keperluan">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Izin</label>
				  <div class="col-sm-2">
					<input class="form-control"  type="text"  value="<?php echo $query['izin'] ;?>" name="izin">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-2">
					<input class="form-control"  type="text"  value="<?php echo $query['status'] ;?>" name="status">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">jam</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['jam'] ;?>"  data-required="true" name="jam">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Keterangan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['keterangan'] ;?>"  data-required="true" name="keterangan">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">M_K</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  value="<?php echo $query['M_K'] ;?>"  data-required="true" name="M_K">
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