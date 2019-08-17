
<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Form Tambah</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/form_storage/simpan_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_form_storage" name="id_form_storage" type="hidden" >
			  <input  type="hidden"  name="jumlah_awal" >
			  
				<div class="form-group">
				<label class="col-lg-2 control-label">Status</label>
					<div class="col-sm-8">
                      <select name="id_status" id="id_status" class="form-control m-b">
						
						<?php foreach($tipe as $tipes){
							?>
							<option value="<?php echo $tipes['id_room'];?>" ><?php echo $tipes['nama_room']?></option>
						<?php 
							
						}

						?>
                        </select>
					 </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">No Rak</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  data-required="true" name="no_rak" placeholder="Ex : 'S01'">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">No Dus</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" name="no_dus" placeholder="Ex : '1'">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Nama barang</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" name="nama_barang" placeholder="Ex : 'Kabel FO'">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">SN Barang</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" name="sn_barang" placeholder="Ex : '12345'">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Jumlah Barang</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" name="jumlah_akhir" placeholder="Ex : '12'">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">ket_dus</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  data-required="true" name="ket_dus" placeholder="Ex : 'keterangan'">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">merk</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  data-required="true" name="merk" placeholder="Ex : 'Panduit'">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">keterangan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  data-required="true" name="keterangan" placeholder="Ex : 'keterangan'">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Tgl Masuk</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tanggal_masuk" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" name="tanggal_masuk"  value="<?php echo date('Y-m-d'); ?>" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">owner</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  data-required="true" name="owner" placeholder="Ex : 'Mr.x'">
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
$('.tanggal_masuk').datepicker();
$('.tanggaldit').datepicker();
</script>
<!-- wysiwyg -->
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/demo.js" cache="false"></script>