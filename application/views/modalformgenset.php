

<form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_edit_form/genset'); ?>" method="post">
				<input value="<?php echo $query['id_genset'] ;?>" type="hidden" name="id_genset" id="id_genset" >
				<input value="<?php echo $query['id_act'] ;?>" type="hidden" name="id_act" id="id_act" >
				

		    			
				<table border="0" width="100%">
					
        			<tr>
	        			<td>
	        			Jam Start
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo $query['jam_start'] ;?>" type="text" name="jam_start_genset" id="jam_start_genset" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Jam Stop
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="15:30:00" value="<?php echo $query['jam_stop'] ;?>" type="text" name="jam_stop_genset" id="jam_stop_genset" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			hours_meter
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="hours_meter" value="<?php echo $query['hours_meter'] ;?>" id="hours_meter" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			voltage_bateray
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="voltage_bateray" value="<?php echo $query['voltage_bateray'] ;?>" id="voltage_bateray" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			kwh
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="kwh" value="<?php echo $query['kwh'] ;?>" id="kwh" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			vol_r
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="vol_r" value="<?php echo $query['vol_r'] ;?>" id="vol_r" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			vol_s
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="vol_s" value="<?php echo $query['vol_s'] ;?>" id="vol_s" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			vol_t
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="vol_t" value="<?php echo $query['vol_t'] ;?>" id="vol_t" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cur_s
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cur_s" value="<?php echo $query['cur_s'] ;?>" id="cur_s" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cur_t
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cur_t" value="<?php echo $query['cur_t'] ;?>" id="cur_t" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			frekwensi
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="frekwensi" value="<?php echo $query['frekwensi'] ;?>" id="frekwensi" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cosQ
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="cosQ" value="<?php echo $query['cosQ'] ;?>" id="cosQ" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			oil_press
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="oil_press" value="<?php echo $query['oil_press'] ;?>" id="oil_press" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			water_temp
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="water_temp" value="<?php echo $query['water_temp'] ;?>" id="water_temp" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rpm
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" name="rpm" value="<?php echo $query['rpm'] ;?>" id="rpm" >
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
	        			Status
	        			</td>
	        			<td>
	    				<input class="form-control" data-required="true" placeholder="" type="text" name="status" value="<?php echo $query['status'] ;?>" id="status" >
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
			