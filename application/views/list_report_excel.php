<?php $id = $this->session->userdata('user_data'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=report-".$tanggalselect."-".$id_team.".xls");

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					REKAP TASK LIST HARIAN <?php echo $tanggalselect;?>
				
				</header>
				
				<div class="table-responsive">
					<table id="example" border="1" class="table table-striped m-b-none" data-ride="datatables">
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
							<td>
								<p><?php echo $list['team']?></p>
							</td>
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
					<table>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>							
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td width="5%">Tabanan, </td>							
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>							
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>							
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>							
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td width="5%">PT. Bank Rakyat Indonesia (Persero), Tbk</td>
								<td></td>						
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td width="5%">Divisi Operasional Teknologi Informasi</td>
								<td></td>						
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td width="5%">Bagian Teknologi, Informasi dan Komunikasi</td>
								<td></td>						
							</tr>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>

</section>


<script language="JavaScript">
    $(document).ready(function() {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {
          
            
          	$.post('<?php echo site_url('form/modalformlvmdp'); ?>',
                    {id:$(this).data('form_id')},
                    function(html){
                        $(".fetched-data").html(html);
                    }   
            );
		  
          
        })
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
			"aaSorting": [[2, 'desc']],
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



</script>