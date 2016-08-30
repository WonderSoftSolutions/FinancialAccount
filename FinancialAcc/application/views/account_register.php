<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes">

  <title>Signin Page</title>
  <base href="<?php echo base_url(). 'themes/custom/' ?>" />

  <!-- favicon.ico and apple-touch-icon.png -->
  <link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-touch-icon-152x152.png">
  <link rel="icon" type="image/png" href="images/favicons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="images/favicons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="images/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="images/favicons/manifest.json">
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="msapplication-TileImage" content="images/favicons/mstile-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="styles/bootstrap.css">

  <link rel="stylesheet" href="styles/dependencies.css">

  <link rel="stylesheet" href="styles/wrapkit.css">

  <link rel="stylesheet" href="styles/pages.css">
	<script src="scripts/script.js"></script>
  <!-- END VENDORS -->
  <style>
  .error{
		position: absolute;
		top: 0;
		right: 0;
		z-index: 2;
		display: block;
		width: auto !important;
		height: 34px;
		line-height: 34px;
		text-align: center;
		pointer-events: none;
		color: red;
		font-size: 10px;
	}
  </style>
</head>
<body class="bg-grd-blue">
  <!--[if lt IE 9]>
  <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <main class="signin-wrapper">
    <div class="tab-content">
      <!--<p class="text-center p-4x bg-grd-blue">
        <img src="http://ekarigar.com/img/logo.png" alt="wrapkit" height="28px">
      </p>-->
      
      <div class="tab-pane fade in active" id="signup">
	  <?php $attributes = array("id" => "registrationform");
				echo form_open("Account/Create", $attributes);?>
				
        <!--<form id="signupForm" action="index.html" role="form">-->
          <p class="text-muted"><strong>Enter your personal data</strong></p>
          <div class="form-group has-feedback">
            <div class="input-group input-group-in">
              <span class="input-group-addon"><i class="icon-user"></i></span><!--icon-tag-->
              <input name="fname" id="fname" class="form-control" placeholder="First Name" autocomplete="off" value="<?php echo set_value('fname'); ?>" >
              <span class="form-control-feedback error"><?php echo form_error('fname'); ?></span>
            </div>
          </div><!-- /.form-group -->

		  <div class="form-group has-feedback">
            <div class="input-group input-group-in">
              <span class="input-group-addon"><i class="icon-user"></i></span><!--icon-tag-->
              <input name="lname" id="lname" class="form-control" placeholder="Last Name" autocomplete="off" value="<?php echo set_value('lname'); ?>" >
              <span class="form-control-feedback error"><?php echo form_error('lname'); ?></span>
            </div>
          </div><!-- /.form-group -->
          
		  <div class="form-group has-feedback">
            <div class="input-group input-group-in">
              <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
			  <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" value="<?php echo set_value('email'); ?>" >
              <span class="form-control-feedback error"><?php echo form_error('email'); ?></span>
            </div>
          </div><!-- /.form-group -->
		  
		   <div class="form-group has-feedback">
            <div class="input-group input-group-in">
              <span class="input-group-addon"><i class="icon-key"></i></span>
              <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password">
              <span class="form-control-feedback error"><?php echo form_error('pwd'); ?></span>
            </div>
          </div><!-- /.form-group -->
          <div class="form-group has-feedback">
            <div class="input-group input-group-in">
              <span class="input-group-addon"><i class="icon-check"></i></span>
              <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Enter Password Again">
              <span class="form-control-feedback error"><?php echo form_error('cpassword'); ?></span>
            </div>
          </div><!-- /.form-group -->
		  
          
		  
          <p class="text-muted"><strong>Enter your account data</strong></p>
          
         
          <div class="form-group animated-hue clearfix">
            <div class="pull-right">
              <button type="submit" class="btn btn-primary">Create account</button>
            </div>
            <div class="pull-left">
              <a href="<?php echo site_url('Account'); ?>" class="btn btn-default">Signin</a>
            </div>
          </div><!-- /.form-group -->
        <!--</form--><!-- /#signupForm -->
		<?php echo form_close(); ?>
		<?php echo $this->session->flashdata('msg'); ?>
        <hr>

        <p>By creating an account you agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></p>
      </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
  </main><!--/#wrapper-->
  <p class="signin-cr text-light">&copy; 2016 Advecion. with Love from Stilearning team.</p>


  <!-- VENDORS : jQuery & Bootstrap -->
  <script src="scripts/vendor.js"></script>
  <!-- END VENDORS -->

  <!-- DEPENDENCIES : Required plugins -->
  <script src="scripts/dependencies.js"></script>
  <!-- END DEPENDENCIES -->


  <!-- PLUGIN SETUPS: vendors & dependencies setups -->
  <script src="scripts/plugin-setups.js"></script>
  <!-- END PLUGIN SETUPS -->
</body>
</html>