<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
				

					<form id="changetanggal" method="post" action="<?php echo site_url('form/getlistformlvmdpexcel'); ?>"  class="panel-body">
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
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">User</th>
								<th width="5%">Team</th>
								<th width="5%">Tanggal</th>
								<th width="5%">Jam</th>
								<th width="5%">PB ON OFF</th>
								<th width="5%">cos phi</th>
								<th width="5%">LVMDP No</th>
								<th width="5%">Action</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($lvmdp as $list){
						
					?>
						<tr>
							<td><?php echo $list['nama_lengkap']?></td>
							<td><?php echo $list['nama']?></td>
							<td><?php echo $list['time_now']?></td>
							<td><?php echo $list['jam']?></td>
							<td><?php 
							if ($list['pb_on_off'] == 1){
								echo "ON";
							} else {
								echo "OFF";
							}
							 
							?>
							</td>
							<td><?php echo $list['cos_phi'] ?></td>
							<td><?php echo $list['lvmdp_no'] ?></td>

							<td>
							<a class="fa fa-edit" data-target="#modal_lvmdp" data-toggle="modal" data-form_id=<?php echo $list['id_lvmdp']?>></a>
							 <!--||
							<a href="<?php echo site_url('form/hapusformlvmdp/'.$list['id_lvmdp']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_form" data-toggle="tooltip" data-original-title="Delete Form"><i class="fa fa-trash-o"></i></a> -->
							
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

<div id="modal_lvmdp" class="modal fade" role="dialog">
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
          
            
          	$.post('<?php echo site_url('form/modalformlvmdp'); ?>',
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
			"iDisplayLength": 100,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[2, 'desc']],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [5] }, 
                { "bSearchable": false, "aTargets": [5] }],
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
