

<form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_edit_form/ups'); ?>" method="post">
				<input value="<?php echo $query['id_form_ups'] ;?>" type="hidden" name="id_form_ups" id="id_form_ups" >
				<input value="<?php echo $query['ups_no'] ;?>" type="hidden" name="ups_no" id="ups_no" >
				<input value="<?php echo $query['id_act'] ;?>" type="hidden" name="id_act" id="id_act" >
				<table border="0" text-align="right" width="100%">
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
	        			By Pass Suply Healthy
	        			</td>
	        			<td>
	        			<?php if ($query['by_pass_suply_healthy'] == 1 ){?>
	        			<input type="radio" name="by_pass_suply_healthy" value="0" > OFF |  <input type="radio" name="by_pass_suply_healthy" checked value="1"> ON
	        			<?php } else { ?>
	        			<input type="radio" name="by_pass_suply_healthy" value="0" checked> OFF |  <input type="radio" name="by_pass_suply_healthy"  value="1"> ON
	        			<?php } ?>

	    				
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input Suply Healthy
	        			</td>
	        			<td>

	        			
	    				<?php if ($query['input_suply_healthy'] == 1 ){?>
	        			<input type="radio" name="input_suply_healthy" value="0" > OFF |  <input type="radio" name="input_suply_healthy" checked value="1"> ON
	        			<?php } else { ?>
	        			<input type="radio" name="input_suply_healthy" value="0" checked> OFF |  <input type="radio" name="input_suply_healthy"  value="1"> ON
	        			<?php } ?>
	        			
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input l1 l2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  value="<?php echo $query['input_l1_l2'] ;?>" type="text" name="input_l1_l2" id="input_l1_l2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input l2 l3
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['input_l2_l3'] ;?>" type="text" name="input_l2_l3" id="input_l2_l3" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Input l1 l3
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['input_l1_l3'] ;?>" type="text" name="input_l1_l3" id="input_l1_l3" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Baterry Supply Healthy Led
	        			</td>
	        			<td>

	    				<?php if ($query['baterry_supply_healthy_led'] == 1 ){?>
	        			<input type="radio" name="baterry_supply_healthy_led" value="0" > OFF |  <input type="radio" name="input_suply_healthy" checked value="1"> ON
	        			<?php } else { ?>
	        			<input type="radio" name="baterry_supply_healthy_led" value="0" checked> OFF |  <input type="radio" name="baterry_supply_healthy_led"  value="1"> ON
	        			<?php } ?>

	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Batere V
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['batere_v'] ;?>" type="text" name="batere_v" id="batere_v" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Batere l
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['batere_l'] ;?>" type="text" name="batere_l" id="batere_l" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Baterry Charge
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['baterry_charge'] ;?>" type="text" name="baterry_charge" id="baterry_charge" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Inverter Output Healthy Led
	        			</td>
	        			<td>
	        			
	        			
						<?php if ($query['inverter_output_healthy_led'] == 1 ){?>
	        			<input type="radio" name="inverter_output_healthy_led" value="0" > OFF |  <input type="radio" name="inverter_output_healthy_led" checked value="1"> ON
	        			<?php } else { ?>
	        			<input type="radio" name="inverter_output_healthy_led" value="0" checked> OFF |  <input type="radio" name="inverter_output_healthy_led"  value="1"> ON
	        			<?php } ?>

	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output L1
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['output_l1'] ;?>" type="text" name="output_l1" id="output_l1" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output L2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['output_l2'] ;?>" type="text" name="output_l2" id="output_l2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Output L3
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['output_l3'] ;?>" type="text" name="output_l3" id="output_l3" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Current L1
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['out_current_l1'] ;?>" type="text" name="out_current_l1" id="out_current_l1" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Current L2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['out_current_l2'] ;?>" type="text" name="out_current_l2" id="out_current_l2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Current L3
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['out_current_l3'] ;?>" type="text" name="out_current_l3" id="out_current_l3" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Kw Power L1
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  value="<?php echo $query['out_kw_power_l1'] ;?>" type="text" name="out_kw_power_l1" id="out_kw_power_l1" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Kw Power L2
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['out_kw_power_l2'] ;?>" type="text" name="out_kw_power_l2" id="out_kw_power_l2" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Kw Power L3
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['out_kw_power_l3'] ;?>" type="text" name="out_kw_power_l3" id="out_kw_power_l3" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Frek Inv
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['out_frek_inv'] ;?>" type="text" name="out_frek_inv" id="out_frek_inv" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Out Frek by Pass
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['out_frek_by_pass'] ;?>" type="text" name="out_frek_by_pass" id="out_frek_by_pass" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Loadon Inv by Pass
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  type="text" value="<?php echo $query['loadon_inv_by_pass'] ;?>" name="loadon_inv_by_pass" id="loadon_inv_by_pass" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keteranganups" id="keteranganups" ><?php echo $query['keterangan'] ;?></textarea>
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
			