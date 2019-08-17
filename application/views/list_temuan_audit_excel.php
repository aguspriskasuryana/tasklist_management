<?php $id = $this->session->userdata('user_data'); ?>
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=temuan_audit.xls");

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
								<th width="3%">Tema Temuan</th>
								<th width="3%">Judul Temuan</th>
								<th width="2%">Kategori</th>
								<th width="3%">Batas Waktu RPM</th>
								<th width="10%">Realisasi</th>
								<th width="1%">Status</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($temuan_audit as $list){
						
					?>
						<tr>
							<td><a href="<?php echo site_url('temuan_audit/edit_temuan_audit/'.$list['id_temuan_audit']); ?>"><?php echo $list['tema_temuan']?></a></td>
							<td><?php echo $list['judul_temuan']?></td>
							<td><?php echo $list['kategori_temuan']?></td>
							<td><?php echo $list['batas_waktu_rpm']?></td>
							<td><?php echo $list['realisasi']?></td>
							<?php if($list['status'] =="memadai") {?>
							<td style="color: green"><?php echo $list['status']?>
							<?php } else if($list['status'] =="tidak_memadai") { ?>
							<td style="color: red"><?php echo $list['status']?>
							<?php } else {?>
							<td style="color: yellow"><?php echo $list['status']?>
							<?php } ?>

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