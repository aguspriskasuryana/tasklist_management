<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo (isset($page_title)) ? $page_title : '';?></title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/font.css" type="text/css" cache="false" />
  <?php if(isset($css_arr)): foreach($css_arr as $css): ?>
     <link rel="stylesheet" href="<?php echo base_url('asset/css/'.$css); ?>" type="text/css" />
  <?php endforeach; endif; ?> 
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/app.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/alertify.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/alertify-default.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/custom.css" type="text/css" />
  <link rel="shortcut icon" href="<?php echo base_url('#')?>" type="image/x-icon"/>
  <!--[if lt IE 9]>
    <script src="<?php echo base_url('asset'); ?>/js/ie/respond.min.js" cache="false"></script>
    <script src="<?php echo base_url('asset'); ?>/js/ie/html5.js" cache="false"></script>
    <script src="<?php echo base_url('asset'); ?>/js/ie/fix.js" cache="false"></script>
  <![endif]-->
  
  <script src="<?php echo base_url('asset'); ?>/js/jquery.min.js"></script>
  <!--script src="<?php echo base_url('asset'); ?>/js/jquery-ui-effect.min.js"></script-->
  <!-- Bootstrap -->
  <script src="<?php echo base_url('asset'); ?>/js/bootstrap.js"></script>
  <script src="<?php echo base_url('asset'); ?>/js/fuelux/fuelux.js"></script>
  <?php if(isset($js_arr)): foreach($js_arr as $js): ?>
   <script src="<?php echo base_url('asset/js/'.$js); ?>"></script>
  <?php endforeach; endif; ?>
  <script src="<?php echo base_url('asset'); ?>/js/app.js"></script>
  <script src="<?php echo base_url('asset'); ?>/js/app.plugin.js"></script>
  <script src="<?php echo base_url('asset'); ?>/js/alertify.min.js"></script>
  <script src="<?php echo base_url('asset'); ?>/js/numeral.js"></script>
  <script type="text/javascript" src="<?php echo base_url('asset'); ?>/js/js_export/tableExport.js"></script>
  <script type="text/javascript" src="<?php echo base_url('asset'); ?>/js/js_export/jquery.base64.js"></script>
  <script type="text/javascript" src="<?php echo base_url('asset'); ?>/js/js_export/jspdf/libs/sprintf.js"></script>
  <script type="text/javascript" src="<?php echo base_url('asset'); ?>/js/js_export/jspdf/jspdf.js"></script>
  <script type="text/javascript" src="<?php echo base_url('asset'); ?>/js/js_export/jspdf/libs/base64.js"></script>
  

</head>
<body>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <a class="nav-brand" href="index.html">DASHBOARD</a>
    <div class="row m-n">
      <div class="col-md-4 col-md-offset-4 m-t-lg">
        <section class="panel">
          <header class="panel-heading text-center">
            Sign in
          </header>
          <form id="login_form" method="post" class="panel-body">
            <input type="hidden" name="loginby" value="1">
            <div class="form-group">
              <label class="control-label">Username</label>
              <input type="text" name="username" placeholder="username" maxlength="32" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password" name="pwd" id="inputPassword" placeholder="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-info">Sign in</button>
          </form>
        </section>
      </div>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>Dahsboard TIK<br>&copy; 2018 build 22_20180122_h_i</small>
      </p>
    </div>
  </footer>
  <script>
  $(document).ready(function() {
    $('#login_form').submit(function(event) {
      event.preventDefault();   
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "<?php echo site_url('auth/modal_login'); ?>", 
        data: {username: $('input[name="username"]').val(), pwd: $('input[name="pwd"]').val(), loginby: $('input[name="loginby"]').val()},     
        success: function(data) {
          if(data) {
            $('#ajaxModalLogin').modal('hide');
            $('#ajaxModalLogin').remove();
            //alert('Login berhasil');
            window.location = "<?php echo site_url('task/activity'); ?>";
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
  <!-- / footer -->
	<script src="<?php echo base_url('asset'); ?>/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('asset'); ?>/js/bootstrap.js"></script>
  <!-- app -->
  <script src="<?php echo base_url('asset'); ?>/js/app.js"></script>
  <script src="<?php echo base_url('asset'); ?>/js/app.plugin.js"></script>
  <script src="<?php echo base_url('asset'); ?>/js/app.data.js"></script>
</body>
</html>