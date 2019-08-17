<section class="panel">
	<header class="panel-heading text-right bg-light">
	  <ul class="nav nav-tabs pull-left">
		<li class="active"><a href="#tanggal" data-toggle="tab"><i class="fa fa-calendar text-default"></i></a></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog text-default"></i> Activity List<b class="caret"></b></a>
		  <ul class="dropdown-menu text-left">
			<li class=""><a href="#supervisor" data-toggle="tab">Supervisor</a></li>
			<li class=""><a href="#teknisi" data-toggle="tab">Teknisi</a></li>
			<li class=""><a href="#librarian" data-toggle="tab">Librarian</a></li>
		  </ul>
		</li>
		<li class=""><a href="#approve" data-toggle="tab"><i class="fa fa-thumbs-up text-default"></i> Approve</a></li>
	  </ul>
	  <span class="hidden-sm">-</span>
	</header>
	<div class="panel-body">
	  <div class="tab-content">              
		<div class="tab-pane fade active in" id="tanggal">
			<div class="col-sm-2">
				<select class="form-control m-b" id="btn_tanggal">
				<option>Pilih Tanggal</option>
				<?php foreach($tanggal as $tanggals){
				?>
				<option value="<?php echo $tanggals['tanggal'];?>"><?php echo date('d-m-Y',strtotime($tanggals['tanggal']));?></option>
				<?php 
				}
				?>
				</select>
			</div>
		</div>
		<div class="tab-pane fade" id="supervisor">
			<section class="scrollable wrapper">
				<div class="row">
					<div class="col-md-12">
						<section class="panel">
							<header class="panel-heading">
							<p>Aktifitas Tanggal <?php //echo date("d-m-Y",strtotime($activity_list[0]['tanggal']));?></p>
							</header>
							<div class="table-responsive">
								<table id="1" class="table table-striped m-b-none" data-ride="datatables">
								<thead>
										<tr>
											<th width="5%">Aktifitas</th>
											<th width="5%">Jam</th>
											<th width="5%">Pelaksanaan</th>
											<th width="5%">Paraf PIC</th>
											<th width="5%">Paraf Supervisor</th>
											<th width="5%">Keterangan</th>
											
										</tr>
									</thead>
									<tbody id="col_spv">
									</tbody>
								</table>
							</div>
						</section>
					</div>
				</div>
			</section>
		</div>
		<div class="tab-pane fade" id="teknisi">
			<section class="scrollable wrapper">
				<div class="row">
					<div class="col-md-12">
						<section class="panel">
							<header class="panel-heading">
							<p>Aktifitas Tanggal <?php //echo date("d-m-Y",strtotime($activity_list[0]['tanggal']));?></p>
							</header>
							<div class="table-responsive">
								<table id="2" class="table table-striped m-b-none" data-ride="datatables">
								<thead>
										<tr>
											<th width="5%">Aktifitas</th>
											<th width="5%">Jam</th>
											<th width="5%">Pelaksanaan</th>
											<th width="5%">Paraf PIC</th>
											<th width="5%">Paraf Supervisor</th>
											<th width="5%">Keterangan</th>
											
										</tr>
									</thead>
									<tbody id="col_tks">
									
									</tbody>
								</table>
							</div>
						</section>
					</div>
				</div>
			</section>
		</div>
		<div class="tab-pane fade" id="librarian">
			<section class="scrollable wrapper">
				<div class="row">
					<div class="col-md-12">
						<section class="panel">
							<header class="panel-heading">
							<p>Aktifitas Tanggal <?php //echo date("d-m-Y",strtotime($activity_list[0]['tanggal']));?></p>
							</header>
							<div class="table-responsive">
								<table id="3" class="table table-striped m-b-none" data-ride="datatables">
								<thead>
										<tr>
											<th width="5%">Aktifitas</th>
											<th width="5%">Jam</th>
											<th width="5%">Pelaksanaan</th>
											<th width="5%">Paraf PIC</th>
											<th width="5%">Paraf Supervisor</th>
											<th width="10%">Keterangan</th>
											
										</tr>
									</thead>
									<tbody id="col_lib">
									</tbody>
								</table>
							</div>
						</section>
					</div>
				</div>
			</section>
		</div>
		<div class="tab-pane fade" id="approve">
		<button id="btn-approve">Approve</button>
		</div>
	  </div>
	</div>
