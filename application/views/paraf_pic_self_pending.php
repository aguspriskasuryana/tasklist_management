<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
			
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
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">Aktifitas</th>
								<th width="3%">Tanggal</th>
								<th width="2%">Jam</th>
								<th width="2%">Mak</th>
								<th width="5%">Pelaksanaan</th>
								<th width="1%">BPO</th>
								<?php 
								$id = $this->session->userdata('user_data');
								?>
								
							</tr>
						</thead>
						<tbody>
					<?php 

					if($activity_listpending){	
					foreach($activity_listpending as $list){
						if($id['id_team'] == $list['id_team']){
					?>
						<tr>
							<td><?php echo $list['aktifitas']?></td>
							<td><?php echo $list['tanggal']?></td>
							<td><?php echo $list['jam']?></td>
							<td>
								<font color="red">
									<?php 
									$newtimestamp = strtotime($list['tanggal'].' '.$list['jam'].' + '.$list['duration'].' minute');
									echo date('H:i:s', $newtimestamp);
									?>	
								</font>
							</td>
								<?php if($list['pelaksanaan'] == 0){ ?>
							<td>
								<p id="<?php echo $list['id_act']?>" style="display:none"><?php echo $list['id_act']?></p>
								<a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_task" title="Klik apabila sudah melaksanakan task!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-star text-success text-active"></i></a>
								<a href="#" data-toggle="modal" data-target="#modal_tidak_kerja" class="btn btn-white btn-xs tidak-kerja" title="Klik apabila tidak melaksanakan task!"><i class="fa fa-exclamation-triangle text-muted text"></i><i class="fa fa-exclamation-triangle text-danger text-active"></i></a>
							</td>
								<?php }else{ 

									if($list['pelaksanaan'] == 1){	?>
							<td>
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
										echo '<font color="red">  selisih : '.$selisih.' menit</font>';
									} else {
										echo '<font color="green">  selisih : '.$selisih.' menit</font>';
									}
								}
								
								?>
								</p>
							</td>
								<?php } else{ ?>
								<td>
								<p><a href="#" data-toggle="class" class="btn btn-white btn-xs pelaksanaan_task active" disabled title="task sudah dilaksanakan!"><i class="fa fa-star-o text-muted text"></i><i class="fa fa-exclamation-triangle text-danger text-active"></i></a> <?php echo $list['keterangan']?></p>
								</td>
								
								<?php
									}
								}
								?>
								<td><a target="blank" href="<?php echo "../../BPO/".$teamSession['nama']."/".$list['link_bpo']?>" ><i class="fa fa-download"></i></a></td>
						</tr>
							
						
					<?php
						}
					}
				}
					?>
						</tbody>
					</table>
				</div>
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

$('.paraf').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		//alert(a);
		$.getJSON('<?php echo site_url('task/input_paraf/1'); ?>', {id_act:a});		
	}
});

$('.pelaksanaan_task').click(function(e){
	if($(this).hasClass('active') == false){
		$(this).addClass('active');
		$(this).prop('disabled',true);
		var a = $(this).prev().text();
		$.getJSON('<?php echo site_url('task/input_pelaksanaan/1'); ?>', {id_act:a});		
		$(this).next().remove();
		$(this).parent().next().children('.paraf').attr('disabled',false);
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