<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		// header('Access-Control-Allow-Origin: *');
		// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();		
	}
	
	public $data = array();
	
	public function index()
	{
		if($this->account_model->user_check_login() == 'false')
		{
			$this->form_validation->set_rules('emailReg', 'Email ID', 'trim|required|valid_email');//done
			$this->form_validation->set_rules('passwd', 'Password', 'trim|required|md5'); //done
				
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('account_login',$this->data);
			}
			else{
			
				$users['user_login'] = $this->input->post('emailReg'); //done
				$users['user_pass'] = $this->input->post('passwd');
					
					
				if($this->account_model->do_login($users) == true){
				
					//if($this->session->userdata('user_status') == 0){
						//redirect(base_url().'account/dashboard');
						redirect(base_url().'pages/AddNewGoal');
					// }
					// else
					// {
						// redirect(base_url().'ci-admin');
					// }
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Login details wrong or may be account not activated</div>');
					redirect('account');
				}
			}
		}
		else
		{
			//redirect(base_url().'account/dashboard');
			redirect(base_url().'pages/AddNewGoal');
		}
	}
	
	public function Create()
	{
	
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]'); //done
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]'); //done
		$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');//done
		$this->form_validation->set_rules('pwd', 'Password', 'trim|required|matches[cpassword]|md5'); //done
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required'); //done
		//$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{		
			$this->load->view('account_register',$this->data);
		}
		else
		{
		
			$user['id'] = '';
			$user['fname'] = $this->input->post('fname');
			$user['lname'] = $this->input->post('lname');
			$user['email'] = $this->input->post('email');
			
			$user['pwd'] = $this->input->post('pwd');
			//$user['dob'] = $this->input->post('dob');
			$user['register_method'] = 'Website';
			$user['email_verified'] = '0';
			$user['status'] = '0';//$user['status'] = '0';
			//$this->account_model->register($user);
			$result = $this->account_model->check_email($user['email']);
			if($result == false)
			{
				$result = $this->account_model->register($user);
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
				redirect('account/Create');
			}
			else
			{	
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Email already in our database!!!</div>');
				redirect('account/Create');
				//return "email already in our database";
			}
			
			
		}
	}
		
	function logout($id=null)
	{
		if($id!= null)
		{
			$this->account_model->do_logout();
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Logout Successfully!</div>');
			$this->load->view('account_login',$this->data);
		}else{
			redirect('account');
		}
	}
	
	function dashboard()
	{
		$this->load->view('header',$this->data);
		$this->load->view('dashboard',$this->data);
		$this->load->view('footer',$this->data);
	}
	
	function changepassword()
	{
		$password['currentpassword'] = $this->input->post('currentpassword');
		$password['npassword'] = $this->input->post('npassword');
		$password['cpassword'] = $this->input->post('cpassword');
		$password['id'] = $this->session->userdata('usr_id');
		$result = $this->account_model->check_current_password($password);
		if($result == true)
		{
			$user['pwd'] = md5($this->input->post('cpassword'));
			$user['id'] = $this->session->userdata('usr_id');
			if($this->account_model->register($user) == 'done')
			{
				$user['fname'] = $this->session->userdata('user_fname');
				$user['lname'] = $this->session->userdata('user_lname');
				$user['email'] = $this->session->userdata('user_email');
				$email['mailbody'] = $this->email_model->ChangePwdHTML($user);
				$email['subject'] = 'Password Changed Notification - Micoufinance';
				$this->email_model->send_mail($email,$user);
				echo '<div class="label label-success">Password changed successfully.</div>';
			}else{
				echo '<div class="label label-danger">OOPs, Server down, please try again later!!!</div>';
			}
		}
		else{
			echo '<div class="label label-danger">Current Password not matched !!!</div>';
		}
	}
	
	function check_email()
	{
		echo json_encode($this->account_model->check_email($this->input->post('email')));
	}
	function verify($id = 0)
	{
		$this->account_model->AccountVerify($id);
	}
	
	function recover() {
		echo $this->account_model->RecoverAccount($this->input->post('email'));
	}
	
	function goaladdingbyuser()
	{
		$goal['id_goal'] = $this->input->post('id_goal');
		$goal['id_term'] = $this->input->post('id_term');
		$goal['id_cost'] = $this->input->post('id_cost');
		$goal['id_monthtarget'] = $this->input->post('id_monthtarget');
		$goal['id_currentsaved'] = $this->input->post('id_currentsaved');
		$goal['id_datetimepicker1'] = $this->input->post('id_datetimepicker1');
		echo $this->account_model->goaladdingbyuser($goal);
	}
	
	function goaleditingbyuser()
	{
		$goal['user_id'] = $this->session->userdata('usr_id');
		$goal['usergoalid'] = $this->input->post('usergoalid');
		$goal['id_goal'] = $this->input->post('id_goal');
		$goal['id_term'] = $this->input->post('id_term');
		$goal['id_cost'] = $this->input->post('id_cost');
		$goal['id_monthtarget'] = $this->input->post('id_monthtarget');
		$goal['id_currentsaved'] = $this->input->post('id_currentsaved');
		$goal['id_datetimepicker1'] = $this->input->post('id_datetimepicker1');
		echo $this->account_model->goaleditingbyuser($goal);
	}
	
	function getAllgoals()
	{
		$status = $this->input->post('status'); // $status = 0 deactive | 1 active
		return $this->account_model->getAllgoals($status);
	}
	
	function getactiveGoals()
	{
		$status = $this->input->post('status'); // $status = 0 deactive | 1 active
		return $this->account_model->getactiveGoals($status);
	}
	
	function monthlytargetCalc()
	{
		$month['cost'] = $this->input->post('cost');
		$month['saved'] = $this->input->post('saved');
		$month['targetdate'] = $this->input->post('targetdate');
		
		echo $this->account_model->monthlytargetCalc($month);
		// //echo(strtotime($month['targetdate']));
		// $t=time();
		// $ts2 = strtotime($month['targetdate']);
		// $ts1 = $t;//strtotime($date2);

		// $year1 = date('Y', $ts1);
		// $year2 = date('Y', $ts2);

		// $month1 = date('m', $ts1);
		// $month2 = date('m', $ts2);

		// $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
		// $month['balance'] = ($month['cost'] - $month['saved'] )/ ($diff + 1);
		// echo round($month['balance'],2);
		
	}
	function usergoalManagement()
	{
		$action = $this->input->post('action'); 
		$goal['id'] = $this->input->post('id'); 
		if(trim($action) == 'active')
		{
			$goal['goal_status'] = '1';
		}
		else{
			$goal['goal_status'] = '0';
		}
		echo $this->account_model->goalmanagement($goal);
	}
	
	function updateTotalIncome() //only revenue
	{
		$param['user_id'] = $this->session->userdata('usr_id');
		$param['wife_revenue'] = $this->input->post('wife'); 
		$param['husband_revenue'] = $this->input->post('husband'); 
		$param['bonuses'] = $this->input->post('bonuses'); 
		$param['dividend'] = $this->input->post('divide'); 
		$param['other'] = $this->input->post('other'); 
		$param['year'] = $this->input->post('selectYear'); 
		$param['month'] = $this->input->post('monthid'); 
		$this->account_model->insert_revenue($param);
	}
	
	function updateTotalExpenses() //only Expenses
	{
		$param['user_id'] = $this->session->userdata('usr_id');
	
		$param['retirement'] = $this->input->post('retirement'); 
		$param['mortgage'] = $this->input->post('rent'); 
		$param['home_repairs'] = $this->input->post('homerepairs'); 
		$param['home_insurance'] = $this->input->post('homeinsurance'); 
		$param['garbage'] = $this->input->post('garbage'); 
		$param['electricity'] = $this->input->post('electricity'); 
		$param['water'] = $this->input->post('water'); 
		$param['gas'] = $this->input->post('gas'); 
		$param['internet'] = $this->input->post('internet'); 
		$param['telephone'] = $this->input->post('telephones'); 
		$param['cable_tv'] = $this->input->post('cable'); 
		$param['public_transportation'] = $this->input->post('parking'); 
		$param['car_payment'] = $this->input->post('carpayment'); 
		$param['license_plates'] = $this->input->post('license'); 
		$param['car_repairs'] = $this->input->post('repairs'); 
		$param['insurance'] = $this->input->post('insurance'); 
		$param['charitable'] = $this->input->post('charitable'); 
		$param['child_care'] = $this->input->post('childcare'); 
		$param['clothing'] = $this->input->post('clothing'); 
		$param['entertainment'] = $this->input->post('entertainment'); 
		$param['groceries'] = $this->input->post('groceries'); 
		$param['medical'] = $this->input->post('medical'); 
		$param['personal_barber'] = $this->input->post('personal'); 
		$param['dry_cleaning'] = $this->input->post('drycleaning');

		$param['tithing'] = $this->input->post('tithing'); 
		$param['offerings'] = $this->input->post('offerings'); 
		$param['charities'] = $this->input->post('charities'); 
		$param['personal_loan'] = $this->input->post('personal_loan'); 
		$param['credit_card'] = $this->input->post('credit_card'); 
		$param['student_loan'] = $this->input->post('student_loan');		
		
		$param['year'] = $this->input->post('selectYear'); 
		$param['month'] = $this->input->post('monthid'); 
		$this->account_model->insert_expenses($param);
	}
	function getWhereAreYouGoing()
	{
		$param['year'] = $this->input->post('year'); 
		$param['user_id'] = $this->session->userdata('usr_id');
		//$this->include_model->getWhereAreYouGoaingAjax($param);
		$this->include_model->getWhereAreYouGoaing($param);
	}
	function onPersonalMonthlyBudget()
	{
		$param['monthyear'] = $this->input->post('monthyear'); 
		$param['user_id'] = $this->session->userdata('usr_id');
		echo $this->account_model->onPersonalMonthlyBudget($param);
	}
	
	function onNetWorth()
	{
		$param['monthyear'] = $this->input->post('monthyear'); 
		$param['user_id'] = $this->session->userdata('usr_id');
		echo $this->account_model->onNetWorth($param);
	}
	
	function networthgraph($year,$user)
	{
		if($year == '' && $year == null && $year == '0')
		$year = date('y');
		
		if($user != '' && $user != null && $user != '0')
		{
			$param['year'] = $year;
			$param['user_id'] = $user;
			echo $this->account_model->networthgraph($param);			
		}
		else{
		
		}
		
	}
	
	
	function monthlygraph($year,$user)
	{
		if($year == '' && $year == null && $year == '0')
		{
			$year = date('y');
		}
		
		if($user != '' && $user != null && $user != '0')
		{
			$param['year'] = $year;
			$param['user_id'] = $user;
			echo $this->account_model->graph($param);			
		}
	}
		
	function debtpaymentcalc()
	{
		$param['postmonth'] = $this->input->post('month');
		$param['postselectYear'] = $this->input->post('selectYear');
		
		$param['creditor'] = $this->input->post('creditor');
		$param['amount'] = $this->input->post('balance');
		$param['rate'] = $this->input->post('rate') / 100;
		$param['payment'] = $this->input->post('payment');
		$this->account_model->debtpayment($param);
	}
	
	function totalassestUpdates()
	{
		$param['checking_account'] = $this->input->post('checking_account');
		$param['savings_account'] = $this->input->post('savings_account');
		$param['mutual_funds'] = $this->input->post('mutual_funds');
		$param['securities'] = $this->input->post('securities');
		$param['other_investments'] = $this->input->post('other_investments');
		$param['retirement_funds'] = $this->input->post('retirement_funds');
		$param['building'] = $this->input->post('building');
		$param['cars'] = $this->input->post('cars');
		$param['other_property'] = $this->input->post('other_property');
		$param['year'] = $this->input->post('selectYear');
		$param['month'] = $this->input->post('monthid');
		$param['user_id'] = $this->session->userdata('usr_id');
		$this->account_model->totalassestUpdates($param);
		//echo json_encode($this->input->post());
		//$this->assetesDummy()
	}
	
	
	
}
