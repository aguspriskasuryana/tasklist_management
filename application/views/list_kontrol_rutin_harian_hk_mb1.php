<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<form action="<?php echo base_url('index.php/kontrol_rutin_harian_hk_mb1/get_list_kontrol_rutin_harian_hk_mb1'); ?>" method="post">
					<select id="tanggal" name="tanggal">
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
					<select name="shift">
						<?php 
						$shift1="";
						$shift2="";
						$shift3="";
						switch ($shiftselect) {
								case 1:
								$shift1="selected";
						            break;
							    case 2:
							    $shift2="selected";
							    	break;
							    case 3:
							    $shift3="selected";
							    	break;
							    }
						?>
						<option value="1" <?php echo $shift1; ?> >Shift 1</option>
						<option value="2" <?php echo $shift2; ?> >Shift 2</option>
						<option value="3" <?php echo $shift3; ?> >Shift 3</option>
                    </select>

					<button type="submit" class="btn btn-sm btn-primary" id="btn_cek"><i class="fa fa-search"></i></button>
					</form>
				</header>

				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">Tanggal</th>
								<th width="5%">Jam</th>
								<th width="5%">Membersihkan meja,telp,komputer, Menyapu R Staf ,R Monitor,R Service, Membersihkan toilet,Mengelap Rak Sepatu  Depan lobby.</th>
								<th width="5%">Membersihkan Pantry Cuci Gelas KotorMenyapu Buang Sampah Membersihkan Toilet Dan Wudhu.Mengelap Rak Sepatu dan sandal depan R OperatorLobby</th>
								<th width="5%">Membersihkan meja,telp,komputer, Menyapu R Staf ,R Monitor,R Service, Membersihkan toilet,Mengelap Rak Sepatu  Depan lobby.</th>
								<th width="5%">Membersihkan Pantry Cuci Gelas KotorMenyapu Buang Sampah Membersihkan Toilet Dan Wudhu.Mengelap Rak Sepatu dan sandal depan R OperatorLobby</th>
								<th width="5%">Kontrol Toilet 1,2 ,3 dan tempat Wudhu Pembuangan Sampah pantry menyapu pel Pos Jeraph ,Buang Sampah </th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($kontrol_rutin_harian_hk_mb1 as $list){
						
					?>
						<tr>
							<td><?php echo $list['tanggal']?></td>
							<td><?php echo $list['jam']?></td>
							<td><?php 
								if($list['lokasi_1'] == 0){
								?>
								<p id="<?php echo $list['id_kontrol_rutin_harian_hk_mb1']?>" style="display:none"><?php echo $list['id_kontrol_rutin_harian_hk_mb1']?></p>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_lokasi_1" title="Klik apabila sudah melaksanakan task!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<?php
								} else {
									foreach($user as $users){
										if ($users['id_user']==$list['lokasi_1']){
											echo $users['nama_lengkap'].", ";
										}
									}
						
								}

							?></td>
							<td><?php 
								if($list['lokasi_2'] == 0){
								?>
								<p id="<?php echo $list['id_kontrol_rutin_harian_hk_mb1']?>" style="display:none"><?php echo $list['id_kontrol_rutin_harian_hk_mb1']?></p>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_lokasi_2" title="Klik apabila sudah melaksanakan task!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<?php
								} else {
									foreach($user as $users){
										if ($users['id_user']==$list['lokasi_2']){
											echo $users['nama_lengkap'].", ";
										}
									}
								}

							?></td>
							<td><?php 
								if($list['lokasi_3'] == 0){
								?>
								<p id="<?php echo $list['id_kontrol_rutin_harian_hk_mb1']?>" style="display:none"><?php echo $list['id_kontrol_rutin_harian_hk_mb1']?></p>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_lokasi_3" title="Klik apabila sudah melaksanakan task!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<?php
								} else {
									foreach($user as $users){
										if ($users['id_user']==$list['lokasi_3']){
											echo $users['nama_lengkap'].", ";
										}
									}
								}

							?></td>
							<td><?php 
								if($list['lokasi_4'] == 0){
								?>
								<p id="<?php echo $list['id_kontrol_rutin_harian_hk_mb1']?>" style="display:none"><?php echo $list['id_kontrol_rutin_harian_hk_mb1']?></p>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_lokasi_4" title="Klik apabila sudah melaksanakan task!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<?php
								} else {
									foreach($user as $users){
										if ($users['id_user']==$list['lokasi_4']){
											echo $users['nama_lengkap'].", ";
										}
									}
								}

							?></td>
							<td><?php 
								if($list['lokasi_5'] == 0){
								?>
								<p id="<?php echo $list['id_kontrol_rutin_harian_hk_mb1']?>" style="display:none"><?php echo $list['id_kontrol_rutin_harian_hk_mb1']?></p>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_lokasi_5" title="Klik apabila sudah melaksanakan task!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<?php
								} else {
									foreach($user as $users){
										if ($users['id_user']==$list['lokasi_5']){
											echo $users['nama_lengkap'].", ";
										}
									}
								}

							?></td>
											
						</tr>
							
						
					<?php	
					}
					?>
						</tbody>
					</table>
				</div>



				<div class="table-responsive">
					<table id="sign" class="table table-striped m-b-none" data-ride="datatables">
						<thead>
							<tr>
								<th width="30%">Personal</th>
								<th width="40%"></th>
								<th width="30%">Supervisor Bks</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					//foreach($mutasi_harian_hk as $list){
						
					?>
						<tr>
							<td>
							<?php

							if (isset($koordinator_bks[0])){
								foreach($koordinator_bks as $koordinator_bks){
								echo $koordinator_bks['nama_lengkap']."<br>";
								}
							} else {
								?>

								<form action="<?php echo base_url('index.php/mutasi_harian_hk/signKoordinatorBKSMutasi_harian_hk'); ?>" method="post">
								<input type="hidden" value="<?php echo $tanggalselect;?>" name="tanggal">
								<input type="hidden" value="<?php echo $shiftselect;?>" name="shift">

								<?php 
									foreach($user as $users){
										if($users['id_user'] == 249){
											$checked = "";
											if ($users['id_user']==$id['id_user']){
												$checked = "checked";
											}

									?>
									<div class="checkbox">
									<label>
									<input type="checkbox" value="<?php echo $users['id_user'];?>" <?php echo $checked;?> name="koordinator_bks_assign[]">
									<?php echo $users['nama_lengkap'];
									?>
									</label>
									</div>
									<?php
										}
									}
									?>
									<button type="submit" class="btn btn-sm btn-primary" id="btn_cek">Sign</button>
									</form>

							<?php
							}
							?>
							</td>
							<td></td>
							<td>
							<?php

							if (isset($supervisor_bks[0])){
								foreach($supervisor_bks as $supervisor_bkss){
								echo $supervisor_bkss['nama_lengkap']."<br>";
								}
							} else {
								?>

								<form action="<?php echo base_url('index.php/mutasi_harian_hk/signSupervisorBKSMutasi_harian_hk'); ?>" method="post">
								<input type="hidden" value="<?php echo $tanggalselect;?>" name="tanggal">
								<input type="hidden" value="<?php echo $shiftselect;?>" name="shift">

								<?php 
									foreach($user as $users){
										if($users['id_role'] == 6){
											$checked = "";
											if ($users['id_user']==$id['id_user']){
												$checked = "checked";
											}

									?>
									<div class="checkbox">
									<label>
									<input type="checkbox" value="<?php echo $users['id_user'];?>" <?php echo $checked;?> name="spv_bks_assign[]">
									<?php echo $users['nama_lengkap'];
									?>
									</label>
									</div>
									<?php
										}
									}
									?>
									<button type="submit" class="btn btn-sm btn-primary" id="btn_cek">Sign</button>
									</form>

							<?php
							}
							?>
							</td>
							
						</tr>
						<tr>
							<td></td>
								<th width="30%" style="text-align: center;">Mengetahui,</th>
							<td></td>
						</tr>

						<tr>
							<td></td>
							<td style="text-align: center">

							<?php

							if (isset($supervisor_bri[0])){
								foreach($supervisor_bri as $supervisor_bris){
								echo $supervisor_bris['nama_lengkap']."<br>";
								}
							} else if ((($id['id_role'] ==3)  ) &&(isset($supervisor_bks[0])) ){
								?>

								<form action="<?php echo base_url('index.php/mutasi_harian_hk/signSupervisorBRIMutasi_harian_hk'); ?>" method="post">
								<input type="hidden" value="<?php echo $tanggalselect;?>" name="tanggal">
								<input type="hidden" value="<?php echo $shiftselect;?>" name="shift">

								<?php 
									foreach($user as $users){
										if(($users['id_role'] == 3) ){
											$checked = "";
											if ($users['id_user']==$id['id_user']){
												$checked = "checked";
											}

									?>
									<div class="checkbox">
									<label>
									<input type="checkbox" value="<?php echo $users['id_user'];?>" <?php echo $checked;?> name="final_assign[]">
									<?php echo $users['nama_lengkap'];
									?>
									</label>
									</div>
									<?php
										}
									}
									?>
									<button type="submit" class="btn btn-sm btn-primary" id="btn_cek">Approve</button>
									</form>

							<?php
							} else if ((isset($supervisor_bks[0]) && !(isset($supervisor_bri[0])) ) ){
								echo "Belum di Approve Supervisor BRI";
							} else {
								echo "Belum di Approve Supervisor BKS";
							}
							?>

							</td>
							<td></td>
						</tr>
							
						
					<?php
					//}
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
			"iDisplayLength": 100,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[0, 'desc']],
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

$('.pelaksanaan_lokasi_1').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('kontrol_rutin_harian_hk_mb1/input_pelaksanaan/1'); ?>', {id_act:a});		
		$(this).next().remove();
	}
});

$('.pelaksanaan_lokasi_2').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('kontrol_rutin_harian_hk_mb1/input_pelaksanaan/2'); ?>', {id_act:a});		
		$(this).next().remove();
	}

});
$('.pelaksanaan_lokasi_3').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('kontrol_rutin_harian_hk_mb1/input_pelaksanaan/3'); ?>', {id_act:a});		
		$(this).next().remove();
	}

});

$('.pelaksanaan_lokasi_4').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('kontrol_rutin_harian_hk_mb1/input_pelaksanaan/4'); ?>', {id_act:a});		
		$(this).next().remove();
	}

});
$('.pelaksanaan_lokasi_5').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('kontrol_rutin_harian_hk_mb1/input_pelaksanaan/5'); ?>', {id_act:a});		
		$(this).next().remove();
	}

});
$('.pelaksanaan_id_petugas').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('kontrol_rutin_harian_hk_mb1/input_pelaksanaan/id_petugas'); ?>', {id_act:a});		
		$(this).next().remove();
	}

});

$('.btn_delete').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>
