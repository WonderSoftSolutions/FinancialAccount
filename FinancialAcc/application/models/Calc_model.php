<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calc_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	
	  /* First method to associate create array. */
         
	 public function monthly($year) {
		$mon = $year/12/100;
		return $mon;
		
	 }

	public function getPayMonth($amount, $rate, $payment) {
		
		$ret = -log(1 - $rate * $amount / $payment) / log(1+$rate);
		$ret = ceil($ret);
		return intval($ret);
	}

	// A x ( 1 + r ) ^ n - (P/r) x ( ( 1 + r ) ^ n - 1 )
	public function getBalance($index, $amount, $rate, $payment) {
		
		$ret = $amount * pow(1+$rate, $index) - ($payment/$rate) * ( pow(1+$rate, $index) - 1 );
		return $ret;
	}

	// (A - P/r) x ( ( 1 + r ) ^ n - 1 ) + p x n
	public function getSumOfInterest($index, $amount, $rate, $payment) {
		
		$ret = ($amount - ($payment/$rate)) * ( pow(1+$rate, $index) - 1 ) + $payment * $index;
		return $ret;
	}

	public function getResult($data_array, $count, $oldparam,$type) {
		
		$minimum_payment = 0;
		$counter = 0;
		$month_payment = $oldparam['monthlypayment'];
		foreach($data_array as $key => $value)
		{
			$counter = $key+1;
			$minimum_payment += $value["payment"];
		}
		
		$add_payment = 0;
		
		if ($minimum_payment < $month_payment)
			$add_payment = $month_payment - $minimum_payment;
		
		// start
		$prev_month = 0;
		$prev_payment = 0;
		
		$interest_array = array();
		$months_array = array();
		
		
		$new_amount = 0;
		$amount_i=0;$rate_i=0;$payment_i=0;
		$total_interest=0; $prev_interest=0; $curr_interest=0;
		$months = 0;
		$counter = 0;
		$param = array();
		$cstmbalance = 0;
		$cstminterest = 0;
		
		foreach($data_array as $key => $value)
		{
			$counter = $key+1;
			$amount_i 	= $value['balance'];
			$rate_i		= $this->monthly($value["rate"]);
			$payment_i 	= $value["payment"];

			$selectmonth = $oldparam['month'];
			$selectyear = $oldparam['selectYear'];
			
			// current payment : 3205 + 295
			$add_payment += $payment_i;
			
			// calculate the current payment : 295
			//$amount_i = 8000; $rate_i = 13.99; $payment_i = 3500;
			$new_amount = $this->getBalance($prev_month, $amount_i, $rate_i, $payment_i);
			$new_amount += $prev_payment;
			
			// get intereste before prev_month ago
			$prev_interest = $this->getSumOfInterest($prev_month, $amount_i, $rate_i, $payment_i);
			
			if($type == 'nosnowball')
			{
				//$months = $this->getPayMonth($new_amount, $rate_i, $payment_i);
				$months = $this->getPayMonth($amount_i, $rate_i, $payment_i);
				
				$curr_interest = $this->getSumOfInterest($months, $amount_i , $rate_i, $payment_i);
				$total_interest = round($curr_interest,2,PHP_ROUND_HALF_UP);
				
				$prev_month += $months;
				$months_array[$counter] = $prev_month;
				$interest_array[$counter] = $total_interest;
				
				$addmonth = $months;
				$param['creditor'.$counter] = $value['creditor'];
				$param['amount'.$counter] = $amount_i;
				//strtotime("10 September 2000")
				$param['futuredate'.$counter] =date('F Y', strtotime("$selectmonth/01/$selectyear  +$addmonth month"));
				$param['prev_month'.$counter] = $months;
				$param['total_interest'.$counter] = $this->account_model->currencyconverter($total_interest);

				$cstmbalance = $cstmbalance + $amount_i;
				$cstminterest = $cstminterest + $total_interest;
				$param['cstmbalance'] = $this->account_model->currencyconverter($cstmbalance);
				$param['cstminterest'] = $this->account_model->currencyconverter($cstminterest);
				//var_dump($param);
			}
			else
			{
				// calculate the month when pay 3205 + 295
				$months = $this->getPayMonth($new_amount, $rate_i, $add_payment);
					
				//Other Cases
				// get last payment
				$prev_payment = $this->getBalance($months, $new_amount, $rate_i, $add_payment);
				
				// get intereste after prev_month
				$curr_interest = $this->getSumOfInterest($months, $new_amount, $rate_i, $add_payment);
				
				$total_interest = $prev_interest + $curr_interest;
				
				$prev_month += $months;
				
				$months_array[$counter] = $prev_month;
				$interest_array[$counter] = $total_interest;
				
				//$param['serial'.$counter] = $counter;
				$param['creditor'.$counter] = $value['creditor'];
				$param['amount'.$counter] = $amount_i;
				
				//strtotime("10 September 2000")
				//echo 
				$addmonth = $prev_month;
				$param['futuredate'.$counter] =date('F Y', strtotime("$selectmonth/01/$selectyear  +$addmonth month")); //date('F Y', mktime(0,0,0,$oldparam['month']+$months, 1, date($oldparam['selectYear']+$totalyear)));
				
				$param['prev_month'.$counter] = $prev_month;
				$param['total_interest'.$counter] = $this->account_model->currencyconverter(round($total_interest,2,PHP_ROUND_HALF_UP));
				
				$cstmbalance = $cstmbalance + $amount_i;
				$cstminterest = $cstminterest + $total_interest;
				$param['cstmbalance'] = $this->account_model->currencyconverter($cstmbalance);
				$param['cstminterest'] = $this->account_model->currencyconverter($cstminterest);
			}
		}
		return $param;
	}
	
	// function debtpayment($param)//nosnowball
	// {
		// $param['interestamount'] = $param['rate'] / 12;
		// $param['firststep'] = ($param['amount'] * $param['interestamount'])/$param['payment'];
		// $param['firstlog'] = 1 - $param['firststep'];
		// $param['log10'] = log10($param['firstlog']);
		// $param['2ndstep'] = "start";
		// $param['calclog'] = $param['interestamount'] + 1;
		// $param['ndlog10'] = log10($param['calclog']);
		// $param['months'] = round( -($param['log10'] / $param['ndlog10']));
		// $time = strtotime(date("Y/m/d"));
		// $param['futuredate'] = date('F Y', mktime(0,0,0,$param['months'], 1, date($param['postselectYear'])));
		// //Rate//
		// //$param['interestpaid'] = ($param['interestamount']  * $param['amount']);
		// echo json_encode($param);
	// }	
}

