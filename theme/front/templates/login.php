<?php echo $header; ?>
<!-- Login 
=================================-->

<link href="<?php echo THEME_FOLDER; ?>/css/pages/signin.css" rel="stylesheet">

<div class="account-container">
	
	<div class="content clearfix">
			<img src="<?php echo THEME_FOLDER; ?>/images/large_logo.png" class="login_logo" />
			<?php echo form_open(BASE_URL.'/login/check'); ?>
		
			
			<div class="login-fields">
				<h2>Client Login</h2>
				<p>Please provide your details</p>
				<?php if (isset($error)){
					if ($error == "1"){
						echo "<div class='alert'>Username or Password is incorrect</div>";
					}
				} ?>
				<div class="field">
					<label for="username">Username</label>
                    <?php 	$data = array(
						  'name'        => 'username',
						  'id'          => 'username',
						  'class'       => 'login username-field',
						  'value'		=> set_value('username'),
						  'placeholder'	=> 'Username'
						);
			
						echo form_input($data); ?>

				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					 <?php 	$data = array(
						  'name'        => 'password',
						  'id'          => 'password',
						  'class'       => 'login password-field',
						  'value'		=> set_value('password'),
						  'placeholder'	=> 'Password'
						);
			
						echo form_password($data); ?>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
			
									
				<button class="button btn btn-primary btn-large">Sign In</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->






<!-- /Login container-->
<!-- CONTENT
=================================-->
<div class="container">
    
  	<hr>
</div>
<!-- /CONTENT ============-->
<?php echo $footer; ?>
