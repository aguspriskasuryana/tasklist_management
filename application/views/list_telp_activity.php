<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('telp_activity/tambah_telp_activity'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 

					*Untuk data UPS yang lebih lawas bisa menggunakan export excel
					<form id="changetanggal" method="post" action="<?php echo site_url('telp_activity/get_list_telp_activity'); ?>"  class="panel-body">
						<div class="tab-pane fade active in" id="tanggal">
							<div class="col-sm-2">
							
								<table>
									<tr>
										<td>
										<input class="input-sm input-s form-control tgl" size="16" type="text" data-date-format="yyyy" data-required="true" value="<?php echo $tgl ?>" name="tgl">
										</td>
										<td>
										<button type="submit" class="btn btn-default" data-dismiss="modal">search</button> 
										</td>
									</tr>
								</table>

							</div>

						</div>
					</form>

				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="4%">Tanggal</th>
								<th width="10%">nama Pemohon</th>
								<th width="5%">No Pesawat</th>
								<th width="10%">Asal Penelpon</th>
								<th width="10%">Nama dituju</th>
								<th width="10%">Instansi</th>
								<th width="5%">No Tujuan</th>
								<th width="5%">Keperluan</th>
								<th width="5%">Izin</th>
								<th width="5%">Status</th>
								<th width="5%">Jam</th>
								<th width="5%">Keterangan</th>
								<th width="5%">M_K</th>
								<th width="5%">Aksi</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($telp_activity as $list){
						
					?>
						<tr>
							<td><?php echo $list['tanggal']?></td>
							<td><?php echo $list['nama_pemohon']?></td>
							<td><?php echo $list['no_pesawat']?></td>
							<td><?php echo $list['asal_penelpon']?></td>
							<td><?php echo $list['nama_dituju']?></td>
							<td><?php echo $list['instansi']?></td>
							<td><?php echo $list['no_tlpn_tujuan']?></td>
							<td><?php echo $list['keperluan']?></td>
							<td><?php echo $list['izin']?></td>
							<td><?php echo $list['status']?></td>
							<td><?php echo $list['jam']?></td>
							<td><?php echo $list['keterangan']?></td>
							<td><?php echo $list['M_K']?></td>

							<td>
							<a href="<?php echo site_url('telp_activity/edit_telp_activity/'.$list['id_telp_activity']); ?>" class="btn detail_icon btn-xs btn-danger btn_edit" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
							<a href="<?php echo site_url('telp_activity/hapus/'.$list['id_telp_activity']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
							
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
$('.tgl').datepicker();

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
