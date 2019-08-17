<?php $id = $this->session->userdata('user_data'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Panel_SDP_Detail_KPI".$tgl.".xls");

?>
<?php $id = $this->session->userdata('user_data'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
div.scrollmenu {
    overflow: auto;
    white-space: nowrap;
}

div.scrollmenu a {
    display: inline-block;
    text-align: center;
    padding: 14px;
    text-decoration: none;
}

div.scrollmenu a:hover {
}
</style>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					

					<form id="changetanggal" method="post" action="<?php echo site_url('panel_sdp/get_list_panel_sdp_detail_kpi'); ?>"  class="panel-body">
						<div class="tab-pane fade active in" id="tanggal">
							<div >
							
								<table>
									
									<tr>
										<!--
										<td>
										<select name="nama_perangkat" id="nama_perangkat" class="form-control m-b">
											<option value="" >(Nama Perangkat)</option>
											<?php foreach($nama_perangkat as $nama_perangkats){
											if ($nama_perangkats['nama_perangkat'] == $nama_perangkat_select){
												?>
												<option value="<?php echo $nama_perangkats['nama_perangkat'];?>" selected><?php echo $nama_perangkats['nama_perangkat']?></option>
												<?php
											} else {
											?>
												<option value="<?php echo $nama_perangkats['nama_perangkat'];?>" ><?php echo $nama_perangkats['nama_perangkat']?></option>
											<?php 
												}
											}

											?>
					                        </select>
										</td>
									-->
										<td>
										<select name="tgl" id="tgl" class="form-control m-b">
											<?php foreach($tanggal_ready as $tanggal_readys){
											if ($tanggal_readys['tanggal'] == $tgl){
												?>
												<option value="<?php echo $tanggal_readys['tanggal'];?>" selected><?php echo $tanggal_readys['tanggal']?></option>
												<?php
											} else {
											?>
												<option value="<?php echo $tanggal_readys['tanggal'];?>" ><?php echo $tanggal_readys['tanggal']?></option>
											<?php 
												}
											}

											?>
					                        </select>
										</td>

										<td>
											<button type="submit" class="btn btn-sm btn-primary"  data-dismiss="modal">Search</button> 
										</td>

										<td>	
										<a href="<?php echo site_url('panel_sdp/get_list_panel_sdp_detail_kpi_excel/'.$tgl); ?>" class="btn btn-sm btn-primary" >Excel</a> 
										</td>
									</tr>
								</table>

							</div>

						</div>
					</form>

				
				</header>
				
				<div class="table-responsive">

				<form action="<?php echo base_url('index.php/panel_sdp/update_data_list'); ?>" method="post">

						<input type="hidden" name="tgl" value="<?php echo $tgl?>">

					<div class="scrollmenu">
					<table border="1" cellpadding="0" cellspacing="0" width="1029" class="table table-striped m-b-none" data-ride="datatables">
	<colgroup>
		<col />
		<col />
		<col />
		<col />
		<col />
		<col />
		<col />
		<col span="2" />
		<col />
		<col />
		<col />
		<col />
		<col />
	</colgroup>
	<tbody>
		<tr height="17">
			<td height="51" rowspan="3" style="height:51px;width:107px;">Nama SDP</td>
			<td colspan="2" rowspan="2" style="width:164px;">Capacity</td>
			<td rowspan="3" style="width:64px;">Nama Phase</td>
			<td colspan="4" style="width:301px;">Real Load Consumption</td>
			<td rowspan="2" style="width:64px;">Voltage</td>
			<td rowspan="3" style="width:97px;">Cos (Phi)</td>
			<td rowspan="2" style="width:64px;">Daya Semu</td>
			<td rowspan="2" style="width:84px;">Total Daya</td>
			<td rowspan="2" style="width:79px;">P</td>
			<td rowspan="3" style="width:141px;">Available capacity (kVA)</td>
		</tr>
		<tr height="17">
			<td height="17" style="height:17px;width:75px;">R</td>
			<td style="width:64px;">S</td>
			<td style="width:99px;">T</td>
			<td style="width:64px;">AVG</td>
		</tr>
		<tr height="17">
			<td height="17" style="height:17px;width:92px;">(Ampere)</td>
			<td style="width:72px;">(kVA)</td>
			<td style="width:75px;">(Ampere)</td>
			<td style="width:64px;">(Ampere)</td>
			<td style="width:99px;">(Ampere)</td>
			<td style="width:64px;">(Ampere)</td>
			<td style="width:64px;">Volt</td>
			<td style="width:64px;">(kVA)</td>
			<td style="width:84px;">(kVA)</td>
			<td style="width:79px;">(kWatt)</td>
		</tr>

		<?php 
		$totaldaya = array("PANEL SDP 1"=>"", "PANEL SDP 4"=>"",  
                  "PANEL SDP 6"=>"", "PANEL SDP 7"=>"",  
                  "PANEL SDP 8"=>""); 
					foreach($panel_sdp_detail_kpi as $list){
		?>
		<tr height="20">
			<td height="20" style="height:20px;"><?php echo $list['nama_panel']?></td>
			<td>
				<?php $capacityampere = 0;

					if ($list['nama_panel'] == "PANEL SDP 1"){
						$capacityampere = 400;
						echo number_format($capacityampere,2,".",".");
					} else if ($list['nama_panel'] == "PANEL SDP 4"){
						$capacityampere = 100;
						echo number_format($capacityampere,2,".",".");
					} else if ($list['nama_panel'] == "PANEL SDP 6"){
						$capacityampere = 400;
						echo number_format($capacityampere,2,".",".");
					} else if ($list['nama_panel'] == "PANEL SDP 7"){
						$capacityampere = 160;
						echo number_format($capacityampere,2,".",".");
					}  else if ($list['nama_panel'] == "PANEL SDP 8"){
						$capacityampere = 160;
						echo number_format($capacityampere,2,".",".");
					}  

				?>
			</td>
			<td>

				<?php $capacitykva = 0;
						$capacitykva = 1.73*380*$capacityampere/1000;
						echo number_format($capacitykva,2,".",".");
				?>
			</td>
			<td><?php echo $list['nama_phase']?></td>
			<td><?php echo  number_format($list['R'],2,".",".");?></td>
			<td><?php echo  number_format($list['S'],2,".",".");?></td>
			<td><?php echo  number_format($list['T'],2,".",".");?></td>
			<td>
				<?php $nilai = 0;

$pos = strpos($list['nama_phase'], "1");
				//var_dump($pos);
				if ($pos === 0){
						$nilai = (($list['R'] + $list['S'] + $list['T']));
						echo number_format($nilai,2,".",".");
					} else {
						$nilai = (($list['R'] + $list['S'] + $list['T'])/3);
						echo number_format($nilai,2,".",".");
					}
				?>
			</td>
			<td>
				<?php 

				if ($pos === 0){
					//echo "220.00";
					} else {
					//echo "380.00";
					}
					$nvol = number_format($list['AVG'],2,".",".");
					?> 


					<?php echo  number_format($list['AVG'],2,".",".");?>
			</td>
			<td>0.98</td>
			<td>
				<?php
					$kva = 0; 
					if ($pos === 0){
						$kva = $nvol*$nilai/1000;
						echo number_format($kva,2,".",".");
					} else {
						$kva = 1.73*$nvol*$nilai/1000;
						echo number_format($kva,2,".",".");
					}
				?> 
			</td>
			<td align="right"> 
				
			</td>
			<td align="right"><?php
					$p = $kva*0.98; 
					echo number_format($p,2,".",".");
				?></td>

			<td align="right">-</td>

		</tr>
		<?php } ?>
		
	</tbody>
</table>
</br>
</br>
Data Per Perangkat
</br>
<table border="1" cellpadding="0" cellspacing="0" width="1029" class="table table-striped m-b-none" data-ride="datatables">
	<colgroup>
		<col />
		<col />
		<col />
		<col span="3" />
		<col />
		<col span="2" />
		<col />
		<col />
		<col />
	</colgroup>
	<tbody>
		<tr height="17">
			<td rowspan="3" style="width:107px;">Nama SDP</td>
			<td rowspan="3" style="width:107px;">Nama Perangkat</td>
			<td rowspan="3" style="width:64px;">Nama Phase</td>
			<td colspan="4" style="width:301px;">Real Load Consumption</td>
			<td rowspan="2" style="width:64px;">Voltage</td>
			<td rowspan="3" style="width:97px;">Cos (Phi)</td>
			<td rowspan="2" style="width:64px;">Daya Semu</td>
			<td rowspan="2" style="width:64px;">P</td>
		</tr>
		<tr height="17">
			<td height="17" style="height:17px;width:75px;">R</td>
			<td style="width:64px;">S</td>
			<td style="width:99px;">T</td>
			<td style="width:64px;">AVG/SUM</td>
		</tr>
		<tr height="17">
			<td style="width:75px;">(Ampere)</td>
			<td style="width:64px;">(Ampere)</td>
			<td style="width:99px;">(Ampere)</td>
			<td style="width:64px;">(Ampere)</td>
			<td style="width:64px;">Volt</td>
			<td style="width:64px;">(kVA)</td>
			<td style="width:64px;">(kWatt)</td>
		</tr>
		<?php 
					foreach($panel_sdp_detail_kpi_perangkat as $list){
		?>
		<tr height="20">
			<td height="20" style="height:20px;"><?php echo $list['nama_panel']?></td>
			<td height="20" style="height:20px;"><?php echo $list['nama_perangkat']?></td>
			
			<td><?php echo $list['nama_phase']?></td>
			<td><?php echo  number_format($list['R'],2,".",".");?></td>
			<td><?php echo  number_format($list['S'],2,".",".");?></td>
			<td><?php echo  number_format($list['T'],2,".",".");?></td>
			<td>
				<?php $nilai = 0;

				$pos = strpos($list['nama_phase'], "1");
				//var_dump($pos);
				if ($pos === 0){
				
						$nilai = (($list['R'] + $list['S'] + $list['T']));
						echo number_format($nilai,2,".",".");
					} else {
						$nilai = (($list['R'] + $list['S'] + $list['T'])/3);
						echo number_format($nilai,2,".",".");
					}
				?>
			</td>
			<td>
				<?php if ($pos === 0){
					//echo "220.00";
					} else {
					//echo "380.00";
					}
					$nvol = number_format($list['AVG'],2,".",".");
					?> 


					<?php echo  number_format($list['AVG'],2,".",".");?>
			</td>
			<td>0.98</td>
			<td>
				<?php
					$kva = 0; 
					if ($pos === 0){
						$kva = $nvol*$nilai/1000;
						echo number_format($kva,2,".",".");
					} else {
						$kva = 1.73*$nvol*$nilai/1000;
						echo number_format($kva,2,".",".");
					}
				?> 
			</td>
			<td align="right"><?php
					$p = $kva*0.98; 
					echo number_format($p,2,".",".");
				?></td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>

</br>

</br>
B. Kapasitas berdasarkan MCB Amount
</br>
<table border="1" cellpadding="0" cellspacing="0" width="1111" class="table table-striped m-b-none">
	<colgroup>
		<col />
		<col />
		<col span="3" />
		<col />
		<col span="2" />
		<col />
		<col />
		<col />
		<col span="4" />
	</colgroup>
	<tbody>
		<tr height="21">
			<td height="120" rowspan="4" style="height:120px;width:103px;">SDP</td>
			<td colspan="14" rowspan="2" style="width:1005px;">MCB AMOUNT CAPACITY</td>
		</tr>
		<tr height="26">
		</tr>
		<tr height="31">
			<td colspan="3" height="31" style="height:31px;width:200px;">R</td>
			<td colspan="3" style="width:224px;">S</td>
			<td colspan="3" style="width:227px;">T</td>
			<td colspan="5">TOTAL&nbsp;</td>
		</tr>
		<tr height="42">
			<td height="42" style="height:42px;width:67px;">MCB&nbsp;</td>
			<td style="width:67px;">Capacity Used</td>
			<td style="width:67px;">Availabel Capacity</td>
			<td style="width:67px;">capacity</td>
			<td style="width:91px;">Capacity Used</td>
			<td style="width:67px;">Availabel Capacity</td>
			<td style="width:67px;">capacity</td>
			<td style="width:67px;">Capacity Used</td>
			<td style="width:93px;">Availabel Capacity</td>
			<td style="width:88px;">MCB</td>
			<td style="width:67px;">MCB USAGE</td>
			<td style="width:67px;">% USAGE</td>
			<td style="width:67px;">MCB AVAILABLE</td>
			<td style="width:67px;">% AVAILABLE</td>
		</tr>

		<?php 
					foreach($panel_sdp_detail_kpi_mcb_amount as $list2){
		?>
		
		<tr height="26">
			<td height="26" style="height:26px;width:103px;"><?php echo $list2['nama_panel_show'] ?></td>
			<td style="width:67px;"><?php echo $list2['mcb_r'] ?></td>
			<td style="width:67px;"><?php echo $list2['capacityused_r'] ?></td>
			<td style="width:67px;"><?php echo $list2['capacityavailability_r'] ?></td>
			<td style="width:67px;"><?php echo $list2['mcb_s'] ?></td>
			<td style="width:67px;"><?php echo $list2['capacityused_s'] ?></td>
			<td style="width:67px;"><?php echo $list2['capacityavailability_s'] ?></td>
			<td style="width:67px;"><?php echo $list2['mcb_t'] ?></td>
			<td style="width:67px;"><?php echo $list2['capacityused_t'] ?></td>
			<td style="width:67px;"><?php echo $list2['capacityavailability_t'] ?></td>
			<td style="width:67px;"><?php echo $list2['mcbtotal'] ?></td>
			<td style="width:67px;"><?php echo $list2['capacityusedtotal'] ?></td>
			<td><?php $p = $list2['capacityusedtotal']/$list2['mcbtotal']*100; 
					echo number_format($p,2,".",".")." %";
				?></td>
			<td><?php $p2 = $list2['mcbtotal']-$list2['capacityusedtotal']; 
					echo number_format($p2,2,".",".");
				?></td>
			<td><?php $p3 = $p2/$list2['mcbtotal']*100; 
					echo number_format($p3,2,".",".")." %";
				?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>

				</div>
				</form>
				</div>
			</section>
		</div>
	</div>

</section>