
<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Form Pengeluaran Barang</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/form_storage_new/update_data_keluar'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_form_storage_new" name="id_form_storage_new" value="<?php echo $query['id_form_storage_new'] ;?>" type="hidden" >
			  
			  <input  type="hidden"  name="jumlah_awal" >
				
				<div class="form-group">
				<label class="col-lg-2 control-label">Status</label>
					<div class="col-sm-10">
						
						<?php echo $tipe[$query['id_room']]['nama_room']?>
						
					 </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">No Rak</label>
				  <div class="col-sm-8">
				  	<?php echo $query['no_rak'] ;?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Nama barang</label>
				  <div class="col-sm-8">
					<?php echo $query['nama_barang'] ;?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">No Dus</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" name="no_dus"  value="<?php echo $query['no_dus'] ;?>" placeholder="Ex : '1'">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">SN Barang</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" name="sn_barang"  value="<?php echo $query['sn_barang'] ;?>" placeholder="Ex : '12345'">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Jumlah Barang Keluar</label>
				  <div class="col-sm-8">
					Jumlah Saat Ini : <?php echo $query['jumlah_akhir'] ;?>
				  
					<input class="form-control"  type="number" data-required="true" max="<?php echo $query['jumlah_akhir'] ;?>" name="jumlah_akhir"  value="1" placeholder="Ex : '3 (jumlah barang masuk)'"> *wajib diisi jumlah pengeluaran barang
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">ket_dus</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  data-required="true" name="ket_dus"  value="<?php echo $query['ket_dus'] ;?>" placeholder="Ex : 'keterangan'">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">merk</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  data-required="true" name="merk"  value="<?php echo $query['merk'] ;?>" placeholder="Ex : 'Panduit'">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label">Tgl Keluar</label>
				  <div class="col-sm-2">
					<input class="input-sm input-s form-control tanggal_keluar" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" name="tanggal_keluar"  value="<?php echo date('Y-m-d'); ?>" >
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">keterangan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  data-required="true" name="keterangan"   placeholder="Ex : 'barang digunakan di ruang service'">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">owner</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text"  data-required="true" name="owner"  value="<?php echo $query['owner'] ;?>" placeholder="Ex : 'Mr.x'">
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
$('.tanggal_keluar').datepicker();
</script>
<!-- wysiwyg -->
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/wysiwyg/demo.js" cache="false"></script>