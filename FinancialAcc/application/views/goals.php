


    <div class="content">
        <div class="header">
            <div class="stats">
    <p class="stat"><span class="label label-info">5</span> Tickets</p>
    <p class="stat"><span class="label label-success">27</span> Tasks</p>
    <p class="stat"><span class="label label-danger">15</span> Overdue</p>
</div>

            <h1 class="page-title">Dashboard</h1>
                    <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a> </li>
            <li class="active">Dashboard</li>
        </ul>

        </div>
        <div class="main-content">
            
    <script type="text/javascript">
        var can, ctx,
            minVal, maxVal,
            xScalar, yScalar,
            numSamples, y;
        // data sets -- set literally or obtain from an ajax call
        var dataName = [ "" ];
        var dataValue = [ 78 ];
 
        function init() {
            // set these values for your data
            numSamples = 4;
            maxVal = 100;
            var stepSize = 20;
            var colHead = 50;
            var rowHead = 60;
            var margin = 10;
            var header = ""
            can = document.getElementById("can");
            ctx = can.getContext("2d");
            ctx.fillStyle = "white"
            yScalar = (can.height - colHead - margin) / (maxVal);
            xScalar = (can.width - rowHead) / (numSamples + 1);
            ctx.strokeStyle = "rgba(255,255,255, 0.5)";//"rgba(128,128,255, 0.5)"; // light blue line
            ctx.beginPath();
            // print  column header
            ctx.font = "7pt Helvetica"
            ctx.fillText(header, 0, colHead - margin);
            // print row header and draw horizontal grid lines
            ctx.font = "6pt Helvetica"
            var count =  0;
            for (scale = maxVal; scale >= 0; scale -= stepSize) {
                y = colHead + (yScalar * count * stepSize);
                ctx.fillText(scale, margin,y + margin);
                ctx.moveTo(rowHead, y)
                //ctx.lineTo(can.width, y)
                count++;
            }
            ctx.stroke();
			 // label samples
            ctx.font = "7pt Helvetica";
            ctx.textBaseline = "bottom";
            for (i = 0; i < 4; i++) {
                calcY(dataValue[i]);
                ctx.fillText(dataName[i], xScalar * (i + 1), y - margin);
            }
            // set a color and a shadow
            ctx.fillStyle = "#fff";
            //ctx.shadowColor = 'rgba(128,128,128, 0.5)';
            ctx.shadowOffsetX = 20;
            ctx.shadowOffsetY = 1;
            // translate to bottom of graph and scale x,y to match data
            ctx.translate(0, can.height - margin);
            ctx.scale(xScalar, -1 * yScalar);
            // draw bars
            for (i = 0; i < 4; i++) {
                ctx.fillRect(i + 1, 0, 0.5, dataValue[i]);
            }
        }
 
        function calcY(value) {
            y = can.height - value * yScalar;
        }
		
		$(document).ready(function(){
			init();
		});
    </script>




    <div class="panel panel-default">
        <a href="#page-stats" class="panel-heading" data-toggle="collapse">Latest Stats</a>
       
<div id="page-stats" class="panel-collapse panel-body collapse in">
				<div class="row"> 
                    <div class="col-md-12" >
					
					<div class="col-md-2-new col-md-offset-1" style="background-color: Green;">
					   
                            <div class="col-md-12 knob-container" style="background-color: Green;text-align: center;color:white;">
                                <h5 class="tempWidth" style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-left: -8px;margin-bottom: 22px;">Overall Progress To Goals</h5>
								<input class="knob" data-width="150" data-height="150" data-min="0" data-max="3000" data-displayPrevious="true" value="78%" data-fgColor="#a7da73" data-readOnly="true">
								
								<!--<div  class="col-md-2 col-sm-2 col-xs-2" style="
    padding: 0;
">
									<canvas id="can" ></canvas>
								</div>
								<div  class="col-md-10 col-sm-10 col-xs-10" style="margin-top:100px;" >
									
								 </div>-->
								 
                            </div>
                        
					</div>
					
					
                  
                        <div class="col-md-2-new" style="background-color: blue;">
                            <div class="col-md-12 knob-container" style="background-color: blue;text-align: center;color:white;">
                                <h5 style="border-bottom: 1px solid white; padding-bottom: 10px; font-size: 13px;">Net Worth</h5>
