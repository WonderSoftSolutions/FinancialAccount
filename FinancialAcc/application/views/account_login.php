<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1,minimum-scale=1,maximum-scale=1,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes">

  <title>Signin Page</title>
 <base href="<?php echo base_url(); ?>" />

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

  <link rel="stylesheet" href="themes/custom/styles/bootstrap.css">

  <link rel="stylesheet" href="themes/custom/styles/dependencies.css">

  <link rel="stylesheet" href="themes/custom/styles/wrapkit.css">

  <link rel="stylesheet" href="themes/custom/styles/pages.css">
	<script src="themes/custom/scripts/script.js"></script>
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
      <div class="tab-pane fade in active" id="signin">
	    <?php  $attributes = array("id" => "registrationform");
				echo form_open("Account/index", $attributes);?>
				
        
          <p class="lead">Login to your account</p>
          <div class="form-group">
            <div class="input-group input-group-in">
              <span class="input-group-addon"><i class="icon-user"></i></span>
              <input name="emailReg" id="emailReg" class="form-control" placeholder="Email" value="<?php echo set_value('emailReg'); ?>">
			  <span class="form-control-feedback error"><?php echo form_error('emailReg'); ?></span>
            </div>
          </div><!-- /.form-group -->
          <div class="form-group">
            <div class="input-group input-group-in">
              <span class="input-group-addon"><i class="icon-lock"></i></span>
              <input type="password" name="passwd" id="passwd" class="form-control" placeholder="Password">
			  <span class="form-control-feedback error"><?php echo form_error('passwd'); ?></span>
            </div>
          </div><!-- /.form-group -->
          <div class="form-group clearfix">
            <div class="animated-hue pull-right">
              <button id="btnSignin" type="submit" class="btn btn-primary">Signin</button>
            </div>
            <div class="nice-checkbox nice-checkbox-inline">
              <input type="checkbox" name="keepSignin" id="keepSignin" checked="checked">
              <label for="keepSignin">Keep me sign in</label>
            </div>
          </div><!-- /.form-group -->

          <hr>

          <p><a href="#recoverAccount" data-toggle="modal">Can't Access your Account?</a></p>
          <!--<p class="lead">Signin with another account?</p>
          <div class="signin-alt">
            <a href="#" class="btn btn-sm btn-success"><i class="fa fa-facebook"></i></a>
            <a href="#" class="btn btn-sm btn-info"><i class="fa fa-twitter"></i></a>
            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="btn btn-sm btn-default"><i class="fa fa-github"></i></a>
          </div

          <hr>>-->

          <p>Don't have a account? <a href="<?php echo site_url('Account/Create'); ?>" >Creata one</a></p>
       <?php echo form_close(); ?>
		<?php echo $this->session->flashdata('msg'); ?>
      </div><!-- /.tab-pane -->

     
    </div><!-- /.tab-content -->
  </main><!--/#wrapper-->
 <p class="signin-cr text-light">&copy; 2016 Micoufinance.</p>


 <?php 
	// $cost = 45000;
	// $saved = 25000;

	// $currentdate = new DateTime(date("Y-m-d"));
	// $currentdate->modify('last day of');
	// $currentdate = $currentdate ->format('d');
	
	// $targetdate = new DateTime('2017-01-01');
	// $targetdate->modify('last day of');
	// $targetdate =$targetdate ->format('d');

	// $diff = $cost - $saved;
	// $days = $targetdate - $currentdate;
	// //=IF((D9-F9) / ((EOMONTH(G9,0)-EOMONTH(TODAY(),0))/31)   > D9    ,D9,(D9-F9)/((EOMONTH(G9,0)-EOMONTH(TODAY(),0))/31))
	
	// if(($diff/ ($days / 31)) > $cost)
	// {
		// echo $cost;
	// }
	// else{
		// echo ($diff/ ($days / 31));
	// }
	
 ?>
 
  <!-- Modal Recover -->
  <div class="modal fade" id="recoverAccount" tabindex="-1" role="dialog" aria-labelledby="recoverAccountLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="recoverForm">
          <div class="modal-header">
            <h4 class="modal-title" id="recoverAccountLabel">Reset Password</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="input-group input-group-in">
                <span class="input-group-addon"><i class="fa fa-envelope-o text-muted"></i></span>
                <input type="email" name="recoverEmail" id="recoverEmail" class="form-control" placeholder="Enter your email address">
              </div>
            </div><!-- /.form-group -->
			<span id="resultRecover"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" onclick="recoverAccount()" class="btn btn-primary">Send reset link</button>
			
          </div>
        </form><!-- /#recoverForm -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /#recoverAccount -->


  <!-- VENDORS : jQuery & Bootstrap -->
  <script src="themes/custom/scripts/vendor.js"></script>
  <!-- END VENDORS -->

  <!-- DEPENDENCIES : Required plugins -->
  <script src="themes/custom/scripts/dependencies.js"></script>
  <!-- END DEPENDENCIES -->
	<script src="themes/aircraft/lib/customscript.js" type="text/javascript"></script>

  <!-- PLUGIN SETUPS: vendors & dependencies setups -->
  <script src="themes/custom/scripts/plugin-setups.js"></script>
  <!-- END PLUGIN SETUPS -->
</body>
</html>