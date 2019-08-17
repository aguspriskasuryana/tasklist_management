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
								<th width="2%">Mak</th>
								<th width="5%">Pelaksanaan</th>
								<th width="5%">Paraf Supervisor BKS</th>
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
							<td><?php echo $list['aktifitas']?></td>
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
								<p>Task Belum Dilaksanakan</p>
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
								</p>
							</td>
							<td>
								<p id="<?php echo $list['id_act']?>" style="display:none"><?php echo $list['id_act']?></p>
								<?php
									if($list['paraf_pic'] == 1){
								?>
								<div title="task sudah di paraf!"><a href="#" data-toggle="class" class="btn btn-white btn-xs active" disabled title="task sudah dilaksanakan!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a></div>
								<?php 
								}else{
								?>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs paraf" title="Klik untuk paraf!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<?php
								}
								?>
							</td>
							<td>
							</td>
								<?php
									} else{
								?>
								<td>
								<p>Task Tidak Dilaksanakan!</p>
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
		$.getJSON('<?php echo site_url('task/input_paraf/1'); ?>', {id_act:a});		
		$(this).next().remove();
	}
});
</script>