

<style type="text/css">
	#radioBtn .notActive{
    color: #3276b1;
    background-color: #fff;
}
</style>
<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
			<header class="panel-heading">

				
			<?php  echo date("d-m-Y h:m:s")?>
				<select name="shift" id="shift" class="form-control m-b">
						<option value="select" >All Shift</option>
						<option value="0" >Shift 3 Yesterday</option>
						<option value="1" >Shift 1</option>
						<option value="2" >Shift 2</option>
						<option value="3" >Shift 3</option>
				</select>

				<div class="col-sm-10" id="coltotal">
				
				</div>

				</header>
				<header class="panel-heading">
				<p>Aktifitas <?php if (!empty($activity_list)) {echo date("d-m-Y",strtotime($activity_list[0]['tanggal']) );}?></p>
				<a href="#" data-toggle="modal" data-target="#modal_addhoc" class="btn btn-white btn-xs addhoc" title="Klik untuk menambah adhoc!"><i class="fa fa-plus-square text-muted text"></i><i class="fa fa-plus-square text-active"></i>AddHoc</a>

				
				</header>
				<?php if (!empty($activity_list)) {?>
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">Aktifitas</th>
								<th width="2%">Jam</th>
								<?php 
								$id = $this->session->userdata('user_data');
								if($id['id_team'] == $activity_list[0]['id_team']){
								?>

								<th width="1%">Target</th>
								<th width="5%">Pelaksanaan</th>
								<th width="1%">BPO</th>
								<?php 
								}else{}
								?>
							</tr>
						</thead>
						<tbody>
					<?php 
					if ($activity_list){
					foreach($activity_list as $list){

						if($id['id_team'] == $list['id_team']){
					?>
						<tr>
							<td><?php echo $list['aktifitas']?></td>
							<td><?php echo $list['tanggal']?> <?php echo $list['jam']?></td>
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
							<td>
							<?php 
							//$id = $this->session->userdata('user_data');
							//if($id['id_team'] == $activity_list[0]['id_team']){

							if($id['id_team'] == $activity_list[0]['id_team']){
							?>
							
								<p id="<?php echo $list['id_act']?>" style="display:none"><?php echo $list['id_act']?></p>
								
								<?php 
								if($list['pelaksanaan'] == 0){
									$true = true;
								?>

								<?php 
								if ((strlen($list['form']) > 0) ) { 
								//if ((false)) { 

									$form = preg_replace('/\s+/', '', $list['form']);
									$expform = explode(",",$form);

									foreach($expform as $expforms){
										switch ($expforms) {
										    case "ups":
										        ?>

										        <?php if ((strlen($list['ups']) > 0) ){?>
													<font color="green"><?php echo $form_name['ups'];?></font> 
										        <?php }else{ $true = false; ?>

										        	<p style="display:none">1</p>
											        <p style="display:none"><?php echo $list['id_act']?></p>
													<a href="#" data-toggle="modal" data-target="#modal_ups" class="btn btn-white btn-xs ups" title="Klik add form ups!"><?php echo $form_name['ups'];?></a>
										        <?php } ?>
										        
										        <?php
										        break;
										    case "ups2":
										        ?>

										        <?php if ((strlen($list['ups2']) > 0) ){?>
													<font color="green"><?php echo $form_name['ups2'];?></font> 
										        <?php }else{ $true = false; ?>
											        <p style="display:none">2</p>
											        <p style="display:none"><?php echo $list['id_act']?></p>
													<a href="#" data-toggle="modal" data-target="#modal_ups" class="btn btn-white btn-xs ups" title="Klik add form ups2!"><?php echo $form_name['ups2'];?></a>
										        <?php } ?>
										        
										        <?php
										        break;
										     case "ups3":
										        ?>

										        <?php if ((strlen($list['ups3']) > 0) ){?>
													<font color="green"><?php echo $form_name['ups3'];?></font> 
										        <?php }else{ $true = false; ?>
											        <p style="display:none">3</p>
											        <p style="display:none"><?php echo $list['id_act']?></p>
													<a href="#" data-toggle="modal" data-target="#modal_ups_mb2" class="btn btn-white btn-xs upsmb2" title="Klik add form ups3!"><?php echo $form_name['ups3'];?></a>
										        <?php } ?>
										        
										        <?php
										        break;
										    case "lvmdp":
										        ?>

										        <?php if ((strlen($list['lvmdp']) > 0) ){?>
													<font color="green"><?php echo $form_name['lvmdp'];?></font> 
										        <?php }else{ $true = false;?>
											        <p style="display:none">1</p>
											        <p style="display:none"><?php echo $list['id_act']?></p>
												<a href="#" data-toggle="modal" data-target="#modal_lvmdp" class="btn btn-white btn-xs lvmdp" title="Klik add form lvmdp!"><?php echo $form_name['lvmdp'];?></a>
										        <?php } ?>

										        
										        <?php
										        break;
										    case "lvmdp2":
										        ?>

										        <?php if ((strlen($list['lvmdp2']) > 0) ){?>
													<font color="green"><?php echo $form_name['lvmdp2'];?></font> 
										        <?php }else{ $true = false;?>
											        <p style="display:none">2</p>
											        <p style="display:none"><?php echo $list['id_act']?></p>
												<a href="#" data-toggle="modal" data-target="#modal_lvmdp" class="btn btn-white btn-xs lvmdp" title="Klik add form lvmdp2!"><?php echo $form_name['lvmdp2'];?></a>
										        <?php } ?>

										        
										        <?php
										        break;
										    case "kwh":
										        ?>

										        <?php if ((strlen($list['kwh']) > 0) ){?>
													<font color="green"><?php echo $form_name['kwh'];?></font> 
										        <?php }else{ $true = false;?>
											        <p style="display:none"><?php echo $list['id_act']?></p>
												<a href="#" data-toggle="modal" data-target="#modal_kwh" class="btn btn-white btn-xs kwh" title="Klik add form kwh!"><?php echo $form_name['kwh'];?></a>
										        <?php } ?>

										        
										        <?php
										        break;
										     case "kwh2":
										        ?>

										        <?php if ((strlen($list['kwh2']) > 0) ){?>
													<font color="green"><?php echo $form_name['kwh2'];?></font> 
										        <?php }else{ $true = false; ?>
											        <p style="display:none"><?php echo $list['id_act']?></p>
												<a href="#" data-toggle="modal" data-target="#modal_kwh" class="btn btn-white btn-xs kwh2" title="Klik add form kwh2!"><?php echo $form_name['kwh2'];?></a>
										        <?php } ?>

										        
										        <?php
										        break;
										     case "kwh3":
										        ?>

										        <?php if ((strlen($list['kwh3']) > 0) ){?>
													<font color="green"><?php echo $form_name['kwh3'];?></font> 
										        <?php }else{ $true = false; ?>
											        <p style="display:none"><?php echo $list['id_act']?></p>
												<a href="#" data-toggle="modal" data-target="#modal_kwh" class="btn btn-white btn-xs kwh3" title="Klik add form kwh3!"><?php echo $form_name['kwh3'];?></a>
										        <?php } ?>

										        
										        <?php
										        break;
										    case "acliebert":
										        ?>
										        
												<?php if ((strlen($list['acliebert']) > 0) ){?>
													<font color="green"><?php echo $form_name['acliebert'];?></font> 
										        <?php }else{ $true = false; ?>
											        <p style="display:none"><?php echo $list['id_act']?></p>
												<a href="#" data-toggle="modal" data-target="#modal_acliebert" class="btn btn-white btn-xs acliebert" title="Klik add form Ac Liebert!"><?php echo $form_name['acliebert'];?></a>
										        <?php } ?>
										        <?php
										        break;
										    case "genset":
										        ?>
										       
												<?php if ((strlen($list['genset']) > 0) ){?>
													<font color="green"><?php echo $form_name['genset'];?></font> 
										        <?php }else{ $true = false; ?>
											        <p style="display:none"><?php echo $list['id_act']?></p>
												<a href="#" data-toggle="modal" data-target="#modal_genset" class="btn btn-white btn-xs genset" title="Klik add form Ac Genset!"><?php echo $form_name['genset'];?></a>
										        <?php } ?>

										        <?php
										        break;
										    case "tangki":
										        ?>
										       
												<?php if ((strlen($list['tangki']) > 0) ){?>
													<font color="green"><?php echo $form_name['tangki'];?></font> 
										        <?php }else{ $true = false; ?>
											        <p style="display:none"><?php echo $list['id_act']?></p>
												<a href="#" data-toggle="modal" data-target="#modal_tangki" class="btn btn-white btn-xs tangki" title="Klik add form Ac Tangki!"><?php echo $form_name['tangki'];?></a>
										        <?php } ?>


										        <?php
										        break;
										    case "datastorage":
										        ?>
										        <p style="display:none"><?php echo $list['id_act']?></p>
												<a href="#" data-toggle="modal" data-target="#modal_datastorage" class="btn btn-white btn-xs datastorage" title="Klik add form Data Storage!">Data Storage</a>


												<?php if ((strlen($list['datastorage']) > 0) ){?>
													<font color="green">Datastorage</font> 
										        <?php }else{ $true = false; ?>
											        <p style="display:none"><?php echo $list['id_act']?></p>
												<a href="#" data-toggle="modal" data-target="#modal_datastorage" class="btn btn-white btn-xs datastorage" title="Klik add form datastorage!">Datastorage</a>
										        <?php } ?>


										        <?php
										        break;
										    case "hopteknisi":
										        echo "";
										        break;
										    default:

										        echo "";
										}
									}
									?>

								<?php } ?>
								
								<?php if($list['with_img_valid'] == 1){ ?>
								<p style="display:none"><?php echo $list['id_act']?></p>
								<a href="#" data-toggle="modal" data-target="#modal_camera" class="btn btn-white btn-xs camera" title="Klik add for photo!"><i class="fa fa-camera"></i></a>
								<?php }elseif (true){?>
								<p id="<?php echo $list['id_act']?>" style="display:none"><?php echo $list['id_act']?></p>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_task" title="Klik apabila sudah melaksanakan task!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<?php } ?>

								
								<a href="#" data-toggle="modal" data-target="#modal_tidak_kerja" class="btn btn-white btn-xs tidak-kerja" title="Klik apabila tidak melaksanakan task!"><i class="fa fa-exclamation-triangle text-muted text"></i><i class="fa fa-exclamation-triangle text-danger text-active"></i></a>


								<?php 
								}else{
									if($list['pelaksanaan'] == 1){
								?>
								
								<p>
								
								<?php
								$img =  "./images/activity/".$list['camera'];
								//if (file_exists($img)) {
						        
						        	?>
						        	<!--<a href="<?php $img = "images/activity/".$list['camera']; echo base_url($img) ;?>"><img src="<?php $img = "images/activity/".$list['camera']; echo base_url($img) ;?>" height = "20" width = "20" alt="" class=""></a>
						        	--><?php
						    

								?>
								<font color="green">Task selesai pada <?php echo $list['last_modified'] ?> </font> 
								
								<?php
								$jamx= $list['jam'];

								if ($jamx != ""){
								//if (false){
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
										echo '<font color="red">  terlambat : '.($selisih-$list['duration']) .' menit</font>';
										?>

										<?php 
										$permohonan = $list['permohonan'];
										//echo $permohonan;
										if($permohonan){
											echo "Permakluman :".$permohonan;
										} else {
											?>
										
										<p id="<?php echo $list['id_act']?>b" style="display:none"><?php echo $list['id_act']?></p>
										<a href="#" data-toggle="modal" data-target="#modal_permohonan" class="btn btn-white btn-xs permohonan" title="Klik apabila ingin mengajukan permohonan!"><i class="fa fa-bell text-muted text"></i><i class="fa fa-bell text-danger text-active"></i></a>

										<?php 
											
										}
										?>
										<?php
									} else {
										echo '<font color="green">  selisih : '.$selisih.' menit</font>';
									}
								}
								
								?>
								</p>
								<?php
									}else{
								?>
									<p style="display:none"><?php echo $list['id_act']?></p>
									<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_task active" disabled title="task sudah dilaksanakan!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-exclamation-triangle text-danger text-active"></i></a> <?php echo $list['keterangan']?>
								<?php
									}
								}
								?>
							</td>

							<p id="<?php echo $list['id_act']?>" style="display:none"><?php echo $list['id_act']?></p>
							
							<td>
							<?php 

							$links = explode(",",$list['link_bpo']);
							//var_dump($jam);
							foreach($links as $link){
								if($link != ""){
								?>
								<a target="blank" href="<?php echo "../../BPO/".$teamSession['nama']."/".$link ?>"><i class="fa fa-download"></i></a>
								<?php
								}
							}
							?>

							
							
							</td>

							<?php 
							}else{}
							?>
						</tr>
							
						
							<?php
								}
							}
						}
							?>
						</tbody>
					</table>
				</div>
				<?php } else { ?>
				Aktifitas Kosong
				<?php } ?>
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
		<textarea style="width: 549px; height: 62px;" placeholder="Wajib : isikan alasan tidak mengerjakan di sini!"></textarea>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-tidak-kerja">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modal_permohonan" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p id="col_id_act_permohonan" style="display:none"></p>
		<textarea style="width: 549px; height: 62px;" placeholder="Wajib : isikan permohonan anda!"></textarea>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-permohonan">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modal_ups" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_form/ups'); ?>" method="post">
	        	<p id="col_id_act_ups" >
	        	<p id="col_ups_no" >
	
				<table border="0" width="100%">
					<tr>
	        			<td>
	        			Jam
	        			</td>
	        			<td>

	        			<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam" id="jam" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			By Pass Suply Healthy
	        			</td>
	        			<td>
					    <div id="radioBtn" class="btn-group">
	    					<a class="btn btn-primary btn-sm active" data-toggle="by_pass_suply_healthy" data-title="0">OFF</a>
	    					<a class="btn btn-primary btn-sm notActive" data-toggle="by_pass_suply_healthy" data-title="1">ON</a>
	    				</div>
	    				<input type="hidden" name="by_pass_suply_healthy" id="by_pass_suply_healthy">

	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input Suply Healthy
	        			</td>
	        			<td>

	        			<div id="radioBtn" class="btn-group">
	    					<a class="btn btn-primary btn-sm active" data-toggle="input_suply_healthy" data-title="0">OFF</a>
	    					<a class="btn btn-primary btn-sm notActive" data-toggle="input_suply_healthy" data-title="1">ON</a>
	    				</div>
	    				<input type="hidden" name="input_suply_healthy" id="input_suply_healthy">

	        			
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input l1 l2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""   type="text" name="input_l1_l2" id="input_l1_l2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input l2 l3
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="input_l2_l3" id="input_l2_l3" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input l1 l3
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="input_l1_l3" id="input_l1_l3" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Baterry Supply Healthy Led
	        			</td>
	        			<td>

	        			<div id="radioBtn" class="btn-group">
	    					<a class="btn btn-primary btn-sm active" data-toggle="baterry_supply_healthy_led" data-title="0">OFF</a>
	    					<a class="btn btn-primary btn-sm notActive" data-toggle="baterry_supply_healthy_led" data-title="1">ON</a>
	    				</div>
	    				<input type="hidden" name="baterry_supply_healthy_led" id="baterry_supply_healthy_led">

	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Batere V
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="batere_v" id="batere_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Batere l
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="batere_l" id="batere_l" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Baterry Charge
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="baterry_charge" id="baterry_charge" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Inverter Output Healthy Led
	        			</td>
	        			<td>
	        			
	        			<div id="radioBtn" class="btn-group">
	    					<a class="btn btn-primary btn-sm active" data-toggle="inverter_output_healthy_led" data-title="0">OFF</a>
	    					<a class="btn btn-primary btn-sm notActive" data-toggle="inverter_output_healthy_led" data-title="1">ON</a>
	    				</div>
	    				<input type="hidden" name="inverter_output_healthy_led" id="inverter_output_healthy_led">


	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output L1
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="output_l1" id="output_l1" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output L2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="output_l2" id="output_l2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output L3
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="output_l3" id="output_l3" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Current L1
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="out_current_l1" id="out_current_l1" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Current L2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="out_current_l2" id="out_current_l2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Current L3
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="out_current_l3" id="out_current_l3" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Kw Power L1
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="out_kw_power_l1" id="out_kw_power_l1" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Kw Power L2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="out_kw_power_l2" id="out_kw_power_l2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Kw Power L3
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="out_kw_power_l3" id="out_kw_power_l3" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Frek Inv
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="out_frek_inv" id="out_frek_inv" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Frek by Pass
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="out_frek_by_pass" id="out_frek_by_pass" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Loadon Inv by Pass
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="loadon_inv_by_pass" id="loadon_inv_by_pass" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keteranganups" id="keteranganups" ></textarea>
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			<span id="confirmMessage" class="confirmMessage"></span>
	        			</td>
	        			<td>
	        			<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Save</button>
	        			</td>
        			</tr>

        		</table>

				
			
			  </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>

