<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
			<header class="panel-heading">
				
				</header>
				<header class="panel-heading">
				<p>Aktifitas yang pending</p>
						<select id="btn_tanggal_new" name="btn_tanggal_new">
								<option value="0">Pilih Tanggal</option>
								<?php 
								foreach($tanggalpending as $tanggals){ 
								?>
								<option value="<?php echo $tanggals['tanggal'];?>"><?php echo date('Y-m-d',strtotime($tanggals['tanggal']));?></option>
								<?php }	?>
				</select>	
				</header>
				<?php if (!empty($activity_listpending)) {?>
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">Aktifitas</th>
								<th width="5%">Tanggal</th>
								<th width="5%">Jam</th>
								<?php 
								$id = $this->session->userdata('user_data');
								if($id['id_team'] == $activity_listpending[0]['id_team']){
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
					foreach($activity_listpending as $list){

						if($id['id_team'] == $list['id_team']){
					?>
						<tr>
							<td><?php echo $list['aktifitas']?></td>
							<td><?php echo $list['tanggal']?></td>
							<td><?php echo $list['jam']?></td>
							<?php 
							//$id = $this->session->userdata('user_data');
							//if($id['id_team'] == $activity_list[0]['id_team']){

							if($id['id_team'] == $activity_listpending[0]['id_team']){
							?>
							<td>
								<p id="<?php echo $list['id_act']?>" style="display:none"><?php echo $list['id_act']?></p>
								<?php 
								if($list['pelaksanaan'] == 0){
								?>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_task" title="Klik apabila sudah melaksanakan task!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<a href="#" data-toggle="modal" data-target="#modal_tidak_kerja" class="btn btn-white btn-xs tidak-kerja" title="Klik apabila tidak melaksanakan task!"><i class="fa fa-exclamation-triangle text-muted text"></i><i class="fa fa-exclamation-triangle text-danger text-active"></i></a>

								<?php if ((strlen($list['form']) > 0) ){ 

									$form = preg_replace('/\s+/', '', $list['form']);
									$expform = explode(",",$form);

									foreach($expform as $expforms){
										switch ($expforms) {
										    case "ups":
										        ?>
												<a href="#" data-toggle="modal" data-target="#modal_ups" class="btn btn-white btn-xs ups" title="Klik add form ups!">UPS</a>
										        <?php
										        break;
										    case "blue":
										        echo "";
										        break;
										    case "green":
										        echo "";
										        break;
										    default:

										        echo "";
										}
									}
									?>

								<?php } ?>


								<?php 
								}else{
									if($list['pelaksanaan'] == 1){
								?>
								<p><font color="green">Task selesai pada <?php echo $list['last_modified'] ?> </font> 
								
								<?php
								$jamx= $list['jam']; 
								if ($jamx != ""){
									$starttime = $list['tanggal']." ".$list['jam'];
									$from_time = strtotime($starttime);
									$to_time = strtotime($list['last_modified']);
									$selisih = round(abs($to_time - $from_time) / 60,0);

									$real = round(($to_time - $from_time) / 60,0);
									if ($real < 0) {
										echo '<font color="blue">  Lebih awal : '.$selisih.' menit</font>';
									} elseif ($selisih > $list['duration']) {
										echo '<font color="red">  selisih : '.$selisih.' menit</font>';
									} else {
										echo '<font color="green">  selisih : '.$selisih.' menit</font>';
									}
								}
								
								?>
								</p>
								<?php
									}else{
								?>
									<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_task active" disabled title="task sudah dilaksanakan!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-exclamation-triangle text-danger text-active"></i></a> <?php echo $list['keterangan']?>
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

<div id="modal_ups" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_addhoc'); ?>" method="post">
				
				<div class="form-group">
				  <label class="col-lg-2 control-label">Jam</label>
				  <div class="col-lg-10">
					
				  		<input class="form-control" data-required="true" placeholder="08:30:00"  type="text" name="jam_addhoc" id="jam" >
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
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-tidak-kerja">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>





</section>
<script>
$(document).ready(function() {

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {

        var tanggal =  $('#btn_tanggal_new').val();
        var createdAt = data[1] || 0; // use data for the age column
 
var timetable = new Date(createdAt).getTime();
var tanggalpilih = new Date(tanggal).getTime();

		if (tanggalpilih == timetable){
			return true;
		} else if (tanggal=='0'){
			return true;
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
				


			    $('#btn_tanggal_new').change(function(){
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
	$('[id="'+id+'"]').next().remove();
	$.getJSON('<?php echo site_url('task/input_pelaksanaan/2'); ?>', {id_act:id,alasan:b});
	$('[id="'+id+'"]').next('.tidak-kerja').addClass('active');
	$('[id="'+id+'"]').next('.tidak-kerja').prop('disabled',true);
	$('#modal_tidak_kerja').modal('hide');	
});

 



</script>
<script>

</script>