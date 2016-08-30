<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Include_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function getRevenue($param)
	{	
		$this->db->where('year',$param['year']);
		$this->db->where('user_id',$param['user_id']);
		$query = $this->db->get('revenue');
		echo $query->num_rows();
		if($query->num_rows() > 0)
		{	
			return $query->result_array();
		}
	}
	function getWhereAreYouGoaing($param){
		var_dump($this->getRevenue($param));
		//;
	?>
		<tr>
			<td>Total Income</td>
			<td><input class='form-control commonwidth' type='number' data-id='1'  id='Totalincometxt_1'  disabled  name='Totalincometxt_1'  value='0' placeholder='Checking Account' /></td>
			
			<td><input class='form-control commonwidth' type='number' data-id='2'  id='Totalincometxt_2'  disabled  name='Totalincometxt_2'  value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='3'  id='Totalincometxt_3'  disabled  name='Totalincometxt_3'  value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='4'  id='Totalincometxt_4'  disabled  name='Totalincometxt_4'  value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='5'  id='Totalincometxt_5'  disabled  name='Totalincometxt_5'  value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='6'  id='Totalincometxt_6'  disabled  name='Totalincometxt_6'  value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='7'  id='Totalincometxt_7'  disabled  name='Totalincometxt_7'  value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='8'  id='Totalincometxt_8'  disabled  name='Totalincometxt_8'  value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='9'  id='Totalincometxt_9'  disabled  name='Totalincometxt_9'  value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='10' id='Totalincometxt_10'  disabled name='Totalincometxt_10' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='11' id='Totalincometxt_11'  disabled name='Totalincometxt_11' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='12' id='Totalincometxt_12'  disabled name='Totalincometxt_12' value='0' placeholder='Checking Account' /></td>
			
		</tr>
		<tr>
			<td>Total Expenses</td>
			<td><input class='form-control commonwidth' type='number' data-id='1'  id='TotalExpensestxt_1'  disabled  name='TotalExpensestxt_1'  value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='2'  id='TotalExpensestxt_2'  disabled  name='TotalExpensestxt_2'  value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='3'  id='TotalExpensestxt_3'  disabled  name='TotalExpensestxt_3'  value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='4'  id='TotalExpensestxt_4'  disabled  name='TotalExpensestxt_4'  value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='5'  id='TotalExpensestxt_5'  disabled  name='TotalExpensestxt_5'  value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='6'  id='TotalExpensestxt_6'  disabled  name='TotalExpensestxt_6'  value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='7'  id='TotalExpensestxt_7'  disabled  name='TotalExpensestxt_7'  value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='8'  id='TotalExpensestxt_8'  disabled  name='TotalExpensestxt_8'  value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='9'  id='TotalExpensestxt_9'  disabled  name='TotalExpensestxt_9'  value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='10' id='TotalExpensestxt_10'  disabled name='TotalExpensestxt_10' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='11' id='TotalExpensestxt_11'  disabled name='TotalExpensestxt_11' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='12' id='TotalExpensestxt_12'  disabled name='TotalExpensestxt_12' value='0' placeholder='Savings Account' /></td>
		</tr>
		<tr>
			<td>Left Over Money</td>
			<td><input class='form-control commonwidth' type='number' data-id='1'  id='LeftOverMoney_1' disabled  name='LeftOverMoney_1'  value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='2'  id='LeftOverMoney_2' disabled  name='LeftOverMoney_2'  value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='3'  id='LeftOverMoney_3' disabled  name='LeftOverMoney_3'  value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='4'  id='LeftOverMoney_4' disabled  name='LeftOverMoney_4'  value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='5'  id='LeftOverMoney_5' disabled  name='LeftOverMoney_5'  value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='6'  id='LeftOverMoney_6' disabled  name='LeftOverMoney_6'  value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='7'  id='LeftOverMoney_7' disabled  name='LeftOverMoney_7'  value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='8'  id='LeftOverMoney_8' disabled  name='LeftOverMoney_8'  value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='9'  id='LeftOverMoney_9' disabled  name='LeftOverMoney_9'  value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='10' id='LeftOverMoney_10' disabled name='LeftOverMoney_10' value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='11' id='LeftOverMoney_11' disabled name='LeftOverMoney_11' value='0' placeholder='Other' /></td>
			<td><input class='form-control commonwidth' type='number' data-id='12' id='LeftOverMoney_12' disabled name='LeftOverMoney_12' value='0' placeholder='Other' /></td>
		</tr>
	<tr><th colspan='13'>Revenue</th></tr>
	<thead>
	<tr>
			<td colspan='13'>Income</td>
			
		</tr>
	</thead>
		<tr>
			<td>Wife</td>
			<td><input class='form-control wife' type='number' data-id='1'  id='wife_1' name='wife_1' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='2'  id='wife_2' name='wife_2' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='3'  id='wife_3'  name='wife_3' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='4'  id='wife_4'  name='wife_4' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='5'  id='wife_5'  name='wife_5' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='6'  id='wife_6'  name='wife_6' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='7'  id='wife_7'  name='wife_7' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='8'  id='wife_8'  name='wife_8' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='9'  id='wife_9'  name='wife_9' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='10' id='wife_10' name='wife_10' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='11' id='wife_11' name='wife_11' value='0' placeholder='Checking Account' /></td>
			<td><input class='form-control wife' type='number' data-id='12' id='wife_12' name='wife_12' value='0' placeholder='Checking Account' /></td>
			
		</tr>
		<tr>
			<td>Husband</td>
			<td><input class='form-control husband' type='number' data-id='1'  id='husband_1'  name='husband_1' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='2'  id='husband_2'  name='husband_2' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='3'  id='husband_3'  name='husband_3' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='4'  id='husband_4'  name='husband_4' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='5'  id='husband_5'  name='husband_5' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='6'  id='husband_6'  name='husband_6' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='7'  id='husband_7'  name='husband_7' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='8'  id='husband_8'  name='husband_8' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='9'  id='husband_9'  name='husband_9' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='10' id='husband_10' name='husband_10' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='11' id='husband_11' name='husband_11' value='0' placeholder='Savings Account' /></td>
			<td><input class='form-control husband' type='number' data-id='12' id='husband_12' name='husband_12' value='0' placeholder='Savings Account' /></td>
		</tr>
		<tr>
			<td>Bonuses</td>
			<td><input class='form-control bonus' type='number' data-id='1'  id='bonuses_1'  name='bonuses_1'  value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='2'  id='bonuses_2'  name='bonuses_2'  value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='3'  id='bonuses_3'  name='bonuses_3'  value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='4'  id='bonuses_4'  name='bonuses_4'  value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='5'  id='bonuses_5'  name='bonuses_5'  value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='6'  id='bonuses_6'  name='bonuses_6'  value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='7'  id='bonuses_7'  name='bonuses_7'  value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='8'  id='bonuses_8'  name='bonuses_8'  value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='9'  id='bonuses_9'  name='bonuses_9'  value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='10' id='bonuses_10' name='bonuses_10' value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='11' id='bonuses_11' name='bonuses_11' value='0' placeholder='Other' /></td>
			<td><input class='form-control bonus' type='number' data-id='12' id='bonuses_12' name='bonuses_12' value='0' placeholder='Other' /></td>
		</tr>	
		<tr>
			<td>Dividend/Interest</td>
			<td><input class='form-control dividend' type='number' data-id='1'  id='dividend_1'  name='dividend_1'  value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='2'  id='dividend_2'  name='dividend_2'  value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='3'  id='dividend_3'  name='dividend_3'  value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='4'  id='dividend_4'  name='dividend_4'  value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='5'  id='dividend_5'  name='dividend_5'  value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='6'  id='dividend_6'  name='dividend_6'  value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='7'  id='dividend_7'  name='dividend_7'  value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='8'  id='dividend_8'  name='dividend_8'  value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='9'  id='dividend_9'  name='dividend_9'  value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='10' id='dividend_10' name='dividend_10' value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='11' id='dividend_11' name='dividend_11' value='0' placeholder='Other' /></td>
			<td><input class='form-control dividend' type='number' data-id='12' id='dividend_12' name='dividend_12' value='0' placeholder='Other' /></td>
		</tr>
		<tr>
			<td>Other</td>
			<td><input class='form-control other' type='number' data-id='1'  id='other_1'  name='other_1'  value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='2'  id='other_2'  name='other_2'  value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='3'  id='other_3'  name='other_3'  value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='4'  id='other_4'  name='other_4'  value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='5'  id='other_5'  name='other_5'  value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='6'  id='other_6'  name='other_6'  value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='7'  id='other_7'  name='other_7'  value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='8'  id='other_8'  name='other_8'  value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='9'  id='other_9'  name='other_9'  value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='10' id='other_10' name='other_10' value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='11' id='other_11' name='other_11' value='0' placeholder='Other' /></td>
			<td><input class='form-control other' type='number' data-id='12' id='other_12' name='other_12' value='0' placeholder='Other' /></td>
		</tr>
		<tr>
			<td>Total Income</td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='1' id='totalincome_1' name='totalincome_1'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='2' id='totalincome_2' name='totalincome_2'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='3' id='totalincome_3' name='totalincome_3'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='4' id='totalincome_4' name='totalincome_4'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='5' id='totalincome_5' name='totalincome_5'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='6' id='totalincome_6' name='totalincome_6'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='7' id='totalincome_7' name='totalincome_7'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='8' id='totalincome_8' name='totalincome_8'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='9' id='totalincome_9' name='totalincome_9'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='10' id='totalincome_10' name='totalincome_10'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='11' id='totalincome_11' name='totalincome_11'>00.00</span>
			</div></td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='12' id='totalincome_12' name='totalincome_12'>00.00</span>
			</div></td>
		</tr>
		
		<tr><th colspan='13'>Expenses</th></tr>
	<thead>
	<tr>
			<td colspan='13'>Saving</td>
			
		</tr>
	</thead>
		<tr>
			<td>Retirement</td>
			<td><input class='form-control retirementExp retirement' data-id='1'  type='number' id='retirement_1'  name='retirement_1' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='2'  type='number' id='retirement_2'  name='retirement_2' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='3'  type='number' id='retirement_3'  name='retirement_3' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='4'  type='number' id='retirement_4'  name='retirement_4' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='5'  type='number' id='retirement_5'  name='retirement_5' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='6'  type='number' id='retirement_6'  name='retirement_6' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='7'  type='number' id='retirement_7'  name='retirement_7' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='8'  type='number' id='retirement_8'  name='retirement_8' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='9'  type='number' id='retirement_9'  name='retirement_9' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='10' type='number' id='retirement_10' name='retirement_10' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='11' type='number' id='retirement_11' name='retirement_11' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			<td><input class='form-control retirementExp retirement' data-id='12' type='number' id='retirement_12' name='retirement_12' value='0' placeholder='Securities (Bonds, Stock, Mutual Funds)' /></td>
			
		</tr>
		
		<tr>
			<td colspan='13'>Home</td>
			
		</tr>
	</thead>
		<tr>
			<td>Mortgage or Rent</td>
			<td><input class='form-control retirementExp rent' type='number' data-id='1'  id='rent_1'  name='rent_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='2'  id='rent_2'  name='rent_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='3'  id='rent_3'  name='rent_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='4'  id='rent_4'  name='rent_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='5'  id='rent_5'  name='rent_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='6'  id='rent_6'  name='rent_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='7'  id='rent_7'  name='rent_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='8'  id='rent_8'  name='rent_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='9'  id='rent_9'  name='rent_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='10' id='rent_10' name='rent_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='11' id='rent_11' name='rent_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp rent' type='number' data-id='12' id='rent_12' name='rent_12' value='0' placeholder='Other Investments' /></td>
			
		</tr>
		<tr>
			<td>Home Repairs/Maintenance</td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='1'  id='homerepairs_1'  name='homerepairs_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='2'  id='homerepairs_2'  name='homerepairs_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='3'  id='homerepairs_3'  name='homerepairs_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='4'  id='homerepairs_4'  name='homerepairs_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='5'  id='homerepairs_5'  name='homerepairs_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='6'  id='homerepairs_6'  name='homerepairs_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='7'  id='homerepairs_7'  name='homerepairs_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='8'  id='homerepairs_8'  name='homerepairs_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='9'  id='homerepairs_9'  name='homerepairs_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='10' id='homerepairs_10' name='homerepairs_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='11' id='homerepairs_11' name='homerepairs_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homerepairs' type='number' data-id='12' id='homerepairs_12' name='homerepairs_12' value='0' placeholder='Other Investments' /></td>
														 
		</tr>
		<tr>
			<td>Home Insurance</td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='1'  id='homeinsurance_1'  name='homeinsurance_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='2'  id='homeinsurance_2'  name='homeinsurance_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='3'  id='homeinsurance_3'  name='homeinsurance_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='4'  id='homeinsurance_4'  name='homeinsurance_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='5'  id='homeinsurance_5'  name='homeinsurance_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='6'  id='homeinsurance_6'  name='homeinsurance_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='7'  id='homeinsurance_7'  name='homeinsurance_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='8'  id='homeinsurance_8'  name='homeinsurance_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='9'  id='homeinsurance_9'  name='homeinsurance_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='10' id='homeinsurance_10' name='homeinsurance_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='11' id='homeinsurance_11' name='homeinsurance_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp homeinsurance' type='number' data-id='12' id='homeinsurance_12' name='homeinsurance_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		
		<tr>
			<td colspan='13'>Utilities</td>
			
		</tr>
	</thead>
		<tr>
			<td>Garbage/Trash Service</td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='1'  id='garbage_1'  name='garbage_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='2'  id='garbage_2'  name='garbage_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='3'  id='garbage_3'  name='garbage_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='4'  id='garbage_4'  name='garbage_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='5'  id='garbage_5'  name='garbage_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='6'  id='garbage_6'  name='garbage_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='7'  id='garbage_7'  name='garbage_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='8'  id='garbage_8'  name='garbage_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='9'  id='garbage_9'  name='garbage_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='10' id='garbage_10' name='garbage_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='11' id='garbage_11' name='garbage_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp garbage' type='number' data-id='12' id='garbage_12' name='garbage_12' value='0' placeholder='Other Investments' /></td>
			
		</tr>
		<tr>
			<td>Electricity</td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='1'  id='electricity_1'  name='electricity_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='2'  id='electricity_2'  name='electricity_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='3'  id='electricity_3'  name='electricity_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='4'  id='electricity_4'  name='electricity_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='5'  id='electricity_5'  name='electricity_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='6'  id='electricity_6'  name='electricity_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='7'  id='electricity_7'  name='electricity_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='8'  id='electricity_8'  name='electricity_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='9'  id='electricity_9'  name='electricity_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='10' id='electricity_10' name='electricity_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='11' id='electricity_11' name='electricity_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp electricity' type='number' data-id='12' id='electricity_12' name='electricity_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Water/Sewer</td>
			<td><input class='form-control retirementExp water' type='number' data-id='1'  id='water_1'  name='water_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='2'  id='water_2'  name='water_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='3'  id='water_3'  name='water_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='4'  id='water_4'  name='water_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='5'  id='water_5'  name='water_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='6'  id='water_6'  name='water_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='7'  id='water_7'  name='water_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='8'  id='water_8'  name='water_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='9'  id='water_9'  name='water_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='10' id='water_10' name='water_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='11' id='water_11' name='water_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp water' type='number' data-id='12' id='water_12' name='water_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Gas</td>
			<td><input class='form-control retirementExp gas' type='number' data-id='1'  id='gas_1'  name='gas_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='2'  id='gas_2'  name='gas_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='3'  id='gas_3'  name='gas_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='4'  id='gas_4'  name='gas_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='5'  id='gas_5'  name='gas_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='6'  id='gas_6'  name='gas_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='7'  id='gas_7'  name='gas_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='8'  id='gas_8'  name='gas_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='9'  id='gas_9'  name='gas_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='10' id='gas_10' name='gas_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='11' id='gas_11' name='gas_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp gas' type='number' data-id='12' id='gas_12' name='gas_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Internet</td>
			<td><input class='form-control retirementExp internet' type='number' data-id='1'  id='internet_1'  name='internet_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='2'  id='internet_2'  name='internet_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='3'  id='internet_3'  name='internet_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='4'  id='internet_4'  name='internet_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='5'  id='internet_5'  name='internet_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='6'  id='internet_6'  name='internet_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='7'  id='internet_7'  name='internet_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='8'  id='internet_8'  name='internet_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='9'  id='internet_9'  name='internet_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='10' id='internet_10' name='internet_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='11' id='internet_11' name='internet_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp internet' type='number' data-id='12' id='internet_12' name='internet_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Telephones (land-lines and cell phones)</td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='1'  id='telephones_1'  name='telephones_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='2'  id='telephones_2'  name='telephones_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='3'  id='telephones_3'  name='telephones_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='4'  id='telephones_4'  name='telephones_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='5'  id='telephones_5'  name='telephones_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='6'  id='telephones_6'  name='telephones_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='7'  id='telephones_7'  name='telephones_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='8'  id='telephones_8'  name='telephones_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='9'  id='telephones_9'  name='telephones_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='10' id='telephones_10' name='telephones_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='11' id='telephones_11' name='telephones_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp telephones' type='number' data-id='12' id='telephones_12' name='telephones_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Cable/TV:</td>
			<td><input class='form-control retirementExp cable' type='number' data-id='1'  id='cable_1'  name='cable_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='2'  id='cable_2'  name='cable_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='3'  id='cable_3'  name='cable_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='4'  id='cable_4'  name='cable_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='5'  id='cable_5'  name='cable_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='6'  id='cable_6'  name='cable_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='7'  id='cable_7'  name='cable_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='8'  id='cable_8'  name='cable_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='9'  id='cable_9'  name='cable_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='10' id='cable_10' name='cable_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='11' id='cable_11' name='cable_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp cable' type='number' data-id='12' id='cable_12' name='cable_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		
		<tr>
			<td colspan='13'>Transportation</td>
			
		</tr>
	</thead>
		<tr>
			<td>Gas/Public Transportation/ Parking</td>
			<td><input class='form-control retirementExp parking' type='number' data-id='1'  id='parking_1'  name='parking_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='2'  id='parking_2'  name='parking_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='3'  id='parking_3'  name='parking_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='4'  id='parking_4'  name='parking_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='5'  id='parking_5'  name='parking_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='6'  id='parking_6'  name='parking_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='7'  id='parking_7'  name='parking_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='8'  id='parking_8'  name='parking_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='9'  id='parking_9'  name='parking_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='10' id='parking_10' name='parking_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='11' id='parking_11' name='parking_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp parking' type='number' data-id='12' id='parking_12' name='parking_12' value='0' placeholder='Other Investments' /></td>
			
		</tr>
		<tr>
			<td>Car Payment</td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='1'  id='carpayment_1'  name='carpayment_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='2'  id='carpayment_2'  name='carpayment_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='3'  id='carpayment_3'  name='carpayment_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='4'  id='carpayment_4'  name='carpayment_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='5'  id='carpayment_5'  name='carpayment_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='6'  id='carpayment_6'  name='carpayment_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='7'  id='carpayment_7'  name='carpayment_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='8'  id='carpayment_8'  name='carpayment_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='9'  id='carpayment_9'  name='carpayment_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='10' id='carpayment_10' name='carpayment_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='11' id='carpayment_11' name='carpayment_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp carpayment' type='number' data-id='12' id='carpayment_12' name='carpayment_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>License Plates/Registration Fees</td>
			<td><input class='form-control retirementExp license' type='number' data-id='1'  id='license_1'  name='license_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='2'  id='license_2'  name='license_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='3'  id='license_3'  name='license_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='4'  id='license_4'  name='license_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='5'  id='license_5'  name='license_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='6'  id='license_6'  name='license_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='7'  id='license_7'  name='license_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='8'  id='license_8'  name='license_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='9'  id='license_9'  name='license_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='10' id='license_10' name='license_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='11' id='license_11' name='license_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp license' type='number' data-id='12' id='license_12' name='license_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Car Repairs and Maintenance</td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='1'  id='repairs_1'  name='repairs_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='2'  id='repairs_2'  name='repairs_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='3'  id='repairs_3'  name='repairs_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='4'  id='repairs_4'  name='repairs_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='5'  id='repairs_5'  name='repairs_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='6'  id='repairs_6'  name='repairs_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='7'  id='repairs_7'  name='repairs_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='8'  id='repairs_8'  name='repairs_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='9'  id='repairs_9'  name='repairs_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='10' id='repairs_10' name='repairs_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='11' id='repairs_11' name='repairs_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp repairs' type='number' data-id='12' id='repairs_12' name='repairs_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		
		<tr>
			<td colspan='13'>Personal Care</td>
			
		</tr>
	</thead>
		<tr>
			<td>Insurance (Life, Disability, Health)</td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='1'  id='insurance_1'  name='insurance_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='2'  id='insurance_2'  name='insurance_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='3'  id='insurance_3'  name='insurance_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='4'  id='insurance_4'  name='insurance_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='5'  id='insurance_5'  name='insurance_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='6'  id='insurance_6'  name='insurance_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='7'  id='insurance_7'  name='insurance_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='8'  id='insurance_8'  name='insurance_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='9'  id='insurance_9'  name='insurance_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='10' id='insurance_10' name='insurance_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='11' id='insurance_11' name='insurance_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp insurance' type='number' data-id='12' id='insurance_12' name='insurance_12' value='0' placeholder='Other Investments' /></td>
			
		</tr>
		<tr>
			<td>Charitable/Donation/Gifts</td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='1'  id='charitable_1'  name='charitable_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='2'  id='charitable_2'  name='charitable_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='3'  id='charitable_3'  name='charitable_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='4'  id='charitable_4'  name='charitable_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='5'  id='charitable_5'  name='charitable_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='6'  id='charitable_6'  name='charitable_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='7'  id='charitable_7'  name='charitable_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='8'  id='charitable_8'  name='charitable_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='9'  id='charitable_9'  name='charitable_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='10' id='charitable_10' name='charitable_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='11' id='charitable_11' name='charitable_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp charitable' type='number' data-id='12' id='charitable_12' name='charitable_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Child Care/Tuition</td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='1'  id='childcare_1'  name='childcare_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='2'  id='childcare_2'  name='childcare_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='3'  id='childcare_3'  name='childcare_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='4'  id='childcare_4'  name='childcare_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='5'  id='childcare_5'  name='childcare_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='6'  id='childcare_6'  name='childcare_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='7'  id='childcare_7'  name='childcare_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='8'  id='childcare_8'  name='childcare_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='9'  id='childcare_9'  name='childcare_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='10' id='childcare_10' name='childcare_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='11' id='childcare_11' name='childcare_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp childcare' type='number' data-id='12' id='childcare_12' name='childcare_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Clothing</td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='1'  id='clothing_1'  name='clothing_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='2'  id='clothing_2'  name='clothing_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='3'  id='clothing_3'  name='clothing_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='4'  id='clothing_4'  name='clothing_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='5'  id='clothing_5'  name='clothing_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='6'  id='clothing_6'  name='clothing_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='7'  id='clothing_7'  name='clothing_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='8'  id='clothing_8'  name='clothing_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='9'  id='clothing_9'  name='clothing_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='10' id='clothing_10' name='clothing_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='11' id='clothing_11' name='clothing_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp clothing' type='number' data-id='12' id='clothing_12' name='clothing_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Entertainment (Movies, Restaurant,  trips, Magazines & Newspapers, etc</td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='1'  id='entertainment_1'  name='entertainment_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='2'  id='entertainment_2'  name='entertainment_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='3'  id='entertainment_3'  name='entertainment_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='4'  id='entertainment_4'  name='entertainment_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='5'  id='entertainment_5'  name='entertainment_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='6'  id='entertainment_6'  name='entertainment_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='7'  id='entertainment_7'  name='entertainment_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='8'  id='entertainment_8'  name='entertainment_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='9'  id='entertainment_9'  name='entertainment_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='10' id='entertainment_10' name='entertainment_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='11' id='entertainment_11' name='entertainment_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp entertainment' type='number' data-id='12' id='entertainment_12' name='entertainment_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Groceries</td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='1'  id='groceries_1'  name='groceries_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='2'  id='groceries_2'  name='groceries_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='3'  id='groceries_3'  name='groceries_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='4'  id='groceries_4'  name='groceries_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='5'  id='groceries_5'  name='groceries_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='6'  id='groceries_6'  name='groceries_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='7'  id='groceries_7'  name='groceries_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='8'  id='groceries_8'  name='groceries_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='9'  id='groceries_9'  name='groceries_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='10' id='groceries_10' name='groceries_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='11' id='groceries_11' name='groceries_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp groceries' type='number' data-id='12' id='groceries_12' name='groceries_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Medical</td>
			<td><input class='form-control retirementExp medical' type='number' data-id='1'  id='medical_1'  name='medical_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='2'  id='medical_2'  name='medical_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='3'  id='medical_3'  name='medical_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='4'  id='medical_4'  name='medical_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='5'  id='medical_5'  name='medical_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='6'  id='medical_6'  name='medical_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='7'  id='medical_7'  name='medical_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='8'  id='medical_8'  name='medical_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='9'  id='medical_9'  name='medical_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='10' id='medical_10' name='medical_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='11' id='medical_11' name='medical_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp medical' type='number' data-id='12' id='medical_12' name='medical_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Personal (Barber, beauty shop)</td>
			<td><input class='form-control retirementExp personal' type='number' data-id='1'  id='personal_1'  name='personal_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='2'  id='personal_2'  name='personal_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='3'  id='personal_3'  name='personal_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='4'  id='personal_4'  name='personal_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='5'  id='personal_5'  name='personal_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='6'  id='personal_6'  name='personal_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='7'  id='personal_7'  name='personal_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='8'  id='personal_8'  name='personal_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='9'  id='personal_9'  name='personal_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='10' id='personal_10' name='personal_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='11' id='personal_11' name='personal_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp personal' type='number' data-id='12' id='personal_12' name='personal_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Dry Cleaning</td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='1'  id='drycleaning_1'  name='drycleaning_1'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='2'  id='drycleaning_2'  name='drycleaning_2'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='3'  id='drycleaning_3'  name='drycleaning_3'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='4'  id='drycleaning_4'  name='drycleaning_4'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='5'  id='drycleaning_5'  name='drycleaning_5'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='6'  id='drycleaning_6'  name='drycleaning_6'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='7'  id='drycleaning_7'  name='drycleaning_7'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='8'  id='drycleaning_8'  name='drycleaning_8'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='9'  id='drycleaning_9'  name='drycleaning_9'  value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='10' id='drycleaning_10' name='drycleaning_10' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='11' id='drycleaning_11' name='drycleaning_11' value='0' placeholder='Other Investments' /></td>
			<td><input class='form-control retirementExp drycleaning' type='number' data-id='12' id='drycleaning_12' name='drycleaning_12' value='0' placeholder='Other Investments' /></td>
		</tr>
		<tr>
			<td>Total Expenses</td>
			<td><div class='form-group'>
			<span class='label label-info ' data-id='1'  id='totalexpenses_1' name='totalexpenses_1'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='2'  id='totalexpenses_2' name='totalexpenses_2'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='3'  id='totalexpenses_3' name='totalexpenses_3'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='4'  id='totalexpenses_4' name='totalexpenses_4'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='5'  id='totalexpenses_5' name='totalexpenses_5'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='6'  id='totalexpenses_6' name='totalexpenses_6'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='7'  id='totalexpenses_7' name='totalexpenses_7'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='8'  id='totalexpenses_8' name='totalexpenses_8'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='9'  id='totalexpenses_9' name='totalexpenses_9'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='10' id='totalexpenses_10' name='totalexpenses_10'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='11' id='totalexpenses_11' name='totalexpenses_11'>00.00</span>
			</div></td>                    
			<td><div class='form-group'>   
			<span class='label label-info ' data-id='12' id='totalexpenses_12' name='totalexpenses_12'>00.00</span>
			</div></td>
			
			
		</tr>
	<?php
	}
	
	
}

