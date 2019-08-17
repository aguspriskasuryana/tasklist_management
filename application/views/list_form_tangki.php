<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					
					<a href="#" data-toggle="modal" data-target="#modal_tangki" class="btn btn-success btn-xs tangki" title="Klik add form Tangki!">Tambah Tangki</a>

					*Untuk data KWH yang lebih lawas bisa menggunakan export excel
					
					<form id="changetanggal" method="post" action="<?php echo site_url('form/getlistformtangkiexcel'); ?>"  class="panel-body">
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
				<header class="panel-heading">



					<table  class="table table-striped m-b-none" data-ride="datatables">
					
						<tr>
							<td>Tangki Pendam</td>
							<td>Tangki Harian</td>
						</tr>
						<tr>
							<td>
									<form action="<?php echo base_url('index.php/form/getlistformtangki'); ?>" method="post">
									<table >
									
									
									<tr>
									  	<td class="friendsList">Stick Tangki </td>
									  	<td>
									  		<div align="center" class="friendsList">:</div>
									  	</td>
									  	<td>
									  		<div align="left">
									    		<input type="text" name="slr" size="12" value="<?php echo $slr ?>" />
									    		<span class="friendsList">Cm</span>
											</div>
										</td>

									  	<td>
									  		<div align="center">
									          <input name="submit" type="submit" class="orangebutton" value="Calculate" />
									        </div>
										</td>
										
									</tr>
									<tr>
									  <td colspan="3">&nbsp;</td>
									</tr>
									<tr>
									  <td colspan="3" class="saveFeaturedBut" style="font-size:12px"><?php
									/*
									echo "Alas : "."$b <br>";
									echo "Miring : "."$r <br>";
									echo "b/r : "."$br <br>";
									echo "Sudut Juring : "."$sj <br>";
									echo "Panjang tabung : "."$t <br>";
									echo "Luas Juring : "."$lj<br>";
									echo "Volume Juring : "."$vj<br>";
									echo "Liter Juring : "."$ltj<br>";
									echo "Luas sgt : "."$ls<br>";
									echo "Volume sgt : "."$vs<br>";
									echo "Liter sgt : "."$lsg<br>";
									echo "Luas Temberang : "."$lt<br>";
									echo "Volume Temberang : "."$vt<br>";
									echo "Liter Temberang : "."$ltt<br>";
									echo "Luas lingkar : "."$ll<br>";
									echo "volum lingkar : "."$vl<br>";
									echo "liter lingkar : "."$ltl<br>";
									echo "ls > r   ==> L.Lingkaran - L.Temberang : "."$x1<br>";
									echo "ls = r   ==> 1/2 L.Lingkaran : "."$x2<br>";
									echo "luas daerah ukur : "."$x3<br>";
									echo "volum daerah ukur : "."$x4<br>";
									*/
									echo "volume solar : "."<u>$x5 </u></&nbsp>"; echo "liter";
									?></td>
									</tr>
									</table>
									</form>
									<script language='javascript'>
									<?php
									  if($slr > 150){
									?>
									alert('lebih dari 150 !!!!');
									<?php
									  }
									?>
									</script>
							</td>
							<td>
								<form action="<?php echo base_url('index.php/form/getlistformtangki'); ?>" method="post">
									<table >
									
									
									<tr>
									  	<td class="friendsList">Stick Tangki </td>
									  	<td>
									  		<div align="center" class="friendsList">:</div>
									  	</td>
									  	<td>
									  		<div align="left">
									    		<input type="text" name="slrh" size="12" value="<?php echo $slrh ?>" />
									    		<span class="friendsList">Cm (Max 100 Cm)</span>
											</div>
										</td>

									  	<td>
									  		<div align="center">
									          <input name="submit" type="submit" class="orangebutton" value="Calculate" />
									        </div>
										</td>
										
									</tr>
									<tr>
									  <td colspan="3">&nbsp;</td>
									</tr>
									<tr>
									  <td colspan="3" class="saveFeaturedBut" style="font-size:12px"><?php
									/*
									echo "Alas : "."$b <br>";
									echo "Miring : "."$r <br>";
									echo "b/r : "."$br <br>";
									echo "Sudut Juring : "."$sj <br>";
									echo "Panjang tabung : "."$t <br>";
									echo "Luas Juring : "."$lj<br>";
									echo "Volume Juring : "."$vj<br>";
									echo "Liter Juring : "."$ltj<br>";
									echo "Luas sgt : "."$ls<br>";
									echo "Volume sgt : "."$vs<br>";
									echo "Liter sgt : "."$lsg<br>";
									echo "Luas Temberang : "."$lt<br>";
									echo "Volume Temberang : "."$vt<br>";
									echo "Liter Temberang : "."$ltt<br>";
									echo "Luas lingkar : "."$ll<br>";
									echo "volum lingkar : "."$vl<br>";
									echo "liter lingkar : "."$ltl<br>";
									echo "ls > r   ==> L.Lingkaran - L.Temberang : "."$x1<br>";
									echo "ls = r   ==> 1/2 L.Lingkaran : "."$x2<br>";
									echo "luas daerah ukur : "."$x3<br>";
									echo "volum daerah ukur : "."$x4<br>";
									*/
									echo "volume solar : "."<u>$v </u></&nbsp>"; echo "liter";
									?></td>
									</tr>
									</table>
									</form>
									<script language='javascript'>
									<?php
									  if($slr > 100){
									?>
									alert('lebih dari 100 !!!!');
									<?php
									  }
									?>
									</script>
							</td>
						</tr>
					</table>



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

