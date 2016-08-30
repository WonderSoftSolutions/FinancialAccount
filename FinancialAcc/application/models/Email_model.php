<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	
	function send_mail($email,$user){
	
	
		$this->email->from('noreply@advecion.com', 'Advecion');
		$this->email->to($user['email']);
		// $this->email->cc($user['email_cc']);
		// $this->email->bcc($user['email_bcc']);
		$this->email->subject($email['subject']);
		$this->email->message($email['mailbody']);
		$this->email->set_mailtype("html");
		//$this->email->attach('/path/to/file1.png'); // attach file
		//$this->email->attach('/path/to/file2.pdf');
		if ($this->email->send())
			return true;
		else
			return false;
			
			
		// $this->email->from('info@advecion.com', 'Advecion');
		// $this->email->to($user['email']);
		// // $this->email->cc($user['email_cc']);
		// // $this->email->bcc($user['email_bcc']);
		// $this->email->subject($email['subject']);
		// $this->email->message($email['mailbody']);
		// $this->email->set_mailtype("html");
		// //$this->email->attach('/path/to/file1.png'); // attach file
		// //$this->email->attach('/path/to/file2.pdf');
		// if ($this->email->send())
			// return true;
		// else
			// return false;
	}
	function encryption($user)
	{
		return base64_encode($user['email'])."_@_". $user['pwd'];
	}
	function AccountVerifyHTML($user)
	{
		$body = 'Dear '. $user['fname'].' '.$user['lname'] . ', <br/><br/>
		Welcome to our website, please verify your account..
		<a href='.base_url().'account/verify/'. $this->encryption($user).'>Verify</a>';
		
		return $body;
	}
	
	function ForgotPwdHTML($pwd)
	{
		$body = 'Dear User, <br/><br/>
		Below we mentioned your new password, please login with this password and change you password.<br/><br/>
		<span stlye="color:red;font-size:20px;">'.$pwd.'</span>';
		
		return $body;
	}
	
	function ChangePwdHTML($user)
	{
		$body = 'Dear '. $user['fname'].' '.$user['lname'] . ', <br/><br/>
		your password has been changed successfully.';
		return $body;
	}
	
}

