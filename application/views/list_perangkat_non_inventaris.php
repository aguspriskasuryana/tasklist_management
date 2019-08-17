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
					<a href="<?php echo site_url('perangkat_non_inventaris/tambah_perangkat_non_inventaris'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="2%">ID</th>
								<th width="7%">Label</th>
								<th width="5%">Lokasi</th>
								<th width="5%">Item type</th>
								<th width="5%">Manufacture</th>
								<th width="5%">Model</th>
								<th width="5%">User</th>
								<th width="2%">Time</th>
								<th width="1%">Action</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($perangkat_non_inventaris as $list){
						
					?>
						<tr>
							<td><a href="<?php echo site_url('perangkat_non_inventaris/edit_perangkat_non_inventaris/'.$list['id_perangkat_non_inventaris']); ?>" class="btn detail_icon btn-xs btn-info btn_edit" data-toggle="tooltip" data-original-title="Edit"><?php echo $list['id_perangkat_non_inventaris']?></a></td>
							<td><?php echo $list['nama_perangkat_non_inventaris']?></td>
							<td><?php echo $list['lokasi_perangkat_non_inventaris']?></td>
							<td><?php echo $list['id_item_type']?></td>
							<td><?php echo $list['id_manufacture']?></td>
							<td><?php echo $list['model']?></td>
							<td><?php echo $list['user']?></td>
							<td><?php echo $list['time_update']?></td>

							<td>
							<a href="<?php echo site_url('perangkat_non_inventaris/edit_perangkat_non_inventaris/'.$list['id_perangkat_non_inventaris']); ?>" class="btn detail_icon btn-xs btn-info btn_edit" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
							<a href="<?php echo site_url('perangkat_non_inventaris/hapus/'.$list['id_perangkat_non_inventaris']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
							
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
$(document).ready(function() {
    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 30,
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