</section>
<script>
$(document).ready(function() {
    $('#1').dataTable({
			"searching": false,
			"bPaginate": false,
			"bProcessing": true,
			"bInfo": false,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[1, 'asc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [0,1,2,3,4,5] }, 
                { "bSearchable": false, "aTargets": [0,1,2,3,4,5] }],
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
		
	$('#2').dataTable({
			"searching": false,
			"bPaginate": false,
			"bProcessing": true,
			"bInfo": false,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[1, 'asc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [0,1,2,3,4,5] }, 
                { "bSearchable": false, "aTargets": [0,1,2,3,4,5] }],
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
		
	$('#3').dataTable({
			"searching": false,
			"bPaginate": false,
			"bProcessing": true,
			"bInfo": false,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[1, 'asc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [0,1,2,3,4,5] }, 
                { "bSearchable": false, "aTargets": [0,1,2,3,4,5] }],
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

$('#btn_tanggal').change(function(){
	var tgl = $('#btn_tanggal').val();
  $.getJSON('<?php echo site_url('task/isi_paraf_akhir'); ?>', {tgl: tgl}, function(data) {
	$('#col_spv').empty();
	$('#col_tks').empty();
	$('#col_lib').empty();
   var tbl_spv = '';
   var tbl_tks = '';
   var tbl_lib = '';
   $.each(data, function(i,v) {
	if(v['id_team'] == 1){
    tbl_spv += '<tr><td>'+v['aktifitas']+'</td>';
    tbl_spv += '<td>'+v['jam']+'</td>';
		if(v['pelaksanaan'] == 1){
		tbl_spv += '<td>Task sudah dilaksanakan!</td>';
			if(v['paraf_pic'] == 1){
			tbl_spv += '<td>Task sudah diparaf PIC!</td>';
			}else{
			tbl_spv += '<td>Task belum diparaf!</td>';
			}
			if(v['id_paraf_supervisor'] == v['assigner']){
			tbl_spv += '<td>Task sudah diparaf SPV!</td>';
			}else{
			tbl_spv += '<td>Task belum diparaf SPV!</td></tr>';
			}
		}else{
			if(v['pelaksanaan'] == 2){
			tbl_spv += '<td>Task tidak dilaksanakan!</td><td></td><td></td>';
			}else{
			tbl_spv += '<td>Task belum dilaksanakan!</td><td></td><td></td>';
			}
		}
	tbl_spv += '<td>'+v['keterangan']+'</td>';
	//$('#col_spv').append('<tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>');
	$('#col_spv').empty().append(tbl_spv);
	}
	if(v['id_team'] == 45){
    tbl_tks += '<tr><td>'+v['aktifitas']+'</td>';
    tbl_tks += '<td>'+v['jam']+'</td>';
		if(v['pelaksanaan'] == 1){
		tbl_tks += '<td>Task sudah dilaksanakan!</td>';
			if(v['paraf_pic'] == 1){
			tbl_tks += '<td>Task sudah diparaf PIC!</td>';
			}else{
			tbl_tks += '<td>Task belum diparaf!</td>';
			}
			if(v['id_paraf_supervisor'] == v['assigner']){
			tbl_tks += '<td>Task sudah diparaf SPV!</td>';
			}else{
			tbl_tks += '<td>Task belum diparaf SPV!</td></tr>';
			}
		}else{
			if(v['pelaksanaan'] == 2){
			tbl_tks += '<td>Task tidak dilaksanakan!</td><td></td><td></td>';
			}else{
			tbl_tks += '<td>Task belum dilaksanakan!</td><td></td><td></td>';
			}
		}
	tbl_tks += '<td>'+v['keterangan']+'</td></tr>';
	//$('#col_spv').append('<tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>');
	$('#col_tks').empty().append(tbl_tks);
	}
	if(v['id_team'] == 44){
    tbl_lib += '<tr><td>'+v['aktifitas']+'</td>';
    tbl_lib += '<td>'+v['jam']+'</td>';
		if(v['pelaksanaan'] == 1){
		tbl_lib += '<td>Task sudah dilaksanakan!</td>';
			if(v['paraf_pic'] == 1){
			tbl_lib += '<td>Task sudah diparaf PIC!</td>';
			}else{
			tbl_lib += '<td>Task belum diparaf!</td>';
			}
			if(v['id_paraf_supervisor'] == v['assigner']){
			tbl_lib += '<td>Task sudah diparaf SPV!</td>';
			}else{
			tbl_lib += '<td>Task belum diparaf SPV!</td></tr>';
			}
		}else{
			if(v['pelaksanaan'] == 2){
			tbl_lib += '<td>Task tidak dilaksanakan!</td><td></td><td></td>';
			}else{
			tbl_lib += '<td>Task belum dilaksanakan!</td><td></td><td></td>';
			}
		}
	tbl_lib += '<td>'+v['keterangan']+'</td></tr>';
	//$('#col_spv').append('<tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>');
	$('#col_lib').empty().append(tbl_lib);
	}
   });
   
  });  
  

});

$('#btn-approve').click(function(){
	var tgl = $('#btn_tanggal').val();
	$.getJSON('<?php echo site_url('task/approve'); ?>', {tanggal: tgl},function(data){
	location.reload(true);
	});
  });
</script>