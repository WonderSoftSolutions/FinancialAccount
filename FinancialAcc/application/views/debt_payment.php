<script type="text/javascript">
$(document).ready(function () {
$('#selectYear').change(function(){
    $('#selectYear').attr('disabled', 'disabled');
});
$('#sel1').change(function(){
    $('#sel1').attr('disabled', 'disabled');
});
$('#selectYear').blur(function(){
    $('#selectYear').attr('disabled', 'disabled');
});
$('#sel1').blur(function(){
    $('#sel1').attr('disabled', 'disabled');
});

});

</script>
 <div class="content contentcstm">
		<div class="main-content">
				<div class="col-md-12">
				<div class="table-responsive">
				<div class="col-md-12">
	
					<div class="col-md-2 col-md-offset-6" style="font-size: 22px;">
						Current Date :
					</div>
					
					<div class="col-md-4">
					
					
					<select id="selectYear" name = "selectYear" style="width:52%;" class="form-control selectWidth pull-right" >
                    
					<?php
					for($i = 2000; $i < date("Y")+84; $i++){
						if(substr($i,2,2) == substr(date("Y"),2,2)){
							echo '<option selected value="'. substr($i,2,2).'">'.$i.'</option>';
						}
						else
						{
							echo '<option value="'. substr($i,2,2).'">'.$i.'</option>';
						}
					}
					?>      
					</select>
					
					<select class=" form-control " id="sel1" style="width:47%;" >
					  
					  <?php
						//$today = substr(date("F"),0,3);
						for ($m=1; $m<=12; $m++) {
							$month = date('F', mktime(0,0,0,$m, 1, date('Y')));
							$printmonth = substr($month,0,3);
							if(date("n") == $m ){
						?>
						 <option selected value="<?php echo $m; ?>"><?php echo $printmonth; ?></option>
						 <?php
						 }
						 else {?>
						 <option value="<?php echo $m; ?>"><?php echo $printmonth; ?></option>
						 <?php
						 }
						}?> 
						
					</select>
					<br/>	
					</div>
				</div>
					<table class="table table-striped  table-bordered ">
					<thead>
						<tr>
						  <th>#</th>
						  <th>Creditor</th>
						  <th>Balance($)</th>
						  <th>Rate(%)</th>
						   <th>Payment($)</th>
						   
						</tr>
					  </thead>
					  <tfoot >
						<tr >
						<th></th>
						  <td>Total</td>
						  <td><input type="text" disabled data-id = "1" name="totalbalance"  class="form-control" id="totalbalance"  value= "0"></td>
						  <td></td>
						  <td><input type="text" disabled data-id = "1" name="totalpayment"  class="form-control" id="totalpayment"  value= "0"></td>
						</tr>
					  </tfoot>
					  <tbody>
							<!--<tr>
							  <th scope="row">1</th>
							  <td><input type="text"  name="creditor" class="form-control " data-id="1"  id="creditor1" value= "Car Payment"></td>
							  <td><input type="number" min="0" name="balance"  data-id="1"  class="form-control balance" id="balance1"  value="0"></td>
							  <td><input type="text" name="rate"     class="form-control " data-id="1"  id="rate1"     value= "4.99"></td>
							  <td><input type="number" min="0" name="payment" data-id="1" class="form-control payment" id="payment1"  value="0"></td>
							</tr>
							<tr>
							  <th scope="row">2</th>
							  <td><input type="text" name="creditor" class="form-control" data-id="2"  id="creditor2" value= "Student Loan"></td>
							  <td><input type="number" min="0" name="balance"  class="form-control balance" data-id="2"  id="balance2"  value= "0"></td>
							  <td><input type="text" name="rate"     class="form-control" id="rate2"  data-id="2"    value= "3.99"></td>
							  <td><input type="number" min="0" name="payment"  class="form-control payment" id="payment2"  data-id="2"  value= "0"></td>
							</tr>
							<tr>
							  <th scope="row">3</th>
							  <td><input type="text" name="creditor" class="form-control" id="creditor3"  data-id="3" value= "Personal Loan"></td>
							  <td><input type="number" min="0" name="balance"  class="form-control balance" id="balance3"  data-id="3"  value= "0"></td>
							  <td><input type="text" name="rate"     class="form-control" id="rate3"  data-id="3"     value= "13.99"></td>
							  <td><input type="number" min="0" name="payment"  class="form-control payment" id="payment3"  data-id="3"  value= "0"></td>
							</tr>
							<tr>
							  <th scope="row">4</th>
							  <td><input type="text" name="creditor" class="form-control" id="creditor4"  data-id="4" value= "Credit Cards"></td>
							  <td><input type="number" min="0" name="balance"  class="form-control balance" id="balance4"  data-id="4"   value= "0"></td>
							  <td><input type="text" name="rate"     class="form-control" id="rate4"  data-id="4"      value= "18.99"></td>
							  <td><input type="number" min="0" name="payment"  class="form-control payment" id="payment4"  data-id="4"   value= "0"></td>
							
							</tr>-->
							<?php
							for($i = 1; $i <= 10; $i++)		
							{
								?>
								<tr>
								<th scope="row"><?php echo $i; ?></th>
								<td><input type="text" name="creditor" class="form-control" id="creditor<?php echo $i; ?>"  data-id="<?php echo $i; ?>"  value= ""></td>
								<td><input type="number" min="0" name="balance"  class="form-control balance" id="balance<?php echo $i; ?>"  data-id="<?php echo $i; ?>"  value= "0"></td>
								<td><input type="text" name="rate"     class="form-control" id="rate<?php echo $i; ?>"  data-id="<?php echo $i; ?>"     value= "0"></td>
								<td><input type="number" min="0" name="payment"  class="form-control payment" id="payment<?php echo $i; ?>"  data-id="<?php echo $i; ?>"  value= "0"></td>
								</tr>
								<?php
							}
							?>
						  </tbody>
					</table></div>
					
					<div class="col-md-12">
					<div class="col-md-6">
					<div class="form-group">
					<label for="monthlypayment">Monthly Payment($):<span class="" style="font-size:12px; color:red;" >(Enter monthly payment)</span></label>
					<input type="text" class="form-control" name="monthlypayment" id="monthlypayment" placeholder= "5000">
				  </div>
				  </div>
				  <div class="col-md-6">
				  <div class="form-group">
					<label for="mininumpayment">Mininum Payment($):</label>
					<input type="text" disabled class="form-control" id="mininumpayment" name="mininumpayment" value= "0">
				  </div>
				  </div>
				  <div class="col-md-5">
                 <div class="form-group">
				 <label for="pwd">Select Strategy:</label>
					<select class="selectpicker form-control">
					  <option> Snowball (Lowest Balance)</option>
					  <option> Avalanche (Highest Interest)</option>
					  <option> No snowball</option>
					</select></div>
                       </div>
					   
					  <div class="table-responsive"> 
					<table class="table table-striped table-bordered table-responsive">
						  <thead>
							<tr>
							  <th>#</th>
							  <th>Creditor</th>
							  <th>Balance</th>
							  <th>Months to Clear Debt</th>
							  <th>Month Debt is Cleared</th>
							  <th>Total Interest Paid</th>
								
							</tr>
						  </thead>
						  <tfoot>
							<tr>
							<th></th>
							  <td>Total</td>
							  <td> $<span  id="balance_total">00.00</span> </td>
							  <td></td>
							  <td></td>
							  <td> </td>
							</tr>
						  </tfoot>
						  <tbody>
						  <!--
							<tr>
							  <th scope="row">1</th>
							  <td>Personal Loan</td>
							  <td> $8,000.00 </td>
							  <td>3</td>
							  <td>August/2016</td>
							  <td> $160.19 </td>
							</tr>
							<tr>
							  <th scope="row">2</th>
							  <td>Credit Cards</td>
							  <td> $15,762.00 </td>
							  <td>7</td>
							  <td>December/2016</td>
							  <td>  $1,207.15  </td>
							</tr>
							<tr>
							  <th scope="row">3</th>
							  <td>Student Loan</td>
							  <td> $22,000.00 </td>
							  <td>11</td>
							  <td>April/2017</td>
							  <td> $591.11 </td>
							</tr>
							<tr>
							  <th scope="row">4</th>
							  <td>Car Payment</td>
							  <td> $27,141.00 </td>
							  <td>16</td>
							  <td>September/2017</td>
							  <td> $1,395.41 </td>
							</tr>-->
							<?php
							for($i = 1; $i <= 10; $i++)		
							{
								?>
								<tr>
									<th scope="row"><?php echo $i; ?></th>
									<td id="creditor_<?php echo $i; ?>"></td>
									<td id="balance_<?php echo $i; ?>"></td>
									<td id="months_<?php echo $i; ?>"></td>
									<td id="date_<?php echo $i; ?>"></td>
									<td id="interest_<?php echo $i; ?>"></td>
								</tr>
								<?php
							}
							?>
						  </tbody>
					</table></div>
                </div>
<script>
//getActiveUserGoals();
</script>