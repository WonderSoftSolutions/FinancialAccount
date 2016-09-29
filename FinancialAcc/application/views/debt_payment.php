<script type="text/javascript">
$(document).ready(function () {
	$('#selectYear').change(function(){
		$('#selectYear').attr('disabled', 'disabled');
		month = $('#sel1').val();
		year = $('#selectYear').val();
		window.location.href = baseHref+"Pages/debtpayments/"+month+"/"+year;
	});
	$('#sel1').change(function(){
		$('#sel1').attr('disabled', 'disabled');
		month = $('#sel1').val();
		year = $('#selectYear').val();
		window.location.href = baseHref+"Pages/debtpayments/"+month+"/"+year;
	});

	$('#selectYear').blur(function(){
		$('#selectYear').attr('disabled', 'disabled');
		month = $('#sel1').val();
		year = $('#selectYear').val();
		window.location.href = baseHref+"Pages/debtpayments/"+month+"/"+year;
	});
	$('#sel1').blur(function(){
		$('#sel1').attr('disabled', 'disabled');
		month = $('#sel1').val();
		year = $('#selectYear').val();
		window.location.href = baseHref+"Pages/debtpayments/"+month+"/"+year;
	});

	$(".rate").focusout(function(){
		var intRegex = /^[0-9]*\.?[0-9]+$/;  
		if(!intRegex.test(this.value)) {
			swtalertwarningmsg('Invalid Rate','please enter valid rate (exp: 2.99)');
			$("#"+this.id).val(0);
			$("#"+this.id).focus();
		}
	});	
});
	
