<script>
$(".knob").knob({
    readOnly: true,
    fgColor: "#00ABC6",
    bgColor: "#666666",
    thickness: 0.2
});
				
$(document).ready(function () {
	$("input.knob").val('<?php echo $overallprogress; ?>%');
});
</script>


    <div class="content">
        <div class="header">

            <h1 class="page-title">Dashboard</h1>
                    <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a> </li>
            <li class="active">Dashboard</li>
        </ul>

        </div>
        <div class="main-content">
            
    



    <div class="panel panel-default">
        <a href="#page-stats" class="panel-heading" data-toggle="collapse">Latest Stats</a>
       
<div id="page-stats" class="panel-collapse panel-body collapse in">
				<div class="row"> 
                    <div class="col-md-12" >
					
					<div class="col-md-2-new col-md-offset-1" style="background-color: Green;">
					   
                            <div class="col-md-12 knob-container" style="background-color: Green;text-align: center;color:white;">
                                <h5 class="tempWidth" style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-left: -8px;margin-bottom: 22px;">Overall Progress To Goals</h5>
								<input class="knob" data-width="150" data-height="150" data-min="0" data-max="100" data-displayPrevious="true" value="<?php echo $overallprogress; ?>" data-fgColor="#a7da73" data-readOnly="true">
								
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
						<?php 
						
						$param['monthyear'] = date("n").'_'.date("y");
						$param['user_id'] = $this->session->userdata('usr_id');
						$json = $this->account_model->onNetWorth($param);
						$json1 = json_decode($json,true);
						//var_dump($json1);
					
					
						$totalassets = $json1['0']['totalassets'];
						$totalliabilities = $json1['0']['totalliabilities'];
						$networth = $json1['0']['networth'];
						
						
						?>
						<script>
							$(function() {
								$('.date-picker1').datepicker( {
									changeMonth: true,
									changeYear: true,
									showButtonPanel: false,
									dateFormat: 'MM yy',
									onClose: function(dateText, inst) { 
										$(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
										var year = inst.selectedYear.toString().substring(2, 4);
										var month = inst.selectedMonth + 1;
										
										onNetWorth(month+"_"+year);
										onNetWorthGraphChange(year);
										
									},
									beforeShow: function() {
									   if ((selDate = $(this).val()).length > 0) 
									   {
										  iYear = selDate.substring(selDate.length - 4, selDate.length);
										  iMonth = jQuery.inArray(selDate.substring(0, selDate.length - 5), 
										  $(this).datepicker('option', 'monthNames'));
										  $(this).datepicker('option', 'defaultDate', new Date(iYear, iMonth, 1));
										  $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
									   }
									}
								});
								$('.date-picker1').datepicker('setDate', new Date());
							});
							</script>
							<style>
							.ui-datepicker-calendar {
								display: none;
							}
							</style>
							
						
						
                            <div class="col-md-12 knob-container" style="background-color: blue;text-align: center;color:white;">
                                <h5 style="border-bottom: 1px solid white; padding-bottom: 10px; font-size: 13px;">Net Worth</h5>
<!--                                <input class="knob" data-width="200" data-min="0" data-max="4500" data-displayPrevious="true" value="3299" data-fgColor="#efbf59" data-readOnly=true;>-->

                                   <div class="form-group">
                                            <input class="form-control date-picker1" name="startnetworthDate" id="startnetworthDate"  />
                                            
                                          </div>
                                <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: cornflowerblue;margin-top: 8px;"><p style="font-size: 9px;/* padding-top: 6px; */margin-top: 7px;line-height: 11px;width: 49px;">Total Asset:</p></div>
                                <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 8px;"><p style="font-size: 9px;color: black;padding-top: 6px;width: 45px;text-align: right;margin-left: -12px;" class="totalassets"><?php echo $totalassets; ?></p></div>
                                
                                <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: cornflowerblue;margin-top: 5px;"><p style="font-size: 9px;/* padding-top: 6px; */margin-top: 6px;line-height: 12px;width: 73px;margin-left: -17px;">Total Liability:</p></div>
                                <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 5px;"><p style="font-size: 9px;color: black;padding-top: 6px;width: 45px;text-align: right;margin-left: -12px;"  class="totalliabilities"><?php echo $totalliabilities; ?></p></div>

								
								
							
							
                            </div>
								<div class="col-md-12 knob-container hidden-md hidden-lg" style="background-color: blue;text-align: center;color:white;margin-top: 81px;">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-top: 10px;">Net Worth</h5>
								<h5 style="" class="networth">$<?php echo $networth; ?></h5>
                            </div>
							<div class="col-md-12 knob-container  hidden-xs hidden-sm" style="background-color: blue;text-align: center;color:white;">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-top: 10px;">Net Worth</h5>
								<h5 style="" class="networth">$<?php echo $networth; ?></h5>
                            </div>
                        </div>


						<div class="col-md-2-new" style="background-color: green;">
                            <div class="col-md-12 knob-container" style="background-color: green;text-align: center;color:white;">
							
                                <h5 style="border-bottom: 1px solid white; padding-bottom: 10px; font-size: 13px;">Personal Monthly Budget</h5>
<!--                                <input class="knob" data-width="200" data-min="0" data-max="4500" data-displayPrevious="true" value="3299" data-fgColor="#efbf59" data-readOnly=true;>-->

                                   <div class="form-group">
                                            
												<?php 
												
												$param['monthyear'] = date("n").'_'.date("y");
												$param['user_id'] = $this->session->userdata('usr_id');
												$json = $this->account_model->onPersonalMonthlyBudget($param);
												$json1 = json_decode($json,true);
												
												?>
												<script>
												$(function() {
													$('.date-picker').datepicker( {
														changeMonth: true,
														changeYear: true,
														showButtonPanel: false,
														dateFormat: 'MM yy',
														onClose: function(dateText, inst) { 
															$(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
															var year = inst.selectedYear.toString().substring(2, 4);
															var month = inst.selectedMonth + 1;
															//alert(month+"_"+year);
															onPersonalMonthlyBudget(month+"_"+year);
																
															onMonthlyGraphChange(year);
															//$('.date-picker').attr('readonly',true).datepicker("destroy");
															   
															//$('#hidden').val(month+"_"+year);
														},
														beforeShow: function() {
														   if ((selDate = $(this).val()).length > 0) 
														   {
															  iYear = selDate.substring(selDate.length - 4, selDate.length);
															  iMonth = jQuery.inArray(selDate.substring(0, selDate.length - 5), 
																	   $(this).datepicker('option', 'monthNames'));
															  $(this).datepicker('option', 'defaultDate', new Date(iYear, iMonth, 1));
															  $(this).datepicker('setDate', new Date(iYear, iMonth, 1));
														   }
														}
													});
													$('.date-picker').datepicker('setDate', new Date());
												});
												</script>
												<style>
												.ui-datepicker-calendar {
													display: none;
												}
												</style>
												<input class="form-control date-picker" name="startDate" id="startDate"  />
                                            <!--<select class="form-control" id="sel1" onchange="onPersonalMonthlyBudget(this.value)" style="
    margin-top: 20px;
">
                                              <option>Select Month</option>
											  <?php
												for ($m=1; $m<=12; $m++) {
													$month = date('F', mktime(0,0,0,$m, 1, date('Y')));
													$printmonth = substr($month,0,3);
													if(date("n") == $m ){
												?>
												 <option selected value="<?php echo $m; ?>_<?php echo date("y"); ?>"><?php echo $printmonth; ?></option>
												 <?php
												 }
												 else {?>
												 <option value="<?php echo $m; ?>_<?php echo date("y"); ?>"><?php echo $printmonth; ?></option>
												 <?php
												 }
												}
												//$amount = $json1['0']['totalincome'];
												$ttl = $json1['0']['totalincome'];
												$totalincome = $ttl;
												$ttle = $json1['0']['totalexpenses'];
												$totalexpenses = $ttle; 
												$left = $json1['0']['leftover'];
												$leftover = $left; 
												//$totalincome = $json1['0']['totalincome'] ;//number_format(($json1['0']['totalincome']/100), 2); //money_format('%i', $json1['0']['totalincome']);
												// USD 1,234.56

												?> 
												
                                            </select>-->
                                          </div>
										  
                                <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: #7fb345;  margin-top: 8px; "><p style="font-size: 9px;/* padding-top: 6px; */margin-top: 7px;line-height: 11px;width: 57px;margin-left: -6px;">Total Income:</p></div>
                                <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 8px;"><p style="font-size: 9px;color: black;padding-top: 6px;text-align: right;margin-left: -12px;" class="totalincome">$<?php  echo $totalincome; ?></p></div>
                                
                                <div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: #7fb345;  margin-top: 5px; "><p style="font-size: 9px;/* padding-top: 6px; */margin-top: 7px;line-height: 11px;width: 66px;margin-left: -13px;">Total Expenses:</p></div>
                                <div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 5px;"><p style="font-size: 9px;color: black;padding-top: 6px;text-align: right;margin-left: -12px;" class="totalexpenses" >$<?php  echo $totalexpenses; ?></p></div>
								
								
							
							

                               
                            </div>
							
							<div class="col-md-12 knob-container hidden-md hidden-lg" style="background-color: green;text-align: center;color:white;margin-top: 81px;">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 2px;font-size: 13px;margin-top: 10px;">Left Over Money</h5>
								<h5 style="" class="leftovermoney">$ <?php  
								echo $leftover;
								//echo $json1['0']['leftover']; ?></h5>
                            </div>
							
							<div class="col-md-12 knob-container hidden-xs hidden-sm" style="background-color: green;text-align: center;color:white;">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-top: 10px;">Left Over Money</h5>
								<h5 style="" class="leftovermoney">$ <?php  echo $leftover; ?></h5>
                            </div>
							
							
                        </div>
						<?php 
						$response = $this->account_model->pageload();
						$total_due = $response['billoverview']['total_due'];
						$total_bills = $response['billoverview']['total_bills'];
						?>
                        <div class="col-md-2-new" style="background-color:blue; max-height:240px; ">
                            <div class="col-md-12 knob-container" style="background-color: blue;text-align: center;color:white;">
							  <h5 style="border-bottom: 1px solid white; padding-bottom: 10px; font-size: 13px;">Weekly Bills Summary</h5>
<!--                                <input class="knob" data-width="200" data-min="0" data-max="4500" data-displayPrevious="true" value="3299" data-fgColor="#efbf59" data-readOnly=true;>-->
									
									<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="background-color: cornflowerblue;margin-top: 8px;"><p style="font-size: 9px;padding-top: 6px;width: 63px;margin-left: -6px;">Total Bills Due:</p></div>
									<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="background-color: white; margin-top: 8px;"><p style="font-size: 9px; color: black; padding-top: 6px;text-align: right;"><?php echo $total_bills; ?></p></div>
								
									<div class="col-md-8 col-xs-8 col-sm-8 col-lg-8" style="background-color: cornflowerblue;margin-top: 5px;"><p style="font-size: 9px;padding-top: 6px;margin-left: -25px;width: 100px;">Total Bill Amount:</p></div>
									<div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="background-color: white; margin-top: 5px;"><p style="font-size: 9px;color: black;padding-top: 6px;text-align: right;margin-left: -12px;"><?php echo $total_due; ?></p></div>
								
                            </div>
							
							<div class="col-md-12 knob-container hidden-xs hidden-sm" style="background-color: blue;text-align: center;color:white;margin-top: 10px;border-top: 4px solid white;height: 100%;max-height: 114px;">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-top: 29px;">Total Inventory Value</h5>
								<h5 style="">$<?php echo $this->account_model->getTotalInvertoryValue(); ?></h5>
                            </div>
							
							<div class=" hidden-md hidden-lg col-md-12 col-xs-12 col-sm-12 knob-container" style="background-color: blue;text-align: center;color:white;margin-top: 4px;border-top: 1px solid white; height: 100%; max-height: 77px; ">
							  <h5 style="border-bottom: 1px solid white;padding-bottom: 10px;font-size: 13px;margin-top: 32px;">Total Inventory Value</h5>
								<h5 style="">$<?php echo $this->account_model->getTotalInvertoryValue(); ?></h5>
                            </div>
                        </div> 
						
						
                        
					
					 <!-- Last Pane -->
					<div class="col-md-2-new" style="background-color: black;">
					<div class="">
						<div class="col-md-12 knob-container" style="height: 213px;background-color: black;text-align: center;color:white;">
                                <h5 style="border-bottom: 1px solid white; padding-bottom: 10px; font-size: 13px; ">Debt Payment Overview</h5>  

							<div class="form-group">
									<div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: #e1dfe0;margin-top: 8px;"><p style="font-size: 9px;padding-top: 6px;line-height: 12px;width: 78px;margin-left: -9px;text-align: -webkit-auto; color:black; /* word-spacing: 0px; */" >Date debt is clear:</p></div>
									<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 8px;"><p style="font-size: 9px;color: black;padding-top: 6px;text-align: right;margin-left: -10px;"><?php echo $futuredate; ?></p></div>
									</div>
									<div class="form-group">
									<div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: #e1dfe0;margin-top: 5px;"><p style="font-size: 9px;padding-top: 6px;line-height: 12px;width: 83px;margin-left: -9px;/* text-align: -webkit-auto; */ color:black;/* word-spacing: 0px; */">Number of months:</p></div>
									<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 5px;"><p style="font-size: 9px; color: black; padding-top: 6px;text-align: right;"><?php echo $tempmonth; ?></p></div>
									</div>
									
									<div class="form-group">
									<div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: #e1dfe0;margin-top: 20px;"><p style="font-size: 9px;padding-top: 6px;line-height: 24px;width: 83px;margin-left: -9px;/* text-align: -webkit-auto; */ color:black;/* word-spacing: 0px; */">Strategy:</p></div>
									<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: white; margin-top: 20px;"><p style="font-size: 9px; color: black; padding-top: 6px;text-align: right;"><?php echo $strategy; ?><br/><?php echo $strategylevel; ?></p></div>
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
	 
	</div>
	</div>
	
    <script type="text/javascript">
	google.charts.load('current', {packages: ['corechart', 'bar']});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	
		var jsonData = $.ajax({
			  url: baseHref+"account/networthgraph/<?php echo date('y'); ?>/<?php echo $this->session->userdata('usr_id'); ?>",
			  dataType: "json",
			  async: false
		}).responseText;
	
		var data = new google.visualization.DataTable(jsonData);
		
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
	
	
	function onNetWorthGraphChange(year) {
	
	var jsonData = $.ajax({
          url: baseHref+"account/networthgraph/"+year+"/<?php echo $this->session->userdata('usr_id'); ?>",
		  dataType: "json",
          async: false
          }).responseText;
		  
		var data = new google.visualization.DataTable(jsonData);
		console.log(data);
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
	
	 //***2 page load
	google.charts.setOnLoadCallback(drawTrendlines);
	function drawTrendlines() {
		
	var jsonData = $.ajax({
          url: baseHref+"account/monthlygraph/<?php echo date('y'); ?>/<?php echo $this->session->userdata('usr_id'); ?>",
		  dataType: "json",
          async: false
          }).responseText;
		
		var data = new google.visualization.DataTable(jsonData);
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
	
	//google.charts.setOnLoadCallback(onMonthlyGraphChange());
	function onMonthlyGraphChange(year)
	{
		var jsonData = $.ajax({
			url: baseHref+"account/monthlygraph/"+year+"/<?php echo $this->session->userdata('usr_id'); ?>",
			dataType: "json",
			async: false
		}).responseText;
		
		
		var data = new google.visualization.DataTable(jsonData);
		
		  var options = {
			title: 'MONTHLY BUDGET',
			trendlines: {
			  0: {type: 'linear', lineWidth: 5, opacity: .3},
			  1: {type: 'exponential', lineWidth: 10, opacity: .3}
			},
			hAxis: {
				title: 'Month',
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
		  hideloader();
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
