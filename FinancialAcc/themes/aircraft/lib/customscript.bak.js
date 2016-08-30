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
								closeOnConfirm: true,
								confirmButtonText: "Yes",
								confirmButtonColor: btnColor['info'] 
							}, function() { 
								//alert('asdsad'); 
								$('#goaladdingform')[0].reset();
								location.reload();
							});
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
 $("#wife").focusout(function(){
  var wife = $("#wife").val();
  var husband = $("#husband").val();
  var bonuses = $("#bonuses").val();
  var divide = $("#divide").val();
  var other = $("#other").val();
  totalincomecalc(wife,husband,bonuses,divide,other);
 });
 $("#husband").focusout(function(){
  var wife = $("#wife").val();
  var husband = $("#husband").val();
  var bonuses = $("#bonuses").val();
  var divide = $("#divide").val();
  var other = $("#other").val();
  totalincomecalc(wife,husband,bonuses,divide,other);
 });
 $("#bonuses").focusout(function(){
  var wife = $("#wife").val();
  var husband = $("#husband").val();
  var bonuses = $("#bonuses").val();
  var divide = $("#divide").val();
  var other = $("#other").val();
  totalincomecalc(wife,husband,bonuses,divide,other);
 });
 $("#divide").focusout(function(){
  var wife = $("#wife").val();
  var husband = $("#husband").val();
  var bonuses = $("#bonuses").val();
  var divide = $("#divide").val();
  var other = $("#other").val();
  totalincomecalc(wife,husband,bonuses,divide,other);
 });
 $("#other").focusout(function(){
  var wife = $("#wife").val();
  var husband = $("#husband").val();
  var bonuses = $("#bonuses").val();
  var divide = $("#divide").val();
  var other = $("#other").val();
  totalincomecalc(wife,husband,bonuses,divide,other);
 });
 
 function totalincomecalc(wife,husband,bonuses,divide,other)
 {
  if(wife != '' && husband != '' && bonuses != '' && divide != '' && other != '' )
  {
   $('#totalincome').text(parseFloat(wife) + parseFloat(husband) + parseFloat(bonuses) + parseFloat(divide) + parseFloat(other) );
  }
  budgetcalc();
 }

 
//EXPENSES
 $(".retirementExp").focusout(function(){
  var retirement = $("#retirement").val();
  var rent = $("#rent").val();
  var homerepairs = $("#homerepairs").val();
  var homeinsurance = $("#homeinsurance").val();
  var garbage = $("#garbage").val();
  var electricity = $("#electricity").val();
  var water = $("#water").val();
  var gas = $("#gas").val();
  var internet = $("#internet").val();
  var telephones = $("#telephones").val();
  var cable = $("#cable").val();
  var parking = $("#parking").val();
  var carpayment = $("#carpayment").val();
  var license = $("#license").val();
  var repairs = $("#repairs").val();
  var insurance = $("#insurance").val();
  var charitable = $("#charitable").val();
  var childcare = $("#childcare").val();
  var clothing = $("#clothing").val();
  var entertainment = $("#entertainment").val();
  var groceries = $("#groceries").val();
  var medical = $("#medical").val();
  var personal = $("#personal").val();
  var drycleaning = $("#drycleaning").val();
  
  
  retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning);
 });

 
 function retirementExpcalc(retirement,rent,homerepairs,homeinsurance,garbage,electricity,water,gas,internet,telephones,cable,parking,carpayment,license,repairs,insurance,charitable,childcare,clothing,entertainment,groceries,medical,personal,drycleaning)
 {
  if(retirement != '' && rent != ''  && homerepairs != '' && homeinsurance != '' && garbage != '' 
  && electricity != '' && water != '' && gas != '' && internet != '' && telephones != '' && cable != '' 
  && parking != '' && carpayment != '' && license != '' && repairs != ''  && insurance != '' 
  && charitable != '' && childcare != '' && clothing != '' && entertainment != '' && groceries != '' 
  && medical != '' && personal != '' && drycleaning != '' )
  {
   $('#totalexpenses').text(parseFloat(retirement) + parseFloat(rent) + parseFloat(homerepairs) + parseFloat(homeinsurance) + parseFloat(garbage) + parseFloat(electricity) + parseFloat(water)+ parseFloat(gas)+ parseFloat(internet)+ parseFloat(telephones)+ parseFloat(cable)+ parseFloat(parking)+ parseFloat(carpayment)+ parseFloat(license)+ parseFloat(repairs)+ parseFloat(insurance) + parseFloat(charitable)+ parseFloat(childcare)+ parseFloat(clothing)+ parseFloat(entertainment)+ parseFloat(groceries) + parseFloat(medical)+ parseFloat(personal)+ parseFloat(drycleaning));
   budgetcalc();
  }
 }
 function budgetcalc()
 {
   var LeftOverMoney = parseFloat($('#totalincome').html()) - parseFloat($('#totalexpenses').html());
   $('#Totalincometxt').val(parseFloat($('#totalincome').html()));
   $('#TotalExpensestxt').val(parseFloat($('#totalexpenses').html()));
   $('#LeftOverMoney').val(LeftOverMoney);
 }
 
//End where are you going//


});

//tabs functions//
function showactiveTabs(id)
{
	$('#crtmnth').text(id);
}

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