<div id="modal_ups_mb2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_form/upsmb2'); ?>" method="post">
	        	<p id="col_id_act_ups_mb2" >
	        	<p id="col_ups_no" >
	
				<table border="0" width="100%">
				

					<tr>
	        			<td>
	        			Jam
	        			</td>
	        			<td>

	        			<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam" id="jam" >
	        			</td>
        			</tr>

           			<tr>
	        			<td>
	        			Input V Run
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""   type="text" name="i_v_Rn" id="i_v_Rn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input V SN
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="i_v_sn" id="i_v_sn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input V TN
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="i_v_tn" id="i_v_tn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input C R
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="i_c_r" id="i_c_r" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input C S
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="i_c_s" id="i_c_s" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input C T
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="i_c_t" id="i_c_t" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			fHZ_1
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="fHZ_1" id="fHZ_1" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			battery_vdc
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="battery_vdc" id="battery_vdc" >
	        			</td>
        			</tr>


        			<tr>
	        			<td>
	        			Output V Run
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""   type="text" name="o_v_Rn" id="o_v_Rn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output V SN
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="o_v_sn" id="o_v_sn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output V TN
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="o_v_tn" id="o_v_tn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output C R
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="o_c_r" id="o_c_r" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output C S
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="o_c_s" id="o_c_s" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output C T
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="o_c_t" id="o_c_t" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			fHZ_2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="fHZ_2" id="fHZ_2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			runtime
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="runtime" id="runtime" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ups
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="temp_ups" id="temp_ups" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_battery
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="temp_battery" id="temp_battery" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			load_kw
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" name="load_kw" id="load_kw" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keterangan" id="keterangan" ></textarea>
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			<span id="confirmMessage" class="confirmMessage"></span>
	        			</td>
	        			<td>
	        			<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Save</button>
	        			</td>
        			</tr>

        		</table>

				
			
			  </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>