<!--                                <input class="knob" data-width="200" data-min="0" data-max="4500" data-displayPrevious="true" value="3299" data-fgColor="#efbf59" data-readOnly=true;>-->

                                   <div class="form-group">
                                            
                                            <select class="form-control" id="sel1" style="
    margin-top: 20px;
">
                                              <option>Select Month</option>
                                            </select>
                                          </div>
                                <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: cornflowerblue;margin-top: 8px;"><p style="font-size: 9px;/* padding-top: 6px; */margin-top: 7px;line-height: 11px;width: 49px;">Total Asset:</p></div>
                                <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 8px;"><p style="font-size: 9px;color: black;padding-top: 6px;width: 45px;text-align: right;margin-left: -12px;">204,496.00</p></div>
                                
                                <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: cornflowerblue;margin-top: 5px;"><p style="font-size: 9px;/* padding-top: 6px; */margin-top: 6px;line-height: 12px;width: 73px;margin-left: -17px;">Total Liability:</p></div>
                                <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 5px;"><p style="font-size: 9px;color: black;padding-top: 6px;width: 45px;text-align: right;margin-left: -12px;">204,496.00</p></div>

								
								
							
							
                            </div>
								<div class="col-md-12 knob-container hidden-md hidden-lg" style="background-color: blue;text-align: center;color:white;margin-top: 81px;">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-top: 10px;">Net Worth</h5>
								<h5 style="">$25,620.00</h5>
                            </div>
							<div class="col-md-12 knob-container  hidden-xs hidden-sm" style="background-color: blue;text-align: center;color:white;">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-top: 10px;">Net Worth</h5>
								<h5 style="">$25,620.00</h5>
                            </div>
                        </div>


						<div class="col-md-2-new" style="background-color: green;">
                            <div class="col-md-12 knob-container" style="background-color: green;text-align: center;color:white;">
							
                                <h5 style="border-bottom: 1px solid white; padding-bottom: 10px; font-size: 13px;">Personal Monthly Budget</h5>
<!--                                <input class="knob" data-width="200" data-min="0" data-max="4500" data-displayPrevious="true" value="3299" data-fgColor="#efbf59" data-readOnly=true;>-->

                                   <div class="form-group">
                                            
                                            <select class="form-control" id="sel1" style="
    margin-top: 20px;
">
                                              <option>Select Month</option>
                                            </select>
                                          </div>
										  
                                <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: #7fb345;  margin-top: 8px; "><p style="font-size: 9px;/* padding-top: 6px; */margin-top: 7px;line-height: 11px;width: 57px;margin-left: -6px;">Total Income:</p></div>
                                <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 8px;"><p style="font-size: 9px;color: black;padding-top: 6px;text-align: right;margin-left: -12px;">204,496.00</p></div>
                                
                                <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: #7fb345;  margin-top: 5px; "><p style="font-size: 9px;/* padding-top: 6px; */margin-top: 7px;line-height: 11px;width: 66px;margin-left: -13px;">Total Expenses:</p></div>
                                <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 5px;"><p style="font-size: 9px;color: black;padding-top: 6px;text-align: right;margin-left: -12px;">204,496.00</p></div>
								
								
							
							

                               
                            </div>
							
							<div class="col-md-12 knob-container hidden-md hidden-lg" style="background-color: green;text-align: center;color:white;margin-top: 81px;">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 2px;font-size: 13px;margin-top: 10px;">Left Over Money</h5>
								<h5 style="">$25,620.00</h5>
                            </div>
							
							<div class="col-md-12 knob-container hidden-xs hidden-sm" style="background-color: green;text-align: center;color:white;">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-top: 10px;">Left Over Money</h5>
								<h5 style="">$25,620.00</h5>
                            </div>
							
							
                        </div>
						
                        <div class="col-md-2-new" style="background-color:blue; max-height:240px; ">
                            <div class="col-md-12 knob-container" style="background-color: blue;text-align: center;color:white;">
							  <h5 style="border-bottom: 1px solid white; padding-bottom: 10px; font-size: 13px;">Weekly Bills Summary</h5>
