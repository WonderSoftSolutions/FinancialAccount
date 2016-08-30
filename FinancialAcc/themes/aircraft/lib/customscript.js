//var baseHref = "http://localhost/CodeIgniter/FinancialAcc/";
var baseHref = document.getElementsByTagName('base')[0].href;

function changepassword()
{
	$("#resultChangepassword").html("");
	var currentpassword = $("#currentpassword").val();
	var npassword = $("#npassword").val();
	var cpassword = $("#cpassword").val();
	var error = false;
	if(currentpassword == ''){
		$("#resultChangepassword").html("<span class='label label-danger' >please enter current password.</span>");
		$("#currentpassword").focus();
		error = true;
		return false;
	}
	if(npassword == ''){
		$("#resultChangepassword").html("<span class='label label-danger' >please enter New Password.</span>");
		$("#npassword").focus();
		error = true;
		return false;
	}
	if(cpassword == ''){
		$("#resultChangepassword").html("<span class='label label-danger' >please enter confirm password.</span>");
		$("#cpassword").focus();
		error = true;
		return false;
	}
	if(npassword != cpassword){
		$("#resultChangepassword").html("<span class='label label-danger' >confirm password not matched with new password.</span>");
		$("#cpassword").focus();
		error = true;
		return false;
	}
	if(error == false)
	{
		showloader();
		$.post(baseHref+'account/changepassword', { currentpassword: currentpassword,npassword: npassword,cpassword: cpassword },  
			function(result){ 
				hideloader();
				$('#resultChangepassword').html(result);  
				$('#currentpassword').val('');
				$('#npassword').val('');
				$('#cpassword').val('');
				setTimeout(function() { $('#resultChangepassword').html(''); },3000);
			}
		); 
		return false;
		//ajax call
	}
}

function recoverAccount()
{
	$("#resultRecover").text("");
	var mail = $('#recoverEmail').val();
	var mailvalid = validate(mail);
	if(mailvalid == 1)
	{
		$.post(baseHref+'account/check_email', { email: mail },  
			function(result){ 
				if(result == 'true'){  
					
					//$('#resultRecover').html("<span class='label label-success' >Email is Available. </span>");  
					$.post(baseHref+'account/recover', { email: mail },  
						function(result){ 
							$('#resultRecover').html(result);  
							$('#recoverEmail').val('');
							setTimeout(function() { $('#resultRecover').html(''); },3000);
						}
					); 
					
					
				}else{  
					$('#resultRecover').html("<span class='label label-danger' >Email is not registered with us. </span>");  
				}  
		}); 
	}
	else{
		$('#resultRecover').html("<span class='label label-info' >Please enter valid Email. </span>");  
	}
}
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validate(mail) {
	var email = mail;
	if (validateEmail(email)) {
		return '1'; //Valid
	} else {
		return '0'; // not valid 
	}
}

/********Sweet Alert ************/
var btnColor = new Array();
btnColor['info'] = '#AEDEF4';
btnColor['error'] = 'red';
btnColor['success'] = 'green';
btnColor['warning'] = 'orange';

  
/**
* User Adding his own goal for future tracking
* exp - want to buy a car cost of $45000.
**/

function validategoal(type,id_goal,id_term,id_cost,id_monthtarget,id_currentsaved,id_datetimepicker1)
{
	var error = "true";
	var goal = id_goal;
	var term = id_term;
	var cost = id_cost;
	var month = id_monthtarget; 
	var id_datetimepicker1 = id_datetimepicker1; 
	var currentsaved = id_currentsaved;
	if(type == 'edit')
	{		
		if((goal == null) || (goal == ''))
		{
			swtalertwarningmsg('Goal is Empty',"Please insert the Goal first");
			error = "false";
			return error;
		}
	}
	if(type == 'insert')
	{
		if((goal == null) || (goal == ''))
		{
			swtalertwarningmsg('Goal is Empty',"Please insert the Goal first");
			error = "false";
			return error;
		}	
	}
	if(term == 0)
	{
		swtalertwarningmsg('Term is Empty',"Please insert the Valid Term");
		error = "false";
		return error;
	}
	if((cost == '') || (cost == 0))
	{
		swtalertwarningmsg('Cost is Empty',"Please insert the Valid Cost");
		error = "false";
		return error;
	}
	if((id_datetimepicker1 == null) || (id_datetimepicker1 == ''))
	{
		swtalertwarningmsg('Target Date is Empty',"Please insert the Target Date first");
		error = "false";
		return error;
	}
	if((month == null) || (month == ''))
	{
		// swtalertwarningmsg('Target Date is Empty',"Please insert the Target Date first");
		// error = "false";
		// return error;
	}
	if((currentsaved == '') || (currentsaved == 0))
	{
		swtalertwarningmsg('Currently Saved is Empty',"Please insert the Valid Currently Saved");
		error = "false";
		return error;
	}
	
	

}

