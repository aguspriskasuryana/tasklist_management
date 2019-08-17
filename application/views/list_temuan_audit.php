<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('temuan_audit/tambah_temuan_audit'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<a href="<?php echo site_url('temuan_audit/get_list_temuan_audit_excel'); ?>" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Excel</a>

					
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				
				</header>
				<div class="table-responsive">
					<table class="table table-striped m-b-none" data-ride="datatables">
						<thead>
							<tr>
								<th width="3%">Tema Temuan</th>
								<th width="3%">Judul Temuan</th>
								<th width="2%">Kategori</th>
								<th width="3%">Batas Waktu RPM</th>
								<th width="10%">Realisasi</th>
								<th width="1%">Status</th>
								<th width="1%">Aksi</th>
							</tr>
					</thead>
						<tbody>
					<?php 
					foreach($temuan_audit as $list){
						
					?>
						<tr>
							<td><a href="<?php echo site_url('temuan_audit/edit_temuan_audit/'.$list['id_temuan_audit']); ?>"><?php echo $list['tema_temuan']?></a></td>
							<td><?php echo $list['judul_temuan']?></td>
							<td><?php echo $list['kategori_temuan']?></td>
							<td><?php echo $list['batas_waktu_rpm']?></td>
							<td><?php echo $list['realisasi']?></td>
							<?php if($list['status'] =="memadai") {?>
							<td style="color: green"><?php echo $list['status']?>
							<?php } else if($list['status'] =="tidak_memadai") { ?>
							<td style="color: red"><?php echo $list['status']?>
							<?php } else {?>
							<td style="color: yellow"><?php echo $list['status']?>
							<?php } ?>

							</td>

							<td>
							<a href="<?php echo site_url('temuan_audit/edit_temuan_audit/'.$list['id_temuan_audit']); ?>" class="btn detail_icon btn-xs btn-info btn_edit_temuan_audit" data-toggle="tooltip" data-original-title="Edit "><i class="fa fa-edit"></i></a>
							<a href="<?php echo site_url('temuan_audit/hapus/'.$list['id_temuan_audit']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_temuan_audit" data-toggle="tooltip" data-original-title="Delete temuan_audit"><i class="fa fa-trash-o"></i></a> 
							<a target="blank" href="<?php echo "../../file/".$list['file'] ?>"><i class="fa fa-download"></i></a>
							</td>
							
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
	$('[data-ride="datatables"]').each(function() {
		var oTable = $(this).dataTable( {
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 100,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			//"aaSorting": [[2, 'desc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [4] }, 
                { "bSearchable": false, "aTargets": [4] }],
			//"aaSorting": [[1, 'asc']],
			//"fnServerData": fnDataTablesPipeline,
			//"bStateSave": true,
			//"bDeferRender": true,
			"fnDrawCallback": function() {
				$('.btn-delete-temuan_audit').click(function(e) {
					e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
					//console.log(c);
					//if(c) window.location.href = $(e.delegateTarget).attr('href');
				});
				$('[data-toggle="tooltip"]').tooltip();
			}
		} );
	});
});
$('.btn_delete_temuan_audit').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});


</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>