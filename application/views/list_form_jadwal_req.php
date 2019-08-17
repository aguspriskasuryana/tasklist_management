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
								<th width="10%">task</th>
								<th width="10%">user</th>
								<th width="5%">jam awal</th>
								<th width="5%">jam baru</th>
								<th width="10%">tanggal lama</th>
								<th width="10%">tanggal baru</th>
								<th width="10%">date_req</th>
								<th width="5%">Paraf</th>
								<th width="5%">Time Paraf</th>
								<th width="10%">Aksi</th>
					</thead>
					<tbody>
					<?php 
					$id = $this->session->userdata('user_data');
					foreach($query as $list){
					?>
						<tr>
							<td><?php echo $list['id_task_list']?></td>
							<td><?php echo $list['id_user']?></td>
							<td><?php echo $list['jam_awal']?></td>
							<td><?php echo $list['jam_baru']?></td>
							<td><?php echo $list['tanggal_lama']?></td>
							<td><?php echo $list['tanggal_baru']?></td>
							<td><?php echo $list['date_req']?></td>
							<td><?php echo $list['id_paraf']?></td>
							<td><?php echo $list['time_paraf']?></td>
							<?php 
							if(($id['id_role'] == '3') && ($list['id_paraf'] == '0') ){
							?>
							<td>
								<p id="<?php echo $list['id_task_list']?>" style="display:none"><?php echo $list['id_task_list']?></p>
								<p id="<?php echo $list['id_ganti_jadwal_req']?>" style="display:none"><?php echo $list['id_ganti_jadwal_req']?></p>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs paraf_form" title="Klik apabila perubahan task ini di setujui"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
							</td>
							<?php 
							}else{
							?>
							
							<?php
							}
							?>
							
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

$('.paraf_form').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('ganti_jadwal_req/input_paraf/1'); ?>', {id_ganti_jadwal_req:a});		
		$(this).next().remove();
	}
});

$('.tidak-kerja').click(function(e){
	$('#col_id_act').text('');
	var a = $(this).prev().prev().text();
	$('#col_id_act').append(a);
});

$('.btn-tidak-kerja').click(function(e){
	var id = $(this).parent().prev().children('p').text();
	var b = $(this).parent().prev().children('textarea').val();
	//alert(b);
	//alert(id);
	$('[id="'+id+'"]').next().remove();
	$.getJSON('<?php echo site_url('task/input_pelaksanaan/2'); ?>', {id_act:id,alasan:b});
	$('[id="'+id+'"]').next('.tidak-kerja').addClass('active');
	$('[id="'+id+'"]').next('.tidak-kerja').prop('disabled',true);
	$('#modal_tidak_kerja').modal('hide');	
});

</script>