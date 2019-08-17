<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
			<header class="panel-heading">
				

				<select name="shift" id="shift" class="form-control m-b">
						<option value="select" >All Shift</option>
						<option value="0" >Shift 3 Yesterday</option>
						<option value="1" >Shift 1</option>
						<option value="2" >Shift 2</option>
						<option value="3" >Shift 3</option>
				</select>


				</header>
				<header class="panel-heading">
				<p>Aktifitas <?php if (!empty($activity_list)) {echo date("d-m-Y",strtotime($activity_list[0]['tanggal']) );}?></p>
				</header>
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">Aktifitas</th>
								<th width="3%">Jam</th>
								<th width="2%">Mak</th>
								<th width="6%">Pelaksanaan</th>
								<th width="5%">Paraf Supervisor BKS</th>
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
							<td><?php echo $list['team'].":".$list['aktifitas']?></td>
							<td><?php echo $list['tanggal']?> <?php echo $list['jam']?></td>
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
								<p><font color="red">Task Belum Dilaksanakan</font></p>
							</td>
							<td>
								
							</td>
								<?php 
								}else{
									if($list['pelaksanaan'] == 1){
								?>
							<td>
								<p><font color="green">Task selesei pada pukul <?php echo $list['last_modified']?>
									
								</font>
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
								<p><font color="green">PIC paraf <?php echo $list['time_paraf_pic'] ?> </font> 
								
								
								</p>
								<?php 
								}else{
								?>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs paraf" title="Klik untuk paraf!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<?php
								}
								?>
							</td>
								<?php
									} else{
								?>
								<td>
								<p><font color="green"><?php echo $list['keterangan']?></font></p>
								</td>
								<td>
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



$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min =  $('#min').val();
        var max =  $('#max').val();


        var shift =  $('#shift').val();
        var createdAt = data[1] || 0; // use data for the age column
 
var timetable = new Date('2018-01-02 '+createdAt).getTime();


var shift3kemarindatang = new Date('2018-01-01 23:01:00').getTime();
var shift3kemarinpulang = new Date('2018-01-02 07:30:00').getTime();

var shift1datang = new Date('2018-01-02 07:31:00').getTime();
var shift1pulang = new Date('2018-01-02 16:00:00').getTime();

var shift2datang = new Date('2018-01-02 16:01:00').getTime();
var shift2pulang = new Date('2018-01-02 23:00:00').getTime();

var shift3datang = new Date('2018-01-02 23:01:00').getTime();
var shift3pulang = new Date('2018-01-03 07:30:00').getTime();


			//alert(timetable +">"+ shift1datang+""+(timetable > shift1datang));

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

    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 300,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[1, 'asc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [2,3] }, 
                { "bSearchable": false, "aTargets": [2,3] }],
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