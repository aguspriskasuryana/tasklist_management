<div class="modal-over">
  <div class="modal-center animated flipInX" style="width:300px;margin:-150px 0 0 -150px;">
    <section class="panel">
	  <header class="panel-heading text-center">
		Silahkan login untuk melanjutkan..
	  </header>
	  <form id="login_form" method="post" class="panel-body">
		<div class="form-group">
		  <label class="control-label">Username</label>
		  <input type="text" name="username" placeholder="username" maxlength="32" class="form-control" required>
		</div>
		<div class="form-group">
		  <label class="control-label">Password</label>
		  <input type="password" name="pwd" id="inputPassword" placeholder="password" class="form-control" required>
		</div>
		<button type="submit" class="btn btn-info">Log in</button>
	  </form>
	</section>
  </div>
</div>

<script>
$(document).ready(function() {
	$('#login_form').submit(function(event) {
		event.preventDefault();		
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: "<?php echo site_url('auth/modal_login'); ?>", 
			data: {username: $('input[name="username"]').val(), pwd: $('input[name="pwd"]').val()},			
			success: function(data) {
				if(data) {
					$('#ajaxModalLogin').modal('hide');
					$('#ajaxModalLogin').remove();
					//alert('Login berhasil');
					window.location = "<?php echo site_url('home'); ?>";
				}
				else {
					alert('Username dan Password tidak cocok');
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				$('#ajaxModalLogin').modal('hide');
				$('#ajaxModalLogin').remove();
				
			}
		});
	});
});
</script>