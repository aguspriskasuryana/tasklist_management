  <!DOCTYPE html>
<?php
//echo 'Versi PHP yang sedang digunakan: ' . phpversion();
$role=array("Superadmin","Kabag","Wakabag","Supervisor BRI","Admin Librarian","Pelaksana","Supervisor BKS");
$id_role=array("0","1","2","3","4","5","6");
$id = $this->session->userdata('user_data');
if ($id['id_user'] == ""){
    redirect(site_url()."/home");
}

  ?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo (isset($page_title)) ? $page_title : '';?></title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <link rel="shortcut icon" type="image/ico" href="<?php echo base_url('images');?>/favicon.ico"/>
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/font.css" type="text/css" cache="false" />
  <?php	if(isset($css_arr)): foreach($css_arr as $css): ?>
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

  <script type="text/javascript">
  history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
  
  <script src="<?php echo base_url('asset'); ?>/js/jquery.min.js"></script>
  <!--script src="<?php echo base_url('asset'); ?>/js/jquery-ui-effect.min.js"></script-->
  <!-- Bootstrap -->
  <script src="<?php echo base_url('asset'); ?>/js/bootstrap.js"></script>
  <script src="<?php echo base_url('asset'); ?>/js/fuelux/fuelux.js"></script>
  <?php	if(isset($js_arr)): foreach($js_arr as $js): ?>
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
<script type="text/javascript" src="<?php echo base_url('asset'); ?>/asset/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url('asset'); ?>/asset/ckfinder/ckfinder.js"></script>

</head>
<body>

<script>
var page_load;
window.onload = page_load = setTimeout(function() {show_loading('Memuat halaman');}, 400);

$(window).load(function() {
	clearTimeout(page_load);
	setTimeout(function() {hide_loading();}, 1600);
	//start_check_sess();
	$('form').submit(function() {
		if($('form[data-validate="parsley"]').length > 0){
			if($('form[data-validate="parsley"]').parsley('isValid')){
				show_loading('Mengirim data', false);
			}
		}
		else {
			show_loading('Mengirim data', false);
		}
	});
	alertify.defaults.glossary.title = 'TERMIN';
});

var check_sess, timer;

