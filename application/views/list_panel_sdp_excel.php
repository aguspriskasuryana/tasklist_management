<?php $id = $this->session->userdata('user_data'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Panel_SDP_".$tgl.".xls");

?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
        
        div.scrollmenu { 
            overflow-x:scroll;  
            margin-left:18em; 
            overflow-y:visible;
        }
        .headcol {
            position:absolute; 
            width:7em; 
            left:2em;
            height: 5em;
        }
        .headcol2 {
            position:absolute; 
            width:7em; 
            left:9em;
            height: 5em;
        }
        
</style>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				
				<div class="table-responsive">
					<form action="<?php echo base_url('index.php/panel_sdp/update_data_list'); ?>" method="post">

						<input type="hidden" name="nama_perangkat" value="<?php echo $nama_perangkat_select?>">
						<input type="hidden" name="nama_panel" value="<?php echo $nama_panel_select?>">
						<input type="hidden" name="mcb" value="<?php echo $mcb_select?>">
						<input type="hidden" name="koordinat_rak" value="<?php echo $koordinat_rak_select?>">
						<input type="hidden" name="tgl" value="<?php echo $tgl?>">

					<div class="scrollmenu">
						<table  class="table table-striped m-b-none" data-ride="datatables">

						<thead>
							<tr>
								<tr>
								<th width="1%" style="background-color: grey; color: black">Tanggal</th>
								<th width="4%" style="background-color: grey; color: black" class="headcol ">Nama</th>
								<th style="background-color: grey; color: black" width="3%" class="headcol2">Nama perangkat</th>
								<th style="background-color: grey; color: black" width="2%">MCB</th>
								<th style="background-color: grey; color: black" width="1%">Load</th>
								<th style="background-color: grey; color: black" width="1%">Phase</th>
								<th style="background-color: grey; color: black" width="1%">Nama Phase</th>
								<th style="background-color: grey; color: black" width="1%">Koordinat Rak</th>
								<th style="background-color: grey; color: black" width="1%">Koordinat Legrand</th>
								<th style="background-color: grey; color: black" width="1%">Current (Ampere)</th>
								<th style="background-color: grey; color: black" width="1%">Voltage (Volt)</th>
								<th style="background-color: grey; color: black" width="1">Tegangan 0-Ground (Volt)</th>
								<th style="background-color: grey; color: black" width="1%">Daya Semu (kVA)</th>
								<th style="background-color: grey; color: black" width="1%">Daya (Kilo Watt)</th>
								<th style="background-color: grey; color: black" width="1s%">Time Now</th>
								<th style="background-color: grey; color: black" width="1%">Aksi</th>
							</tr>
							</tr>
						</thead>
						<tbody>

							
							
					<?php 

						//var_dump($panel_sdp);
					foreach($panel_sdp as $list){
					?>
						<tr>

							<td><?php echo $list['tanggal']?></td>
							<td><?php echo $list['nama_panel']?></td>
							<td><?php echo $list['nama_perangkat']?></td>
							<td><?php echo $list['mcb']?></td>
							<td><?php echo $list['load']?></td>
							<td><?php echo $list['phase']?></td>
							<td><?php echo $list['nama_phase']?></td>
							<td><?php echo $list['koordinat_rak']?></td>
							<td><?php echo $list['koordinat_legrand']?></td>
							<td><?php echo $list['current_ampere']?></td>
							<td><?php echo $list['voltage_1_phase']?></td>
							<td><?php echo $list['grounding']?></td>
							<td>
								
							<?php 
								$nilai = 0;

								$pos = strpos($list['nama_phase'], "1");
								//var_dump($pos);
								if ($pos === 0){
										$nilai = (($list['current_ampere'] * $list['voltage_1_phase'])/1000);
										echo number_format($nilai,5,".",".");
									} else {
										$nilai = ((1.73 * $list['current_ampere'] * $list['voltage_1_phase'])/1000);
										echo number_format($nilai,5,".",".");
									}
								?>

							</td>
							<td><?php 
								$nilaidaya = $nilai*0.98;
								echo number_format($nilaidaya,5,".",".");
								?></td>
							<td><?php echo $list['time_now']?></td>

							<td>
							<a href="<?php echo site_url('panel_sdp/hapus/'.$list['id_panel_sdp']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
							
							</td>
							
						</tr>
							
						
					<?php
						
					}
					?>
						</tbody>

						</table>
					</div>

						<button type="submit" class="btn btn-default" data-dismiss="modal">save</button> 
				</form>
				
				</div>
			</section>
		</div>
	</div>

</section>