<div id="modal_tangki" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_form/tangki'); ?>" method="post">
	        	<p id="col_id_act_tangki" >
    			
				<table border="0" width="100%">		
        			<tr>
	        			<td>
	        			Jam Start
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam_start" id="jam_start" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Jam Stop
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="15:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam_stop" id="jam_stop" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Stick terbaca sebelum run
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="stick_terbaca_seb_run" id="stick_terbaca_seb_run" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Liter 1
	        			</td>
	        			<td>
	        			<input class="form-control" readonly="true" data-required="true" placeholder="" type="text" name="ltr1" id="ltr1" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Stick terbaca sudah run
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="stick_terbaca_sdh_run" id="stick_terbaca_sdh_run" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Liter 2
	        			</td>
	        			<td>
	        			<input class="form-control" readonly="true" data-required="true" placeholder="" type="text" name="ltr2" id="ltr2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Selisih
	        			</td>
	        			<td>
	        			<input class="form-control" readonly="true" data-required="true" placeholder="" type="text" name="selisih" id="selisih" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keterangantangki" id="keterangantangki" ></textarea>
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Status
	        			</td>
	        			<td>
	        			<div id="radioBtn" class="btn-group">
	    					<a class="btn btn-primary btn-sm active" data-toggle="status" data-title="Harian">Harian</a>
	    					<a class="btn btn-primary btn-sm notActive" data-toggle="status" data-title="Mingguan">Mingguan</a>
	    				</div>
	    				<input type="hidden" name="status" id="status">
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			<span id="confirmMessage" class="confirmMessage"></span>
	        			</td>
	        			<td>
	        			<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Save</button>
	        			</td>
        			</tr>

        		</table>

			  </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>


