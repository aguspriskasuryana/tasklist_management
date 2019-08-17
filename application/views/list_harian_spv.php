<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<?php if  ($id['id_role'] != 1 ) {?>
						<a href="<?php echo site_url('harian_spv/tambah_harian_spv'); ?>" class="btn btn-success btn-success"><i class="fa fa-plus"></i> Tambah</a>
						<a href="<?php echo site_url('harian_spv/signHarianSPV'); ?>" class="btn btn-success btn-success"><i class="fa fa-thumbs-o-up"></i> Sign</a>
					<?php } ?>
					

				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="3%">Author</th>
								<th width="3%">Pelaporan</th>
								<th width="10%">Data</th>
								<th width="10%">Tindak Lanjut</th>
								<th width="5%">Aksi</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($harian_spv as $list){
					?>
						<tr>
							<td>
							<?php 
							foreach($user as $users){
								$checked = "";
								$id_pelapor = $list['author'];
									if ($users['id_user']==$id_pelapor){
										echo $users['nama_lengkap'].", ";
									}
							}
						
							?>
							</td>
							<td><?php echo $list['waktu_lapor']?> Oleh <?php 
							foreach($user as $users){
								$checked = "";
								$id_pelapor = explode(",",$list['id_pelapor']);
								$id_pelapor = preg_replace('/\s+/', '', $id_pelapor);

								foreach($id_pelapor as $id_pelapors){
									if ($users['id_user']==$id_pelapors){
										echo $users['nama_lengkap'].", ";
									}
								}
							}
						
							?></td>
							<td><?php echo $list['kejadian']?></td>
							<td><?php echo $list['tindak_lanjut']?></td>
							
							

							<td>
							<?php //if(($id["id_role"]) ==3) { ?>
							<a href="<?php echo site_url('harian_spv/edit_harian_spv/'.$list['id_harian_spv']); ?>" class="btn detail_icon btn-xs btn-danger btn_edit_harian_spv" data-toggle="tooltip" data-original-title="Edit Harian spv"><i class="fa fa-edit"></i></a> 
							<a href="<?php echo site_url('harian_spv/hapus/'.$list['id_harian_spv']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_harian_spv" data-toggle="tooltip" data-original-title="Delete harian_spv"><i class="fa fa-trash-o"></i></a> 
							<?php //} ?>
							
							
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
                Apakah Anda Yakin Akan Menghapus Harian SPV?
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
			"aaSorting": [[1, 'desc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [3] }, 
                { "bSearchable": false, "aTargets": [3] }],
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



$('.btn_delete_harian_spv').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>
