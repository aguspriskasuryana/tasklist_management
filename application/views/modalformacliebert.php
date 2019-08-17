

<form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_edit_form/acliebert'); ?>" method="post">
				<input value="<?php echo $query['id_ac'] ;?>" type="hidden" name="id_ac" id="id_ac" >
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
	        			temp_ACI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['temp_ACI'] ;?>" name="temp_ACI" id="temp_ACI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ACII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['temp_ACII'] ;?>" name="temp_ACII" id="temp_ACII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ACIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['temp_ACIII'] ;?>" name="temp_ACIII" id="temp_ACIII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_ACI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['rh_ACI'] ;?>" name="rh_ACI" id="rh_ACI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_ACII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['rh_ACII'] ;?>" name="rh_ACII" id="rh_ACII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_ACIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['rh_ACIII'] ;?>" name="rh_ACIII" id="rh_ACIII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_ups
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['temp_ups'] ;?>" name="temp_ups" id="temp_ups" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_snmpI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['temp_snmpI'] ;?>" name="temp_snmpI" id="temp_snmpI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_snmpII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['temp_snmpII'] ;?>" name="temp_snmpII" id="temp_snmpII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_snmpIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['temp_snmpIII'] ;?>" name="temp_snmpIII" id="temp_snmpIII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_snmpI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['rh_snmpI'] ;?>" name="rh_snmpI" id="rh_snmpI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_snmpII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['rh_snmpII'] ;?>" name="rh_snmpII" id="rh_snmpII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_snmpIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['rh_snmpIII'] ;?>" name="rh_snmpIII" id="rh_snmpIII" >
	        			</td>
        			</tr>

					<tr>
	        			<td>
	        			temp_migle
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['temp_migle'] ;?>" name="temp_migle" id="temp_migle" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_migle
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['rh_migle'] ;?>" name="rh_migle" id="rh_migle" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_krisbow
	        			</td>
	        			<td>
	        			<input class="form-control"  data-required="true" placeholder="" type="text" value="<?php echo $query['temp_krisbow'] ;?>" name="temp_krisbow" id="temp_krisbow" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			rh_krisbow
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['rh_krisbow'] ;?>" name="rh_krisbow" id="rh_krisbow" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			temp_battery
	        			</td>
	        			<td>
	        			<input class="form-control"  data-required="true" placeholder="" type="text" value="<?php echo $query['temp_battery'] ;?>" name="temp_battery" id="temp_battery" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			ratas_akhir_temp
	        			</td>
	        			<td>
	        			<input class="form-control"  data-required="true" placeholder="" type="text" value="<?php echo $query['ratas_akhir_temp'] ;?>" name="ratas_akhir_temp" id="ratas_akhir_temp" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			ratas_akhir_rh
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['ratas_akhir_rh'] ;?>" name="ratas_akhir_rh" id="ratas_akhir_rh" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_ACI
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['status_ACI'] ;?>" name="status_ACI" id="status_ACI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_ACII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['status_ACII'] ;?>" name="status_ACII" id="status_ACII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_ACIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['status_ACIII'] ;?>" name="status_ACIII" id="status_ACIII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_komp_ACI
	        			</td>
	        			<td>
	        			<input class="form-control"  data-required="true" placeholder="" type="text" value="<?php echo $query['status_komp_ACI'] ;?>" name="status_komp_ACI" id="status_komp_ACI" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_komp_ACII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['status_komp_ACII'] ;?>" name="status_komp_ACII" id="status_komp_ACII" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			status_komp_ACIII
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" type="text" value="<?php echo $query['status_komp_ACIII'] ;?>" name="status_komp_ACIII" id="status_komp_ACIII" >
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
			