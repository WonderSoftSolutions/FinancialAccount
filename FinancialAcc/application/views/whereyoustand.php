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
				</ul>
				</br>
				<label for="month"><div class="label label-info" id="crtmnth"><?php echo $today; ?></div></label>
				<form id="goaladdingform"  data-toggle="validator" role="form" >
				</br>
				<div class="panel-group">
				  <div class="panel panel-default">
					<a href="#Cash" class="panel-heading" data-toggle="collapse">Cash</a>
					<div id="Cash" class="panel-collapse panel-body collapse in ">
						<div class="form-group" >
						<label for="checkingaccount">Checking Account:</label>
						<input class="form-control" type="number" id="checkingaccount" name="checkingaccount" value="0" placeholder="Checking Account" />
						</div>
						<div class="form-group">
						<label for="savingaccount">Savings Account:</label>
						<input class="form-control" type="number" id="savingaccount" name="savingaccount" value="0" placeholder="Savings Account" />
						</div>
						<div class="form-group">
						<label for="mutualfunds" >Other (Mutual Funds):</label>
						<input class="form-control" type="number" id="mutualfunds" name="mutualfunds" value="0" placeholder="Other (Mutual Funds)" />
						</div>
						<div class="form-group">
						<label for="totalcash" >Total Cash:</label>
						<span class="label label-info " id="totalcash" name="totalcash">00.00</span>
						</div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<a href="#Investment" class="panel-heading" data-toggle="collapse">Investment</a>
					<div id="Investment" class="panel-collapse panel-body collapse  ">
						
						<div class="form-group">
						<label for="securities">Securities (Bonds, Stock, Mutual Funds):</label>
						<input class="form-control" type="number" id="securities" name="securities" value="0" placeholder="Securities (Bonds, Stock, Mutual Funds)" />
						</div>
						<div class="form-group">
						<label for="otherinvestments" >Other Investments:</label>
						<input class="form-control" type="number" id="otherinvestments" name="otherinvestments" value="0" placeholder="Other Investments" />
						</div>
						<div class="form-group">
						<label for="totalinvestments" >Total Investments:</label>
						<span class="label label-info " id="totalinvestments" name="totalinvestments">00.00</span>
						</div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<a href="#Retirement" class="panel-heading" data-toggle="collapse">Retirement</a>
					<div id="Retirement" class="panel-collapse panel-body collapse  ">
						<div class="form-group" >
						<label for="retirementfunds">Retirement funds (401k, IRAs):</label>
						<input class="form-control" type="number" id="retirementfunds" name="retirementfunds" value="0" placeholder="Retirement funds (401k, IRAs)" />
						</div>
						<div class="form-group">
						<label for="totalretirement" >Total Retirement:</label>
						<span class="label label-info " id="totalretirement" name="totalretirement">00.00</span>
						</div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<a href="#Personal-Property" class="panel-heading" data-toggle="collapse">Personal Property</a>
					<div id="Personal-Property" class="panel-collapse panel-body collapse  ">
						<div class="form-group" >
						<label for="building">Building:</label>
						<input class="form-control" type="number" id="building" name="building" value="0" placeholder="Building" />
						</div>
						<div class="form-group">
						<label for="cars">Cars:</label>
						<input class="form-control" type="number" id="cars" name="cars" value="0" placeholder="Cars" />
						</div>
						<div class="form-group">
						<label for="otherproperty" >Other Property (Furnishing, Jewellery, Clothes):</label>
						<input class="form-control" type="number" id="otherproperty" name="otherproperty" value="0" placeholder="Other Property (Furnishing, Jewellery, Clothes)" />
						</div>
						<div class="form-group">
						<label for="totalproperty" >Total Property:</label>
						<span class="label label-info " id="totalproperty" name="totalproperty">00.00</span>
						</div>
					</div>
				  </div>
				  <div class="panel panel-default">
				  
					<a href="#Liabilities" class="panel-heading" data-toggle="collapse">Liabilities</a>
					<div id="Liabilities" class="panel-collapse panel-body collapse  ">
						
					<div class="panel panel-default">
						<div class="panel-heading">Investment Debt</div>
						<div class="panel-body">
							<div class="form-group" >
							<label for="mortgage">Mortgage:</label>
							<input class="form-control" type="number" id="mortgage" name="mortgage" value="0" placeholder="Mortgage" />
							</div>
							<div class="form-group">
							<label for="studentloandebt">Student Loan Debt:</label>
							<input class="form-control" type="number" id="studentloandebt" name="studentloandebt" value="0" placeholder="Student Loan Debt" />
							</div>
							<div class="form-group">
							<label for="carloans" >Car Loans:</label>
							<input class="form-control" type="number" id="carloans" name="carloans" value="0" placeholder="Car Loans" />
							</div>
							
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Personal Debt</div>
						<div class="panel-body">
							<div class="form-group" >
							<label for="creditcarddebt">Credit Card Debt:</label>
							<input class="form-control" type="number" id="creditcarddebt" name="creditcarddebt" value="0" placeholder="Credit Card Debt" />
							</div>
							<div class="form-group">
							<label for="otherliabilities">Other liabilities:</label>
							<input class="form-control" type="number" id="otherliabilities" name="otherliabilities" value="0" placeholder="Other liabilities" />
							</div>
							
						</div>
					</div>
					<br/>
					<div class="form-group">
						<label for="totalliabilities" >Total Liabilities:</label>
						<span class="label label-info " id="totalliabilities" name="totalliabilities">00.00</span>
					</div>
					</div>
				  </div><br/>
				  <button type="button" class="btn btn-default" onclick="alert(':)')">Submit</button>
				  
				</div>

					 
						</form>
		</div>
				
				
				