</script>
 <div class="content contentcstm">
		<div class="main-content">
				<div class="col-md-12">
				<div class="table-responsive">
				<div class="col-md-12">

					<div class="col-md-2 col-md-offset-9" style="font-size: 22px;margin-top: -6px;">
						Current Date :
					</div>
					
					<div class="col-md-1">
					
					<label class="label label-info" style="font-size: 16px;" ><?php echo substr(date('F', mktime(0,0,0,date('n'), 1, date('Y'))),0,3) .' '. date("Y"); ?></label>
					<input type="hidden" id="selectYear" name="selectYear" value="<?php echo substr(date('Y'),2,2); ?>" />
					<input type="hidden" id="sel1" name="sel1" value="<?php echo date('n'); ?>" />
					<br/><br/>
					</div>
				</div>
				  <!--<div class="table-responsive"> 
					<table class="table table-striped table-bordered table-responsive" id="toptable">-->
					<form id="testform">
					<table class="table table-striped  table-bordered " id="toptable">
					<thead>
						<tr>
						  <th>#</th>
						  <th>Creditor</th>
						  <th>Balance($)</th>
						  <th>Rate(%)</th>
						   <th>Payment($)</th>
						   
						</tr>
					  </thead>
					 
					  <tbody id="uppertbody">
					  
					  <?php 
					  
						$debt_payment['usr_id'] = $this->session->userdata('usr_id');
						// $debt_payment['month'] = $contrmonth;//date("n");
						// $debt_payment['year'] =$contryear;//date("y");
						$this->account_model->getDebtPayment($debt_payment);
						
					
					  ?>
					  
							<?php
							/*for($i = 1; $i <= 10; $i++)		
							{
								?>
								<tr>
								<th scope="row"><?php echo $i; ?></th>
								<td><input type="text" name="creditor" class="form-control" id="creditor<?php echo $i; ?>"  data-id="<?php echo $i; ?>"  value=""></td>
								<td><input type="number" min="0" name="balance"  class="form-control balance" id="balance<?php echo $i; ?>"  data-id="<?php echo $i; ?>"  value= "0"></td>
								<td><input type="text" name="rate"     class="form-control" id="rate<?php echo $i; ?>"  data-id="<?php echo $i; ?>"     value= "0"></td>
								<td><input type="number" min="0" name="payment"  class="form-control payment" id="payment<?php echo $i; ?>"  data-id="<?php echo $i; ?>"  value= "0"></td>
								</tr>
								<?php
							}*/
							?>
						  </tbody>
							<!--<tr>
							<th></th>
							  <td>Total</td>
							  <td><input type="text" disabled data-id = "1" name="totalbalance"  class="form-control" id="totalbalance"  value= "0"></td>
							  <td></td>
							  <td><input type="text" disabled data-id = "1" name="totalpayment"  class="form-control" id="totalpayment"  value= "0"></td>
							</tr>-->
					</table>
					</form>
					</div>
					<?php 
					
						$debt_payment['usr_id'] = $this->session->userdata('usr_id');
						$debt_payment['month'] = $contrmonth;//date("n");
						$debt_payment['year'] =$contryear;//date("y");
						$maindetails = $this->account_model->getDebtPaymentDetails($debt_payment);
						
						if($maindetails == 'false')
						{
							$monthly_payment = '0';
						}
						else{
							$monthly_payment = $maindetails['monthly_payment'];
						}
						if($maindetails == 'false')
						{
							$minimum_payment = '0';
						}
						else{
							$minimum_payment = $maindetails['minimum_payment'];
						}
					?>
					<div class="col-md-12">
					<div class="col-md-6">
						<div class="form-group">
							<label for="monthlypayment">Monthly Payment($):<span class="" style="font-size:12px; color:red;" >(Enter monthly payment)</span></label>
							<input type="text" class="form-control" name="monthlypayment" id="monthlypayment" value="<?php echo $monthly_payment; ?>" placeholder= "5000">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="mininumpayment">Mininum Payment($):</label>
							<input type="text" disabled class="form-control" id="mininumpayment" name="mininumpayment" value= "<?php echo $minimum_payment; ?>">
						</div>
					</div>
				  <div class="col-md-5">
                 <div class="form-group">
				 <label for="pwd">Select Strategy:</label>
					<select class="selectpicker form-control" id="strategylist" name="strategylist" >
					  <option value="snowball"  > Snowball (Lowest Balance)</option>
					  <option value="Avalanche" > Avalanche (Highest Interest)</option>
					  <option value="nosnowball" > No snowball</option>
					</select></div>
                       </div>
					   
					  <div class="table-responsive"> 
					<table class="table table-striped table-bordered table-responsive">
						  <thead>
							<tr>
							  <th>#</th>
							  <th>Creditor</th>
							  <th>Balance($)</th>
							  <th>Months to Clear Debt</th>
							  <th>Month Debt is Cleared</th>
							  <th>Total Interest Paid($)</th>
								
							</tr>
						  </thead>
							
						  <tbody id="tbodyDebt">
						 <?php
						
						//$maindetails = $this->account_model->getDebtPaymentDetails($debt_payment);
						if($maindetails != 'false')
						{
							$debt_id = $maindetails['id'];
							if($maindetails['strategy'] == 'Avalanche'){
							$query = $this->db->query("select * from dept_pay_detail where debt_id = '$debt_id' order by rate desc ");
							}
							if($maindetails['strategy'] == 'snowball'){
							$query = $this->db->query("select * from dept_pay_detail where debt_id = '$debt_id' order by balance asc ");
							}
							if($maindetails['strategy'] == 'nosnowball'){
							$query = $this->db->query("select * from dept_pay_detail where debt_id = '$debt_id' ");
							}
							$dept_pay_detail = $query->result_array();
							
							$oldparam['monthlypayment'] = $maindetails['monthly_payment'];
							$oldparam['month'] = $maindetails['month'];
							$oldparam['selectYear'] = $maindetails['year'];
							$result = $this->calc_model->getResult($dept_pay_detail,sizeof($dept_pay_detail),$oldparam,$maindetails['strategy']);
							

							$cstmbalance = '0';
							$cstminterest = '0';
							if(isset($result['cstminterest']))
							{
								$cstminterest = $result['cstminterest'];
							}
							if(isset($result['cstmbalance']))
							{
								$cstmbalance = $result['cstmbalance'];
							}
						
						//echo "asd". sizeof($result)/5 . "</br>";
							for($i = 1; $i <= 10; $i++)		
							{
								
								$creditor = '';
								$amount = '';
								$futuredate = '&nbsp;';
								$prev_month = '&nbsp;';
								$total_interest = '';
								
								
								
								if($i < sizeof($result)/5)
								{
									$creditor = $result['creditor'.$i];
									$amount = $this->account_model->currencyconverter($result['amount'.$i]);
									$futuredate = $result['futuredate'.$i];
									$prev_month = $result['prev_month'.$i];
									$total_interest = $result['total_interest'.$i];
								}
								?>
								<tr>
								
								<th scope="row"><?php echo $i; ?></th>
								<td id="creditor_<?php echo $i; ?>"><?php echo $creditor ?></td>
								<td id="balance_<?php echo $i; ?>"><?php echo $amount; ?></td>
								<td id="months_<?php echo $i; ?>"><?php echo $prev_month; ?></td>
								<td id="date_<?php echo $i; ?>"><?php echo $futuredate; ?></td>
								<td id="interest_<?php echo $i; ?>"><?php echo $total_interest; ?></td>
								
									<!--<th scope="row"><?php echo $i; ?></th>
									<td id="creditor_<?php echo $i; ?>"></td>
									<td id="balance_<?php echo $i; ?>"></td>
									<td id="months_<?php echo $i; ?>"></td>
									<td id="date_<?php echo $i; ?>"></td>
									<td id="interest_<?php echo $i; ?>"></td>-->
								</tr>
								<?php
							}
						}
						else{
							for($i = 1; $i <= 10; $i++)		
							{
								
								$creditor = '';
								$amount = '';
								$futuredate = '&nbsp;';
								$prev_month = '&nbsp;';
								$total_interest = '';
								
								$cstminterest = 00.00;
								$cstmbalance = 00.00;
								
								?>
								<tr>
								
								<th scope="row"><?php echo $i; ?></th>
								<td id="creditor_<?php echo $i; ?>"><?php echo $creditor ?></td>
								<td id="balance_<?php echo $i; ?>"><?php echo $amount; ?></td>
								<td id="months_<?php echo $i; ?>"><?php echo $prev_month; ?></td>
								<td id="date_<?php echo $i; ?>"><?php echo $futuredate; ?></td>
								<td id="interest_<?php echo $i; ?>"><?php echo $total_interest; ?></td>
								
									<!--<th scope="row"><?php echo $i; ?></th>
									<td id="creditor_<?php echo $i; ?>"></td>
									<td id="balance_<?php echo $i; ?>"></td>
									<td id="months_<?php echo $i; ?>"></td>
									<td id="date_<?php echo $i; ?>"></td>
									<td id="interest_<?php echo $i; ?>"></td>-->
								</tr>
								<?php
							}
						}
						?>
						  </tbody>
							<tfoot id="tfootDebt">
									<tr>
									<th></th>
									  <td>Total</td>
									  <td> $<span  id="balance_total"><?php echo $cstmbalance; ?></span> </td>
									  <td></td>
									  <td></td>
									  <td> $<span  id="interest_total"><?php echo $cstminterest; ?></span> </td>
									</tr>
						</tfoot>
					</table></div>
                </div>
				<?php //var_dump($this->account_model->print_temp()); ?>
<script>
// $('#datatoptable').dataTable( {
  // "pageLength": 11
// } );
//getActiveUserGoals();
</script>