function start_check_sess() {
	check_sess = setInterval(function() {
		$.ajax({
			url: '<?php echo site_url('auth/check_sess_ajax'); ?>',
			dataType: 'json',
			cache: false,
			success: function(data) {
				hide_no_connection();
				$('#ajaxModalLogin').modal('hide');
				$('#ajaxModalLogin').remove();
				if(!data) {
					stop_check_sess();
					var $this = $(this)
					  , $remote = '<?php echo site_url('auth/modal_login'); ?>'
					  , $modal = $('<div class="modal" id="ajaxModalLogin"><div class="modal-body"></div></div>');
					$('body').append($modal); 
					$modal.modal();
					$modal.load($remote);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				show_no_connection();
			}
		});
	}, 100000000);
}

function stop_check_sess() {
	clearInterval(check_sess);
}

function show_no_connection() {
	if($('#ajaxModalConnection').length == 0) {
		var $this = $(this)				  
		  , $modal = $('<div class="modal" id="ajaxModalConnection"><div class="modal-body"><div class="modal-over"><div class="modal-center animated flipInX" style="width:600px;margin:150px 0 0 -300px;color:white;text-align:center;"><h1>Tidak dapat terhubung ke server.<br>Menghubungi server<span id="mytimer">.</span></h1></div></div></div></div>');
		$('body').append($modal);
		$modal.modal({backdrop: 'static', keyboard: false});
		start_mytimer();
	}
}

function hide_no_connection() {
	if($('#ajaxModalConnection').length == 1) {
		stop_mytimer();
		$('#ajaxModalConnection').modal('hide');
		$('#ajaxModalConnection').remove();		
		alertify.success('Terhubung dengan server');
	}
}

function start_mytimer() {
	timer = setInterval(function(){myTimer()},1000);		
}

function stop_mytimer() {
	clearInterval(timer);
}

function myTimer() {
    var titik = $('#mytimer').text();
    if(titik.length < 5) $('#mytimer').text(titik+'.');
	else $('#mytimer').text('.');
}

function show_loading(loading_text, closable) {
	if($('#ajaxModalLoading').length == 0) {
		if(typeof loading_text == 'undefined') loading_text = 'Loading';
		if(typeof closable == 'undefined') closable = true;
		var $this = $(this)				  
		  , $modal = $('<div class="modal" id="ajaxModalLoading" style="z-index:1070;"><div class="modal-body"><div class="modal-over"><div class="modal-center animated flipInX" style="width:600px;margin:150px 0 0 -300px;color:white;text-align:center;"><h1>'+loading_text+'<span id="mytimer">..</span></h1></div></div></div></div>');
		$('body').append($modal);
		if(!closable) $modal.modal({backdrop: 'static', keyboard: false});
		else $modal.modal();
		$('#ajaxModalLoading').next('div.modal-backdrop').css('z-index', '1060');
		start_mytimer();
	}
}

function hide_loading() {
	if($('#ajaxModalLoading').length == 1) {
		stop_mytimer();
		$('#ajaxModalLoading').modal('hide');
		$('#ajaxModalLoading').remove();		
	}
}

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

$.getJSON('<?php echo site_url('task/notif'); ?>',function(data){
		$('#notif1').text(data);
		$('#notif2').text(data);
	
});		

</script>

  <section class="hbox stretch">
    <!-- .aside -->
    <aside class="bg-light aside-sm" id="nav">
      <section class="vbox">
        <header class="dker nav-bar nav-bar-fixed-top">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
            <i class="fa fa-bars"></i>
          </a>
          
          <a href="#" class="nav-brand" data-toggle="fullscreen">TIK</a>
          <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
            <i class="fa fa-comment-o"></i>
          </a>
        </header>
        <section>
	
		      <div class="bg-info nav-user hidden-xs pos-rlt">            
            
            <div class="nav-msg">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <b class="badge badge-white count-n" id="notif1"></b>
              </a>
              <section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
                <div class="arrow left"></div>
                <section class="panel bg-white">
                  <header class="panel-heading">
                    <strong>Ada <span class="count-n" id="notif2"></span> task yang belum di paraf!</strong>
                  </header>
                </section>
              </section>
            </div>
          </div>



		 
          <!-- user -->
		  <!--
          <div class="bg-black nav-user hidden-xs pos-rlt">
            <div class="nav-avatar pos-rlt">
              <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
                <img src="<?php //echo base_url('asset'); ?>/images/avatar.jpg" alt="" class="">
                <span class="caret caret-white"></span>
              </a>
              <ul class="dropdown-menu m-t-sm animated fadeInLeft">
              	<span class="arrow top"></span>
                <li>
                  <a href="#">Settings</a>
                </li>
                <li>
                  <a href="profile.html">Profile</a>
                </li>
                <li>
                  <a href="#">
                    <span class="badge bg-danger pull-right">3</span>
                    Notifications
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="docs.html">Help</a>
                </li>
                <li>
                  <a href="signin.html">Logout</a>
                </li>
              </ul>
              <div class="visible-xs m-t m-b">
                <a href="#" class="h3">John.Smith</a>
                <p><i class="fa fa-map-marker"></i> London, UK</p>
              </div>
            </div>
            <div class="nav-msg">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <b class="badge badge-white count-n">2</b>
              </a>
              <section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
                <div class="arrow left"></div>
                <section class="panel bg-white">
                  <header class="panel-heading">
                    <strong>You have <span class="count-n">2</span> notifications</strong>
                  </header>
                  <div class="list-group">
                    <a href="#" class="media list-group-item">
                      <span class="pull-left thumb-sm">
                        <img src="<?php //echo base_url('asset'); ?>/images/avatar.jpg" alt="John said" class="img-circle">
                      </span>
                      <span class="media-body block m-b-none">
                        Use awesome animate.css<br>
                        <small class="text-muted">28 Aug 13</small>
                      </span>
                    </a>
                    <a href="#" class="media list-group-item">
                      <span class="media-body block m-b-none">
                        1.0 initial released<br>
                        <small class="text-muted">27 Aug 13</small>
                      </span>
                    </a>
                  </div>
                  <footer class="panel-footer text-sm">
                    <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                    <a href="#">See all the notifications</a>
                  </footer>
                </section>
              </section>
            </div>
          </div>
		  -->
          <!-- / user -->
          <!-- nav -->
          <nav class="nav-primary hidden-xs">
            <ul class="nav">


              <?php 
              $idkartu = $id['id_kartu'] ;
              $host = $_SERVER['HTTP_HOST'];
              //var_dump($uri);
              if ( strlen($idkartu) == 0) { ?>
              <li class="bg-white nav-user hidden-xs pos-rlt">
                <p style="color:red">Mohon lengkapi data personal !</p>
              </li>
              <?php } ?>

              
                                    <form  id="epaperform" action="http://<?php echo $host;?>/epaper/pages/loginfromdashboard.php" method="post">
                                    <input type="hidden" data-required="true" value="<?php echo $id['username'];?>" name="username">
                                    <input type="hidden" data-required="true" value="<?php echo $id['id_kartu'];?>" name="id_tamu">
                                    <input type="hidden" data-required="true" value="0" id="targetx" name="target">
                                    </form>
                                    
                                    <form id="absensiform" action="http://<?php echo $host;?>/dashboard_absensi/index.php/auth/loginDahsboard" method="post">
                                    <input type="hidden" data-required="true" value="0" id="targetab" name="targetab">
                                    <input type="hidden" data-required="true" value="<?php echo $id['nama_lengkap'];?>" name="nama">
                                    <input type="hidden" data-required="true" value="<?php echo $id['id_kartu'];?>" name="id_tamu">
                                    </form>



                                 

              <!--<div class="bg-danger wrapper hidden-vertical animated fadeInUp text-sm">            
               <a href="#" data-dismiss="alert" class="pull-right m-r-n-sm m-t-n-sm"><i class="fa fa-times"></i></a>
                Silahkan cek SLA kamu hingga hari ini dengan mengklik absensi diatas lalu pilih report
              </div>-->


           
           <?php if (($id['id_role'] == 0)||($id['id_role'] == 4)|| ($id['id_role'] == 3) || ($id['id_role'] == 2) || ($id['id_role'] == 1) ) { ?>
              
              <li class="dropdown-submenu"> 
                  <a href="<?php echo site_url('home/dashboard2'); ?>">
                  <i class="fa fa-home"></i>
                  <span>Home Page</span>
                </a>
              </li>


           <?php } else { ?>
              <li class="">
                <a href="<?php echo site_url('home'); ?>">
                  <i class="fa fa-home"></i>
                  <span>Home</span>
                </a>
              </li>
           <?php } ?>
              
              <li class="dropdown-submenu">
                  <a href="javascript:myFunctionEpaper(0)">
                      <i class="fa fa-envelope-o"></i>
                         <span>Epaper</span>
                  </a>
                    <ul class="dropdown-menu">                
                      <li class="">
                          <a href="javascript:myFunctionEpaper(0)" >
                              <i class="fa fa-envelope-o"></i>
                                 <span>Epaper</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="javascript:myFunctionEpaper(1)" >
                              <i class="fa fa-envelope-o"></i>
                                 <span>Daftar Surat Pribadi</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="javascript:myFunctionEpaper(2)" >
                              <i class="fa fa-envelope-o"></i>
                                 <span>Pencarian Surat</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="javascript:myFunctionEpaper(3)" >
                              <i class="fa fa-envelope-o"></i>
                                 <span>Archive 2017</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="javascript:myFunctionEpaper(4)" >
                              <i class="fa fa-envelope-o"></i>
                                 <span>Form Ijin Masuk Barang</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="javascript:myFunctionEpaper(5)" >
                              <i class="fa fa-envelope-o"></i>
                                 <span>Form Ijin Penggunaan fasilitas</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="javascript:myFunctionEpaper(6)" >
                              <i class="fa fa-envelope-o"></i>
                                 <span>Delete</span>
                          </a>
                      </li>
                    </ul>
              </li>

                <li class="dropdown-submenu">
                    <a href="javascript:myFunctionAbsensi(0)" >
                      <i class="fa fa-clock-o"></i>
                      <span>Absensi</span>
                    </a>
                    <ul  class="dropdown-menu">
                    <?php  if ($id['id_role'] == 0 || $id['id_role'] == 4 || $id['id_role'] == 3 || $id['id_role'] == 1 || $id['id_role'] ==  2 || $id['id_role'] == 8 || $id['id_role'] == 10 ) {   ?>    
                      <li class="">
                        <a href="javascript:myFunctionAbsensi(1)">
                          <i class="fa fa-users"></i>
                          <span>Kunjungan</span>
                        </a>
                      </li>

                      <?php } ?> 
                      <li class="">
                        <a href="javascript:myFunctionAbsensi(2)">
                          <i class="fa fa-users"></i>
                          <span>Perubahan jadwal</span>
                        </a>
                      </li>
                      <li class="">
                        <a href="javascript:myFunctionAbsensi(3)">
                          <i class="fa fa-clock-o"></i>
                          <span>Log Akses</span>
                        </a>
                      </li>
                      <li class="">
                        <a href="javascript:myFunctionAbsensi(4)">
                          <i class="fa fa-print"></i>
                          <span>Daily By Monthly</span>
                        </a>
                      </li>
                    </ul>
                </li>
              
              <li class="">
                <a href="<?php echo site_url('home/monitoring'); ?>">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Monitoring</span>
                </a>
              </li>

              <li class="dropdown-submenu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user"></i>
                  <span>Profil</span>
                </a>
                <ul class="dropdown-menu">                
                  <li class="">
                    <a href="<?php echo site_url('user/edit_user_detail/'.$id['id_user']); ?>" class="dropdown-toggle">
                    <i class="fa fa-user"></i>
                    <span>Profil</span>
                    </a>
                  </li>
                  <li class="">
                    <a href="<?php echo site_url('user/list_my_team'); ?>">
                      <i class="fa fa-group"></i>
                      <span>My Team</span>
                    </a>
                  </li>
                </ul>

              </li>

			  <?php	  
			  
			  if ($id['id_role'] == 0 || $id['id_role'] == 4 || $id['id_role'] == 3 || $id['id_role'] == 2 || $id['id_role'] == 1 || $id['id_role'] == 8) {	  ?>
            	<li class="dropdown-submenu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <i class="fa fa-list"></i>
					  <span>Master</span>
					</a>
					<ul class="dropdown-menu">  
						<li class="">
							<a href="<?php echo site_url('user')?>" class="dropdown-toggle">
			                  <i class="fa fa-circle"></i>
			                  <span>User</span>
			                </a>
						</li>   
            <li class="">
              <a href="<?php echo site_url('phonebook'); ?>" class="dropdown-toggle">
                        <i class="fa fa-phone"></i>
                        <span>Phonebook</span>
                      </a>
            </li>   
            <li class="">
              <a href="<?php echo site_url('telp_activity'); ?>" class="dropdown-toggle">
                        <i class="fa fa-external-link-square"></i>
                        <span>Telp Activity</span>
                      </a>
            </li>   
            <li class="">
              <a href="<?php echo site_url('balakar'); ?>" class="dropdown-toggle">
                        <i class="fa fa-group"></i>
                        <span>Balakar</span>
                      </a>
            </li>        
						<li class="">
							<a href="<?php echo site_url('team'); ?>" class="dropdown-toggle">
			                  <i class="fa fa-group"></i>
			                  <span>Team</span>
			                </a>
						</li>
						<li class="">
							<a href="<?php echo site_url('role')?>" class="dropdown-toggle">
			                  <i class="fa fa-circle"></i>
			                  <span>Role</span>
			       </a>
						</li>
            <li class="">
                <a href="<?php echo site_url('risalah')?>" class="dropdown-toggle">
                <i class="fa fa-briefcase"></i>
                <span>Risalah</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('temuan_audit')?>" class="dropdown-toggle">
                <i class="fa fa-briefcase"></i>
                <span>Temuan Audit</span>
                </a>
            </li>

            
            <li class="">
              <a href="<?php echo site_url('keluarga')?>" class="dropdown-toggle">
              <i class="fa fa-users"></i>
              <span>Keluarga</span>
              </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('gangguan')?>" class="dropdown-toggle">
                <i class="fa fa-warning"></i>
                <span>Insiden</span>
                </a>
            </li>
            
            

            

					</ul>
				</li>
              
			  <?php  } if ($id['id_role'] == 3) { ?>
        

				<li class="dropdown-submenu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <i class="fa fa-flask"></i>
					  <span>Task List</span>
					</a>
					<ul class="dropdown-menu">                
					  	<li class="">
							<a href="<?php echo site_url('task/activity')?>" class="dropdown-toggle">
							<i class="fa fa-list"></i>
							<span>My Activity</span>
							</a>
						</li>
						<li class="">
							<a href="<?php echo site_url('task/activitypending')?>" class="dropdown-toggle">
							<i class="fa fa-list"></i>
							<span>My Activity Pending</span>
							</a>
						</li>
						<li class="">
							<a href="<?php echo site_url('task/paraf_spv_bri')?>" class="dropdown-toggle">
							<i class="fa fa-list"></i>
							<span>Task List Pelaksana</span>
							</a>
						</li>

						<li class="">
							<a href="<?php echo site_url('task/paraf_spv_bri_pending')?>" class="dropdown-toggle">
							<i class="fa fa-list"></i>
							<span>Task List Pelaksana Pending</span>
							</a>
						</li>
						<li class="">
							<a href="<?php echo site_url('task/assign_spv')?>" class="dropdown-toggle">
							<i class="fa fa-folder-open-o"></i>
							<span>Assign Task List</span>
							</a>
						</li>
						<li class="">
							<a href="<?php echo site_url('task')?>" class="dropdown-toggle">
							<i class="fa fa-briefcase"></i>
							<span>Master Task</span>
							</a>
						</li>
            <li class="">
              <a href="<?php echo site_url('task/list_report'); ?>">
                <i class="fa fa-print"></i>
                <span>Report</span>
              </a>
            </li>
					</ul>

				</li>


        <li class="">
            <a href="<?php echo site_url('harian_spv')?>" class="dropdown-toggle">
            <i class="fa fa-briefcase"></i>
            <span>Harian SPV</span>
            </a>
          </li>
          				

				  <li class="dropdown-submenu">

					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <i class="fa fa-list"></i>
					  <span>Form</span>
					</a>

					<ul class="dropdown-menu">
          <li class="">
            <a href="<?php echo site_url('mutasi_harian_hk')?>" class="dropdown-toggle">
            <i class="fa fa-briefcase"></i>
            <span>Harian HK</span>
            </a>
          </li>

					<li class="">
						<a href="<?php echo site_url('form/getlistformups')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>UPS</span>
						</a>
					</li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformupsmb2')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>UPS MB2</span>
            </a>
            
          </li>

					<li class="">
						<a href="<?php echo site_url('form/getlistformkwh')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>KWH</span>
						</a>
						
					</li>

					<li class="">
						<a href="<?php echo site_url('form/getlistformacliebert')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>PAC STULZ</span>
						</a>
						
					</li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformacliebertmb2')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>AC Liebert MB2</span>
            </a>
            
          </li>

					<li class="">
						<a href="<?php echo site_url('form/getlistformtangki')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>Tangki</span>
						</a>
						
					</li>

					<li class="">
						<a href="<?php echo site_url('form/getlistformlvmdp')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>LVMDP</span>
						</a>
						
					</li>

					<li class="">
						<a href="<?php echo site_url('form/getlistformgenset')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>Genset</span>
						</a>
						
					</li>

          <li class="">
              <a href="<?php echo site_url('form_storage')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage</span>
              </a>
            </li>

            <li class="">
              <a href="<?php echo site_url('form_storage_new')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage_new</span>
              </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('panel_sdp')?>" class="dropdown-toggle">
                <i class="fa fa-briefcase"></i>
                <span>panel_sdp</span>
                </a>
            </li>
					</ul>

					
				</li>
        
        <li class="">
            <a href="<?php echo site_url('temuan_audit')?>" class="dropdown-toggle">
            <i class="fa fa-briefcase"></i>
            <span>Temuan Audit</span>
            </a>
        </li>

        <li class="dropdown-submenu">
          <a href="<?php echo site_url('inventory_tape')?>" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-briefcase"></i>
            <span>Tape Inventory</span>
          </a>
          <ul class="dropdown-menu">                
            <li class="">
              <a href="<?php echo site_url('inventory_tape')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Inventory</span>
              </a>
            </li>
            <li class="">
              <a href="<?php echo site_url('inventory_tape/scan_inventory_tape')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Stock Opname Tape</span>
              </a>
            </li>
          </ul>

        </li>


				
					 <!--<li class="">
						<a href="<?php echo site_url('ganti_jadwal_req'); ?>">
						  <i class="fa fa-circle"></i>
						  <span>Form task req</span>
						</a>
					  </li>-->

			<?php } if ($id['id_role'] == 4) { ?>

					<li class="dropdown-submenu">

					<a href="<?php echo site_url('task/activity')?>" class="dropdown-toggle" data-toggle="dropdown">
					  <i class="fa fa-list"></i>
					  <span>Taks List</span>
					</a>

					<ul class="dropdown-menu">


					<li class="">
						<a href="<?php echo site_url('task/activity')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>My Activity</span>
						</a>
						
					</li>

					<li class="">
						<a href="<?php echo site_url('task/activitypending')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>Activity Pending</span>
						</a>
					</li>

					<li class="">
						<a href="<?php echo site_url('task')?>" class="dropdown-toggle">
						<i class="fa fa-briefcase"></i>
						<span>Master Task</span>
						</a>
					</li>

          <li class="">
             <a href="<?php echo site_url('task/paraf_kabag')?>" class="dropdown-toggle">
             <i class="fa fa-calendar-o"></i>
             <span>Need Approve</span>
             </a>
           </li>

          <li class="">
            <a href="<?php echo site_url('task/list_report'); ?>">
              <i class="fa fa-print"></i>
              <span>Report</span>
            </a>
          </li>

					
					</ul>

				</li>
				
        <li class="dropdown-submenu">

         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-list"></i>
            <span>Form</span>
          </a>

          <ul class="dropdown-menu">

          <li class="">
            <a href="<?php echo site_url('form/getlistformups')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>UPS</span>
            </a>
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformupsmb2')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>UPS MB2</span>
            </a>
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformkwh')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>KWH</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformacliebert')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>PAC STULZ</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformacliebertmb2')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>AC Liebert MB2</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformtangki')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>Tangki</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformlvmdp')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>LVMDP</span>
            </a>
            
          </li>
      

          <li class="">
            <a href="<?php echo site_url('form/getlistformgenset')?>" class="dropdown-toggle">
            <i class="fa  fa-tasks"></i>
            <span>Genset</span>
            </a>
            
          </li>

          <li class="">
              <a href="<?php echo site_url('form_storage')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage</span>
              </a>
            </li>
            <li class="">
              <a href="<?php echo site_url('form_storage_new')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage_new</span>
              </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('panel_sdp')?>" class="dropdown-toggle">
                <i class="fa fa-briefcase"></i>
                <span>panel_sdp</span>
                </a>
            </li>
          
          </ul>

          
        </li>
        
        <li class="dropdown-submenu">
          <a href="<?php echo site_url('inventory_tape')?>" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-briefcase"></i>
            <span>Tape Inventory</span>
          </a>
          <ul class="dropdown-menu">                
            <li class="">
              <a href="<?php echo site_url('inventory_tape')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Inventory</span>
              </a>
            </li>
            <li class="">
              <a href="<?php echo site_url('inventory_tape/scan_inventory_tape')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Stock Opname Tape</span>
              </a>
            </li>
          </ul>

        </li>

					
			<?php } if ($id['id_role'] == 5) { ?>
				<li class="dropdown-submenu">

					<a href="<?php echo site_url('task/activity')?>" class="dropdown-toggle" data-toggle="dropdown">
					  <i class="fa fa-list"></i>
					  <span>Taks List</span>
					</a>

					<ul class="dropdown-menu">

					<li class="">
						<a href="<?php echo site_url('task/activity')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>My Activity</span>
						</a>
						
					</li>
					<li class="">
						<a href="<?php echo site_url('task/activitypending')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>Activity Pending</span>
						</a>
					</li>
					<li class="">
						<a href="<?php echo site_url('task')?>" class="dropdown-toggle">
						<i class="fa fa-briefcase"></i>
						<span>Master Task</span>
						</a>
					</li>
          <li class="">
            <a href="<?php echo site_url('task/list_report'); ?>">
              <i class="fa fa-print"></i>
              <span>Report</span>
            </a>
          </li>
					</ul>

				</li>
        <li class="dropdown-submenu">
          <a href="<?php echo site_url('inventory_tape')?>" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-briefcase"></i>
            <span>Tape Inventory</span>
          </a>
          <ul class="dropdown-menu">                
            <li class="">
              <a href="<?php echo site_url('inventory_tape')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Inventory</span>
              </a>
            </li>
            <li class="">
              <a href="<?php echo site_url('inventory_tape/scan_inventory_tape')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Stock Opname Tape</span>
              </a>
            </li>
          </ul>

        </li>
        <?php if($id['id_team'] == 13) {?>
        <li class="">
              <a href="<?php echo site_url('phonebook'); ?>" class="dropdown-toggle">
                        <i class="fa fa-phone"></i>
                        <span>Phonebook</span>
              </a>
        </li> 
        <li class="">
              <a href="<?php echo site_url('telp_activity'); ?>" class="dropdown-toggle">
                        <i class="fa fa-external-link-square"></i>
                        <span>Telp Activity</span>
              </a>
        </li>   

        <?php } ?>
				<?php if($id['id_team'] == 45) {?>

				<li class="dropdown-submenu">

					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-list"></i>
            <span>Form</span>
          </a>

          <ul class="dropdown-menu">

          <li class="">
            <a href="<?php echo site_url('form/getlistformups')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>UPS</span>
            </a>
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformupsmb2')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>UPS MB2</span>
            </a>
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformkwh')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>KWH</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformacliebert')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>PAC STULZ</span>
            </a>
            
          </li>
          <li class="">
            <a href="<?php echo site_url('form/getlistformacliebertmb2')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>AC Liebert MB2</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformtangki')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>Tangki</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformlvmdp')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>LVMDP</span>
            </a>
            
          </li>
      

          <li class="">
            <a href="<?php echo site_url('form/getlistformgenset')?>" class="dropdown-toggle">
            <i class="fa  fa-tasks"></i>
            <span>Genset</span>
            </a>
            
          </li>

          <li class="">
              <a href="<?php echo site_url('form_storage')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage</span>
              </a>
            </li>
            <li class="">
              <a href="<?php echo site_url('form_storage_new')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage_new</span>
              </a>
            </li>
            <li class="">
                <a href="<?php echo site_url('panel_sdp')?>" class="dropdown-toggle">
                <i class="fa fa-briefcase"></i>
                <span>panel_sdp</span>
                </a>
            </li>
          </ul>

					
				</li>
        <li class="">
            <a href="<?php echo site_url('keluarga')?>" class="dropdown-toggle">
            <i class="fa fa-users"></i>
            <span>Keluarga</span>
            </a>
        </li>
				<?php } ?>


        <?php if($id['id_team'] == 48) {?>

        <li class="dropdown-submenu">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-list"></i>
            <span>Form</span>
          </a>

          <ul class="dropdown-menu">

          <li class="">
            <a href="<?php echo site_url('mutasi_harian_hk/getDataListMutasi_harian_hk')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>List Harian HK</span>
            </a>
            
          </li>
          
          <li class="">
            <a href="<?php echo site_url('kontrol_rutin_harian_hk_mb1/get_list_kontrol_rutin_harian_hk_mb1')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>kontrol rutin harian HK MB1</span>
            </a>
          </li>

          </ul>

          
        </li>
        <li class="">
            <a href="<?php echo site_url('keluarga')?>" class="dropdown-toggle">
            <i class="fa fa-users"></i>
            <span>Keluarga</span>
            </a>
        </li>
        <?php } ?>

				
			<?php } if ($id['id_role'] == 7) { ?>
				<li class="dropdown-submenu">

					<a href="<?php echo site_url('task/activity')?>" class="dropdown-toggle" data-toggle="dropdown">
					  <i class="fa fa-list"></i>
					  <span>Taks List</span>
					</a>

					<ul class="dropdown-menu">
					<li class="">
						<a href="<?php echo site_url('task/activity')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>My Activity</span>
						</a>
					</li>
					<li class="">
						<a href="<?php echo site_url('task/activitypending')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>Activity Pending</span>
						</a>
					</li>
					<li class="">
						<a href="<?php echo site_url('task')?>" class="dropdown-toggle">
						<i class="fa fa-briefcase"></i>
						<span>Master Task</span>
						</a>
					</li>
          
          <li class="">
            <a href="<?php echo site_url('task/list_report'); ?>">
              <i class="fa fa-print"></i>
              <span>Report</span>
            </a>
          </li>
					</ul>

				
				</li>
        <li class="">
            <a href="<?php echo site_url('harian_operator')?>" class="dropdown-toggle">
            <i class="fa fa-briefcase"></i>
            <span>Harian Operator</span>
            </a>
          </li>
        <li class="dropdown-submenu">
          <a href="<?php echo site_url('inventory_tape')?>" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-briefcase"></i>
            <span>Tape Inventory</span>
          </a>
          <ul class="dropdown-menu">                
            <li class="">
              <a href="<?php echo site_url('inventory_tape')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Inventory</span>
              </a>
            </li>
            <li class="">
              <a href="<?php echo site_url('inventory_tape/scan_inventory_tape')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Stock Opname Tape</span>
              </a>
            </li>
          </ul>

        </li>
        <li class="">
            <a href="<?php echo site_url('keluarga')?>" class="dropdown-toggle">
            <i class="fa fa-users"></i>
            <span>Keluarga</span>
            </a>
        </li>
			<?php } if ($id['id_role'] == 6) {  ?>
				<li class="dropdown-submenu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-calendar-o"></i>
					<span>Taks List</span>
					</a>
					<ul class="dropdown-menu">
						<li class="">
							<a href="<?php echo site_url('task/activity')?>" class="dropdown-toggle">
							<i class="fa fa-list"></i>
							<span>My Activity</span>
							</a>
						</li>
						<li class="">
							<a href="<?php echo site_url('task/activitypending')?>" class="dropdown-toggle">
							<i class="fa fa-list"></i>
							<span>Activity Pending</span>
							</a>
						</li>
						<li class="">
							<a href="<?php echo site_url('task/paraf_pic_bks/45')?>" class="dropdown-toggle">
							<i class="fa fa-list"></i>
							<span>Task List BKS</span>
							</a>
						</li>
						<li class="">
							<a href="<?php echo site_url('task/paraf_pic_bks_pending/45')?>" class="dropdown-toggle">
							<i class="fa fa-list"></i>
							<span>Task List BKS Pending</span>
							</a>
						</li>
						<li class="">
							<a href="<?php echo site_url('task')?>" class="dropdown-toggle">
							<i class="fa fa-briefcase"></i>
							<span>Master Task</span>
							</a>
						</li>
            <li class="">
              <a href="<?php echo site_url('task/list_report'); ?>">
                <i class="fa fa-print"></i>
                <span>Report</span>
              </a>
            </li>
					</ul>
					
				</li>

        <li class="">
            <a href="<?php echo site_url('mutasi_harian_hk/getDataListMutasi_harian_hk')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>List Harian HK</span>
            </a>
        </li>
        <li class="dropdown-submenu">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-list"></i>
            <span>Form</span>
          </a>

          <ul class="dropdown-menu">

          <li class="">
            <a href="<?php echo site_url('form/getlistformups')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>UPS</span>
            </a>
            
          </li>
          <li class="">
            <a href="<?php echo site_url('form/getlistformupsmb2')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>UPS MB2</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformkwh')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>KWH</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformacliebert')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>PAC STULZ</span>
            </a>
            
          </li>
          <li class="">
            <a href="<?php echo site_url('form/getlistformacliebertmb2')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>AC Liebert MB2</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformtangki')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>Tangki</span>
            </a>
            
          </li>

          <li class="">
            <a href="<?php echo site_url('form/getlistformlvmdp')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>LVMDP</span>
            </a>
            
          </li>
      

          <li class="">
            <a href="<?php echo site_url('form/getlistformgenset')?>" class="dropdown-toggle">
            <i class="fa  fa-list"></i>
            <span>Genset</span>
            </a>
            
          </li>

          <li class="">
              <a href="<?php echo site_url('form_storage')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage</span>
              </a>
            </li>

            <li class="">
              <a href="<?php echo site_url('form_storage_new')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage_new</span>
              </a>
            </li>

            <li class="">
                <a href="<?php echo site_url('panel_sdp')?>" class="dropdown-toggle">
                <i class="fa fa-briefcase"></i>
                <span>panel_sdp</span>
                </a>
            </li>
          </ul>

          
        </li>
        <li class="">
            <a href="<?php echo site_url('keluarga')?>" class="dropdown-toggle">
            <i class="fa fa-users"></i>
            <span>Keluarga</span>
            </a>
        </li>
					 

			<?php } if ($id['id_role'] == 1 || $id['id_role'] == 2  || $id['id_role'] == 8|| $id['id_role'] == 0) {  ?>
				
        <li class="">
            <a href="<?php echo site_url('harian_spv')?>" class="dropdown-toggle">
            <i class="fa fa-briefcase"></i>
            <span>Harian SPV</span>
            </a>
          </li>
				<li class="dropdown-submenu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-calendar-o"></i>
					<span>Taks List</span>
					</a>
					
					<ul class="dropdown-menu">
						<li class="">
							<a href="<?php echo site_url('task/paraf_kabag')?>" class="dropdown-toggle">
							<i class="fa fa-calendar-o"></i>
							<span>Need Approve</span>
							</a>
						</li>
            <li class="">
              <a href="<?php echo site_url('task/list_report'); ?>">
                <i class="fa fa-print"></i>
                <span>Report</span>
              </a>
            </li>
            <li class="">
              <a href="<?php echo site_url('task')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Master Task</span>
              </a>
            </li>
					</ul>
					
				</li>
				<li class="dropdown-submenu">

					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <i class="fa fa-list"></i>
					  <span>Form</span>
					</a>

					<ul class="dropdown-menu">

					<li class="">
						<a href="<?php echo site_url('form/getlistformups')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>UPS</span>
						</a>
						
					</li>
          <li class="">
            <a href="<?php echo site_url('form/getlistformupsmb2')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>UPS MB2</span>
            </a>
            
          </li>

					<li class="">
						<a href="<?php echo site_url('form/getlistformkwh')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>KWH</span>
						</a>
						
					</li>

					<li class="">
						<a href="<?php echo site_url('form/getlistformacliebert')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>PAC STULZ</span>
						</a>
						
					</li>
          <li class="">
            <a href="<?php echo site_url('form/getlistformacliebertmb2')?>" class="dropdown-toggle">
            <i class="fa fa-tasks"></i>
            <span>AC Liebert MB2</span>
            </a>
            
          </li>

					<li class="">
						<a href="<?php echo site_url('form/getlistformtangki')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>Tangki</span>
						</a>
						
					</li>

					<li class="">
						<a href="<?php echo site_url('form/getlistformlvmdp')?>" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						<span>LVMDP</span>
						</a>
						
					</li>
			

					<li class="">
						<a href="<?php echo site_url('form/getlistformgenset')?>" class="dropdown-toggle">
						<i class="fa  fa-list"></i>
						<span>Genset</span>
						</a>
						
					</li>

          <li class="">
              <a href="<?php echo site_url('form_storage')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage</span>
              </a>
            </li>
             <li class="">
              <a href="<?php echo site_url('form_storage_new')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage_new</span>
              </a>
            </li>

            <li class="">
                <a href="<?php echo site_url('panel_sdp')?>" class="dropdown-toggle">
                <i class="fa fa-briefcase"></i>
                <span>panel_sdp</span>
                </a>
            </li>
					</ul>

					
				</li>
        
        
        <li class="dropdown-submenu">
          <a href="<?php echo site_url('inventory_tape')?>" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-briefcase"></i>
            <span>Tape Inventory</span>
          </a>
          <ul class="dropdown-menu">                
            <li class="">
              <a href="<?php echo site_url('inventory_tape')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Inventory</span>
              </a>
            </li>
            <li class="">
              <a href="<?php echo site_url('inventory_tape/scan_inventory_tape')?>" class="dropdown-toggle">
              <i class="fa fa-briefcase"></i>
              <span>Stock Opname Tape</span>
              </a>
            </li>
          </ul>

        </li>

       
					 

			<?php } ?> 

        
         <li class="">
            <a href="<?php echo site_url('report/hop')?>" class="dropdown-toggle">
            <i class="fa fa-book"></i>
            <span>HOP</span>
            </a>
        </li>

        <li class="">
            <a href="<?php echo site_url('perangkat_non_inventaris')?>" class="dropdown-toggle">
            <i class="fa fa-book"></i>
            <span>P N Invetaris</span>
            </a>
        </li>


        <?php if ($id['id_company'] == 1){ ?>
        <li class="">
            <a href="<?php echo site_url('repository_problem')?>" class="dropdown-toggle">
            <i class="fa fa-book"></i>
            <span>Repository</span>
            </a>
        </li>

        <li class="dropdown-submenu">

          <a href="<?php echo site_url('biaya')?>" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-list"></i>
            <span>Biaya</span>
          </a>

          <ul class="dropdown-menu">
          <li class="">
            <a href="<?php echo site_url('biaya')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>Biaya</span>
            </a>
          </li>
          <li class="">
            <a href="<?php echo site_url('rkap')?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>RKAP</span>
            </a>
          </li>
          <?php   
        
        if ( $id['id_role'] == 2 || $id['id_role'] == 1 || $id['id_role'] == 4) {   ?>
          <li class="">
            <a href="<?php echo site_url('biaya/rka'); ?>" class="dropdown-toggle">
            <i class="fa fa-list"></i>
            <span>RKA Exploitasi</span>
            </a>
          </li>
        <?php } ?>

          </ul>

        
        </li>


        <li class="">
              <a href="<?php echo site_url('form_sksm')?>" class="dropdown-toggle">
              <i class="fa fa-envelope-o"></i>
              <span>Surat Keluar Masuk</span>
              </a>
            </li>
        <?php } ?>

        <?php if ($id['id_role'] == 5){ ?>
          <li class="">
              <a href="<?php echo site_url('form_storage')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage </span>
              </a>
            </li>
            <li class="">
              <a href="<?php echo site_url('form_storage_new')?>" class="dropdown-toggle">
              <i class="fa fa-dropbox"></i>
              <span>form_storage_new</span>
              </a>
            </li>
        <?php }   ?>
        
        

				<!--<li class="dropdown-submenu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <i class="fa fa-flask"></i>
					  <span>Form Req</span>
					</a>
					<ul class="dropdown-menu">                
					  <li class="">
						<a href="<?php echo site_url('ganti_jadwal_req'); ?>" class="dropdown-toggle">
						<i class="fa fa-folder-open-o"></i>
						<span>My Pending Req</span>
						</a>
					</li>
					<li class="">
						<a href="<?php echo site_url('ganti_jadwal_req/list_approved_form_req')?>" class="dropdown-toggle">
						<i class="fa fa-folder-open-o"></i>
						<span>Approved Req</span>
						</a>
					</li> 
					<?php 
						if(($id['id_role'] == '3') ){
					?>
					<li class="">
						<a href="<?php echo site_url('ganti_jadwal_req/list_form_req')?>" class="dropdown-toggle">
						<i class="fa fa-folder-open-o"></i>
						<span>Form Need Approved Req</span>
						</a>
					</li>
					<?php } ?>
					
					</ul>
					
				</li>-->
				
				 

        

            </ul>
          </nav>
          <!-- / nav -->
          <!-- note -->
         
          <!-- / note -->
        </section>
       
        
      </section>
    </aside>
    <!-- /.aside -->
    <!-- .vbox -->
    <section id="content">
      <section class="vbox">
        <header class="header bg-white b-b">
          <p><?php echo (isset($page_title)) ? $page_title : '';?></p>

          <ul class="nav navbar-nav navbar-right" >

                        <?php 
                        if($id){
                        ?>
                        <li class="">
                            <a href="" class="thumb-sm avatar">
                              <img src="<?php $img = "images/".$id['img_file']; echo base_url($img) ;?>" alt="" width="20" height="20" class="">
                            </a>
                            
                        </li>
                        <li class="">
                            
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="<?php echo base_url('asset'); ?>/production/images/img.jpg" alt="">Selamat datang, <?php echo $id['nama_lengkap']?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">     
                                    <li class="dropdown-submenu">
                                        <a href="<?php echo site_url('home/dashboard2'); ?>">
                                          <i class="fa fa-home"></i>
                                          <span>Home</span>
                                        </a>
                                    </li>
              
                            </ul>
                        </li>
                    <?php 
                    } else {
                        ?>
                        <li class="">
                        <a class="dropdown-toggle" data-target="#my_modalLogin" data-toggle="modal" >Login
                        </a>
                        </li>

                        <?php
                        } ?>
                        
                        
                    </ul>
         
        </header>
<script>
function myFunctionAbsensi(ta) {
    document.getElementById("targetab").value = ta; 
    document.getElementById("absensiform").submit();
}

function myFunctionEpaper(t) {
    document.getElementById("targetx").value = t; 
    document.getElementById("epaperform").submit();
}
</script>