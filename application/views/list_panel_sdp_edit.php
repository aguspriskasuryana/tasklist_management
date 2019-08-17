<?php $id = $this->session->userdata('user_data'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
        
        div.scrollmenu { 
            overflow-x:scroll;  
            margin-left:18em; 
            overflow-y:visible;
        }
        .headcol {
            position:absolute; 
            width:7em; 
            left:2em;
            height: 5em;
        }
        .headcol2 {
            position:absolute; 
            width:7em; 
            left:9em;
            height: 5em;
        }
        
</style>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">

				<header class="panel-heading">


					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 

					<form id="changetanggal" method="post" action="<?php echo site_url('panel_sdp/get_list_panel_sdp'); ?>"  class="panel-body">
						<div class="tab-pane fade active in" id="tanggal">
							<div class="col-sm-2">
							
								<table>
									<tr>
										<td>
										<select name="nama_perangkat" id="nama_perangkat" class="form-control m-b">
											<option value="" >(Nama Perangkat)</option>
											<?php foreach($nama_perangkat as $nama_perangkats){
											if ($nama_perangkats['nama_perangkat'] == $nama_perangkat_select){
												?>
												<option value="<?php echo $nama_perangkats['nama_perangkat'];?>" selected><?php echo $nama_perangkats['nama_perangkat']?></option>
												<?php
											} else {
											?>
												<option value="<?php echo $nama_perangkats['nama_perangkat'];?>" ><?php echo $nama_perangkats['nama_perangkat']?></option>
											<?php 
												}
											}

											?>
					                        </select>
										</td>
										<td>
										<select name="mcb" id="mcb" class="form-control m-b">
											<option value="" >(MCB)</option>
											<?php foreach($mcb as $mcbs){
											if ($mcbs['mcb'] == $mcb_select){
												?>
												<option value="<?php echo $mcbs['mcb'];?>" selected><?php echo $mcbs['mcb']?></option>
												<?php
											} else {
											?>
												<option value="<?php echo $mcbs['mcb'];?>" ><?php echo $mcbs['mcb']?></option>
											<?php 
												}
											}

											?>
					                        </select>
										</td>
									</tr>
									<tr>
										<td>
										<select name="nama_panel" id="nama_panel" class="form-control m-b">
											<option value="" >(SDP)</option>
											<?php 

											foreach($nama_panel as $nama_panels){
											if ($nama_panels['nama_panel'] == $nama_panel_select){
												?>
												<option value="<?php echo $nama_panels['nama_panel'];?>" selected><?php echo $nama_panels['nama_panel']?></option>
												<?php
											} else {
											?>
												<option value="<?php echo $nama_panels['nama_panel'];?>" ><?php echo $nama_panels['nama_panel']?></option>
											<?php 
												}
											}

											?>
					                        </select>
										</td>
										<td>
											<select name="koordinat_rak" id="koordinat_rak" class="form-control m-b">
											<option value="" >(Koordinat Rak)</option>
											<?php foreach($koordinat_rak as $koordinat_raks){
											if ($koordinat_raks['koordinat_rak'] == $koordinat_rak_select){
												?>
												<option value="<?php echo $koordinat_raks['koordinat_rak'];?>" selected><?php echo $koordinat_raks['koordinat_rak']?></option>
												<?php
											} else {
											?>
												<option value="<?php echo $koordinat_raks['koordinat_rak'];?>" ><?php echo $koordinat_raks['koordinat_rak']?></option>
											<?php 
												}
											}

											?>
					                        </select>
										</td>
									</tr>
									<tr>
										<td>
										<input class="input-sm input-s form-control tgl" size="16" type="text" data-date-format="yyyy-mm" data-required="true" value="<?php echo $tgl ?>" name="tgl">
										</td>
										<td>
											<button type="submit" class="btn btn-default" data-dismiss="modal">Search</button> 
											
										<!--<a href="" class="btn btn-sm btn-primary" onclick="document.changetanggal.action = '<?php echo base_url('index.php/panel_sdp/get_list_panel_sdp'); ?>'; document.changetanggal.method='post'; document.changetanggal.submit(); return false;">Search</a>
										</td>
										<td>
										<a href="" class="btn btn-sm btn-primary" onclick="document.changetanggal.action = '<?php echo base_url('index.php/panel_sdp/get_list_panel_sdp_tambah'); ?>'; document.changetanggal.method='post'; document.changetanggal.submit(); return false;">Tambah</a> -->
										</td>
									</tr>
								</table>

							</div>

						</div>
					</form>

				
				</header>
				
				
				<div class="table-responsive">
					<form action="<?php echo base_url('index.php/panel_sdp/update_data_list'); ?>" method="post">

						<input type="hidden" name="nama_perangkat" value="<?php echo $nama_perangkat_select?>">
						<input type="hidden" name="nama_panel" value="<?php echo $nama_panel_select?>">
						<input type="hidden" name="mcb" value="<?php echo $mcb_select?>">
						<input type="hidden" name="koordinat_rak" value="<?php echo $koordinat_rak_select?>">
						<input type="hidden" name="tgl" value="<?php echo $tgl?>">

					<div class="scrollmenu">
						<table  class="table table-striped m-b-none" data-ride="datatables">

						<thead>
							<tr>
								<th width="10%" style="background-color: yellow;" class="headcol">Nama</th>
								<th width="5%" style="background-color: yellow;" class="headcol2">Nama perangkat</th>
								<th width="5%" >Tanggal</th>
								<th width="4%">MCB</th>
								<th width="1%">Load</th>
								<th width="1%">Phase</th>
								<th width="1%">Nama Phase</th>
								<th width="5%">Koordinat_rak</th>
								<th width="5%">Koordinat Legrand</th>
								<th width="1%">Current Ampere</th>
								<th width="1%">Voltage 1 Phase</th>
								<th width="1%">Daya Semu</th>
								<th width="1%">Daya</th>
								<th width="1%">Grounding</th>
								<th width="5%">Time Now</th>
								<th width="5%">Aksi</th>
							</tr>
						</thead>
						<tbody>

							
							
					<?php 
					foreach($panel_sdp as $list){
						
					?>
						<tr>
							<td style="background-color: yellow;" class="headcol"><?php echo $list['nama_panel']?></td>
							<td style="background-color: yellow;" class="headcol2"><?php echo $list['nama_perangkat']?></td>
							<td ><?php echo $list['tanggal']?></td>
							<td><?php echo $list['mcb']?></td>
							<td><?php echo $list['load']?></td>
							<td><?php echo $list['phase']?></td>
							<td><?php echo $list['nama_phase']?></td>
							<td><?php echo $list['koordinat_rak']?></td>
							<td><?php echo $list['koordinat_legrand']?></td>
							<td>
								<input type="text" class="form-control" data-required="true" name="<?php echo $list['id_panel_sdp']?>_current_ampere" value="<?php echo $list['current_ampere']?>">
							</td>
							<td>
								<input type="text" class="form-control" data-required="true" name="<?php echo $list['id_panel_sdp']?>_voltage_1_phase" value="<?php echo $list['voltage_1_phase']?>">
							</td>
							<td>
								<input type="text" class="form-control" data-required="true" name="<?php echo $list['id_panel_sdp']?>_daya_semu" value="<?php echo $list['daya_semu']?>">
								
							</td>
							<td>
								<input type="text" class="form-control" data-required="true" name="<?php echo $list['id_panel_sdp']?>_daya" value="<?php echo $list['daya']?>">
							</td>
							<td>
								<input type="text" class="form-control" data-required="true" name="<?php echo $list['id_panel_sdp']?>_grounding" value="<?php echo $list['grounding']?>">
							</td>
							<td><?php echo $list['time_now']?></td>

							<td>
							<a href="<?php echo site_url('panel_sdp/hapus/'.$list['id_panel_sdp']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
							
							</td>
							
						</tr>
							
						
					<?php
						
					}
					?>
						</tbody>

						</table>
					</div>

						<button type="submit" class="btn btn-default" data-dismiss="modal">save</button> 
				</form>
				
				</div>
			</section>
		</div>
	</div>

</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Konfirmasi Hapus!
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Akan Menghapus User?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
$('.tgl').datepicker();

</script>


<script>
$(document).ready(function() {
    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 100,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[0, 'desc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [ 2] }, 
                { "bSearchable": false, "aTargets": [2] }],
			//"fnServerData": fnDataTablesPipeline,
			//"bStateSave": true,
			//"bDeferRender": true,
			"fnDrawCallback": function() {
				$('.btn-delete').click(function(e) {
					e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
					//console.log(c);
					//if(c) window.location.href = $(e.delegateTarget).attr('href');
				});
				
				$('[data-toggle="tooltip"]').tooltip();
			}
		});
});



$('.btn_delete').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>
