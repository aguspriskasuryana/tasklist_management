<?php $id = $this->session->userdata('user_data'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
div.scrollmenu {
    overflow: auto;
    white-space: nowrap;
}

div.scrollmenu a {
    display: inline-block;
    text-align: center;
    padding: 14px;
    text-decoration: none;
}

div.scrollmenu a:hover {
}
</style>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				
				<div class="table-responsive">

				<form action="<?php echo base_url('index.php/panel_sdp/tambah_data_list'); ?>" method="post">

						<input type="hidden" name="nama_perangkat" value="<?php echo $nama_perangkat_select?>">
						<input type="hidden" name="nama_panel" value="<?php echo $nama_panel_select?>">
						<input type="hidden" name="mcb" value="<?php echo $mcb_select?>">
						<input type="hidden" name="koordinat_rak" value="<?php echo $koordinat_rak_select?>">
						<input type="hidden" name="phase_rak" value="<?php echo $phase_select?>">
						<input type="text" name="tgl"  value="<?php echo $tgl?>">

					<div class="scrollmenu">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="10%" class="headcol">Nama</th>
								<th width="5%" class="headcol2">Nama perangkat</th>
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

					$current_ampere=0;
					$voltage_1_phase=0;
					$daya_semu=0;
					$daya=0;
					$grounding=0;
					foreach($panel_sdp as $list){
					$current_ampere  = $current_ampere+$list['current_ampere'];
					$voltage_1_phase = $voltage_1_phase+$list['voltage_1_phase'];
					$daya_semu = $daya_semu+$list['daya_semu'];
					$daya = $daya+$list['daya'];
					$grounding = $grounding+$list['grounding'];
						
					?>
						<tr>
							<td class="headcol"><?php echo $list['nama_panel']?></td>
							<td class="headcol2"><?php echo $list['nama_perangkat']?></td>
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
							<!--<a href="<?php echo site_url('panel_sdp/hapus/'.$list['id_panel_sdp']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> -->
							
							</td>
							
						</tr>
							
					<?php			
					}
					?>
	
						</tbody>
						<thead>
							<tr>
							<td style="background-color: yellow ; font-size: 20;">TOTAL</td>
							<td style="background-color: yellow"></td>
							<td style="background-color: yellow"></td>
							<td style="background-color: yellow"></td>
							<td style="background-color: yellow"></td>
							<td style="background-color: yellow"></td>
							<td style="background-color: yellow"></td>
							<td style="background-color: yellow"></td>
							<td style="background-color: yellow"></td>
							<td style="background-color: yellow">
								<input type="text" class="form-control" data-required="true"  value="<?php echo $current_ampere; ?>">
							</td>
							<td style="background-color: yellow">
								<input type="text" class="form-control" data-required="true"  value="<?php echo $voltage_1_phase; ?>">
							</td>
							<td style="background-color: yellow">
								<input type="text" class="form-control" data-required="true"  value="<?php echo $daya_semu; ?>">
								
							</td>
							<td style="background-color: yellow">
								<input type="text" class="form-control" data-required="true"  value="<?php echo $daya; ?>">
							</td>
							<td style="background-color: yellow">
								<input type="text" class="form-control" data-required="true"  value="<?php echo $grounding; ?>">
							</td>
							<td style="background-color: yellow"></td>

							<td style="background-color: yellow">
							
							</td>
							
						</tr>
						</thead>
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
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [9] }, 
                { "bSearchable": false, "aTargets": [9] }],
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