function swtalertwarningmsg(ttl,txt)
{
	swal({
			title: ttl, 
			text: txt, 
			type: "warning",
			showCancelButton: false,
			closeOnConfirm: true,
			//confirmButtonText: "Yes, add it!",
			//confirmButtonColor: btnColor['info'] 
		});
}

function goaladding() { 
var id_goal= $("#id_goal").val();
var id_term= $("#id_term").val();
var id_cost= $("#id_cost").val();
var id_monthtarget= $("#id_monthtarget").val();
var id_currentsaved= $("#id_currentsaved").val();
var id_datetimepicker1= $("#datepicker").val();
//alert(id_datetimepicker1);
if(validategoal('insert',id_goal,id_term,id_cost,id_monthtarget,id_currentsaved,id_datetimepicker1) == "false") 
{
	return false;
}

	swal({
			title: "Are you sure?", 
			text: "Are you sure that you want to add this goal?", 
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: false,
			confirmButtonText: "Yes, add it!",
			confirmButtonColor: btnColor['info'] 
		}, function(){
			$.ajax(
				{
					type: "post",
					url: baseHref+"account/goaladdingbyuser",
					data: {
						id_goal: $("#id_goal").val(),
						id_term: $("#id_term").val(),
						id_cost: $("#id_cost").val(),
						id_monthtarget: $("#id_monthtarget").val(),
						id_currentsaved: $("#id_currentsaved").val(),
						id_datetimepicker1: $("#datepicker").val()
					},
					success: function(data){
						//getActiveUserGoals();
						if(data != '0' && data != 'alreadyexists')
						{
							swal({
								title: "Goal Added", 
								text: "Would you like to add more goal?", 
								type: "success",
								showCancelButton: true,
								closeOnConfirm: false,
								closeOnCancel: false,
								confirmButtonText: "Yes",
								confirmButtonColor: btnColor['info'] 
							 }, function(isConfirm) {
									if (isConfirm) {
									$('#goaladdingform')[0].reset();
									location.reload();
								} else {
									location.reload();
								}
							});
							 
							 //function() { 
								// //alert('asdsad'); 
								// $('#goaladdingform')[0].reset();
								// location.reload();
							// });
							
						}
						else if(data == 'alreadyexists'){
							swtalertwarningmsg('Goal Exists','This goal already exists in your goals list');
						}
						//swal("Success!", "Your goal ("+data+") is successfully added! \n would you like to add more goal.", "success");
					}
				}
			)
		  .done(function(data) {
			//swal("Success!", "Your goal is successfully added!", "success");
		  })
		  .error(function(data) {
			swal("Oops", "We couldn't connect to the server!", "error");
		  });
		}
	)
};

function canceladdgoal() {
swal({
			title: "Are you sure?", 
			text: "Are you sure that you want to Cancel this goal?", 
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: true,
			confirmButtonText: "Yes, Cancel it!",
			confirmButtonColor: btnColor['info'] 
		}, function(){
			$('#goaladdingform')[0].reset();
		}		

)
}

function canceleditgoal() {
	swal({
			title: "Are you sure?", 
			text: "Are you sure that you want to Cancel this goal?", 
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: false,
			confirmButtonText: "Yes, Cancel it!",
			confirmButtonColor: btnColor['info'] 
		}, function(){
			window.location.href= baseHref+"Pages/AddNewGoal";
		}		
	)
}


