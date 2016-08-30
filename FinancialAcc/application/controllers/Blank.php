<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends CI_Controller {

	public function __construct()
	{
		// header('Access-Control-Allow-Origin: *');
		// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();		
	}
	
	public $data = array();
	
	public function index()
	{
	
	}
}