<div id="modal_camera" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/camera'); ?>" method="post" enctype="multipart/form-data">
	        	<p id="col_id_act_camera" >

				<table border="0" width="100%">

        			<tr>
	        			<td>
	        			<input name="MAX_FILE_SIZE" type="hidden" value="3000000" /><input name="camera" type="file" accept="image/*" class="btn btn-sm btn-primary" capture />
	        			</td>
	        			<td>
						<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Save</button>
	        			</td>
        			</tr>


        			<tr>
	        			<td>
	        			<span id="confirmMessage" class="confirmMessage"></span>
	        			</td>
	        			<td>
	        			
	        			</td>
        			</tr>

        		</table>

				
			
			  </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>


<div id="modal_kwh" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_form/kwh'); ?>" method="post">
	        	<p id="col_id_act_kwh" >

						
		    			
				<table border="0" width="100%">


					
        			<tr>
	        			<td>
	        			Jam
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam" id="jam" >
	        			</td>
        			</tr>

           			<tr>
	        			<td>
	        			LWBP
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="LWBP" id="LWBP" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			WBP
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="WBP" id="WBP" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			KVAR
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="KVAR" id="KVAR" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Cos Q
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="Cos_Q" id="Cos_Q" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keterangan" id="keterangan" ></textarea>
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Lokasi
	        			</td>
	        			<td>
	        			<select name="lokasi" id="lokasi" class="form-control m-b">
						<?php foreach($lokasi as $lokasi){
						?>
						<option value="<?php echo $lokasi['id_lokasi'];?>"><?php echo $lokasi['nama_lokasi']?></option>
						<?php }?>
                        </select>
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			<span id="confirmMessage" class="confirmMessage"></span>
	        			</td>
	        			<td>
	        			<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Save</button>
	        			</td>
        			</tr>

        		</table>

				
			
			  </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>