function goalediting() { 

var usergoalid = $("#usergoalid").val();
var id_goal= $("#id_goal").val();
var id_term= $("#id_term").val();
var id_cost= $("#id_cost").val();
var id_monthtarget= $("#id_monthtarget").val();
var id_currentsaved= $("#id_currentsaved").val();
var id_datetimepicker1= $("#datepicker").val();

if(validategoal('edit',id_goal,id_term,id_cost,id_monthtarget,id_currentsaved,id_datetimepicker1)== "false")
{
	return false;
}
swal({
			title: "Are you sure?", 
			text: "Are you sure that you want to Edit this goal?", 
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: false,
			confirmButtonText: "Yes, Edit it!",
			confirmButtonColor: btnColor['info'] 
		}, function(){
			$.ajax(
				{
					type: "post",
					url: baseHref+"account/goaleditingbyuser",
					//data: "action=goaladding&orderid=1",
					data: {
						usergoalid: $("#usergoalid").val(),
						id_goal: $("#id_goal").val(),
						id_term: $("#id_term").val(),
						id_cost: $("#id_cost").val(),
						id_monthtarget: $("#id_monthtarget").val(),
						id_currentsaved: $("#id_currentsaved").val(),
						id_datetimepicker1: $("#datepicker").val()
					},
					success: function(data){
					//alert(data);
						//alert(data);
						//getActiveUserGoals();
						if(data != '0' && data != 'alreadyexists')
						{
							swal({
								title: "Goal Updated", 
								//text: "Would you like to add more goal?", 
								type: "success",
								showCancelButton: false,
								closeOnConfirm: true,
								confirmButtonText: "Ok",
								confirmButtonColor: btnColor['success'] 
							}, function() { 
								//alert('asdsad'); 
								$('#goaladdingform')[0].reset();
								location.reload();
							});
						}
						else if(data == 'alreadyexists'){
							swtalertwarningmsg('Goal Exists','This goal already exists in your goals list');
						}
						else if(data == '0'){
							swtalertwarningmsg('Goal Updated','Goal successfully updated');
							setTimeout(function(){ location.reload(); }, 1000);
						}
						

						//swal("Success!", "Your goal ("+data+") is successfully added! \n would you like to add more goal.", "success");
					}
				}
			)
		  .done(function(data) {
			//swal("Success!", "Your goal is successfully added!", "success");
		  })
		  .error(function(data) {
			swal("Oops", "We couldn't connect to the server!", "error");
		  });
		}
	)	
};

function getActiveUserGoals(){
	
	$.ajax({
		type: "post",
		url: baseHref+"account/getAllgoals",
		data: "status=1",
		success: function(data){
			$('#UsersGoals').html(data);
			console.log(data);
		}
	});	
};

function deleteGoal(id)
{
	swal({
			title: "Are you sure?", 
			text: "Are you sure that you want to Delete this goal?", 
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: false,
			confirmButtonText: "Yes, Delete it!",
			confirmButtonColor: btnColor['info'] 
		}, function(){
	$.ajax({
		type: "post",
		url: baseHref+"account/usergoalManagement",
		data: {
			action: 'deactive',
			id: id
		},
		success: function(data){
			if(data == id)
			{
				//$('#row_'+id).remove();
				window.location.href= baseHref+"Pages/AddNewGoal";
				//location.reload();
			}
			//console.log(data);
		}
	});	
	}
)}
	
