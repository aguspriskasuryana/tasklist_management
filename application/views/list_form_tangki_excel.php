<?php $id = $this->session->userdata('user_data'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=tangki.xls");

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					
				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">User</th>
								<th width="5%">Tanggal</th>
								<th width="5%">Jam Start</th>
								<th width="5%">Jam Stop</th>
								<th width="5%">Stick terbaca sebelum Run</th>
								<th width="5%">liter</th>
								<th width="5%">Stick terbaca setelah Run</th>
								<th width="5%">liter</th>
								<th width="5%">Selisih</th>
								<th width="5%">Keterangan</th>
								<th width="5%">Action</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($tangki as $list){
						
					?>
						<tr>
							<td><?php echo $list['nama_lengkap']?></td>
							<td><?php echo $list['time_now']?></td>
							<td><?php echo $list['jam_start']?></td>
							<td><?php echo $list['jam_stop'] ?></td>
							<td><?php echo $list['stick_terbaca_seb_run'] ?></td>
							<td><?php echo $list['ltr1'] ?></td>
							<td><?php echo $list['stick_terbaca_sdh_run'] ?></td>
							<td><?php echo $list['ltr2'] ?></td>
							<td><?php echo $list['selisih'] ?></td>
							<td><?php echo $list['keterangan'] ?></td>

							<td>
							<!--<a href="<?php echo site_url('form/edit_form_ups/'.$list['id_form_ups']); ?>" class="btn detail_icon btn-xs btn-danger btn_edit_form" data-toggle="tooltip" data-original-title="Edit Form"><i class="fa fa-edit"></i></a> || -->
							<a href="<?php echo site_url('form/hapusformtangki/'.$list['id_tangki']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_form" data-toggle="tooltip" data-original-title="Delete Form"><i class="fa fa-trash-o"></i></a>
							
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
				
				$('[data-toggle="tooltip"]').tooltip();
			}
		});
});



</script>