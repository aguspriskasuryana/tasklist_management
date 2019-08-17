<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<input class="input-sm input-s form-control tgl col-lg-2" size="16" type="text" data-date-format="dd-mm-yyyy" data-required="true" id="tgl">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-report">Create Report</button>
				</header>
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
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
						<tbody id="col_report">
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
    $('#example').dataTable({
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


$('.tgl').datepicker().on('changeDate', function (ev) {
  var tgl = $(this).val();
  $.getJSON('<?php echo site_url('report/get_data'); ?>', {tgl: tgl}, function(data) {
	$('#col_report').empty();
   var tbl_report = '';
   $.each(data, function(i,v) {
    tbl_report += '<tr><td>'+v['aktifitas']+'</td>';
    tbl_report += '<td>'+v['jam']+'</td>';
		if(v['pelaksanaan'] == 1){
		tbl_report += '<td>Task sudah dilaksanakan!</td>';
			if(v['paraf_pic'] == 1){
			tbl_report += '<td>Task sudah diparaf PIC!</td>';
			}else{
			tbl_report += '<td>Task belum diparaf!</td>';
			}
			if(v['paraf_supervisor'] == 1){
			tbl_report += '<td>Task sudah diparaf SPV!</td>';
			}else{
			tbl_report += '<td>Task belum diparaf SPV!</td></tr>';
			}
		}else{
			if(v['pelaksanaan'] == 2){
			tbl_report += '<td>Task tidak dilaksanakan!</td><td></td><td></td>';
			}else{
			tbl_report += '<td>Task belum dilaksanakan!</td><td></td><td></td>';
			}
		}
	tbl_report += '<td>'+v['keterangan']+'</td>';
	//$('#col_spv').append('<tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No data available in table</td></tr>');
	$('#col_report').empty().append(tbl_report);
});
});
});

</script>