$(document).ready(function () {
//Goal Adding jquery calculations//
	$("#datepicker").datepicker({
		minDate: 0,
		onChange: function(dateText, inst) {
			var cost = $("#id_cost").val();
			var saved = $("#id_currentsaved").val();
			var targetdate = $("#datepicker").val();
			monthlytargetCalc(cost,saved,date);
		}
	});
	//GOAL
	$("#id_cost").focusout(function(){
		var cost = $("#id_cost").val();
		var saved = $("#id_currentsaved").val();
		var targetdate = $("#datepicker").val();
		monthlytargetCalc(cost,saved,targetdate);
	});
	$("#id_currentsaved").focusout(function(){
		var cost = $("#id_cost").val();
		var saved = $("#id_currentsaved").val();
		var targetdate = $("#datepicker").val();
		monthlytargetCalc(cost,saved,targetdate);
	});
	
	$("#datepicker").focusout(function(){
		var cost = $("#id_cost").val();
		var saved = $("#id_currentsaved").val();
		var targetdate = $("#datepicker").val();
		monthlytargetCalc(cost,saved,targetdate);
	});

	
	function monthlytargetCalc(cost,saved,targetdate)
	{
		if(cost != '' && saved != '' && targetdate != '')
		{
			$.ajax({
				type: "post",
				url: baseHref+"account/monthlytargetCalc",
				data: {
					cost: cost,
					saved: saved,
					targetdate: targetdate
				},
				success: function(data){
					//alert(data);
					$('#id_monthtarget').val(data);
				}
			});
		}
	}
	//
//Where you stand jquery calculations//
	//CASH
	$("#checkingaccount").focusout(function(){
		var check = $("#checkingaccount").val();
		var save = $("#savingaccount").val();
		var mutualfunds = $("#mutualfunds").val();
		cashcalc(check,save,mutualfunds);
	});
	$("#savingaccount").focusout(function(){
		var check = $("#checkingaccount").val();
		var save = $("#savingaccount").val();
		var mutualfunds = $("#mutualfunds").val();
		cashcalc(check,save,mutualfunds);
	});
	$("#mutualfunds").focusout(function(){
		var check = $("#checkingaccount").val();
		var save = $("#savingaccount").val();
		var mutualfunds = $("#mutualfunds").val();
		cashcalc(check,save,mutualfunds);
	});
	function cashcalc(check,save,mutualfunds)
	{
		if(check != '' && save != '' && mutualfunds != '')
		{
			$('#totalcash').text(parseFloat(check) + parseFloat(save) + parseFloat(mutualfunds));
		}
	}
	
	//INVESTMENT
	$("#securities").focusout(function(){
		var securities = $("#securities").val();
		var otherinvestments = $("#otherinvestments").val();
		investmentcalc(securities,otherinvestments);
	});
	$("#otherinvestments").focusout(function(){
		var securities = $("#securities").val();
		var otherinvestments = $("#otherinvestments").val();
		investmentcalc(securities,otherinvestments);
	});
	function investmentcalc(securities,otherinvestments)
	{
		if(securities != '' && otherinvestments != '' )
		{
			$('#totalinvestments').text(parseFloat(securities) + parseFloat(otherinvestments) );
		}
	}
	
	//retirementfunds
	$("#retirementfunds").focusout(function(){
		var retirementfunds = $("#retirementfunds").val();
		$('#totalretirement').text(parseFloat(retirementfunds));
	});
	
	//Personal Property
	$("#building").focusout(function(){
		var building = $("#building").val();
		var cars = $("#cars").val();
		var otherproperty = $("#otherproperty").val();
		propertycalc(building,cars,otherproperty);
	});
	$("#cars").focusout(function(){
		var building = $("#building").val();
		var cars = $("#cars").val();
		var otherproperty = $("#otherproperty").val();
		propertycalc(building,cars,otherproperty);
	});
	$("#otherproperty").focusout(function(){
		var building = $("#building").val();
		var cars = $("#cars").val();
		var otherproperty = $("#otherproperty").val();
		propertycalc(building,cars,otherproperty);
	});
	function propertycalc(check,save,mutualfunds)
	{
		if(check != '' && save != '' && mutualfunds != '')
		{
			$('#totalproperty').text(parseFloat(check) + parseFloat(save) + parseFloat(mutualfunds));
		}
	}
	
	//Liabilities - Investment Debt
	$("#mortgage").focusout(function(){
		var mortgage = $("#mortgage").val();
		var studentloandebt = $("#studentloandebt").val();
		var carloans = $("#carloans").val();
		var creditcarddebt = $("#creditcarddebt").val();
		var otherliabilities = $("#otherliabilities").val();
		liabilitiescalc(mortgage,studentloandebt,carloans,creditcarddebt,otherliabilities);
	});
	$("#studentloandebt").focusout(function(){
		var mortgage = $("#mortgage").val();
		var studentloandebt = $("#studentloandebt").val();
		var carloans = $("#carloans").val();
		var creditcarddebt = $("#creditcarddebt").val();
		var otherliabilities = $("#otherliabilities").val();
		liabilitiescalc(mortgage,studentloandebt,carloans,creditcarddebt,otherliabilities);
	});
	$("#carloans").focusout(function(){
		var mortgage = $("#mortgage").val();
		var studentloandebt = $("#studentloandebt").val();
		var carloans = $("#carloans").val();
		var creditcarddebt = $("#creditcarddebt").val();
		var otherliabilities = $("#otherliabilities").val();
		liabilitiescalc(mortgage,studentloandebt,carloans,creditcarddebt,otherliabilities);
	});
	$("#creditcarddebt").focusout(function(){
		var mortgage = $("#mortgage").val();
		var studentloandebt = $("#studentloandebt").val();
		var carloans = $("#carloans").val();
		var creditcarddebt = $("#creditcarddebt").val();
		var otherliabilities = $("#otherliabilities").val();
		liabilitiescalc(mortgage,studentloandebt,carloans,creditcarddebt,otherliabilities);
	});
	$("#otherliabilities").focusout(function(){
		var mortgage = $("#mortgage").val();
		var studentloandebt = $("#studentloandebt").val();
		var carloans = $("#carloans").val();
		var creditcarddebt = $("#creditcarddebt").val();
		var otherliabilities = $("#otherliabilities").val();
		liabilitiescalc(mortgage,studentloandebt,carloans,creditcarddebt,otherliabilities);
	});
	
	function liabilitiescalc(mortgage,studentloandebt,carloans,creditcarddebt,otherliabilities)
	{
		if(mortgage != '' && studentloandebt != '' && carloans != '' && creditcarddebt != '' && otherliabilities != '')
		{
			$('#totalliabilities').text(parseFloat(mortgage) + parseFloat(studentloandebt) + parseFloat(carloans)+ parseFloat(creditcarddebt) + parseFloat(otherliabilities));
		}
	}
	
//Where you stand jquery calculations//

//where are you going//

//REVENUE
 $(".wife").focusout(function(){
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var husband = $("#husband_"+dataid).val();
	  var bonuses = $("#bonuses_"+dataid).val();
	  var divide = $("#dividend_"+dataid).val();
	  var other = $("#other_"+dataid).val();
	  totalincomecalc(currentvalue,husband,bonuses,divide,other,dataid);  
	  var wife = currentvalue;
	  total_income_update(wife,husband,bonuses,divide,other,dataid);  
 });

 $(".husband").focusout(function(){
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var wife = $("#wife_"+dataid).val();
	  var bonuses = $("#bonuses_"+dataid).val();
	  var divide = $("#dividend_"+dataid).val();
	  var other = $("#other_"+dataid).val();
	  totalincomecalc(wife,currentvalue,bonuses,divide,other,dataid);  
	  var husband = currentvalue;
	  total_income_update(wife,husband,bonuses,divide,other,dataid);  
 });
 
 $(".bonus").focusout(function(){
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var wife = $("#wife_"+dataid).val();
	  var husband = $("#husband_"+dataid).val();
	  var divide = $("#dividend_"+dataid).val();
	  var other = $("#other_"+dataid).val();
	  totalincomecalc(wife,husband,currentvalue,divide,other,dataid);  
	  var bonuses = currentvalue;
	  total_income_update(wife,husband,bonuses,divide,other,dataid);  
 });
 
 $(".dividend").focusout(function(){
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var wife = $("#wife_"+dataid).val();
	  var husband = $("#husband_"+dataid).val();
	  var bonuses = $("#bonuses_"+dataid).val();
	  var other = $("#other_"+dataid).val();
	  totalincomecalc(wife,husband,bonuses,currentvalue,other,dataid);  
	  var divide = currentvalue;
	  total_income_update(wife,husband,bonuses,divide,other,dataid);  
 });
 
 $(".other").focusout(function(){
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var wife = $("#wife_"+dataid).val();
	  var husband = $("#husband_"+dataid).val();
	  var bonuses = $("#bonuses_"+dataid).val();
	  var divide = $("#dividend_"+dataid).val();
	  var other = currentvalue;
	  totalincomecalc(wife,husband,bonuses,divide,currentvalue,dataid);  
	  
	  total_income_update(wife,husband,bonuses,divide,other,dataid);  
	  
 });
 function totalincomecalc(wife,husband,bonuses,divide,other,dataid)
 {
	 
  if(wife != '' && husband != '' && bonuses != '' && divide != '' && other != '' )
  {
	  
	
   $('#totalincome_'+dataid).text(Math.round(parseFloat(wife) + parseFloat(husband) + parseFloat(bonuses) + parseFloat(divide) + parseFloat(other)));
	
  }
  budgetcalc(dataid);
 }

 function total_income_update(wife,husband,bonuses,divide,other,monthid)
 {
	if(wife !=''&&husband !=''&&bonuses !=''&&divide !=''&&other !='')
	{
		showloader();
		$.ajax({
			type: "post",
			url: baseHref+"account/updateTotalIncome",
			data: {
				wife: wife,
				husband: husband,
				bonuses: bonuses,
				divide: divide,
				other: other,
				selectYear : $('#selectYear').val(),
				monthid : monthid
			},
			success: function(data){
				hideloader();
			}
		});		
	}
 }
 
 function total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,monthid)
 {
	if(retirement  != "" &&  rent != "" && homerepairs != "" && homeinsurance != "" && garbage != "" && electricity != "" && water != "" && gas != "" && internet != "" && telephones != "" && cable != "" && parking != "" && carpayment != "" && license != "" && repairs != "" && insurance != "" && charitable != "" && childcare != "" && clothing != "" && entertainment != "" && groceries != "" && medical != "" && personal != "" && drycleaning !== "" && tithing != "" && offerings != "" && charities != "" && personal_loan != "" && credit_card != "" && student_loan != "")
	{
		showloader();
		$.ajax({
			type: "post",
			url: baseHref+"account/updateTotalExpenses",
			data: {
				retirement:retirement,
				rent:rent,
				homerepairs:homerepairs,
				homeinsurance:homeinsurance,
				garbage:garbage,
				electricity:electricity,
				water:water,
				gas:gas,
				internet:internet,
				telephones:telephones,
				cable:cable,
				parking:parking,
				carpayment:carpayment,
				license:license,
				repairs:repairs,
				insurance:insurance,
				charitable:charitable,
				childcare:childcare,
				clothing:clothing,
				entertainment:entertainment,
				groceries:groceries,
				medical:medical,
				personal:personal,
				drycleaning:drycleaning,
				tithing:tithing,
				offerings:offerings,
				charities:charities,
				personal_loan:personal_loan,
				credit_card:credit_card,
				student_loan:student_loan,
				selectYear : $('#selectYear').val(),
				monthid : monthid
			},
			success: function(data){
				//$('#id_monthtarget').val(data);
				hideloader();
			}
		});		
	}
}
 
 
//EXPENSES
 
	$(".retirement").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(currentvalue,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid); 
	  
	  var retirement = currentvalue;
	  total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".rent").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,currentvalue,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  var rent = currentvalue;
	  total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
	  
 });
 
 $(".homerepairs").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,currentvalue,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	var homerepairs = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".homeinsurance").focusout(function(){
		alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,currentvalue,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	var homeinsurance = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
  $(".garbage").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,currentvalue,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  	var garbage = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".electricity").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,currentvalue,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  	var electricity = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
	
 });
 
 $(".water").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,currentvalue,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	   	var water = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".gas").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,currentvalue,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  	var gas = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".internet").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,currentvalue,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  	var internet = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".telephones").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,currentvalue,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  var telephones = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".cable").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,currentvalue,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  var cable = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".parking").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,currentvalue,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  var parking = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".carpayment").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,currentvalue,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	   var carpayment = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".license").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,currentvalue,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	   var license = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".repairs").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,currentvalue,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  var repairs = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".insurance").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,currentvalue,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  
	    var insurance = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".charitable").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,currentvalue,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  var charitable = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".childcare").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,currentvalue,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	   var childcare = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".clothing").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,currentvalue,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	   var clothing = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".entertainment").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,currentvalue,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  var entertainment = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".groceries").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,currentvalue,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  var groceries = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".medical").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,currentvalue,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	   var medical = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".personal").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,currentvalue,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	  var personal = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".drycleaning").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,currentvalue,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	    var drycleaning = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".tithing").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,currentvalue,offerings,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	    var tithing = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".offerings").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,currentvalue,charities,personal_loan,credit_card,student_loan,dataid);  
	  
	    var offerings = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".charities").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,currentvalue,personal_loan,credit_card,student_loan,dataid);  
	  
	    var charities = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".personal_loan").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,currentvalue,credit_card,student_loan,dataid);  
	  
	    var personal_loan = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".credit_card").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var student_loan = $("#student_loan_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,currentvalue,student_loan,dataid);  
	  
	    var credit_card = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 $(".student_loan").focusout(function(){
		//alert("dcfc");
	  var currentvalue = $('#'+this.id).val();	
	  //alert(currentvalue);
	  var dataid = $("#"+this.id).data('id');
	  //alert(dataid);
	  var retirement = $("#retirement_"+dataid).val();
	  var rent = $("#rent_"+dataid).val();
	  var homerepairs = $("#homerepairs_"+dataid).val();
	  var homeinsurance = $("#homeinsurance_"+dataid).val();
	  var garbage = $("#garbage_"+dataid).val();
	  var electricity = $("#electricity_"+dataid).val();
	  var water = $("#water_"+dataid).val();
	  var gas = $("#gas_"+dataid).val();
	  var internet = $("#internet_"+dataid).val();
	  var telephones = $("#telephones_"+dataid).val();
	  var cable = $("#cable_"+dataid).val();
	  var parking = $("#parking_"+dataid).val();
	  var carpayment = $("#carpayment_"+dataid).val();
	  var license = $("#license_"+dataid).val();
	  var repairs = $("#repairs_"+dataid).val();
	  var insurance = $("#insurance_"+dataid).val();
	  var charitable = $("#charitable_"+dataid).val();
	  var childcare = $("#childcare_"+dataid).val();
	  var clothing = $("#clothing_"+dataid).val();
	  var entertainment = $("#entertainment_"+dataid).val();
	  var groceries = $("#groceries_"+dataid).val();
	  var medical = $("#medical_"+dataid).val();
	  var personal = $("#personal_"+dataid).val();
	  var drycleaning = $("#drycleaning_"+dataid).val();
	  
	  var tithing = $("#tithing_"+dataid).val();
	  var offerings = $("#offerings_"+dataid).val();
	  var charities = $("#charities_"+dataid).val();
	  var personal_loan = $("#personal_loan_"+dataid).val();
	  var credit_card = $("#credit_card_"+dataid).val();
	  
	  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,currentvalue,dataid);  
	  
	    var student_loan = currentvalue;
	total_expenses_update(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan,dataid);
 });
 
 });
