<!DOCTYPE html>
<html lang="en">
<style>
#dash_risk {
	width	: 100%;
	height	: 400px;
}															
#dash_ups {
	width	: 50%;
	height	: 250px;
}
#dash_pac {
	width	: 50%;
	height	: 250px;
}

#line {
    width: 450px;
    height: 200px;
}
#line1 {
    width: 450px;
    height: 200px;
}
#line2 {
    width: 450px;
    height: 200px;
}

</style>
<head>
  <meta charset="utf-8" />
  <title>TIK</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('asset'); ?>/css/app.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/excanvas.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
  <!-- Resources -->
<script src="<?php echo base_url('asset'); ?>/js/amcharts.js"></script>
<script src="<?php echo base_url('asset'); ?>/js/gauge.js"></script>
<script src="<?php echo base_url('asset'); ?>/js/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('asset'); ?>/js/plugins/export/export.css" type="text/css" media="all" />
<script src="<?php echo base_url('asset'); ?>/js/themes/light.js"></script>
<script src="<?php echo base_url('asset'); ?>/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('asset'); ?>/js/bootstrap.js"></script>
<!-- app -->
<script src="<?php echo base_url('asset'); ?>/js/app.js"></script>
<script src="<?php echo base_url('asset'); ?>/js/app.plugin.js"></script>
<script src="<?php echo base_url('asset'); ?>/js/app.data.js"></script>
<script src="<?php echo base_url('asset'); ?>/js/alertify.min.js"></script>

