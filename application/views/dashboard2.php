<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mon TIK </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('asset2'); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('asset2'); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('asset2'); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('asset2'); ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">


    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('asset2'); ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('asset2'); ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('asset2'); ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('asset2'); ?>/build/css/custom.css" rel="stylesheet">

   
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">


        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav navbar-nav navbar-center">

                        <div class="row" >
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div style="padding-left: 30px">
                                        <div >
                                             <?php 
                                                $id = $this->session->userdata('user_data');
                                                if ($id){
                                                    if ($id['id_role'] == 1 || $id['id_role'] == 2){
                                                        ?> 
                                                           <a href="<?php echo base_url('/index.php/task/paraf_kabag/')?>" id="menu_toggle"><h1>     TABANAN IT FACILITY</h1></a>
                                                        <?php 
                                                    } else {
                                                        ?> 
                                                           <a href="<?php echo base_url('/index.php/task/activity')?>" id="menu_toggle"><h1>    TABANAN IT FACILITY</h1></a>
                                                        <?php
                                                    }
                                                } else { ?>
                                                   <h1>TABANAN IT FACILITY</h1>
                                                <?php } ?>
                                                <div ><?php echo date('D') ?>, <?php echo date('d') ?> <?php echo date('M') ?> <?php echo date('Y') ?> <?php echo date('G:i:s') ?> WITA
                                                </div>
                                        </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <ul class="nav navbar-nav navbar-right" style="width: 50%">

                        <?php 
                        if($id){
                        ?>
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                 <img src="<?php $img = "images/".$id['img_file']; echo base_url($img) ;?>" alt="" width="20" height="20" class="">Selamat Datang, <?php echo $id['nama_lengkap']?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                
                                    <form  id="epaperform" action="<?php echo site_url('../../epaper/pages/loginfromdashboard.php'); ?>" method="post">
                                    <input type="hidden" data-required="true" value="<?php echo $id['username'];?>" name="username">
                                    <input type="hidden" data-required="true" value="0" id="targetx" name="target">
                                    </form>
                                    
                                    <form id="absensiform" action="<?php echo site_url('../../dashboard_absensi/index.php/auth/loginDahsboard'); ?>" method="post">
                                    <input type="hidden" data-required="true" value="0" id="targetab" name="targetab">
                                    <input type="hidden" data-required="true" value="<?php echo $id['nama_lengkap'];?>" name="nama">
                                    <input type="hidden" data-required="true" value="<?php echo $id['id_kartu'];?>" name="id_tamu">
                                    </form>
                
                                   

                                  <?php if (($id['id_role'] == 0)|| ($id['id_role'] == 2) || ($id['id_role'] == 1) ) { ?>
                                   
              
                                    <li class="dropdown-submenu">
                                        <a href="<?php echo base_url('/index.php/task/paraf_kabag')?>" >
                                          <i class="fa fa-home"></i>
                                          <span>Menu</span>
                                        </a>
                                    </li>

                                 <?php } else { ?>
                                    <li class="">

                                        <a href="<?php echo base_url('/index.php/task/activity')?>">
                                        <i class="fa fa-home"></i>
                                        <span>Menu</span>
                                      </a>
                                    </li>
                                 <?php } ?>
              
                                  <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <div class="modal fade" id="my_modalLogin" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Login</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                            <form id="login_formx" action="<?php echo site_url('auth/modal_login'); ?>" method="post" class="panel-body">
                                <div class="form-group">
                                  <label class="control-label">Username</label>
                                  <input type="hidden" name="newdashboard" value="1" required>
                                  <input type="text" name="username" placeholder="username" maxlength="32" class="form-control" required>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Password</label>
                                  <input type="password" name="pwd" id="inputPassword" placeholder="password" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-info">Log in</button>
                            </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <div class="row tile_count">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-list"></i> Task Hari Ini</span>
                    <div class="count blue"><?php echo count($statusAppallday)?></div>
                    <span class="count_bottom"><i class="red"><i
                            class="fa fa-sort-asc"></i><?php echo count($statusApp)?></i> Sisa</span>
                </div>
                
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Pekerja</span>
                    <div class="count green">
                    <?php  
                        $jumlahx = 0 ;
                        foreach($userbycompany as $list){
                            $jumlahx = $jumlahx + $list['v'];
                        } 


                            $jumlahx = $jumlahx + 7; //brisat
                            $jumlahx = $jumlahx + 4; //brisyariah
                    ?>
                                                
                    <?php echo($jumlahx)?></div>
                    <a href="javascript:myFunctionAbsensi(3)"><span class="count_bottom"><i class="green"><i
                            class="fa fa-sort-asc"></i><?php echo count($user_aktif)?> </i> Kartu Aktif hari ini</span></a>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Tamu (<?php echo date('M') ?> <?php echo date('Y') ?>)</span>
                    <div class="count pink"><?php echo count($akses_kunjungan_month)?></div>
                    <a href="javascript:myFunctionAbsensi(1)"><span class="count_bottom"><i class="red"><i
                            class="fa fa-sort-desc"></i><?php echo count($akses_kunjungan)?></i> Hari Ini</span></a>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Terlambat Bulan ini</span>
                    <div class="count orange"><?php echo $user_late_month[0]['countuser']?></div>
                    <span class="count_bottom"><i class="blue"><i
                            class="fa fa-sort-asc"></i><?php echo $user_late_today[0]['countuser']?> </i> Hari ini</span>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Pulang Cepat Bulan ini</span>
                    <div class="count black"><?php echo $user_earlyhome_month[0]['countuser']?></div>
                    <span class="count_bottom"><i class="red"><i
                            class="fa fa-sort-asc"></i><?php echo $user_earlyhome_today[0]['countuser']?> </i> Hari ini</span>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Formasi TIK</span>
                    <div class="count red"><?php echo  number_format($d3)?></div>
                   
                </div>

                
                
            </div>

<!--
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel tile  overflow_hidden">
                            <div class="x_title">
                                <h4 style="color: red"><strong><em>
                                <MARQUEE align="center" direction="left" scrollamount="2" width="100%">Tamu Hari ini : Tidak ada, Balakar <?php foreach($balakar as $listx){ ?> <?php echo $listx['jabatan']?> : <?php echo $listx['nama']?>,
                                <?php } ?></MARQUEE> </em></strong></h4>

                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
            </div>
-->

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12" >
                    <div class="x_panel ">
                        <div class="x_title ">
                            <h2>To Do List
                                
                                
                                
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                            <?php  if ($id){ ?>
                                <li><a id="compose" class="add-link"><i class="fa fa-plus"></i></a>
                                </li>
                                <?php } ?>
                                
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                        <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style=" height:650px; overflow-y: scroll;">
                            <div class="dashboard-widget-content">

                                <ul class="list-unstyled timeline widget">
                                    <?php 
                                    foreach($public_note as $list){
                                    ?>
                                    <li>
                                      <div class="block">
                                        <div class="block_content">
                                          <h2 class="title ">
                                            <a><b> <?php echo $list['subject_public_note'];?></b></a>
                                          </h2>
                                          <p>
                                            <a>Tanggal : <?php echo $list['tanggal_kegiatan'];?> sampai <?php echo $list['tanggal_berakhir'];?></a>
                                          </p>
                                          <div class="byline">
                                            <span><?php echo $list['created_date'];?></span> by <a><?php echo $list['nama_lengkap'];?></a>
                                            <?php  if ($id && $id['id_user'] == $list['id_user']){ ?>

                                            <a class="glyphicon glyphicon-trash"  
                                                    data-target="#my_modalDelete" 
                                                    data-toggle="modal" 
                                                    data-idpublicnote=<?php echo $list['id_public_note'];?>
                                                    data-subjectpublicnote=<?php echo $list['subject_public_note'];?>
                                                    data-idpublicnote=<?php echo $list['id_public_note'];?>
                                                    >
                                                    </a> 
                                            <?php } ?>
                                          </div>
                                          <p class="excerpt"><?php echo $list['data_public_note'];?></a>
                                          </p>
                                            
                                        </div>
                                      </div>
                                    </li>
                                    
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- start of weather widget -->
                        
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Perangkat</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                    <?php  if ($id){ ?>
                                    <li><a href="<?php echo site_url('home/input_dashboard'); ?>"><i class="fa fa-plus"></i></a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                    </ul>
                                    <div class="clearfix"></div>
                        </div>
                        <div class="x_content" >      
                                    <div class="clearfix"></div>
                                    <div class="row weather-days">
                                        <div class="col-sm-3 ">
                                            <div class="daily-weather">
                                                <h2 class="day"> <strong>Tes Beban UPS Bulanan</strong></h2>
                                                <h1 class="count <?php if($d1 >= 1){ echo 'green';} else {echo 'orange';} ?>" style="text-align: center;"><?php echo number_format($d1)?></h1>
                                                <p style="text-align: center;">(1)</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="daily-weather">
                                                <h2 class="day"><strong>Tes Genset Bulanan</strong></h2>
                                                <h1 class="count <?php if($d2 >= 4){ echo 'green';} else {echo 'orange';} ?>" style="text-align: center;" ><?php echo number_format($d2)?></h1>
                                                <p style="text-align: center;">(4)</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <div class="daily-weather">
                                                <h2 class="day"><strong>Suhu DC (Celcius)</strong></h2>
                                                <h1 class="count <?php if(($d4 >= 18) && ($d4 <= 27)){ echo 'green';} else {echo 'orange';} ?>" style="text-align: center;" ><?php echo $d4?></h1>
                                                <p  style="text-align: center;">(18 < x < 27)</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="daily-weather">
                                                <h2 class="day"><strong>Maturity Level</strong></h2>
                                                <h1 class="count orange" style="text-align: center;" ><?php echo "3.00"?></h1>
                                                <p style="text-align: center;">(4)</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="daily-weather">
                                                <h2 class="day" style="text-align: center;"><strong>Humidity DC (% RH)</strong></h2>
                                                <h1 class="count <?php if(($d5 >= 45) && ($d5 <= 55)){ echo 'green';} else {echo 'orange';} ?>" style="text-align: center;"><?php echo $d5?></h1>
                                                <p style="text-align: center;">(45 < x < 55)</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="daily-weather">
                                                <h2 class="day"><strong>Battery (%)</strong></h2>
                                                <h1 class="count <?php if($d8 >= 100){ echo 'green';} else {echo 'orange';} ?>" style="text-align: center;"><?php echo $d8?></h1>
                                                <p style="text-align: center;">(100)</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <div class="daily-weather">
                                                <h2 class="day"><strong>UPS Usage (%)</strong></h2>
                                                <h1 class="count <?php if($d7 <= 90){ echo 'green';} else {echo 'orange';} ?>" style="text-align: center;"><?php echo $d7?></h1>
                                                <p style="text-align: center;">(x < 80%)</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="daily-weather">
                                                <h2 class="day"><strong>RISK (%)</strong></h2>
                                                <h1 class="count <?php if($d6 <= 5){ echo 'green';} else {echo 'orange';} ?>" style="text-align: center;"><?php echo $d6?></h1>
                                                <p style="text-align: center;">(x < 5)</p>
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                    </div>
                            </div>
                        </div>

                    </div>
                        <!-- end of weather widget -->

                    

                <!-- bar charts group -->
              <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="x_panel tile  overflow_hidden">
                            <div class="x_title">
                                <h4><strong><em>Info BMKG</em></strong></h4>
                                
                                <div class="clearfix"></div>
                            </div>
                        <div class="x_content" style=" height:250px; overflow-y: scroll;">
                            <a class="twitter-timeline" href="https://twitter.com/stageof_mataram?ref_src=twsrc%5Etfw">Tweets by stageof_mataram</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                        </div>
                    </div>
                </div>
              <!-- /bar charts group -->

              <!-- bar charts group -->
              <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="x_panel tile  overflow_hidden">
                            <div class="x_title">
                                <h4><strong><em>Info Weather</em></strong></h4>
                                
                                <div class="clearfix"></div>
                            </div>
                        <div class="x_content" style=" height:250px; overflow-y: scroll;">
          <a class="weatherwidget-io" href="https://forecast7.com/en/n8d46115d05/tabanan-regency/" data-label_1="TABANAN REGENCY" data-label_2="WEATHER" data-theme="original" >TABANAN REGENCY WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>

                        </div>
                    </div>
                </div>
              <div class="clearfix"></div>
              <!-- /bar charts group -->
            </div>


            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Done
                                
                               
                                
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                        <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style=" height:560px; overflow-y: scroll;">
                            <div class="dashboard-widget-content">

                                <ul class="list-unstyled timeline widget">
                                    <?php 
                                    foreach($public_note_expired as $list){
                                    ?>
                                    <li>
                                      <div class="block">
                                        <div class="block_content">
                                          <h2 class="title ">
                                            <a><b> <?php echo $list['subject_public_note'];?></b></a>
                                          </h2>
                                          <h4>
                                            <a>Tanggal kegiatan : <?php echo $list['tanggal_kegiatan'];?></a>
                                          </h4>
                                          <div class="byline">
                                            <span><?php echo $list['created_date'];?></span> by <a><?php echo $list['nama_lengkap'];?></a>
                                          </div>
                                          <p class="excerpt"><?php echo $list['data_public_note'];?>
                                          </p>
                                        </div>
                                      </div>
                                    </li>
                                    
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-md-4">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Task Performance</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-md-4">
                      <div>
                        <div>
                        <h>Team</h>
                        </div>
                      </div>
                      <?php 
                            $persen = "";
                            foreach($dataemployeepower as $dataemployeepowers){
                              $tepat = $dataemployeepowers[0]['tepatpersen'];
                              $lambat = 100 - intval($tepat);
                              $teamX = $dataemployeepowers[0]['team'];
                              //$dataemployeepowers[0]['lambatpersen'];

                              $persen = intval($tepat);

                               ?>

                      <div class="progress">
                        <div ><?php echo $teamX?></div>
                      </div>
                            <?php
                                }  
                            ?>
                    </div>
                    <div class="col-md-4">
                      <div>
                        <div style="text-align: right"><h>Month To Date</h></div>

                      </div>

                      <?php 
                            $persen = "";
                            foreach($dataemployeepower as $dataemployeepowers){
                              $tepat = $dataemployeepowers[0]['tepatpersen'];
                              $lambat = 100 - intval($tepat);
                              $teamX = $dataemployeepowers[0]['team'];
                              //$dataemployeepowers[0]['lambatpersen'];

                              $persen = intval($tepat);

                               ?>

                      <div class="progress right">
                        <div class="progress-bar progress-bar-danger" data-transitiongoal="<?php echo $persen?>"><?php echo $persen?> %</div>
                      </div>
                            <?php
                                }  
                            ?>
                    </div>
                    <div class="col-md-4">
                        <div >
                        <div ><h><?php echo $yesterday;?></h></div>
                      </div>
                      <?php 
                            $persen = "";
                            foreach($dataemployeepoweryesterday as $dataemployeepoweryesterdays){
                              $tepat = $dataemployeepoweryesterdays[0]['tepatpersen'];
                              $lambat = 100 - intval($tepat);
                              $teamX = $dataemployeepoweryesterdays[0]['team'];
                              //$dataemployeepowers[0]['lambatpersen'];

                              $persen = intval($tepat);

                               ?>

                      <div class="progress">
                        <div class="progress-bar progress-bar-info" data-transitiongoal="<?php echo $persen?>"><?php echo $persen?> %</div>
                      </div>
                            <?php
                                }  
                            ?>
                    </div>
                  </div>

                  
              </div>
            </div>
          </div>


            

            <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel tile  overflow_hidden" style=" height:330px; ">
                            <div class="x_title">
                                <h2>Crew</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        <div class="x_content" style=" height:280px; overflow-y: scroll;">
                            <table class="" style="width:100%">
                                <tr>
                                    <th style="width:40%;">
                                    </th>
                                    <th>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <p class="">Perusahaan</p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <p class="" style="padding-left: 20px">   Personel</p>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <canvas class="canvasDoughnut" height="140" width="140"
                                                style="margin: 15px 10px 10px 0"></canvas>
                                    </td>
                                    <td>



                                            <?php
                                                $i =0;
                                                $warna=array("red","blue","yellow","green","black","purple","orange","white"); 
                                                foreach($userbycompany as $list){ 
                                                ?>
                                                


                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <p class=""><i class="fa fa-square <?php echo $warna[$i]?>"></i>  <?php echo $list['nama_company']?></p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <p class="" style="padding-left: 40px; text-align: left;"><?php echo $list['v']?></p>
                                        </div>



                                                <?php
                                                
                                                $i++;
                                                } 
                                            ?>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <p class=""><i class="fa fa-square brown"></i>  Brisat</p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <p class="" style="padding-left: 40px; text-align: left;">7</p>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <p class=""><i class="fa fa-square pink"></i>  BRIS</p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <p class="" style="padding-left: 40px; text-align: left;">4</p>
                                        </div>
                                        <div>
                                            <p ></p>
                                        </div>
                                        <div >
                                            <p ></p>
                                        </div>

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> ER Team <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Tim Evakuasi / Balakar</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body" style=" height:160px; overflow-y: scroll;">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama</th>
                                  <th>Tugas</th>
                                </tr>
                              </thead>
                              <tbody>

                              <?php
                                $i =1;
                                 foreach($balakar as $list){ 
                                                ?>
                                                <tr>
                                                  <th scope="row"><?php echo $i?></th>
                                                  <td><?php echo $list['nama']?></td>
                                                  <td><?php echo $list['jabatan']?></td>
                                                </tr>
                                                <?php
                                                
                                                $i++;
                                                } 
                                            ?>
                               
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>
                    <!-- end of accordion -->


                  </div>
                </div>
              </div>

              
            </div>

           

        <footer >

                <div >
                        <div >
                            <div class="x_title">
                                <h4><strong><em>
                                Integrity, Professionalism, Trust, Innovation, Customer Centric</em></strong></h4>

                                <div class="clearfix"></div>
                            </div>
                        <div class="x_content">
                            <table>
                                <tr>
                                    <td >
                                        <p><em>Priska - 11 Agustus 2018</em></p>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>         

            
        </footer>
        <!-- /page content -->
        <!-- /footer content -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="my_modalDelete" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color: red">Are u sure to delete ?</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('index.php/home/delete_note'); ?>" method="post">
                <div> 
                    <input type="hidden" name="id_public_note_delete" id="id_public_note_delete" class="form-control"   />
                </div>
                <div>
                    <input type="text" name="subject_public_note_delete" id="subject_public_note_delete" class="form-control"  disabled="" />
                </div>
                <div class="clearfix"></div>
                <div>
                    <input class="btn btn-warning" type="submit" value="Delete">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of modal delete -->

<!-- compose -->
    <div class="compose col-md-6 col-xs-12">
      <div class="compose-header primary">
        New Note
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>

      <div class="compose-body">
        <form class="bs-example form-horizontal" data-validate="parsley" action="<?php echo base_url('index.php/home/simpan_note'); ?>" method="post">
            <input value="" id="id_public_note" name="id_public_note" type="hidden" >
            <div class="form-group">
                <div >
                    <input value="" id="subject_public_note" name="subject_public_note" placeholder="enter subject" class="col-sm-12" type="text" required="" >
                </div>
            </div>
            <div class="form-group">
                <div >
                    <input  id="tanggal_kegiatan" value="<?php echo date('Y-m-d') ?>" name="tanggal_kegiatan" placeholder="enter tanggal" class="col-sm-4" type="text" required ><input  id="tanggal_berakhir" value="<?php echo date('Y-m-d') ?>" name="tanggal_berakhir" placeholder="enter tanggal" class="col-sm-4" type="text" required >
                </div>
            </div>
            <div class="form-group">
                <div >
                    <?php echo $this->ckeditor->editor("data_public_note","");?>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <button type="submit" class="btn btn-sm btn-primary" id="btn_simpan">Simpan</button>
                </div>
            </div>
        </form>
      </div>

      
    </div>
    <!-- /compose -->
    </body>


    <script type="text/javascript">


function init_chart_doughnut() {

    if (typeof (Chart) === 'undefined') {
        return;
    }

    console.log('init_chart_doughnut');

    if ($('.canvasDoughnut').length) {

        var chart_doughnut_settings = {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55, 0.55, 0.55)",
            data: {
                labels: [
                    <?php
                    $label = "";
                    foreach($userbycompany as $list){ 
                    $label = $label."'".$list['nama_company']."',";
                    } 
                    $nilai = ((strlen($label))-1);
                    $xx = substr($label,0,$nilai) ;
                    echo $xx;
                    ?>
                    ,'Brisat'
                    ,'Bris'
                ],
                datasets: [{
                    data: [
                    <?php foreach($userbycompany as $list){ 
                    ?>
                        <?php echo $list['v'].","?>
                    <?php } ?>
                    7,4
                    ],
                    backgroundColor: [
                        "red","blue","yellow","green","black","purple","orange","white","brown","pink" 
                    ],
                    hoverBackgroundColor: [
                        "red","blue","yellow","green","black","purple","orange","white","brown","pink" 

                    ]
                }]
            },
            options: {
                legend: false,
                responsive: false
            }
        }

        $('.canvasDoughnut').each(function () {

            var chart_element = $(this);
            var chart_doughnut = new Chart(chart_element, chart_doughnut_settings);

        });

    }

}
     function init_morris_charts() {

    if (typeof (Morris) === 'undefined') {
        return;
    }
    console.log('init_morris_charts');

    if ($('#graph_bar').length) {

        Morris.Bar({
            element: 'graph_bar',
            data: [
                {device: 'iPhone 4', geekbench: 380},
                {device: 'iPhone 4S', geekbench: 655},
                {device: 'iPhone 3GS', geekbench: 275},
                {device: 'iPhone 5', geekbench: 1571},
                {device: 'iPhone 5S', geekbench: 655},
                {device: 'iPhone 6', geekbench: 2154},
                {device: 'iPhone 6 Plus', geekbench: 1144},
                {device: 'iPhone 6S', geekbench: 2371},
                {device: 'iPhone 6S Plus', geekbench: 1471},
                {device: 'Other', geekbench: 1371}
            ],
            xkey: 'device',
            ykeys: ['geekbench'],
            labels: ['Geekbench'],
            barRatio: 0.4,
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            xLabelAngle: 35,
            hideHover: 'auto',
            resize: true
        });

    }

    if ($('#graph_bar_group').length) {

        Morris.Bar({
            element: 'graph_bar_group',
            data: [

                <?php foreach($form_ups as $list){ 
                    $out_kw_power_l1 = $list['out_kw_power_l1'];
                    $out_kw_power_l2 = $list['out_kw_power_l2'];
                    $out_kw_power_l3 = $list['out_kw_power_l3'];

                    $data1=$out_kw_power_l1;
                    //$data2=$out_kw_power_l2;
                    //$data3=$out_kw_power_l3;
                    $data2=$out_kw_power_l2;
                    $data3=$out_kw_power_l3;

                    ?>

                <?php echo '{"period": "'.$list['tanggal_form']." ".$list['jam'].'", "l1": '.$data1.', "l2": '.$data2.', "l3": '.$data3.'},'?>
                <?php } ?>
            ],
            xkey: 'period',
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            ykeys: ['l1', 'l2', 'l3'],
            labels: ['out_kw_power_l1', 'out_kw_power_l2', 'out_kw_power_l3'],
            hideHover: 'auto',
            xLabelAngle: 60,
            resize: true
        });

    }

    if ($('#graph_bar_group2').length) {

        Morris.Bar({
            element: 'graph_bar_group2',
            data: [

                <?php foreach($form_ups2 as $list){ 
                    $out_kw_power_l1 = $list['out_kw_power_l1'];
                    $out_kw_power_l2 = $list['out_kw_power_l2'];
                    $out_kw_power_l3 = $list['out_kw_power_l3'];

                    $data1=$out_kw_power_l1;
                    //$data2=$out_kw_power_l2;
                    //$data3=$out_kw_power_l3;
                    $data2=$out_kw_power_l2;
                    $data3=$out_kw_power_l3;

                    ?>

                <?php echo '{"period": "'.$list['tanggal_form']." ".$list['jam'].'", "l1": '.$data1.', "l2": '.$data2.', "l3": '.$data3.'},'?>
                <?php } ?>
            ],
            xkey: 'period',
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            ykeys: ['l1', 'l2', 'l3'],
            labels: ['out_kw_power_l1', 'out_kw_power_l2', 'out_kw_power_l3'],
            hideHover: 'auto',
            xLabelAngle: 60,
            resize: true
        });

    }

    if ($('#graphx').length) {

        Morris.Bar({
            element: 'graphx',
            data: [
                {x: '2015 Q1', y: 2, z: 3, a: 4},
                {x: '2015 Q2', y: 3, z: 5, a: 6},
                {x: '2015 Q3', y: 4, z: 3, a: 2},
                {x: '2015 Q4', y: 2, z: 4, a: 5}
            ],
            xkey: 'x',
            ykeys: ['y', 'z', 'a'],
            barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            hideHover: 'auto',
            labels: ['Y', 'Z', 'A'],
            resize: true
        }).on('click', function (i, row) {
            console.log(i, row);
        });

    }

    if ($('#graph_area').length) {

        Morris.Area({
            element: 'graph_area',
            data: [
               <?php foreach($form_ups as $list){ 
                    $out_kw_power_l1 = $list['out_kw_power_l1'];
                    $out_kw_power_l2 = $list['out_kw_power_l2'];
                    $out_kw_power_l3 = $list['out_kw_power_l3'];

                    $data1=$out_kw_power_l1;
                    //$data2=$out_kw_power_l2;
                    //$data3=$out_kw_power_l3;
                    $data2=((int)($out_kw_power_l2))-((int)($out_kw_power_l1));
                    $data3=((int)($out_kw_power_l3))-((int)($out_kw_power_l1));

                    ?>
                <?php echo "{period: '".$list['tanggal_form']." ".$list['jam']."', iphone: ".$data1.", ipad: ".$data2.", itouch: ".$data3."},"?>
                <?php } ?>
                
            ],
            xkey: 'period',
            ykeys: ['iphone', 'ipad', 'itouch'],
            lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            labels: ['l1', 'l2', 'l3'],
            pointSize: 1,
            hideHover: 'auto',
            resize: true
        });

    }

    if ($('#graph_area2').length) {

        Morris.Area({
            element: 'graph_area2',
            data: [
               <?php foreach($form_ups2 as $list){ 
                    $out_kw_power_l1 = $list['out_kw_power_l1'];
                    $out_kw_power_l2 = $list['out_kw_power_l2'];
                    $out_kw_power_l3 = $list['out_kw_power_l3'];

                    $data1=$out_kw_power_l1;
                    //$data2=$out_kw_power_l2;
                    //$data3=$out_kw_power_l3;
                    $data2=((int)($out_kw_power_l2))-((int)($out_kw_power_l1));
                    $data3=((int)($out_kw_power_l3))-((int)($out_kw_power_l1));

                    ?>
                <?php echo "{period: '".$list['tanggal_form']." ".$list['jam']."', iphone: ".$data1.", ipad: ".$data2.", itouch: ".$data3."},"?>
                <?php } ?>
                
            ],
            xkey: 'period',
            ykeys: ['iphone', 'ipad', 'itouch'],
            lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            labels: ['l1', 'l2', 'l3'],
            pointSize: 1,
            hideHover: 'auto',
            resize: true
        });

    }

    if ($('#graph_donut').length) {

        Morris.Donut({
            element: 'graph_donut',
            data: [
                {label: 'Jam', value: 25},
                {label: 'Frosted', value: 40},
                {label: 'Custard', value: 25},
                {label: 'Sugar', value: 10}
            ],
            colors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            formatter: function (y) {
                return y + "%";
            },
            resize: true
        });

    }

    if ($('#graph_line').length) {

        Morris.Line({
            element: 'graph_line',
            xkey: 'year',
            ykeys: ['value'],
            labels: ['Value'],
            hideHover: 'auto',
            lineColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
            data: [
                {year: '2012', value: 20},
                {year: '2013', value: 10},
                {year: '2014', value: 5},
                {year: '2015', value: 5},
                {year: '2016', value: 20}
            ],
            resize: true
        });

        $MENU_TOGGLE.on('click', function () {
            $(window).resize();
        });

    }

};

    </script>



<!-- jQuery -->
<script src="<?php echo base_url('asset2'); ?>/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('asset2'); ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('asset2'); ?>/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url('asset2'); ?>/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo base_url('asset2'); ?>/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo base_url('asset2'); ?>/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url('asset2'); ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('asset2'); ?>/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url('asset2'); ?>/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo base_url('asset2'); ?>/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url('asset2'); ?>/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url('asset2'); ?>/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url('asset2'); ?>/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url('asset2'); ?>/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url('asset2'); ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url('asset2'); ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url('asset2'); ?>/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url('asset2'); ?>/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('asset2'); ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo base_url('asset2'); ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url('asset2'); ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url('asset2'); ?>/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url('asset2'); ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


<!-- morris.js -->
<script src="<?php echo base_url('asset2'); ?>/vendors/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('asset2'); ?>/vendors/morris.js/morris.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('asset2'); ?>/vendors/echarts/dist/echarts.min.js"></script>
<script src="<?php echo base_url('asset2'); ?>/build/js/custom.js"></script>

<script language="JavaScript">
    $(document).ready(function() {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {
          
        var subject_public_note = '';
        if (typeof $(this).data('subjectpublicnote') !== 'undefined') {
                subject_public_note = $(this).data('subjectpublicnote');
        }
        document.getElementById("subject_public_note_delete").value = subject_public_note;
        
        var id_public_note = '';
        if (typeof $(this).data('idpublicnote') !== 'undefined') {
                id_public_note = $(this).data('idpublicnote');
        }
        document.getElementById("id_public_note_delete").value = id_public_note;

        var id_public_note = '';
        if (typeof $(this).data('idpublicnote') !== 'undefined') {
                id_public_note = $(this).data('idpublicnote');
        }
            
        document.getElementById("id_public_note_delete").value = id_public_note;
        })
    });
</script>
<script>
$('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
});

</script>
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

</body>
</html>
