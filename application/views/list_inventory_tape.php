<?php $id = $this->session->userdata('user_data'); ?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<?php if  ($id['id_role'] != 1 ) {?>
					<a href="<?php echo site_url('inventory_tape/tambah_inventory_tape'); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					<?php }?>
					<a href="<?php echo site_url('inventory_tape/scan_inventory_tape'); ?>" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Search By Barcode</a>
					<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
				</header>

				<header class="panel-heading">
				<form id="changeinventory_tape" method="post" action="<?php echo base_url('index.php/inventory_tape/get_list_inventory_tape'); ?>"  class="panel-body">
				<div class="tab-pane fade active in" id="inventory_tape">
					<div class="col-sm-8">
					
						<table>
							<tr>
								<td>
								<select onchange="this.form.submit()" class="form-control m-b" id="btn_typ_tbl" name="btn_typ_tbl">
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
								</td>
							</tr>
						</table>

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
							    <td><a id="sublocationA3" class="btn  <?php if(($catridgeA3[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?>  btn-m">A.3 <br><small class="pull-right text-xs"><?php echo $catridgeA3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationB3" class="btn <?php if(($catridgeB3[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">B.3 <br><small class="pull-right text-xs"><?php echo $catridgeB3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationC3" class="btn <?php if(($catridgeC3[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">C.3 <br><small class="pull-right text-xs"><?php echo $catridgeC3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationD3" class="btn <?php if(($catridgeD3[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">D.3 <br><small class="pull-right text-xs"><?php echo $catridgeD3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationE3" class="btn <?php if(($catridgeE3[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">E.3 <br><small class="pull-right text-xs"><?php echo $catridgeE3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationF3" class="btn <?php if(($catridgeF3[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">F.3 <br><small class="pull-right text-xs"><?php echo $catridgeF3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationG3" class="btn <?php if(($catridgeG3[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">G.3 <br><small class="pull-right text-xs"><?php echo $catridgeG3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationH3" class="btn <?php if(($catridgeH3[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">H.3 <br><small class="pull-right text-xs"><?php echo $catridgeH3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationI3" class="btn <?php if(($catridgeI3[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">I.3 <br><small class="pull-right text-xs"><?php echo $catridgeI3[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationJ3" class="btn <?php if(($catridgeJ3[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">J.3 <br><small class="pull-right text-xs"><?php echo $catridgeJ3[0]['counttape']?></small></a></td>
							  </tr>
							  <tr>
							    <td><a id="sublocationA2" class="btn  <?php if(($catridgeA2[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?>  btn-m">A.2 <br><small class="pull-right text-xs"><?php echo $catridgeA2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationB2" class="btn <?php if(($catridgeB2[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">B.2 <br><small class="pull-right text-xs"><?php echo $catridgeB2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationC2" class="btn <?php if(($catridgeC2[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">C.2 <br><small class="pull-right text-xs"><?php echo $catridgeC2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationD2" class="btn <?php if(($catridgeD2[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">D.2 <br><small class="pull-right text-xs"><?php echo $catridgeD2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationE2" class="btn <?php if(($catridgeE2[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">E.2 <br><small class="pull-right text-xs"><?php echo $catridgeE2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationF2" class="btn <?php if(($catridgeF2[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">F.2 <br><small class="pull-right text-xs"><?php echo $catridgeF2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationG2" class="btn <?php if(($catridgeG2[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">G.2 <br><small class="pull-right text-xs"><?php echo $catridgeG2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationH2" class="btn <?php if(($catridgeH2[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">H.2 <br><small class="pull-right text-xs"><?php echo $catridgeH2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationI2" class="btn <?php if(($catridgeI2[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">I.2 <br><small class="pull-right text-xs"><?php echo $catridgeI2[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationJ2" class="btn <?php if(($catridgeJ2[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">J.2 <br><small class="pull-right text-xs"><?php echo $catridgeJ2[0]['counttape']?></small></a></td>
							  </tr>
							  <tr>
							    <td><a id="sublocationA1" class="btn  <?php if(($catridgeA1[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?>  btn-m">A.1 <br><small class="pull-right text-xs"><?php echo $catridgeA1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationB1" class="btn <?php if(($catridgeB1[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">B.1 <br><small class="pull-right text-xs"><?php echo $catridgeB1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationC1" class="btn <?php if(($catridgeC1[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">C.1 <br><small class="pull-right text-xs"><?php echo $catridgeC1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationD1" class="btn <?php if(($catridgeD1[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">D.1 <br><small class="pull-right text-xs"><?php echo $catridgeD1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationE1" class="btn <?php if(($catridgeE1[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">E.1 <br><small class="pull-right text-xs"><?php echo $catridgeE1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationF1" class="btn <?php if(($catridgeF1[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">F.1 <br><small class="pull-right text-xs"><?php echo $catridgeF1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationG1" class="btn <?php if(($catridgeG1[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">G.1 <br><small class="pull-right text-xs"><?php echo $catridgeG1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationH1" class="btn <?php if(($catridgeH1[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">H.1 <br><small class="pull-right text-xs"><?php echo $catridgeH1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationI1" class="btn <?php if(($catridgeI1[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">I.1 <br><small class="pull-right text-xs"><?php echo $catridgeI1[0]['counttape']?></small></a></td>
							    <td>-</td>
							    <td><a id="sublocationJ1" class="btn <?php if(($catridgeJ1[0]['counttape']) > 0 ){ echo 'btn-success';}else{echo 'btn-danger';}?> btn-m">J.1 <br><small class="pull-right text-xs"><?php echo $catridgeJ1[0]['counttape']?></small></a></td>
							  </tr>
							  
							</table> 

		                	<h4 class="m-t-xl"><========Jalan Masuk=======</h4>
							</div>

			                </aside>

			                <aside>
			                  <div class="col-md-4" >

		                	<small class="">U Num</small>
	                    	

		                	<table style="width:50%" style="margin-left: 30px;">
	                    	  <tr>
							    <td><a id="sublocation8A" class="btn btn-danger btn-xs">8.A</a></td>
							    <td><a id="sublocation8B" class="btn btn-danger btn-xs">8.B</a></td>
							    <td><a id="sublocation8C" class="btn btn-danger btn-xs">8.C</a></td>
							    <td><a id="sublocation8D" class="btn btn-danger btn-xs">8.D</a></td>
							    <td><a id="sublocation8E" class="btn btn-danger btn-xs">8.E</a></td>
							    <td><a id="sublocation8F" class="btn btn-danger btn-xs">8.F</a></td>
							    <td><a id="sublocation8G" class="btn btn-danger btn-xs">8.G</a></td>
							    <td><a id="sublocation8H" class="btn btn-danger btn-xs">8.H</a></td>
							    <td><a id="sublocation8I" class="btn btn-danger btn-xs">8.I</a></td>
							    <td><a id="sublocation8J" class="btn btn-danger btn-xs">8.J</a></td>
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
							    <td><a id="sublocation7A" class="btn btn-danger btn-xs">7.A</a></td>
							    <td><a id="sublocation7B" class="btn btn-danger btn-xs">7.B</a></td>
							    <td><a id="sublocation7C" class="btn btn-danger btn-xs">7.C</a></td>
							    <td><a id="sublocation7D" class="btn btn-danger btn-xs">7.D</a></td>
							    <td><a id="sublocation7E" class="btn btn-danger btn-xs">7.E</a></td>
							    <td><a id="sublocation7F" class="btn btn-danger btn-xs">7.F</a></td>
							    <td><a id="sublocation7G" class="btn btn-danger btn-xs">7.G</a></td>
							    <td><a id="sublocation7H" class="btn btn-danger btn-xs">7.H</a></td>
							    <td><a id="sublocation7I" class="btn btn-danger btn-xs">7.I</a></td>
							    <td><a id="sublocation7J" class="btn btn-danger btn-xs">7.J</a></td>
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
							    <td><a id="sublocation6A" class="btn btn-danger btn-xs">6.A</a></td>
							    <td><a id="sublocation6B" class="btn btn-danger btn-xs">6.B</a></td>
							    <td><a id="sublocation6C" class="btn btn-danger btn-xs">6.C</a></td>
							    <td><a id="sublocation6D" class="btn btn-danger btn-xs">6.D</a></td>
							    <td><a id="sublocation6E" class="btn btn-danger btn-xs">6.E</a></td>
							    <td><a id="sublocation6F" class="btn btn-danger btn-xs">6.F</a></td>
							    <td><a id="sublocation6G" class="btn btn-danger btn-xs">6.G</a></td>
							    <td><a id="sublocation6H" class="btn btn-danger btn-xs">6.H</a></td>
							    <td><a id="sublocation6I" class="btn btn-danger btn-xs">6.I</a></td>
							    <td><a id="sublocation6J" class="btn btn-danger btn-xs">6.J</a></td>
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
							    <td><a id="sublocation5A" class="btn btn-danger btn-xs">5.A</a></td>
							    <td><a id="sublocation5B" class="btn btn-danger btn-xs">5.B</a></td>
							    <td><a id="sublocation5C" class="btn btn-danger btn-xs">5.C</a></td>
							    <td><a id="sublocation5D" class="btn btn-danger btn-xs">5.D</a></td>
							    <td><a id="sublocation5E" class="btn btn-danger btn-xs">5.E</a></td>
							    <td><a id="sublocation5F" class="btn btn-danger btn-xs">5.F</a></td>
							    <td><a id="sublocation5G" class="btn btn-danger btn-xs">5.G</a></td>
							    <td><a id="sublocation5H" class="btn btn-danger btn-xs">5.H</a></td>
							    <td><a id="sublocation5I" class="btn btn-danger btn-xs">5.I</a></td>
							    <td><a id="sublocation5J" class="btn btn-danger btn-xs">5.J</a></td>
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
							    <td><a id="sublocation4A" class="btn btn-danger btn-xs">4.A</a></td>
							    <td><a id="sublocation4B" class="btn btn-danger btn-xs">4.B</a></td>
							    <td><a id="sublocation4C" class="btn btn-danger btn-xs">4.C</a></td>
							    <td><a id="sublocation4D" class="btn btn-danger btn-xs">4.D</a></td>
							    <td><a id="sublocation4E" class="btn btn-danger btn-xs">4.E</a></td>
							    <td><a id="sublocation4F" class="btn btn-danger btn-xs">4.F</a></td>
							    <td><a id="sublocation4G" class="btn btn-danger btn-xs">4.G</a></td>
							    <td><a id="sublocation4H" class="btn btn-danger btn-xs">4.H</a></td>
							    <td><a id="sublocation4I" class="btn btn-danger btn-xs">4.I</a></td>
							    <td><a id="sublocation4J" class="btn btn-danger btn-xs">4.J</a></td>
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
							    <td><a id="sublocation3A" class="btn btn-danger btn-xs">3.A</a></td>
							    <td><a id="sublocation3B" class="btn btn-danger btn-xs">3.B</a></td>
							    <td><a id="sublocation3C" class="btn btn-danger btn-xs">3.C</a></td>
							    <td><a id="sublocation3D" class="btn btn-danger btn-xs">3.D</a></td>
							    <td><a id="sublocation3E" class="btn btn-danger btn-xs">3.E</a></td>
							    <td><a id="sublocation3F" class="btn btn-danger btn-xs">3.F</a></td>
							    <td><a id="sublocation3G" class="btn btn-danger btn-xs">3.G</a></td>
							    <td><a id="sublocation3H" class="btn btn-danger btn-xs">3.H</a></td>
							    <td><a id="sublocation3I" class="btn btn-danger btn-xs">3.I</a></td>
							    <td><a id="sublocation3J" class="btn btn-danger btn-xs">3.J</a></td>
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
							    <td><a id="sublocation2A" class="btn btn-danger btn-xs">2.A</a></td>
							    <td><a id="sublocation2B" class="btn btn-danger btn-xs">2.B</a></td>
							    <td><a id="sublocation2C" class="btn btn-danger btn-xs">2.C</a></td>
							    <td><a id="sublocation2D" class="btn btn-danger btn-xs">2.D</a></td>
							    <td><a id="sublocation2E" class="btn btn-danger btn-xs">2.E</a></td>
							    <td><a id="sublocation2F" class="btn btn-danger btn-xs">2.F</a></td>
							    <td><a id="sublocation2G" class="btn btn-danger btn-xs">2.G</a></td>
							    <td><a id="sublocation2H" class="btn btn-danger btn-xs">2.H</a></td>
							    <td><a id="sublocation2I" class="btn btn-danger btn-xs">2.I</a></td>
							    <td><a id="sublocation2J" class="btn btn-danger btn-xs">2.J</a></td>
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
							    <td><a id="sublocation1A" class="btn btn-danger btn-xs">1.A</a></td>
							    <td><a id="sublocation1B" class="btn btn-danger btn-xs">1.B</a></td>
							    <td><a id="sublocation1C" class="btn btn-danger btn-xs">1.C</a></td>
							    <td><a id="sublocation1D" class="btn btn-danger btn-xs">1.D</a></td>
							    <td><a id="sublocation1E" class="btn btn-danger btn-xs">1.E</a></td>
							    <td><a id="sublocation1F" class="btn btn-danger btn-xs">1.F</a></td>
							    <td><a id="sublocation1G" class="btn btn-danger btn-xs">1.G</a></td>
							    <td><a id="sublocation1H" class="btn btn-danger btn-xs">1.H</a></td>
							    <td><a id="sublocation1I" class="btn btn-danger btn-xs">1.I</a></td>
							    <td><a id="sublocation1J" class="btn btn-danger btn-xs">1.J</a></td>
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
				
				
				<div class="table-responsive">
					<table id="example" class="table table-striped m-b-none" data-ride="datatables">
					<thead>
							<tr>
								<th width="3%">Vol Id</th>
								<th width="3%">Type </th>
								<th width="3%">MCH </th>
								<th width="3%">Loc </th>
								<th width="3%">Loc Detail</th>
								<th width="3%">Tape Desc</th>
								<th width="3%">MEDCLS </th>
								<th width="3%">TRANS DLV BY </th>
								<th width="5%">Aksi</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach($inventory_tape as $list){
						
					?>
						<tr>
							<td><?php echo $list['TAPE_VOLID']?></td>
							<td><?php echo $list['TYP_NAME']?></td>
							<td><?php echo $list['MCH_NAME']?></td>
							<td><?php echo $list['LOC_NAME']?></td>
							<td><?php echo $list['LOC_DETAIL']?></td>
							<td><?php echo $list['TAPE_DESC']?></td>
							<td><?php echo $list['MEDCLS_NAME']?></td>
							<td><?php echo $list['TRANS_DLV_BY']?></td>

							<td>
							<?php if( ($id["id_role"]) == 2 || ($id["id_role"]) == 1 || ($id["id_role"]) == 3 || ($id["id_role"]) == 4 || ($id["id_role"]) == 0) { ?>
							<a href="<?php echo site_url('inventory_tape/edit_inventory_tape/'.$list['TAPE_ID']); ?>" class="btn detail_icon btn-xs btn-success btn_edit_inventory_tape" data-toggle="tooltip" data-original-title="Edit Task"><i class="fa fa-edit"></i></a> ||
							<a href="<?php echo site_url('inventory_tape/hapus/'.$list['TAPE_ID']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_inventory_tape" data-toggle="tooltip" data-original-title="Delete Task"><i class="fa fa-trash-o"></i></a>
							<?php } ?>
							<?php if($id["id_team"]==20){ ?>
							<a href="<?php echo site_url('inventory_tape/hapus/'.$list['TAPE_ID']); ?>" class="btn detail_icon btn-xs btn-danger btn_delete_inventory_tape" data-toggle="tooltip" data-original-title="Delete Task"><i class="fa fa-trash-o"></i></a>
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

<script>
$(document).ready(function() {

	$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
       
	        var location = data[3] || 0; // use data for the age column
	        var sublocation = data[4] || 0; // use data for the age column
	        var sublocation1 ="";
	        var sublocation2 ="";
	        if (sublocation.length > 4){
	        sublocation1 =  sublocation.substring(0, 3);
	        }

	        if (sublocation.length > 4){
	        sublocation2 =  sublocation.substring(4, 7);
	        }
	 		//alert('sub='+sublocation+' sub2='+sublocation2);
	 		var locationselect = document.getElementById("location").innerText;

	 		var sublocation1select = document.getElementById("sublocation1").innerText;
	 		var sublocation2select = document.getElementById("sublocation2").innerText;

			if(sublocation1select != "-"){
				if(sublocation1select ==sublocation1){
					for (i = 1; i < 9; i++) {
						{
							text1 = i + ".A";
						    text2 = "sublocation"+i+"A";
						    if (sublocation2 == text1){
								document.getElementById(text2).className = "btn btn-success btn-xs";
							}	
						}
						{
							text1 = i + ".B";
						    text2 = "sublocation"+i+"B";
						    if (sublocation2 == text1){
								document.getElementById(text2).className = "btn btn-success btn-xs";
							}	
						}
						{
							text1 = i + ".C";
						    text2 = "sublocation"+i+"C";
						    if (sublocation2 == text1){
								document.getElementById(text2).className = "btn btn-success btn-xs";
							}	
						}
						{
							text1 = i + ".D";
						    text2 = "sublocation"+i+"D";
						    if (sublocation2 == text1){
								document.getElementById(text2).className = "btn btn-success btn-xs";
							}	
						}
						{
							text1 = i + ".E";
						    text2 = "sublocation"+i+"E";
						    if (sublocation2 == text1){
								document.getElementById(text2).className = "btn btn-success btn-xs";
							}	
						}
						{
							text1 = i + ".F";
						    text2 = "sublocation"+i+"F";
						    if (sublocation2 == text1){
								document.getElementById(text2).className = "btn btn-success btn-xs";
							}	
						}
						{
							text1 = i + ".G";
						    text2 = "sublocation"+i+"G";
						    if (sublocation2 == text1){
								document.getElementById(text2).className = "btn btn-success btn-xs";
							}	
						}
						{
							text1 = i + ".H";
						    text2 = "sublocation"+i+"H";
						    if (sublocation2 == text1){
								document.getElementById(text2).className = "btn btn-success btn-xs";
							}	
						}
					}	
				}				 
			}
	 		 
	 		//alert(locationselect);
			if (location == locationselect){
				if (sublocation1 == sublocation1select){
					if (sublocation2 == sublocation2select){

						return true;
					} else if (sublocation2select == "-"){
						return true;					
					}
				} else if (sublocation1select == "-"){
					return true;					
				}
			} 


		
	        return false;
	    }
	);
    $('#example').dataTable({
			"bProcessing": true,
			//"bServerSide": true,
			"sServerMethod": "POST",
			"iDisplayLength": 15,
			"sPaginationType": "full_numbers",
			"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
			"aaSorting": [[4, 'desc']],
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

				$('#count_silo').click(function(){
					document.getElementById("location").innerText = "SILO/SERVER";
					var table = $('#example').DataTable();
			        table.draw();
				
				});

				$('#count_library_catridge').click(function(){
					document.getElementById("location").innerText = "Library Catridge";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#count_library_paper').click(
					function(){
					document.getElementById("location").innerText = "Library Paper";
					var table = $('#example').DataTable();
			        table.draw();
				
				});

				$('#location').click(
					function(){
					document.getElementById("sublocation1").innerText = "-";
					document.getElementById("sublocation2").innerText = "-";
					var table = $('#example').DataTable();
			        table.draw();
				
				});
				$('#sublocation1').click(
					function(){
					document.getElementById("sublocation2").innerText = "-";
					var table = $('#example').DataTable();
			        table.draw();
				
				});

				$('#sublocationA3').click(
					function(){
					document.getElementById("sublocation1").innerText = "A.3";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationB3').click(
					function(){
					document.getElementById("sublocation1").innerText = "B.3";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationC3').click(
					function(){
					document.getElementById("sublocation1").innerText = "C.3";
					var table = $('#example').DataTable();
			        table.draw();
				});
				
				$('#sublocationD3').click(
					function(){
					document.getElementById("sublocation1").innerText = "D.3";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationE3').click(
					function(){
					document.getElementById("sublocation1").innerText = "E.3";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationF3').click(
					function(){
					document.getElementById("sublocation1").innerText = "F.3";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationG3').click(
					function(){
					document.getElementById("sublocation1").innerText = "G.3";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationH3').click(
					function(){
					document.getElementById("sublocation1").innerText = "H.3";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationI3').click(
					function(){
					document.getElementById("sublocation1").innerText = "I.3";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationJ3').click(
					function(){
					document.getElementById("sublocation1").innerText = "J.3";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationA2').click(
					function(){
					document.getElementById("sublocation1").innerText = "A.2";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationB2').click(
					function(){
					document.getElementById("sublocation1").innerText = "B.2";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationC2').click(
					function(){
					document.getElementById("sublocation1").innerText = "C.2";
					var table = $('#example').DataTable();
			        table.draw();
				});
				
				$('#sublocationD2').click(
					function(){
					document.getElementById("sublocation1").innerText = "D.2";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationE2').click(
					function(){
					document.getElementById("sublocation1").innerText = "E.2";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationF2').click(
					function(){
					document.getElementById("sublocation1").innerText = "F.2";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationG2').click(
					function(){
					document.getElementById("sublocation1").innerText = "G.2";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationH2').click(
					function(){
					document.getElementById("sublocation1").innerText = "H.2";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationI2').click(
					function(){
					document.getElementById("sublocation1").innerText = "I.2";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationJ2').click(
					function(){
					document.getElementById("sublocation1").innerText = "J.2";
					var table = $('#example').DataTable();
			        table.draw();
				});
				
				$('#sublocationA1').click(
					function(){
					document.getElementById("sublocation1").innerText = "A.1";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationB1').click(
					function(){
					document.getElementById("sublocation1").innerText = "B.1";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationC1').click(
					function(){
					document.getElementById("sublocation1").innerText = "C.1";
					var table = $('#example').DataTable();
			        table.draw();
				});
				
				$('#sublocationD1').click(
					function(){
					document.getElementById("sublocation1").innerText = "D.1";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationE1').click(
					function(){
					document.getElementById("sublocation1").innerText = "E.1";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationF1').click(
					function(){
					document.getElementById("sublocation1").innerText = "F.1";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationG1').click(
					function(){
					document.getElementById("sublocation1").innerText = "G.1";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationH1').click(
					function(){
					document.getElementById("sublocation1").innerText = "H.1";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationI1').click(
					function(){
					document.getElementById("sublocation1").innerText = "I.1";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocationJ1').click(
					function(){
					document.getElementById("sublocation1").innerText = "J.1";
					var table = $('#example').DataTable();
			        table.draw();
				});


				$('#sublocation1A').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.A";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation1B').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.B";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation1C').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.C";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation1D').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.D";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation1E').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.E";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation1F').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.F";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation1G').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.G";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation1H').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.H";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation1I').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.I";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation1J').click(
					function(){
					document.getElementById("sublocation2").innerText = "1.J";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocation2A').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.A";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation2B').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.B";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation2C').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.C";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation2D').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.D";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation2E').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.E";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation2F').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.F";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation2G').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.G";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation2H').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.H";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation2I').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.I";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation2J').click(
					function(){
					document.getElementById("sublocation2").innerText = "2.J";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocation3A').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.A";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation3B').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.B";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation3C').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.C";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation3D').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.D";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation3E').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.E";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation3F').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.F";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation3G').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.G";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation3H').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.H";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation3I').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.I";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation3J').click(
					function(){
					document.getElementById("sublocation2").innerText = "3.J";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocation4A').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.A";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation4B').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.B";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation4C').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.C";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation4D').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.D";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation4E').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.E";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation4F').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.F";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation4G').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.G";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation4H').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.H";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation4I').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.I";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation4J').click(
					function(){
					document.getElementById("sublocation2").innerText = "4.J";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocation5A').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.A";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation5B').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.B";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation5C').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.C";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation5D').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.D";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation5E').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.E";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation5F').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.F";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation5G').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.G";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation5H').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.H";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation5I').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.I";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation5J').click(
					function(){
					document.getElementById("sublocation2").innerText = "5.J";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocation6A').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.A";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation6B').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.B";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation6C').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.C";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation6D').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.D";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation6E').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.E";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation6F').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.F";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation6G').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.G";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation6H').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.H";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation6I').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.I";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation6J').click(
					function(){
					document.getElementById("sublocation2").innerText = "6.J";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocation7A').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.A";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation7B').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.B";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation7C').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.C";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation7D').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.D";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation7E').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.E";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation7F').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.F";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation7G').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.G";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation7H').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.H";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation7I').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.I";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation7J').click(
					function(){
					document.getElementById("sublocation2").innerText = "7.J";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('#sublocation8A').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.A";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation8B').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.B";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation8C').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.C";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation8D').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.D";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation8E').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.E";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation8F').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.F";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation8G').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.G";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation8H').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.H";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation8I').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.I";
					var table = $('#example').DataTable();
			        table.draw();
				});
				$('#sublocation8J').click(
					function(){
					document.getElementById("sublocation2").innerText = "8.J";
					var table = $('#example').DataTable();
			        table.draw();
				});

				$('[data-toggle="tooltip"]').tooltip();
			}
		});
});


function myFunction(p1) {
				    alert(p1);      
				}
$('.btn_delete_inventory_tape').click(
	function(e){
	e.preventDefault();
					var c = alertify.confirm('Anda akan menghapus data ini, Lanjutkan?').set('onok', function(){ window.location.href = $(e.delegateTarget).attr('href');
				});
});
</script>
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
});
</script>