<div id="modal_lvmdp" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_form/lvmdp'); ?>" method="post">
	        	<p id="col_id_act_lvmdp" >
	        	<p id="col_lvmdp_no" >

						
		    			
				<table border="0" width="100%">


					
        			<tr>
	        			<td>
	        			Jam Start
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam" id="jam" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			PB ON OFF
	        			</td>
	        			<td>
	        			<div id="radioBtn" class="btn-group">
	    					<a class="btn btn-primary btn-sm active" data-toggle="pb_on_off" data-title="0">OFF</a>
	    					<a class="btn btn-primary btn-sm notActive" data-toggle="pb_on_off" data-title="1">ON</a>
	    				</div>
	    				<input type="hidden" name="pb_on_off" id="pb_on_off">
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			ir_a
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ir_a" id="ir_a" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			is_a
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="is_a" id="is_a" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			it_a
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="it_a" id="it_a" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rs_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rs_v" id="rs_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rt_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rt_v" id="rt_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			st_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="st_v" id="st_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rn_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rn_v" id="rn_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			sn_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="sn_v" id="sn_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			tn_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="tn_v" id="tn_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			f_hz
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="f_hz" id="f_hz" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cos_phi
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cos_phi" id="cos_phi" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			kWh
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="kWh" id="kWh" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			<span id="confirmMessage" class="confirmMessage"></span>
	        			</td>
	        			<td>
	        			<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Save</button>
	        			</td>
        			</tr>

        		</table>

				
			
			  </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>

