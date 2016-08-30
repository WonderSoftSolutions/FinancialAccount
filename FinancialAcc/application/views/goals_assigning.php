
 <div class="content">
		<div class="main-content">
			<div class="col-md-3 col-xs-12">
				<form id="goaladdingform"  data-toggle="validator" role="form">
					<div class="form-group">
						<label for="id_goal">GOAL:</label>
						<input type="text" class="form-control fillone" id="id_goal" name="id_goal" >
					</div>
					<!--<div class="form-group">
						<label for="sel1">GOAL:</label>
						
						<?php
						// $goalslist = $this->account_model->getactiveGoals(1); 
						
						// if($goalslist != 'nogoal')
						// {
						?>
						<select class="form-control fillone" id="id_goal">
						<option value="0" selected >Select Goal</option>
						<?php
							// foreach($goalslist as $goal)
							// {
								?>
									<option value="<?php //echo $goal['id']; ?>"><?php //echo $goal['name']; ?></option>
								<?php
							// }
						// }
						// else
						// {
							?><select class="form-control fillone" id="id_goal" disabled>
							
								<option value="0" selected >No Goals</option>
							<?php
						// }
						?>
						</select>
					</div>-->

					<div class="form-group">
						<label for="sel1">Term:</label>
						
						<?php $termslist = $this->account_model->getactiveTerms(1); 
						
						if($termslist != 'noterm')
						{
						?>
						<select class="form-control fillone" id="id_term" name="id_term">
						<option value="0" selected >Select Term</option>
						<?php
							foreach($termslist as $term)
							{
								?>
									<option value="<?php echo $term['id']; ?>"><?php echo $term['name']; ?></option>
								<?php
							}
						}
						else
						{
							?><select class="form-control fillone" id="id_term" name="id_term" disabled>
							
								<option value="0" selected >No Terms</option>
							<?php
						}
						?>
						</select>
					</div>

				

					<div class="form-group">
					  <label for="id_cost">Cost:</label>
					  <input type="number" class="form-control fillone" id="id_cost" name="id_cost" value='0'>
					</div>

					<div class="form-group">
						<label for="id_datetimepicker1">Target Date:</label>
						<div class="input-group date" id="id_datetimepicker1">

						<input type="text" name="datepicker" id="datepicker" class="form-control fillone "/>
						
						<!---<input type="hidden" name="datepickerhidden" id="datepickerhidden" />-->

							
							
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
						
					<div class="form-group">
					  <label for="id_currentsaved">Currently Saved:</label>
					  <input type="number" class="form-control fillone" id="id_currentsaved" name="id_currentsaved" value='0' >
					</div>
      
					<div class="form-group">
					  <label for="id_monthtarget">Monthly Target:</label>
					  <input type="text" readonly class="form-control fillone" id="id_monthtarget" name="id_monthtarget">
					</div>

  
 
						  <button type="button" class="btn btn-default" onclick="goaladding()">Add Goal</button>
						  <button type="button" class="btn btn-default" onclick="canceladdgoal()">Cancel</button>
						</form>


						</div>

                    <div class="col-md-1">&nbsp;</div>
					<div class="col-md-8 col-xs-12">
					<div class="row">
						<div class="col-md-8 col-xs-8 col-sm-8 col-md-offset-4 col-xs-offset-3 col-sm-offset-4 ">
						 <h3>Overall Progress: <span class="label label-primary"><?php 
						 $userid = $this->session->userdata('usr_id');		
						 
						 echo $this->account_model->getoverallprogress($userid); ?> %</span></h3>
						<!--<h3>Heading 1<span class="badge">badge</span> </h3>
							<h4 class="col-md-4" style = "background-color: #5bc0de;" >Over All Progress: <?php echo $this->account_model->getoverallprogress(); ?></h4>-->
						</div>
					</div>
					<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="font-size:12px">
					<thead>
						<tr>
							<th>Goal</th>
							<th class="hidden-xs hidden-sm">Term</th>
							<th>Cost</th>
							<th class="hidden-xs hidden-sm">Monthly Target</th>
							<th>Currently Saved</th>
							<th class="hidden-xs hidden-sm">Target Date</th>
						</tr>
					</thead>
					<tbody id="UsersGoals">
						<?php
							$this->account_model->getAllgoals('1'); //active goals
						?>
					</tbody>
				</table>


				
				
				
				 
				
                </div>
<script>
//getActiveUserGoals();
</script>