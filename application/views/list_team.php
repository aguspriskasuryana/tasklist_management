<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('team/tambah_team'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				
				</header>
				<div class="table-responsive">
					<table class="table table-striped m-b-none" data-ride="datatables">
						<thead>
							<tr>
								<th width="10%">Nama </th>
								<th width="5%">Keterangan</th>
								<th width="5%">Jabatan</th>
								<th width="5%">Aksi</th>
							</tr>
					</thead>
						<tbody>
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
                Apakah Anda Yakin Akan Menghapus Team?
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
	$('[data-ride="datatables"]').each(function() {
		var oTable = $(this).dataTable( {
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"sAjaxSource": "<?php echo site_url('team/get_list_team'); ?>",
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aoColumns": [
				{ "mData": 'nama' },
				{ "mData": 'keterangan' },
				{ "mData": 'jabatan' },
				{ "mData": 'detail', "bSearchable": false, "bSortable": false}
			
			],
			//"aaSorting": [[1, 'asc']],
			//"fnServerData": fnDataTablesPipeline,
			//"bStateSave": true,
			//"bDeferRender": true,
			"fnDrawCallback": function() {
				$('.btn-delete-team').click(function(e) {
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

</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>
