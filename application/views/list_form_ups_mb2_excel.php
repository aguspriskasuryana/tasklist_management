
<?php $id = $this->session->userdata('user_data'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=upsmb2.xls");

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				
				<div class="table-responsive">
					<table id="example" border="1" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">User</th>
								<th width="5%">Team</th>
								<th width="5%">Tanggal</th>
								<th width="5%">Jam</th>
								<th width="5%">Input V Rn</th>
								<th width="5%">Input V Sn</th>
								<th width="5%">Input V Tn</th>
								<th width="5%">Battery VDC</th>
								<th width="5%">Output V Rn</th>
								<th width="5%">Output V Sn</th>
								<th width="5%">Output V Tn</th>
								<th width="5%">Load KW</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($ups as $list){
						
					?>
						<tr>
							<td><?php echo $list['nama_lengkap']?></td>
							<td><?php echo $list['nama']?></td>
							<td><?php echo $list['time_now']?></td>
							<td><?php echo $list['jam']?></td>
							<td><?php echo $list['i_v_Rn']?></td>
							<td><?php echo $list['i_v_sn']?></td>
							<td><?php echo $list['i_v_tn']?></td>
							<td><?php echo $list['battery_vdc']?></td>
							<td><?php echo $list['o_v_Rn']?></td>
							<td><?php echo $list['o_v_sn']?></td>
							<td><?php echo $list['o_v_tn']?></td>
							<td><?php echo $list['load_kw']?></td>
							
							
							
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
          
          	$.post('<?php echo site_url('form/modalformupsmb2'); ?>',
                    {id:$(this).data('form_id')},
                    function(html){
                        $(".fetched-data").html(html);
                    }   
            );
        })
    });
</script>
<script>
$('.tglstart').datepicker();
$('.tglend').datepicker();
</script>
<script>
$(document).ready(function() {
    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 50,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[2, 'desc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [5] }, 
                { "bSearchable": false, "aTargets": [5] }],
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



$('.btn_delete_form').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>
