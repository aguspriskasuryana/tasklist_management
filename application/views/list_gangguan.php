<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('gangguan/tambah_gangguan'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">Tanggal Laporan</th>
								<th width="3%">Id Pelapor</th>
								<th width="5%">Kejadian</th>
								<th width="5%">Tanggal Lanjutan</th>
								<th width="5%">Tindak Lanjut</th>
								<th width="5%">Lokasi</th>
								<th width="5%">Status</th>
								<th width="5%">Aksi</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($gangguan as $list){
						
					?>
						<tr>
							<td><?php echo $list['tanggal_laporan']?></td>
							<td><?php echo $list['nama_lengkap']?></td>
							<td><?php echo $list['kejadian']?></td>
							<td><?php echo $list['tanggal_lanjutan']?></td>
							<td><?php echo $list['lanjutan']?></td>
							<td><?php echo $list['lokasi']?></td>
							<td><?php echo $list['status']?></td>

							<td>
							<?php if(($id["id_role"]) == 3 || ($id["id_role"]) == 4 || ($id["id_role"]) == 0|| ($id["id_role"]) == 7) { ?>
							<a href="<?php echo site_url('gangguan/edit_gangguan/'.$list['id_gangguan']); ?>" class="btn detail_icon btn-xs btn-info btn_edit_gangguan" data-toggle="tooltip" data-original-title="Edit Task"><i class="fa fa-edit"></i></a> ||
							<a href="<?php echo site_url('gangguan/hapus/'.$list['id_gangguan']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_gangguan" data-toggle="tooltip" data-original-title="Delete Task"><i class="fa fa-trash-o"></i></a> 
							<?php } ?>
							
							
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



$('.btn_delete_gangguan').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>
