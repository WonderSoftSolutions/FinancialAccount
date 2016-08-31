<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Api extends REST_Controller {

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('account_model','email_model');
		$this->methods['changepassword_post']['limit'] = 100; // 100 requests per hour per user/key		
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
	
	public function register_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$error = false;
		$userAPIdata; 
		
		
		$firstname = trim(urldecode($_REQUEST['firstname']));
		$lastname = trim(urldecode($_REQUEST['lastname']));
		$email = trim(urldecode($_REQUEST['email']));
		$password= trim(urldecode($_REQUEST['password']));
		$cpassword=trim(urldecode($_REQUEST['cpassword']));
		$Registermethod=trim(urldecode($_REQUEST['Registermethod']));
	
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
		
	function get_user_profile_post()
	{
		$id = trim(urldecode($_REQUEST['usr_id']));
		
		//$id = $this->input->post('usr_id');
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$b['msg'] = 'Profile Details';
		$b['short'] = 'true';
		array_push($a[$this->router->fetch_method()],$this->account_model->get_user_profile($id));
		echo json_encode($a);
	}
	
	function changepassword_post()
	{
		$password['id'] = trim(urldecode($_REQUEST['usr_id']));
		$password['currentpassword'] = trim(urldecode($_REQUEST['currentpassword']));
		$password['npassword'] = trim(urldecode($_REQUEST['npassword']));
		$password['cpassword'] = trim(urldecode($_REQUEST['cpassword']));
		
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
							$user['fname'] = $utemp['fname'];
							$user['lname'] = $utemp['lname'];
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
	
	function check_email_post()
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
	function logout_post()
	{
		$id = trim(urldecode($_REQUEST['usr_id']));
		
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
	
	function recover_post() {
	
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
	
	function login_post()
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
	
	function allterms_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$status = trim(urldecode($_REQUEST['status']));	
		
		$alltemrs = $this->account_model->getactiveTerms($status);//1 active, 0 deactive
		array_push($a[$this->router->fetch_method()],$alltemrs);
		echo json_encode($a);
		
	}
	function goaladdingbyuser_post(){
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$users['id_goal'] = trim(urldecode($_REQUEST['goalname']));	
		$users['id_term'] = trim(urldecode($_REQUEST['termid']));	
		$users['id_cost'] = trim(urldecode($_REQUEST['cost']));	
		$users['id_currentsaved'] = trim(urldecode($_REQUEST['currentsaved']));	
		$users['id_datetimepicker1'] = trim(urldecode($_REQUEST['targetdate']));	
		$users['user_id'] = trim(urldecode($_REQUEST['usr_id']));	
		
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
			$b['usergoalid'] = $result;
			array_push($a[$this->router->fetch_method()],$b);
		}
		else if($result == 'alreadyexists'){
			$b['msg'] = 'Goal Aready Exists!!!';
			$b['short'] = 'false';
			$b['description'] ='This Goal Already Exists in your list!';
			array_push($a[$this->router->fetch_method()],$b);
		}
		echo json_encode($a);
	}
	
	function goaldelete_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$user_goals['id'] = trim(urldecode($_REQUEST['user_goal_id']));	
		$user_goals['user_id'] = trim(urldecode($_REQUEST['user_id']));	
		$user_goals['goal_status'] = trim(urldecode($_REQUEST['status']));	
		
		$result = $this->account_model->goaldeleteAPI($user_goals);
		$b['msg'] = 'Your Goal updated Successfully!!!';
		$b['short'] = 'true';
		$b['usergoalid'] = $result;
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	function goaleditingbyuser_post(){
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$users['user_id'] = trim(urldecode($_REQUEST['usr_id']));	
		$users['usergoalid'] = trim(urldecode($_REQUEST['user_goal_id']));	
		$users['id_goal'] = trim(urldecode($_REQUEST['goalname']));	
		$users['id_term'] = trim(urldecode($_REQUEST['termid']));	
		$users['id_cost'] = trim(urldecode($_REQUEST['cost']));	
		$users['id_currentsaved'] = trim(urldecode($_REQUEST['currentsaved']));	
		$users['id_datetimepicker1'] = trim(urldecode($_REQUEST['targetdate']));	
			
		$param['targetdate'] = $users['id_datetimepicker1'];
		$param['cost'] = $users['id_cost'];
		$param['saved'] = $users['id_currentsaved'];
		
		$monthlytarget = $this->account_model->monthlytargetCalc($param);
		
		$key = 'id_monthtarget';
		$users[$key] = trim(urldecode($monthlytarget));
		
		
		$result = $this->account_model->goaleditingbyuser($users);
		
		if($result != '' && $result != '0' && $result != 'alreadyexists')
		{
			//success
			$b['msg'] = 'Your Goal is updated Successfully!!!';
			$b['short'] = 'true';
			$b['usergoalid'] = $result;
			array_push($a[$this->router->fetch_method()],$b);
		}
		else if($result == 'alreadyexists'){
			$b['msg'] = 'Goal Name Aready Exists!!!';
			$b['short'] = 'false';
			$b['description'] ='This Goal Name Already Exists in your list!';
			array_push($a[$this->router->fetch_method()],$b);
		}
		echo json_encode($a);
	}
	function overallprogress_post()
	{
		$userid = trim(urldecode($_REQUEST['usr_id']));	
		
		$a[$this->router->fetch_method()]=array();
		$b['msg'] = $this->account_model->getoverallprogress($userid);
		$b['short'] = 'true';
		$b['description'] ='Overall Progress API';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	function totalincome_post(){
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$users['usr_id'] = trim(urldecode($_REQUEST['usr_id']));	
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
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
	
	function totalexpenses_post(){
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$users['user_id'] = trim(urldecode($_REQUEST['usr_id']));
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
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
}
