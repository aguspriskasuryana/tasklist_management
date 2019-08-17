<?php

//echo form_open_multipart(site_url()."/master/user/tambah_user/".$id,array("id"=>"form-materi"));

?>
<section class="scrollable wrapper">
	<div class="row">
		<div class="col-sm-6">
		<section class="panel">
			<header class="panel-heading font-bold">Info User</header>
			<div class="panel-body">
			  <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/user/update_data'); ?>" method="post">
			  <?php echo $this->csrf->get_html(); ?>
			  <input value="<?php echo $query['id_user'] ;?>" id="id_user" name="id_user" type="hidden" >
			  <input value="<?php echo $query['id_role'] ;?>" id="id_role" name="id_role" type="hidden" >
				<div class="form-group">
				  <label class="col-lg-2 control-label">User</label>
				  <div class="col-lg-10">
					<input type="text" class="form-control" data-required="true" name="nama_user" value="<?php echo $query['username'] ;?>" disabled>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">New Password</label>
				  <div class="col-lg-10">
					<input class="form-control" data-required="true" placeholder="Password" type="password" name="password1" id="password1" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-lg-2 control-label">New Password</label>
				  <div class="col-lg-10">
					<input class="form-control" data-required="true" placeholder="Masukkan lagi password"  type="password" name="password" id="password" onkeyup="checkPass(); return false;">
				  </div>
				</div>
				<span id="confirmMessage" class="confirmMessage"></span>
				<div class="form-group">
				  <div class="col-lg-offset-2 col-lg-10">
					<button type="submit" class="btn btn-sm btn-primary" style="display:none" id="btn_simpan">Simpan</button>
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
</script>