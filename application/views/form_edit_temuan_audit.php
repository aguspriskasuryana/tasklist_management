<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Info Temuan Audit </header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/temuan_audit/update_data'); ?>" method="post" enctype="multipart/form-data">
			  <?php echo $this->csrf->get_html(); ?>
			  <input value="<?php echo $query['id_temuan_audit'] ;?>" id="id_temuan_audit" name="id_temuan_audit" type="hidden" >
			  	<div class="form-group">
				  <label class="col-sm-2 control-label">Tema Temuan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" value="<?php echo $query['tema_temuan'] ;?>" name="tema_temuan">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Judul Temuan</label>
				  <div class="col-sm-8">
					<input class="form-control"  type="text" data-required="true" value="<?php echo $query['judul_temuan'] ;?>" name="judul_temuan">
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">deskripsi</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("deskripsi",$query['deskripsi']);?>
				  </div>
				</div>
				
				<div class="form-group">
				<label class="col-lg-2 control-label">Kategori</label>
					<div class="col-sm-8">
						<select name="kategori_temuan" class="form-control m-b">
						<?php 
						$Minorchecked = "";
						$Moderatechecked = "";
						$Majorchecked = "";

						if ($query['kategori_temuan'] == "Minor"){
							$Minorchecked = "selected";
						} else if ($query['kategori_temuan'] == "Moderate"){
							$Moderatechecked = "selected";
						} else {
							$Majorchecked = "selected";
						}

						?>


						<option value="Minor" <?php echo $Minorchecked; ?>>Minor</option>
						<option value="Moderate" <?php echo $Moderatechecked; ?>>Moderate</option>
						<option value="Major" <?php echo $Majorchecked; ?>>Major</option>

                        </select>
					 </div>
					<div class="col-sm-8" id="col_spv">
						
					</div>
				</div>

				<div class="form-group">
				  <label class="col-sm-2 control-label">Rekomendasi</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("rekomendasi",$query['rekomendasi']);?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Batas Waktu RPM</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("batas_waktu_rpm",$query['batas_waktu_rpm']);?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">realisasi</label>
				  <div class="col-sm-2">
					<?php echo $this->ckeditor->editor("realisasi",$query['realisasi'] );?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">status</label>
					<div class="col-sm-8">
						<select name="status" class="form-control m-b">
						<?php 
						$memadaichecked = "";
						$dalam_pemantauanchecked = "";
						$tidak_memadaichecked = "";

						if ($query['status'] == "memadai"){
							$memadaichecked = "selected";
						} else if ($query['status'] == "dalam_pemantauan"){
							$dalam_pemantauanchecked = "selected";
						} else {
							$tidak_memadaichecked = "selected";
						}

						?>
						<option value="memadai" <?php echo $memadaichecked; ?>>Memadai</option>
						<option value="dalam_pemantauan"<?php echo $dalam_pemantauanchecked; ?> >Dalam Pemantauan</option>
						<option value="tidak_memadai" <?php echo $tidak_memadaichecked; ?>>Tidak Memadai</option>
                        </select>
					 </div>
				</div>

				<div class="form-group">
				<label class="col-lg-2 control-label">Update file</label>
					<div class="col-sm-8">
						<input type="hidden" data-required="true" value="<?php echo $query['file'] ;?>" name="old_file">
						<input type="file" class="btn btn-default"  accept="*" name="file">
					 </div>
				</div>
				

				<div class="form-group">
				  <label class="col-sm-2 control-label">TLM</label>
				  <div class="col-sm-2">

					<?php 
					if($tlm){
						//var_dump($data['tlm']);
						foreach($tlm as $list){
					?>
						<?php echo $list['tindak_lanjut_temuan']?>
						<a href="<?php echo site_url('temuan_audit/hapustlm/'.$list['id_temuan_tlm'].'/'.$list['id_temuan_audit']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_tlm" data-toggle="tooltip" data-original-title="Delete TLM"><i class="fa fa-trash-o"></i></a> 
						<br>
					<?php
						}
					}
					?>

				  </div>
				</div>


				<div class="form-group">
				  <label class="col-sm-2 control-label"></label>
				  <div class="col-sm-2">
					<a href="#modal-form" class="btn btn-success" data-toggle="modal" data-tlm="<?php echo $query['id_temuan_audit'] ;?>">Add tindak lanjut manajemen</a>
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
<div class="modal fade" id="modal-form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 b-r">
              <h3 class="m-t-none m-b">FORM </h3>
              <form role="form" action="<?php echo base_url('index.php/temuan_audit/tambah_data_tlm'); ?>" method="post">
              
              	<input type="hidden" class="form-control" name="id_temuan_audit_modal" id="id_temuan_audit_modal">
                <div class="form-group">
                  <label>Tindak Lanjut Manajemen</label>
                  

                  <textarea class="form-control" rows="6" data-minwords="6" data-required="true" placeholder="Tidak Lanjut Manajemen" name="tindak_lanjut_temuan" id="tindak_lanjut_temuan"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Simpan</button>
                </div>

                               
              </form>
            </div>
            
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="modal-upload">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 b-r">
              <h3 class="m-t-none m-b">FORM </h3>
              <form role="form" action="<?php echo base_url('index.php/temuan_audit/aksi_upload'); ?>" method="post">
              
              	<input type="hidden" class="form-control" name="id_temuan_audit_modal" id="id_temuan_audit_modal">
                <div class="form-group">
                  <label>Berkas</label>
                  <input type="file" class="btn btn-default"  accept=".*" name="berkas">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Simpan</button>
                </div>

                               
              </form>
            </div>
            
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

<script>
$('.btn_delete_tlm').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
$('#modal-form').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var tlmId = $(e.relatedTarget).data('tlm');
    //populate the textbox
    $(e.currentTarget).find('input[name="id_temuan_audit_modal"]').val(tlmId);
});
$('.tanggal').datepicker();
</script>