<div id="modal_genset" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_form/genset'); ?>" method="post">
	        	<p id="col_id_act_genset" >

						
		    			
				<table border="0" width="100%">


					
        			<tr>
	        			<td>
	        			Jam Start
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam_start_genset" id="jam_start_genset" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Jam Stop
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="15:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam_stop_genset" id="jam_stop_genset" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			hours_meter
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="hours_meter" id="hours_meter" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			voltage_bateray
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="voltage_bateray" id="voltage_bateray" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			kwh
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="kwh" id="kwh" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			vol_r
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="vol_r" id="vol_r" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			vol_s
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="vol_s" id="vol_s" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			vol_t
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="vol_t" id="vol_t" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cur_s
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cur_s" id="cur_s" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cur_t
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cur_t" id="cur_t" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			frekwensi
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="frekwensi" id="frekwensi" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cosQ
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cosQ" id="cosQ" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			oil_press
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="oil_press" id="oil_press" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			water_temp
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="water_temp" id="water_temp" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rpm
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rpm" id="rpm" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keterangan" id="keterangan" ></textarea>
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Status
	        			</td>
	        			<td>
	        			<div id="radioBtn" class="btn-group">
	    					<a class="btn btn-primary btn-sm active" data-toggle="status" data-title="Catpilar I">Catpilar I</a>
	    					<a class="btn btn-primary btn-sm notActive" data-toggle="status" data-title="Catpilar II">Catpilar II</a>
	    				</div>
	    				<input type="hidden" name="status" id="status">
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			<span id="confirmMessage" class="confirmMessage"></span>
	        			</td>
	        			<td>
	        			<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Save</button>
	        			</td>
        			</tr>

        		</table>

				
			
			  </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>


<div id="modal_acliebert" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_form/acliebert'); ?>" method="post">
	        	<p id="col_id_act_acliebert" >

						
		    			
				<table border="0" width="100%">


					
        			<tr>
	        			<td>
	        			Jam
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("h:m:s");?>" type="text" name="jam" id="jam" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ACI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_ACI" id="temp_ACI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ACII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_ACII" id="temp_ACII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ACIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_ACIII" id="temp_ACIII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_ACI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rh_ACI" id="rh_ACI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_ACII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rh_ACII" id="rh_ACII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_ACIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rh_ACIII" id="rh_ACIII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ups
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_ups" id="temp_ups" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_snmpI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_snmpI" id="temp_snmpI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_snmpII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_snmpII" id="temp_snmpII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_snmpIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_snmpIII" id="temp_snmpIII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_snmpI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rh_snmpI" id="rh_snmpI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_snmpII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rh_snmpII" id="rh_snmpII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_snmpIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rh_snmpIII" id="rh_snmpIII" >
	        			</td>
        			</tr>

					<tr>
	        			<td>
	        			temp_migle
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_migle" id="temp_migle" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_migle
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rh_migle" id="rh_migle" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_krisbow
	        			</td>
	        			<td>
	        			<input class="form-control"  data-required="true" placeholder="" type="text" name="temp_krisbow" id="temp_krisbow" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_krisbow
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rh_krisbow" id="rh_krisbow" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_battery
	        			</td>
	        			<td>
	        			<input class="form-control"  data-required="true" placeholder="" type="text" name="temp_battery" id="temp_battery" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			ratas_akhir_temp
	        			</td>
	        			<td>
	        			<input class="form-control"  data-required="true" placeholder="" type="text" name="ratas_akhir_temp" id="ratas_akhir_temp" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			ratas_akhir_rh
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ratas_akhir_rh" id="ratas_akhir_rh" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_ACI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="status_ACI" id="status_ACI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_ACII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="status_ACII" id="status_ACII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_ACIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="status_ACIII" id="status_ACIII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_komp_ACI
	        			</td>
	        			<td>
	        			<input class="form-control"  data-required="true" placeholder="" type="text" name="status_komp_ACI" id="status_komp_ACI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_komp_ACII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="status_komp_ACII" id="status_komp_ACII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_komp_ACIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="status_komp_ACIII" id="status_komp_ACIII" >
	        			</td>
        			</tr>
        			
        			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keterangan" id="keterangan" ></textarea>
	        			</td>
        			</tr>

        			
        			<tr>
	        			<td>
	        			<span id="confirmMessage" class="confirmMessage"></span>
	        			</td>
	        			<td>
	        			<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Save</button>
	        			</td>
        			</tr>

        		</table>

				
			
			  </form>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>


<div id="modal_addhoc" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">


			<form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_addhoc'); ?>" method="post">
				
				<div class="form-group">
				  <label class="col-lg-2 control-label">Task List</label>
				  <div class="col-lg-10">
					
				  		<select name="id_task_list_addhoc" id="id_task_list_addhoc" class="form-control m-b">
						<option value="select" >select</option>
						<?php foreach($addhoctask_list_team as $addhoctask_list_team){
						?>
						<option value="<?php echo $addhoctask_list_team['id_task_list'];?>" ><?php echo $addhoctask_list_team['aktifitas']?></option>
						<?php }?>
                        </select>

				  </div>
				</div>

				<div class="form-group">
				  <label class="col-lg-2 control-label">Jam</label>
				  <div class="col-lg-10">
					
				  		<input class="form-control" data-required="true" placeholder="08:30:00"  type="text" name="jam_addhoc" id="jam" >
				  </div>
				</div>

				<span id="confirmMessage" class="confirmMessage"></span>
				
				<div class="form-group">
				  <div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Tambah</button>
				  </div>
				</div>
			  </form>

       
    </div>

  </div>
