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
	function leftovermoneyTotalcalc($month,$revenues,$expenses)
	{
		return $this->revenueTotalcalc($month,$revenues) - $this->expensesTotalcalc($month,$expenses);
	}
	function revenueTotalcalc($month,$revenues)
	{
		return $revenues[$month]['wife_revenue'] + $revenues[$month]['husband_revenue'] + $revenues[$month]['bonuses'] + $revenues[$month]['dividend'] + $revenues[$month]['other']; 
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
	
	function getWhereAreYouGoaing($param)
	{
		$revenues = $this->getRevenue($param);
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
			<span class='label label-info ' data-id='1' id='totalincome_1' name='totalincome_1'>
			<?php echo $this->revenueTotalcalc(0,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='2' id='totalincome_2' name='totalincome_2'>
			<?php echo $this->revenueTotalcalc(1,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='3' id='totalincome_3' name='totalincome_3'>
			<?php echo $this->revenueTotalcalc(2,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='4' id='totalincome_4' name='totalincome_4'>
			<?php echo $this->revenueTotalcalc(3,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='5' id='totalincome_5' name='totalincome_5'>
			<?php echo $this->revenueTotalcalc(4,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='6' id='totalincome_6' name='totalincome_6'>
			<?php echo $this->revenueTotalcalc(5,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='7' id='totalincome_7' name='totalincome_7'>
			<?php echo $this->revenueTotalcalc(6,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='8' id='totalincome_8' name='totalincome_8'>
			<?php echo $this->revenueTotalcalc(7,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='9' id='totalincome_9' name='totalincome_9'>
			<?php echo $this->revenueTotalcalc(8,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='10' id='totalincome_10' name='totalincome_10'>
			<?php echo $this->revenueTotalcalc(9,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='11' id='totalincome_11' name='totalincome_11'>
			<?php echo $this->revenueTotalcalc(10,$revenues); ?>
			</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='12' id='totalincome_12' name='totalincome_12'>
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
			<span class='label label-info ' data-id='1'  id='totalexpenses_1' name='totalexpenses_1'><?php echo $this->expensesTotalcalc(0,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='2'  id='totalexpenses_2' name='totalexpenses_2'><?php echo $this->expensesTotalcalc(1,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='3'  id='totalexpenses_3' name='totalexpenses_3'><?php echo $this->expensesTotalcalc(2,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='4'  id='totalexpenses_4' name='totalexpenses_4'><?php echo $this->expensesTotalcalc(3,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='5'  id='totalexpenses_5' name='totalexpenses_5'><?php echo $this->expensesTotalcalc(4,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='6'  id='totalexpenses_6' name='totalexpenses_6'><?php echo $this->expensesTotalcalc(5,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='7'  id='totalexpenses_7' name='totalexpenses_7'><?php echo $this->expensesTotalcalc(6,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='8'  id='totalexpenses_8' name='totalexpenses_8'><?php echo $this->expensesTotalcalc(7,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='9'  id='totalexpenses_9' name='totalexpenses_9'><?php echo $this->expensesTotalcalc(8,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='10' id='totalexpenses_10' name='totalexpenses_10'><?php echo $this->expensesTotalcalc(9,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='11' id='totalexpenses_11' name='totalexpenses_11'><?php echo $this->expensesTotalcalc(10,$expenses); ?></span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='12' id='totalexpenses_12' name='totalexpenses_12'><?php echo $this->expensesTotalcalc(11,$expenses); ?></span>
			</div></td>
		</tr>
	<?php
	}
	
	function getWhereAreYouGoaingAjax($param)
	{
		$revenues = $this->getRevenue($param);
		$expenses = $this->getExpenses($param);
	?>
			<tr>
	<td class= "total_class">Total Income</td>
	<td><input class='form-control commonwidth' type='number' data-id='1'  id='Totalincometxt_1'     disabled  name='Totalincometxt_1'  value='<?php echo $this->revenueTotalcalc(0,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='2'  id='Totalincometxt_2'     disabled  name='Totalincometxt_2'  value='<?php echo $this->revenueTotalcalc(1,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='3'  id='Totalincometxt_3'     disabled  name='Totalincometxt_3'  value='<?php echo $this->revenueTotalcalc(2,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='4'  id='Totalincometxt_4'     disabled  name='Totalincometxt_4'  value='<?php echo $this->revenueTotalcalc(3,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='5'  id='Totalincometxt_5'     disabled  name='Totalincometxt_5'  value='<?php echo $this->revenueTotalcalc(4,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='6'  id='Totalincometxt_6'     disabled  name='Totalincometxt_6'  value='<?php echo $this->revenueTotalcalc(5,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='7'  id='Totalincometxt_7'     disabled  name='Totalincometxt_7'  value='<?php echo $this->revenueTotalcalc(6,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='8'  id='Totalincometxt_8'     disabled  name='Totalincometxt_8'  value='<?php echo $this->revenueTotalcalc(7,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='9'  id='Totalincometxt_9'     disabled  name='Totalincometxt_9'  value='<?php echo $this->revenueTotalcalc(8,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='10' id='Totalincometxt_10'    disabled  name='Totalincometxt_10' value='<?php echo $this->revenueTotalcalc(9,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='11' id='Totalincometxt_11'    disabled  name='Totalincometxt_11' value='<?php echo $this->revenueTotalcalc(10,$revenues); ?>'  /></td>
	<td><input class='form-control commonwidth' type='number' data-id='12' id='Totalincometxt_12'    disabled  name='Totalincometxt_12' value='<?php echo $this->revenueTotalcalc(11,$revenues); ?>'  /></td>
	</tr>
	<tr>
	<td class= "total_class">Total Expenses</td>
	<td><input class='form-control commonwidth' type='number' data-id='1'  id='TotalExpensestxt_1'     disabled  name='TotalExpensestxt_1'  value='<?php echo $this->expensesTotalcalc(0,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='2'  id='TotalExpensestxt_2'     disabled  name='TotalExpensestxt_2'  value='<?php echo $this->expensesTotalcalc(1,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='3'  id='TotalExpensestxt_3'     disabled  name='TotalExpensestxt_3'  value='<?php echo $this->expensesTotalcalc(2,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='4'  id='TotalExpensestxt_4'     disabled  name='TotalExpensestxt_4'  value='<?php echo $this->expensesTotalcalc(3,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='5'  id='TotalExpensestxt_5'     disabled  name='TotalExpensestxt_5'  value='<?php echo $this->expensesTotalcalc(4,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='6'  id='TotalExpensestxt_6'     disabled  name='TotalExpensestxt_6'  value='<?php echo $this->expensesTotalcalc(5,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='7'  id='TotalExpensestxt_7'     disabled  name='TotalExpensestxt_7'  value='<?php echo $this->expensesTotalcalc(6,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='8'  id='TotalExpensestxt_8'     disabled  name='TotalExpensestxt_8'  value='<?php echo $this->expensesTotalcalc(7,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='9'  id='TotalExpensestxt_9'     disabled  name='TotalExpensestxt_9'  value='<?php echo $this->expensesTotalcalc(8,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='10' id='TotalExpensestxt_10'    disabled  name='TotalExpensestxt_10' value='<?php echo $this->expensesTotalcalc(9,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='11' id='TotalExpensestxt_11'    disabled  name='TotalExpensestxt_11' value='<?php echo $this->expensesTotalcalc(10,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='12' id='TotalExpensestxt_12'    disabled  name='TotalExpensestxt_12' value='<?php echo $this->expensesTotalcalc(11,$expenses); ?>' /></td>
	</tr>
	<tr>
	<td class= "total_class">Left Over Money</td>
	<td><input class='form-control commonwidth' type='number' data-id='1'  id='LeftOverMoney_1'    disabled  name='LeftOverMoney_1'  value='<?php echo $this->leftovermoneyTotalcalc(0,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='2'  id='LeftOverMoney_2'    disabled  name='LeftOverMoney_2'  value='<?php echo $this->leftovermoneyTotalcalc(1,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='3'  id='LeftOverMoney_3'    disabled  name='LeftOverMoney_3'  value='<?php echo $this->leftovermoneyTotalcalc(2,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='4'  id='LeftOverMoney_4'    disabled  name='LeftOverMoney_4'  value='<?php echo $this->leftovermoneyTotalcalc(3,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='5'  id='LeftOverMoney_5'    disabled  name='LeftOverMoney_5'  value='<?php echo $this->leftovermoneyTotalcalc(4,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='6'  id='LeftOverMoney_6'    disabled  name='LeftOverMoney_6'  value='<?php echo $this->leftovermoneyTotalcalc(5,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='7'  id='LeftOverMoney_7'    disabled  name='LeftOverMoney_7'  value='<?php echo $this->leftovermoneyTotalcalc(6,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='8'  id='LeftOverMoney_8'    disabled  name='LeftOverMoney_8'  value='<?php echo $this->leftovermoneyTotalcalc(7,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='9'  id='LeftOverMoney_9'    disabled  name='LeftOverMoney_9'  value='<?php echo $this->leftovermoneyTotalcalc(8,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='10' id='LeftOverMoney_10'   disabled  name='LeftOverMoney_10' value='<?php echo $this->leftovermoneyTotalcalc(9,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='11' id='LeftOverMoney_11'   disabled  name='LeftOverMoney_11' value='<?php echo $this->leftovermoneyTotalcalc(10,$revenues,$expenses); ?>' /></td>
	<td><input class='form-control commonwidth' type='number' data-id='12' id='LeftOverMoney_12'   disabled  name='LeftOverMoney_12' value='<?php echo $this->leftovermoneyTotalcalc(11,$revenues,$expenses); ?>' /></td>
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
	<td><input class='form-control wife' type='number' data-id='<?php echo $i+1; ?>'  id='wife_<?php echo $i+1; ?>'  disabled  name='wife_<?php echo $i+1; ?>' value='<?php echo $wife_revenue; ?>' min='0'  /></td>
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
	<td><input class='form-control husband' type='number' data-id='<?php echo $i+1; ?>'  id='husband_<?php echo $i+1; ?>'  disabled  name='husband_<?php echo $i+1; ?>' value='<?php echo $husband_revenue; ?>' min='0'  /></td>
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
	<td><input class='form-control bonus' type='number' data-id='<?php echo $i+1; ?>'  id='bonuses_<?php echo $i+1; ?>'   disabled  name='bonuses_<?php echo $i+1; ?>'  value='<?php echo $bonuses; ?>'  min='0' /></td>
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
	<td><input class='form-control dividend' type='number' data-id='<?php echo $i+1; ?>'  id='dividend_<?php echo $i+1; ?>'   disabled  name='dividend_<?php echo $i+1; ?>'  value='<?php echo $dividend; ?>' min='0' /></td>
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
	<td><input class='form-control other' type='number' data-id='<?php echo $i+1; ?>'  id='other_<?php echo $i+1; ?>'   disabled  name='other_<?php echo $i+1; ?>'  value='<?php echo $other; ?>' min='0' /></td>
	<?php
	}
	?>
	</tr>
	<tr>
	<td class= "total_class">Total Income</td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='1' id='totalincome_1'  disabled  name='totalincome_1'>
	<?php echo $this->revenueTotalcalc(0,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='2' id='totalincome_2'  disabled  name='totalincome_2'>
	<?php echo $this->revenueTotalcalc(1,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='3' id='totalincome_3'  disabled  name='totalincome_3'>
	<?php echo $this->revenueTotalcalc(2,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='4' id='totalincome_4'  disabled  name='totalincome_4'>
	<?php echo $this->revenueTotalcalc(3,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='5' id='totalincome_5'  disabled  name='totalincome_5'>
	<?php echo $this->revenueTotalcalc(4,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='6' id='totalincome_6'  disabled  name='totalincome_6'>
	<?php echo $this->revenueTotalcalc(5,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='7' id='totalincome_7'  disabled  name='totalincome_7'>
	<?php echo $this->revenueTotalcalc(6,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='8' id='totalincome_8'  disabled  name='totalincome_8'>
	<?php echo $this->revenueTotalcalc(7,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='9' id='totalincome_9'  disabled  name='totalincome_9'>
	<?php echo $this->revenueTotalcalc(8,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='10' id='totalincome_10'  disabled  name='totalincome_10'>
	<?php echo $this->revenueTotalcalc(9,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='11' id='totalincome_11'  disabled  name='totalincome_11'>
	<?php echo $this->revenueTotalcalc(10,$revenues); ?>
	</span>
	</div></td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='12' id='totalincome_12'  disabled  name='totalincome_12'>
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
	<td><input class='form-control retirementExp retirement' type='number' data-id='<?php echo $i+1; ?>'  id='retirement_<?php echo $i+1; ?>'  disabled  name='retirement_<?php echo $i+1; ?>' value='<?php echo $retirement; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp rent' type='number' data-id='<?php echo $i+1; ?>'  id='rent_<?php echo $i+1; ?>'  disabled  name='rent_<?php echo $i+1; ?>' value='<?php echo $mortgage; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp homerepairs' type='number' data-id='<?php echo $i+1; ?>'  id='homerepairs_<?php echo $i+1; ?>'  disabled  name='homerepairs_<?php echo $i+1; ?>' value='<?php echo $home_repairs; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp homeinsurance' type='number' data-id='<?php echo $i+1; ?>'  id='homeinsurance_<?php echo $i+1; ?>'  disabled  name='homeinsurance_<?php echo $i+1; ?>' value='<?php echo $home_insurance; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp garbage' type='number' data-id='<?php echo $i+1; ?>'  id='garbage_<?php echo $i+1; ?>'  disabled  name='garbage_<?php echo $i+1; ?>' value='<?php echo $garbage; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp electricity' type='number' data-id='<?php echo $i+1; ?>'  id='electricity_<?php echo $i+1; ?>'  disabled  name='electricity_<?php echo $i+1; ?>' value='<?php echo $electricity; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp water' type='number' data-id='<?php echo $i+1; ?>'  id='water_<?php echo $i+1; ?>'  disabled  name='water_<?php echo $i+1; ?>' value='<?php echo $water; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp gas' type='number' data-id='<?php echo $i+1; ?>'  id='gas_<?php echo $i+1; ?>'  disabled  name='gas_<?php echo $i+1; ?>' value='<?php echo $gas; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp internet' type='number' data-id='<?php echo $i+1; ?>'  id='internet_<?php echo $i+1; ?>'  disabled  name='internet_<?php echo $i+1; ?>' value='<?php echo $internet; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp telephones' type='number' data-id='<?php echo $i+1; ?>'  id='telephones_<?php echo $i+1; ?>'  disabled  name='telephones_<?php echo $i+1; ?>' value='<?php echo $telephone; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp cable' type='number' data-id='<?php echo $i+1; ?>'  id='cable_<?php echo $i+1; ?>'  disabled  name='cable_<?php echo $i+1; ?>' value='<?php echo $cable_tv; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp parking' type='number' data-id='<?php echo $i+1; ?>'  id='parking_<?php echo $i+1; ?>'  disabled  name='parking_<?php echo $i+1; ?>' value='<?php echo $public_transportation; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp carpayment' type='number' data-id='<?php echo $i+1; ?>'  id='carpayment_<?php echo $i+1; ?>'  disabled  name='carpayment_<?php echo $i+1; ?>' value='<?php echo $car_payment; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp license' type='number' data-id='<?php echo $i+1; ?>'  id='license_<?php echo $i+1; ?>'  disabled  name='license_<?php echo $i+1; ?>' value='<?php echo $license_plates; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp repairs' type='number' data-id='<?php echo $i+1; ?>'  id='repairs_<?php echo $i+1; ?>'  disabled  name='repairs_<?php echo $i+1; ?>' value='<?php echo $car_repairs; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp insurance' type='number' data-id='<?php echo $i+1; ?>'  id='insurance_<?php echo $i+1; ?>'  disabled  name='insurance_<?php echo $i+1; ?>' value='<?php echo $insurance; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp charitable' type='number' data-id='<?php echo $i+1; ?>'  id='charitable_<?php echo $i+1; ?>'  disabled  name='charitable_<?php echo $i+1; ?>' value='<?php echo $charitable; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp childcare' type='number' data-id='<?php echo $i+1; ?>'  id='childcare_<?php echo $i+1; ?>'  disabled  name='childcare_<?php echo $i+1; ?>' value='<?php echo $child_care; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp clothing' type='number' data-id='<?php echo $i+1; ?>'  id='clothing_<?php echo $i+1; ?>'  disabled  name='clothing_<?php echo $i+1; ?>' value='<?php echo $clothing; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp entertainment' type='number' data-id='<?php echo $i+1; ?>'  id='entertainment_<?php echo $i+1; ?>'  disabled  name='entertainment_<?php echo $i+1; ?>' value='<?php echo $entertainment; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp groceries' type='number' data-id='<?php echo $i+1; ?>'  id='groceries_<?php echo $i+1; ?>'  disabled  name='groceries_<?php echo $i+1; ?>' value='<?php echo $groceries; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp medical' type='number' data-id='<?php echo $i+1; ?>'  id='medical_<?php echo $i+1; ?>'  disabled  name='medical_<?php echo $i+1; ?>' value='<?php echo $medical; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp personal' type='number' data-id='<?php echo $i+1; ?>'  id='personal_<?php echo $i+1; ?>'  disabled  name='personal_<?php echo $i+1; ?>' value='<?php echo $personal_barber; ?>' min='0'  /></td>
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
	<td><input class='form-control retirementExp drycleaning' type='number' data-id='<?php echo $i+1; ?>'  id='drycleaning_<?php echo $i+1; ?>'  disabled  name='drycleaning_<?php echo $i+1; ?>' value='<?php echo $dry_cleaning; ?>' min='0'  /></td>
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
				<td><input class='form-control retirementExp tithing' disabled  type='number' data-id='<?php echo $i+1; ?>'  id='tithing_<?php echo $i+1; ?>' name='tithing_<?php echo $i+1; ?>' value='<?php echo $tithing; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
		<tr>
			<td>Offerings</td>
			<?php
			for($i = 0; $i < 12; $i++)		
			{
				$offering =  $expenses[$i]['offerings'];
				?>
				<td><input class='form-control retirementExp offerings' disabled  type='number' data-id='<?php echo $i+1; ?>'  id='offerings_<?php echo $i+1; ?>' name='offerings_<?php echo $i+1; ?>' value='<?php echo $offerings; ?>' min='0'  /></td>
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
				<td><input class='form-control retirementExp charities' disabled  type='number' data-id='<?php echo $i+1; ?>'  id='charities_<?php echo $i+1; ?>' name='charities_<?php echo $i+1; ?>' value='<?php echo $charities; ?>' min='0'  /></td>
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
				<td><input class='form-control retirementExp personal_loan' disabled  type='number' data-id='<?php echo $i+1; ?>'  id='personal_loan_<?php echo $i+1; ?>' name='personal_loan_<?php echo $i+1; ?>' value='<?php echo $personal_loan; ?>' min='0'  /></td>
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
				<td><input class='form-control retirementExp credit_card' disabled  type='number' data-id='<?php echo $i+1; ?>'  id='credit_card_<?php echo $i+1; ?>' name='credit_card_<?php echo $i+1; ?>' value='<?php echo $credit_card; ?>' min='0'  /></td>
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
				<td><input class='form-control retirementExp student_loan' disabled  type='number' data-id='<?php echo $i+1; ?>'  id='student_loan_<?php echo $i+1; ?>' name='student_loan_<?php echo $i+1; ?>' value='<?php echo $student_loan; ?>' min='0'  /></td>
				<?php
			}
			?>
		</tr>
	<tr>
	<td class= "total_class">Total Expenses</td>
	<td><div class='form-group'>
	<span class='label label-info ' data-id='1'  id='totalexpenses_1'  disabled  name='totalexpenses_1'><?php echo $this->expensesTotalcalc(0,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='2'  id='totalexpenses_2'  disabled  name='totalexpenses_2'><?php echo $this->expensesTotalcalc(1,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='3'  id='totalexpenses_3'  disabled  name='totalexpenses_3'><?php echo $this->expensesTotalcalc(2,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='4'  id='totalexpenses_4'  disabled  name='totalexpenses_4'><?php echo $this->expensesTotalcalc(3,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='5'  id='totalexpenses_5'  disabled  name='totalexpenses_5'><?php echo $this->expensesTotalcalc(4,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='6'  id='totalexpenses_6'  disabled  name='totalexpenses_6'><?php echo $this->expensesTotalcalc(5,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='7'  id='totalexpenses_7'  disabled  name='totalexpenses_7'><?php echo $this->expensesTotalcalc(6,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='8'  id='totalexpenses_8'  disabled  name='totalexpenses_8'><?php echo $this->expensesTotalcalc(7,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='9'  id='totalexpenses_9'  disabled  name='totalexpenses_9'><?php echo $this->expensesTotalcalc(8,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='10' id='totalexpenses_10'  disabled  name='totalexpenses_10'><?php echo $this->expensesTotalcalc(9,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='11' id='totalexpenses_11'  disabled  name='totalexpenses_11'><?php echo $this->expensesTotalcalc(10,$expenses); ?></span>
	</div></td>                    
	<td><div class='form-group'>   
	<span class='label label-info ' data-id='12' id='totalexpenses_12'  disabled  name='totalexpenses_12'><?php echo $this->expensesTotalcalc(11,$expenses); ?></span>
	</div></td>
	</tr>
	<?php
	}
}

