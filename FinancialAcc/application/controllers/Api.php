<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Api extends REST_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('account_model','email_model');
		
	}
	
	public $data = array();
	
	function namevalidation($name)
	{
		$name = trim($name);
		if($name != '')
		{
			if((int)strlen($name) >= 3)
			{
				if((int)strlen($name) <= 30)
				{
					if(ctype_alpha($name))
					{
						return true;
					}
					else{
						return false;
					}
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	function emailvalidation($email)
	{
		$emailErr = true;
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = false; 
		}
		return $emailErr;
	}
	
	public function user_register_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$error = false;
		$userAPIdata; 
		
		
		$firstname = trim(urldecode($_REQUEST['first_name']));
		$lastname = trim(urldecode($_REQUEST['last_name']));
		$email = trim(urldecode($_REQUEST['email']));
		$password= trim(urldecode($_REQUEST['password']));
		//$cpassword=trim(urldecode($_REQUEST['cpassword']));
		$cpassword=$password;
		$Registermethod=trim(urldecode($_REQUEST['platform']));
	
		if($this->namevalidation($firstname) == false)
		{
			$b['msg'] = 'Validation fails!!!';
			$b['short'] = 'false';
			$b['description'] = 'firstname validation fails '.$firstname;
			array_push($a[$this->router->fetch_method()],$b);
			$error = true;
			//break;
		}
		if($this->namevalidation($lastname) == false)
		{
			$b['msg'] = 'Validation fails!!!';
			$b['short'] = 'false';
			$b['description'] = 'lastname validation fails '.$lastname;
			array_push($a[$this->router->fetch_method()],$b);
			$error = true;
			//break;
		}
		$userAPIdata['firstname'] = $firstname;
		$userAPIdata['lastname'] = $lastname;
		$userAPIdata['email'] = $email;
		$userAPIdata['password'] = $password;
		$userAPIdata['cpassword'] = $cpassword;
		$userAPIdata['Registermethod'] = $Registermethod;
		
		//print_r($userAPIdata);
		if($error == false){
			if($userAPIdata['password'] == $userAPIdata['cpassword'])
			{			
				$user['id'] = '';
				$user['fname'] = $userAPIdata['firstname'];
				$user['lname'] = $userAPIdata['lastname'];
				$user['email'] = urldecode($userAPIdata['email']);
				
				$user['pwd'] = md5($userAPIdata['password']);
				//$user['dob'] = $this->input->post('dob');
				$user['register_method'] = $userAPIdata['Registermethod'];
				$user['email_verified'] = '0';
				$user['status'] = '0';//$user['status'] = '0';
				//$this->account_model->register($user);
				$result = $this->account_model->check_email($user['email']);
				if($result == false)
				{
					$result = $this->account_model->register($user);
					$b['msg'] = 'You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!';
					$b['short'] = 'true';
					$b['description'] = 'Successfully Registered';
					array_push($a[$this->router->fetch_method()],$b);
				}
				else
				{	
					$b['msg'] = 'Oops! Email already in our database!!!';
					$b['short'] = 'false';
					$b['description'] = 'Email already in our database';
					array_push($a[$this->router->fetch_method()],$b);
				}
			}
			else{
				$b['msg'] = 'Password not matched with confirm password!!!';
				$b['short'] = 'false';
				$b['description'] = 'Password not matched with confirm password';
				array_push($a[$this->router->fetch_method()],$b);
			}
		}
		
		echo json_encode($a);
	}
	function goal_get_list_post()//API
	{
		$status = trim(urldecode($_REQUEST['status']));
		$user_id = trim(urldecode($_REQUEST['user_id']));
		$a[$this->router->fetch_method()]=array();
		$b = array();
		$b = $this->account_model->getAllgoalsAjax($status,$user_id);
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	function user_get_profile_post()
	{
		$id = trim(urldecode($_REQUEST['user_id']));
		
		//$id = $this->input->post('usr_id');
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$b['msg'] = 'Profile Details';
		$b['short'] = 'true';
		array_push($a[$this->router->fetch_method()],$this->account_model->get_user_profile($id));
		echo json_encode($a);
	}
	
	function user_change_password_post()
	{
		$password['id'] = trim(urldecode($_REQUEST['user_id']));
		$password['currentpassword'] = trim(urldecode($_REQUEST['current_password']));
		$password['npassword'] = trim(urldecode($_REQUEST['new_password']));
		$password['cpassword'] = $password['npassword']; //trim(urldecode($_REQUEST['cpassword']));
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		if($password['id'])
		{
			if($password['npassword'] == $password['cpassword']){
			
				$result = $this->account_model->check_current_password($password);
				
				if($result == true)
				{
					$user['pwd'] = md5($password['cpassword']);
					$user['id'] = $password['id'];
					if($this->account_model->register($user) == 'done')
					{
						$utemp = $this->account_model->get_user_profile($password['id']);
						if($utemp != null)
						{
							$user['fname'] = $utemp['first_name'];
							$user['lname'] = $utemp['last_name'];
							$user['email'] = $utemp['email'];
							$email['mailbody'] = $this->email_model->ChangePwdHTML($user);
							$email['subject'] = 'Password Changed Notification - Advecion';
							$this->email_model->send_mail($email,$user);
						}	
						$b['msg'] = 'Password changed successfully.';
						$b['short'] = 'true';
						array_push($a[$this->router->fetch_method()],$b);
					}else{
						$b['msg'] = 'Internal server error!!!';
						$b['short'] = 'false';
						array_push($a[$this->router->fetch_method()],$b);
					}
				}
				else{
					$b['msg'] = 'Current Password not matched!!!';
					$b['short'] = 'false';
					array_push($a[$this->router->fetch_method()],$b);
				}
			}
			else{
				$b['msg'] = 'New password and confirm password not matched!!!';
				$b['short'] = 'false';
				array_push($a[$this->router->fetch_method()],$b);
			}
		}
		else
		{
			$b['msg'] = 'Invalid Request!!!';
			$b['short'] = 'false';
			array_push($a[$this->router->fetch_method()],$b);
		}
		echo json_encode($a);
	}
	
	function user_check_email_post()
	{
		$email = trim(urldecode($_REQUEST['email']));
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		//if($this->input->post('email')){
		if($email){
			$b['msg'] = $this->account_model->check_email($email);
			$b['short'] = 'true';
			$b['description'] = 'msg true = mail already in our database, msg false = new mail';
			array_push($a[$this->router->fetch_method()],$b);
		
		}else{
			$b['msg'] = 'Invalid Request!!!';
			$b['short'] = 'false';
			array_push($a[$this->router->fetch_method()],$b);
		}
		echo json_encode($a);
	}
	function user_logout_post()
	{
		$id = trim(urldecode($_REQUEST['user_id']));
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		if($id!= null)
		{
			$this->account_model->do_logout();
			$b['msg'] = 'Logout Successfully!';
			$b['short'] = 'true';
			array_push($a[$this->router->fetch_method()],$b);
		}else{
			$b['msg'] = 'Internal server error!!!';
			$b['short'] = 'false';
			array_push($a[$this->router->fetch_method()],$b);
		}
		echo json_encode($a);
	}
	
	function verify($id = 0)
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$b['msg'] = $this->account_model->AccountVerifyMobile($id);
		$b['description'] = "1 = active, 0 = Deactive";
		$b['short'] = 'true';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	function user_recover_post() {
	
		$email = trim(urldecode($_REQUEST['email']));	
	
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		if($email)
		{
			$b['msg'] = $this->account_model->RecoverAccount($email);
			$b['short'] = 'true';
			array_push($a[$this->router->fetch_method()],$b);
		}
		else{
			$b['msg'] = 'Internal server error!!!';
			$b['short'] = 'false';
			array_push($a[$this->router->fetch_method()],$b);
		}
		echo json_encode($a);
	}
	
	function user_login_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$users; 
		$users['user_login'] = trim(urldecode($_REQUEST['email']));//$this->post()[0]
		$users['user_pass'] = trim(urldecode($_REQUEST['password']));//$this->post()[0]
		$logresult = $this->account_model->do_loginAPI($users);
		if($logresult != false){
			$userid = $logresult;
			$b['msg'] = 'Logged In!!!';
			$b['short'] = 'true';
			$b['userid'] = $userid;
		}
		else
		{
			$b['msg'] = 'Internal server error!!!';
			$b['short'] = 'false';
			$b['description'] ='Login details wrong or may be account not activated';
		}
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	function goal_all_terms_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$status = trim(urldecode($_REQUEST['status']));	
		
		$alltemrs = $this->account_model->getactiveTerms($status);//1 active, 0 deactive
		array_push($a[$this->router->fetch_method()],$alltemrs);
		echo json_encode($a);
		
	}
	function goal_add_item_post(){
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$users['id_goal'] = trim(urldecode($_REQUEST['goal_name']));	
		$users['id_term'] = trim(urldecode($_REQUEST['term_id']));	
		$users['id_cost'] = trim(urldecode($_REQUEST['cost']));	
		$users['id_currentsaved'] = trim(urldecode($_REQUEST['current_saved']));	
		$users['id_datetimepicker1'] = trim(urldecode($_REQUEST['target_date']));	
		$users['user_id'] = trim(urldecode($_REQUEST['user_id']));	
		
		$param['targetdate'] = $users['id_datetimepicker1'];
		$param['cost'] = $users['id_cost'];
		$param['saved'] = $users['id_currentsaved'];
		
		$monthlytarget = $this->account_model->monthlytargetCalc($param);
		
		$key = 'id_monthtarget';
		$users[$key] = trim(urldecode($monthlytarget));
		
		$result = $this->account_model->goaladdingbyuser($users);
		if($result != '' && $result != '0' && $result != 'alreadyexists')
		{
			//success
			$b['msg'] = 'Your Goal is Added Successfully!!!';
			$b['short'] = 'true';
			$b['goal_id'] = $result;
			$b['result'] = 'add';
			array_push($a[$this->router->fetch_method()],$b);
		}
		else if($result == 'alreadyexists'){
			$b['msg'] = 'Goal Aready Exists!!!';
			$b['short'] = 'false';
			$b['description'] ='This Goal Already Exists in your list!';
			$b['result'] = 'none';
			array_push($a[$this->router->fetch_method()],$b);
		}
		echo json_encode($a);
	}
	
	function goal_delete_item_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$user_goals['id'] = trim(urldecode($_REQUEST['goal_id']));	
		//$user_goals['goal_id'] = trim(urldecode($_REQUEST['goal_id']));	
		$user_goals['user_id'] = trim(urldecode($_REQUEST['user_id']));	
		$user_goals['goal_status'] = trim(urldecode($_REQUEST['status']));	
		
		$result = $this->account_model->goaldeleteAPI($user_goals);
		$b['msg'] = 'Your Goal deleted Successfully!!!';
		$b['short'] = 'true';
		//$b['usergoalid'] = $result;
		$b['result'] = 'delete/deactive';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	function goal_update_item_post(){
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$users['user_id'] = trim(urldecode($_REQUEST['user_id']));	
		$users['usergoalid'] = trim(urldecode($_REQUEST['goal_id']));	
		$users['id_goal'] = trim(urldecode($_REQUEST['goal_name']));	
		$users['id_term'] = trim(urldecode($_REQUEST['term_id']));	
		$users['id_cost'] = trim(urldecode($_REQUEST['cost']));	
		$users['id_currentsaved'] = trim(urldecode($_REQUEST['current_saved']));	
		$users['id_datetimepicker1'] = trim(urldecode($_REQUEST['target_date']));	
			
			
		$month['cost'] = $users['id_cost'];
		$month['saved'] = $users['id_currentsaved'];
		$month['targetdate'] = $users['id_datetimepicker1'];

		$step1 = $month['cost'] - $month['saved'];
		$monthsdiff = $this->account_model->datediff($month['targetdate']);

		if($monthsdiff < 1)
		{
			$monthsdiff = 1;
		}
		$step2 = $step1/$monthsdiff;
		if($step2 > $month['cost'])
		{
			$monthlytarget = $month['cost'];//$step2;
		}
		else
		{
			$monthlytarget =  ($step1)/$monthsdiff;
		}
		
		$users['id_monthtarget'] = $monthlytarget;

		$result = $this->account_model->goaleditingbyuser($users);

		$b['msg'] = 'Your Goal is updated Successfully!!!';
		$b['short'] = 'true';
		//$b['goal_id'] = $result;
		$b['result'] = 'update';
		array_push($a[$this->router->fetch_method()],$b);
		// if($result != '' && $result != '0' && $result != 'alreadyexists')
		// {
			// //success
			// $b['msg'] = 'Your Goal is updated Successfully!!!';
			// $b['short'] = 'true';
			// //$b['goal_id'] = $result;
			// $b['result'] = 'update';
			// array_push($a[$this->router->fetch_method()],$b);
		// }
		// else if($result == 'alreadyexists'){
			// $b['msg'] = 'Goal Name Aready Exists!!!';
			// $b['short'] = 'false';
			// $b['description'] ='This Goal Name Already Exists in your list!';
			// $b['result'] = 'none';
			// array_push($a[$this->router->fetch_method()],$b);
		// }
		echo json_encode($a);
	}
	function user_over_all_progress_post()
	{
		$userid = trim(urldecode($_REQUEST['user_id']));	
		
		$a[$this->router->fetch_method()]=array();
		$b['msg'] = $this->account_model->getoverallprogress($userid);
		$b['short'] = 'true';
		$b['description'] ='Overall Progress API';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	/*Where are you going API*/
	function wayg_total_income_post(){
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$users['usr_id'] = trim(urldecode($_REQUEST['user_id']));	
		$users['wife_revenue'] = trim(urldecode($_REQUEST['wife_revenue']));	
		$users['husband_revenue'] = trim(urldecode($_REQUEST['husband_revenue']));	
		$users['bonuses'] = trim(urldecode($_REQUEST['bonuses']));	
		$users['dividend'] = trim(urldecode($_REQUEST['dividend']));	
		$users['other'] = trim(urldecode($_REQUEST['other']));	
		$users['year'] = trim(urldecode($_REQUEST['year']));	
		$users['month'] = trim(urldecode($_REQUEST['month']));	
		
		$result = $this->account_model->insert_revenue($users);
		
		$b['msg'] = "Revenue saved";
		$b['short'] = 'true';
		$b['description'] ='Revenue saved with us';
		$b['result'] ='add/update';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	function wayg_total_expenses_post(){
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$users['user_id'] = trim(urldecode($_REQUEST['user_id']));
		$users['retirement'] = trim(urldecode($_REQUEST['retirement']));
		$users['mortgage'] = trim(urldecode($_REQUEST['mortgage']));
		$users['home_repairs'] = trim(urldecode($_REQUEST['home_repairs']));
		$users['home_insurance'] = trim(urldecode($_REQUEST['home_insurance']));
		$users['garbage'] = trim(urldecode($_REQUEST['garbage']));
		$users['electricity'] = trim(urldecode($_REQUEST['electricity']));
		$users['water'] = trim(urldecode($_REQUEST['water']));
		$users['gas'] = trim(urldecode($_REQUEST['gas']));
		$users['internet'] = trim(urldecode($_REQUEST['internet']));
		$users['telephone'] = trim(urldecode($_REQUEST['telephone']));
		$users['cable_tv'] = trim(urldecode($_REQUEST['cable_tv']));
		$users['public_transportation'] = trim(urldecode($_REQUEST['public_transportation']));
		$users['car_payment'] = trim(urldecode($_REQUEST['car_payment']));
		$users['license_plates'] = trim(urldecode($_REQUEST['license_plates']));
		$users['car_repairs'] = trim(urldecode($_REQUEST['car_repairs']));
		$users['insurance'] = trim(urldecode($_REQUEST['insurance']));
		$users['charitable'] = trim(urldecode($_REQUEST['charitable']));
		$users['child_care'] = trim(urldecode($_REQUEST['child_care']));
		$users['clothing'] = trim(urldecode($_REQUEST['clothing']));	
		$users['entertainment'] = trim(urldecode($_REQUEST['entertainment']));	
		$users['groceries'] = trim(urldecode($_REQUEST['groceries']));	
		$users['medical'] = trim(urldecode($_REQUEST['medical']));	
		$users['personal_barber'] = trim(urldecode($_REQUEST['personal_barber']));	
		$users['dry_cleaning'] = trim(urldecode($_REQUEST['dry_cleaning']));	
		$users['tithing'] = trim(urldecode($_REQUEST['tithing']));	
		$users['offerings'] = trim(urldecode($_REQUEST['offerings']));	
		$users['charities'] = trim(urldecode($_REQUEST['charities']));	
		$users['personal_loan'] = trim(urldecode($_REQUEST['personal_loan']));	
		$users['credit_card'] = trim(urldecode($_REQUEST['credit_card']));	
		$users['student_loan'] = trim(urldecode($_REQUEST['student_loan']));	
		
		$result = $this->account_model->insert_expenses($users);
		
		$b['msg'] = "Expenses saved";
		$b['short'] = 'true';
		$b['description'] ='Expenses saved with us';
		$b['result'] ='add/update';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	function wayg_delete_item_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$year = trim(urldecode($_REQUEST['year']));
		$month = trim(urldecode($_REQUEST['month']));
		$user_id = trim(urldecode($_REQUEST['user_id']));
		
		$zero = '0';
		$revenue['wife_revenue'] = $zero ;
		$revenue['husband_revenue'] = $zero ;
		$revenue['bonuses'] = $zero;
		$revenue['dividend'] = $zero ;
		$revenue['other'] = $zero ;
		$revenue['status'] = $zero;
		
		$this->db->where('year', $year);
		$this->db->where('month', $month);
		$this->db->where('user_id', $user_id);
		$this->db->update('revenue', $revenue);

		$expenses['retirement'] 			= $zero;
		$expenses['mortgage']				= $zero;
		$expenses['home_repairs'] 			= $zero;
		$expenses['home_insurance'] 		= $zero;
		$expenses['garbage'] 				= $zero;
		$expenses['electricity'] 			= $zero;
		$expenses['water']					= $zero;
		$expenses['gas'] 					= $zero;
		$expenses['internet'] 				= $zero;
		$expenses['telephone'] 			= $zero;
		$expenses['cable_tv'] 				= $zero;
		$expenses['public_transportation'] = $zero;
		$expenses['car_payment'] 			= $zero;
		$expenses['license_plates'] 		= $zero;
		$expenses['car_repairs'] 			= $zero;
		$expenses['insurance'] 			= $zero;
		$expenses['charitable'] 			= $zero;
		$expenses['child_care'] 			= $zero;
		$expenses['clothing'] 				= $zero;
		$expenses['entertainment'] 		= $zero;
		$expenses['groceries'] 			= $zero;
		$expenses['medical'] 				= $zero;
		$expenses['personal_barber'] 		= $zero;
		$expenses['dry_cleaning'] 			= $zero;
		$expenses['tithing']               = $zero;
		$expenses['offerings']             = $zero;
		$expenses['charities']             = $zero;
		$expenses['personal_loan']         = $zero;
		$expenses['credit_card']           = $zero;
		$expenses['student_loan']          = $zero;
		$expenses['status'] = $zero;
		
		$this->db->where('year', $year);
		$this->db->where('month', $month);
		$this->db->where('user_id', $user_id);
		$this->db->update('expenses', $expenses);		
		
		$b['msg'] = "Item deleted";
		$b['short'] = 'true';
		$b['result'] ='delete';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	function wayg_get_item_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$year = trim(urldecode($_REQUEST['year']));
		$month = trim(urldecode($_REQUEST['month']));
		$user_id = trim(urldecode($_REQUEST['user_id']));
		if($month == 0)
		{
			$sql = "SELECT 
				expenses.id as expenses_id,
				expenses.user_id,
				expenses.year,
				expenses.month,
				expenses.retirement as expenses_retirement,
				expenses.mortgage as expenses_mortgage,
				expenses.home_repairs as expenses_home_repairs,
				expenses.home_insurance as expenses_home_insurance,
				expenses.garbage as expenses_garbage,
				expenses.electricity as expenses_electricity,
				expenses.water as expenses_water,
				expenses.gas as expenses_gas,
				expenses.internet as expenses_internet,
				expenses.telephone as expenses_telephone,
				expenses.cable_tv as expenses_cable_tv,
				expenses.public_transportation as expenses_public_transportation,
				expenses.car_payment as expenses_car_payment,
				expenses.license_plates as expenses_license_plates,
				expenses.car_repairs as expenses_car_repairs,
				expenses.insurance as expenses_insurance,
				expenses.charitable as expenses_charitable,
				expenses.child_care as expenses_child_care,
				expenses.clothing as expenses_clothing,
				expenses.entertainment as expenses_entertainment,
				expenses.groceries as expenses_groceries,
				expenses.medical as expenses_medical,
				expenses.personal_barber as expenses_personal_barber,
				expenses.dry_cleaning as expenses_dry_cleaning,
				expenses.tithing as expenses_tithing,
				expenses.offerings as expenses_offerings,
				expenses.charities as expenses_charities,
				expenses.personal_loan as expenses_personal_loan,
				expenses.credit_card as expensess_credit_card,
				expenses.student_loan as expenses_student_loan,
				revenue.wife_revenue as revenue_wife_revenue,
				revenue.husband_revenue as revenue_husband_revenue,
				revenue.bonuses as revenue_bonuses,
				revenue.dividend as revenue_dividend,
				revenue.other as revenue_other
				FROM expenses inner join revenue on revenue.user_id = expenses.user_id and revenue.month = expenses.month and revenue.year = expenses.year where expenses.user_id  = '$user_id' and expenses.year = '$year' and revenue.user_id  = '$user_id' and revenue.year = '$year' ";
		}
		else{
			$sql = "SELECT 
				expenses.id as expenses_id,
				expenses.user_id,
				expenses.year,
				expenses.month,
				expenses.retirement as expenses_retirement,
				expenses.mortgage as expenses_mortgage,
				expenses.home_repairs as expenses_home_repairs,
				expenses.home_insurance as expenses_home_insurance,
				expenses.garbage as expenses_garbage,
				expenses.electricity as expenses_electricity,
				expenses.water as expenses_water,
				expenses.gas as expenses_gas,
				expenses.internet as expenses_internet,
				expenses.telephone as expenses_telephone,
				expenses.cable_tv as expenses_cable_tv,
				expenses.public_transportation as expenses_public_transportation,
				expenses.car_payment as expenses_car_payment,
				expenses.license_plates as expenses_license_plates,
				expenses.car_repairs as expenses_car_repairs,
				expenses.insurance as expenses_insurance,
				expenses.charitable as expenses_charitable,
				expenses.child_care as expenses_child_care,
				expenses.clothing as expenses_clothing,
				expenses.entertainment as expenses_entertainment,
				expenses.groceries as expenses_groceries,
				expenses.medical as expenses_medical,
				expenses.personal_barber as expenses_personal_barber,
				expenses.dry_cleaning as expenses_dry_cleaning,
				expenses.tithing as expenses_tithing,
				expenses.offerings as expenses_offerings,
				expenses.charities as expenses_charities,
				expenses.personal_loan as expenses_personal_loan,
				expenses.credit_card as expensess_credit_card,
				expenses.student_loan as expenses_student_loan,
				revenue.wife_revenue as revenue_wife_revenue,
				revenue.husband_revenue as revenue_husband_revenue,
				revenue.bonuses as revenue_bonuses,
				revenue.dividend as revenue_dividend,
				revenue.other as revenue_other
				FROM expenses inner join revenue on revenue.user_id = expenses.user_id and revenue.month = expenses.month and revenue.year = expenses.year where expenses.user_id  = '$user_id' and expenses.year = '$year' and expenses.month = '$month' and revenue.user_id  = '$user_id' and revenue.year = '$year' and revenue.month = '$month'";
		}
		
		$query = $this->db->query($sql);
		$b = $query->result_array();
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	/*Where you stand API*/
	function wyst_total_assest_updates_post()
	{	
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$param['user_id'] = trim(urldecode($_REQUEST['user_id']));
		$param['checking_account'] = trim(urldecode($_REQUEST['checking_account']));
		$param['savings_account'] = trim(urldecode($_REQUEST['savings_account']));
		$param['mutual_funds'] = trim(urldecode($_REQUEST['mutual_funds']));
		$param['securities'] = trim(urldecode($_REQUEST['securities']));
		$param['other_investments'] = trim(urldecode($_REQUEST['other_investments']));
		$param['retirement_funds'] = trim(urldecode($_REQUEST['retirement_funds']));
		$param['building'] = trim(urldecode($_REQUEST['building']));
		$param['cars'] = trim(urldecode($_REQUEST['cars']));
		$param['other_property'] = trim(urldecode($_REQUEST['other_property']));
		$param['year'] = trim(urldecode($_REQUEST['year']));
		$param['month'] = trim(urldecode($_REQUEST['month']));
		$this->account_model->totalassestUpdates($param);
		
		$b['msg'] = "Assets saved";
		$b['short'] = 'true';
		$b['description'] ='Assets saved with us';
		$b['result'] ='updated';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	function wyst_total_liabilities_updates_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$param['mortgage'] = trim(urldecode($_REQUEST['mortgage']));
		$param['student_debt'] = trim(urldecode($_REQUEST['student_debt']));
		$param['car_loans'] = trim(urldecode($_REQUEST['car_loans']));
		$param['credit_card'] = trim(urldecode($_REQUEST['credit_card']));
		$param['other_liabilities'] = trim(urldecode($_REQUEST['other_liabilities']));
		
		$param['year'] = trim(urldecode($_REQUEST['year']));
		$param['month'] = trim(urldecode($_REQUEST['month']));
		$param['user_id'] = trim(urldecode($_REQUEST['user_id']));
		$this->account_model->totalliabilitiesUpdates($param);
		
		$b['msg'] = "Liabilities saved";
		$b['short'] = 'true';
		$b['description'] ='Liabilities saved with us';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	function wyst_delete_item_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$year = trim(urldecode($_REQUEST['year']));
		$month = trim(urldecode($_REQUEST['month']));
		$user_id = trim(urldecode($_REQUEST['user_id']));
		
		$zero = '0';
		$liabilites['mortgage'] = $zero ;
		$liabilites['student_debt'] = $zero ;
		$liabilites['car_loans'] = $zero;
		$liabilites['credit_card'] = $zero;
		$liabilites['other_liabilities'] = $zero;
		$liabilites['status'] 				= $zero;
			
		$this->db->where('year', $year);
		$this->db->where('month', $month);
		$this->db->where('user_id', $user_id);
		$this->db->update('liabilities', $liabilites);
			
		$assets['checking_account']		= $zero;
		$assets['savings_account'] 		= $zero;
		$assets['mutual_funds'] 		= $zero;
		$assets['securities']			= $zero;
		$assets['other_investments'] 	= $zero;
		$assets['retirement_funds']		= $zero;
		$assets['building'] 			= $zero;
		$assets['cars'] 				= $zero;
		$assets['other_property'] 		= $zero;
		$assets['status'] 				= $zero;
		
		$this->db->where('year', $year);
		$this->db->where('month', $month);
		$this->db->where('user_id', $user_id);
		$this->db->update('assets', $assets);		
		
		$b['msg'] = "Item deleted";
		$b['short'] = 'true';
		$b['result'] ='delete';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	function wyst_get_item_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$year = trim(urldecode($_REQUEST['year']));
		$month = trim(urldecode($_REQUEST['month']));
		$user_id = trim(urldecode($_REQUEST['user_id']));
		if($month == 0)
		{
			$sql = "SELECT 
				assets.id as assets_id,
				assets.user_id,
				assets.year,
				assets.month,
				assets.checking_account as assets_checking_account,
				assets.savings_account as assets_savings_account,
				assets.mutual_funds as assets_mutual_funds,
				assets.securities as assets_securities,
				assets.other_investments as assets_other_investments,
				assets.retirement_funds as assets_retirement_funds,
				assets.building as assets_building,
				assets.cars as assets_cars,
				assets.other_property as assets_other_property,
				liabilities.mortgage as liabilities_mortgage,
				liabilities.student_debt as liabilities_student_debt,
				liabilities.car_loans as liabilities_car_loans,
				liabilities.credit_card as liabilities_credit_card,
				liabilities.other_liabilities as liabilities_other_liabilities
				FROM assets inner join liabilities on liabilities.user_id = assets.user_id and liabilities.month = assets.month and liabilities.year = assets.year where assets.user_id  = '$user_id' and assets.year = '$year' and liabilities.user_id  = '$user_id' and liabilities.year = '$year' ";
		}
		else{
			$sql = "SELECT 
				assets.id as assets_id,
				assets.user_id,
				assets.year,
				assets.month,
				assets.checking_account as assets_checking_account,
				assets.savings_account as assets_savings_account,
				assets.mutual_funds as assets_mutual_funds,
				assets.securities as assets_securities,
				assets.other_investments as assets_other_investments,
				assets.retirement_funds as assets_retirement_funds,
				assets.building as assets_building,
				assets.cars as assets_cars,
				assets.other_property as assets_other_property,
				liabilities.mortgage as liabilities_mortgage,
				liabilities.student_debt as liabilities_student_debt,
				liabilities.car_loans as liabilities_car_loans,
				liabilities.credit_card as liabilities_credit_card,
				liabilities.other_liabilities as liabilities_other_liabilities
				FROM assets inner join liabilities on liabilities.user_id = assets.user_id and liabilities.month = assets.month and liabilities.year = assets.year where assets.user_id  = '$user_id' and assets.year = '$year' and assets.month = '$month' and liabilities.user_id  = '$user_id' and liabilities.year = '$year' and liabilities.month = '$month'";
		}
		
		$query = $this->db->query($sql);
		$b = $query->result_array();
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
}
