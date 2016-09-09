<script type="text/javscript">


</script>

<style>
.heightdiv{
	
	height:460px;
	
}
</style>
 <div class="content contentcstm ">
		<div class="main-content ">
		
			<div class="col-md-6 col-xs-12 heightdiv">
			<!-- Trigger the modal with a button -->
			<form class="form-inline">
				<div class="form-group" style="margin-bottom:5px">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Bills</button>
				</div>
			</form>
			
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="font-size:12px">
					<thead>
						<tr>
							<th>Bill Name</th>
							<th class="">Due Date</th>
							<th>Amount Due</th>
							<th class="">Debt Status</th>
							
						</tr>
					</thead>
					<tbody id ="tablecontent">
					    <?php
						
						if($allbills != 'nobill')
						{
							foreach($allbills as $row)
							{
								?>
								<tr id="row_<?php echo $row['id']; ?>">
									<td><a  href="javascript:editbillmodal('<?php echo $row['id']; ?>');"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
									<a  href="javascript:void(0)" onclick="deletebill('<?php echo $row['id']; ?>')" ><span class="glyphicon glyphicon-remove"></span></a>&nbsp;<?php echo $row['bill_name']; ?></td>
									<td ><?php echo $row['due_date']; ?></td>
									<td><?php echo $this->account_model->currencyconverter($row['amount_due']); ?></td>
									<td ><?php 
									if($row['debt_status'] == '0')
									{
									echo 'Pending';
									}
									else{
									echo 'Paid';	
									}					
									?></td>
								</tr>
								<?php
							}
						}
							
						//	$this->account_model->getallbillPAGELOAD();
						?>
					</tbody>
				</table>


						</div>

				
                    
					<div class="col-md-6 col-xs-12">
					<h2>Weekly Bills Overview</h2>
					<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="font-size:12px">
					<thead>
						<tr>
							<th colspan="2">Date:</th>
							<td colspan="2">
							<script>
							$(document).ready(function () {
								$("#date").datepicker({
									dateFormat:'DD, d MM, yy',
									onSelect: function(dateText, inst) {
										//alert(dateText);										 
										$.ajax({
											type: "post",
											url: baseHref+"account/bill_payment_ondate_change",
											data: {
												dateText: dateText
											},
											success: function(data){
												localdata = JSON.parse(data);
												$('#weeklybills').html(localdata.billoverview.total_bills);
												$('#weeklyamountdue').html(localdata.billoverview.total_due);
												$('#UsersWeeklyBills').html(localdata.html);
											}
										});
										
									}
								});
							});
							</script>
							<div class="input-group date" id="id_datetimepicker1">
							<input type="text" name="date" id="date" style="width: 250px;" class="form-control "/>
							
							<!---<input type="hidden" name="datepickerhidden" id="datepickerhidden" />-->
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
							</span>
							</div>

							</td>
							
							
							
						</tr>
					</thead>
					<tbody>
					    <tr>
					    <th colspan="2" scope="row">Bills Due:</th>
						<td colspan="2" scope="row"><span id="weeklybills">0<span></td>
						</tr>
						
						<tr>
					    <th colspan="2" scope="row">Amount Due:</th>
						<td colspan="2" scope="row">$ <span id="weeklyamountdue">0<span></td>
						</tr>
						
						
					</tbody>
				</table>
					<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="font-size:12px">
					<thead>
						<tr>
							<th>Bill Name</th>
							<th class="hidden-xs hidden-sm">Due Date</th>
							<th>Amount Due</th>
							
						</tr>
					</thead>
					<tbody id="UsersWeeklyBills">
						
					</tbody>
				</table>


				
				
				
				 
				
                </div>
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<script>
			$(document).ready(function () {
				$("#datepicker1").datepicker({
					minDate: 0
				});
			});
			</script>
		<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Bill</h4>
			</div>
			<div class="modal-body">
			<form name = "billaddingform" id = "billaddingform" method = "post" action = "">
			<div class="form-group">
				<label for="itemname">Bill Name:</label>
				<input type="text" class="form-control" id="bill_name" name = "bill_name" >
			</div>
			<div class="form-group">
				<label for="unitprice">Due Date:</label>
				<div class="input-group date" id="id_datetimepicker1">

				<input type="text" name="datepicker1" id="datepicker1" class="form-control fillone datepicker " style="z-index: 100000;"/>
				
				<!---<input type="hidden" name="datepickerhidden" id="datepickerhidden" />-->
				<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
				</span>
				</div>
			</div>
			<div class="form-group">
				<label for="quantitystock">Amount Due:</label>
				<input type="number" class="form-control" id="amount_due" name="amount_due" value = "0" min='0'>
			</div>
			<div class="form-group">
				<label for="totalprice">Debt Status:</label>
				<select disabled class="form-control fillone" id="debt_status" name="debt_status">
				
				<option value="0" Selected >Pending</option>
				<option value="1">Paid</option>	
				</select>
			</div>
			
				<input name="submit_button" type="button" onclick="billadding();" class="btn btn-default" id="submit_button" value="Submit" />
				<!--<input type="submit" value class="btn btn-default" onclick="validate();"></input>-->
				<input type="reset" class="btn btn-default" id="configreset" value="Reset">
			</form>
			</div>
			</div>

		</div>
	</div>
  <div class="modal fade" id="updatebillpayment" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Inventory</h4>
        </div>
        <div class="modal-body">
          <form name = "billpaymentupdateform" id = "billpaymentupdateform" method = "post" action = "">
		  </form>
        </div>
      
      </div>
      
    </div>
  </div>