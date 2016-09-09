<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		// header('Access-Control-Allow-Origin: *');
		// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();		
	}
	
	public $data = array();
	
	public function goal()
	{
		$this->load->view('header',$this->data);
		$this->load->view('goals',$this->data);
		$this->load->view('footer',$this->data);
	}
	
	public function AddNewGoal() //Assigning new goal
	{
		$this->load->view('header',$this->data);
		$this->load->view('goals_assigning',$this->data);
		$this->load->view('footer',$this->data);
	}
	public function editGoal($id) //Assigning new goal
	{	
		$this->data['usergoalid'] = $id;
		$this->data['usergoal'] = $this->account_model->selectGoal($id);
		$this->load->view('header',$this->data);
		$this->load->view('goals_assigning_edit',$this->data);
		$this->load->view('footer',$this->data);
	}
	
	public function whereyoustand($id = 0)
	{
		if($id==0)
		{
			$id = date('y');
		}
		$this->data['contryear'] = $id;
		$this->load->view('header',$this->data);
		$this->load->view('whereyoustand',$this->data);
		$this->load->view('footer',$this->data);
	}
	// public function whereareyougoing()
	// {
		// $this->load->view('header',$this->data);
		// $this->load->view('whereareyougoing',$this->data);
		// $this->load->view('footer',$this->data);
	// }
	public function whereareyougoing($id = 0)
	{	
		if($id==0)
		{
			$id = date('y');
		}
		$this->data['contryear'] = $id;
		$this->load->view('header',$this->data);
		$this->load->view('whereareyougoing',$this->data);
		$this->load->view('footer',$this->data);
	}
	public function billpayments()
	{
		$bill['status'] = 1;
		$bill['user_id'] = $this->session->userdata('usr_id');
		$this->data['allbills'] = $this->account_model->getallbill($bill);
		
		$this->load->view('header',$this->data);
		$this->load->view('BillPayments',$this->data);
		$this->load->view('footer',$this->data);
	}
	public function debtpayments($month = 0,$year = 0)
	{
		if($month != date('n') && $month != 0)
		{
			$this->data['monthdisable'] = 'disabled';
		}
		if($year != date('n') && $year != 0)
		{
			$this->data['yeardisable'] = 'disabled';
		}
		if($year==0)
		{
			$year = date('y');
		}
		
		if($month==0)
		{
			$month = date('n');
		}

		
		$this->data['contryear'] = $year;
		$this->data['contrmonth'] = $month;
	
		$this->load->view('header',$this->data);
		$this->load->view('debt_payment',$this->data);
		$this->load->view('footer',$this->data);
	}
	public function sandq()
	{
		$this->load->view('header',$this->data);
		$this->load->view('S&Q',$this->data);
		$this->load->view('footer',$this->data);
	}
}
