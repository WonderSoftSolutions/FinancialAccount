
 <div class="content">
		<div class="main-content">
			<div class="col-md-3 col-xs-12">
				<form id="goaladdingform"  data-toggle="validator" role="form">
					<div class="form-group">
						<label for="id_goal">GOAL:</label>
						<input type="hidden" name="usergoalid" value = "<?php echo $usergoalid; ?>" id= "usergoalid"/>
					<?php
						//var_dump($usergoal);
						$goaldetails = $this->account_model->getgoalDetails($usergoal['goal_id']);
						?>
							<input type="text"  class="form-control fillone" id="id_goal" name="id_goal" value="<?php echo $goaldetails['name']; ?>" >
						</div>
						<?php
						$selectedgoalid = $usergoal['goal_id'];
						$selectedtermid = $usergoal['term_id'];
					?>
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
								if($term['id'] == $selectedtermid){
								?>
									<option selected value="<?php echo $term['id']; ?>"><?php echo $term['name']; ?></option>
								<?php
								}else{
								?>
									<option value="<?php echo $term['id']; ?>"><?php echo $term['name']; ?></option>
								<?php
								}
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
					  <input type="number" class="form-control fillone" id="id_cost" name="id_cost" value='<?php echo $usergoal['cost']; ?>'>
					</div>

					<div class="form-group">
						<label for="id_datetimepicker1">Target Date:</label>
						<div class="input-group date" id="id_datetimepicker1">
						
							<input type="text" id="datepicker" name="datepicker" value="<?php echo $usergoal['target_date']; ?>" class="form-control fillone">
							<!--<input type="hidden" name="datepickerhidden" id="datepickerhidden" value="<?php echo $usergoal['target_date']; ?>"  />-->
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
						
					<div class="form-group">
					  <label for="id_currentsaved">Currently Saved:</label>
					  <input type="number" class="form-control fillone" id="id_currentsaved" name="id_currentsaved" value='<?php echo $usergoal['currently_saved']; ?>' >
					</div>
      
					<div class="form-group">
					  <label for="id_monthtarget">Monthly Target:</label>
					  <input type="text" readonly class="form-control fillone" id="id_monthtarget" name="id_monthtarget" value="<?php echo $usergoal['monthly_target']; ?>" >
					</div>

  
 
						  <button type="button" class="btn btn-default" onclick="goalediting()">Update Goal</button>
						  <button type="button" class="btn btn-default" onclick="canceleditgoal()">Cancel</button>
						</form>


						</div>

                    <div class="col-md-1">&nbsp;</div>
					<div class="col-md-8 col-xs-12">
					<div class="row">
						<div class="col-md-8 col-xs-8 col-sm-8 col-md-offset-4 col-xs-offset-3 col-sm-offset-4 ">
							<h3>Overall Progress: <span class="label label-primary"><?php  
							$userid = $this->session->userdata('usr_id');		
							echo $this->account_model->getoverallprogress($userid); ?> %</span></h3>
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
					<tbody>
						<?php
							$this->account_model->getAllgoals('1'); //active goals
						?>
					</tbody>
				</table>


				
				
				
				 
				
                </div>



 
