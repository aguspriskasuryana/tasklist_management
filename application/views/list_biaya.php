<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('biaya/tambah_biaya'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
					<a href="<?php echo site_url('biaya/rka'); ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i> RKA</a>
				
				</header>
				<header>
					<form id="changetanggal" method="post" target="_blank" action="<?php echo site_url('biaya/get_list_biaya_excel'); ?>"  class="panel-body">
						<div class="tab-pane fade active in" id="tanggal">
							<div class="col-sm-2">	
								<table>
									<tr>
										<td>
											<input class="input-sm input-s form-control tgl" size="16" type="text" data-date-format="yyyy-mm" data-required="true" value="<?php echo $tanggal ?>" name="tgl">
										</td>
										<td>
										<button type="submit" class="btn btn-default" data-dismiss="modal"><i class="fa fa-file-text-o"></i> Excel</button>
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
								<th width="10%">Nama </th>
								<th width="10%">No_reks</th>
								<th width="5%">Keterangans</th>
								<th width="10%">Jumlah</th>
								<th width="10%">Tanggal</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($biaya as $list){
						
					?>
						<tr>
							<td><?php echo $list['nama_gl']?></td>
							<td><?php echo $list['no_reks']?></td>
							<td><?php echo $list['keterangans']?></td>
							<td><?php echo $list['jumlah']?></td>
							<td><?php echo $list['tanggal']?></td>

							<td>
							<a href="<?php echo site_url('biaya/edit_biaya/'.$list['id_biaya']); ?>" class="btn detail_icon btn-xs btn-info btn_edit" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
							<a href="<?php echo site_url('biaya/hapus/'.$list['id_biaya']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
							
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
			"iDisplayLength": 30,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[4, 'desc']],
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
