

<form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/task/simpan_data_edit_form/kwh'); ?>" method="post">
				<input value="<?php echo $query['id_kwh'] ;?>" type="hidden" name="id_kwh" id="id_kwh" >
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
	        			LWBP
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['LWBP'] ;?>" type="text" name="LWBP" id="LWBP" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			WBP
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder="" value="<?php echo $query['WBP'] ;?>" type="text" name="WBP" id="WBP" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			KVAR
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  value="<?php echo $query['KVAR'] ;?>" type="text" name="KVAR" id="KVAR" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Cos Q
	        			</td>
	        			<td>
	        			<input class="form-control" data-required="true" placeholder=""  value="<?php echo $query['Cos_Q'] ;?>" type="text" name="Cos_Q" id="Cos_Q" >
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Keterangan
	        			</td>
	        			<td>
	        			<textarea class="form-control" data-required="true" name="keterangan"  id="keterangan" ><?php echo $query['keterangan'] ;?></textarea>
	        			</td>
        			</tr>

        			<tr>
	        			<td>
	        			Lokasi
	        			</td>
	        			<td>
	        			<select name="lokasi" id="lokasi" class="form-control m-b">
						<?php foreach($lokasi as $lokasi){
							$selected = "";
							if ($lokasi['id_lokasi'] == $query['lokasi']){
								$selected = "selected";
							}
						?>
						<option value="<?php echo $lokasi['id_lokasi'];?>" <?php echo $selected ?> ><?php echo $lokasi['nama_lokasi']?></option>
						<?php }?>
                        </select>
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