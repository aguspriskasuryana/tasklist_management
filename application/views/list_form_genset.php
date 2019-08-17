
<style type="text/css">
	#radioBtn .notActive{
    color: #3276b1;
    background-color: #fff;
}
</style>
<script language="JavaScript">
$(document).ready(function() {

$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
</script>

<style type="text/css">
	#radioBtnx .notActive{
    color: #3276b1;
    background-color: #fff;
}
</style>
<script language="JavaScript">
$(document).ready(function() {

$('#radioBtnx a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
</script>
<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<a href="#" data-toggle="modal" data-target="#modal_tambah_genset" class="btn btn-success btn-xs Genset" title="Klik add form genset!">Tambah </a>
				
				</header>
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="5%">User</th>
								<th width="5%">Tanggal</th>
								<th width="5%">Jam Start</th>
								<th width="5%">Jam Stop</th>
								<th width="5%">Voltage Bateray</th>
								<th width="5%">Action</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($genset as $list){
						
					?>
						<tr>
							<td><?php echo $list['nama_lengkap']?></td>
							<td><?php echo $list['time_now']?></td>
							<td><?php echo $list['jam_start']?></td>
							<td><?php echo $list['jam_stop']?></td>
							<td><?php echo $list['voltage_bateray']?></td>
							
							<td>
							<a class="fa fa-edit" data-target="#modal_genset" data-toggle="modal" data-form_id=<?php echo $list['id_genset']?>></a>

							<!--|| 
							<a href="<?php echo site_url('form/hapusformgenset/'.$list['id_genset']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_form" data-toggle="tooltip" data-original-title="Delete Form"><i class="fa fa-trash-o"></i></a>
							-->
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

<div id="modal_genset" class="modal fade" role="dialog">
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

<div id="modal_tambah_genset" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/form/simpan_data_genset'); ?>" method="post">						
		    			
				<table border="0" width="100%">


					
        			<tr>
	        			<td>
	        			Jam Start
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam_start_genset" id="jam_start_genset" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Jam Stop
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="15:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam_stop_genset" id="jam_stop_genset" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			hours_meter
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="hours_meter" id="hours_meter" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			voltage_bateray
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="voltage_bateray" id="voltage_bateray" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			kwh
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="kwh" id="kwh" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			vol_r
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="vol_r" id="vol_r" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			vol_s
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="vol_s" id="vol_s" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			vol_t
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="vol_t" id="vol_t" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cur_r
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cur_r" id="cur_r" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cur_s
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cur_s" id="cur_s" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cur_t
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cur_t" id="cur_t" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			frekwensi
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="frekwensi" id="frekwensi" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cosQ
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cosQ" id="cosQ" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			oil_press
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="oil_press" id="oil_press" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			water_temp
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="water_temp" id="water_temp" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rpm
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rpm" id="rpm" >
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
	        			Status
	        			</td>
	        			<td>

	    				<input class="form-control" data-required="true" placeholder="" type="text" name="status" id="status" >
	    				
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


<script language="JavaScript">
    $(document).ready(function() {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {
          
            
          	$.post('<?php echo site_url('form/modalformgenset'); ?>',
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
			"aaSorting": [[1, 'desc']],
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
