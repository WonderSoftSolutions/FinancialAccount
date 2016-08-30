<div class="content contentcstm" >
		<div class="main-content">
			<div class="col-md-12">
	
				<ul class="nav nav-tabs" role="tablist" >
				  <?php 
				  $today = substr(date("F"),0,3);
					for ($m=1; $m<=12; $m++) {
						$month = date('F', mktime(0,0,0,$m, 1, date('Y')));
						$printmonth = substr($month,0,3);
						
					 
					if($printmonth == $today){
					?>
						<li role="presentation"  class="active"><a href="javascipt:void(0)" onclick="showactiveTabs('<?php echo $today; ?>')"  aria-controls="home" role="tab" data-toggle="tab"><?php echo $printmonth; ?></a></li>
					<?php	 
					}
					else{
					?>
						<li role="presentation"><a href="javascipt:void(0)" onclick="showactiveTabs('<?php echo $printmonth; ?>')" aria-controls="profile"  role="tab" data-toggle="tab"><?php echo $printmonth; ?></a></li> 
					<?php
					}
					}
					?>
				</ul><br>
               <label for="month"><div class="label label-info" id="crtmnth"><?php echo $today; ?></div></label>
				<form id="goaladdingform"  data-toggle="validator" role="form" >
				</br>
				<div class="panel-group">
				<div class="panel panel-default">
					<a style="text-decoration:none" href="#budget" class="panel-heading" data-toggle="collapse">Budget</a>
					
					<div id="budget" class="panel-collapse panel-body collapse in ">
					
						<div class="form-group" >
						<label for="Totalincometxt">Total income:</label>
						<input class="form-control" type="number" id="Totalincometxt"  disabled name="Totalincometxt" value="0" placeholder="Checking Account" />
						</div>
						<div class="form-group">
						<label for="TotalExpensestxt">Total Expenses:</label>
						<input class="form-control" type="number" id="TotalExpensestxt"  disabled name="TotalExpensestxt" value="0" placeholder="Savings Account" />
						</div>
						<div class="form-group">
						<label for="LeftOverMoney" >Left Over Money:</label>
						<input class="form-control" type="number" id="LeftOverMoney" disabled name="LeftOverMoney" value="0" placeholder="Other" />
						</div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<a style="text-decoration:none" href="#revenue" class="panel-heading" data-toggle="collapse">REVENUE</a>
					
					<div id="revenue" class="panel-collapse panel-body collapse ">
					<h3 style="font-weight:bold">Income</h3>
						<div class="form-group" >
						<label for="wife">Wife:</label>
						<input class="form-control" type="number" id="wife" name="wife" value="0" placeholder="Checking Account" />
						</div>
						<div class="form-group">
						<label for="husband">Husband:</label>
						<input class="form-control" type="number" id="husband" name="husband" value="0" placeholder="Savings Account" />
						</div>
						<div class="form-group">
						<label for="bonuses" >Bonuses:</label>
						<input class="form-control" type="number" id="bonuses" name="bonuses" value="0" placeholder="Other" />
						</div>
						<div class="form-group">
						<label for="divide" >Dividend/Interest:</label>
						<input class="form-control" type="number" id="divide" name="divide" value="0" placeholder="Other" />
						</div>
						<div class="form-group">
						<label for="other" >Other:</label>
						<input class="form-control" type="number" id="other" name="other" value="0" placeholder="Other" />
						</div>
						<div class="form-group">
						<label for="totalincome" >Total Income:</label>
						<span class="label label-info " id="totalincome" name="totalincome">00.00</span>
						</div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<a href="#Investment" class="panel-heading" data-toggle="collapse">EXPENSES</a>
					<div id="Investment" class="panel-collapse panel-body collapse  ">
						<h3 style="font-weight:bold">Savings</h3>
						<div class="form-group">
						<label for="retirement">Retirement:</label>
						<input class="form-control retirementExp" type="number" id="retirement" name="retirement" value="0" placeholder="Securities (Bonds, Stock, Mutual Funds)" />
						</div>
						<h3 style="font-weight:bold">Home</h3>
						<div class="form-group">
						<label for="rent" >Mortgage or Rent:</label>
						<input class="form-control retirementExp" type="number" id="rent" name="rent" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="homerepairs" >Home Repairs/Maintenance:</label>
						<input class="form-control retirementExp" type="number" id="homerepairs" name="homerepairs" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="homeinsurance" >Home Insurance:</label>
						<input class="form-control retirementExp" type="number" id="homeinsurance" name="homeinsurance" value="0" placeholder="Other Investments" />
						</div>
						<h3 style="font-weight:bold">Utilities</h3>
						<div class="form-group">
						<label for="garbage" >Garbage/Trash Service:</label>
						<input class="form-control retirementExp" type="number" id="garbage" name="garbage" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="electricity" >Electricity:</label>
						<input class="form-control retirementExp" type="number" id="electricity" name="electricity" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="water" >Water/Sewer:</label>
						<input class="form-control retirementExp" type="number" id="water" name="water" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="gas" >Gas:</label>
						<input class="form-control retirementExp" type="number" id="gas" name="gas" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="internet" >Internet:</label>
						<input class="form-control retirementExp" type="number" id="internet" name="internet" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="telephones" >Telephones (land-lines and cell phones):</label>
						<input class="form-control retirementExp" type="number" id="telephones" name="telephones" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="cable" >Cable/TV:</label>
						<input class="form-control retirementExp" type="number" id="cable" name="cable" value="0" placeholder="Other Investments" />
						</div>
						<h3 style="font-weight:bold">Transportation</h3>
						<div class="form-group">
						<label for="parking" >Gas/Public Transportation/ Parking:</label>
						<input class="form-control retirementExp" type="number" id="parking" name="parking" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="carpayment" >Car Payment:</label>
						<input class="form-control retirementExp" type="number" id="carpayment" name="carpayment" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="license" >License Plates/Registration Fees:</label>
						<input class="form-control retirementExp" type="number" id="license" name="license" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="repairs" >Car Repairs and Maintenance:</label>
						<input class="form-control retirementExp" type="number" id="repairs" name="repairs" value="0" placeholder="Other Investments" />
						</div>
						<h3 style="font-weight:bold">Personal Care</h3>
						<div class="form-group">
						<label for="insurance" >Insurance (Life, Disability, Health):</label>
						<input class="form-control retirementExp" type="number" id="insurance" name="insurance" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="charitable" >Charitable/Donation/Gifts:</label>
						<input class="form-control retirementExp" type="number" id="charitable" name="charitable" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="childcare" >Child Care/Tuition:</label>
						<input class="form-control retirementExp" type="number" id="childcare" name="childcare" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="clothing" >Clothing:</label>
						<input class="form-control retirementExp" type="number" id="clothing" name="clothing" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="entertainment" >Entertainment (Movies, Restaurant,  trips, Magazines & Newspapers, etc.:</label>
						<input class="form-control retirementExp" type="number" id="entertainment" name="entertainment" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="groceries" >Groceries:</label>
						<input class="form-control retirementExp" type="number" id="groceries" name="groceries" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="medical" >Medical:</label>
						<input class="form-control retirementExp" type="number" id="medical" name="medical" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="personal" >Personal (Barber, beauty shop):</label>
						<input class="form-control retirementExp" type="number" id="personal" name="personal" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="drycleaning" >Dry Cleaning:</label>
						<input class="form-control retirementExp" type="number" id="drycleaning" name="drycleaning" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="totalexpenses" >Total Expenses:</label>
						<span class="label label-info " id="totalexpenses" name="totalexpenses">00.00</span>
						</div>
					</div>
				  </div>
				  <br/>
				  <button type="button" class="btn btn-default" onclick="alert(':)')">Submit</button>
				  
				</div>

					 
						</form>
		</div>
				
				
				