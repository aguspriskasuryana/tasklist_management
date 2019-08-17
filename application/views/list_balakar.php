<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					
				<h>Tim Balakar Hari ini Shift
						<?php 
						$shiftcek = date('2018-01-01 G:i'); 

						$jam0730 = date('2018-01-01 7:30');
						$jam0959 = date('2018-01-01 9:59');
						$jam1000 = date('2018-01-01 10:00');
						$jam1600 = date('2018-01-01 16:00');
						$jam2300 = date('2018-01-01 23:00');

						if (($shiftcek > $jam0730) && ($shiftcek <= $jam0959)){
							echo "1";
						} else if (($shiftcek >= $jam1000) && ($shiftcek < $jam1600)){
							echo "1";
						} else if (($shiftcek >= $jam1600) && ($shiftcek < $jam2300)) {
							echo "2";
						} else {
							echo "3";
						}

						?></h>

				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">Jabatan</th>
								<th width="1%"></th>
								<th width="5%">Nama</th>
								<th width="5%">Aksi</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($balakar as $list){
						
					?>
						<tr>
							<td><?php echo $list['jabatan']?></td>
							<td>:</td>
							<td><?php echo $list['nama']?></td>
							<td>
							<a href="<?php echo site_url('balakar/edit_balakar/'.$list['id']); ?>" class="btn detail_icon btn-xs btn-info btn_edit_balakar" data-toggle="tooltip" data-original-title="Edit "><i class="fa fa-edit"></i></a>
																				
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
			"aaSorting": [[2, 'desc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [2] }, 
                { "bSearchable": false, "aTargets": [4] }],
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



$('.btn_delete_balakar').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>
