<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('form_storage/tambah_form_storage'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Barang Baru</a>
					<a href="<?php echo site_url('form_storage/get_list_form_storage'); ?>" class="btn btn-success btn-sm"><i class="fa fa-list"></i>Storage</a>
					
					<a href="<?php echo site_url('form_storage/get_list_form_storage_keluar'); ?>" class="btn btn-success btn-sm"><i class="fa fa-out"></i> Keluar Storage</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="4%">Nama barang</th>
								<th width="3%">Room</th>
								<th width="2%">No Rak</th>
								<th width="5%">SN</th>
								<th width="2%">Jml Masuk</th>
								<th width="2%">Tgl Masuk</th>
								<th width="2%">Tanggal Buat</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($form_storage as $list){
						
					?>
						<tr>
							
							<td><?php echo $list['nama_barang']?></td>
							<td><?php echo $list['nama_room']?></td>
							<td><?php echo $list['no_rak']?></td>
							<td><?php echo $list['sn_barang']?></td>
							<td><?php echo $list['jml_masuk']?></td>
							<td><?php echo $list['tgl_masuk']?></td>
							<td><?php echo $list['datenow']?></td>
							
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
			"iDisplayLength": 50,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[5, 'desc']],
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
