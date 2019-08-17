
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_edit_form/acliebertmb2'); ?>" method="post">						
		    			
				<input value="<?php echo $query['id_ac_mb2'] ;?>" type="hidden" name="id_ac_mb2" id="id_ac_mb2" >
				<input value="<?php echo $query['id_act'] ;?>" type="hidden" name="id_act" id="id_act" >
				<table border="0" width="100%">
					
        			<tr>
	        			<td>
	        			Jam 
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo date("G:i:s");?>" type="text" name="jam" id="jam" value="<?php echo $query['jam'] ;?>" >
	        			</td>
        			</tr>


        			<tr>
	        			<td>
	        			temp_ACI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_ACI" id="temp_ACI" value="<?php echo $query['temp_ACI'] ;?>" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ACII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="temp_ACII" value="<?php echo $query['temp_ACII'] ;?>" id="temp_ACII" >
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			ratas_akhir_temp
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ratas_akhir_temp" id="ratas_akhir_temp" value="<?php echo $query['ratas_akhir_temp'] ;?>" >
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			ket_batas_aman_temp
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ket_batas_aman_temp" id="ket_batas_aman_temp" value="<?php echo $query['ket_batas_aman_temp'] ;?>" >
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			humidity_acI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="humidity_acI" id="humidity_acI" value="<?php echo $query['humidity_acI'] ;?>">
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			humidity_acII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="humidity_acII" id="humidity_acII" value="<?php echo $query['humidity_acII'] ;?>">
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			ratas_akhir_humid
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ratas_akhir_humid" id="ratas_akhir_humid" value="<?php echo $query['ratas_akhir_humid'] ;?>">
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			ket_batas_aman_humid
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="ket_batas_aman_humid" id="ket_batas_aman_humid" value="<?php echo $query['ket_batas_aman_humid'] ;?>">
	        			</td>
        			</tr>
        			<tr>
	        			<td>
	        			ac_liebert_mb2_no
	        			</td>
	        			<td>
	        			<select name="ac_liebert_mb2_no" id="ac_liebert_mb2_no" class="form-control m-b">
						<?php foreach($ac_liebert_mb2_no as $ac_liebert_mb2_nos){
						if ($ac_liebert_mb2_nos == $query['ac_liebert_mb2_no']){
							?>
							<option value="<?php echo $ac_liebert_mb2_nos;?>" selected><?php echo $ac_liebert_mb2_nos?></option>
							<?php
						} else {
						?>
							<option value="<?php echo $ac_liebert_mb2_nos;?>" ><?php echo $ac_liebert_mb2_nos?></option>
						<?php 
							}
						}

						?>
                        </select>
	        			</td>
        			</tr>
           			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keterangan" id="keterangan" ><?php echo $query['keterangan'] ;?></textarea>
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