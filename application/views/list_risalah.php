<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('risalah/tambah_risalah'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				
				</header>
				<div class="table-responsive">
					<table class="table table-striped m-b-none" data-ride="datatables">
						<thead>
							<tr>
								<th width="3%">Tanggal</th>
								<th width="5%">Judul</th>
								
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

<script>

$(document).ready(function() {
	$('[data-ride="datatables"]').each(function() {
		var oTable = $(this).dataTable( {
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"sAjaxSource": "<?php echo site_url('risalah/get_list_risalah'); ?>",
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aoColumns": [
				{ "mData": 'tanggal' },
				{ "mData": 'judul' },
				{ "mData": 'detail', "bSearchable": false, "bSortable": false}
			
			],
			//"aaSorting": [[1, 'asc']],
			//"fnServerData": fnDataTablesPipeline,
			//"bStateSave": true,
			//"bDeferRender": true,
			"fnDrawCallback": function() {
				$('.btn-delete-risalah').click(function(e) {
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