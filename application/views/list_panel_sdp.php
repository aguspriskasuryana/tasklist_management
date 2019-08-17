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
				<header class="panel-heading">

<a href="#" data-toggle="modal" data-target="#modal_tambah" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>

					<a href="<?php echo site_url('panel_sdp/get_list_panel_sdp_detail_kpi'); ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i> KPI</a>

					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
					<form id="changetanggal"  name="changetanggal"  method="post" action="<?php echo site_url('panel_sdp/get_list_panel_sdp'); ?>"  class="panel-body">
						<div class="tab-pane fade active in" id="tanggal">
							<div >
							
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
										<td>
											<select name="phase" id="phase" class="form-control m-b">
											<option value="" >(phase)</option>
											<?php 
											//var_dump($phase_select);
											foreach($phase as $phases){
											if ($phases['phase'] == $phase_select){
												?>
												<option value="<?php echo $phases['phase'];?>" selected><?php echo $phases['phase']?></option>
												<?php
											} else {
											?>
												<option value="<?php echo $phases['phase'];?>" ><?php echo $phases['phase']?></option>
											<?php 
												}
											}

											?>
					                        </select>
										</td>
										<td>
											<select name="nama_phase" id="nama_phase" class="form-control m-b">
											<option value="" >(nama phase)</option>
											<?php foreach($nama_phase as $nama_phases){
											if ($nama_phases['nama_phase'] == $nama_phase_select){
												?>
												<option value="<?php echo $nama_phases['nama_phase'];?>" selected><?php echo $nama_phases['nama_phase']?></option>
												<?php
											} else {
											?>
												<option value="<?php echo $nama_phases['nama_phase'];?>" ><?php echo $nama_phases['nama_phase']?></option>
											<?php 
												}
											}

											?>
					                        </select>
										</td>
									</tr>
									<tr>
										<td>
										<!--<input class="input-sm input-s form-control tgl" size="20" type="text" data-date-format="yyyy-mm-dd" data-required="true" value="<?php echo $tgl ?>" name="tgl">-->

										<select name="tgl" id="tgl" class="form-control m-b">
											<?php foreach($tanggal_ready as $tanggal_readys){
											if ($tanggal_readys['tanggal'] == $tgl){
												?>
												<option value="<?php echo $tanggal_readys['tanggal'];?>" selected><?php echo $tanggal_readys['tanggal']?></option>
												<?php
											} else {
											?>
												<option value="<?php echo $tanggal_readys['tanggal'];?>" ><?php echo $tanggal_readys['tanggal']?></option>
											<?php 
												}
											}

											?>
					                        </select>

										</td>

										<td>
											
										<a href="" class="btn btn-sm btn-primary" onclick="document.changetanggal.action = '<?php echo base_url('index.php/panel_sdp/get_list_panel_sdp'); ?>'; document.changetanggal.method='post'; document.changetanggal.submit(); return false;">Search</a>
										</td>
										<td>	
																			
										<a href="" class="btn btn-sm btn-primary" onclick="document.changetanggal.action = '<?php echo base_url('index.php/panel_sdp/get_list_panel_sdp_excel'); ?>'; document.changetanggal.method='post'; document.changetanggal.submit(); return false;">Excel2</a>
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
						<input type="hidden" name="phase" value="<?php echo $phase_select?>">
						<input type="hidden" name="nama_phase" value="<?php echo $nama_phase_select?>">
						<input type="hidden" name="tgl" value="<?php echo $tgl?>">

					<div class="scrollmenu">
					<table id="example" border="1" class="table"  data-ride="datatables">
					<thead>
							<tr>
								<th width="4%" style="background-color: grey; color: black" class="headcol ">Nama</th>
								<th style="background-color: grey; color: black" width="3%" class="headcol2">Nama perangkat</th>
								<th style="background-color: grey; color: black" width="2%">MCB</th>
								<th style="background-color: grey; color: black" width="1%">Load</th>
								<th style="background-color: grey; color: black" width="1%">Phase</th>
								<th style="background-color: grey; color: black" width="1%">N. Phase</th>
								<th style="background-color: grey; color: black" width="1%">K. Rak</th>
								<th style="background-color: grey; color: black" width="1%">K. Legrand</th>
								<th style="background-color: grey; color: black" width="1%">Cur. (Ampere)</th>
								<th style="background-color: grey; color: black" width="1%">Voltage (Volt)</th>
								<th style="background-color: grey; color: black" width="1">T. 0-Ground (Volt)</th>
								<th style="background-color: grey; color: black" width="1%">Daya Semu (kVA)</th>
								<th style="background-color: grey; color: black" width="1%">Daya (Kilo Watt)</th>
								<th width="1%" style="background-color: grey; color: black">Tanggal</th>
							</tr>
						</thead>
						<tbody>
					<?php 

					$current_ampere=0;
					$voltage_1_phase=0;
					$pembagi_voltage_1_phase=0;
					$pembagi_grounding=0;
					$daya_semu=0;
					$daya=0;
					$grounding=0;
					foreach($panel_sdp as $list){
					$current_ampere  = $current_ampere+$list['current_ampere'];
					$voltage_1_phase = $voltage_1_phase+$list['voltage_1_phase'];
					if ($list['voltage_1_phase'] > 0){
						$pembagi_voltage_1_phase = $pembagi_voltage_1_phase + 1;
					}

					$daya_semu = $daya_semu+$list['daya_semu'];
					$daya = $daya+$list['daya'];
					$grounding = $grounding+$list['grounding'];
					if ($list['grounding'] > 0){
						$pembagi_grounding = $pembagi_grounding + 1;
					}	
					?>
						<tr>
							<td class="headcol"><?php echo $list['nama_panel']?></td>
							<td class="headcol2"><?php echo $list['nama_perangkat']?></td>
							<td><?php echo $list['mcb']?></td>
							<td><?php echo $list['load']?></td>
							<td><?php echo $list['phase']?></td>
							<td><?php echo $list['nama_phase']?></td>
							<td><?php echo $list['koordinat_rak']?></td>
							<td><?php echo $list['koordinat_legrand']?></td>
							<td>
								<input type="text" class="col-xs-1" style="width:70%;" data-required="true" name="<?php echo $list['id_panel_sdp']?>_current_ampere" title="<?php echo $list['nama_perangkat']?> : <?php echo $list['mcb']?>" value="<?php echo $list['current_ampere']?>">
							</td>
							<td>
								<input type="text" class="col-xs-1" style="width:70%;" data-required="true" name="<?php echo $list['id_panel_sdp']?>_voltage_1_phase" title="<?php echo $list['nama_perangkat']?> : <?php echo $list['mcb']?>" min="197" max="418" value="<?php echo $list['voltage_1_phase']?>">
							</td>
							<td>
								<input type="text" class="form-control col-xs-1" style="width:70%;" data-required="true" name="<?php echo $list['id_panel_sdp']?>_grounding" title="<?php echo $list['nama_perangkat']?> : <?php echo $list['mcb']?>" value="<?php echo $list['grounding']?>">
							</td>
							<td>
								
								<?php 
								$nilai = 0;

								$pos = strpos($list['nama_phase'], "1");
								//var_dump($pos);
								if ($pos === 0){
										$nilai = (($list['current_ampere'] * $list['voltage_1_phase'])/1000);
										echo number_format($nilai,5,".",".");
									} else {
										$nilai = ((1.73 * $list['current_ampere'] * $list['voltage_1_phase'])/1000);
										echo number_format($nilai,5,".",".");
									}
								?>
								<input type="hidden" class="form-control" style="width:70%;" data-required="true" name="<?php echo $list['id_panel_sdp']?>_daya_semu" value="<?php echo $nilai?>">
							</td>
							<td>
								<?php 
								$nilaidaya = $nilai*0.98;
								echo number_format($nilaidaya,5,".",".");
								?>
								<input type="hidden" class="form-control" style="width:70%;" data-required="true" name="<?php echo $list['id_panel_sdp']?>_daya" value="<?php echo $nilaidaya?>">
							</td>
							
							<td><?php echo $list['tanggal']?></td>

							<!--<a href="<?php echo site_url('panel_sdp/hapus/'.$list['id_panel_sdp']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> -->
							
							
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
							<td style="background-color: yellow">
								<input type="text"  class="form-control col-xs-1" style="width:70%;" data-required="true" value="<?php echo $current_ampere; ?>">
							</td>
							<td style="background-color: yellow">
								<input type="text"  class="form-control col-xs-1" style="width:70%;" data-required="true" value="<?php
								$nvl = 0 ;
								if ($voltage_1_phase>0){
									$nvl = $voltage_1_phase/$pembagi_voltage_1_phase;
								}
									
								 	echo $nvl; ?>">								
							</td>
							<td style="background-color: yellow">
								<input type="text"  class="form-control col-xs-1"  style="width:70%;"data-required="true"  value="<?php
								$nground = 0 ;
								if ($grounding>0){
									$nground = $grounding/$pembagi_grounding;
								}
									
								 	//echo $nground; ?>">
							</td>
							<td style="background-color: yellow">
								<input type="text"  class="form-control col-xs-1" style="width:70%;" data-required="true"  value="<?php echo $daya_semu; ?>">
							</td>
							<td style="background-color: yellow">
								<input type="text"  class="form-control col-xs-1" style="width:70%;" data-required="true"  value="<?php echo $daya; ?>">
							</td>

							<td style="background-color: yellow"></td>

							
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


<div id="modal_tambah" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
			<form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/panel_sdp/get_list_panel_sdp_tambah');?>" method="post">

				<div class="form-group">
				  <label class="col-lg-2 control-label">Tanggal</label>
				  <div class="col-lg-10">
					<input class="input-sm input-s form-control" size="20" maxlength="10" type="text" data-date-format="yyyy-mm-dd" data-required="true" placeholder="2019-01-01" value="<?php echo $tgl?>" name="tgl">
				  </div>
				</div>

				<span id="confirmMessage" class="confirmMessage"></span>
				
				<div class="form-group">
				  <div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Simpan</button>
				  </div>
				</div>
			  </form>

       
    </div>

  </div>
</div>


<script>
$('.tgl').datepicker();
$('.tgl2').datepicker();

</script>


<script>
$(document).ready(function(){
    $("#tgl").change(function(){
    	var val = document.getElementById("tgl").value;
    	        this.form.submit();
        
    });
});
</script>
<script>
$(document).ready(function() {
    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 3000,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[0, 'asc'],[2, 'asc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [13] }, 
                { "bSearchable": false, "aTargets": [13] }],
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