<div id="modal_tangki" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/form/simpan_data_tangki'); ?>" method="post">
	        	<p id="col_id_act_tangki" >
    			
				<table border="0" width="100%">		
        			<tr>
	        			<td>
	        			Jam Start
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam_start" id="jam_start" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Jam Stop
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="15:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam_stop" id="jam_stop" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Stick terbaca sebelum run
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="stick_terbaca_seb_run" id="stick_terbaca_seb_run" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Liter 1
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ltr1" id="ltr1" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Stick terbaca sudah run
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="stick_terbaca_sdh_run" id="stick_terbaca_sdh_run" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Liter 2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ltr2" id="ltr2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Selisih
	        			</td>
	        			<td>
	        			<input class="form-control"  data-required="true" placeholder="" type="text" name="selisih" id="selisih" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keterangantangki" id="keterangantangki" ></textarea>
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Status
	        			</td>
	        			<td>
	        			<div id="radioBtn" class="btn-group">
	    					<a class="btn btn-primary btn-sm active" data-toggle="status" data-title="Harian">Harian</a>
	    					<a class="btn btn-primary btn-sm notActive" data-toggle="status" data-title="Mingguan">Mingguan</a>
	    				</div>
	    				<input type="hidden" name="status" id="status">
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
<script>
$(document).ready(function()
{
 $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
});
</script>
<script>
$(document).ready(function()
{
    function updateVal()
    {
        var total = parseFloat($("#stick_terbaca_seb_run").val());

        var slrh = total;
        var z=0;
		var v=0;
		var r=60;
		var m=100;
		var t=1000;
			if(slrh >= 0 && slrh <= v){
				v=(slrh*r*m)/t;
			}	
				v=(slrh*r*m)/t;
					
		

        $("#ltr1").val(v);
        


        var total2 = parseFloat($("#stick_terbaca_sdh_run").val());
        var slrh = total2;
        var z=0;
		var v2=0;
		var r=60;
		var m=100;
		var t=1000;
			if(slrh >= 0 && slrh <= v2){
				v2=(slrh*r*m)/t;
			}	
				v2=(slrh*r*m)/t;

        $("#ltr2").val(v2);
        //var lt2 = $("#ltr2").val(v2);
        var selisih =0;
        selisih = Math.abs((v-v2));
        $("#selisih").val(selisih);
    }
    $(document).on("change, keyup", "#stick_terbaca_seb_run", updateVal);
    $(document).on("change, keyup", "#stick_terbaca_sdh_run", updateVal);
});
</script>
