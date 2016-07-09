<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo $title; ?> </title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="<?php echo THEME_FOLDER; ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo THEME_FOLDER; ?>/css/animate.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo THEME_FOLDER; ?>/css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo THEME_FOLDER; ?>/css/bootstrap-image-gallery.min.css">
        <link rel="stylesheet" href="<?php echo THEME_FOLDER; ?>/css/blueimp-gallery.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo THEME_FOLDER; ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo THEME_FOLDER; ?>/js/jquery.blueimp-gallery.min.js"></script>		
		<script src="<?php echo THEME_FOLDER; ?>/js/bootstrap-image-gallery.min.js"></script>	
        <script>	
		window.onload = function(){
			jQuery("#preloader").delay(500).fadeOut("slow");
			jQuery("#load").delay(500).fadeOut("slow");
			
		}
		</script>
	</head>
<body>

<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/images/<?php echo $settings['siteLogo']; ?>" alt="Hoosk"></a>
      </div>
    <div class="collapse navbar-collapse">
 <ul class="nav navbar-nav">
        <li <?php if($this->uri->segment(1) == ""){ echo 'class="active"'; } ?>><a href="<?php echo BASE_URL; ?>">Dashboard</a></li>
         <?php if($this->session->userdata('user') != ""){
			 ?>
			 <li><a href="<?php echo BASE_URL; ?>/logout">Logout</a></li>
             <?php } ?>
        </ul>
</div>
    </div><!-- /.container -->
</nav><!-- /.navbar -->

<div id="preloader">
	  <div class="spinner">
  <div class="double-bounce1"></div>
  <div class="double-bounce2"></div>
</div>
	</div>
