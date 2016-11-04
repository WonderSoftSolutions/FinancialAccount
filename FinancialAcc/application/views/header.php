<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	    <meta charset="utf-8">
    <title>Welcome</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<base href="<?php echo base_url(); ?>" />


	<link rel="stylesheet" type="text/css" href="themes/aircraft/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="themes/aircraft/lib/font-awesome/css/font-awesome.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="themes/aircraft/stylesheets/theme.css">
	<link rel="stylesheet" type="text/css" href="themes/aircraft/stylesheets/premium.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="themes/aircraft/custom/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="themes/aircraft/custom/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" href="themes/aircraft/custom/css/jquery-ui.css">

	<!--<script src="themes/aircraft/lib/jquery-1.11.1.min.js" type="text/javascript"></script>-->
    <script type="text/javascript" language="javascript" src="themes/aircraft/custom/js/jquery-1.12.3.js"></script>
	<script src="themes/aircraft/lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
	<script type="text/javascript" language="javascript" src="themes/aircraft/custom/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="themes/aircraft/custom/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="themes/aircraft/custom/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" language="javascript" src="themes/aircraft/custom/js/responsive.bootstrap.min.js"></script>
	<script src="themes/aircraft/custom/js/jquery-ui.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="themes/aircraft/lib/customscript.js" type="text/javascript"></script>
	<script type="text/javascript" src="themes/aircraft/sweetalert/sweet-alert.js"></script>
    <link rel="stylesheet" type="text/css" href="themes/aircraft/sweetalert/sweet-alert.css">

	
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">

	<script type="text/javascript" class="init">
	
	



		$(document).ready(function() {
			$(".knob").knob();
			// $("#datepicker").datepicker();
			// $("#datepicker").datepicker('setDate', new Date());
			$('#example').DataTable();
		});
	</script>


<!--Wait Me-->	
<script src="themes/aircraft/waitme/waitMe.js" defer ></script>
<link type="text/css" rel="stylesheet" href="themes/aircraft/waitme/waitMe.css">
<script>
	var current_effect = 'bounce';//$('#waitMe_ex_effect').val();

	function showloader()
	{
		run_waitMe('bounce');
	}
	function hideloader()
	{
		//$('form').waitMe('hide');$('
		$('body').waitMe('hide');
	}
	
	function run_waitMe(effect){
		$('body').waitMe({
			effect: effect,
			text: 'Please wait...',
			bg: 'rgba(255,255,255,0.7)',
			color: '#000',
			maxSize: '',
			source: baseHref+'waitme/img.svg',
			onClose: function() {}
		});
		// $('form').waitMe({
			// effect: effect,
			// text: 'Please wait...',
			// bg: 'rgba(255,255,255,0.7)',
			// color: '#000',
			// maxSize: '',
			// source: baseHref+'waitme/img.svg',
			// onClose: function() {}
		// });
	}
	
	var current_body_effect = 'progress';//$('#waitMe_ex_body_effect').val();
	
	
	
	function showloaderwithbody()
	{
		run_waitMe_body(current_body_effect);
	}
	function hideloaderwithbody()
	{
		run_waitMe_body(current_body_effect);
	}
	
	
	function run_waitMe_body(effect){
		$('body').addClass('waitMe_body');
		var img = '';
		var text = '';
		if(effect == 'img'){
			img = 'background:url(\'waitme/img.svg\')';
		} else if(effect == 'text'){
			text = 'Loading...'; 
		}
		var elem = $('<div class="waitMe_container ' + effect + '"><div style="' + img + '">' + text + '</div></div>');
		$('body').prepend(elem);
		
		setTimeout(function(){
			$('body.waitMe_body').addClass('hideMe');
			setTimeout(function(){
				$('body.waitMe_body').find('.waitMe_container:not([data-waitme_id])').remove();
				$('body.waitMe_body').removeClass('waitMe_body hideMe');
			},200);
		},4000);
	}
</script>
<!--Wait Me-->
</head>
<body class="theme-blue" style="background-color:#555555;">

<?php 
$user_login_status = $this->session->userdata('user_login_status');
if($user_login_status == false)
{
	redirect('account');
}
?>
    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="javascript:void(0)"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> MicouFinance</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php echo $this->session->userdata('user_fname'); ?>
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a href="./">My Account</a></li>
				<li><a href="#" data-toggle="modal" data-target="#changepassword" >Change Password</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Admin Panel</li>
                <li><a href="./">Users</a></li>
                <li><a href="./">Security</a></li>
                <li><a tabindex="-1" href="./">Payments</a></li>
                <li class="divider"></li>
                <li><a tabindex="-1" href="<?php echo 'account/logout/'.$this->session->userdata('usr_id'); ?>">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>
    

<div class="sidebar-nav">
<ul>

<li><a href="<?php echo site_url('account/dashboard');  ?>" class="nav-header" ><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo site_url('Pages/AddNewGoal'); ?>" class="nav-header" ><i class="fa fa-fw fa-bullseye"></i> Goal</a></li>
<li><a href="<?php echo site_url('Pages/whereyoustand'); ?>" class="nav-header" ><i class="fa fa-fw fa-bar-chart"></i> Where You Stand</a></li>
<li><a href="<?php echo site_url('Pages/whereareyougoing'); ?>" class="nav-header" ><i class="fa fa-fw fa-line-chart "></i> Where Are You Going</a></li>
<li><a href="<?php echo site_url('Pages/billpayments'); ?>" class="nav-header" ><i class="fa fa-fw fa-credit-card"></i> Bill Payments</a></li>
<li><a href="<?php echo site_url('Pages/debtpayments'); ?>" class="nav-header" ><i class="fa fa-fw fa-credit-card"></i> Debt Payment</a></li>
<li><a href="<?php echo site_url('Pages/sandq'); ?>" class="nav-header" ><i class="fa fa-fw fa-credit-card"></i> S&Q Money</a></li>
    

<!--<li><a href="javascript:void(0)" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Help<span class="label label-warning">+3</span></a></li>
<li><a href="javascript:void(0)" class="nav-header"><i class="fa fa-fw fa-comment"></i> Faq<span class="label label-success">+3</span></a></li>
<li><a href="javascript:void(0)" class="nav-header" target="blank"><i class="fa fa-fw fa-heart"></i> Get Premium<span class="label label-danger">+3</span></a></li>-->
				
   <!-- <li><a href="javascript:void(0)" class="nav-header" target="blank"><i class=""></i> &nbsp;</a></li>        -->
   
    </ul>
    </div>  <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }
            $('[data-popover="true"]').popover({html: true});
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>
	
