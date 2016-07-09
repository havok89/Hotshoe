<?php echo $header; ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-shield"></i>
              <h3>New User</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <div class="content">
			<?php echo form_open(BASE_URL.'/admin/users/new/add'); ?>

                <div class="control-group">		
                <?php echo form_error('username', '<div class="alert">', '</div>'); ?>									
					<label class="control-label" for="username">Username</label>
					<div class="controls">
                    <?php 	$data = array(
						  'name'        => 'username',
						  'id'          => 'username',
						  'class'       => 'span4',
						  'value'		=> set_value('username')
						);
			
						echo form_input($data); ?>

						<p class="help-block">Your username is for logging in and cannot be changed.</p>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">		
                <?php echo form_error('email', '<div class="alert">', '</div>'); ?>									
					<label class="control-label" for="email">Email Address</label>
					<div class="controls">
						 <?php 	$data = array(
						  'name'        => 'email',
						  'id'          => 'email',
						  'class'       => 'span4',
						  'value'		=> set_value('email')
						);
			
						echo form_input($data); ?>

					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
                
                <div class="control-group">		
                <?php echo form_error('password', '<div class="alert">', '</div>'); ?>									
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<?php 	$data = array(
						  'name'        => 'password',
						  'id'          => 'password',
						  'class'       => 'span4',
						  'value'		=> set_value('password')
						);
			
						echo form_password($data); ?>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">	
                <?php echo form_error('con_password', '<div class="alert">', '</div>'); ?>									
					<label class="control-label" for="con_password">Confirm Password</label>
					<div class="controls">
						<?php 	$data = array(
						  'name'        => 'con_password',
						  'id'          => 'con_password',
						  'class'       => 'span4',
						  'value'		=> set_value('con_password')
						);
			
						echo form_password($data); ?>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
                
                </div><!-- /content -->
                <div class="form-actions">
                <?php 	$data = array(
						  'name'        => 'submit',
						  'id'          => 'submit',
						  'class'       => 'btn btn-primary',
						  'value'		=> 'Save',
						);
					 echo form_submit($data); ?> 
					<a class="btn" href="<?php echo BASE_URL; ?>/admin/users">Cancel</a>
				</div> <!-- /form-actions -->
               <?php  echo form_close(); ?>
                
                <!-- /widget-content --> 
            </div>
            
          </div>
          <!-- /widget -->
 
         
     </div>
      <!-- /span12 -->

      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<?php echo $footer; ?>
