<?php

//echo form_open_multipart(site_url()."/master/user/tambah_user/".$id,array("id"=>"form-materi"));

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Form Tambah User</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/user/simpan_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input id="id_user" name="id_user" type="hidden" >
				<div class="form-group">
				  <label class="col-lg-2 control-label">Nama Lengkap</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="nama_lengkap">
				  </div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Posisi</label>
					<div class="col-sm-10">
						<select name="id_role" id="id_role" class="form-control m-b">
						<?php foreach($role as $roles){
						if($roles['id_role'] != 0){
						?>
						<option value="<?php echo $roles['id_role']?>"><?php echo $roles['nama_role']?></option>
						<?php 
						}
						}
						?>
                        </select>
					 </div>
				</div>
				<div class="form-group">
				<label class="col-lg-2 control-label">Team</label>
					<div class="col-sm-10">
						<select name="team" id="team" class="form-control m-b">
						<?php foreach($team as $teams){
						?>
						<option value="<?php echo $teams['id_team'];?>" selected><?php echo $teams['nama']?></option>
						<?php }?>
                        </select>
					 </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Username</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="nama_user" id="nama_user" onkeyup="cek_username(event)">
					<br />
					<p><span id="hasil_ketik"></span><span id="hasil_username"></span></p>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Password</label>
				  <div class="col-lg-10">
					<input class="form-control" data-required="true" placeholder="Password" type="password" name="password1" id="password1" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">Password</label>
				  <div class="col-lg-10">
					<input class="form-control" data-required="true" placeholder="Masukkan lagi password"  type="password" name="password" id="password" onkeyup="checkPass(); return false;">
				  </div>
				</div>
				<span id="confirmMessage" class="confirmMessage"></span>
				<div class="form-group">
				  <div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-sm btn-primary" id="btn_simpan" style="display:none">Simpan</button>
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
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('password1');
    var pass2 = document.getElementById('password');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!";
		$('#btn_simpan').show();
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
		$('#btn_simpan').hide();
    }
}  

function cek_username(event) {
	var x = $('#nama_user').val();
	document.getElementById("hasil_ketik").innerHTML = x;
	$.getJSON('<?php echo site_url('user/cek_username'); ?>', {username: x}, function(data) {
			if(data.length == 0){
			 $('#hasil_username').text(', dapat digunakan');
			}else{
				$('#hasil_username').text(', sudah digunakan. silahkan dengan username lain!');
				}
	});
    
    
}
</script>