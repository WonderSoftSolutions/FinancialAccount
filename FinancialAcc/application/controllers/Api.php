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
		//print_r($this->post());
		$error = false;
		$userAPIdata; 
		$this->url_elements = explode('&', $this->post()[0]);
		//print_r($this->url_elements);
		for($i = 0; $i < sizeof($this->url_elements); $i++)
		{
			
			$array = explode('=', $this->url_elements[$i]);
			//print_r($array);
			//echo 'key '.$array[0].' value '.$array[1];
			$key = $array[0];
			if((trim(urldecode($key)) == 'firstname') || (trim(urldecode($key)) == 'lastname'))
			{
				if($this->namevalidation($array[1]) == false)
				{
					$b['msg'] = 'Validation fails!!!';
					$b['short'] = 'false';
					$b['description'] = $key. ' validation fails '.$array[1];
					array_push($a[$this->router->fetch_method()],$b);
					$error = true;
					//break;
				}
			}
			if((trim(urldecode($key)) == 'pwd'))
			{
				$key = 'password';
			}
			// if($key == 'email')
			// {
				// $eresult = $this->account_model->check_email($array[1]);
				// if($eresult == true)
				// {
					// $b['msg'] = 'Email already in our database';
					// $b['short'] = 'false';
					// $b['description'] = $key. ' database duplicate value';
					// array_push($a[$this->router->fetch_method()],$b);
					// $error = true;
					// //break;
				// }
			// }
			$userAPIdata[trim(urldecode($key))] = $array[1];
		}
		
		
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
	
		$id;
		
		//$this->url_elements = explode('&', $this->post());
		//print_r($this->post()[0]);
		
		$array = explode('=', $this->post()[0]);
		//echo 'key '.$array[0].' value '.$array[1];
		$key = $array[0];
		if(trim(urldecode($key)) == 'usr_id')
		{
			$id = $array[1];
		}
		
	
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
		$password; 
		$this->url_elements = explode('&', $this->post()[0]);
		for($i = 0; $i < sizeof($this->url_elements); $i++)
		{
			$array = explode('=', $this->url_elements[$i]);
			//echo 'key '.$array[0].' value '.$array[1];
			$key = $array[0];
			if(trim(urldecode($key)) == 'usr_id')
			{
				$key = 'id';
			}
			$password[$key] = $array[1];
		}
		//print_r($password);
		
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
	
		$email = ''; 
		
		//$this->url_elements = explode('&', $this->post());
		//print_r($this->post()[0]);
		
		$array = explode('=', $this->post()[0]);
		//echo 'key '.$array[0].' value '.$array[1];
		$key = $array[0];
		if(trim(urldecode($key)) == 'email')
		{
			$email = urldecode($array[1]);
		}
		
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
	
		$id = null; 
		
		//$this->url_elements = explode('&', $this->post());
		//print_r($this->post()[0]);
		
		$array = explode('=', $this->post()[0]);
		//echo 'key '.$array[0].' value '.$array[1];
		$key = $array[0];
		if(trim(urldecode($key)) == 'usr_id')
		{
			$id = urldecode($array[1]);
		}
		
		
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
	
		$email = ''; 
		//$this->url_elements = explode('&', $this->post());
		//print_r($this->post()[0]);
		
		$array = explode('=', $this->post()[0]);
		//echo 'key '.$array[0].' value '.$array[1];
		$key = $array[0];
		if(trim(urldecode($key)) == 'email')
		{
			$email = urldecode($array[1]);
		}
		
		//print_r($email);
	
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
		/* old code 
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$users; 
		$this->url_elements = explode('&', $this->post()[0]);
		for($i = 0; $i < sizeof($this->url_elements); $i++)
		{
			$array = explode('=', $this->url_elements[$i]);
			$key = $array[0];
			if(trim(urldecode($key)) == 'email')
			{
				$key = 'user_login';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'password')
			{
				$key = 'user_pass';
				$users[$key] = md5(trim(urldecode($array[1])));
			}
		}
		$logresult = $this->account_model->do_loginAPI($users);
		if($logresult != false){
				
			$userid = $logresult;
			$b['msg'] = 'Logged In!!!';
			$b['short'] = 'true';
			$b['userid'] = $userid;
			array_push($a[$this->router->fetch_method()],$b);
		}
		else
		{
			$b['msg'] = 'Internal server error!!!';
			$b['short'] = 'false';
			$b['description'] ='Login details wrong or may be account not activated';
			array_push($a[$this->router->fetch_method()],$b);
		}
		echo json_encode($a);
		//Old code */
	}
	
	function allterms_post()
	{
		$a[$this->router->fetch_method()]=array();
		$b=array();
		
		$array = explode('=', $this->post()[0]);
		$key = $array[0];
		$status = 0;
		if(trim(urldecode($key)) == 'status')
		{
			$status = urldecode($array[1]);
		}
		$alltemrs = $this->account_model->getactiveTerms($status);//1 active, 0 deactive
		array_push($a[$this->router->fetch_method()],$alltemrs);
		echo json_encode($a);
		
	}
	function goaladdingbyuser_post(){
		
		$a[$this->router->fetch_method()]=array();
		$b=array();
		$this->url_elements = explode('&', $this->post()[0]);
		$users;
		for($i = 0; $i < sizeof($this->url_elements); $i++)
		{
			$array = explode('=', $this->url_elements[$i]);
			//echo 'key '.$array[0].' value '.$array[1];
			$key = $array[0];
			if(trim(urldecode($key)) == 'goalname')
			{
				$key = 'id_goal';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'termid')
			{
				$key = 'id_term';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'cost')
			{
				$key = 'id_cost';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'currentsaved')
			{
				$key = 'id_currentsaved';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'targetdate')
			{
				$key = 'id_datetimepicker1';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'usr_id')
			{
				$key = 'user_id';
				$users[$key] = trim(urldecode($array[1]));
			}
		}
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
		$this->url_elements = explode('&', $this->post()[0]);
		$user_goals;
		for($i = 0; $i < sizeof($this->url_elements); $i++)
		{
			$array = explode('=', $this->url_elements[$i]);
			//echo 'key '.$array[0].' value '.$array[1];
			$key = $array[0];
			if(trim(urldecode($key)) == 'user_goal_id')
			{
				$key = 'id';
				$user_goals[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'user_id')
			{
				$key = 'user_id';
				$user_goals[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'status')
			{
				$key = 'goal_status';
				$user_goals[$key] = trim(urldecode($array[1]));
			}
		}
		
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
		$this->url_elements = explode('&', $this->post()[0]);
		$users;
		for($i = 0; $i < sizeof($this->url_elements); $i++)
		{
			$array = explode('=', $this->url_elements[$i]);
			//echo 'key '.$array[0].' value '.$array[1];
			$key = $array[0];
			if(trim(urldecode($key)) == 'usr_id')
			{
				$key = 'user_id';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'user_goal_id')
			{
				$key = 'usergoalid';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'goalname')
			{
				$key = 'id_goal';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'termid')
			{
				$key = 'id_term';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'cost')
			{
				$key = 'id_cost';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'currentsaved')
			{
				$key = 'id_currentsaved';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'targetdate')
			{
				$key = 'id_datetimepicker1';
				$users[$key] = trim(urldecode($array[1]));
			}
			
		}
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
		$userid = ''; 
		$array = explode('=', $this->post()[0]);
		$key = $array[0];
		if(trim(urldecode($key)) == 'usr_id')
		{
			$userid = urldecode($array[1]);
		}
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
		$this->url_elements = explode('&', $this->post()[0]);
		$users;
		for($i = 0; $i < sizeof($this->url_elements); $i++)
		{
			$array = explode('=', $this->url_elements[$i]);
			$key = $array[0];
			if(trim(urldecode($key)) == 'usr_id')
			{
				$key = 'user_id';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'wife_revenue')
			{
				$key = 'wife_revenue';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'husband_revenue')
			{
				$key = 'husband_revenue';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'bonuses')
			{
				$key = 'bonuses';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'dividend')
			{
				$key = 'dividend';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'other')
			{
				$key = 'other';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'year')
			{
				$key = 'year';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'month')
			{
				$key = 'month';
				$users[$key] = trim(urldecode($array[1]));
			}
		}
		
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
		$this->url_elements = explode('&', $this->post()[0]);
		$users;
		for($i = 0; $i < sizeof($this->url_elements); $i++)
		{
			$array = explode('=', $this->url_elements[$i]);
			$key = $array[0];
			if(trim(urldecode($key)) == 'usr_id')
			{
				$key = 'user_id';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'retirement')
			{
				$key = 'retirement';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'mortgage')
			{
				$key = 'mortgage';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'home_repairs')
			{
				$key = 'home_repairs';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'home_insurance')
			{
				$key = 'home_insurance';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'garbage')
			{
				$key = 'garbage';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'electricity')
			{
				$key = 'electricity';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'water')
			{
				$key = 'water';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'gas')
			{
				$key = 'gas';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'internet')
			{
				$key = 'internet';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'telephone')
			{
				$key = 'telephone';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'cable_tv')
			{
				$key = 'cable_tv';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'public_transportation')
			{
				$key = 'public_transportation';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'car_payment')
			{
				$key = 'car_payment';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'license_plates')
			{
				$key = 'license_plates';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'car_repairs')
			{
				$key = 'car_repairs';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'insurance')
			{
				$key = 'insurance';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'charitable')
			{
				$key = 'charitable';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'child_care')
			{
				$key = 'child_care';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'clothing')
			{
				$key = 'clothing';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'entertainment')
			{
				$key = 'entertainment';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'groceries')
			{
				$key = 'groceries';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'medical')
			{
				$key = 'medical';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'personal_barber')
			{
				$key = 'personal_barber';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'dry_cleaning')
			{
				$key = 'dry_cleaning';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'tithing')
			{
				$key = 'tithing';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'offerings')
			{
				$key = 'offerings';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'charities')
			{
				$key = 'charities';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'personal_loan')
			{
				$key = 'personal_loan';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'credit_card')
			{
				$key = 'credit_card';
				$users[$key] = trim(urldecode($array[1]));
			}
			if(trim(urldecode($key)) == 'student_loan')
			{
				$key = 'student_loan';
				$users[$key] = trim(urldecode($array[1]));
			}
			
			
			// $param['tithing'] = $this->input->post('tithing'); 
			// $param['offerings'] = $this->input->post('offerings'); 
			// $param['charities'] = $this->input->post('charities'); 
			// $param['personal_loan'] = $this->input->post('personal_loan'); 
			// $param['credit_card'] = $this->input->post('credit_card'); 
			// $param['student_loan'] = $this->input->post('student_loan');
			
		}
		
		$result = $this->account_model->insert_expenses($users);
		
		$b['msg'] = "Expenses saved";
		$b['short'] = 'true';
		$b['description'] ='Expenses saved with us';
		array_push($a[$this->router->fetch_method()],$b);
		echo json_encode($a);
	}
}
