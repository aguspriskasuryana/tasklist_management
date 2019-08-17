<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
				<p>Form App</p>
				</header>
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
								<th width="10%">taskX</th>
								<th width="10%">user</th>
								<th width="5%">jam awal</th>
								<th width="5%">jam baru</th>
								<th width="10%">tanggal lama</th>
								<th width="10%">tanggal baru</th>
								<th width="10%">date_req</th>
								<th width="5%">Paraf</th>
								<th width="5%">Time Paraf</th>
							
					</thead>
					<tbody>
					<?php 
					
					foreach($query as $list){
					?>
						<tr>
							<td><?php echo $list['aktifitas']?></td>
							<td><?php echo $list['nama_lengkap']?></td>
							<td><?php echo $list['jam_awal']?></td>
							<td><?php echo $list['jam_baru']?></td>
							<td><?php echo $list['tanggal_lama']?></td>
							<td><?php echo $list['tanggal_baru']?></td>
							<td><?php echo $list['date_req']?></td>
							<td><?php echo $list['nama_paraf']?></td>
							<td><?php echo $list['time_paraf']?></td>
							
							
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

<script>
$(document).ready(function() {
    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[1, 'asc']],
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