<!--                                <input class="knob" data-width="200" data-min="0" data-max="4500" data-displayPrevious="true" value="3299" data-fgColor="#efbf59" data-readOnly=true;>-->
									
									<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="background-color: cornflowerblue;margin-top: 8px;"><p style="font-size: 9px;padding-top: 6px;width: 63px;margin-left: -6px;">Total Bills Due:</p></div>
									<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="background-color: white; margin-top: 8px;"><p style="font-size: 9px; color: black; padding-top: 6px;text-align: right;">2</p></div>
								
									<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="background-color: cornflowerblue;margin-top: 5px;"><p style="font-size: 9px;padding-top: 6px;margin-left: -25px;width: 100px;">Total Bill Amount:</p></div>
									<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="background-color: white; margin-top: 5px;"><p style="font-size: 9px;color: black;padding-top: 6px;text-align: right;margin-left: -12px;">1,050.00</p></div>
								
                            </div>
							
							<div class="col-md-12 knob-container hidden-xs hidden-sm" style="background-color: blue;text-align: center;color:white;margin-top: 10px;border-top: 4px solid white;height: 100%;max-height: 114px;">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-top: 29px;">Total Inventory Value</h5>
								<h5 style="">$95.00.00</h5>
                            </div>
							
							<div class=" hidden-md hidden-lg col-md-12 col-xs-12 col-sm-12 knob-container" style="background-color: blue;text-align: center;color:white;margin-top: 4px;border-top: 1px solid white; height: 100%; max-height: 77px; ">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-top: 32px;">Total Inventory Value</h5>
								<h5 style="">$95.00.00</h5>
                            </div>
                        </div> 
						
						
                        
					
					 <!-- Last Pane -->
					<div class="col-md-2-new" style="background-color: black;">
					<div class="">
						<div class="col-md-12 knob-container" style="height: 213px;background-color: black;text-align: center;color:white;">
                                <h5 style="border-bottom: 1px solid white; padding-bottom: 10px; font-size: 13px; ">Debt Payment Overview</h5>  
								
							<div class="form-group">
									<div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: #e1dfe0;margin-top: 8px;"><p style="font-size: 9px;padding-top: 6px;line-height: 12px;width: 78px;margin-left: -9px;text-align: -webkit-auto; color:black; /* word-spacing: 0px; */" >Date debt is clear:</p></div>
									<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 8px;"><p style="font-size: 9px;color: black;padding-top: 6px;text-align: right;margin-left: -10px;">Sept/2017</p></div>
									</div>
									<div class="form-group">
									<div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: #e1dfe0;margin-top: 5px;"><p style="font-size: 9px;padding-top: 6px;line-height: 12px;width: 83px;margin-left: -9px;/* text-align: -webkit-auto; */ color:black;/* word-spacing: 0px; */">Number of months:</p></div>
									<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 5px;"><p style="font-size: 9px; color: black; padding-top: 6px;text-align: right;">16</p></div>
									</div>
									<div class="form-group">
									<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4" style="background-color: #f6f4f5;margin-top: 20px;margin-left: 22px;"><p style="font-size: 9px;padding-top: 11px;width: 54px;margin-left: -9px;color:#514f50;height: 27px;margin-left: -13px; ">Strategy:</p></div>
									<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8" style="background-color: #e1dfe0;margin-top: 20px;width: 79px;"><p style="font-size: 9px;color: #514f50;padding-top: 3px;width: 68px;margin-left: -10px;text-align: -webkit-right;">Snowball<br>
									<span style="font-size: 9px;color: #514f50;padding-left: 11px;margin-left: -16px;">(lowest balance)</span></p></div>
									</div>
									
								<h5 style="">&nbsp;</h5>
                                
                            </div>
						</div>
						</div>
						
                    </div>
					</div>
					
        </div>
	   </div>
	<div class="row">
	
	<div class="col-md-12  col-xs-12 col-sm-12 col-lg-12">
	<div id="chart_div_area"  ></div>
	 <div id="chart_div_column"  ></div>
	 
	<!--
	<div id="Linegraph" style=" height: 300px"></div>
	<div id="Bargraph" style=" height: 300px"></div>-->
	</div>
	</div>
	<!--