//});

 
 function retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning,tithing,offerings,charities,personal_loan,credit_card,student_loan, dataid)
 {
	 //alert("dc");
  if(retirement != '' && rent != ''  && homerepairs != '' && homeinsurance != '' && garbage != '' 
  && electricity != '' && water != '' && gas != '' && internet != '' && telephones != '' && cable != '' 
  && parking != '' && carpayment != '' && license != '' && repairs != ''  && insurance != '' 
  && charitable != '' && childcare != '' && clothing != '' && entertainment != '' && groceries != '' 
  && medical != '' && personal != '' && drycleaning != '' && tithing != '' && offerings != '' && charities != '' 
  && personal_loan != '' && credit_card != '' && student_loan != '' )
  {
   $('#totalexpenses_'+dataid).text(parseFloat(retirement) + parseFloat(rent) + parseFloat(homerepairs) + parseFloat(homeinsurance) + parseFloat(garbage) + parseFloat(electricity) + parseFloat(water)+ parseFloat(gas)+ parseFloat(internet)+ parseFloat(telephones)+ parseFloat(cable)+ parseFloat(parking)+ parseFloat(carpayment)+ parseFloat(license)+ parseFloat(repairs)+ parseFloat(insurance) + parseFloat(charitable)+ parseFloat(childcare)+ parseFloat(clothing)+ parseFloat(entertainment)+ parseFloat(groceries) + parseFloat(medical)+ parseFloat(personal)+ parseFloat(drycleaning)+ parseFloat(tithing)+ parseFloat(offerings)+ parseFloat(charities) + parseFloat(personal_loan)+ parseFloat(credit_card)+ parseFloat(student_loan));
   
  }
  budgetcalc(dataid);
 }
 function budgetcalc(dataid)
 {
	 
   var LeftOverMoney = parseFloat($('#totalincome_'+dataid).html()) - parseFloat($('#totalexpenses_'+dataid).html());
   //alert(LeftOverMoney);
   $('#Totalincometxt_'+dataid).val(parseFloat($('#totalincome_'+dataid).html()));
   $('#TotalExpensestxt_'+dataid).val(parseFloat($('#totalexpenses_'+dataid).html()));
   $('#LeftOverMoney_'+dataid).val(LeftOverMoney);
 }
 
