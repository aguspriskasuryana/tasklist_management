<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
				*Untuk data AC Liebert yang lebih lawas bisa menggunakan export excel
					
				<form id="changetanggal" method="post" action="<?php echo site_url('form/getlistformacliebertexcel'); ?>"  class="panel-body">
						<div class="tab-pane fade active in" id="tanggal">
							<div class="col-sm-2">
							
								<table>
									<tr>
										<td>
										<input class="input-sm input-s form-control tglstart" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" value="<?php echo $tanggal ?>" name="tglstart">
										</td>
										<td>
										<input class="input-sm input-s form-control tglend" size="16" type="text" data-date-format="yyyy-mm-dd" data-required="true" value="<?php echo $tanggal ?>" name="tglend">
										</td>
										<td>
										<button type="submit" class="btn btn-default" data-dismiss="modal"><i class="fa fa-file-text-o"></i> Excel</button>
										</td>
									</tr>
								</table>

							</div>
						</div>
					</form>
				</header>
				
				<div class="table-responsive">

				<div class="scrollmenu">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">User</th>
								<th width="5%">Tanggal</th>
								<th width="5%">Jam</th>
								<th width="5%">Temp_AC I</th>
								<th width="5%">Temp_AC II</th>
								<th width="5%">Temp_AC III</th>
								<th width="5%">rh_AC I</th>
								<th width="5%">rh_AC II</th>
								<th width="5%">rh_AC III</th>
								<th width="5%">Temp UPS</th>
								<th width="5%">temp_snmp I</th>
								<th width="5%">temp_snmp II</th>
								<th width="5%">temp_snmp III</th>
								<th width="5%">rh_snmp I</th>
								<th width="5%">rh_snmp II</th>
								<th width="5%">rh_snmp III</th>
								<th width="5%">Action</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($acliebert as $list){
						
					?>
						<tr>
							<td><?php echo $list['nama_lengkap']?></td>
							<td><?php echo $list['time_now']?></td>
							<td><?php echo $list['jam']?></td>
							<td><?php echo $list['temp_ACI']?></td>
							<td><?php echo $list['temp_ACII']?></td>
							<td><?php echo $list['temp_ACIII']?></td>
							<td><?php echo $list['rh_ACI']?></td>
							<td><?php echo $list['rh_ACII']?></td>
							<td><?php echo $list['rh_ACIII']?></td>
							<td><?php echo $list['temp_ups']?></td>
							<td><?php echo $list['temp_snmpI']?></td>
							<td><?php echo $list['temp_snmpII']?></td>
							<td><?php echo $list['temp_snmpIII']?></td>
							<td><?php echo $list['rh_snmpI']?></td>
							<td><?php echo $list['rh_snmpII']?></td>
							<td><?php echo $list['rh_snmpIII']?></td>


							
							

							<td>
							<a class="fa fa-edit" data-target="#modal_acliebert" data-toggle="modal" data-form_id=<?php echo $list['id_ac']?>></a>

							<!--|| 
							<a href="<?php echo site_url('form/hapusformacliebert/'.$list['id_ac']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_form" data-toggle="tooltip" data-original-title="Delete Form"><i class="fa fa-trash-o"></i></a>
							-->
							</td>
							
						</tr>
							
						
					<?php
						
					}
					?>
						</tbody>
					</table>

				</div>
				</div>
			</section>
		</div>
	</div>

</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Konfirmasi Hapus!
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Akan Menghapus User?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>
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
        <div class="fetched-data"></div>
      </div>
    </div>

  </div>
</div>

<script>
$('.tglstart').datepicker();
$('.tglend').datepicker();
</script>

<script language="JavaScript">
    $(document).ready(function() {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {
                     
          	$.post('<?php echo site_url('form/modalformacliebert'); ?>',
                    {id:$(this).data('form_id')},
                    function(html){
                        $(".fetched-data").html(html);
                    }   
            );
		  
          
        })
    });
</script>

<script>
$(document).ready(function() {
    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 25,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[1, 'desc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [4] }, 
                { "bSearchable": false, "aTargets": [4] }],
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



$('.btn_delete_form').click(function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');} );
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>