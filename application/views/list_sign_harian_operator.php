<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="<?php echo site_url('harian_operator/tambah_harian_operator'); ?>" class="btn btn-success btn-success"><i class="fa fa-plus"></i> Tambah</a>
					<a href="<?php echo site_url('harian_operator/signHarianOPERATOR'); ?>" class="btn btn-success btn-success"><i class="fa fa-thumbs-o-up"></i> Sign</a>
				</header>

				<header class="panel-heading">
					<form action="<?php echo base_url('index.php/harian_operator/signHarianOPERATOR'); ?>" method="post">
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
								<th width="3%">Tanggal Kejadian</th>
								<th width="3%">Pelaporan</th>
								<th width="10%">Data</th>
								<th width="5%">Tindak Lanjut</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($harian_operator as $list){
						
					?>
						<tr>
							<td><?php echo $list['waktu_kejadian']?></td>
							<td><?php echo $list['waktu_lapor']?></td>
							<td><?php echo $list['kejadian']?></td>
							<td><?php echo $list['tindak_lanjut']?></td>
							
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
								<th width="30%">Menyerahkan</th>
								<th width="40%"></th>
								<th width="30%">Menerima</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					//foreach($harian_operator as $list){
						
					?>
						<tr>
							<td>
							<?php
							foreach($penyerah as $penyerahs){
								echo $penyerahs['nama_lengkap']."<br>";
							?>
							<?php							
							}
							?>
							</td>
							<td></td>
							<td>
							<?php

							if (isset($penerima[0])){
								foreach($penerima as $penerimas){
								echo $penerimas['nama_lengkap']."<br>";
								}
							} else {
								?>

								<form action="<?php echo base_url('index.php/harian_operator/signOperatorHarianOPERATOR'); ?>" method="post">
								<input type="hidden" value="<?php echo $tanggalselect;?>" name="tanggal">
								<input type="hidden" value="<?php echo $shiftselect;?>" name="shift">

								<?php 
									foreach($user as $users){
										if($users['id_team'] == $id['id_team']){
											$checked = "";
											if ($users['id_user']==$id['id_user']){
												//$checked = "checked";
											}

									?>
									<div class="checkbox">
									<label>
									<input type="checkbox" value="<?php echo $users['id_user'];?>" <?php echo $checked;?> name="operator_assign[]">
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
