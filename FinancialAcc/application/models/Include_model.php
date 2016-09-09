<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Include_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	
	function getRevenue($param)
	{	
		$users = $param;
		$this->db->where('year',$param['year']);
		$this->db->where('user_id',$param['user_id']);
		$query = $this->db->get('revenue');
		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		else
		{
			$zero = '0';
			$data = array(
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '1' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '2' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '3' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '4' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '5' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '6' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '7' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '8' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '9' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '10' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '11' ,
					'user_id' => $users['user_id']
				),
				array(
					'wife_revenue' => $zero ,
					'husband_revenue' => $zero ,
					'bonuses' => $zero,
					'dividend' => $zero ,
					'other' => $zero ,
					'year' => $users['year'] ,
					'month' => '12' ,
					'user_id' => $users['user_id']
				)				
			);
			return $data;
		}
	}
	
	function getExpenses($param)
	{	
	
		$users = $param;
		$this->db->where('year',$param['year']);
		$this->db->where('user_id',$param['user_id']);
		$query = $this->db->get('expenses');
		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		else
		{
			$zero = '0';
			$data = array(
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '1' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '2' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '3' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '4' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '5' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '6' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '7' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '8' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '9' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '10' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '11' ,
					'user_id' => $users['user_id']
				),
				array(
					'retirement' 			=> $zero,
					'mortgage' 				=> $zero,
					'home_repairs' 			=> $zero,
					'home_insurance' 		=> $zero,
					'garbage' 				=> $zero,
					'electricity' 			=> $zero,
					'water'					=> $zero,
					'gas' 					=> $zero,
					'internet' 				=> $zero,
					'telephone' 			=> $zero,
					'cable_tv' 				=> $zero,
					'public_transportation' => $zero,
					'car_payment' 			=> $zero,
					'license_plates' 		=> $zero,
					'car_repairs' 			=> $zero,
					'insurance' 			=> $zero,
					'charitable' 			=> $zero,
					'child_care' 			=> $zero,
					'clothing' 				=> $zero,
					'entertainment' 		=> $zero,
					'groceries' 			=> $zero,
					'medical' 				=> $zero,
					'personal_barber' 		=> $zero,
					'dry_cleaning' 			=> $zero,
					'tithing'               => $zero,
					'offerings'             => $zero,
					'charities'             => $zero,
					'personal_loan'         => $zero,
					'credit_card'           => $zero,
					'student_loan'          => $zero,
					'year' => $users['year'] ,
					'month' => '12' ,
					'user_id' => $users['user_id']
				)
			);
			return $data;
		}
	}
	
	
	function getAssets($param)
	{	
		$users = $param;
		$this->db->where('year',$param['year']);
		$this->db->where('user_id',$param['user_id']);
		$query = $this->db->get('assets');
		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		else
		{
			$zero = '0';
			$data = array(
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '1' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '2' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '3' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '4' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '5' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '6' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '7' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '8' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '9' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '10' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '11' ,
					'user_id' => $users['user_id']
				),
				array(
					'checking_account' => $zero ,
					'savings_account' => $zero ,
					'mutual_funds' => $zero,
					'securities' => $zero,
					'other_investments' => $zero,
					'retirement_funds' => $zero,
					'building' => $zero,
					'cars' => $zero,
					'other_property' => $zero,
					'year' => $users['year'] ,
					'month' => '12' ,
					'user_id' => $users['user_id']
				)				
			);
			return $data;
		}
	}
	
	function getLiabilities($param)
	{	
		$users = $param;
		$this->db->where('year',$param['year']);
		$this->db->where('user_id',$param['user_id']);
		$query = $this->db->get('liabilities');
		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
		else
		{
			$zero = '0';
			$data = array(
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '1' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '2' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '3' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '4' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '5' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '6' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '7' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '8' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '9' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '10' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '11' ,
					'user_id' => $users['user_id']
				),
				array(
					'mortgage' => $zero ,
					'student_debt' => $zero ,
					'car_loans' => $zero,
					'credit_card' => $zero,
					'other_liabilities' => $zero,
					'year' => $users['year'] ,
					'month' => '12' ,
					'user_id' => $users['user_id']
				)				
			);
			return $data;
		}
	}
	
	function leftovermoneyTotalcalc($month,$revenues,$expenses)
	{
		return $this->revenueTotalcalc($month,$revenues) - $this->expensesTotalcalc($month,$expenses);
	}
	function revenueTotalcalc($month,$revenues)
	{
		
		if($revenues[$month] == true)
		{
			return $revenues[$month]['wife_revenue'] + $revenues[$month]['husband_revenue'] + $revenues[$month]['bonuses'] + $revenues[$month]['dividend'] + $revenues[$month]['other']; 
		}
		else{
			return '0';
		}
		
	}
	
	function expensesTotalcalc($month,$expenses)
	{
		return 
		$expenses[$month]['retirement'] + 
		$expenses[$month]['mortgage'] + 
		$expenses[$month]['home_repairs'] + 
		$expenses[$month]['home_insurance'] + 
		$expenses[$month]['garbage'] + 
		$expenses[$month]['electricity'] + 
		$expenses[$month]['water'] + 
		$expenses[$month]['gas'] + 
		$expenses[$month]['internet'] + 
		$expenses[$month]['telephone'] + 
		$expenses[$month]['cable_tv'] + 
		$expenses[$month]['public_transportation'] + 
		$expenses[$month]['car_payment'] + 
		$expenses[$month]['license_plates'] + 
		$expenses[$month]['car_repairs'] + 
		$expenses[$month]['insurance'] + 
		$expenses[$month]['charitable'] + 
		$expenses[$month]['child_care'] + 
		$expenses[$month]['clothing'] + 
		$expenses[$month]['entertainment'] + 
		$expenses[$month]['groceries'] + 
		$expenses[$month]['medical'] + 
		$expenses[$month]['personal_barber'] + 
		$expenses[$month]['dry_cleaning'] +
		$expenses[$month]['tithing'] + 
		$expenses[$month]['offerings'] + 
		$expenses[$month]['charities'] + 
		$expenses[$month]['personal_loan'] + 
		$expenses[$month]['credit_card'] + 
		$expenses[$month]['student_loan'];
		
	}
	
	function totalCash($month,$assets)
	{
		
		if($assets[$month] == true)
		{
			return $assets[$month]['checking_account'] + $assets[$month]['savings_account'] + $assets[$month]['mutual_funds']; 
		}
		else{
			return '0';
		}
		
	}
	
	function totalInvestment($month,$assets)
	{
		
		if($assets[$month] == true)
		{
			return $assets[$month]['securities'] + $assets[$month]['other_investments']; 
		}
		else{
			return '0';
		}
		
	}
	
	function totalRetirement($month,$assets)
	{
		
		if($assets[$month] == true)
		{
			return $assets[$month]['retirement_funds']; 
		}
		else{
			return '0';
		}
		
	}
	
	function totalProperty($month,$assets)
	{
		
		if($assets[$month] == true)
		{
			return $assets[$month]['building'] + $assets[$month]['cars'] + $assets[$month]['other_property']; 
		}
		else{
			return '0';
		}
		
	}
	
	function totalAssets($month,$assets)
	{
		return $this->totalCash($month,$assets) + $this->totalInvestment($month,$assets) + $this->totalRetirement($month,$assets) + $this->totalProperty($month,$assets);
	}
	function totalAssetsMOM($month,$assets)
	{
		//$this->totalAssetsMOM(0,$assets);
		//$month == current month
		if($month != 0 && $month != 12)
		{
			return $this->totalAssets($month-1,$assets) - $this->totalAssets($month,$assets);
		}
		else{
			return "0";
		}
	}
	function totalliabilities($month,$liabilities)
	{
		if($liabilities[$month] == true)
		{
			return $liabilities[$month]['mortgage'] + $liabilities[$month]['student_debt'] + $liabilities[$month]['car_loans'] + $liabilities[$month]['credit_card'] + $liabilities[$month]['other_liabilities']; 
		}
		else{
			return '0';
		}	
	}
	function totalliabilitiesMOM($month,$liabilities)
	{
		if($month != 0 && $month != 12)
		{
			return $this->totalliabilities($month-1,$liabilities) - $this->totalliabilities($month,$liabilities);
		}
		else{
			return "0";
		}
	}
	
	function totalNetworth($month,$liabilities,$assets)
	{
		return $this->totalliabilities($month,$liabilities)+$this->totalAssets($month,$assets);
	}
	
	function totalNetMOM($month,$liabilities,$assets)
	{
		if($month != 0 && $month != 12)
		{
			return $this->totalNetworth($month-1,$liabilities, $assets) - $this->totalNetworth($month,$liabilities, $assets);
		}
		else{
			return "0";
		}
	}
	
	
	
	
	
	
	
	function getWhereAreYouGoaing($param)
	{
		$revenues = $this->getRevenue($param);
		//print_r($revenues);
		$expenses = $this->getExpenses($param);
	?>
		<tr>
			<td class= "total_class">Total Income</td>
			<td><input class='form-control commonwidth' type='number' data-id='1'  id='Totalincometxt_1'  disabled  name='Totalincometxt_1'  value='<?php echo $this->revenueTotalcalc(0,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='2'  id='Totalincometxt_2'  disabled  name='Totalincometxt_2'  value='<?php echo $this->revenueTotalcalc(1,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='3'  id='Totalincometxt_3'  disabled  name='Totalincometxt_3'  value='<?php echo $this->revenueTotalcalc(2,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='4'  id='Totalincometxt_4'  disabled  name='Totalincometxt_4'  value='<?php echo $this->revenueTotalcalc(3,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='5'  id='Totalincometxt_5'  disabled  name='Totalincometxt_5'  value='<?php echo $this->revenueTotalcalc(4,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='6'  id='Totalincometxt_6'  disabled  name='Totalincometxt_6'  value='<?php echo $this->revenueTotalcalc(5,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='7'  id='Totalincometxt_7'  disabled  name='Totalincometxt_7'  value='<?php echo $this->revenueTotalcalc(6,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='8'  id='Totalincometxt_8'  disabled  name='Totalincometxt_8'  value='<?php echo $this->revenueTotalcalc(7,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='9'  id='Totalincometxt_9'  disabled  name='Totalincometxt_9'  value='<?php echo $this->revenueTotalcalc(8,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='10' id='Totalincometxt_10'  disabled name='Totalincometxt_10' value='<?php echo $this->revenueTotalcalc(9,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='11' id='Totalincometxt_11'  disabled name='Totalincometxt_11' value='<?php echo $this->revenueTotalcalc(10,$revenues); ?>'  /></td>
			<td><input class='form-control commonwidth' type='number' data-id='12' id='Totalincometxt_12'  disabled name='Totalincometxt_12' value='<?php echo $this->revenueTotalcalc(11,$revenues); ?>'  /></td>
		</tr>
		<tr>
			<td class= "total_class">Total Expenses</td>
			<td><input class='form-control commonwidth' type='number' data-id='1'  id='TotalExpensestxt_1'  disabled  name='TotalExpensestxt_1'  value='<?php echo $this->expensesTotalcalc(0,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='2'  id='TotalExpensestxt_2'  disabled  name='TotalExpensestxt_2'  value='<?php echo $this->expensesTotalcalc(1,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='3'  id='TotalExpensestxt_3'  disabled  name='TotalExpensestxt_3'  value='<?php echo $this->expensesTotalcalc(2,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='4'  id='TotalExpensestxt_4'  disabled  name='TotalExpensestxt_4'  value='<?php echo $this->expensesTotalcalc(3,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='5'  id='TotalExpensestxt_5'  disabled  name='TotalExpensestxt_5'  value='<?php echo $this->expensesTotalcalc(4,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='6'  id='TotalExpensestxt_6'  disabled  name='TotalExpensestxt_6'  value='<?php echo $this->expensesTotalcalc(5,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='7'  id='TotalExpensestxt_7'  disabled  name='TotalExpensestxt_7'  value='<?php echo $this->expensesTotalcalc(6,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='8'  id='TotalExpensestxt_8'  disabled  name='TotalExpensestxt_8'  value='<?php echo $this->expensesTotalcalc(7,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='9'  id='TotalExpensestxt_9'  disabled  name='TotalExpensestxt_9'  value='<?php echo $this->expensesTotalcalc(8,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='10' id='TotalExpensestxt_10'  disabled name='TotalExpensestxt_10' value='<?php echo $this->expensesTotalcalc(9,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='11' id='TotalExpensestxt_11'  disabled name='TotalExpensestxt_11' value='<?php echo $this->expensesTotalcalc(10,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='12' id='TotalExpensestxt_12'  disabled name='TotalExpensestxt_12' value='<?php echo $this->expensesTotalcalc(11,$expenses); ?>' /></td>
		</tr>
		<tr>
			<td class= "total_class">Left Over Money</td>
			<td><input class='form-control commonwidth' type='number' data-id='1'  id='LeftOverMoney_1' disabled  name='LeftOverMoney_1'  value='<?php echo $this->leftovermoneyTotalcalc(0,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='2'  id='LeftOverMoney_2' disabled  name='LeftOverMoney_2'  value='<?php echo $this->leftovermoneyTotalcalc(1,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='3'  id='LeftOverMoney_3' disabled  name='LeftOverMoney_3'  value='<?php echo $this->leftovermoneyTotalcalc(2,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='4'  id='LeftOverMoney_4' disabled  name='LeftOverMoney_4'  value='<?php echo $this->leftovermoneyTotalcalc(3,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='5'  id='LeftOverMoney_5' disabled  name='LeftOverMoney_5'  value='<?php echo $this->leftovermoneyTotalcalc(4,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='6'  id='LeftOverMoney_6' disabled  name='LeftOverMoney_6'  value='<?php echo $this->leftovermoneyTotalcalc(5,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='7'  id='LeftOverMoney_7' disabled  name='LeftOverMoney_7'  value='<?php echo $this->leftovermoneyTotalcalc(6,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='8'  id='LeftOverMoney_8' disabled  name='LeftOverMoney_8'  value='<?php echo $this->leftovermoneyTotalcalc(7,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='9'  id='LeftOverMoney_9' disabled  name='LeftOverMoney_9'  value='<?php echo $this->leftovermoneyTotalcalc(8,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='10' id='LeftOverMoney_10' disabled name='LeftOverMoney_10' value='<?php echo $this->leftovermoneyTotalcalc(9,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='11' id='LeftOverMoney_11' disabled name='LeftOverMoney_11' value='<?php echo $this->leftovermoneyTotalcalc(10,$revenues,$expenses); ?>' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='12' id='LeftOverMoney_12' disabled name='LeftOverMoney_12' value='<?php echo $this->leftovermoneyTotalcalc(11,$revenues,$expenses); ?>' /></td>
		</tr>
	<tr><th colspan='13'>Revenue</th></tr>
	
	<tr>
		<th colspan='13'>Income</th>
	</tr>
		<tr>
			<td>Wife</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$wife_revenue =  $revenues[$i]['wife_revenue'];
				?>
				<td><input class='form-control wife' type='number' data-id='<?php echo $i+1; ?>'  id='wife_<?php echo $i+1; ?>' name='wife_<?php echo $i+1; ?>' value='<?php echo $wife_revenue; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Husband</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$husband_revenue =  $revenues[$i]['husband_revenue'];
				?>
				<td><input class='form-control husband' type='number' data-id='<?php echo $i+1; ?>'  id='husband_<?php echo $i+1; ?>' name='husband_<?php echo $i+1; ?>' value='<?php echo $husband_revenue; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Bonuses</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$bonuses =  $revenues[$i]['bonuses'];
				?>
				<td><input class='form-control bonus' type='number' data-id='<?php echo $i+1; ?>'  id='bonuses_<?php echo $i+1; ?>'  name='bonuses_<?php echo $i+1; ?>'  value='<?php echo $bonuses; ?>'  min='0' /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Dividend/Interest</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$dividend =  $revenues[$i]['dividend'];
				?>
				<td><input class='form-control dividend' type='number' data-id='<?php echo $i+1; ?>'  id='dividend_<?php echo $i+1; ?>'  name='dividend_<?php echo $i+1; ?>'  value='<?php echo $dividend; ?>' min='0' /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Other</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$other =  $revenues[$i]['other'];
				?>
				<td><input class='form-control other' type='number' data-id='<?php echo $i+1; ?>'  id='other_<?php echo $i+1; ?>'  name='other_<?php echo $i+1; ?>'  value='<?php echo $other; ?>' min='0' /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td class= "total_class">Total Income</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='totalincome_1' name='totalincome_1'>
			<?php echo $this->revenueTotalcalc(0,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='totalincome_2' name='totalincome_2'>
			<?php echo $this->revenueTotalcalc(1,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='totalincome_3' name='totalincome_3'>
			<?php echo $this->revenueTotalcalc(2,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='totalincome_4' name='totalincome_4'>
			<?php echo $this->revenueTotalcalc(3,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='totalincome_5' name='totalincome_5'>
			<?php echo $this->revenueTotalcalc(4,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='totalincome_6' name='totalincome_6'>
			<?php echo $this->revenueTotalcalc(5,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='totalincome_7' name='totalincome_7'>
			<?php echo $this->revenueTotalcalc(6,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='totalincome_8' name='totalincome_8'>
			<?php echo $this->revenueTotalcalc(7,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='totalincome_9' name='totalincome_9'>
			<?php echo $this->revenueTotalcalc(8,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='totalincome_10' name='totalincome_10'>
			<?php echo $this->revenueTotalcalc(9,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='totalincome_11' name='totalincome_11'>
			<?php echo $this->revenueTotalcalc(10,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='totalincome_12' name='totalincome_12'>
			<?php echo $this->revenueTotalcalc(11,$revenues); ?>
			</span>
			</div></td>
		</tr>
		<tr><th colspan='13'>Expenses</th></tr>
	
		<tr>
			<th colspan='13'>Saving</th>
		</tr>
		<tr>
			<td>Retirement</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$retirement =  $expenses[$i]['retirement'];
				?>
				<td><input class='form-control retirementExp retirement' type='number' data-id='<?php echo $i+1; ?>'  id='retirement_<?php echo $i+1; ?>' name='retirement_<?php echo $i+1; ?>' value='<?php echo $retirement; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<th colspan='13'>Home</th>
		</tr>
	</thead>
		<tr>
			<td>Mortgage or Rent</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$mortgage =  $expenses[$i]['mortgage'];
				?>
				<td><input class='form-control retirementExp rent' type='number' data-id='<?php echo $i+1; ?>'  id='rent_<?php echo $i+1; ?>' name='rent_<?php echo $i+1; ?>' value='<?php echo $mortgage; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Home Repairs/Maintenance</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$home_repairs =  $expenses[$i]['home_repairs'];
				?>
				<td><input class='form-control retirementExp homerepairs' type='number' data-id='<?php echo $i+1; ?>'  id='homerepairs_<?php echo $i+1; ?>' name='homerepairs_<?php echo $i+1; ?>' value='<?php echo $home_repairs; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Home Insurance</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$home_insurance =  $expenses[$i]['home_insurance'];
				?>
				<td><input class='form-control retirementExp homeinsurance' type='number' data-id='<?php echo $i+1; ?>'  id='homeinsurance_<?php echo $i+1; ?>' name='homeinsurance_<?php echo $i+1; ?>' value='<?php echo $home_insurance; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<th colspan='13'>Utilities</th>
		</tr>
	</thead>
		<tr>
			<td>Garbage/Trash Service</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$garbage =  $expenses[$i]['garbage'];
				?>
				<td><input class='form-control retirementExp garbage' type='number' data-id='<?php echo $i+1; ?>'  id='garbage_<?php echo $i+1; ?>' name='garbage_<?php echo $i+1; ?>' value='<?php echo $garbage; ?>' min='0'  /></td>
				<?php
			}
			?>			
		</tr>
		<tr>
			<td>Electricity</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$electricity =  $expenses[$i]['electricity'];
				?>
				<td><input class='form-control retirementExp electricity' type='number' data-id='<?php echo $i+1; ?>'  id='electricity_<?php echo $i+1; ?>' name='electricity_<?php echo $i+1; ?>' value='<?php echo $electricity; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Water/Sewer</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$water =  $expenses[$i]['water'];
				?>
				<td><input class='form-control retirementExp water' type='number' data-id='<?php echo $i+1; ?>'  id='water_<?php echo $i+1; ?>' name='water_<?php echo $i+1; ?>' value='<?php echo $water; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Gas</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$gas =  $expenses[$i]['gas'];
				?>
				<td><input class='form-control retirementExp gas' type='number' data-id='<?php echo $i+1; ?>'  id='gas_<?php echo $i+1; ?>' name='gas_<?php echo $i+1; ?>' value='<?php echo $gas; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Internet</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$internet =  $expenses[$i]['internet'];
				?>
				<td><input class='form-control retirementExp internet' type='number' data-id='<?php echo $i+1; ?>'  id='internet_<?php echo $i+1; ?>' name='internet_<?php echo $i+1; ?>' value='<?php echo $internet; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Telephones (land-lines and cell phones)</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$telephone =  $expenses[$i]['telephone'];
				?>
				<td><input class='form-control retirementExp telephones' type='number' data-id='<?php echo $i+1; ?>'  id='telephones_<?php echo $i+1; ?>' name='telephones_<?php echo $i+1; ?>' value='<?php echo $telephone; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Cable/TV:</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$cable_tv =  $expenses[$i]['cable_tv'];
				?>
				<td><input class='form-control retirementExp cable' type='number' data-id='<?php echo $i+1; ?>'  id='cable_<?php echo $i+1; ?>' name='cable_<?php echo $i+1; ?>' value='<?php echo $cable_tv; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<th colspan='13'>Transportation</th>
		</tr>
	</thead>
		<tr>
			<td>Gas/Public Transportation/ Parking</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$public_transportation =  $expenses[$i]['public_transportation'];
				?>
				<td><input class='form-control retirementExp parking' type='number' data-id='<?php echo $i+1; ?>'  id='parking_<?php echo $i+1; ?>' name='parking_<?php echo $i+1; ?>' value='<?php echo $public_transportation; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Car Payment</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$car_payment =  $expenses[$i]['car_payment'];
				?>
				<td><input class='form-control retirementExp carpayment' type='number' data-id='<?php echo $i+1; ?>'  id='carpayment_<?php echo $i+1; ?>' name='carpayment_<?php echo $i+1; ?>' value='<?php echo $car_payment; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>License Plates/Registration Fees</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$license_plates =  $expenses[$i]['license_plates'];
				?>
				<td><input class='form-control retirementExp license' type='number' data-id='<?php echo $i+1; ?>'  id='license_<?php echo $i+1; ?>' name='license_<?php echo $i+1; ?>' value='<?php echo $license_plates; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Car Repairs and Maintenance</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$car_repairs =  $expenses[$i]['car_repairs'];
				?>
				<td><input class='form-control retirementExp repairs' type='number' data-id='<?php echo $i+1; ?>'  id='repairs_<?php echo $i+1; ?>' name='repairs_<?php echo $i+1; ?>' value='<?php echo $car_repairs; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<th colspan='13'>Personal Care</th>
		</tr>
	</thead>
		<tr>
			<td>Insurance (Life, Disability, Health)</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$insurance =  $expenses[$i]['insurance'];
				?>
				<td><input class='form-control retirementExp insurance' type='number' data-id='<?php echo $i+1; ?>'  id='insurance_<?php echo $i+1; ?>' name='insurance_<?php echo $i+1; ?>' value='<?php echo $insurance; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Charitable/Donation/Gifts</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$charitable =  $expenses[$i]['charitable'];
				?>
				<td><input class='form-control retirementExp charitable' type='number' data-id='<?php echo $i+1; ?>'  id='charitable_<?php echo $i+1; ?>' name='charitable_<?php echo $i+1; ?>' value='<?php echo $charitable; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Child Care/Tuition</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$child_care =  $expenses[$i]['child_care'];
				?>
				<td><input class='form-control retirementExp childcare' type='number' data-id='<?php echo $i+1; ?>'  id='childcare_<?php echo $i+1; ?>' name='childcare_<?php echo $i+1; ?>' value='<?php echo $child_care; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Clothing</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$clothing =  $expenses[$i]['clothing'];
				?>
				<td><input class='form-control retirementExp clothing' type='number' data-id='<?php echo $i+1; ?>'  id='clothing_<?php echo $i+1; ?>' name='clothing_<?php echo $i+1; ?>' value='<?php echo $clothing; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Entertainment (Movies, Restaurant,  trips, Magazines & Newspapers, etc</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$entertainment =  $expenses[$i]['entertainment'];
				?>
				<td><input class='form-control retirementExp entertainment' type='number' data-id='<?php echo $i+1; ?>'  id='entertainment_<?php echo $i+1; ?>' name='entertainment_<?php echo $i+1; ?>' value='<?php echo $entertainment; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Groceries</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$groceries =  $expenses[$i]['groceries'];
				?>
				<td><input class='form-control retirementExp groceries' type='number' data-id='<?php echo $i+1; ?>'  id='groceries_<?php echo $i+1; ?>' name='groceries_<?php echo $i+1; ?>' value='<?php echo $groceries; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Medical</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$medical =  $expenses[$i]['medical'];
				?>
				<td><input class='form-control retirementExp medical' type='number' data-id='<?php echo $i+1; ?>'  id='medical_<?php echo $i+1; ?>' name='medical_<?php echo $i+1; ?>' value='<?php echo $medical; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Personal (Barber, beauty shop)</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$personal_barber =  $expenses[$i]['personal_barber'];
				?>
				<td><input class='form-control retirementExp personal' type='number' data-id='<?php echo $i+1; ?>'  id='personal_<?php echo $i+1; ?>' name='personal_<?php echo $i+1; ?>' value='<?php echo $personal_barber; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Dry Cleaning</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$dry_cleaning =  $expenses[$i]['dry_cleaning'];
				?>
				<td><input class='form-control retirementExp drycleaning' type='number' data-id='<?php echo $i+1; ?>'  id='drycleaning_<?php echo $i+1; ?>' name='drycleaning_<?php echo $i+1; ?>' value='<?php echo $dry_cleaning; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<th colspan='13'>Giving</th>
		</tr>
	</thead>
		<tr>
			<td>Tithing</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$tithing =  $expenses[$i]['tithing'];
				?>
				<td><input class='form-control retirementExp tithing' type='number' data-id='<?php echo $i+1; ?>'  id='tithing_<?php echo $i+1; ?>' name='tithing_<?php echo $i+1; ?>' value='<?php echo $tithing; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Offerings</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$offerings =  $expenses[$i]['offerings'];
				?>
				<td><input class='form-control retirementExp offerings' type='number' data-id='<?php echo $i+1; ?>'  id='offerings_<?php echo $i+1; ?>' name='offerings_<?php echo $i+1; ?>' value='<?php echo $offerings; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Charities</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$charities =  $expenses[$i]['charities'];
				?>
				<td><input class='form-control retirementExp charities' type='number' data-id='<?php echo $i+1; ?>'  id='charities_<?php echo $i+1; ?>' name='charities_<?php echo $i+1; ?>' value='<?php echo $charities; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<th colspan='13'>Debt</th>
		</tr>
	</thead>
		<tr>
			<td>Personal loan</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$personal_loan =  $expenses[$i]['personal_loan'];
				?>
				<td><input class='form-control retirementExp personal_loan' type='number' data-id='<?php echo $i+1; ?>'  id='personal_loan_<?php echo $i+1; ?>' name='personal_loan_<?php echo $i+1; ?>' value='<?php echo $personal_loan; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Credit Card</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$credit_card =  $expenses[$i]['credit_card'];
				?>
				<td><input class='form-control retirementExp credit_card' type='number' data-id='<?php echo $i+1; ?>'  id='credit_card_<?php echo $i+1; ?>' name='credit_card_<?php echo $i+1; ?>' value='<?php echo $credit_card; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Student Loan</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$student_loan =  $expenses[$i]['student_loan'];
				?>
				<td><input class='form-control retirementExp student_loan' type='number' data-id='<?php echo $i+1; ?>'  id='student_loan_<?php echo $i+1; ?>' name='student_loan_<?php echo $i+1; ?>' value='<?php echo $student_loan; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td class= "total_class">Total Expenses</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1'  id='totalexpenses_1' name='totalexpenses_1'><?php echo $this->expensesTotalcalc(0,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='2'  id='totalexpenses_2' name='totalexpenses_2'><?php echo $this->expensesTotalcalc(1,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='3'  id='totalexpenses_3' name='totalexpenses_3'><?php echo $this->expensesTotalcalc(2,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='4'  id='totalexpenses_4' name='totalexpenses_4'><?php echo $this->expensesTotalcalc(3,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='5'  id='totalexpenses_5' name='totalexpenses_5'><?php echo $this->expensesTotalcalc(4,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='6'  id='totalexpenses_6' name='totalexpenses_6'><?php echo $this->expensesTotalcalc(5,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='7'  id='totalexpenses_7' name='totalexpenses_7'><?php echo $this->expensesTotalcalc(6,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='8'  id='totalexpenses_8' name='totalexpenses_8'><?php echo $this->expensesTotalcalc(7,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='9'  id='totalexpenses_9' name='totalexpenses_9'><?php echo $this->expensesTotalcalc(8,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='10' id='totalexpenses_10' name='totalexpenses_10'><?php echo $this->expensesTotalcalc(9,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='11' id='totalexpenses_11' name='totalexpenses_11'><?php echo $this->expensesTotalcalc(10,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info cstmlabel' data-id='12' id='totalexpenses_12' name='totalexpenses_12'><?php echo $this->expensesTotalcalc(11,$expenses); ?></span>
			</div></td>
		</tr>
	<?php
	}
	
	function getWhereAreYouStand($param)
	{
		$assets = $this->getAssets($param);
		$liabilities = $this->getLiabilities($param);
		
	?>

	<tr><th colspan='13'>ASSET</th></tr>
	
	<tr>
		<th colspan='13'>Cash</th>
	</tr>
		<tr>
			<td>Checking Account</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$checking_account =  $assets[$i]['checking_account'];
				?>
				<td><input class='form-control checking_account' type='number' data-id='<?php echo $i+1; ?>'  id='checking_account_<?php echo $i+1; ?>' name='checking_account_<?php echo $i+1; ?>' value='<?php echo $checking_account; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Savings Account</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$savings_account =  $assets[$i]['savings_account'];
				?>
				<td><input class='form-control savings_account' type='number' data-id='<?php echo $i+1; ?>'  id='savings_account_<?php echo $i+1; ?>' name='savings_account_<?php echo $i+1; ?>' value='<?php echo $savings_account; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Other (Mutual Funds)</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$mutual_funds =  $assets[$i]['mutual_funds'];
				?>
				<td><input class='form-control mutual_funds' type='number' data-id='<?php echo $i+1; ?>'  id='mutual_funds_<?php echo $i+1; ?>'  name='mutual_funds_<?php echo $i+1; ?>'  value='<?php echo $mutual_funds; ?>'  min='0' /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td class= "total_class">Total Cash</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='totalcash_1' name='totalcash_1'>
			<?php echo $this->totalCash(0,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='totalcash_2' name='totalcash_2'>
			<?php echo $this->totalCash(1,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='totalcash_3' name='totalcash_3'>
			<?php echo $this->totalCash(2,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='totalcash_4' name='totalcash_4'>
			<?php echo $this->totalCash(3,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='totalcash_5' name='totalcash_5'>
			<?php echo $this->totalCash(4,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='totalcash_6' name='totalcash_6'>
			<?php echo $this->totalCash(5,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='totalcash_7' name='totalcash_7'>
			<?php echo $this->totalCash(6,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='totalcash_8' name='totalcash_8'>
			<?php echo $this->totalCash(7,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='totalcash_9' name='totalcash_9'>
			<?php echo $this->totalCash(8,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='totalcash_10' name='totalcash_10'>
			<?php echo $this->totalCash(9,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='totalcash_11' name='totalcash_11'>
			<?php echo $this->totalCash(10,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='totalcash_12' name='totalcash_12'>
			<?php echo $this->totalCash(11,$assets); ?>
			</span>
			</div></td>
		</tr>
		<tr>
		<th colspan='13'>Investment</th>
	</tr>
		<tr>
			<td>Securities (Bonds, Stock, Mutual Funds)</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$securities =  $assets[$i]['securities'];
				?>
				<td><input class='form-control securities' type='number' data-id='<?php echo $i+1; ?>'  id='securities_<?php echo $i+1; ?>' name='securities_<?php echo $i+1; ?>' value='<?php echo $securities; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Other Investments</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$other_investments =  $assets[$i]['other_investments'];
				?>
				<td><input class='form-control other_investments' type='number' data-id='<?php echo $i+1; ?>'  id='other_investments_<?php echo $i+1; ?>' name='other_investments_<?php echo $i+1; ?>' value='<?php echo $other_investments; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		
		<tr>
			<td class= "total_class">Total Investment</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='totalinvestment_1' name='totalinvestment_1'>
			<?php echo $this->totalInvestment(0,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='totalinvestment_2' name='totalinvestment_2'>
			<?php echo $this->totalInvestment(1,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='totalinvestment_3' name='totalinvestment_3'>
			<?php echo $this->totalInvestment(2,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='totalinvestment_4' name='totalinvestment_4'>
			<?php echo $this->totalInvestment(3,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='totalinvestment_5' name='totalinvestment_5'>
			<?php echo $this->totalInvestment(4,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='totalinvestment_6' name='totalinvestment_6'>
			<?php echo $this->totalInvestment(5,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='totalinvestment_7' name='totalinvestment_7'>
			<?php echo $this->totalInvestment(6,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='totalinvestment_8' name='totalinvestment_8'>
			<?php echo $this->totalInvestment(7,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='totalinvestment_9' name='totalinvestment_9'>
			<?php echo $this->totalInvestment(8,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='totalinvestment_10' name='totalinvestment_10'>
			<?php echo $this->totalInvestment(9,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='totalinvestment_11' name='totalinvestment_11'>
			<?php echo $this->totalInvestment(10,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='totalinvestment_12' name='totalinvestment_12'>
			<?php echo $this->totalInvestment(11,$assets); ?>
			</span>
			</div></td>
		</tr>
		<tr>
		<th colspan='13'>Retirement</th>
	</tr>
		<tr>
			<td>Retirement funds (401k, IRAs)</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$retirement_funds =  $assets[$i]['retirement_funds'];
				?>
				<td><input class='form-control retirement_funds' type='number' data-id='<?php echo $i+1; ?>'  id='retirement_funds_<?php echo $i+1; ?>' name='retirement_funds_<?php echo $i+1; ?>' value='<?php echo $retirement_funds; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		
		<tr>
			<td class= "total_class">Total Retirement</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='totalretirement_1' name='totalretirement_1'>
			<?php echo $this->totalRetirement(0,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='totalretirement_2' name='totalretirement_2'>
			<?php echo $this->totalRetirement(1,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='totalretirement_3' name='totalretirement_3'>
			<?php echo $this->totalRetirement(2,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='totalretirement_4' name='totalretirement_4'>
			<?php echo $this->totalRetirement(3,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='totalretirement_5' name='totalretirement_5'>
			<?php echo $this->totalRetirement(4,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='totalretirement_6' name='totalretirement_6'>
			<?php echo $this->totalRetirement(5,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='totalretirement_7' name='totalretirement_7'>
			<?php echo $this->totalRetirement(6,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='totalretirement_8' name='totalretirement_8'>
			<?php echo $this->totalRetirement(7,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='totalretirement_9' name='totalretirement_9'>
			<?php echo $this->totalRetirement(8,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='totalretirement_10' name='totalretirement_10'>
			<?php echo $this->totalRetirement(9,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='totalretirement_11' name='totalretirement_11'>
			<?php echo $this->totalRetirement(10,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='totalretirement_12' name='totalretirement_12'>
			<?php echo $this->totalRetirement(11,$assets); ?>
			</span>
			</div></td>
		</tr>
		
		<tr>
		<th colspan='13'>Personal Property</th>
	</tr>
		<tr>
			<td>Building</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$building =  $assets[$i]['building'];
				?>
				<td><input class='form-control building' type='number' data-id='<?php echo $i+1; ?>'  id='building_<?php echo $i+1; ?>' name='building_<?php echo $i+1; ?>' value='<?php echo $building; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Cars</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$cars =  $assets[$i]['cars'];
				?>
				<td><input class='form-control cars' type='number' data-id='<?php echo $i+1; ?>'  id='cars_<?php echo $i+1; ?>' name='cars_<?php echo $i+1; ?>' value='<?php echo $cars; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Other Property (Furnishing, Jewellery, Clothes)</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$other_property =  $assets[$i]['other_property'];
				?>
				<td><input class='form-control other_property' type='number' data-id='<?php echo $i+1; ?>'  id='other_property_<?php echo $i+1; ?>'  name='other_property_<?php echo $i+1; ?>'  value='<?php echo $other_property; ?>'  min='0' /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td class= "total_class">Total Property</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='totalproperty_1' name='totalproperty_1'>
			<?php echo $this->totalProperty(0,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='totalproperty_2' name='totalproperty_2'>
			<?php echo $this->totalProperty(1,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='totalproperty_3' name='totalproperty_3'>
			<?php echo $this->totalProperty(2,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='totalproperty_4' name='totalproperty_4'>
			<?php echo $this->totalProperty(3,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='totalproperty_5' name='totalproperty_5'>
			<?php echo $this->totalProperty(4,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='totalproperty_6' name='totalproperty_6'>
			<?php echo $this->totalProperty(5,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='totalproperty_7' name='totalproperty_7'>
			<?php echo $this->totalProperty(6,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='totalproperty_8' name='totalproperty_8'>
			<?php echo $this->totalProperty(7,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='totalproperty_9' name='totalproperty_9'>
			<?php echo $this->totalProperty(8,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='totalproperty_10' name='totalproperty_10'>
			<?php echo $this->totalProperty(9,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='totalproperty_11' name='totalproperty_11'>
			<?php echo $this->totalProperty(10,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='totalproperty_12' name='totalproperty_12'>
			<?php echo $this->totalProperty(11,$assets); ?>
			</span>
			</div></td>
		</tr>
		<tr><th colspan='13'></th></tr>
		<tr>
			<td class= "total_class">Total Assets</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='totalassets_1' name='totalassets_1'>
			<?php echo $this->totalAssets(0,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='totalassets_2' name='totalassets_2'>
			<?php echo $this->totalAssets(1,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='totalassets_3' name='totalassets_3'>
			<?php echo $this->totalAssets(2,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='totalassets_4' name='totalassets_4'>
			<?php echo $this->totalAssets(3,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='totalassets_5' name='totalassets_5'>
			<?php echo $this->totalAssets(4,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='totalassets_6' name='totalassets_6'>
			<?php echo $this->totalAssets(5,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='totalassets_7' name='totalassets_7'>
			<?php echo $this->totalAssets(6,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='totalassets_8' name='totalassets_8'>
			<?php echo $this->totalAssets(7,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='totalassets_9' name='totalassets_9'>
			<?php echo $this->totalAssets(8,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='totalassets_10' name='totalassets_10'>
			<?php echo $this->totalAssets(9,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='totalassets_11' name='totalassets_11'>
			<?php echo $this->totalAssets(10,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='totalassets_12' name='totalassets_12'>
			<?php echo $this->totalAssets(11,$assets); ?>
			</span>
			</div></td>
		</tr>
		<tr>
			<td class= "total_class">Change MOM</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='assetsmom_1' name='assetsmom_1'>
			<?php echo $this->totalAssetsMOM(0,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='assetsmom_2' name='assetsmom_2'>
			<?php echo $this->totalAssetsMOM(1,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='assetsmom_3' name='assetsmom_3'>
			<?php echo $this->totalAssetsMOM(2,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='assetsmom_4' name='assetsmom_4'>
			<?php echo $this->totalAssetsMOM(3,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='assetsmom_5' name='assetsmom_5'>
			<?php echo $this->totalAssetsMOM(4,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='assetsmom_6' name='assetsmom_6'>
			<?php echo $this->totalAssetsMOM(5,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='assetsmom_7' name='assetsmom_7'>
			<?php echo $this->totalAssetsMOM(6,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='assetsmom_8' name='assetsmom_8'>
			<?php echo $this->totalAssetsMOM(7,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='assetsmom_9' name='assetsmom_9'>
			<?php echo $this->totalAssetsMOM(8,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='assetsmom_10' name='assetsmom_10'>
			<?php echo $this->totalAssetsMOM(9,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='assetsmom_11' name='assetsmom_11'>
			<?php echo $this->totalAssetsMOM(10,$assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='assetsmom_12' name='assetsmom_12'>
			<?php echo $this->totalAssetsMOM(11,$assets); ?>
			</span>
			</div></td>
		</tr>
		
		<tr><th colspan='13'>Liabilities</th></tr>
	
		<tr>
			<th colspan='13'>Investment Debt</th>
		</tr>
		<tr>
			<td>Mortgage</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$mortgage =  $liabilities[$i]['mortgage'];
				?>
				<td><input class='form-control retirementExp mortgage' type='number' data-id='<?php echo $i+1; ?>'  id='mortgage_<?php echo $i+1; ?>' name='mortgage_<?php echo $i+1; ?>' value='<?php echo $mortgage; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		
		<tr>
			<td>Student Loan Debt</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$student_debt =  $liabilities[$i]['student_debt'];
				?>
				<td><input class='form-control retirementExp student_debt' type='number' data-id='<?php echo $i+1; ?>'  id='student_debt_<?php echo $i+1; ?>' name='student_debt_<?php echo $i+1; ?>' value='<?php echo $student_debt; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Car Loans</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$car_loans =  $liabilities[$i]['car_loans'];
				?>
				<td><input class='form-control retirementExp car_loans' type='number' data-id='<?php echo $i+1; ?>'  id='car_loans_<?php echo $i+1; ?>' name='car_loans_<?php echo $i+1; ?>' value='<?php echo $car_loans; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<th colspan='13'>Personal Debt</th>
		</tr>
		<tr>
			<td>Credit Card Debt</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$credit_card =  $liabilities[$i]['credit_card'];
				?>
				<td><input class='form-control libcredit_card' type='number' data-id='<?php echo $i+1; ?>'  id='credit_card_<?php echo $i+1; ?>' name='credit_card_<?php echo $i+1; ?>' value='<?php echo $credit_card; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Other Liabilities</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$other_liabilities =  $liabilities[$i]['other_liabilities'];
				?>
				<td><input class='form-control other_liabilities' type='number' data-id='<?php echo $i+1; ?>'  id='other_liabilities_<?php echo $i+1; ?>' name='other_liabilities_<?php echo $i+1; ?>' value='<?php echo $other_liabilities; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		
		<tr>
			<td class= "total_class">Total Liabilities</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='totalliabilities_1' name='totalliabilities_1'>
			<?php echo $this->totalliabilities(0,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='totalliabilities_2' name='totalliabilities_2'>
			<?php echo $this->totalliabilities(1,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='totalliabilities_3' name='totalliabilities_3'>
			<?php echo $this->totalliabilities(2,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='totalliabilities_4' name='totalliabilities_4'>
			<?php echo $this->totalliabilities(3,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='totalliabilities_5' name='totalliabilities_5'>
			<?php echo $this->totalliabilities(4,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='totalliabilities_6' name='totalliabilities_6'>
			<?php echo $this->totalliabilities(5,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='totalliabilities_7' name='totalliabilities_7'>
			<?php echo $this->totalliabilities(6,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='totalliabilities_8' name='totalliabilities_8'>
			<?php echo $this->totalliabilities(7,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='totalliabilities_9' name='totalliabilities_9'>
			<?php echo $this->totalliabilities(8,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='totalliabilities_10' name='totalliabilities_10'>
			<?php echo $this->totalliabilities(9,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='totalliabilities_11' name='totalliabilities_11'>
			<?php echo $this->totalliabilities(10,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='totalliabilities_12' name='totalliabilities_12'>
			<?php echo $this->totalliabilities(11,$liabilities); ?>
			</span>
			</div></td>
		</tr>
		<tr>
			<td class= "total_class">Change MOM</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='totalliabilitiesmom_1' name='totalliabilitiesmom_1'>
			<?php echo $this->totalliabilitiesMOM(0,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='totalliabilitiesmom_2' name='totalliabilitiesmom_2'>
			<?php echo $this->totalliabilitiesMOM(1,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='totalliabilitiesmom_3' name='totalliabilitiesmom_3'>
			<?php echo $this->totalliabilitiesMOM(2,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='totalliabilitiesmom_4' name='totalliabilitiesmom_4'>
			<?php echo $this->totalliabilitiesMOM(3,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='totalliabilitiesmom_5' name='totalliabilitiesmom_5'>
			<?php echo $this->totalliabilitiesMOM(4,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='totalliabilitiesmom_6' name='totalliabilitiesmom_6'>
			<?php echo $this->totalliabilitiesMOM(5,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='totalliabilitiesmom_7' name='totalliabilitiesmom_7'>
			<?php echo $this->totalliabilitiesMOM(6,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='totalliabilitiesmom_8' name='totalliabilitiesmom_8'>
			<?php echo $this->totalliabilitiesMOM(7,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='totalliabilitiesmom_9' name='totalliabilitiesmom_9'>
			<?php echo $this->totalliabilitiesMOM(8,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='totalliabilitiesmom_10' name='totalliabilitiesmom_10'>
			<?php echo $this->totalliabilitiesMOM(9,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='totalliabilitiesmom_11' name='totalliabilitiesmom_11'>
			<?php echo $this->totalliabilitiesMOM(10,$liabilities); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='totalliabilitiesmom_12' name='totalliabilitiesmom_12'>
			<?php echo $this->totalliabilitiesMOM(11,$liabilities); ?>
			</span>
			</div></td>
		</tr>
		<tr><th colspan='13'></th></tr>
		
		<tr>
			<td class= "total_class">Net Worth</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='totalnetworth_1' name='totalnetworth_1'>
			<?php echo $this->totalNetworth(0,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='totalnetworth_2' name='totalnetworth_2'>
			<?php echo $this->totalNetworth(1,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='totalnetworth_3' name='totalnetworth_3'>
			<?php echo $this->totalNetworth(2,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='totalnetworth_4' name='totalnetworth_4'>
			<?php echo $this->totalNetworth(3,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='totalnetworth_5' name='totalnetworth_5'>
			<?php echo $this->totalNetworth(4,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='totalnetworth_6' name='totalnetworth_6'>
			<?php echo $this->totalNetworth(5,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='totalnetworth_7' name='totalnetworth_7'>
			<?php echo $this->totalNetworth(6,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='totalnetworth_8' name='totalnetworth_8'>
			<?php echo $this->totalNetworth(7,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='totalnetworth_9' name='totalnetworth_9'>
			<?php echo $this->totalNetworth(8,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='totalnetworth_10' name='totalnetworth_10'>
			<?php echo $this->totalNetworth(9,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='totalnetworth_11' name='totalnetworth_11'>
			<?php echo $this->totalNetworth(10,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='totalnetworth_12' name='totalnetworth_12'>
			<?php echo $this->totalNetworth(11,$liabilities, $assets); ?>
			</span>
			</div></td>
		</tr>
		<tr>
			<td class= "total_class">Change MOM</td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='1' id='totalNetworthmom_1' name='totalNetworthmom_1'>
			<?php echo $this->totalNetMOM(0,$liabilities, $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='2' id='totalNetworthmom_2' name='totalNetworthmom_2'>
			<?php echo $this->totalNetMOM(1,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='3' id='totalNetworthmom_3' name='totalNetworthmom_3'>
			<?php echo $this->totalNetMOM(2,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='4' id='totalNetworthmom_4' name='totalNetworthmom_4'>
			<?php echo $this->totalNetMOM(3,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='5' id='totalNetworthmom_5' name='totalNetworthmom_5'>
			<?php echo $this->totalNetMOM(4,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='6' id='totalNetworthmom_6' name='totalNetworthmom_6'>
			<?php echo $this->totalNetMOM(5,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='7' id='totalNetworthmom_7' name='totalNetworthmom_7'>
			<?php echo $this->totalNetMOM(6,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='8' id='totalNetworthmom_8' name='totalNetworthmom_8'>
			<?php echo $this->totalNetMOM(7,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='9' id='totalNetworthmom_9' name='totalNetworthmom_9'>
			<?php echo $this->totalNetMOM(8,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='10' id='totalNetworthmom_10' name='totalNetworthmom_10'>
			<?php echo $this->totalNetMOM(9,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='11' id='totalNetworthmom_11' name='totalNetworthmom_11'>
			<?php echo $this->totalNetMOM(10,$liabilities , $assets); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info cstmlabel' data-id='12' id='totalNetworthmom_12' name='totalNetworthmom_12'>
			<?php echo $this->totalNetMOM(11,$liabilities , $assets); ?>
			</span>
			</div></td>
		</tr>
		
	<?php
	}
	
	
	
}

