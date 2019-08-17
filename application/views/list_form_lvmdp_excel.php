<?php $id = $this->session->userdata('user_data'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=lvmdp.xls");

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					
				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">User</th>
								<th width="5%">Team</th>
								<th width="5%">Tanggal</th>
								<th width="5%">Jam</th>
								<th width="5%">PB ON OFF</th>
								<th width="5%">ir_a</th>
								<th width="5%">is_a</th>
								<th width="5%">it_a</th>
								<th width="5%">rs_v</th>
								<th width="5%">rt_v</th>
								<th width="5%">st_v</th>
								<th width="5%">rn_v</th>
								<th width="5%">sn_v</th>
								<th width="5%">tn_v</th>
								<th width="5%">f_hz</th>
								<th width="5%">cos phi</th>
								<th width="5%">KWH</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($lvmdp as $list){
						
					?>
						<tr>
							<td><?php echo $list['nama_lengkap']?></td>
							<td><?php echo $list['nama']?></td>
							<td><?php echo $list['time_now']?></td>
							<td><?php echo $list['jam']?></td>
							<td><?php 
							if ($list['pb_on_off'] == 1){
								echo "ON";
							} else {
								echo "OFF";
							}
							 
							?>
							</td>
							<td><?php echo $list['ir_a'] ?></td>
							<td><?php echo $list['is_a'] ?></td>
							<td><?php echo $list['it_a'] ?></td>
							<td><?php echo $list['rs_v'] ?></td>
							<td><?php echo $list['rt_v'] ?></td>
							<td><?php echo $list['st_v'] ?></td>
							<td><?php echo $list['rn_v'] ?></td>
							<td><?php echo $list['sn_v'] ?></td>
							<td><?php echo $list['tn_v'] ?></td>
							<td><?php echo $list['f_hz'] ?></td>
							<td><?php echo $list['cos_phi'] ?></td>
							<td><?php echo $list['kWh'] ?></td>

						
							
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
          
            
          	$.post('<?php echo site_url('form/modalformlvmdp'); ?>',
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
			"aaSorting": [[2, 'desc']],
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