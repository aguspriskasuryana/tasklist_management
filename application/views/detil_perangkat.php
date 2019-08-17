<section class="scrollable wrapper">
	
</section>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Konfirmasi Hapus!
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Akan Menghapus Data?
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
			"bServerSide": true,
			"sServerMethod": "POST",
			"sAjaxSource": "<?php echo site_url('pendaftar/get_data_pendaftar'); ?>",
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aoColumns": [
				{ "mData": 'no_urut' },
				{ "mData": 'tanggal_daftar' },
				{ "mData": 'nama_lengkap' },
				{ "mData": 'jenis_kelamin' },
				{ "mData": 'kabupaten' },
				{ "mData": 'aksi', "bSearchable": false, "bSortable": false},
			
			],
			"aaSorting": [[1, 'asc']],
			"fnServerData": fnDataTablesPipeline,
			"bStateSave": true,
			"bDeferRender": true,
			"fnDrawCallback": function() {
				$('.btn-delete-pj').click(function(e) {
					e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
					//console.log(c);
					//if(c) window.location.href = $(e.delegateTarget).attr('href');
				});
				$('[data-toggle="ajaxModal"]').on('click',
				  function(e) {
					e.preventDefault();
					if($(this).attr('data-cache') == 'true') {
						$.ajaxSetup ({cache: true});
					} else {
						$.ajaxSetup ({cache: false});
					}
					$('#ajaxModal').remove();
					var $this = $(this)
					  , $remote = $this.data('remote') || $this.attr('href')
					  , $modal = $('<div class="modal" id="ajaxModal"><div class="modal-body"></div></div>');
					$('body').append($modal);
					$modal.modal({
						backdrop: 'static',
						keyboard: false
						});
					$modal.load($remote);
				  }
				);
				$('[data-toggle="tooltip"]').tooltip();
			},
			"fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
				$(nRow).children('td:nth-child(6)').addClass('text-center');
			}
		} );
	});
});

</script>
<script type="text/javascript">
	$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
	
	function ekspor()
	{
		$.post('<?php echo base_url(); ?>index.php/pendaftar/ekspor', {	
				
				}, function(data){
					
					}, 'json');
	}
});
</script>
