<?php 
$userid = $this->session->userdata('usr_id');		

$overallprogress =  $this->account_model->getoverallprogress($userid); 

$debt_payment['usr_id'] = $this->session->userdata('usr_id');
$debt_payment['month'] = date("n");
$debt_payment['year'] = date("y");
$maindetails = $this->account_model->getDebtPaymentDetails($debt_payment);
$strategy = 'N/A';
$strategylevel = 'N/A';
$monthly_payment = '0';
$minimum_payment = '0';
$futuredate = 'N/A';
$tempmonth = "0";
$tempmonth = "0";
if($maindetails == 'false')
{
	$monthly_payment = '0';
	$minimum_payment = '0';
	$futuredate = 'N/A';
	$tempmonth = "0";
	$tempmonth = "0";
}
else{
	$monthly_payment = $maindetails['monthly_payment'];
	$minimum_payment = $maindetails['minimum_payment'];


	$debt_id =$maindetails['id'];
	if($maindetails['strategy'] == 'Avalanche'){
	$strategy = 'Avalanche';
	$strategylevel = "(Highest Interest)";
	$query = $this->db->query("select * from dept_pay_detail where debt_id = '$debt_id' order by rate desc ");
	}
	if($maindetails['strategy'] == 'snowball'){
	$strategy = 'Snowball';
	$strategylevel = "(Lowest Balance)";
	$query = $this->db->query("select * from dept_pay_detail where debt_id = '$debt_id' order by balance asc ");
	}
	if($maindetails['strategy'] == 'nosnowball'){
	$strategy = 'No snowball';
	$strategylevel = "&nbsp;";
	$query = $this->db->query("select * from dept_pay_detail where debt_id = '$debt_id' ");
	}
	$dept_pay_detail = $query->result_array();

	$oldparam['monthlypayment'] = $maindetails['monthly_payment'];
	$oldparam['month'] = $maindetails['month'];
	$oldparam['selectYear'] = $maindetails['year'];
	
	$result = $this->calc_model->getResult($dept_pay_detail,sizeof($dept_pay_detail),$oldparam,$maindetails['strategy']);


	$tempmonth = 0;
	$futuredate = 0;

	for($i = 1; $i < sizeof($result)/5; $i++)
	{
		if($result['prev_month'.$i] > $tempmonth)
		{
			$tempmonth = $result['prev_month'.$i];
			$futuredate = $result['futuredate'.$i];
		}
	}
	if($futuredate != '0'){
		$fmonth = explode(" ",$futuredate);
		$futuredate = substr($fmonth[0],0,3) . " ". $fmonth[1];
	}
	else{
		$futuredate = 'N/A';
	}
}
?>

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
         <!--   <div class="stats">
    <p class="stat"><span class="label label-info">5</span> Tickets</p>
    <p class="stat"><span class="label label-success">27</span> Tasks</p>
    <p class="stat"><span class="label label-danger">15</span> Overdue</p>
</div>-->

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
									<div class="col-md-5 col-xs-5 col-sm-5 col-lg-5" style="background-color: #e1dfe0;margin-top: 20px;"><p style="font-size: 9px;padding-top: 6px;line-height: 24px;width: 83px;margin-left: -34px;/* text-align: -webkit-auto; */ color:black;/* word-spacing: 0px; */">Strategy:</p></div>
									<div class="col-md-7 col-xs-7 col-sm-7 col-lg-7" style="background-color: white; margin-top: 20px;"><p style="font-size: 9px; color: black; padding-top: 6px;text-align: right;"><?php echo $strategy; ?><br/><?php echo $strategylevel; ?></p></div>
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
    <script type="text/javascript">
	//***1
	google.charts.load('current', {packages: ['corechart', 'bar']});
	// google.charts.setOnLoadCallback(drawChart);
	// function drawChart() {
        // var data = google.visualization.arrayToDataTable([
			  // ['Month', 'Net Worth'],
			  // ['Jan',  1000],
			  // ['Feb',  1170],
			  // ['Mar',  660],
			  // ['Apr',  1030],
			  // ['May',  800],
			  // ['June',  730],
			  // ['July',  430],
			  // ['Aug',  530],
			  // ['Sept',  930],
			  // ['Oct',  230],
			  // ['Nov',  130],
			  // ['Dec',  630]
			// ]);

        // var options = {
          // title: 'NET WORTH',
          // hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          // vAxis: {minValue: 0}
        // };

        // var chart = new google.visualization.AreaChart(document.getElementById('chart_div_area'));
        // chart.draw(data, options);
		
		// function resizeHandler () {
			// chart.draw(data, options);
		// }
		// if (window.addEventListener) {
			// window.addEventListener('resize', resizeHandler, false);
		// }
		// else if (window.attachEvent) {
			// window.attachEvent('onresize', resizeHandler);
		// }
	// }
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	
		var jsonData = $.ajax({
			  url: baseHref+"account/networthgraph/<?php echo date('y'); ?>/<?php echo $this->session->userdata('usr_id'); ?>",
			  dataType: "json",
			  async: false
		}).responseText;
	
		var data = new google.visualization.DataTable(jsonData);
		//var data = new google.visualization.arrayToDataTable(jsonData);
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
	
	//google.charts.setOnLoadCallback(onNetWorthGraphChange());
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
