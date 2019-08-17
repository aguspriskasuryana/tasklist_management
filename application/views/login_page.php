<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <!--<link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/bootstrap.css" type="text/css" />-->
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/login/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/plugin.css" type="text/css" />
  <!--<link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/app.css" type="text/css" />-->
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/login/app.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/alertify.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/alertify-default.css" type="text/css" />
</head>
<body style="background-color: white;">
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
      <div class="col-md-4 col-md-offset-4 m-t-lg">
        <section class="panel">
          <form action="" method="post" class="panel-body">
            <div class="form-group">
              <label class="control-label">Username :</label>
              <input name="username" placeholder="masukan username" maxlength="32" class="form-control" required="" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">Password :</label>
              <input name="pwd" id="inputPassword" placeholder="masukan password" class="form-control" required="" type="password">
			</div>
			<div class="form-group">
				<label class="control-label">Jenis :</label>
						<select name="posisi" id="posisi" class="form-control">
						<option value="1" selected>Internal</option>
						<option value="2">Eksternal</option>
                        </select>
				</div>
            <!--a href="<?php //echo base_url('index.php/account/account/lupa_password')?>" class="pull-right m-t-xs" data-toggle="ajaxModal"><small><div class="lost">Lupa password</div></small></a-->
            <button type="submit" class="btn btn-info">Masuk</button>
            <!--a href="<?php //echo base_url('index.php/account/account/registration/0')?>" class="btn btn-white btn-block">Daftar Akun Baru</a-->
          </form>
        </section>
      </div>
    </div>
  </section>
  <div class="sexel">
	<div class="skel"></div>
  </div>

  
	<script src="<?php echo base_url('asset'); ?>/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url('asset'); ?>/js/bootstrap.js"></script>
	<!-- app -->
	<script src="<?php echo base_url('asset'); ?>/js/app.js"></script>
	<script src="<?php echo base_url('asset'); ?>/js/app.plugin.js"></script>
	<script src="<?php echo base_url('asset'); ?>/js/alertify.min.js"></script>
	<script>
<?php
if($this->session->flashdata('alerts')) {
	foreach($this->session->flashdata('alerts') as $key => $alert) {
		if($alert[0] == 'success') echo 'setTimeout(function() {alertify.success("'.$alert[1].'");}, '.($key*250).');'."\n";
		else if($alert[0] == 'error') echo 'setTimeout(function() {alertify.error("'.$alert[1].'");}, '.($key*250).');'."\n";
		else if($alert[0] == 'warning') echo 'setTimeout(function() {alertify.warning("'.$alert[1].'");}, '.($key*250).');'."\n";
		else echo 'setTimeout(function() {alertify.notify("'.$alert[1].'");}, '.($key*250).');'."\n";
	}
}
?>
</script>
</body>
</html>