//End where are you going//



//tabs functions//
function showactiveTabs(id)
{
	$('#crtmnth').text(id);
}

function onPersonalMonthlyBudget(id){
	showloader();
	$.ajax({
		type: "post",
		url: baseHref+"account/onPersonalMonthlyBudget",
		data: {
			monthyear: id
		},
		success: function(data){
			localdata = JSON.parse(data);
			$('.totalincome').html(localdata[0].totalincome);
			$('.totalexpenses').html(localdata[0].totalexpenses);
			$('.leftovermoney').html('$ '+localdata[0].leftover);
			hideloader();
		}
	});	
}

//Start Debt Payment//
$(document).ready(function ()
{  
	 $(".balance").focusout(function(){
		  var ids = $('.balance');
		  var a = 0;
		  for($i = 0; $i < ids.length; $i++)
		  {
			a = parseFloat(a) + parseFloat(ids[$i].value);
		  }
		  $('#totalbalance').val(a);
	 });
 
	 $(".payment").focusout(function(){
		  var ids = $('.payment');
		  var a = 0;
		  for($i = 0; $i < ids.length; $i++)
		  {
			a = parseFloat(a) + parseFloat(ids[$i].value);
			
		  }
		  $('#totalpayment').val(a);
		  $('#mininumpayment').val(a);
	 });
});

//End Debt Payment//

// function monthlygraph()
// {
	// $.ajax({
		// type: "post",
		// url: baseHref+"account/monthlygraph",
		// // data: {
			// // monthyear: id
		// // },
		// success: function(data){
			// return data;
		// }
	// });	
// }
// $(document).ready(function () {
// $('body').on('click','.btn-alert',function () { 
		// swal({
			// title: "Are you sure?",
			// text: "You will not be able to recover this imaginary file!",
			// type: "warning",
			// showCancelButton: true,
			// confirmButtonClass: 'btn-danger',
			// confirmButtonText: 'Yes, delete it!',
			// cancelButtonText: "No, cancel plx!",
			// closeOnConfirm: false,
			// closeOnCancel: false
		// },
		// function (isConfirm) {
			// if (isConfirm) {
				// swal("Deleted!", "Your imaginary file has been deleted!", "success");
			// } else {
				// swal("Cancelled", "Your imaginary file is safe :)", "error");
			// }
		// });
	// });
// });