<div class="row">
    <div class="col-sm-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading no-collapse">Not Collapsible<span class="label label-warning">+10</span></div>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Mark</td>
                  <td>Tompson</td>
                  <td>the_mark7</td>
                </tr>
                <tr>
                  <td>Ashley</td>
                  <td>Jacobs</td>
                  <td>ash11927</td>
                </tr>
                <tr>
                  <td>Audrey</td>
                  <td>Ann</td>
                  <td>audann84</td>
                </tr>
                <tr>
                  <td>John</td>
                  <td>Robinson</td>
                  <td>jr5527</td>
                </tr>
                <tr>
                  <td>Aaron</td>
                  <td>Butler</td>
                  <td>aaron_butler</td>
                </tr>
                <tr>
                  <td>Chris</td>
                  <td>Albert</td>
                  <td>cab79</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="panel panel-default">
            <a href="#widget1container" class="panel-heading" data-toggle="collapse">Collapsible </a>
            <div id="widget1container" class="panel-body collapse in">
                <h2>Here's a Tip</h2>
                <p>This template was developed with <a href="http://middlemanapp.com/" target="_blank">Middleman</a> and includes .erb layouts and views.</p>
                <p>All of the views you see here (sign in, sign up, users, etc) are already split up so you don't have to waste your time doing it yourself!</p>
                <p>The layout.erb file includes the header, footer, and side navigation and all of the views are broken out into their own files.</p>
                <p>If you aren't using Ruby, there is also a set of plain HTML files for each page, just like you would expect.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-md-6">
        <div class="panel panel-default"> 
            <div class="panel-heading no-collapse">
                <span class="panel-icon pull-right">
                    <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="fa fa-refresh"></i></a>
                </span>

                Needed to Close
            </div>
            <table class="table list">
              <tbody>
                  <tr>
                      <td>
                          <a href="#"><p class="title">Care Hospital</p></a>
                          <p class="info">Sales Rating: 86%</p>
                      </td>
                      <td>
                          <p>Date: 7/19/2012</p>
                          <a href="#">View Transaction</a>
                      </td>
                      <td>
                          <p class="text-danger h3 pull-right" style="margin-top: 12px;">$20,500</p>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <a href="#"><p class="title">Custom Eyesight</p></a>
                          <p class="info">Sales Rating: 58%</p>
                      </td>
                      <td>
                          <p>Date: 7/19/2012</p>
                          <a href="#">View Transaction</a>
                      </td>
                      <td>
                          <p class="text-danger h3 pull-right" style="margin-top: 12px;">$12,600</p>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <a href="#"><p class="title">Clear Dental</p></a>
                          <p class="info">Sales Rating: 76%</p>
                      </td>
                      <td>
                          <p>Date: 7/19/2012</p>
                          <a href="#">View Transaction</a>
                      </td>
                      <td>
                          <p class="text-danger h3 pull-right" style="margin-top: 12px;">$2,500</p>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <a href="#"><p class="title">Safe Insurance</p></a>
                          <p class="info">Sales Rating: 82%</p>
                      </td>
                      <td>
                          <p>Date: 7/19/2012</p>
                          <a href="#">View Transaction</a>
                      </td>
                      <td>
                          <p class="text-danger h3 pull-right" style="margin-top: 12px;">$22,400</p>
                      </td>
                  </tr>
                    
              </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="panel panel-default">
            <a href="#widget2container" class="panel-heading" data-toggle="collapse">Collapsible </a>
            <div id="widget2container" class="panel-body collapse in">
                <h2>Built with Less</h2>
                <p>The CSS is built with Less. There is a compiled version included if you prefer plain CSS.</p>
                <p>Fava bean jícama seakale beetroot courgette shallot amaranth pea garbanzo carrot radicchio peanut leek pea sprouts arugula brussels sprout green bean. Spring onion broccoli chicory shallot winter purslane pumpkin gumbo cabbage squash beet greens lettuce celery. Gram zucchini swiss chard mustard burdock radish brussels sprout groundnut. Asparagus horseradish beet greens broccoli brussels.</p>
                <p><a class="btn btn-primary">Learn more »</a></p>
            </div>
        </div>
    </div>
