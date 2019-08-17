<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Form Update Dashboard</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/home/update_dashboard'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
				<div class="form-group">
					<label class="col-lg-4 control-label">Tes Beban UPS Bulanan</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" data-required="true" name="1" placeholder="ketik 0 jika belum dan 1 jika sudah">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Tes Genset Bulanan</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" data-required="true" name="2" placeholder="jumlah tes genset bulan ini (max. = 4). mis: 1">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Formasi TIK</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" data-required="true" name="3" placeholder="isi dengan jumlah saat ini">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Suhu DC (Celcius)</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" data-required="true" name="4" placeholder="00.00">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Humidity DC (% RH)</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" data-required="true" name="5" placeholder="00.00">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">RISK (%)</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" data-required="true" name="6" placeholder="00.00">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">UPS (%)</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" data-required="true" name="7" placeholder="00.00">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Battery (%)</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" data-required="true" name="8" placeholder="00.00">
					</div>
				</div>
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