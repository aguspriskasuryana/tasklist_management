<section>
          <section class="vbox">
            <section class="scrollable">
              <div class="header b-b bg-white-only">
                <div class="row">
                  <div class="col-sm-4">
                    <h4 class="m-t m-b-none">Statistics</h4>
                  </div>
                  <div class="col-sm-8">
                    <div class="clearfix m-t m-b-sm pull-right pull-none-xs">
                      <div class="pull-left">                  
                        <div class="pull-left m-r-xs">                  
                          <span class="h4">
                            <?php 
                            $tepat = "";
                            $lambat = "";
                            $best = "";
                            $totalpersen =0;
                            $count = 0;
                            $average = 0;
                            foreach($dataDate as $dataDates){
                              $tepat = $dataDates[0]['tepatpersen'];
                              $lambat = 100 - intval($tepat);
                              if ($tepat > $best){
                                $best = $tepat;
                              }
                              $totalpersen = $totalpersen+intval($tepat);
                              $count=$count+1;
                            }  
                            $average = $totalpersen/$count;
                            echo intval($tepat);
                            ?>%
                            </span>
                          <i class="fa fa-level-up text-success"></i>
                        </div>
                        <div class="clear">
                          <div class="sparkline inline" data-type="bar" data-height="20" data-bar-width="4" data-bar-spacing="2" data-stacked-bar-color="['#afcf6f', '#ccc']">5:5,8:4,12:5,10:6,11:7,12:2,8:6</div>
                        </div>
                      </div>
                      <div class="pull-left m-l-lg">
                        <div class="pull-left m-r-xs">                 
                          <span class="h4">
                          <?php 
                            echo $lambat;
                            ?>%</span>
                          <i class="fa fa-level-down text-danger"></i>
                        </div>
                        <div class="clear">
                          <div class="sparkline inline" data-type="bar" data-height="20" data-bar-width="4" data-bar-spacing="2" data-bar-color="#fb6b5b">6,5,8,9,6,3,5</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper">                
                <section class="panel">
                  <header class="panel-heading font-bold">Site statistics of <?php echo  date("M Y", strtotime("first day of previous month"));?></header>
                  <div class="panel-body">
                    <div id="flot-color" style="height:250px"></div>
                  </div>
                  <footer class="panel-footer">
                    <div class="row text-center">
                      <div class="col-xs-3 b-r">
                        <p class="h3 font-bold m-t"><?php 
                            echo $countuser[0]['countuser'];
                            ?></p>
                        <p class="text-muted">Users</p>
                      </div>
                      <div class="col-xs-3 b-r">
                        <p class="h3 font-bold m-t"><?php 
                            echo count($team);
                            ?></p>
                        <p class="text-muted">Team</p>
                      </div>
                      <div class="col-xs-3 b-r">
                        <p class="h3 font-bold m-t"><?php 
                            echo intval($average);
                            ?>%</p>
                        <p class="text-muted">Average</p>
                      </div>
                      <div class="col-xs-3">
                        <p class="h3 font-bold m-t"><?php 
                            echo intval($best);
                            ?>%</p>
                        <p class="text-muted">Best</p>                        
                      </div>
                    </div>
                  </footer>
                </section>
       

              <div class="row">
                  <div class="col-md-6">
                    <section class="panel">
                      <header class="panel-heading font-bold">Employee Power by Team - <?php echo date('M') ?> <?php echo date('Y') ?></header>
                      <div class="panel-body">
                        <div class="sparkline inline" data-type="bar" data-height="205" data-bar-width="20" data-bar-spacing="30" data-stacked-bar-color="['#afcf6f', '#ccc']"><?php 
                            $persen = "";
                            foreach($dataemployeepower as $dataemployeepowers){
                              $tepat = $dataemployeepowers[0]['tepatpersen'];
                              $lambat = 100 - intval($tepat);
                              //$dataemployeepowers[0]['lambatpersen'];

                              $persen = $persen."".intval($tepat).":".intval($lambat).",";
                              
                              // echo intval($tepat).":".intval($lambat).",";
                            }  
                            $persen =substr($persen,0,-1);
                            echo $persen;
                            ?>
                              
                            </div>
                            <ul class="list-inline text-muted axis">
                            <?php 
                            foreach($dataemployeepower as $dataemployeepowerxxx){
                              $teamX = $dataemployeepowerxxx[0]['team'];
                              echo "<li>".$teamX."</li>";
                            }  
                            ?>
                            </ul>
                      </div>
                    </section>
                  </div>
                  <div class="col-md-6">
                    <section class="panel">
                      <header class="panel-heading font-bold">Pie Chart</header>
                      <div class="panel-body">
                        <div id="flot-pie"  style="height:240px"></div>
                      </div>                  
                    </section>
                  </div>
                </div>
                
                
          

                

                

              </div>
            </section>
          </section>
        </section>
  <script src="<?php echo base_url('asset'); ?>/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('asset'); ?>/js/bootstrap.js"></script>
  <!-- Sparkline Chart -->
  <script src="<?php echo base_url('asset'); ?>/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- App -->
  <script src="<?php echo base_url('asset'); ?>/js/app.js"></script>
  <script src="<?php echo base_url('asset'); ?>/js/app.plugin.js"></script>
  <script src="<?php echo base_url('asset'); ?>/js/app.data.js"></script>

  <!-- Sparkline Chart -->
  <script src="<?php echo base_url('asset'); ?>/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- Easy Pie Chart -->
  <script src="<?php echo base_url('asset'); ?>/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <!-- Flot -->
  <script src="<?php echo base_url('asset'); ?>/js/charts/flot/jquery.flot.min.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/charts/flot/jquery.flot.tooltip.min.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/charts/flot/jquery.flot.resize.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/charts/flot/jquery.flot.orderBars.js" cache="false"></script>
  <script src="<?php echo base_url('asset'); ?>/js/charts/flot/jquery.flot.pie.min.js" cache="false"></script>  
  <script type="text/javascript">
    $(function(){

  // 
  var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  var d1 = [];
  //for (var i = 0; i <= 31; i += 1) {
  //  d1.push([i, 90]);
  //}

  <?php
     $persen = "";
     $i=0;
     foreach($dataDate as $dataDates){
            $tepat = $dataDates[0]['tepatpersen'];
            $lambat = 100 - intval($tepat);
            ?>
            d1.push([<?php echo $i;?>, <?php echo $tepat;?>]);
            <?php
            $i=($i+1);
            }  
  ?>


  var plot = $.plot($("#flot-color"), [{
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
          content: "Date %x.1 is %y.4%",
          defaultTheme: false,
          shifts: {
            x: 0,
            y: 20
          }
        }
      }
  );


  var d2 = [];
  for (var i = 0; i <= 6; i += 1) {
    d2.push([i, parseInt((Math.floor(Math.random() * (1 + 30 - 10))) + 10)]);
  }
  var d3 = [];
  for (var i = 0; i <= 6; i += 1) {
    d3.push([i, parseInt((Math.floor(Math.random() * (1 + 30 - 10))) + 10)]);
  }


  // live update
  var data = [],
  totalPoints = 300;

  function getRandomData() {

    if (data.length > 0)
      data = data.slice(1);

    // Do a random walk

    while (data.length < totalPoints) {

      var prev = data.length > 0 ? data[data.length - 1] : 50,
        y = prev + Math.random() * 10 - 5;

      if (y < 0) {
        y = 0;
      } else if (y > 100) {
        y = 100;
      }

      data.push(y);
    }

    // Zip the generated y values with the x values

    var res = [];
    for (var i = 0; i < data.length; ++i) {
      res.push([i, data[i]])
    }

    return res;
  }

  var updateInterval = 30;
  

  

  // bar
  var d1_1 = [
    [10, 120],
    [20, 70],
    [30, 100],
    [40, 60],
    [50, 35]
  ];

  var d1_2 = [
    [10, 80],
    [20, 60],
    [30, 30],
    [40, 35],
    [50, 30]
  ];

  var d1_3 = [
    [10, 80],
    [20, 40],
    [30, 30],
    [40, 20],
    [50, 10]
  ];

  var data1 = [
    {
        label: "Product 1",
        data: d1_1,
        bars: {
            show: true,
            fill: true,
            lineWidth: 1,
            order: 1,
            fillColor:  "#5dcff3"
        },
        color: "#5dcff3"
    },
    {
        label: "Product 2",
        data: d1_2,
        bars: {
            show: true,
            fill: true,
            lineWidth: 1,
            order: 2,
            fillColor:  "#594f8d"
        },
        color: "#594f8d"
    },
    {
        label: "Product 3",
        data: d1_3,
        bars: {
            show: true,
            fill: true,
            lineWidth: 1,
            order: 3,
            fillColor:  "#92cf5c"
        },
        color: "#92cf5c"
    }
  ];

  var d2_1 = [
    [90, 10],
    [70, 20],
    [50, 30]
  ];

  var d2_2 = [
    [80, 10],
    [60, 20],
    [40, 30]
  ];

  var d2_3 = [
    [120, 10],
    [50, 20],
    [30, 30]
  ];

  var data2 = [
    {
        label: "Product 1",
        data: d2_1,
        bars: {
            horizontal: true,
            show: true,
            fill: true,
            lineWidth: 1,
            order: 1,
            fillColor:  "#5dcff3"
        },
        color: "#5dcff3"
    },
    {
        label: "Product 2",
        data: d2_2,
        bars: {
            horizontal: true,
            show: true,
            fill: true,
            lineWidth: 1,
            order: 2,
            fillColor:  "#594f8d"
        },
        color: "#594f8d"
    },
    {
        label: "Product 3",
        data: d2_3,
        bars: {
            horizontal: true,
            show: true,
            fill: true,
            lineWidth: 1,
            order: 3,
            fillColor:  "#92cf5c"
        },
        color: "#92cf5c"
    }
  ];

  

  // pie

  var da = [], 
      da1 = [],
      series = <?php echo count($team); ?>;


 da[0] = {
      label: "BKS-ADMIN",
      data: 23
    }; da[1] = {
      label: "BKS-DRV",
      data: 59
    }; da[2] = {
      label: "BKS-HK",
      data: 75
    }; da[3] = {
      label: "BKS-RCP",
      data: 82
    }; da[4] = {
      label: "BKS-SEC",
      data: 93
    }; da[5] = {
      label: "BKS-SPV",
      data: 61
    }; da[6] = {
      label: "BKS-TEK",
      data: 85
    }; da[7] = {
      label: "FMS-EATL",
      data: 74
    }; da[8] = {
      label: "MA-Infodata",
      data: 83
    }; da[9] = {
      label: "MA-WCS",
      data: 87
    }; da[10] = {
      label: "iFORTE-OPEN-SYS",
      data: 91
    };da[11] = {
      label: "FMS-IBM iS",
      data: 91
    };

  

  

  $.plot($("#flot-pie"), da, {
    series: {
      pie: {
        combine: {
              color: "#999",
              threshold: 0.05
            },
        show: true
      }
    },    
    colors: ["#5c677c","#594f8d","#92cf5c","#fb6b5b","#5dcff3"],
    legend: {
      show: false
    },
    grid: {
        hoverable: true,
        clickable: false
    },
    tooltip: true,
    tooltipOpts: {
      content: "%s: %p.0%"
    }
  });

  


});
  </script>
</body>
</html>