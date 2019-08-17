<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<form id="changetanggal"  name="changetanggal" method="post" action="<?php echo base_url('index.php/task/list_report'); ?>"  class="panel-body">
				<div class="tab-pane fade active in" id="tanggal">
					<div class="col-sm-2">						
						<table>
							<tr>
								<td>
								
								<input class="input-sm input-s form-control tgl" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" value="<?php echo $tanggalselect ?>" name="tgl">
								</td>
								
								
								<select name="id_team" id="id_team" class="form-control m-b">
									<option value="" >Semua Team</option>
									<?php foreach($team as $teams){
									if ($teams['id_team'] == $query['id_team']){
									?>
										<option value="<?php echo $teams['id_team'];?>" selected><?php echo $teams['nama']?></option>
									<?php
									} else {
									?>
										<option value="<?php echo $teams['id_team'];?>" ><?php echo $teams['nama']?></option>
									<?php 
										}
									}

									?>
			                        </select>
								

								
								<td>
								<a href="" class="btn btn-sm btn-primary" onclick="document.changetanggal.action = '<?php echo base_url('index.php/task/list_report'); ?>'; document.changetanggal.method='post'; document.changetanggal.submit(); return false;">Search</a>
								</td>
								<td>
								<a href="" class="btn btn-sm btn-primary" onclick="document.changetanggal.action = '<?php echo base_url('index.php/task/list_report_excel'); ?>'; document.changetanggal.method='post'; document.changetanggal.submit(); return false;">Excel</a>
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
								<th width="1%">Team</th>
								<th width="5%">Aktifitas</th>
								<th width="1%">Jam</th>
								<th width="1%">Target</th>
								<th width="5%">Pelaksanaan</th>
								<th width="1%">Paraf PIC</th>
								<th width="1%">Paraf BRI</th>
								<th width="5%">Keterangan</th>
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

							<td><?php echo $list['team']?></td>
							<td><?php echo $list['aktifitas'];?></td>
							<td><?php echo $list['jam']?></td>
							<td>
								<font color="red">
									<?php 
									$newtimestamp = strtotime($list['tanggal'].' '.$list['jam'].' + '.$list['duration'].' minute');
									if ($list['jam'] == ""){
										echo "";
									} else {
										echo date('H:i:s', $newtimestamp);
									}
									
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
								</td>
								<td>
								</td>
								<?php
									}else{
								?>
										<td>
										<p><font color="orange">Task Belum Diparaf SPV BRI
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
										
											?>
										!</font></p>
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


$('.tgl').datepicker();
});

</script>
<script>
$(document).ready(function() {
    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 100,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[2, 'asc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [3] }, 
                { "bSearchable": false, "aTargets": [3] }],
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
