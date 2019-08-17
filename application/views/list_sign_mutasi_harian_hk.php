<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('mutasi_harian_hk/tambah_mutasi_harian_hk'); ?>" class="btn btn-success btn-success"><i class="fa fa-plus"></i> Tambah</a>
					<a href="<?php echo site_url('mutasi_harian_hk/signMutasi_harian_hk'); ?>" class="btn btn-success btn-success"><i class="fa fa-thumbs-o-up"></i> Sign</a>
				</header>

				<header class="panel-heading">
					<form action="<?php echo base_url('index.php/mutasi_harian_hk/signMutasi_harian_hk'); ?>" method="post">
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
								<th width="10%">Personal</th>
								<th width="3%">Date Created</th>
								<th width="20%">Team</th>
								<th width="20%">Kegiatan</th>
								<th width="3%">lokasi</th>
								<th width="3%">Jam Awal</th>
								<th width="3%">Jam Akhir</th>
								<th width="3%">Tanggal</th>
								<th width="20%">Keterangan</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($mutasi_harian_hk as $list){
						
					?>
						<tr>
							<td>
							<?php 
							foreach($user as $users){
								$checked = "";
								$indeks_tamu = explode(",",$list['indeks_tamu']);
								$indeks_tamu = preg_replace('/\s+/', '', $indeks_tamu);

								foreach($indeks_tamu as $indeks_tamus){
									if ($users['id_user']==$indeks_tamus){
										echo $users['nama_lengkap'].", ";
									}
								}
							}
						
							?>
							</td>
							<td><?php echo $list['date_created']?></td>
							<td>
							<?php 
							foreach($sub_team as $sub_teams){
								$checked = "";
								$subteam = explode(",",$list['id_sub_team']);
								$subteam = preg_replace('/\s+/', '', $subteam);

								foreach($subteam as $subteams){
									if ($sub_teams['id_sub_team']==$subteams){
										echo $sub_teams['sub_team_name'].", ";
									}
								}
							}
						
							?>
							</td>
							<td><?php echo $list['kegiatan']?></td>
							<td><?php echo $list['lokasi']?></td>
							<td><?php echo $list['jam_awal']?></td>
							<td><?php echo $list['jam_akhir']?></td>
							<td><?php echo $list['tanggal']?></td>
							<td><?php echo $list['keterangan']?></td>
							
						</tr>
							
						
					<?php
						
					}
					?>
						</tbody>
					</table>
				</div>


				<?php
				//echo $tanggalselect;

				 if($tanggalselect && $tanggalselect != "Pilih Tanggal"){ ?>

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



				<?php } ?>



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
			"aaSorting": [[1, 'desc']],
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


</script>
