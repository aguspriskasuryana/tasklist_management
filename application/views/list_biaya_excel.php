<?php $id = $this->session->userdata('user_data'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=biaya.xls");

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					
				Biaya
				</header>
				
				<div class="table-responsive">
					<table id="example" border="1" data-ride="datatables">
					<thead>
							<tr>
								<th width="10%">Nama </th>
								<th width="10%">No_reks</th>
								<th width="5%">Keterangans</th>
								<th width="10%">Jumlah</th>
								<th width="10%">Tanggal</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($biaya as $list){
						
					?>
						<tr>
							<td><?php echo $list['nama_gl']?></td>
							<td><?php echo $list['no_reks']?></td>
							<td><?php echo $list['keterangans']?></td>
							<td><?php echo $list['jumlah']?></td>
							<td><?php echo $list['tanggal']?></td>
							
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

</section>

