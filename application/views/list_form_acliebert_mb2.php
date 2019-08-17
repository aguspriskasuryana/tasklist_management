<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="#" data-toggle="modal" data-target="#modal_tambah_acliebert_mb2" class="btn btn-success btn-xs Genset" title="Klik add form genset!">Tambah </a>
				
				</header>
				<header class="panel-heading">
				*Untuk data AC Liebert MB2 yang lebih lawas bisa menggunakan export excel
					
				<form id="changetanggal" method="post" action="<?php echo site_url('form/getlistformacliebertmb2excel'); ?>"  class="panel-body">
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
								<th width="2%">User</th>
								<th width="1%">Tanggal</th>
								<th width="1%">Jam</th>
								<th width="3%">Temp_AC I</th>
								<th width="3%">Temp_AC II</th>
								<th width="3%">ratas_akhir_temp</th>
								<th width="3%">humidity_acI</th>
								<th width="3%">humidity_acII</th>
								<th width="3%">ratas_akhir_humid</th>
								<th width="3%">ac_liebert_mb2_no</th>
								<th width="1%">Action</th>
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
							<td><?php echo $list['ratas_akhir_temp']?></td>
							<td><?php echo $list['humidity_acI']?></td>
							<td><?php echo $list['humidity_acII']?></td>
							<td><?php echo $list['ratas_akhir_humid']?></td>
							<td><?php echo $list['ac_liebert_mb2_no']?></td>					
							
							<td>
							<a class="fa fa-edit" data-target="#modal_acliebert_mb2" data-toggle="modal" data-form_id=<?php echo $list['id_ac_mb2']?>></a>

							<!--|| 
							<a href="<?php echo site_url('form/hapusformacliebertmb2/'.$list['id_ac']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_form" data-toggle="tooltip" data-original-title="Delete Form"><i class="fa fa-trash-o"></i></a>
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

<div id="modal_acliebert_mb2" class="modal fade" role="dialog">
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

<div id="modal_tambah_acliebert_mb2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/form/simpan_data_acliebert_mb2'); ?>" method="post">						
		    			
				<table border="0" width="100%">
					
        			<tr>
	        			<td>
	        			Jam 
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam" id="jam" >
	        			</td>
        			</tr>


        			<tr>
	        			<td>
	        			temp_ACI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_ACI" id="temp_ACI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ACII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_ACII" id="temp_ACII" >
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			ratas_akhir_temp
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ratas_akhir_temp" id="ratas_akhir_temp" >
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			ket_batas_aman_temp
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ket_batas_aman_temp" id="ket_batas_aman_temp" >
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			humidity_acI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="humidity_acI" id="humidity_acI" >
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			humidity_acII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="humidity_acII" id="humidity_acII" >
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			ratas_akhir_humid
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ratas_akhir_humid" id="ratas_akhir_humid" >
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			ket_batas_aman_humid
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ket_batas_aman_humid" id="ket_batas_aman_humid" >
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			ac_liebert_mb2_no
	        			</td>
	        			<td>
	        			<select name="ac_liebert_mb2_no" id="ac_liebert_mb2_no" class="form-control m-b">
						<?php foreach($ac_liebert_mb2_no as $ac_liebert_mb2_nos){ ?>
							<option value="<?php echo $ac_liebert_mb2_nos;?>" ><?php echo $ac_liebert_mb2_nos?></option>
						<?php }	?>
                        </select>
	        			</td>
        			</tr>
           			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keterangan" id="keterangan" ></textarea>
	        			</td>
        			</tr>

           			<tr>
	        			<td>
	        			<span id="confirmMessage" class="confirmMessage"></span>
	        			</td>
	        			<td>
	        			<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Save</button>
	        			</td>
        			</tr>

        		</table>

			  </form>
      </div>
      <div class="modal-footer">
       
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
                     
          	$.post('<?php echo site_url('form/modalformacliebertmb2'); ?>',
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
