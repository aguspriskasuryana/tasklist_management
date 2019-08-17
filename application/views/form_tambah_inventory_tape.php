<?php

//echo form_open_multipart(site_url()."/master/user/tambah_user/".$id,array("id"=>"form-materi"));

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading font-bold">Form Tambah Inventory_tape</header>

			<header class="panel-heading">
				<form id="changeinventory_tape" method="post" action="<?php echo base_url('index.php/inventory_tape/tambah_inventory_tape'); ?>"  class="panel-body">


				<div class="form-group">
				<label class="col-lg-2 control-label">Tipe</label>
					<div class="col-sm-6">
						<select onchange="this.form.submit()" class="form-control m-b-8" id="btn_typ_tbl" name="btn_typ_tbl">
								<option>Pilih Tipe</option>
								<?php 
								foreach($typ_tbl as $typ_tbls){ 
								?>
								<?php if ($typ_tbls['TYP_ID'] == $typ_tblselect){?>
								<option value="<?php echo $typ_tbls['TYP_ID'];?>" selected><?php echo $typ_tbls['TYP_NAME'];?></option>
								<?php } else { ?>
								<option value="<?php echo $typ_tbls['TYP_ID'];?>"><?php echo $typ_tbls['TYP_NAME'];?></option>
								<?php } ?>
								<?php 
								}
								?>
						</select>
					 </div>
				</div>


				
				</form>

				</header>

			<header class="">
	                <ul class="nav nav-tabs ">
	                  <li class="col-sm-4 bg-info">
	                  <a href="#tab1" data-toggle="tab" id="count_silo">
	                  	<span class="m-b-xs h4 block"><?php echo $count_silo[0]['counttape']?></span>
                        <small class="">Silo </small>
	                  </a></li>
	                  <li class="active col-sm-4 bg-success">
	                  <a href="#tab2" data-toggle="tab" id="count_library_catridge">
	                  	<span class="m-b-xs h4 block"><?php echo $count_library_catridge[0]['counttape']?></span>
                        <small class="">Library Catridge</small>
	                  </a></li>
	                  <li class="col-sm-4 bg-danger">
	                  <a href="#tab3" data-toggle="tab" id="count_library_paper">
	                  	<span class="m-b-xs h4 block"><?php echo $count_library_paper[0]['counttape']?></span>
                        <small class="">Library Paper</small>
	                  </a>
	                  </li>
	                </ul>
	            </header>
				<div class="tab-content">
					<div class="tab-pane" id="tab1">
		                <div class="text-center wrapper">
		                1
		                </div>
		            </div>
		            <div class="tab-pane active" id="tab2">
		                <div class="text-center wrapper">

		                <section class="panel no-borders hbox">
			                <aside class="btn-white lter r-l text-center v-middle">
			                  <div class="col-md-6">
		                	<h4 class="m-t-xl">Rack Num</h4>
	                    	<table style="width:50%">
							  <tr>
							    <td><a id="sublocationA3" class="btn  <?php if(($catridgeA3[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?>  btn-m">A.3 <br><small class="pull-right text-xs"><?php echo $catridgeA3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationB3" class="btn <?php if(($catridgeB3[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">B.3 <br><small class="pull-right text-xs"><?php echo $catridgeB3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationC3" class="btn <?php if(($catridgeC3[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">C.3 <br><small class="pull-right text-xs"><?php echo $catridgeC3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationD3" class="btn <?php if(($catridgeD3[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">D.3 <br><small class="pull-right text-xs"><?php echo $catridgeD3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationE3" class="btn <?php if(($catridgeE3[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">E.3 <br><small class="pull-right text-xs"><?php echo $catridgeE3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationF3" class="btn <?php if(($catridgeF3[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">F.3 <br><small class="pull-right text-xs"><?php echo $catridgeF3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationG3" class="btn <?php if(($catridgeG3[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">G.3 <br><small class="pull-right text-xs"><?php echo $catridgeG3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationH3" class="btn <?php if(($catridgeH3[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">H.3 <br><small class="pull-right text-xs"><?php echo $catridgeH3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationI3" class="btn <?php if(($catridgeI3[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">I.3 <br><small class="pull-right text-xs"><?php echo $catridgeI3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationJ3" class="btn <?php if(($catridgeJ3[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">J.3 <br><small class="pull-right text-xs"><?php echo $catridgeJ3[0]['counttape']?></small></a></td>
							  </tr>
							  <tr>
							    <td><a id="sublocationA2" class="btn  <?php if(($catridgeA2[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?>  btn-m">A.2 <br><small class="pull-right text-xs"><?php echo $catridgeA2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationB2" class="btn <?php if(($catridgeB2[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">B.2 <br><small class="pull-right text-xs"><?php echo $catridgeB2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationC2" class="btn <?php if(($catridgeC2[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">C.2 <br><small class="pull-right text-xs"><?php echo $catridgeC2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationD2" class="btn <?php if(($catridgeD2[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">D.2 <br><small class="pull-right text-xs"><?php echo $catridgeD2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationE2" class="btn <?php if(($catridgeE2[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">E.2 <br><small class="pull-right text-xs"><?php echo $catridgeE2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationF2" class="btn <?php if(($catridgeF2[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">F.2 <br><small class="pull-right text-xs"><?php echo $catridgeF2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationG2" class="btn <?php if(($catridgeG2[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">G.2 <br><small class="pull-right text-xs"><?php echo $catridgeG2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationH2" class="btn <?php if(($catridgeH2[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">H.2 <br><small class="pull-right text-xs"><?php echo $catridgeH2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationI2" class="btn <?php if(($catridgeI2[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">I.2 <br><small class="pull-right text-xs"><?php echo $catridgeI2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationJ2" class="btn <?php if(($catridgeJ2[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">J.2 <br><small class="pull-right text-xs"><?php echo $catridgeJ2[0]['counttape']?></small></a></td>
							  </tr>
							  <tr>
							    <td><a id="sublocationA1" class="btn  <?php if(($catridgeA1[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?>  btn-m">A.1 <br><small class="pull-right text-xs"><?php echo $catridgeA1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationB1" class="btn <?php if(($catridgeB1[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">B.1 <br><small class="pull-right text-xs"><?php echo $catridgeB1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationC1" class="btn <?php if(($catridgeC1[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">C.1 <br><small class="pull-right text-xs"><?php echo $catridgeC1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationD1" class="btn <?php if(($catridgeD1[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">D.1 <br><small class="pull-right text-xs"><?php echo $catridgeD1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationE1" class="btn <?php if(($catridgeE1[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">E.1 <br><small class="pull-right text-xs"><?php echo $catridgeE1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationF1" class="btn <?php if(($catridgeF1[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">F.1 <br><small class="pull-right text-xs"><?php echo $catridgeF1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationG1" class="btn <?php if(($catridgeG1[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">G.1 <br><small class="pull-right text-xs"><?php echo $catridgeG1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationH1" class="btn <?php if(($catridgeH1[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">H.1 <br><small class="pull-right text-xs"><?php echo $catridgeH1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationI1" class="btn <?php if(($catridgeI1[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">I.1 <br><small class="pull-right text-xs"><?php echo $catridgeI1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationJ1" class="btn <?php if(($catridgeJ1[0]['counttape']) > 0 ){ echo 'btn-danger';}else{echo 'btn-success';}?> btn-m">J.1 <br><small class="pull-right text-xs"><?php echo $catridgeJ1[0]['counttape']?></small></a></td>
							  </tr>
							  
							</table> 

		                	<h4 class="m-t-xl"><========Jalan Masuk=======</h4>
							</div>

			                </aside>

			                <aside>
			                  <div class="col-md-6">

		                	<small class="">U Num</small>
	                    	<table style="width:50%">
	                    	  <tr>
							    <td><a id="sublocation8A" class="btn btn-success btn-xs">8.A</a></td>
							    <td><a id="sublocation8B" class="btn btn-success btn-xs">8.B</a></td>
							    <td><a id="sublocation8C" class="btn btn-success btn-xs">8.C</a></td>
							    <td><a id="sublocation8D" class="btn btn-success btn-xs">8.D</a></td>
							    <td><a id="sublocation8E" class="btn btn-success btn-xs">8.E</a></td>
							    <td><a id="sublocation8F" class="btn btn-success btn-xs">8.F</a></td>
							    <td><a id="sublocation8G" class="btn btn-success btn-xs">8.G</a></td>
							    <td><a id="sublocation8H" class="btn btn-success btn-xs">8.H</a></td>
							    <td><a id="sublocation8I" class="btn btn-success btn-xs">8.I</a></td>
							    <td><a id="sublocation8J" class="btn btn-success btn-xs">8.J</a></td>
							  </tr>
							   <tr>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
							  </tr>	
	                    	  <tr>
							    <td><a id="sublocation7A" class="btn btn-success btn-xs">7.A</a></td>
							    <td><a id="sublocation7B" class="btn btn-success btn-xs">7.B</a></td>
							    <td><a id="sublocation7C" class="btn btn-success btn-xs">7.C</a></td>
							    <td><a id="sublocation7D" class="btn btn-success btn-xs">7.D</a></td>
							    <td><a id="sublocation7E" class="btn btn-success btn-xs">7.E</a></td>
							    <td><a id="sublocation7F" class="btn btn-success btn-xs">7.F</a></td>
							    <td><a id="sublocation7G" class="btn btn-success btn-xs">7.G</a></td>
							    <td><a id="sublocation7H" class="btn btn-success btn-xs">7.H</a></td>
							    <td><a id="sublocation7I" class="btn btn-success btn-xs">7.I</a></td>
							    <td><a id="sublocation7J" class="btn btn-success btn-xs">7.J</a></td>
							  </tr>
							   <tr>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
							  </tr>	
	                    	  <tr>
							    <td><a id="sublocation6A" class="btn btn-success btn-xs">6.A</a></td>
							    <td><a id="sublocation6B" class="btn btn-success btn-xs">6.B</a></td>
							    <td><a id="sublocation6C" class="btn btn-success btn-xs">6.C</a></td>
							    <td><a id="sublocation6D" class="btn btn-success btn-xs">6.D</a></td>
							    <td><a id="sublocation6E" class="btn btn-success btn-xs">6.E</a></td>
							    <td><a id="sublocation6F" class="btn btn-success btn-xs">6.F</a></td>
							    <td><a id="sublocation6G" class="btn btn-success btn-xs">6.G</a></td>
							    <td><a id="sublocation6H" class="btn btn-success btn-xs">6.H</a></td>
							    <td><a id="sublocation6I" class="btn btn-success btn-xs">6.I</a></td>
							    <td><a id="sublocation6J" class="btn btn-success btn-xs">6.J</a></td>
							  </tr>
							   <tr>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
							  </tr>	
	                    	  <tr>
							    <td><a id="sublocation5A" class="btn btn-success btn-xs">5.A</a></td>
							    <td><a id="sublocation5B" class="btn btn-success btn-xs">5.B</a></td>
							    <td><a id="sublocation5C" class="btn btn-success btn-xs">5.C</a></td>
							    <td><a id="sublocation5D" class="btn btn-success btn-xs">5.D</a></td>
							    <td><a id="sublocation5E" class="btn btn-success btn-xs">5.E</a></td>
							    <td><a id="sublocation5F" class="btn btn-success btn-xs">5.F</a></td>
							    <td><a id="sublocation5G" class="btn btn-success btn-xs">5.G</a></td>
							    <td><a id="sublocation5H" class="btn btn-success btn-xs">5.H</a></td>
							    <td><a id="sublocation5I" class="btn btn-success btn-xs">5.I</a></td>
							    <td><a id="sublocation5J" class="btn btn-success btn-xs">5.J</a></td>
							  </tr>
							   <tr>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
							  </tr>	
	                    	  <tr>
							    <td><a id="sublocation4A" class="btn btn-success btn-xs">4.A</a></td>
							    <td><a id="sublocation4B" class="btn btn-success btn-xs">4.B</a></td>
							    <td><a id="sublocation4C" class="btn btn-success btn-xs">4.C</a></td>
							    <td><a id="sublocation4D" class="btn btn-success btn-xs">4.D</a></td>
							    <td><a id="sublocation4E" class="btn btn-success btn-xs">4.E</a></td>
							    <td><a id="sublocation4F" class="btn btn-success btn-xs">4.F</a></td>
							    <td><a id="sublocation4G" class="btn btn-success btn-xs">4.G</a></td>
							    <td><a id="sublocation4H" class="btn btn-success btn-xs">4.H</a></td>
							    <td><a id="sublocation4I" class="btn btn-success btn-xs">4.I</a></td>
							    <td><a id="sublocation4J" class="btn btn-success btn-xs">4.J</a></td>
							  </tr>
							   <tr>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
							  </tr>	
	                    	  <tr>
							    <td><a id="sublocation3A" class="btn btn-success btn-xs">3.A</a></td>
							    <td><a id="sublocation3B" class="btn btn-success btn-xs">3.B</a></td>
							    <td><a id="sublocation3C" class="btn btn-success btn-xs">3.C</a></td>
							    <td><a id="sublocation3D" class="btn btn-success btn-xs">3.D</a></td>
							    <td><a id="sublocation3E" class="btn btn-success btn-xs">3.E</a></td>
							    <td><a id="sublocation3F" class="btn btn-success btn-xs">3.F</a></td>
							    <td><a id="sublocation3G" class="btn btn-success btn-xs">3.G</a></td>
							    <td><a id="sublocation3H" class="btn btn-success btn-xs">3.H</a></td>
							    <td><a id="sublocation3I" class="btn btn-success btn-xs">3.I</a></td>
							    <td><a id="sublocation3J" class="btn btn-success btn-xs">3.J</a></td>
							  </tr>
							   <tr>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
							  </tr>	
	                    	  <tr>
							    <td><a id="sublocation2A" class="btn btn-success btn-xs">2.A</a></td>
							    <td><a id="sublocation2B" class="btn btn-success btn-xs">2.B</a></td>
							    <td><a id="sublocation2C" class="btn btn-success btn-xs">2.C</a></td>
							    <td><a id="sublocation2D" class="btn btn-success btn-xs">2.D</a></td>
							    <td><a id="sublocation2E" class="btn btn-success btn-xs">2.E</a></td>
							    <td><a id="sublocation2F" class="btn btn-success btn-xs">2.F</a></td>
							    <td><a id="sublocation2G" class="btn btn-success btn-xs">2.G</a></td>
							    <td><a id="sublocation2H" class="btn btn-success btn-xs">2.H</a></td>
							    <td><a id="sublocation2I" class="btn btn-success btn-xs">2.I</a></td>
							    <td><a id="sublocation2J" class="btn btn-success btn-xs">2.J</a></td>
							  </tr>
							   <tr>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
								<td>|</td>
							  </tr>	
							  <tr>
							    <td><a id="sublocation1A" class="btn btn-success btn-xs">1.A</a></td>
							    <td><a id="sublocation1B" class="btn btn-success btn-xs">1.B</a></td>
							    <td><a id="sublocation1C" class="btn btn-success btn-xs">1.C</a></td>
							    <td><a id="sublocation1D" class="btn btn-success btn-xs">1.D</a></td>
							    <td><a id="sublocation1E" class="btn btn-success btn-xs">1.E</a></td>
							    <td><a id="sublocation1F" class="btn btn-success btn-xs">1.F</a></td>
							    <td><a id="sublocation1G" class="btn btn-success btn-xs">1.G</a></td>
							    <td><a id="sublocation1H" class="btn btn-success btn-xs">1.H</a></td>
							    <td><a id="sublocation1I" class="btn btn-success btn-xs">1.I</a></td>
							    <td><a id="sublocation1J" class="btn btn-success btn-xs">1.J</a></td>
							  </tr>
							  
							 		
							  
							  
							</table> 
							</div>

			                </aside>
			              </section>


		                	
							
	                    </div>
		            </div>
		            <div class="tab-pane" id="tab3">
		                <div class="text-center wrapper">
	                    3
	                    </div>
		            </div>
				</div>

				

				<header class="panel-heading">
					<span id="location" class="btn-success">Library Catridge</span> ==> <span id="sublocation1" class="btn-success">-</span> ==> <span id="sublocation2" class="btn-success">-</span>
				</header>



			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/inventory_tape/simpan_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_inventory_tape" name="id_inventory_tape" type="hidden" >
			  <input type="hidden" class="form-control" data-required="true" value="<?php echo $typ_tblselect?>" name="typ_id">
			  <input type="hidden" class="form-control" data-required="true" value="2" name="loc_id" id="loc_id">
			  <input type="hidden" class="form-control" data-required="true" value="Y" name="tape_sts" id="tape_sts">
			  
			  	<div class="form-group">
				  <label class="col-lg-2 control-label">Loc Detail</label>
				  <div class="col-lg-6">
					<input type="text" class="form-control" data-required="true" name="loc_detail" id="loc_detail">
				  </div>
				</div>
				
				<div class="form-group">
				<label class="col-lg-2 control-label">mch</label>
					<div class="col-sm-6">
						<select name="mch_id" id="mch_id" class="form-control m-b">
						<?php foreach($mch_tbl as $mch_tbl){
						?>
						<option value="<?php echo $mch_tbl['MCH_ID'];?>"><?php echo $mch_tbl['MCH_NAME']?></option>
						<?php }?>
                        </select>
					 </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Vol Id</label>
				  <div class="col-lg-6">
					<input type="text" class="form-control" data-required="true" name="tape_volid">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Cont</label>
				  <div class="col-lg-6">
					<input type="text" class="form-control" data-required="true" name="tape_cont">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Tape Date</label>
				  <div class="col-lg-6">
					<input type="text" class="form-control" data-required="true" name="tape_date">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Tape Desc</label>
				  <div class="col-lg-6">
					<input type="text" class="form-control" data-required="true" name="tape_desc">
				  </div>
				</div>
				
				<div class="form-group">
				<label class="col-lg-2 control-label">Medcls</label>
					<div class="col-sm-6">
						<select name="medcls_id" id="medcls_id" class="form-control m-b">
						<?php foreach($medcls_tbl as $medcls_tbl){
						?>
						<option value="<?php echo $medcls_tbl['MEDCLS_ID'];?>"><?php echo $medcls_tbl['MEDCLS_NAME']?></option>
						<?php }?>
                        </select>
					 </div>
				</div>

				<div class="form-group">
				  <label class="col-lg-2 control-label">Status</label>
				  <div class="col-lg-6">
					<input type="text" class="form-control" data-required="true" name="tape_sts">
				  </div>
				</div>
				<span id="confirmMessage" class="confirmMessage"></span>
				<div class="form-group">
				  <div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Simpan</button>
					<button type="button" class="btn btn-white" onclick="window.history.back()">Batal</button>
				  </div>
				</div>
			  </form>
			</div>
		  </section>
		</div>
	</div>
</section>

<script>

$(document).ready(function() {
				

				$('#count_silo').click(function(){
					document.getElementById("location").innerText = "SILO/SERVER";
					document.getElementById('loc_id').value = "1";
					var table = $('#example').DataTable();
			        
				});

				$('#count_library_catridge').click(function(){
					document.getElementById("location").innerText = "Library Catridge";
					document.getElementById("loc_id").value = "2";
					var table = $('#example').DataTable();
			        				
				});

				$('#count_library_paper').click(
					function(){
					document.getElementById("location").innerText = "Library Paper";
					document.getElementById("loc_id").value = "3";
					var table = $('#example').DataTable();
			        
				});

				$('#location').click(
					function(){
					document.getElementById("sublocation1").innerText = "-";
					document.getElementById("sublocation2").innerText = "-";
					var table = $('#example').DataTable();
			        
				
				});

				$('#sublocation1').click(
					function(){
					document.getElementById("sublocation2").innerText = "-";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationA3').click(
					function(){
					document.getElementById("sublocation1").innerText = "A.3";
					document.getElementById("loc_detail").value = "A.3";
					var table = $('#example').DataTable();			        
				});

				$('#sublocationB3').click(
					function(){
					document.getElementById("sublocation1").innerText = "B.3";
					document.getElementById("loc_detail").value = "B.3";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationC3').click(
					function(){
					document.getElementById("sublocation1").innerText = "C.3";
					document.getElementById("loc_detail").value = "C.3";
					var table = $('#example').DataTable();
			        
				});
				
				$('#sublocationD3').click(
					function(){
					document.getElementById("sublocation1").innerText = "D.3";
					document.getElementById("loc_detail").value = "D.3";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationE3').click(
					function(){
					document.getElementById("sublocation1").innerText = "E.3";
					document.getElementById("loc_detail").value = "E.3";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationF3').click(
					function(){
					document.getElementById("sublocation1").innerText = "F.3";
					document.getElementById("loc_detail").value = "F.3";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationG3').click(
					function(){
					document.getElementById("sublocation1").innerText = "G.3";
					document.getElementById("loc_detail").value = "G.3";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationH3').click(
					function(){
					document.getElementById("sublocation1").innerText = "H.3";
					document.getElementById("loc_detail").value = "H.3";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationI3').click(
					function(){
					document.getElementById("sublocation1").innerText = "I.3";
					document.getElementById("loc_detail").value = "I.3";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationJ3').click(
					function(){
					document.getElementById("sublocation1").innerText = "J.3";
					document.getElementById("loc_detail").value = "J.3";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationA2').click(
					function(){
					document.getElementById("sublocation1").innerText = "A.2";
					document.getElementById("loc_detail").value = "A.2";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationB2').click(
					function(){
					document.getElementById("sublocation1").innerText = "B.2";
					document.getElementById("loc_detail").value = "B.2";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationC2').click(
					function(){
					document.getElementById("sublocation1").innerText = "C.2";
					document.getElementById("loc_detail").value = "C.2";
					var table = $('#example').DataTable();
			        
				});
				
				$('#sublocationD2').click(
					function(){
					document.getElementById("sublocation1").innerText = "D.2";
					document.getElementById("loc_detail").value = "D.2";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationE2').click(
					function(){
					document.getElementById("sublocation1").innerText = "E.2";
					document.getElementById("loc_detail").value = "E.2";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationF2').click(
					function(){
					document.getElementById("sublocation1").innerText = "F.2";
					document.getElementById("loc_detail").value = "F.2";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationG2').click(
					function(){
					document.getElementById("sublocation1").innerText = "G.2";
					document.getElementById("loc_detail").value = "G.2";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationH2').click(
					function(){
					document.getElementById("sublocation1").innerText = "H.2";
					document.getElementById("loc_detail").value = "H.2";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationI2').click(
					function(){
					document.getElementById("sublocation1").innerText = "I.2";
					document.getElementById("loc_detail").value = "I.2";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationJ2').click(
					function(){
					document.getElementById("sublocation1").innerText = "J.2";
					document.getElementById("loc_detail").value = "J.2";
					var table = $('#example').DataTable();
			        
				});
				
				$('#sublocationA1').click(
					function(){
					document.getElementById("sublocation1").innerText = "A.1";
					document.getElementById("loc_detail").value = "A.1";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationB1').click(
					function(){
					document.getElementById("sublocation1").innerText = "B.1";
					document.getElementById("loc_detail").value = "B.1";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationC1').click(
					function(){
					document.getElementById("sublocation1").innerText = "C.1";
					document.getElementById("loc_detail").value = "C.1";
					var table = $('#example').DataTable();
			        
				});
				
				$('#sublocationD1').click(
					function(){
					document.getElementById("sublocation1").innerText = "D.1";
					document.getElementById("loc_detail").value = "D.1";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationE1').click(
					function(){
					document.getElementById("sublocation1").innerText = "E.1";
					document.getElementById("loc_detail").value = "E.1";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationF1').click(
					function(){
					document.getElementById("sublocation1").innerText = "F.1";
					document.getElementById("loc_detail").value = "F.1";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationG1').click(
					function(){
					document.getElementById("sublocation1").innerText = "G.1";
					document.getElementById("loc_detail").value = "G.1";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationH1').click(
					function(){
					document.getElementById("sublocation1").innerText = "H.1";
					document.getElementById("loc_detail").value = "H.1";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationI1').click(
					function(){
					document.getElementById("sublocation1").innerText = "I.1";
					document.getElementById("loc_detail").value = "I.1";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocationJ1').click(
					function(){
					document.getElementById("sublocation1").innerText = "J.1";
					document.getElementById("loc_detail").value = "J.1";
					var table = $('#example').DataTable();
			        
				});


				$('#sublocation1A').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.A";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".1.A";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation1B').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.B";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".1.B";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation1C').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.C";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".1.C";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation1D').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.D";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".1.D";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation1E').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.E";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".1.E";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation1F').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.F";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".1.F";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation1G').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.G";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".1.G";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation1H').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.H";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".1.H";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation1I').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.I";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".1.I";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation1J').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.J";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".1.J";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocation2A').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.A";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".2.A";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation2B').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.B";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".2.B";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation2C').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.C";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".2.C";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation2D').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.D";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".2.D";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation2E').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.E";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".2.E";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation2F').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.F";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".2.F";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation2G').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.G";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".2.G";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation2H').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.H";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".2.H";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation2I').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.I";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".2.I";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation2J').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.J";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".2.J";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocation3A').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.A";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".3.A";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation3B').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.B";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".3.B";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation3C').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.C";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".3.C";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation3D').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.D";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".3.D";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation3E').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.E";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".3.E";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation3F').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.F";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".3.F";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation3G').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.G";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".3.G";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation3H').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.H";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".3.H";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation3I').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.I";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".3.I";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation3J').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.J";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".3.J";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocation4A').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.A";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".4.A";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation4B').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.B";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".4.B";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation4C').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.C";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".4.C";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation4D').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.D";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".4.D";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation4E').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.E";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".4.E";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation4F').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.F";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".4.F";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation4G').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.G";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".4.G";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation4H').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.H";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".4.H";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation4I').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.I";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".4.I";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation4J').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.J";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".4.J";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocation5A').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.A";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".5.A";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation5B').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.B";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".5.B";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation5C').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.C";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".5.C";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation5D').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.D";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".5.D";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation5E').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.E";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".5.E";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation5F').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.F";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".5.F";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation5G').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.G";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".5.G";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation5H').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.H";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".5.H";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation5I').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.I";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".5.I";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation5J').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.J";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".5.J";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocation6A').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.A";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".6.A";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation6B').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.B";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".6.B";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation6C').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.C";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".6.C";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation6D').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.D";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".6.D";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation6E').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.E";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".6.E";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation6F').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.F";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".6.F";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation6G').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.G";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".6.G";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation6H').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.H";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".6.H";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation6I').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.I";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".6.I";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation6J').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.J";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".6.J";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocation7A').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.A";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".7.A";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation7B').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.B";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".7.B";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation7C').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.C";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".7.C";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation7D').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.D";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".7.D";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation7E').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.E";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".7.E";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation7F').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.F";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".7.F";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation7G').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.G";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".7.G";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation7H').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.H";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".7.H";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation7I').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.I";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".7.I";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation7J').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.J";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".7.J";
					var table = $('#example').DataTable();
			        
				});

				$('#sublocation8A').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.A";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".8.A";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation8B').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.B";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".8.B";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation8C').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.C";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".8.C";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation8D').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.D";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".8.D";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation8E').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.E";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".8.E";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation8F').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.F";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".8.F";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation8G').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.G";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".8.G";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation8H').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.H";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".8.H";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation8I').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.I";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".8.I";
					var table = $('#example').DataTable();
			        
				});
				$('#sublocation8J').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.J";
					var sub1 = document.getElementById("sublocation1").innerText;
					document.getElementById("loc_detail").value = sub1+".8.J";
					var table = $('#example').DataTable();
			        
				});
});

</script>
