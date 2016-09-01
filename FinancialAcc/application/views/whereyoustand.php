<script>
function yearselect(sad){

	if(sad != 'NAN'){
		window.location.href = baseHref+"Pages/whereyoustand/"+sad;
		// if(<?php echo substr(date("Y"),2,2); ?> == sad)
		// {
			// location.reload();
		// }else{
			// //$('.years').html(sad);		
			// getWhereAreYouGoing(sad);
		// }
	}
	else{
		// var date = new Date();
		// var n =  date.getMonth() + 1;
		// $('#selectYear').val(n);
		alert("Please select year");
	}
};

function getWhereAreYouGoing(year)
{
	showloader();
	$.ajax({
		type: "post",
		url: baseHref+"account/getWhereAreYouGoing",
		data: {
			year: year
		},
		success: function(data){
			$('#tablecontent').html(data);
			hideloader();
		}
	});		
}
// var currentTime = new Date();
// year1 =  "FY" + currentTime.getFullYear();
// year1 = year1.substring(4, 6);
// getWhereAreYouGoing(year1);
</script>
<div class="content contentcstm" >
		<div class="main-content">
			<div class="col-md-12">
				<br>
				
				<div class="form-group col-md-12 col-xs-8 col-sm-8">
				<select id="selectYear" name = "selectYear" style="width:auto;" class="form-control selectWidth" onchange="yearselect(this.value)" >
                    
				<?php
				for($i = 2000; $i < date("Y")+84; $i++){
					//if(substr($i,2,2) == substr(date("Y"),2,2)){
					if(substr($i,2,2) == $contryear){
						echo '<option selected value="'. substr($i,2,2).'">'.$i.'</option>';
					}
					else
					{
						echo '<option value="'. substr($i,2,2).'">'.$i.'</option>';
					}
				}
				?>      
                </select>
				</div>
				<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="font-size:12px">
					<thead>
					<tr>
							<th>Month</th>
							<!--<th>Jan <span class="years"><?php echo substr(date("Y"),2,2); ?></span></th>-->
							<th>Jan</th>
							<th>Feb</th>
							<th>Mar</th>
							<th>Apr</th>
							<th>May</th>
							<th>Jun</th>
							<th>Jul</th>
							<th>Aug</th>
							<th>Sep</th>
							<th>Oct</th>
							<th>Nov</th>
							<th>Dec</th>
						</tr>
					</thead>
					
					
						<tbody id="tablecontent">
						<?php
							//$contryear
							$param['year'] = $contryear;//substr(date("Y"),2,2);
							$param['user_id'] = $this->session->userdata('usr_id');
							//print_r($param); die();
							$this->include_model->getWhereAreYouStand($param);
						?>
						</tbody>
						
				</table><br>
               
			
		</div>
				
				
				