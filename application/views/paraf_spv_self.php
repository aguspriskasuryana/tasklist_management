<?php $id = $this->session->userdata('user_data'); ?>
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
				<a href="#" data-toggle="modal" data-target="#modal_addhoc" class="btn btn-white btn-xs addhoc" title="Klik untuk menambah adhoc!"><i class="fa fa-plus-square text-muted text"></i><i class="fa fa-plus-square text-active"></i>AddHoc</a>
				</header>
				<?php if (!empty($activity_list)) {?>
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">Aktifitas</th>
								<th width="3%">Jam</th>
								<th width="2%">Mak</th>
								<?php 
								$id = $this->session->userdata('user_data');
								if($id['id_team'] == $activity_list[0]['id_team']){
								?>
								<th width="5%">Pelaksanaan</th>
								<th width="1%">BPO</th>
								<?php 
								}else{}
								?>
							</tr>
						</thead>
						<tbody>
					<?php 
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
									echo date('H:i:s', $newtimestamp);
									?>	
								</font>
							</td>
							<?php 
							//$id = $this->session->userdata('user_data');
							//if($id['id_team'] == $activity_list[0]['id_team']){

							if($id['id_team'] == $activity_list[0]['id_team']){
							?>
							<td>
								<p id="<?php echo $list['id_act']?>" style="display:none"><?php echo $list['id_act']?></p>
								<?php 
								if($list['pelaksanaan'] == 0){
								?>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_task" title="Klik apabila sudah melaksanakan task!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<a href="#" data-toggle="modal" data-target="#modal_tidak_kerja" class="btn btn-white btn-xs tidak-kerja" title="Klik apabila tidak melaksanakan task!"><i class="fa fa-exclamation-triangle text-muted text"></i><i class="fa fa-exclamation-triangle text-danger text-active"></i></a>
								<?php 
								}else{
									if($list['pelaksanaan'] == 1){
								?>
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
										echo '<font color="red">  selisih : '.($selisih-$list['duration']) .' menit</font>';
									} else {
										echo '<font color="green">  selisih : '.$selisih.' menit</font>';
									}
								}
								
								?>
								</p>
								<?php
									}else{
								?>
									<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_task active" disabled title="task sudah dilaksanakan!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-exclamation-triangle text-danger text-active"></i></a><?php echo $list['keterangan']?>
								<?php
									}
								}
								?>
							</td>

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
		<textarea style="width: 549px; height: 62px;" placeholder="isikan alasan tidak mengerjakan di sini!"></textarea>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-tidak-kerja">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
$(document).ready(function() {



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

    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 100,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[1, 'asc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [2,3,4,5] }, 
                { "bSearchable": false, "aTargets": [2,3,4,5] }],
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
	}
});

$('.tidak-kerja').click(function(e){
	$('#col_id_act').text('');
	var a = $(this).prev().prev().text();
	$('#col_id_act').append(a);
});

$('.btn-tidak-kerja').click(function(e){
	var id = $(this).parent().prev().children('p').text();
	var b = $(this).parent().prev().children('textarea').val();
	//alert(b);
	//alert(id);
	

	if (b.length > 4){

		$('[id="'+id+'"]').next().remove();
		$.getJSON('<?php echo site_url('task/input_pelaksanaan/2'); ?>', {id_act:id,alasan:b});
		$('[id="'+id+'"]').next('.tidak-kerja').addClass('active');
		$('[id="'+id+'"]').next('.tidak-kerja').prop('disabled',true);
		$('#modal_tidak_kerja').modal('hide');		
	} else {
		$('#colalert').empty().append("masih kosong");
	}
});

</script>