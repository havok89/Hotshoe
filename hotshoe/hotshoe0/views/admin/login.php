<?php echo $header; ?>
<link href="<?php echo ADMIN_THEME; ?>/css/pages/signin.css" rel="stylesheet">

<div class="account-container">
	
	<div class="content clearfix">
			<img src="<?php echo ADMIN_THEME; ?>/images/large_logo.png" class="login_logo" />
			<?php echo form_open(BASE_URL.'/admin/login/check'); ?>
		
			
			<div class="login-fields">
				<h2>Admin Login</h2>
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



<div class="login-extra">
	<a href="<?php echo BASE_URL; ?>/admin/user/forgot">Reset Password</a>
</div> <!-- /login-extra -->

<script src="<?php echo ADMIN_THEME; ?>/js/signin.js"></script>