</div>

 -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	//***1
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
			  ['Month', 'Net Worth'],
			  ['Jan',  1000],
			  ['Feb',  1170],
			  ['Mar',  660],
			  ['Apr',  1030],
			  ['May',  800],
			  ['June',  730],
			  ['July',  430],
			  ['Aug',  530],
			  ['Sept',  930],
			  ['Oct',  230],
			  ['Nov',  130],
			  ['Dec',  630]
			]);

        var options = {
          title: 'NET WORTH',
          hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div_area'));
        chart.draw(data, options);
		
		function resizeHandler () {
			chart.draw(data, options);
		}
		if (window.addEventListener) {
			window.addEventListener('resize', resizeHandler, false);
		}
		else if (window.attachEvent) {
			window.attachEvent('onresize', resizeHandler);
		}
			
      }
	 //***2 
	google.charts.setOnLoadCallback(drawTrendlines);
	function drawTrendlines() {
		  var data = google.visualization.arrayToDataTable([
			  ['Month', 'Total Income', 'Total Expenses'],
			  ['Jan',  1000,      400],
			  ['Feb',  1170,      460],
			  ['Mar',  660,       1120],
			  ['Apr',  1030,      540],
			  ['May',  800,      540],
			  ['June',  730,      540],
			  ['July',  430,      540],
			  ['Aug',  530,      540],
			  ['Sept',  930,      540],
			  ['Oct',  230,      540],
			  ['Nov',  130,      540],
			  ['Dec',  630,      540]
			  
			]);

		  var options = {
			title: 'MONTHLY BUDGET',
			trendlines: {
			  0: {type: 'linear', lineWidth: 5, opacity: .3},
			  1: {type: 'exponential', lineWidth: 10, opacity: .3}
			},
			hAxis: {
			  title: 'Month',
			  //format: 'h:mm a',
			  viewWindow: {
				min: [7, 30, 0],
				max: [17, 30, 0]
			  }
			},
			vAxis: {
			  //title: 'Rating (scale of 1-10)'
			}
		  };

		  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_column'));
		  chart.draw(data, options);
		  
		function resizeHandler () {
			chart.draw(data, options);
		}
		if (window.addEventListener) {
			window.addEventListener('resize', resizeHandler, false);
		}
		else if (window.attachEvent) {
			window.attachEvent('onresize', resizeHandler);
		}
		
		}
	
