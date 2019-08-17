<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('task/tambah_task'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">Task</th>
								<th width="3%">Tim</th>
								<th width="5%">Tanggal</th>
								<th width="5%">Jam</th>
								<th width="5%">Duration</th>
								<th width="5%">Form</th>
								<th width="5%">Aksi</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($task as $list){
						
					?>
						<tr>
							<td><?php echo $list['aktifitas']?></td>
							<td><?php echo $list['nama']?></td>
							<td><?php 
							$tgl = $list['tanggals'];
							$stringtgl = preg_replace('/\s+/', '', $tgl);
							if ($stringtgl == "*,"){
								echo "Setiap Hari";
							} elseif($stringtgl == "1,"){
								echo "Senin-Jumat";
							} elseif($stringtgl =="") {
								echo "Adhoc by date";
							} else {
								echo $tgl;
							}
							

							?>
								
							</td>

							<td><?php 
							$jam = $list['jam'];
							$stringjam = preg_replace('/\s+/', '', $jam);
							if ($stringjam == ""){
								echo "Adhoc";
							} else {
								echo $jam;
							} 
							

							?>
								
							</td>
							<td><?php echo $list['duration']?> menit</td>

							<td><?php echo $list['form']?></td>

							<td>
							<?php if(($id["id_role"]) == 3 || ($id["id_role"]) == 4 || ($id["id_role"]) == 5||($id["id_role"]) == 0|| ($id["id_role"]) == 7) { ?>
							<a href="<?php echo site_url('task/edit_task/'.$list['id_task']); ?>" class="btn detail_icon btn-xs btn-info btn_edit_task" data-toggle="tooltip" data-original-title="Edit Task"><i class="fa fa-edit"></i></a> 
							<a href="<?php echo site_url('task/hapus_task/'.$list['id_task']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_task" data-toggle="tooltip" data-original-title="Delete Task"><i class="fa fa-trash-o"></i></a> 
							<?php } ?>
							<?php 

							$links = explode(",",$list['bpo']);
							//var_dump($jam);
							foreach($links as $link){
								if($link != ""){
								?>
								<a target="blank" href="<?php echo "../../BPO/".$list['nama']."/".$link ?>"><i class="fa fa-download"></i></a>
								<?php
								}
							}
							?>
							
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
			"aaSorting": [[1, 'asc']],
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



$('.btn_delete_task').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>
