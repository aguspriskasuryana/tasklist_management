<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('ganti_jadwal_req/tambah_ganti_jadwal_req'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				
				</header>
				<div class="table-responsive">
					<table class="table table-striped m-b-none" data-ride="datatables">
						<thead>
							<tr>
								<th width="10%">task</th>
								<th width="10%">user</th>
								<th width="5%">jam awal</th>
								<th width="5%">jam baru</th>
								<th width="10%">tanggal lama</th>
								<th width="10%">tanggal baru</th>
								<th width="10%">date_req</th>
								<th width="5%">Paraf</th>
								<th width="5%">Time Paraf</th>
								<th width="10%">Aksi</th>
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
<div class="modal fade" id="confirm-delete" tabindex="-1" ganti_jadwal_req="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Konfirmasi Hapus!
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Akan Menghapus ?
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
			"sAjaxSource": "<?php echo site_url('ganti_jadwal_req/get_list_ganti_jadwal_req'); ?>",
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aoColumns": [

				{ "mData": 'aktifitas' },
				{ "mData": 'nama_lengkap' },
				{ "mData": 'jam_awal' },
				{ "mData": 'jam_baru' },
				{ "mData": 'tanggal_lama' },
				{ "mData": 'tanggal_baru' },
				{ "mData": 'date_req' },
				{ "mData": 'nama_paraf' },
				{ "mData": 'time_paraf' },
				{ "mData": 'detail', "bSearchable": false, "bSortable": false}
			
			],
			//"aaSorting": [[1, 'asc']],
			//"fnServerData": fnDataTablesPipeline,
			//"bStateSave": true,
			//"bDeferRender": true,
			"fnDrawCallback": function() {
				$('.btn-delete-ganti_jadwal_req').click(function(e) {
					e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus ganti jadwal req ini, Lanjutkan?').set('ada', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
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
