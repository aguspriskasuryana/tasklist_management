<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
			<header class="panel-heading">
				<form id="changetanggal" method="post" action="<?php echo base_url('index.php/task/paraf_kabag'); ?>"  class="panel-body">
				<div class="tab-pane fade active in" id="tanggal">
					<div class="col-sm-2">
					
						
						
						<table>
							<tr>
								<td>
								<select onchange="this.form.submit()" id="btn_tanggal_new" name="btn_tanggal_new">
								<option>Pilih Tanggal</option>
								<?php 
								foreach($tanggal as $tanggals){ 
								?>
								<?php if ($tanggals['tanggal'] == $tanggalselect){?>
								<option value="<?php echo $tanggals['tanggal'];?>" selected><?php echo date('d-m-Y',strtotime($tanggals['tanggal']));?></option>
								<?php } else { ?>
								<option value="<?php echo $tanggals['tanggal'];?>"><?php echo date('d-m-Y',strtotime($tanggals['tanggal']));?></option>
								<?php } ?>
								<?php 
								}
								?>
								</select>
								</td>
								<td>

								<?php 
								$id = $this->session->userdata('user_data');
								if ($id['id_role'] != 8){ ?>
								<?php if (!($statusApp)){ ?>
								<p id="btn_tgl" style="display:none"><?php echo $tanggalselect?></p>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs btn-approve" title="Klik untuk paraf!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								
								<?php }else{?>
								<a href="#" class="btn btn-green btn-xs " title="Masih ada task belum tuntas!"><i class="fa fa-save text-muted text"></i>  <i class="fa fa-save text-active disabled"></i><font color="red"><?php echo count($statusApp);?> Task Belum Tuntas</font></a>
								<?php } }?>
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
								<th width="5%">Aktifitas</th>
								<th width="1%">Jam</th>
								<th width="1%">Mak</th>
								<th width="5%">Pelaksanaan</th>
								<th width="1%">Paraf PIC</th>
								<th width="1%">Paraf BRI</th>
								<th width="5%">Keterangan</th>
								<th width="1%">Reset</th>
								<?php 
								$id = $this->session->userdata('user_data');
								?>
								
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($activity_list as $list){
					?>
						<tr>
							<td><?php echo $list['team'];?> : <?php echo $list['aktifitas'];?></td>
							<td><?php echo $list['jam']?></td>
							<td>
								<font color="red">
									<?php 
									$newtimestamp = strtotime($list['tanggal'].' '.$list['jam'].' + '.$list['duration'].' minute');
									echo date('H:i:s', $newtimestamp);
									?>	
								</font>
							</td>
								<?php 
								if($list['pelaksanaan'] == 0){
								?>
							<td>
								<p><font color="red">Task Belum Dilaksanakan</font></p>
							</td>
							<td>
							</td>
							<td>
							</td>
							<td>
							</td>
								<?php 
								}else{
									if($list['pelaksanaan'] == 1){
								?>
							<td>
								<p><font color="green">Task selesai pada <?php echo $list['last_modified'] ?> </font> 
								
								<?php
								$jamx= $list['jam']; 
								if ($jamx != ""){
									$newtimestamp = strtotime($list['tanggal'].' '.$list['jam'].' + '.$list['duration'].' minute');
								    date('Y-m-d H:i:s', $newtimestamp);
								    $starttime = $list['tanggal']." ".$list['jam'];
									$from_time = strtotime($starttime);
									$to_time = strtotime($list['last_modified']);
									$selisih = round(abs($to_time - $from_time) / 60,0);

									$real = round(($to_time - $from_time) / 60,0);
									//echo $real.'minute';
									if ($real < 0) {
										echo '<font color="blue">  Lebih awal : '.$selisih.' menit</font>';
									} elseif ($selisih > $list['duration']) {
										echo '<font color="red">  selisih : '.($selisih-$list['duration']).' menit</font>';
									} else {
										echo '<font color="green">  selisih : '.$selisih.' menit</font>';
									}
								}
								
								?> 
								oleh 
								<?php 
									foreach($user as $users){
										$checked = "";
										$id_pelaksana = explode(",",$list['id_user']);
										$id_pelaksana = preg_replace('/\s+/', '', $id_pelaksana);

										foreach($id_pelaksana as $id_pelaksanas){
											if ($users['id_user']==$id_pelaksanas){
												echo $users['nama_lengkap'].", ";
											}
										}
									}
								
									?>
								</p>
							</td>
								<?php
									if($list['paraf_pic'] == 1){
								?>
								<td>
								<p id="<?php echo $list['id_act']?>" style="display:none"><?php echo $list['id_act']?></p>
								<div title="task sudah di paraf PIC!"><a href="#" data-toggle="class" class="btn btn-white btn-xs active" disabled ><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
									<?php 
									foreach($user as $users){
										$checked = "";
										$id_assigner = explode(",",$list['id_paraf_pic']);
										$id_assigner = preg_replace('/\s+/', '', $id_assigner);

										foreach($id_assigner as $id_assigners){
											if ($users['id_user']==$id_assigners){
												echo $users['nama_lengkap'].", ";
											}
										}
									}
								
									?>
								</div>
								</td>
								<?php
								$id_user = explode(',',$list['id_paraf_supervisor']);
								$status = 0;
								foreach($id_user as $id_user){
									if($id_user == $id['id_user']){
										$status = 1;
									}
								}
									// diganti if($status == 1){
								if($list['paraf_supervisor'] == 1){
								?>
								<td>
								<div title="task sudah di paraf Supervisor!"><a href="#" data-toggle="class" class="btn btn-white btn-xs active" disabled ><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
									<?php 
									foreach($user as $users){
										$checked = "";
										$id_assigner = explode(",",$list['id_paraf_supervisor']);
										$id_assigner = preg_replace('/\s+/', '', $id_assigner);

										foreach($id_assigner as $id_assigners){
											if ($users['id_user']==$id_assigners){
												echo $users['nama_lengkap'].", ";
											}
										}
									}
								
									?>
								</div>
								</td>
								<td>
								</td>
								<?php
									}else{
								?>
										<td>
										<p><font color="orange">Task Belum Diparaf SPV BRI -
							<?php 
							foreach($user as $users){
								$checked = "";
								$id_assigner = explode(",",$list['assigner']);
								$id_assigner = preg_replace('/\s+/', '', $id_assigner);

								foreach($id_assigner as $id_assigners){
									if ($users['id_user']==$id_assigners){
										echo $users['nama_lengkap'].", ";
									}
								}
							}
						
							?>!</font></p>
										</td>
										<td>
										</td>
								<?php
									}
								
								}else{
								?>
								<td>
								<p><font color="orange">Task Belum Diparaf PIC!</font></p>
								</td>
								<td>
								</td>
								<td>
								</td>
								<?php
								}
								?>
								<?php
									} else{
								?>
								<td>
								<p><font color="green">Task Tidak Dilaksanakan!</font></p>
								</td>
								<td>
								</td>
								<td>
								</td>
								<td>
								<?php echo $list['keterangan']?>
								</td>
								<?php
									}
								}
								?>
								<td>
										
										<a href="<?php echo site_url('task/refresh_task_activity/'.$list['id_act']); ?>" class="btn detail_icon btn-xs btn-refresh btn_refresh" data-toggle="tooltip" data-original-title="Refresh Task"><i class="fa fa-refresh"></i></a>
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


	<div class="modal fade" id="confirm-refresh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Konfirmasi reset!
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Akan reset Task?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Reset</a>
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
			"iDisplayLength": 500,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[4, 'desc'],[1, 'asc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [2,3,4,5,6] }, 
                { "bSearchable": false, "aTargets": [2,3,4,5,6] }],
			//"fnServerData": fnDataTablesPipeline,
			//"bStateSave": true,
			//"bDeferRender": true,
			"fnDrawCallback": function() {
				$('.btn-refresh').click(function(e) {
					e.preventDefault();
					var c = alertify.confirm('Anda akan reset data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
					//console.log(c);
					//if(c) window.location.href = $(e.delegateTarget).attr('href');
				});

			
				$('[data-toggle="tooltip"]').tooltip();
			}
		});
});



$('.btn-approve').click(function(e){
	
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('task/approve'); ?>', {tanggal:a});		
		$(this).next().remove();
	
});

</script>
<script type="text/javascript">
$('#confirm-refresh').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>