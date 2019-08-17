

<form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_edit_form/upsmb2'); ?>" method="post">
			<input value="<?php echo $query['id_form_ups_mb2'] ;?>" type="hidden" name="id_form_ups_mb2" id="id_form_ups_mb2" >
				<input value="<?php echo $query['id_act'] ;?>" type="hidden" name="id_act" id="id_act" >
	
				<table border="0" width="100%">
				

					<tr>
	        			<td>
	        			Jam
	        			</td>
	        			<td>

	        			<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo $query['jam'] ;?>" type="text" name="jam" id="jam" >
	        			</td>
        			</tr>

           			<tr>
	        			<td>
	        			Input V Run
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  value="<?php echo $query['i_v_Rn'] ;?>" type="text" name="i_v_Rn" id="i_v_Rn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input V SN
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['i_v_sn'] ;?>" type="text" name="i_v_sn" id="i_v_sn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input V TN
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['i_v_tn'] ;?>" type="text" name="i_v_tn" id="i_v_tn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input C R
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['i_c_r'] ;?>"  type="text" name="i_c_r" id="i_c_r" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input C S
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['i_c_s'] ;?>" type="text" name="i_c_s" id="i_c_s" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input C T
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['i_c_t'] ;?>" type="text" name="i_c_t" id="i_c_t" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			fHZ_1
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['fHZ_1'] ;?>"  type="text" name="fHZ_1" id="fHZ_1" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			battery_vdc
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  value="<?php echo $query['battery_vdc'] ;?>" type="text" name="battery_vdc" id="battery_vdc" >
	        			</td>
        			</tr>


        			<tr>
	        			<td>
	        			Output V Run
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  value="<?php echo $query['o_v_Rn'] ;?>" type="text" name="o_v_Rn" id="o_v_Rn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output V SN
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['o_v_sn'] ;?>" type="text" name="o_v_sn" id="o_v_sn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output V TN
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['o_v_tn'] ;?>" type="text" name="o_v_tn" id="o_v_tn" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output C R
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['o_c_r'] ;?>" type="text" name="o_c_r" id="o_c_r" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output C S
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['o_c_s'] ;?>" type="text" name="o_c_s" id="o_c_s" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output C T
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['o_c_t'] ;?>"  type="text" name="o_c_t" id="o_c_t" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			fHZ_2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  value="<?php echo $query['fHZ_2'] ;?>" type="text" name="fHZ_2" id="fHZ_2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			runtime
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['runtime'] ;?>" type="text" name="runtime" id="runtime" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ups
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['temp_ups'] ;?>" type="text" name="temp_ups" id="temp_ups" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_battery
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" value="<?php echo $query['temp_battery'] ;?>" name="temp_battery" id="temp_battery" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			load_kw
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['load_kw'] ;?>" type="text" name="load_kw" id="load_kw" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keterangan" value="<?php echo $query['keterangan'] ;?>" id="keterangan" ></textarea>
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