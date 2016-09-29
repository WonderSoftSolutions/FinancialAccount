<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Account_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
		//echo $this->db->dbprefix;
    }
	
	function register($users)
	{
		if($users['id'] == "")
		{
			$this->db->insert('users', $users);
			
			$user['email_cc'] = $users['email'];
			$user['email_bcc'] = $users['email'];
			
			$users['id'] = $this->db->insert_id();
			$email['mailbody'] = $this->email_model->AccountVerifyHTML($users);
			$email['subject'] = 'Account Verification Mail - Micoufinance';
			if($this->email_model->send_mail($email,$users) == true)
			{
				return '<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>';
			}else{
				return '<div class="alert alert-success text-center">You are Successfully Registered! Please wait for confirmation mail!!!</div>';
			}
			//return $this->db->insert_id();			
		}
		else
		{
			$this->db->where('id', $users['id']);
			$this->db->update('users', $users);
			return "done";
			//return $users['id'];
		}
	}
	
	function get_user_profile($id = null)
	{
		if($id != null)
		{
		
			$query=$this->db->query("SELECT users.id,users.fname as first_name, users.lname as last_name, users.email, users.annual_income, users.register_method as platform, users.email_verified, users.status, users.datetime as date_time FROM `users` where users.id = '$id' ");
			// $this->db->where('id', $id);
			// $query=$this->db->get("users");
			if($query->num_rows() > 0)
			{
				return $query->row_array();
			}
			else{return null;}
		}
		else{return null;}
	}
	
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	function RecoverAccount($mail){
		$newpwd = $this->generateRandomString();
		
		$email['mailbody'] = $this->email_model->ForgotPwdHTML($newpwd);
		$email['subject'] = 'Account Recover - Micoufinance';
		$users['email'] = $mail;
		$users['pwd'] = md5($newpwd);
		if($this->email_model->send_mail($email,$users) == true)
		{
			$this->db->where('email', $users['email']);
			$this->db->update('users', $users);
			return '<div class="label label-success">New password sent on your registered mail.</div>';
		}
		else{
			return '<div class="label label-danger">Please try again later!!!</div>';
		}
		
		
		// $this->db->where('email', $email);
		// $users['pwd'] = ''
		// $this->db->update('users', $users);
		// return "done";
	}
	
	function check_email($email)
	{
		$this->db->where('email', $email);
		$query=$this->db->get("users");
        if($query->num_rows() > 0)
		{
			//$query->row_array()
			//return $rows->ID;
			return true;
		}
		else{
			return false;
		}
	}

	function check_current_password($password)
	{
		$this->db->where('id', $password['id']);
		$this->db->where('pwd', md5($password['currentpassword']));
		$query=$this->db->get("users");
        if($query->num_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	function do_login($users)
	{
		$this->db->where('email', $users['user_login']);
		$this->db->where('pwd', $users['user_pass']);
		$this->db->where('status',1);
		
		$query=$this->db->get("users");
        if($query->num_rows() > 0)
		{
			$row = $query->row_array();
			$this->session->set_userdata('usr_id',$row['id']);
			$this->session->set_userdata('user_email',$users['user_login']);
			$this->session->set_userdata('user_fname',$row['fname']);
			$this->session->set_userdata('user_lname',$row['lname']);
			$this->session->set_userdata('user_login_status',true);
			return true;
		}
		else{
			return false;
		}
	}
	
	function do_loginAPI($users)
	{
		$this->db->where('email', $users['user_login']);
		$this->db->where('pwd', md5($users['user_pass']));
		$this->db->where('status',1);
		$query=$this->db->get("users");
		if($query->num_rows() > 0)
		{	
			$row = $query->row_array();
			return $row['id'];
		}else
		{
			return false; 
		}
	}
	function do_logout()
	{
		$this->session->sess_destroy();
	}
	
	function user_check_login()
	{
		//$userid = $this->session->userdata('user_id');
		$user_login_status = $this->session->userdata('user_login_status');
		if($user_login_status != true){
			//redirect(base_url());
			return "false";
		}else{return 'true';}
	}
	
	function AccountVerify($id)
	{
		$bool = '0';
		$arraydata = explode('_@_',$id);
		if(sizeof($arraydata) > 0)
		{
			$email  = $arraydata[0];//Base64 //gouravgupta162@gmail.com  
			$pwd  = $arraydata[1];
			
			$this->db->where("email",base64_decode($email));
			$this->db->where("pwd",$pwd);
			$query=$this->db->get("users");
			if($query->num_rows()>0)
			{
				$rowdata = $query->row_array();
				$user['id'] = $rowdata['id'];
				$user['email'] = $rowdata['email'];
				$user['pwd'] = $rowdata['pwd'];
				$user['status'] = '1';
				$user['email_verified'] = '1';
				if($this->register($user) == 'done')
				{
					$bool = '1';	
				}
				// $sql = "update `user_register` set status = '1' where email_id = '".base64_decode($email)."' and usr_password = '$pwd' ";
				// $query = $this->db->query($sql);
			}
		}
		if($bool=='1')
		{
			$this->session->set_userdata('auth','1');
			//echo  "Auth";
		}
		else{
			$this->session->set_userdata('auth','0');
		}
		echo '<script>window.location.href="'.base_url().'"; </script>';
	}
	
	function AccountVerifyMobile($id)
	{
		$bool = '0';
		$arraydata = explode('_@_',$id);
		if(sizeof($arraydata) > 0)
		{
			$email  = $arraydata[0];//Base64 //gouravgupta162@gmail.com  
			$pwd  = $arraydata[1];
			
			$this->db->where("email",base64_decode($email));
			$this->db->where("pwd",$pwd);
			$query=$this->db->get("users");
			if($query->num_rows()>0)
			{
				$rowdata = $query->row_array();
				$user['id'] = $rowdata['id'];
				$user['email'] = $rowdata['email'];
				$user['pwd'] = $rowdata['pwd'];
				$user['status'] = '1';
				$user['email_verified'] = '1';
				if($this->register($user) == 'done')
				{
					$bool = '1';	
				}
				// $sql = "update `user_register` set status = '1' where email_id = '".base64_decode($email)."' and usr_password = '$pwd' ";
				// $query = $this->db->query($sql);
			}
		}
		if($bool=='1')
		{
			$this->session->set_userdata('auth','1');
			echo  "1";
		}
		else{
			$this->session->set_userdata('auth','0');
			echo  "1";
		}
		
	}
	
	function GoalSave($goal)
	{
		if($goal['id'] == "")
		{
			$this->db->where('name', $goal['name']);
			$query=$this->db->get('goals', $goal);
			if($query->num_rows()>0)
			{
				$rowdata = $query->row_array();
				return $rowdata['id'];
			}
			else{
				$this->db->insert('goals', $goal);
				return $this->db->insert_id();			
			}
		}
		else
		{
			
			$this->db->where('id', $goal['id']);
			$this->db->update('goals', $goal);
			return $users['id'];
		}
	}
	
	function goalmanagement($goal)//Goal deactive
	{
		$this->db->where('id', $goal['id']);
		$this->db->update('user_goals', $goal);
		return $goal['id'];
	}
	
	function goaldeleteAPI($user_goals)//Goal deactive
	{
		$this->db->where('id', $user_goals['id']);
		$this->db->where('user_id', $user_goals['user_id']);
		$this->db->update('user_goals', $user_goals);
		return $user_goals['id'];
	}
	
	// function usersamegoalcheck($goalID)//Goal check in user goals
	// {
		// $this->db->where('goal_id', $goalID);
		// $this->db->where('user_id', $this->session->userdata('usr_id'));
		// $this->db->where('goal_status', '1');
		// $query=$this->db->get('user_goals');
		// if($query->num_rows()>0)
		// {
			// return true;
		// }
		// else{
			// return false;
		// }
	// }
	
	function usersamegoalcheck($goalID,$userid)//Goal check in user goals
	{
		$this->db->where('goal_id', $goalID);
		$this->db->where('user_id', $userid);
		$this->db->where('goal_status', '1');
		$query=$this->db->get('user_goals');
		if($query->num_rows()>0)
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	function goaladdingbyuser($goal)
	{
		$goals['id'] = '';
		$goals['name'] = $goal['id_goal'];
		$goals['status'] = '1';
		$goalID = $this->GoalSave($goals);
		
		//$goalstatus = $this->usersamegoalcheck($goalID);
		if($goal['user_id'])
		{
			$goalstatus = $this->usersamegoalcheck($goalID,$goal['user_id']);
		}else{
			$goalstatus = $this->usersamegoalcheck($goalID,$this->session->userdata('usr_id'));
		}
		
		
		if($goalstatus == true)
		{
			return "alreadyexists";
		}
		else{
		
			if($goal['user_id'])
			{
				$user_goals['user_id'] = $goal['user_id'];	
			}else{
				$user_goals['user_id'] = $this->session->userdata('usr_id');	
			}
			
			//$user_goals['user_id'] = $this->session->userdata('usr_id');
			$user_goals['goal_id'] = $goalID;
			$user_goals['term_id'] = $goal['id_term'];
			$user_goals['cost'] = $goal['id_cost'];
			$user_goals['monthly_target'] = $goal['id_monthtarget'];
			$user_goals['currently_saved'] = $goal['id_currentsaved'];
			$user_goals['target_date'] = $goal['id_datetimepicker1'];
			$user_goals['goal_status'] = '1';
			
			$this->db->insert('user_goals', $user_goals);
			
			if($this->db->affected_rows() > 0)
			{
				return $this->db->insert_id();	
			}
			else{
				return "0";
			}
		}
		
	}
	function goaleditingbyuser($goal)
	{
		
		$goals['id'] = '';
		$goals['name'] = $goal['id_goal'];
		$goals['status'] = '1';
		$goalID = $this->GoalSave($goals);
		$goalstatus;
		
		$sql = "select * from user_goals where id <> '".$goal['usergoalid']."' and goal_id in (SELECT id FROM `goals` where name = '".$goals['name']."' ) and user_id = '".$goal['user_id']."' and goal_status = '1' ";
		$query=$this->db->query($sql);

		if($query->num_rows()>0)
		{
			$goalstatus = true;
		}else{
			$goalstatus = false;
		}


		
		if($goalstatus == true)
		{
			//return "alreadyexists";
			
			//$user_goals['goal_id'] = $goalID;
			$user_goals['term_id'] = $goal['id_term'];
			$user_goals['cost'] = $goal['id_cost'];
			$user_goals['monthly_target'] = $goal['id_monthtarget'];
			$user_goals['currently_saved'] = $goal['id_currentsaved'];
			$user_goals['target_date'] = $goal['id_datetimepicker1'];
			$user_goals['goal_status'] = '1';
			
			$this->db->where('id', $goal['usergoalid']);
			$this->db->update('user_goals', $user_goals);
			
			return $goal['usergoalid'];//$this->db->affected_rows();// insert_id();	
		}
		else
		{
			if($goal['user_id'])
			{
				$user_goals['user_id'] = $goal['user_id'];	
			}else{
				$user_goals['user_id'] = $this->session->userdata('usr_id');	
			}
			
			$user_goals['goal_id'] = $goalID;
			$user_goals['term_id'] = $goal['id_term'];
			//$user_goals['id'] = $goal['usergoalid'];
			$user_goals['cost'] = $goal['id_cost'];
			$user_goals['monthly_target'] = $goal['id_monthtarget'];
			$user_goals['currently_saved'] = $goal['id_currentsaved'];
			$user_goals['target_date'] = $goal['id_datetimepicker1'];
			$user_goals['goal_status'] = '1';
			
			$this->db->where('id', $goal['usergoalid']);
			$this->db->update('user_goals', $user_goals);
			
			return $this->db->insert_id();	
		}
	}
	
	function getactiveGoals($status)
	{
		//$a['goalslist']=array();
		$this->db->where("status",$status);
		$query=$this->db->get("goals");
		if($query->num_rows()>0)
		{
			//$query->result_array();
			//array_push($a['goalslist'],$query->result_array());
			return $query->result_array();
		}
		else{
			return "nogoal";
		}
	}
	
	function getactiveTerms($status)
	{
		$this->db->where("status",$status);
		$query=$this->db->get("terms");
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		else{
			return "noterm";
		}
	}
	function getgoalDetails($id)
	{
		$this->db->where("id",$id);
		$query=$this->db->get("goals");
		if($query->num_rows()>0)
		{
			//$query->result_array();
			//array_push($a['goalslist'],$query->result_array());
			return $query->row_array();
		}
	}
	function gettermDetails($id)
	{
		$this->db->where("id",$id);
		$query=$this->db->get("terms");
		if($query->num_rows()>0)
		{
			//$query->result_array();
			//array_push($a['goalslist'],$query->result_array());
			return $query->row_array();
		}
	}
	function getAllgoals($status)
	{
		$this->db->where("goal_status",$status);
		$this->db->where("user_id",$this->session->userdata('usr_id'));
		$query=$this->db->get("user_goals");
		if($query->num_rows()>0)
		{
			 $array = $query->result_array();
			// $temparray[] = array();
			foreach($array as $row)
			{
				$goaldetails = $this->getgoalDetails($row['goal_id']);
				$termdetails = $this->gettermDetails($row['term_id']);
				// $b['goalname'] = $goaldetails['name'];
				// $b['termname'] = $termdetails['name'];
				// $b['cost'] = $row['cost'];
				// $b['monthly_target'] = $row['monthly_target'];
				// $b['currently_saved'] = $row['currently_saved'];
				// $b['target_date'] = $row['target_date'];
				
				?>
				<tr id="row_<?php echo $row['id']; ?>">
					<td><a  href="<?php echo site_url('pages/editGoal/'.$row['id']); ?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
					<a  href="javascript:void(0)" onclick="deleteGoal('<?php echo $row['id']; ?>')" ><span class="glyphicon glyphicon-remove"></span></a>&nbsp;<?php echo $goaldetails['name']; ?></td>
					<td class="hidden-xs hidden-sm"><?php echo $termdetails['name']; ?></td>
					<td>$<?php echo $this->currencyconverter($row['cost']); ?></td>
					<td class="hidden-xs hidden-sm">$<?php echo $this->currencyconverter($row['monthly_target']); ?></td>
					<td>$<?php echo $this->currencyconverter($row['currently_saved']); ?></td>
					<td class="hidden-xs hidden-sm"><?php echo $row['target_date']; ?></td>
				</tr>
				<?php
				//array_push([$temparray],$b);
			}
			//echo json_encode($temparray);
		}
		else{
			echo "nogoal";
		}
	}
	
	function getAllgoalsAjax($status,$user_id)
	{
		// $this->db->where("goal_status",$status);
		// $this->db->where("user_id",$user_id);
		// $query=$this->db->get("user_goals");
		
		//$sql = "select user_goals.*,goals.name as 'goal_name' from user_goals inner join goals on goals.id = user_goals.goal_id where user_goals.goal_status	= '$status' and user_goals.user_id = '$user_id' ";
		
		$sql = "select user_goals.id as goal_id, user_goals.user_id,user_goals.term_id,user_goals.cost,user_goals.monthly_target,user_goals.currently_saved,user_goals.target_date,user_goals.goal_status,goals.name as 'goal_name' from user_goals inner join goals on goals.id = user_goals.goal_id where user_goals.goal_status = '$status' and user_goals.user_id = '$user_id' ";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			return $query->result_array();
		}
		else{
			return "nogoal";
		}
	}
	function selectGoal($goalID)
	{
		$userGoals['id'] = $goalID;
		$userGoals['goal_status'] = '1';
		
		$this->db->where("id",$userGoals['id']);
		$this->db->where("goal_status",$userGoals['goal_status']);
		$this->db->where("user_id",$this->session->userdata('usr_id'));
		$query=$this->db->get("user_goals");
		if($query->num_rows()>0)
		{
			return $query->row_array();
		}
		else{
			return "nogoal";
		}
	}
	
	function getoverallprogress($userid)
	{
		$sql = "select (sum(temp)/(select count(id) as divder from user_goals where goal_status = 1 
		and user_id = '$userid' )) as overallavg from ( select (currently_saved/cost) as temp from user_goals where goal_status = '1'  and user_id = '$userid' GROUP BY goal_id ) master";

		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$row = $query->row_array();
			return round($row['overallavg'],2) * 100;
		}
		else{
			return "nogoal";
		}
	}
	function monthlytargetCalc($month)
	{
		$month['cost'] = $this->input->post('cost');
		$month['saved'] = $this->input->post('saved');
		$month['targetdate'] = $this->input->post('targetdate');
		
		$step1 = $month['cost'] - $month['saved'];
		$monthsdiff = $this->datediff($month['targetdate']);

		//echo $monthsdiff.'-';
		if($monthsdiff < 1)
		{
			$monthsdiff = 1;
		}
		$step2 = $step1/$monthsdiff;
		if($step2 > $month['cost'])
		{
			return $month['cost'];//$step2;
		}
		else
		{
			return  ($step1)/$monthsdiff;
		}
		
	}
	function datediff($enddate)
	{
		
		
		// $date2 = date("d-m-Y H:i:s",strtotime($enddate));
		
		// $date1 = date("d-m-Y H:i:s",strtotime(date('Y-m-d H:i:s')));
		
		//$diff = abs(strtotime($date2) - strtotime($date1));
		$diff = strtotime($enddate) - strtotime(date('Y-m-d H:i:s'));

		$years   = floor($diff / (365*60*60*24));
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
		$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);  
		$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60));
		if($years > 0)
		{	
			return ($years * 12 ) + $months;
		}else
		{
			return $months;
		}
		//printf("%d years, %d months, %d days, %d hours, %d minuts\n, %d seconds\n", $years, $months, $days, $hours, $minuts, $seconds);
	}
	
	function insert_revenue($users)
	{
		//$users['user_id'] = $this->session->userdata('usr_id');
		
		$this->db->where('user_id', $users['user_id']);
		$this->db->where('year', $users['year']);
		//$this->db->where('month', $users['month']);
		$query = $this->db->get('revenue');
		
		//$query = $this->db->query("select * from revenue where user_id = '$userid' and year= '".$users['year']."' and month= '".$users['month']."' ");
		$users['status'] = 1;
		//echo $query->num_rows();
		if($query->num_rows() > 0)
		{
			$this->db->where('user_id', $users['user_id']);
			$this->db->where('year', $users['year']);
			$this->db->where('month', $users['month']);
			$this->db->update('revenue', $users);
		}
		else{
			
			$this->insert_dummy_values_in_revnue($users);
			$this->insert_dummy_values_in_expenses($users);
			//$this->db->insert('revenue', $users);
			$this->db->where('user_id', $users['user_id']);
			$this->db->where('year', $users['year']);
			$this->db->where('month', $users['month']);
			$this->db->update('revenue', $users);
		}
		//$this->insert_expenses($users);
	}
	
	function insert_expenses($users)
	{
		//$users['user_id'] = $this->session->userdata('usr_id');
		
		$this->db->where('user_id', $users['user_id']);
		$this->db->where('year', $users['year']);
		$this->db->where('month', $users['month']);
		$query = $this->db->get('expenses');
		
		//$query = $this->db->query("select * from revenue where user_id = '$userid' and year= '".$users['year']."' and month= '".$users['month']."' ");
		$users['status'] = 1;
		echo $query->num_rows();
		if($query->num_rows() > 0)
		{
			$this->db->where('user_id', $users['user_id']);
			$this->db->where('year', $users['year']);
			$this->db->where('month', $users['month']);
			$this->db->update('expenses', $users);
		}
		else{
			$this->insert_dummy_values_in_expenses($users);
			$this->insert_dummy_values_in_revnue($users);
			
			$this->db->where('user_id', $users['user_id']);
			$this->db->where('year', $users['year']);
			$this->db->where('month', $users['month']);
			$this->db->update('expenses', $users);
			//$this->db->insert('expenses', $users);
		}
		//$this->insert_revenue($users);
	}
	
	function insert_dummy_values_in_revnue($users)
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
		$this->db->insert_batch('revenue', $data); 
	}
	function insert_dummy_values_in_expenses($users)
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
				'year' 					=> $users['year'],
				'month' 				=> '1',
				'user_id' 				=> $users['user_id']
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
				'year' 					=> $users['year'] ,
				'month'					=> '2' ,
				'user_id' 				=> $users['user_id']
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
		$this->db->insert_batch('expenses', $data); 
	}
	
	function onNetWorth($param)
	{
		$b=array();
		$array = explode('_',$param['monthyear']);
		
		$month = $array[0];
		$year = $array[1];
		
		$query = $this->db->query("SELECT checking_account+savings_account+mutual_funds+securities+other_investments+retirement_funds+building+cars+other_property as totalassets FROM `assets` where year = '$year' and month = '$month' and user_id = '".$param['user_id']."' ");
		
		
 		$totalassets = 0;
		if($query->num_rows() > 0)
		{	
			$row = $query->row_array();
			$totalassets = $row['totalassets'];
		}
		$b['totalassets'] = $this->currencyconverter($totalassets);
		$sql = "
		select 
			mortgage 			 
			+ student_debt 			
			+ car_loans 		
			+ credit_card 		
			+ other_liabilities
			
			as totalliabilities
			 FROM `liabilities` where year = '$year' and month = '$month' and user_id = '".$param['user_id']."' 
		";
		
		$query = $this->db->query($sql);
		
		$totalliabilities = 0;
		if($query->num_rows() > 0)
		{	
			$row = $query->row_array();
			$totalliabilities = $row['totalliabilities'];
		}
		$b['totalliabilities'] = $this->currencyconverter($totalliabilities);
		$networth = $totalassets - $totalliabilities;
		$b['networth'] = $this->currencyconverter($networth);
		
		$a = array();
		array_push($a,$b);
		return  json_encode($a);
	}
	
	function onPersonalMonthlyBudget($param)
	{
		$b=array();
		$array = explode('_',$param['monthyear']);
		
		$month = $array[0];
		$year = $array[1];
		
		$query = $this->db->query("SELECT wife_revenue+husband_revenue+bonuses+dividend+other as totalincome FROM `revenue` where year = '$year' and month = '$month' and user_id = '".$param['user_id']."' ");
		
		
 		$totalincome = 0;
		if($query->num_rows() > 0)
		{	
			$row = $query->row_array();
			$totalincome = $row['totalincome'];
		}
		$b['totalincome'] = $this->currencyconverter($totalincome);
		$sql = "
		select 
			retirement 			 
			+ mortgage 			
			+ home_repairs 		
			+ home_insurance 		
			+ garbage				
			+ electricity			
			+ water 				
			+ gas 				
			+ internet 			
			+ telephone			
			+ cable_tv 			
			+ public_transportation
			+ car_payment			
			+ license_plates		
			+ car_repairs 		
			+ insurance 			
			+ charitable 			
			+ child_care			
			+ clothing 			
			+ entertainment		
			+ groceries 			
			+ medical 			
			+ personal_barber		
			+ dry_cleaning
			+ tithing 			
			+ offerings		
			+ charities 			
			+ personal_loan 			
			+ credit_card		
			+ student_loan			
			
			as totalexpenses
			 FROM `expenses` where year = '$year' and month = '$month' and user_id = '".$param['user_id']."' 
		";
		
		$query = $this->db->query($sql);
		
		$totalexpenses = 0;
		if($query->num_rows() > 0)
		{	
			$row = $query->row_array();
			$totalexpenses = $row['totalexpenses'];
		}
		$b['totalexpenses'] = $this->currencyconverter($totalexpenses);
		$leftover = $totalincome - $totalexpenses;
		$b['leftover'] = $this->currencyconverter($leftover);
		
		$a = array();
		array_push($a,$b);
		return  json_encode($a);
	}
	
	
	function graph($param)
	{
		$user_id = $param['user_id'];
		$year = $param['year'];
		
		$sql = "select expenses.month as 'Month', (revenue.wife_revenue+revenue.husband_revenue+revenue.bonuses+revenue.dividend+revenue.other) as 'TotalIncome' 

			,(expenses.retirement 			 
				+ expenses.mortgage 			
				+ expenses.home_repairs 		
				+ expenses.home_insurance 		
				+ expenses.garbage				
				+ expenses.electricity			
				+ expenses.water 				
				+ expenses.gas 				
				+ expenses.internet 			
				+ expenses.telephone			
				+ expenses.cable_tv 			
				+ expenses.public_transportation
				+ expenses.car_payment			
				+ expenses.license_plates		
				+ expenses.car_repairs 		
				+ expenses.insurance 			
				+ expenses.charitable 			
				+ expenses.child_care			
				+ expenses.clothing 			
				+ expenses.entertainment		
				+ expenses.groceries 			
				+ expenses.medical 			
				+ expenses.personal_barber		
				+ expenses.dry_cleaning
				+ expenses.tithing 			
				+ expenses.offerings		
				+ expenses.charities 			
				+ expenses.personal_loan 			
				+ expenses.credit_card		
				+ expenses.student_loan				
				)
			as 'TotalExpenses'
			
from revenue left join expenses on revenue.month = expenses.month and expenses.year = revenue.year  where revenue.year = '$year' and revenue.user_id = '$user_id' and expenses.year = '$year' and expenses.user_id = '$user_id' group by month ";

		$query = $this->db->query($sql);
		//return json_encode($query->result_array());
		//$data = $query->result_array();
			//print_r($this->db->last_query());
		$table = array();
		$table['cols'] = array(
			/* define your DataTable columns here
			 * each column gets its own array
			 * syntax of the arrays is:
			 * label => column label
			 * type => data type of column (string, number, date, datetime, boolean)
			 */
			// I assumed your first column is a "string" type
			// and your second column is a "number" type
			// but you can change them if they are not
			array('label' => 'Month', 'type' => 'string'),
			array('label' => 'Total Income', 'type' => 'number'),
			array('label' => 'Total Expenses', 'type' => 'number')
		);
		
		$rows = array();
		$reuslt = $query->result_array();
		//print_r($reuslt); die();
		foreach($reuslt as $r) {
		
			$temp = array();
			// each column needs to have data inserted via the $temp array
			$month = date('F', mktime(0,0,0,$r['Month'], 1, date('Y')));
			$temp[] = array("v"=>substr($month,0,3));
			$temp[] = array("v"=>(int)$r['TotalIncome']);
			$temp[] = array("v"=>(int)$r['TotalExpenses']);
			   
			// $temp[] = array('v' => $r['Month']);
			// $temp[] = array('v' => $r['TotalIncome']);
			// $temp[] = array('v' => $r['TotalExpenses']); 

			// insert the temp array into $rows
			$rows[] = array('c' => $temp);
		}
		// populate the table with rows of data
		$table['rows'] = $rows;

		// encode the table as JSON
		$jsonTable = json_encode($table);
		// set up header; first two prevent IE from caching queries

		header('Cache-Control: no-cache, must-revalidate');
		header('Content-type: application/json');

		// return the JSON data
		return $jsonTable;
	}
	
	function networthgraph($param)
	{
		$user_id = $param['user_id'];
		$year = $param['year'];
		
		$sql = "select assets.month as 'Month', (checking_account+savings_account+mutual_funds+securities+other_investments+retirement_funds+building+cars+other_property) 
			-
			( mortgage 			 
			+ student_debt 			
			+ car_loans 		
			+ credit_card 		
			+ other_liabilities		
				)
			as 'networth'
from liabilities left join assets on liabilities.month = assets.month and assets.year = liabilities.year  where liabilities.year = '$year' and liabilities.user_id = '$user_id' and assets.year = '$year' and assets.user_id = '$user_id' group by month ";


		$query = $this->db->query($sql);
		//return json_encode($query->result_array());
		//$data = $query->result_array();
			//print_r($this->db->last_query());
		$table = array();
		$table['cols'] = array(
			/* define your DataTable columns here
			 * each column gets its own array
			 * syntax of the arrays is:
			 * label => column label
			 * type => data type of column (string, number, date, datetime, boolean)
			 */
			// I assumed your first column is a "string" type
			// and your second column is a "number" type
			// but you can change them if they are not
			array('label' => 'Month', 'type' => 'string'),
			array('label' => 'Net Worth', 'type' => 'number')
			
		);
		
		$rows = array();
		$reuslt = $query->result_array();
		//print_r($reuslt); die();
		foreach($reuslt as $r) {
		
			$temp = array();
			// each column needs to have data inserted via the $temp array
			$month = date('F', mktime(0,0,0,$r['Month'], 1, date('Y')));
			$temp[] = array("v"=>substr($month,0,3));
			$temp[] = array("v"=>(int)$r['networth']);
			
			// insert the temp array into $rows
			$rows[] = array('c' => $temp);
		}
		// populate the table with rows of data
		$table['rows'] = $rows;

		// encode the table as JSON
		$jsonTable = json_encode($table);
		// set up header; first two prevent IE from caching queries

		header('Cache-Control: no-cache, must-revalidate');
		header('Content-type: application/json');

		// return the JSON data
		return $jsonTable;
	}
	
	function currencyconverter($number)
	{
		setlocale(LC_MONETARY, 'en_IN');
		return number_format($number, 2);
	}
	
	function totalassestUpdates($users)
	{
		$this->db->where('user_id', $users['user_id']);
		$this->db->where('year', $users['year']);
		$this->db->where('month', $users['month']);
		$query = $this->db->get('assets');
		
		//$query = $this->db->query("select * from revenue where user_id = '$userid' and year= '".$users['year']."' and month= '".$users['month']."' ");
		$users['status'] = 1;
		if($query->num_rows() > 0)
		{
			$this->db->where('user_id', $users['user_id']);
			$this->db->where('year', $users['year']);
			$this->db->where('month', $users['month']);
			$this->db->update('assets', $users);
		}
		else{
			$this->assetesDummy($users);
			$this->insertDummyliabilities($users);
			
			$this->db->where('user_id', $users['user_id']);
			$this->db->where('year', $users['year']);
			$this->db->where('month', $users['month']);
			$this->db->update('assets', $users);
		}
		
	}
	
	function totalliabilitiesUpdates($users)
	{
		$this->db->where('user_id', $users['user_id']);
		$this->db->where('year', $users['year']);
		$this->db->where('month', $users['month']);
		$query = $this->db->get('liabilities');
		
		//$query = $this->db->query("select * from revenue where user_id = '$userid' and year= '".$users['year']."' and month= '".$users['month']."' ");
		$users['status'] = 1;
		if($query->num_rows() > 0)
		{
			$this->db->where('user_id', $users['user_id']);
			$this->db->where('year', $users['year']);
			$this->db->where('month', $users['month']);
			$this->db->update('liabilities', $users);
		}
		else{
			$this->assetesDummy($users);
			$this->insertDummyliabilities($users);
			
			$this->db->where('user_id', $users['user_id']);
			$this->db->where('year', $users['year']);
			$this->db->where('month', $users['month']);
			$this->db->update('liabilities', $users);
		}
		
	}
	
	function insertDummyliabilities($users)
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
		$this->db->insert_batch('liabilities', $data); 
	}
	
	function assetesDummy($users)
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
		$this->db->insert_batch('assets', $data); 
	}
	
	function getDebtPaymentDetails($debt_payment)
	{
		$this->db->where('usr_id', $debt_payment['usr_id']);
		$this->db->where('month', $debt_payment['month']);
		$this->db->where('year', $debt_payment['year']);
		$this->db->where('status', 1);
		
		$query=$this->db->get("debt_payment");
		
		if($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else{
			return "false";
		}
	}
	
	function getDebtPayment($debt_payment)
	{
	
		$row = $this->account_model->getDebtPaymentDetails($debt_payment);
		
		//$row = $this->getDebtPaymentDetails($debt_payment);
		
        if($row != 'false')
		{
			$debt_payment_id = 	$row['id'];//debt_payment ID
			
			$query = $this->db->query("select * from dept_pay_detail where debt_id = '$debt_payment_id' and status = '1' ");
			//echo $this->db->last_query();
			$result = $query->result_array();
			
			$query = $this->db->query("select sum(balance) as total_balance, sum(payment) as total_payment from dept_pay_detail where debt_id = '$debt_payment_id' and status = '1' ");
			$result2 = $query->row_array();
			$total_balance = $result2['total_balance'];
			$total_payment = $result2['total_payment'];
			
			
			//return $result;
			for($i = 0; $i <= 9; $i++)		
			{
			$creditor = '';
			$balance = 0;
			$rate = 0;
			$payment = 0;
			?>
			<tbody><?php

				if($i < (sizeof($result)))//if($i < (sizeof($result)/4))
				{
					$creditor = $result[$i]['creditor'];
					$balance = $result[$i]['balance'];
					$rate = $result[$i]['rate'];
					$payment = $result[$i]['payment'];
				}
			?>
				<tr>
				<th scope="row"><?php echo $i+1; ?></th>
				<td><input type="text" name="creditor" class="form-control" id="creditor<?php echo $i+1; ?>"  data-id="<?php echo $i+1; ?>"  value="<?php echo $creditor; ?>"></td>
				<td><input type="number" min="0" name="balance"  class="form-control balance" id="balance<?php echo $i+1; ?>"  data-id="<?php echo $i+1; ?>"  value= "<?php echo $balance; ?>"></td>
				<td><input type="text" name="rate"  pattern="^[0-9]*\.?[0-9]+$"   class="form-control rate" id="rate<?php echo $i+1; ?>"  data-id="<?php echo $i+1; ?>"     value= "<?php echo $rate; ?>"></td>
				<td><input type="number" min="0" name="payment"  class="form-control payment" id="payment<?php echo $i+1; ?>"  data-id="<?php echo $i+1; ?>"  value= "<?php echo $payment; ?>"></td>
				</tr>
				<?php
				if($i == 9)
				{
					?>
					</tbody>
					
					<tfoot>
						
					<tr>
					<th></th>
					  <td>Total</td>
					  <td><input type="text" disabled data-id = "1" name="totalbalance"  class="form-control" id="totalbalance"  value= "<?php echo $total_balance; ?>"></td>
					  <td></td>
					  <td><input type="text" disabled data-id = "1" name="totalpayment"  class="form-control" id="totalpayment"  value= "<?php echo $total_payment; ?>"></td>
					</tr>
									
						</tfoot>
					<?php
				}
			}
		}
		else{
			$creditor = '';
			$balance = 0;
			$rate = 0;
			$payment = 0;
			for($i = 0; $i <= 9; $i++)		
			{
			?>
				<tr>
				<th scope="row"><?php echo $i+1; ?></th>
				<td><input type="text" name="creditor" class="form-control" id="creditor<?php echo $i+1; ?>"  data-id="<?php echo $i+1; ?>"  value="<?php echo $creditor; ?>"></td>
				<td><input type="number" min="0" name="balance"  class="form-control balance" id="balance<?php echo $i+1; ?>"  data-id="<?php echo $i+1; ?>"  value= "<?php echo $balance; ?>"></td>
				<td><input type="text" name="rate"   pattern="^[0-9]*\.?[0-9]+$"  class="form-control rate" id="rate<?php echo $i+1; ?>"  data-id="<?php echo $i+1; ?>"     value= "<?php echo $rate; ?>"></td>
				<td><input type="number" min="0" name="payment"  class="form-control payment" id="payment<?php echo $i+1; ?>"  data-id="<?php echo $i+1; ?>"  value= "<?php echo $payment; ?>"></td>
				</tr>
				<?php
				if($i == 9)
				{
					?>
					<tr>
					<th></th>
					  <td>Total</td>
					  <td><input type="text" disabled data-id = "1" name="totalbalance"  class="form-control" id="totalbalance"  value= "0"></td>
					  <td></td>
					  <td><input type="text" disabled data-id = "1" name="totalpayment"  class="form-control" id="totalpayment"  value= "0"></td>
					</tr>
					<?php
				}
			}
		}
	}

	
	//SANDQ

	function InventorySave($inventory,$id)
	{
		if($id == "")
		{
			$this->db->where('item_name', $inventory['item_name']);
			$query=$this->db->get('inventory', $inventory);
			if($query->num_rows()>0)
			{
				$rowdata = $query->row_array();
				return $rowdata['id'];
			}
			else{
				$this->db->insert('inventory', $inventory);
				return $this->db->insert_id();			
			}
		}
		else
		{
			
			$this->db->where('id', $id);
			$this->db->update('inventory', $inventory);
			return $id;
		}
	}
	
	function usersameinventorycheck($inventoryID,$userid)//Goal check in user goals
	{
		$this->db->where('inventory_id', $inventoryID);
		$this->db->where('user_id', $userid);
		$this->db->where('inventory_status', '1');
		$query=$this->db->get('user_inventory');
		if($query->num_rows()>0)
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	function inventoryaddingbyuser($param)
	{
		$id = '';
		$inventory['item_name'] = $param['item_name'];
		$inventory['status'] = '1';
		$inventoryID = $this->InventorySave($inventory,$id);		
		
		if($param['user_id'])
		{
			$inventorystatus = $this->usersameinventorycheck($inventoryID,$param['user_id']);
		}else{
			$inventorystatus = $this->usersameinventorycheck($inventoryID,$this->session->userdata('usr_id'));
		}
		
		
		if($inventorystatus == true)
		{
			return "alreadyexists";
		}
		else{
		
			if($param['user_id'])
			{
				$user_inventory['user_id'] = $param['user_id'];	
			}else{
				$user_inventory['user_id'] = $this->session->userdata('usr_id');	
			}
			//$user_goals['user_id'] = $this->session->userdata('usr_id');
			$user_inventory['inventory_id'] = $inventoryID;
			$user_inventory['unit_price'] = $param['unit_price'];
			$user_inventory['quantity_stock'] = $param['quantity_stock'];
			$user_inventory['total_price'] = $param['total_price'];
			$user_inventory['inventory_value'] = $param['inventory_value'];
			$user_inventory['description'] = $param['description'];
			$user_inventory['inventory_status'] = '1';
			
			$this->db->insert('user_inventory', $user_inventory);
			return $this->db->insert_id();	
		}
		
	}
	
	function getinventoryDetails($id)
	{
		$this->db->where("id",$id);
		$query=$this->db->get("inventory");
		if($query->num_rows()>0)
		{
			return $query->row_array();
		}
	}
	
	function getallinventory($status)
	{
		$this->db->where("inventory_status",$status['inventory_status']);
		$this->db->where("user_id",$status['user_id']);
		$query=$this->db->get("user_inventory");
		if($query->num_rows()>0)
		{
			$array = $query->result_array();
			return $array;
		}
		else{
			return "noinventory";
		}
	}
	function getallinventoryPAGELOAD()
	{
		$inventory['inventory_status'] = 1;
		$inventory['user_id'] = $this->session->userdata('usr_id');
		$array = $this->getallinventory($inventory);
		if($array != 'noinventory')
		{
			foreach($array as $row)
			{
				$inventorydetails = $this->getinventoryDetails($row['inventory_id']);
				?>
				<tr id="row_<?php echo $row['id']; ?>">
					<td ><a  href="javascript:editsqmodal('<?php echo $row['id']; ?>');"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
					<a  href="javascript:void(0)" onclick="deleteInventory('<?php echo $row['id']; ?>')" ><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
					<?php echo "IN". str_pad($row['id'],3,0,STR_PAD_LEFT); ?></td>
					<td ><?php echo $inventorydetails['item_name']; ?></td>
					<td ><?php echo $this->currencyconverter($row['unit_price']); ?></td>
					<td><?php echo $this->currencyconverter($row['quantity_stock']); ?></td>
					<td ><?php echo $this->currencyconverter($row['total_price']); ?></td>
					<td><?php echo $this->currencyconverter($row['inventory_value']); ?></td>
					<td ><?php echo $row['description']; ?></td>
				</tr>
				<?php
			}
		}
	}
	function getTotalInvertoryValue($id = 0)
	{	
		if($id == 0)
		{
			$id = $this->session->userdata('usr_id');
		}
		$user_id = $id;
		
		$array = $this->db->query("select sum(inventory_value) as count from user_inventory where user_id = '$user_id' and  inventory_status = '1' ");
		$row = $array->row_array();
		return  $this->currencyconverter($row['count']);
	}
	
	
	function inventoryeditingbyuser($param)
	{
		$id = '';
		$inventory['item_name'] = $param['item_name'];
		$inventory['status'] = '1';
		$inventoryID = $this->InventorySave($inventory,$id);
		
		$sql = "select * from user_inventory where id <> '".$param['item_id']."' and inventory_id = '$inventoryID' and user_id = '".$param['user_id']."' and inventory_status = '1' ";
		
		$query=$this->db->query($sql);

		if($query->num_rows()>0)
		{
			$inventorystatus = true;
		}else{
			$inventorystatus = false;
		}

		if($inventorystatus == true)
		{
			//return "alreadyexists";
			
			//$user_inventory['inventory_id'] = $inventoryID;
			$user_inventory['unit_price'] = $param['unit_price'];
			$user_inventory['quantity_stock'] = $param['quantity_stock'];
			$user_inventory['total_price'] = $param['total_price'];
			$user_inventory['inventory_value'] = $param['inventory_value'];
			$user_inventory['description'] = $param['description'];
			$user_inventory['inventory_status'] = '1';
			
			$this->db->where('id', $param['item_id']);
			$this->db->update('user_inventory', $user_inventory);
				
			return $param['item_id'];
			
		}
		else
		{
			if($param['user_id'])
			{
				$user_inventory['user_id'] = $param['user_id'];	
			}else{
				$user_inventory['user_id'] = $this->session->userdata('usr_id');	
			}
			
		
			//$user_goals['user_id'] = $this->session->userdata('usr_id');
			$user_inventory['inventory_id'] = $inventoryID;
			$user_inventory['unit_price'] = $param['unit_price'];
			$user_inventory['quantity_stock'] = $param['quantity_stock'];
			$user_inventory['total_price'] = $param['total_price'];
			$user_inventory['inventory_value'] = $param['inventory_value'];
			$user_inventory['description'] = $param['description'];
			$user_inventory['inventory_status'] = '1';
			
			$this->db->where('id', $param['item_id']);
			$this->db->update('user_inventory', $user_inventory);
				
			return $param['item_id'];	
		}
		
		
	}

	function inventorymanagement($inventory)//Inventory deactive
	{
		$this->db->where('id', $inventory['id']);
		$this->db->update('user_inventory', $inventory);
		return $inventory['id'];
	}
	
	
	function billaddingbyuser($param)
	{
		$id = '';
		$user_bill['user_id'] = $param['user_id'];
		$user_bill['bill_name'] = $param['bill_name'];
		$user_bill['due_date'] = $param['datepicker1'];
		$user_bill['amount_due'] = $param['amount_due'];
		$user_bill['debt_status'] = $param['debt_status'];
		$user_bill['status'] = '1';
		
		$this->db->insert('bill_payment', $user_bill);
		
		if($this->db->affected_rows() > 0)
		{
			return $this->db->insert_id();	
		}
		else{
			return "0";
		}
	}
	
	function billpaymenteditingbyuser($param)
	{
		$this->db->where('id', $param['id']);
		$this->db->update('bill_payment', $param);
		return $param['id'];
	}
	
	
	function getallbill($status)
	{
		$this->db->where("status",$status['status']);
		$this->db->where("user_id",$status['user_id']);
		$query=$this->db->get("bill_payment");
		if($query->num_rows()>0)
		{
			$array = $query->result_array();
			return $array;
		}
		else{
			return "nobill";
		}
	}
	
	
	function billmanagement($bill)//Inventory deactive
	{
		$this->db->where('id', $bill['id']);
		$this->db->update('bill_payment', $bill);
		return $bill['id'];
	}
	
	function bill_payment_ondate_change($param)
	{
		$sql = "SELECT sum(amount_due) as total_due,count(id) as total_bills FROM `bill_payment` WHERE `due_date` >= '".$param['prev']."' AND `due_date` <= '".$param['next']."' AND `user_id` = '".$param['user_id']."' and debt_status = '0' ";
		$query = $this->db->query($sql);
		
		$result1 = $query->row_array();
		$result1['total_bills'] = $result1['total_bills'];
		$result1['total_due'] = $this->currencyconverter($result1['total_due']);
		$sql = "SELECT * FROM `bill_payment` WHERE `due_date` >= '".$param['prev']."' AND `due_date` <= '".$param['next']."' AND `user_id` = '".$param['user_id']."' and debt_status = '0' ";
		$query = $this->db->query($sql);
		$result2 =  $query->result_array();
		
		$return['billoverview'] = $result1;
		$return['pendingdetails'] = $result2;
		return $return;
	}
	
	
	function pageload($id = 0)
	{
		$s =  date('Y-m-d H:i:s');
		$dates;
		$weekday = date('l', strtotime($s)); 
		if($weekday == 'Sunday')
		{
			$time = strtotime($s);
			$start = $time;//strtotime('last sunday, 12pm', $time);
			$end = strtotime('next saturday, 11:59am', $time);
			//$format = 'l, F j, Y g:i A';
			$format = 'm/d/Y';
			$start_day = date($format, $start);
			$end_day = date($format, $end);
			
			$dates['prev'] = $start_day;
			$dates['selected'] = $s;
			$dates['next'] = $end_day;
		}
		if($weekday == 'Saturday')
		{
			$time = strtotime($s);
			$start = $time;//strtotime('last sunday, 00:01am', $time);
			$end = strtotime('next friday, 11:59pm', $time);
			//$format = 'l, F j, Y g:i A';
			$format = 'm/d/Y';
			$start_day = date($format, $start);
			$end_day = date($format, $end);
			
			$dates['prev'] = $start_day;
			$dates['selected'] = $s;
			$dates['next'] = $end_day;
		}
		else if($weekday != 'Sunday' && $weekday != 'Saturday') {
			$time = strtotime($s);
			$start = strtotime('last sunday, 12pm', $time);
			$end = strtotime('next saturday, 11:59am', $time);
			//$format = 'l, F j, Y g:i A';
			$format = 'm/d/Y';
			$start_day = date($format, $start);
			$end_day = date($format, $end);
			
			$dates['prev'] = $start_day;
			$dates['selected'] = $s;
			$dates['next'] = $end_day;
		}
		
		if($id == 0)
		{
			$id = $this->session->userdata('usr_id');
		}
		$dates['user_id'] = $id;
		
		$response = $this->bill_payment_ondate_change($dates);
		return $response;
	}
}