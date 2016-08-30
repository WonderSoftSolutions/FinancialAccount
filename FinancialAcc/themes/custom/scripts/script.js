var basehref = "http://localhost:8383/CodeIgniter/MultiTheme/";
function registersubmit()
{
	var form = $("#registrationform").serialize();
	$.ajax({
		type: "POST",
		url: basehref+ "Account/signin",
		data: form,
		success: function(data){
			alert(data); //Unterminated String literal fixed
		},
		error: function (data){
			
		},
		failure: function (data){
			
		}
     });
     event.preventDefault();
     return false;  //stop the actual form post !important!
}