<?php $id = $this->session->userdata('user_data'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=acliebert.xls");

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					
				AC Liebert
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">User</th>
								<th width="5%">Tanggal</th>
								<th width="5%">Jam</th>
								<th width="5%">Temp_AC I</th>
								<th width="5%">Temp_AC II</th>
								<th width="5%">Temp_AC III</th>
								<th width="5%">rh_AC I</th>
								<th width="5%">rh_AC II</th>
								<th width="5%">rh_AC III</th>
								<th width="5%">Temp UPS</th>
								<th width="5%">temp_snmp I</th>
								<th width="5%">temp_snmp II</th>
								<th width="5%">temp_snmp III</th>
								<th width="5%">rh_snmp I</th>
								<th width="5%">rh_snmp II</th>
								<th width="5%">rh_snmp III</th>
								<th width="5%">temp_migle</th>
								<th width="5%">rh_migle</th>
								<th width="5%">temp_krisbow</th>

								<th width="5%">rh_krisbow</th>
								<th width="5%">temp_battery</th>
								<th width="5%">ratas_akhir_temp</th>

								<th width="5%">ratas_akhir_rh</th>
								<th width="5%">status_ACI</th>
								<th width="5%">status_ACII</th>
								<th width="5%">status_ACIII</th>

								<th width="5%">status_komp_ACI</th>
								<th width="5%">status_komp_ACII</th>
								<th width="5%">status_komp_ACIII</th>
								<th width="5%">keterangan</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($acliebert as $list){
						
					?>
						<tr>
							<td><?php echo $list['nama_lengkap']?></td>
							<td><?php echo $list['time_now']?></td>
							<td><?php echo $list['jam']?></td>
							<td><?php echo $list['temp_ACI']?></td>
							<td><?php echo $list['temp_ACII']?></td>
							<td><?php echo $list['temp_ACIII']?></td>
							<td><?php echo $list['rh_ACI']?></td>
							<td><?php echo $list['rh_ACII']?></td>
							<td><?php echo $list['rh_ACIII']?></td>
							<td><?php echo $list['temp_ups']?></td>
							<td><?php echo $list['temp_snmpI']?></td>
							<td><?php echo $list['temp_snmpII']?></td>
							<td><?php echo $list['temp_snmpIII']?></td>
							<td><?php echo $list['rh_snmpI']?></td>
							<td><?php echo $list['rh_snmpII']?></td>
							<td><?php echo $list['rh_snmpIII']?></td>
							<td><?php echo $list['temp_migle']?></td>
							<td><?php echo $list['rh_migle']?></td>
							<td><?php echo $list['temp_krisbow']?></td>

							<td><?php echo $list['rh_krisbow']?></td>
							<td><?php echo $list['temp_battery']?></td>
							<td><?php echo $list['ratas_akhir_temp']?></td>

							<td><?php echo $list['ratas_akhir_rh']?></td>
							<td><?php echo $list['status_ACI']?></td>
							<td><?php echo $list['status_ACII']?></td>
							<td><?php echo $list['status_ACIII']?></td>

							<td><?php echo $list['status_komp_ACI']?></td>
							<td><?php echo $list['status_komp_ACII']?></td>
							<td><?php echo $list['status_komp_ACIII']?></td>
							<td><?php echo $list['keterangan']?></td>
							
						</tr>
						
					<?php
						
					}
					?>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>

</section>


<script language="JavaScript">
    $(document).ready(function() {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {
          
            
          	$.post('<?php echo site_url('form/modalformacliebert'); ?>',
                    {id:$(this).data('form_id')},
                    function(html){
                        $(".fetched-data").html(html);
                    }   
            );
		  
          
        })
    });
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
			"aaSorting": [[1, 'desc']],
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



</script>