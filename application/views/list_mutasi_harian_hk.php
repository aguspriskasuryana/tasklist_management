<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('mutasi_harian_hk/tambah_mutasi_harian_hk'); ?>" class="btn btn-success btn-success"><i class="fa fa-plus"></i> Tambah</a>
					<a href="<?php echo site_url('mutasi_harian_hk/signMutasi_harian_hk'); ?>" class="btn btn-success btn-success"><i class="fa fa-thumbs-o-up"></i> Sign</a>

				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="10%">Personal</th>
								<th width="3%">Date Created</th>
								<th width="20%">Team</th>
								<th width="20%">Kegiatan</th>
								<th width="3%">lokasi</th>
								<th width="3%">Jam Awal</th>
								<th width="3%">Jam Akhir</th>
								<th width="3%">Tanggal</th>
								<th width="20%">Keterangan</th>
								<th width="15%">Aksi</th>
							</tr>
						</thead>
						<tbody>
					<?php 

					foreach($mutasi_harian_hk as $list){
					?>
						<tr>
							<td>
							<?php 
							foreach($user as $users){
								$checked = "";
								$indeks_tamu = explode(",",$list['indeks_tamu']);
								$indeks_tamu = preg_replace('/\s+/', '', $indeks_tamu);

								foreach($indeks_tamu as $indeks_tamus){
									if ($users['id_user']==$indeks_tamus){
										echo $users['nama_lengkap'].", ";
									}
								}
							}
						
							?>
							</td>
							<td><?php echo $list['date_created']?></td>
							<td>
							<?php 
							foreach($sub_team as $sub_teams){
								$checked = "";
								$subteam = explode(",",$list['id_sub_team']);
								$subteam = preg_replace('/\s+/', '', $subteam);

								foreach($subteam as $subteams){
									if ($sub_teams['id_sub_team']==$subteams){
										echo $sub_teams['sub_team_name'].", ";
									}
								}
							}
						
							?>
							</td>
							<td><?php echo $list['kegiatan']?></td>
							<td><?php echo $list['lokasi']?></td>
							<td><?php echo $list['jam_awal']?></td>
							<td><?php echo $list['jam_akhir']?></td>
							<td><?php echo $list['tanggal']?></td>
							<td><?php echo $list['keterangan']?></td>
							
							<td>
							<?php //if(($id["id_role"]) ==3) { ?>
							<a href="<?php echo site_url('mutasi_harian_hk/edit_mutasi_harian_hk/'.$list['id_mutasi_harian_hk']); ?>" class="btn detail_icon btn-xs btn-danger btn_edit_mutasi_harian_hk" data-toggle="tooltip" data-original-title="Edit Harian spv"><i class="fa fa-edit"></i></a> 
							<a href="<?php echo site_url('mutasi_harian_hk/hapus/'.$list['id_mutasi_harian_hk']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_mutasi_harian_hk" data-toggle="tooltip" data-original-title="Delete mutasi_harian_hk"><i class="fa fa-trash-o"></i></a> 
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
                Apakah Anda Yakin Akan Menghapus Mutasi?
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



$('.btn_delete_mutasi_harian_hk').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>