<!-- Sparkline Chart -->
<script src="<?php echo base_url('asset'); ?>/js/charts/sparkline/jquery.sparkline.min.js"></script>
<!-- Easy Pie Chart -->
<script src="<?php echo base_url('asset'); ?>/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
<!-- Morris -->
<script src="<?php echo base_url('asset'); ?>/js/charts/morris/raphael-min.js" cache="false"></script>
<script src="<?php echo base_url('asset'); ?>/js/charts/morris/morris.min.js" cache="false"></script>
<script src="<?php echo base_url('asset'); ?>/js/charts/flot/jquery.flot.min.js" cache="false"></script>
<script src="<?php echo base_url('asset'); ?>/js/charts/flot/jquery.flot.tooltip.min.js" cache="false"></script>
<script src="<?php echo base_url('asset'); ?>/js/charts/flot/jquery.flot.resize.js" cache="false"></script>
<script src="<?php echo base_url('asset'); ?>/js/charts/flot/jquery.flot.orderBars.js" cache="false"></script>
<script src="<?php echo base_url('asset'); ?>/js/charts/flot/jquery.flot.pie.min.js" cache="false"></script>
<script src="<?php echo base_url('asset'); ?>/js/echarts/echarts.min.js"></script>
<!--script src="<?php echo base_url('asset'); ?>/js/echarts/jquery.js"></script-->
<script type="text/javascript">
// based on prepared DOM, initialize echarts instance
window.onload = function () {
var a;
var e = document.getElementById("main");
var myChart = echarts.init(e);
var app = {};
option = null;
option = {
    backgroundColor: '#000000',
    tooltip : {
        formatter: "{a} <br/>{c} {b}"
    },
    series : [
        {
            name:'',
            type:'gauge',
            min:0,
            max:100,
            splitNumber:20,
            radius: '85%',
            axisLine: {            // ????
                lineStyle: {       // ??lineStyle??????
                    color: [[0.05, 'lime'],[0.5, 'yellow'],[1, 'red']],
                    width: 3,
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            axisLabel: {            // ??????
                textStyle: {       // ??lineStyle??????
                    fontWeight: 'bolder',
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            axisTick: {            // ??????
                length :15,        // ??length????
                lineStyle: {       // ??lineStyle??????
                    color: 'auto',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            splitLine: {           // ???
                length :25,         // ??length????
                lineStyle: {       // ??lineStyle(??lineStyle)??????
                    width:3,
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            pointer: {           // ???
                shadowColor : '#fff', //????
                shadowBlur: 5
            },
            title : {
                textStyle: {       // ??????????????,??TEXTSTYLE
                    fontWeight: 'bolder',
                    fontSize: 20,
                    fontStyle: 'italic',
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            detail : {
                backgroundColor: 'rgba(30,144,255,0.8)',
                borderWidth: 1,
                borderColor: '#fff',
                shadowColor : '#fff', //????
                shadowBlur: 5,
                offsetCenter: [0, '50%'],       // x, y,??px
                textStyle: {       // ??????????????,??TEXTSTYLE
                    fontWeight: 'bolder',
                    color: '#fff'
                }
            },
            data:[{value: 100, name: 'RISK (%)'}]
        },
		{
            name:'',
            type:'gauge',
            center : ['25%', '50%'],    // ??????
            radius : '65%',
            min:15,
            max:30,
            startAngle:135,
            endAngle:45,
            splitNumber:2,
            axisLine: {            // ????
                lineStyle: {       // ??lineStyle??????
                    color: [[0.2, 'red'],[0.33, 'yellow'],[0.66, 'blue'],[0.8, 'yellow'],[1, 'red']],
                    width: 2,
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            axisTick: {            // ??????
                length :12,        // ??length????
                lineStyle: {       // ??lineStyle??????
                    color: 'auto',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            axisLabel: {
                textStyle: {       // ??lineStyle??????
                    fontWeight: 'bolder',
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                },
                formatter:function(v){
							if(v != 22.5){
							return v;
							} else{
								return 'Suhu DC (celcius)';
							}
				
                        
                }
            },
            splitLine: {           // ???
                length :15,         // ??length????
                lineStyle: {       // ??lineStyle(??lineStyle)??????
                    width:3,
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            pointer: {
                width:2,
                shadowColor : '#fff', //????
                shadowBlur: 5
            },
            title : {
                textStyle: {       // ??????????????,??TEXTSTYLE
                    fontWeight: 'bolder',
                    fontSize: 10,
                    fontStyle: 'italic',
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            detail : {
                backgroundColor: 'rgba(30,144,255,0.8)',
                borderWidth: 0.5,
                borderColor: '#fff',
                shadowColor : '#fff', //????
                shadowBlur: 2,
                offsetCenter: [0, '-60%'],       // x, y,??px
                textStyle: {       // ??????????????,??TEXTSTYLE
                    fontWeight: 'bolder',
					fontSize: 10,
                    color: '#fff'
                }
            },
            data:[{value: 30, name: ''}]
        },
        {
            name:'',
            type:'gauge',
            center : ['25%', '50%'],    // ??????
            radius : '65%',
            min:40,
            max:60,
            startAngle:315,
            endAngle:225,
            splitNumber:2,
            axisLine: {            // ????
                lineStyle: {       // ??lineStyle??????
                    color: [[0.15, 'red'],[0.25, 'yellow'],[0.75, 'blue'],[0.85, 'yellow'],[1, 'red']],
                    width: 2,
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            axisTick: {            // ??????
                show: false
            },
            axisLabel: {
                textStyle: {       // ??lineStyle??????
                    fontWeight: 'bolder',
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                },
                formatter:function(v){
						if(v != 50){
						return v;
						} else{
							return 'Humidity DC (% RH)';
							}
                }
            },
            splitLine: {           // ???
                length :15,         // ??length????
                lineStyle: {       // ??lineStyle(??lineStyle)??????
                    width:3,
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            pointer: {
                width:2,
                shadowColor : '#fff', //????
                shadowBlur: 5
            },
            title : {
                textStyle: {       // ??????????????,??TEXTSTYLE
                    fontWeight: 'bolder',
                    fontSize: 10,
                    fontStyle: 'italic',
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            detail : {
                backgroundColor: 'rgba(30,144,255,0.8)',
                borderWidth: 0.5,
                borderColor: '#fff',
                shadowColor : '#fff', //????
                shadowBlur: 2,
                offsetCenter: [0, '60%'],       // x, y,??px
                textStyle: {       // ??????????????,??TEXTSTYLE
                    fontWeight: 'bolder',
					fontSize: 10,
                    color: '#fff'
                }
            },
            data:[{value: 100, name: ''}]
        },
        {
            name:'',
            type:'gauge',
            center : ['75%', '50%'],    // ??????
            radius : '65%',
            min:0,
            max:100,
            startAngle:135,
            endAngle:45,
            splitNumber:2,
            axisLine: {            // ????
                lineStyle: {       // ??lineStyle??????
                    color: [[0.6, 'lime'],[0.8, 'yellow'],[1, 'red']],
                    width: 2,
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            axisTick: {            // ??????
                length :12,        // ??length????
                lineStyle: {       // ??lineStyle??????
                    color: 'auto',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            axisLabel: {
                textStyle: {       // ??lineStyle??????
                    fontWeight: 'bolder',
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                },
                formatter:function(v){
						if(v != 50){
						return v;
						} else{
							return 'UPS (%)';
						}
						
                }
            },
            splitLine: {           // ???
                length :15,         // ??length????
                lineStyle: {       // ??lineStyle(??lineStyle)??????
                    width:3,
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            pointer: {
                width:2,
                shadowColor : '#fff', //????
                shadowBlur: 5
            },
            title : {
                textStyle: {       // ??????????????,??TEXTSTYLE
                    fontWeight: 'bolder',
                    fontSize: 10,
                    fontStyle: 'italic',
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            detail : {
                backgroundColor: 'rgba(30,144,255,0.8)',
                borderWidth: 0.5,
                borderColor: '#fff',
                shadowColor : '#fff', //????
                shadowBlur: 2,
                offsetCenter: [0, '-60%'],       // x, y,??px
                textStyle: {       // ??????????????,??TEXTSTYLE
                    fontWeight: 'bolder',
					fontSize: 10,
                    color: '#fff'
                }
            },
            data:[{value: 100, name: ''}]
        },
        {
            name:'',
            type:'gauge',
            center : ['75%', '50%'],    // ??????
            radius : '65%',
            min:0,
            max:100,
            startAngle:315,
            endAngle:225,
            splitNumber:2,
            axisLine: {            // ????
                lineStyle: {       // ??lineStyle??????
                    color: [[0.80, 'red'],[0.95, 'yellow'],[1, 'lime']],
                    width: 2,
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            axisTick: {            // ??????
                show: false
            },
            axisLabel: {
                textStyle: {       // ??lineStyle??????
                    fontWeight: 'bolder',
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                },
                formatter:function(v){
					if(v != 50){
                    return v;
					} else{
						return 'Battery (%)';
					}
                }
            },
            splitLine: {           // ???
                length :15,         // ??length????
                lineStyle: {       // ??lineStyle(??lineStyle)??????
                    width:3,
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            pointer: {
                width:2,
                shadowColor : '#fff', //????
                shadowBlur: 5
            },
            title : {
                textStyle: {       // ??????????????,??TEXTSTYLE
                    fontWeight: 'bolder',
                    fontSize: 10,
                    fontStyle: 'italic',
                    color: '#fff',
                    shadowColor : '#fff', //????
                    shadowBlur: 10
                }
            },
            detail : {
                backgroundColor: 'rgba(30,144,255,0.8)',
                borderWidth: 0.5,
                borderColor: '#fff',
                shadowColor : '#fff', //????
                shadowBlur: 2,
                offsetCenter: [0, '60%'],       // x, y,??px
                textStyle: {       // ??????????????,??TEXTSTYLE
                    fontWeight: 'bolder',
					fontSize: 10,
                    color: '#fff'
                }
            },
            data:[{value: 100, name: ''}]
        },
		
		
    ]
};

setInterval(function (){
    option.series[0].data[0].value = <?php echo $perangkat[2]['nilai']?>;
    option.series[1].data[0].value = <?php echo $perangkat[4]['nilai']?>;
    option.series[2].data[0].value = <?php echo $perangkat[3]['nilai']?>;
    option.series[3].data[0].value = <?php echo $perangkat[1]['nilai']?>;
    option.series[4].data[0].value = <?php echo $perangkat[0]['nilai']?>;
    myChart.setOption(option);
},2000)
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
};
</script>
<script>
var d1 = [["1", 20], ["2", 20], ["3", 20], ["4", 21], ["5", 22], ["6", 21], ["7", 21], ["8", 20], ["9", 21], ["10", 22], ["11", 24], ["12", 21],["13", 20], ["14", 22], ["15", 22], ["16", 22], ["17", 22],["18", 20], ["19", 22], ["20", 22], ["21", 21], ["22", 22],["23", 22], ["24", 22]];
var d2 = [["1", 45], ["2", 45], ["3", 47], ["4", 47], ["5", 46], ["6", 48], ["7", 49], ["8", 46], ["9", 46], ["10", 46], ["11", 46], ["12", 47],["13", 46], ["14", 46], ["15", 47], ["16", 45], ["17", 45],["18", 50], ["19", 52], ["20", 46], ["21", 47], ["22", 47],["23", 47], ["24", 46]];
$(document).ready(function () {
    //$.plot($("#line"), [d1]);
	/*var plot = $.plot($("#line"), [{
          data: d1
      }], 
      {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.2
                    }]
                }
            },
            points: {
                radius: 5,
                show: true
            },
            shadowSize: 2
        },
        grid: {
            color: "#fff",
            hoverable: true,
            clickable: true,
            tickColor: "#f0f0f0",
            borderWidth: 0
        },
        colors: ["#5dcff3"],
        xaxis: {
            mode: "categories",
            tickDecimals: 0            
        },
        yaxis: {
            ticks: 5,
            tickDecimals: 0,            
        },
        tooltip: true,
        tooltipOpts: {
          content: "%x.1 is %y.4",
          defaultTheme: false,
          shifts: {
            x: 0,
            y: 24
          }
        }
      }
  );
    $.plot($("#line2"), [d2]);*/
    //$.plot($("#line3"), [d3]);
});
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
</head>
<body>
<!--section class="panel" style="border-color:black;margin-top:-2px;">
	<footer class="panel-footer" style="background-color:black;">
			<div class="row text-center">
			  <div class="col-xs-3 b-r">
				<p class="h3 font-bold m-t" style="color: blue;font-size: 300%;">1/4</p>
				<p class="text-muted" style="color: white;">Tes Genset Bulanan</p>
			  </div>
			  <div class="col-xs-3 b-r">
				<p class="h3 font-bold m-t" style="color: #ff481f;font-size: 300%;">1/1</p>
				<p class="text-muted" style="color: white;">Tes Beban UPS Bulanan</p>
			  </div>
			  <div class="col-xs-3 b-r">
				<p class="h3 font-bold m-t" style="color: #2fa954;font-size: 300%;">96 %</p>
				<p class="text-muted" style="color: white;">Battery</p>
			  </div>
			  <div class="col-xs-3">
				<p class="h3 font-bold m-t" style="color: #c000ff;font-size: 300%;">12/26</p>
				<p class="text-muted" style="color: white;">Formasi TIK</p>                        
			  </div>
			</div>
		  </footer>
</section-->
<header class="header bg-black navbar navbar-inverse" style="background-color: #000000;">
          <div class="collapse navbar-collapse pull-in">
            <ul class="nav navbar-nav m-l-n">
			<li class="dropdown">
                <a href="<?php echo base_url('')?>" class="dropdown" data-toggle="dropdown">
					<i class="fa fa-align-justify"></i>
				</a>
				<?php 
				$id = $this->session->userdata('user_data');
				if($id){
				if ($id['id_role'] == 0){
				?>
				<ul class="dropdown-menu">
                  <li><a href="<?php echo base_url('/index.php/user/')?>"><i class="fa fa-users"> User</i></a></li>
                </ul>
              </li>		
			</ul>
					<ul class="nav navbar-nav navbar-right">
					  <li class="dropdown">
						<a href="#" class="dropdown-toggle" style="color: white;" data-toggle="dropdown">
						  <?php echo $id['nama_lengkap']?> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
						  <li>
							<a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
						  </li>
						</ul>
					  </li>
					</ul>
				<?php 
				} else{
					if ($id['id_role'] == 1 || $id['id_role'] == 2){
				?>
					<ul class="dropdown-menu">
					  <li><a href="<?php echo base_url('/index.php/task/paraf_kabag/')?>"><i class="fa fa-users"> Paraf</i></a></li>
					</ul>
				  </li>		
				</ul>
					<ul class="nav navbar-nav navbar-right">
					  <li class="dropdown">
						<a href="#" class="dropdown-toggle" style="color: white;" data-toggle="dropdown">
						  <?php echo $id['nama_lengkap']?> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
						  <li>
							<a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
						  </li>
						</ul>
					  </li>
					</ul>
				<?php
				} else{
				?>
					<ul class="dropdown-menu">
					  <li><a href="<?php echo base_url('/index.php/task/activity')?>"><i class="fa fa-users"> Task</i></a></li>
					</ul>
				  </li>		
				</ul>
					<ul class="nav navbar-nav navbar-right">
					  <li class="dropdown">
						<a href="#" class="dropdown-toggle" style="color: white;" data-toggle="dropdown">
						  <?php echo $id['nama_lengkap']?> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
						  <li>
							<a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
						  </li>
						</ul>
					  </li>
					</ul>
				<?php
				}
				}
				}else{
				?>
				</ul>
					<ul class="nav navbar-nav navbar-right">
					  <li class="dropdown">
						<a href="#" class="dropdown-toggle" style="color: white;" data-toggle="dropdown" onclick="modal_login();">
						  Login <b class="caret"></b>
						</a>
					  </li>
					</ul>
				<?php
				}
				?> 
            
          </div>
        </header>
<div id="main" style="width: 100%; height: 90%; margin-top:0px;">

</div>

<footer class="panel-footer" style="background-color:black;margin-top:-10px;">
<p class="text-muted" style="color: white;position: absolute;margin-top: -480px;font-size: 15px;">Tes Beban UPS Bulanan</p>
<?php 
$ups = $perangkat[7]['nilai'];
if($ups == 0){
?>
<img src="<?php echo base_url('images/silang.png');?>" style="position: absolute;margin-top: -460px;margin-left: 25px;width:70px;">
<?php 
}else{
?>
	<img src="<?php echo base_url('images/centang.png');?>" style="position: absolute;margin-top: -460px;margin-left: 25px;width:70px;">
<?php
}
?>
<img src="<?php echo base_url('images/batre.png');?>" style="position: absolute;margin-top: -350px;height: 160px;margin-left:-1px;">
<img src="<?php echo base_url('images/strip-batre-kosong.png')?>" style="position: absolute;margin-top: -330px;height: 160px;">
<img src="<?php echo base_url('images/strip-batre-kosong.png')?>" style="position: absolute;margin-top: -345px;height: 160px;">
<img src="<?php echo base_url('images/strip-batre-kosong.png')?>" style="position: absolute;margin-top: -360px;height: 160px;">
<img src="<?php echo base_url('images/strip-batre-kosong.png')?>" style="position: absolute;margin-top: -375px;height: 160px;">
<?php 
$batre = $perangkat[6]['nilai'];
$posisi = 330;
for($a = 0; $a < $batre; $a++){
$strip = "<img src=".base_url('images/strip-batre.png')." style='position: absolute;margin-top: -".$posisi."px;height: 160px;'>";
echo $strip;
$posisi += 15;
}
?>
<p class="text-muted" style="color: white;position: absolute;margin-top: -190px;font-size: 15px;margin-left:20px;">Formasi TIK</p>
<p class="text-muted" style="color: blue;position: absolute;margin-top: -160px;font-size: 50px;"><?php echo (int)$perangkat[5]['nilai']?>/22</p>
<p class="text-muted" style="color: white;position: absolute;margin-left: 555px;margin-top: -70px;font-size: 30px;">RELIABILITY TIK</p>
<!--div class="row" >
	<div class="col-lg-4">
		<section class="panel">
		<header class="panel-heading">Temperatur DC (celcius)</header>
			<div id="line" style="height: 144px;position: relative;width: 400px;">
			
			</div>
		</section>
	</div>
	<div class="col-lg-4">
		<section class="panel">
		<header class="panel-heading">Kelembaban DC (% RH)</header>
			<div id="line2" style="height: 144px;position: relative;width: 400px;">

			</div>
		</section>
	</div>
	<div class="col-lg-4">
		<section class="panel">
		<header class="panel-heading">PM Cable dan Panel SDP</header>
			<div id="line3" style="height: 144px;position: relative;width: 400px;">
			
			</div>
		</section>
	</div>
</div-->
</footer>
<script>
/*new Morris.Bar({
	  element: 'line3',
	  data: [{ y:1 , a:20},{ y:2 , a:0},{ y:3 , a:0},{ y:4 , a:0}],
	  xkey: 'y',
	  ykeys: ['a'],
	  ymax: 20,
	  labels: ['PM']
	});*/
function modal_login(){
	var $this = $(this)
	  , $remote = '<?php echo site_url('auth/modal_login'); ?>'
	  , $modal = $('<div class="modal" id="ajaxModalLogin"><div class="modal-body"></div></div>');
	$('body').append($modal);
	$modal.modal();
	$modal.load($remote);
	
}
</script>

</body>
</html>