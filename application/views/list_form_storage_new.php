<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<?php	
					 //if ($id['id_role'] == 0 || $id['id_role'] == 4 || $id['id_role'] == 3 || $id['id_role'] == 2 || $id['id_role'] == 1 || $id['id_role'] == 8) {	  ?>
					<a href="<?php echo site_url('form_storage_new/tambah_form_storage_new'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Jenis Barang Baru</a>
					<a href="<?php echo site_url('form_storage_new/get_list_form_storage_new2'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Scan</a>
					<?php //} ?>
					
					<a href="<?php echo site_url('form_storage_new/get_list_form_storage_new_masuk'); ?>" class="btn btn-success btn-sm"><i class="fa fa-out"></i> Masuk Storage</a>
					<a href="<?php echo site_url('form_storage_new/get_list_form_storage_new_keluar'); ?>" class="btn btn-success btn-sm"><i class="fa fa-out"></i> Keluar Storage</a>

					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="4%">Id Status</th>
								<th width="1%">No Rak</th>
								<th width="2%">No Dus</th>
								<th width="5%">nama Barang</th>
								<th width="1%">Jumlah Saat ini</th>
								<th width="5%">Merk</th>
								<th width="2%">Owner</th>
								<th width="2%">Tanggal Buat</th>
								<!--<th width="4%">img</th>-->
								<th width="1%">Aksi</th>
								<th width="1%">Mutasi</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($form_storage_new as $list){
					?>
						<tr>
							
							<td><?php echo $list['nama_room']?></td>
							<td><?php echo $list['no_rak']?></td>
							<td><?php echo $list['no_dus']?></td>
							<td><?php echo $list['nama_barang']?></td>
							<td><?php echo $list['jumlah_akhir']?></td>
							<td><?php echo $list['merk']?></td>
							<td><?php echo $list['owner']?></td>
							<td><?php echo $list['time_now']?></td>
							<!--<td><img style="width: 100px;" src="<?php echo base_url().'asset/images/'.$list['qr_code'];?>"></td>-->

							<td>
							<a href="<?php echo site_url('form_storage_new/qrcodegenerator/'.$list['id_form_storage_new']); ?>" target="_blank" class="btn detail_icon btn-xs btn-info btn_edit" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-download"></i></a>
							<a href="<?php echo site_url('form_storage_new/edit_form_storage_new/'.$list['id_form_storage_new']); ?>" class="btn detail_icon btn-xs btn-info btn_edit" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-edit"></i></a>
							<a href="<?php echo site_url('form_storage_new/hapus/'.$list['id_form_storage_new']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
							
							</td>
							<td>
							<a href="<?php echo site_url('form_storage_new/get_list_form_storage_new_history/'.$list['id_form_storage_new']); ?>" class="btn detail_icon btn-xs btn_arrows-h btn_arrows-h" data-toggle="tooltip" data-original-title="list"><i class="fa fa-list"></i></a>
							<a href="<?php echo site_url('form_storage_new/edit_form_storage_new_masuk/'.$list['id_form_storage_new']); ?>" class="btn detail_icon btn-xs btn-plus btn_edit" data-toggle="tooltip" data-original-title="Barang Masuk"><i class="fa fa-plus"></i></a>

							<a href="<?php echo site_url('form_storage_new/edit_form_storage_new_keluar/'.$list['id_form_storage_new']); ?>" class="btn detail_icon btn-xs btn-minus btn_edit" data-toggle="tooltip" data-original-title="barang keluar"><i class="fa fa-minus"></i></a>
							
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
			"aaSorting": [[7, 'desc']],
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