</div>



</section>

<script>
$(document).ready(function()
{
    function updateVal()
    {
        var total = parseFloat($("#stick_terbaca_seb_run").val());
        $("#ltr1").val(total);
        var total2 = parseFloat($("#stick_terbaca_sdh_run").val());
        $("#ltr2").val(total2);
        var selisih =0;
        selisih = Math.abs((total-total2));
        $("#selisih").val(selisih);
    }
    $(document).on("change, keyup", "#stick_terbaca_seb_run", updateVal);
    $(document).on("change, keyup", "#stick_terbaca_sdh_run", updateVal);
});
</script>

<script>
$(document).ready(function() {

$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})

$('.tidak-kerja').click(function(e){
	$('#col_id_act').text('');
	var a = $(this).prev().prev().text();
	$('#col_id_act').append(a);
});
$('.permohonan').click(function(e){
	$('#col_id_act_permohonan').text('');
	var a = $(this).prev().text();
	$('#col_id_act_permohonan').append(a);
});
$('.ups').click(function(e){
	$('#col_id_act_ups').text('');
	var a = $(this).prev().text();
	var val='<input data-required="true"  type="hidden" name="id_act_form_ups" id="id_act_form_ups" value="'+a+'">'
	$('#col_id_act_ups').append(val);

	var b = $(this).prev().prev().text();
	var valx='<input data-required="true"  type="hidden" name="ups_no" id="ups_no" value="'+b+'">'
	$('#col_ups_no').append(valx);
});

$('.upsmb2').click(function(e){
	$('#col_id_act_ups_mb2').text('');
	var a = $(this).prev().text();
	var val='<input data-required="true"  type="hidden" name="id_act_form_ups_mb2" id="id_act_form_ups_mb2" value="'+a+'">'
	$('#col_id_act_ups_mb2').append(val);

});

$('.tangki').click(function(e){
	$('#col_id_act_tangki').text('');
	var a = $(this).prev().text();
	var val='<input data-required="true"  type="hidden" name="id_act_form_tangki" id="id_act_form_tangki" value="'+a+'">'
	$('#col_id_act_tangki').append(val);

});

$('.lvmdp').click(function(e){
	$('#col_id_act_lvmdp').text('');
	var a = $(this).prev().text();
	var val='<input data-required="true"  type="hidden" name="id_act" id="id_act" value="'+a+'">'
	$('#col_id_act_lvmdp').append(val);

	var b = $(this).prev().prev().text();
	var valx='<input data-required="true"  type="hidden" name="lvmdp_no" id="lvmdp_no" value="'+b+'">'
	$('#col_lvmdp_no').append(valx);
});

$('.kwh').click(function(e){
	$('#col_id_act_kwh').text('');
	var a = $(this).prev().text();
	var val='<input data-required="true"  type="hidden" name="id_act_form_kwh" id="id_act_form_kwh" value="'+a+'">'
	$('#col_id_act_kwh').append(val);
	$('#lokasi').val('1');
});

$('.kwh2').click(function(e){
	$('#col_id_act_kwh').text('');
	var a = $(this).prev().text();
	var val='<input data-required="true"  type="hidden" name="id_act_form_kwh" id="id_act_form_kwh" value="'+a+'">'
	$('#col_id_act_kwh').append(val);
	$('#lokasi').val('2');
});

$('.kwh3').click(function(e){
	$('#col_id_act_kwh').text('');
	var a = $(this).prev().text();
	var val='<input data-required="true"  type="hidden" name="id_act_form_kwh" id="id_act_form_kwh" value="'+a+'">'
	$('#col_id_act_kwh').append(val);
	$('#lokasi').val('110');
});

$('.acliebert').click(function(e){
	$('#col_id_act_acliebert').text('');
	var a = $(this).prev().text();
	var val='<input data-required="true"  type="hidden" name="id_act_form_acliebert" id="id_act_form_acliebert" value="'+a+'">'
	$('#col_id_act_acliebert').append(val);
});

$('.camera').click(function(e){
	$('#col_id_act_camera').text('');
	var a = $(this).prev().text();
	var val='<input data-required="true"  type="hidden" name="id_act_form_camera" id="id_act_form_camera" value="'+a+'">'
	$('#col_id_act_camera').append(val);
});

$('.btn-tidak-kerja').click(function(e){
	var id = $(this).parent().prev().children('p').text();
	var b = $(this).parent().prev().children('textarea').val();
	//alert(b);
	//alert(id);
	if (b.length > 1){
	$('[id="'+id+'"]').next().remove();
	$.getJSON('<?php echo site_url('task/input_pelaksanaan/2'); ?>', {id_act:id,alasan:b});
	$('[id="'+id+'"]').next('.tidak-kerja').addClass('active');
	$('[id="'+id+'"]').next('.tidak-kerja').prop('disabled',true);
	//$('#modal_tidak_kerja').empty();
	$('#modal_tidak_kerja').modal('hide');	
	}
		
});

