<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
				<p>Aktifitas <?php if (!empty($activity_list)) {echo date("d-m-Y",strtotime($activity_list[0]['tanggal']) );}?></p>
				</header>
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">Aktifitas</th>
								<th width="5%">Jam</th>
								<th width="5%">Pelaksanaan</th>
								<th width="5%">Paraf Supervisor BRI</th>
								<th width="5%">Keterangan</th>
								<?php 
								$id = $this->session->userdata('user_data');
								?>

								<th width="5%">BPO</th>
								
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($activity_list as $list){


						if($id['id_team'] == $list['id_team']){
					?>
						<tr>
							<td><?php echo $list['aktifitas']?></td>
							<td><?php echo $list['jam']?></td>
								<?php 
								if($list['pelaksanaan'] == 0){
								?>
							<td>
								<p id="<?php echo $list['id_act']?>" style="display:none"><?php echo $list['id_act']?></p>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_task" title="Klik apabila sudah melaksanakan task!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<a href="#" data-toggle="modal" data-target="#modal_tidak_kerja" class="btn btn-white btn-xs tidak-kerja" title="Klik apabila tidak melaksanakan task!"><i class="fa fa-exclamation-triangle text-muted text"></i><i class="fa fa-exclamation-triangle text-danger text-active"></i></a>
							</td>
							<td>
							</td>
								<?php 
								}else{
									if($list['pelaksanaan'] == 1){
								?>
							<td>
								<p>Task sudah Dilaksanakan pada pukul <?php echo date('h:i:sa',strtotime($list['last_modified']))?></p>
							</td>
								<?php
								$id_user = explode(',',$list['id_paraf_supervisor']);
								$status = 0;
								foreach($id_user as $id_user){
									if($id_user == $id['id_user']){
										$status = 1;
									}
								}
								if($status == 1){
								?>
								<td>
								Task sudah diparaf!
								</td>
								<td>
								</td>
								<?php
								}else{
									?>
									<td>
									<p id="<?php echo $list['id_act']?>" style="display:none"><?php echo $list['id_act']?></p>
									<a href="#" data-toggle="class" class="btn btn-white btn-xs paraf" title="Klik untuk paraf!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
									</td>
									<td>
									</td>
									<?php
								
								}
							
									} else{
								?>
								<td>
								<p>Task Tidak Dilaksanakan!</p>
								</td>
								<td>
								<?php echo $list['keterangan']?>
								</td>
								<?php
									}
								}
								?>
							<td><a target="blank" href="<?php echo "../../BPO/".$teamSession['nama']."/".$list['link_bpo']?>" >link</a></td>
						</tr>
							
						
					<?php
				}
					}
					?>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>
<div id="modal_tidak_kerja" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p id="col_id_act" style="display:none">
		</p>
		<textarea style="width: 549px; height: 62px;" placeholder="isikan alasan tidak mengerjakan di sini!"></textarea>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-tidak-kerja">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</section>
<script>
$(document).ready(function() {
    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[1, 'asc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [2,3,4] }, 
                { "bSearchable": false, "aTargets": [2,3,4] }],
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

$('.paraf').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		//alert(a);
		$.getJSON('<?php echo site_url('task/input_paraf/2'); ?>', {id_act:a});		
	}
});

$('.pelaksanaan_task').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('task/input_pelaksanaan/1'); ?>', {id_act:a});		
		$(this).next().remove();
		$(this).parent().next().children('.paraf').attr('disabled',false);
	}
});

$('.tidak-kerja').click(function(e){
	$('#col_id_act').text('');
	var a = $(this).prev().prev().text();
	$('#col_id_act').append(a);
});

$('.btn-tidak-kerja').click(function(e){
	var id = $(this).parent().prev().children('p').text();
	var b = $(this).parent().prev().children('textarea').val();
	//alert(b);
	//alert(id);
	$('[id="'+id+'"]').next().remove();
	$.getJSON('<?php echo site_url('task/input_pelaksanaan/2'); ?>', {id_act:id,alasan:b});
	$('[id="'+id+'"]').next('.tidak-kerja').addClass('active');
	$('[id="'+id+'"]').next('.tidak-kerja').prop('disabled',true);
	$('#modal_tidak_kerja').modal('hide');	
});
</script>