//***3	
	google.charts.setOnLoadCallback(drawTrendlines3);
	function drawTrendlines3() {
		  var data = google.visualization.arrayToDataTable([
			  ['0', '%'],
			  ['20',  0],
			  ['40',  0],
			  ['60',  0],
			  ['80',  78],
			  ['100',  0]
			  
			  
			]);

		  var options = {
			title: '',
			trendlines: {
			  0: {type: 'linear', lineWidth: 5, opacity: .3},
			  1: {type: 'exponential', lineWidth: 10, opacity: .3}
			},
			hAxis: {
			  title: '',
			  //format: 'h:mm a',
			  viewWindow: {
				min: [7, 30, 0],
				max: [17, 30, 0]
			  }
			},
			vAxis: {
			  //title: 'Rating (scale of 1-10)'
			}
		  };

		  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div_small_widget'));
		  chart.draw(data, options);
		  
		function resizeHandler () {
			chart.draw(data, options);
		}
		if (window.addEventListener) {
			window.addEventListener('resize', resizeHandler, false);
		}
		else if (window.attachEvent) {
			window.attachEvent('onresize', resizeHandler);
		}
		
		}
    </script>
    
 <script>
        // var graphdata1 = {
            // linecolor: "#CCA300",
            // title: "Monday",
            // values: [
            // { X: "6:00", Y: 10.00 },
            // { X: "7:00", Y: 20.00 },
            // { X: "8:00", Y: 40.00 },
            // { X: "9:00", Y: 34.00 },
            // { X: "10:00", Y: 40.25 },
            // { X: "11:00", Y: 28.56 },
            // { X: "12:00", Y: 18.57 },
            // { X: "13:00", Y: 34.00 },
            // { X: "14:00", Y: 40.89 },
            // { X: "15:00", Y: 12.57 },
            // { X: "16:00", Y: 28.24 },
            // { X: "17:00", Y: 18.00 },
            // { X: "18:00", Y: 34.24 },
            // { X: "19:00", Y: 40.58 },
            // { X: "20:00", Y: 12.54 },
            // { X: "21:00", Y: 28.00 },
            // { X: "22:00", Y: 18.00 },
            // { X: "23:00", Y: 34.89 },
            // { X: "0:00", Y: 40.26 },
            // { X: "1:00", Y: 28.89 },
            // { X: "2:00", Y: 18.87 },
            // { X: "3:00", Y: 34.00 },
            // { X: "4:00", Y: 40.00 }
            // ]
        // };
        // var graphdata2 = {
            // linecolor: "#00CC66",
            // title: "Tuesday",
            // values: [
              // { X: "6:00", Y: 100.00 },
            // { X: "7:00", Y: 120.00 },
            // { X: "8:00", Y: 140.00 },
            // { X: "9:00", Y: 134.00 },
            // { X: "10:00", Y: 140.25 },
            // { X: "11:00", Y: 128.56 },
            // { X: "12:00", Y: 118.57 },
            // { X: "13:00", Y: 134.00 },
            // { X: "14:00", Y: 140.89 },
            // { X: "15:00", Y: 112.57 },
            // { X: "16:00", Y: 128.24 },
            // { X: "17:00", Y: 118.00 },
            // { X: "18:00", Y: 134.24 },
            // { X: "19:00", Y: 140.58 },
            // { X: "20:00", Y: 112.54 },
            // { X: "21:00", Y: 128.00 },
            // { X: "22:00", Y: 118.00 },
            // { X: "23:00", Y: 134.89 },
            // { X: "0:00", Y: 140.26 },
            // { X: "1:00", Y: 128.89 },
            // { X: "2:00", Y: 118.87 },
            // { X: "3:00", Y: 134.00 },
            // { X: "4:00", Y: 180.00 }
            // ]
        // };
        // var graphdata3 = {
            // linecolor: "#FF99CC",
            // title: "Wednesday",
            // values: [
              // { X: "6:00", Y: 230.00 },
            // { X: "7:00", Y: 210.00 },
            // { X: "8:00", Y: 214.00 },
            // { X: "9:00", Y: 234.00 },
            // { X: "10:00", Y: 247.25 },
            // { X: "11:00", Y: 218.56 },
            // { X: "12:00", Y: 268.57 },
            // { X: "13:00", Y: 274.00 },
            // { X: "14:00", Y: 280.89 },
            // { X: "15:00", Y: 242.57 },
            // { X: "16:00", Y: 298.24 },
            // { X: "17:00", Y: 208.00 },
            // { X: "18:00", Y: 214.24 },
            // { X: "19:00", Y: 214.58 },
            // { X: "20:00", Y: 211.54 },
            // { X: "21:00", Y: 248.00 },
            // { X: "22:00", Y: 258.00 },
            // { X: "23:00", Y: 234.89 },
            // { X: "0:00", Y: 210.26 },
            // { X: "1:00", Y: 248.89 },
            // { X: "2:00", Y: 238.87 },
            // { X: "3:00", Y: 264.00 },
            // { X: "4:00", Y: 270.00 }
            // ]
        // };
        // var graphdata4 = {
            // linecolor: "Random",
            // title: "Thursday",
            // values: [
              // { X: "6:00", Y: 300.00 },
            // { X: "7:00", Y: 410.98 },
            // { X: "8:00", Y: 310.00 },
            // { X: "9:00", Y: 314.00 },
            // { X: "10:00", Y: 310.25 },
            // { X: "11:00", Y: 318.56 },
            // { X: "12:00", Y: 318.57 },
            // { X: "13:00", Y: 314.00 },
            // { X: "14:00", Y: 310.89 },
            // { X: "15:00", Y: 512.57 },
            // { X: "16:00", Y: 318.24 },
            // { X: "17:00", Y: 318.00 },
            // { X: "18:00", Y: 314.24 },
            // { X: "19:00", Y: 310.58 },
            // { X: "20:00", Y: 312.54 },
            // { X: "21:00", Y: 318.00 },
            // { X: "22:00", Y: 318.00 },
            // { X: "23:00", Y: 314.89 },
            // { X: "0:00", Y: 310.26 },
            // { X: "1:00", Y: 318.89 },
            // { X: "2:00", Y: 518.87 },
            // { X: "3:00", Y: 314.00 },
            // { X: "4:00", Y: 310.00 }
            // ]
        // };
       
        // $(function () {
			// $("#Bargraph").SimpleChart({
                // ChartType: "Bar",
                // toolwidth: "50",
                // toolheight: "25",
                // axiscolor: "#E6E6E6",
                // textcolor: "#6E6E6E",
                // showlegends: false,
                // data: [graphdata4, graphdata3, graphdata2, graphdata1],
                // legendsize: "140",
                // legendposition: 'bottom',
                // xaxislabel: 'Hours',
                // title: 'Monthly Budget',
                // yaxislabel: 'Profit in $'
            // });
			
            // $("#Linegraph").SimpleChart({
                // ChartType: "Line",
                // toolwidth: "50",
                // toolheight: "25",
                // axiscolor: "#E6E6E6",
                // textcolor: "#6E6E6E",
                // showlegends: false,
                // data: [graphdata4, graphdata3, graphdata2, graphdata1],
                // legendsize: "140",
                // legendposition: 'bottom',
                // xaxislabel: 'Hours',
                // title: 'Website Stats',
                // yaxislabel: 'Profit in $'
            // });
        // });

    </script>