$('.btn-permohonan').click(function(e){
	var id = $(this).parent().prev().children('p').text();
	var b = $(this).parent().prev().children('textarea').val();
	//alert(b);
	//alert(id);
	if (b.length > 1){
	//$('[id="'+id+'"]').next().remove();
	$.getJSON('<?php echo site_url('task/input_pelaksanaan/3'); ?>', {id_act:id,permohonan:b});
	$('[id="'+id+'b"]').next('.permohonan').addClass('active');
	$('[id="'+id+'b"]').next('.permohonan').prop('disabled',true);
	//$('#modal_tidak_kerja').empty();
	$('#modal_permohonan').modal('hide');	
	}
		
});


$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min =  $('#min').val();
        var max =  $('#max').val();


        var shift =  $('#shift').val();
        var today = new Date();

        var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!

		var yyyy = today.getFullYear();
		if(dd<10){
			dd='0'+dd
		} 
		if(mm<10){
			mm='0'+mm
		} 


        var date = yyyy+'-'+mm+'-'+dd;


		var yesterday = new Date(today);
		yesterday.setDate(today.getDate() - 1);

		var Kdd = yesterday.getDate();
		var Kmm = yesterday.getMonth()+1; //January is 0!

		var Kyyyy = yesterday.getFullYear();
		if(Kdd<10){
			Kdd='0'+Kdd
		} 
		if(Kmm<10){
			Kmm='0'+Kmm
		} 

		yesterday = Kyyyy+'-'+Kmm+'-'+Kdd;

		var tommorow = new Date(today);
		tommorow.setDate(today.getDate() + 1);

		var Tdd = tommorow.getDate();
		var Tmm = tommorow.getMonth()+1; //January is 0!

		var Tyyyy = tommorow.getFullYear();
		if(Tdd<10){
			Tdd='0'+Tdd
		} 
		if(Tmm<10){
			Tmm='0'+Tmm
		} 

		tommorow = Tyyyy+'-'+Tmm+'-'+Tdd;


        var createdAt = data[1] || 0; // use data for the age column
 
var timetable = new Date(createdAt).getTime();
//var timetable = new Date('2018-02-12 '+createdAt).getTime();


var shift3kemarindatang = new Date(yesterday+' 23:01:00').getTime();
var shift3kemarinpulang = new Date(date+' 07:30:00').getTime();

var shift1datang = new Date(date+' 07:31:00').getTime();
var shift1pulang = new Date(date+' 16:00:00').getTime();

var shift2datang = new Date(date+' 16:01:00').getTime();
var shift2pulang = new Date(date+' 23:00:00').getTime();

var shift3datang = new Date(date+' 23:01:00').getTime();
var shift3pulang = new Date(tommorow+' 07:30:00').getTime();


			//alert(timetable +","+ shift3kemarindatang+","+ shift3kemarinpulang);

		if (shift == "select"){
			return true;
		} else if (shift == "0") { //kemarin shift 3
			if ((timetable >= shift3kemarindatang) && (timetable <= shift3kemarinpulang)){
				return true;
			}
			if (createdAt <= 5){
				return true;
			}
		} else if (shift == "1") { //kemarin shift 3
			if ((timetable >= shift1datang) && (timetable <= shift1pulang)){
				return true;
			}
			if (createdAt <= 5){
				return true;
			}
		} else if (shift == "2") { //kemarin shift 3
			if ((timetable >= shift2datang) && (timetable <= shift2pulang)){
				return true;
			}
			if (createdAt <= 5){
				return true;
			}
		}
	
        return false;
    }
);
//var table = $('#example').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    

    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 500,
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
				


			    $('#shift').change(function(){
					var a = $(this).val();
					//alert(a);
					var table = $('#example').DataTable();
			        table.draw();
				
				});
				
				$('[data-toggle="tooltip"]').tooltip();
			}
		});
});

$('.pelaksanaan_task').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('task/input_pelaksanaan/1'); ?>', {id_act:a});		
		$(this).next().remove();

		/*var a = 1;
		$.getJSON('<?php echo site_url('task/get_data_totalpershit');?>', {shift: a}, function(data) {
		var opt = '';
			$.each(data, function(i,v) {
				if (v!=""){
				opt += v;
				}
			});

		$('#coltotal').append("xx");
		
		});
		*/
	}


	
});

$('.tanggalform').datepicker();

$('.datepickers').datepicker()
  .on('changeDate', function(ev) {
	
    //alert(new Date(ev.date));
	//console.log($('#tanggal').val());
	var a = '<input class="btn btn-sm btn-primary tgl" size="16" type="button" value="'+$('#tanggal').val()+'"><input class="tgl" size="16" type="text" name="tanggal[]" value="'+$('#tanggal').val()+'" style="display:none">';
	$('#col_tanggal').append(a);
	
});


</script>