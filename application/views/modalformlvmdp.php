

<form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_edit_form/lvmdp'); ?>" method="post">
				<input value="<?php echo $query['id_lvmdp'] ;?>" type="hidden" name="id_lvmdp" id="id_lvmdp" >
				<input value="<?php echo $query['id_act'] ;?>" type="hidden" name="id_act" id="id_act" >
				
		    			
				<table border="0" width="100%">


					
        			<tr>
	        			<td>
	        			Jam Start
	        			</td>
	        			<td>
						<input class="form-control" data-required="true" placeholder="08:30:00" value="<?php echo $query['jam'] ;?>" type="text" name="jam" id="jam" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			PB ON OFF
	        			</td>
	        			<td>
	        			<?php if ($query['pb_on_off'] == 1 ){?>
	        			<input type="radio" name="pb_on_off" value="0" > OFF |  <input type="radio" name="pb_on_off" checked value="1"> ON
	        			<?php } else { ?>
	        			<input type="radio" name="pb_on_off" value="0" checked> OFF |  <input type="radio" name="pb_on_off"  value="1"> ON
	        			<?php } ?>

	    				
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			ir_a
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['ir_a'] ;?>" name="ir_a" id="ir_a" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			is_a
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['is_a'] ;?>" placeholder="" type="text" name="is_a" id="is_a" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			it_a
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['it_a'] ;?>" placeholder="" type="text" name="it_a" id="it_a" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rs_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['rs_v'] ;?>" placeholder="" type="text" name="rs_v" id="rs_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rt_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['rt_v'] ;?>" placeholder="" type="text" name="rt_v" id="rt_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			st_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['st_v'] ;?>" placeholder="" type="text" name="st_v" id="st_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rn_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['rn_v'] ;?>" placeholder="" type="text" name="rn_v" id="rn_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			sn_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['sn_v'] ;?>" placeholder="" type="text" name="sn_v" id="sn_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			tn_v
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['tn_v'] ;?>" placeholder="" type="text" name="tn_v" id="tn_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			f_hz
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['f_hz'] ;?>" placeholder="" type="text" name="f_hz" id="f_hz" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			cos_phi
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['cos_phi'] ;?>" placeholder="" type="text" name="cos_phi" id="cos_phi" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			kWh
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" value="<?php echo $query['kWh'] ;?>" placeholder="" type="text" name="kWh" id="kWh" >
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
			