<?php echo $header; ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span3">
          <div class="widget widget-nopad">
            <div class="widget-header">
              <h3>Assign Clients</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <div class="content client-holder">
            <?php echo form_open(BASE_URL.'/admin/galleries/edited/'.$this->uri->segment(4)); 
            foreach ($clients as $c) {
				galClientCheck($this->uri->segment(4), $c['clientID'], $c['firstName'], $c['lastName']);
			} ?>
            </div>
            <!-- /widget-content --> 
            </div>
          </div>
          <!-- /widget -->
 
         
     </div>
      <!-- /span3 -->
 		<div class="span9">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-picture"></i>
              <h3>Delete Images</h3>
            </div>
           	 <div class="widget-content">
                <div class="content">
                <p>Clicking the cross will delete an image, if you delete one by mistake then re-upload the image.</p>
                <ul id="sortable" class="sortable grid">
                 <?php foreach ($images as $i) {
					echo "<li id='".$i['imageID']."' class='box' draggable='true'>"; ?>
                    <a class="btn btn-danger btn-small" onclick="deleteThis('<?php echo $i['imageID']; ?>');" role="button" data-toggle="modal">
                    <i class="btn-icon-only icon-remove"> </i>
                    </a>
                    <?php
					echo "<img src='".$i['thumb']."'>";
					echo "</li>";
					 
				 } ?>
                 </ul>
                <div class="purge"></div>
                </div>
           	 </div>
      		</div>
     	 </div>
      </div>
      <!-- /row --> 
      
      <div class="row">
      <div class="span12">
      <div class="widget widget-nopad">
            <div class="widget-header">
              <h3>Gallery Details</h3>
            </div>
           	 <div class="widget-content">
                <div class="content">
                 <?php foreach ($galleries as $u) { ?>
			 
				<div class="span6">
                <div class="control-group">		
                <?php echo form_error('galTitle', '<div class="alert">', '</div>'); ?>									
					<label class="control-label" for="galTitle">Title*</label>
					<div class="controls">
                    <?php 	$data = array(
						  'name'        => 'galTitle',
						  'id'          => 'galTitle',
						  'class'       => 'span5',
						  'value'		=> set_value('galTitle', $u['galTitle'])
						);
			
						echo form_input($data); ?>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->

				<div class="control-group">		
                <?php echo form_error('galREF', '<div class="alert">', '</div>'); ?>									
					<label class="control-label" for="galREF">Gallery Ref ID* (max length 5)</label>
					<div class="controls">
						 <?php 	$data = array(
						  'name'        => 'galREF',
						  'id'          => 'galREF',
						  'maxlength'	=>	'5',
						  'class'       => 'span5',
						  'value'		=> set_value('galREF', $u['galREF'])
						);
			
						echo form_input($data); ?>
						<p>The Gallery Ref ID is used to number all images in the gallery.</p>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
                
               <div class="control-group">		
                <?php echo form_error('galLocation', '<div class="alert">', '</div>'); ?>									
					<label class="control-label" for="galLocation">Location</label>
					<div class="controls">
                    <?php 	$data = array(
						  'name'        => 'galLocation',
						  'id'          => 'galLocation',
						  'class'       => 'span5',
						  'value'		=> set_value('galLocation', $u['galLocation'])
						);
			
						echo form_input($data); ?>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
                <div class="control-group">		
                <?php echo form_error('galHeaderImageEnable', '<div class="alert">', '</div>'); ?>									
					<label class="control-label" for="galHeaderImageEnable">Enable Hero Image?</label>
					<div class="controls">
						
                        <?php 	
						$att = 'id="galHeaderImageEnable" class="span5"';
						$data = array(
						  '1'        => 'Yes',
						  '0'         => 'No',
						);
			
						echo form_dropdown('galHeaderImageEnable', $data, $u['galHeaderImageEnable'], $att); ?>
					</div> <!-- /controls -->				
				</div> <!-- /control-group --> 
                
                <div class="control-group">		
            		<?php echo form_error('file_upload', '<div class="alert">', '</div>'); ?>									
					<label class="control-label" for="file_upload">Hero Image</label>
					<div class="controls">
						<div><img src="<?php if ($u['galHeaderImage'] != "") { echo BASE_URL.'/images/'.$u['galHeaderImage']; } ?>" id="logo_preloaded" <?php if ($u['galHeaderImage'] == "") { echo "style='display:none;'"; } ?>></div>
						<img src="<?php echo BASE_URL; ?>/theme/admin/images/ajax-loader.gif" style="margin:-7px 5px 0 5px;display:none;" id="loading_pic" />
						<?php
							$data = array(
								'name'		=> 'file_upload',
								'id'		=> 'file_upload',
								'class'		=> 'span5'
							);
							echo form_upload($data); 
						?>
						<input type="hidden" id="galHeaderImage" name="galHeaderImage" />
                        <p>The hero image will not be automatically watermarked, you should do this yourself, it should ideally be landscape and not too deep (1400px x 600px would be a good size).</p>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
                </div>
				<div class="span5">
                <div class="control-group">		
                <?php echo form_error('galLocation', '<div class="alert">', '</div>'); ?>									
					<label class="control-label" for="galDescription">Short Description</label>
					<div class="controls">
                    <?php 	$data = array(
						  'name'        => 'galDescription',
						  'id'          => 'galDescription',
						  'class'       => 'span5',
						);
			
						echo form_textarea($data, set_value('galDescription', $u['galDescription'])); ?>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
                </div><!-- /content -->
                </div>
                <div class="purge"></div>
                <div class="form-actions">
                <a class="btn btn-success" href="<?php echo BASE_URL; ?>/admin/galleries/images/<?php echo $this->uri->segment(4); ?>">Add Images</a>
                <?php 	$data = array(
						  'name'        => 'submit',
						  'id'          => 'submit',
						  'class'       => 'btn btn-primary',
						  'value'		=> 'Save',
						);
					 echo form_submit($data); ?> 
					
					<a class="btn" href="<?php echo BASE_URL; ?>/admin/galleries">Cancel</a>
				</div> <!-- /form-actions -->
               <?php  echo form_close(); 
			 }
			 ?>
                
                
                 
           	 </div>
      		</div>
      </div>
      </div>
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
      <script src="<?php echo ADMIN_THEME; ?>/js/masonry.min.js"></script> 
<script>
$( document ).ready(function() {
	var $container = $('#sortable');
    $container.masonry({
        itemSelector: '.box',
        isFitWidth: true
    });
	});
	
	function deleteThis(id){
		document.getElementById(id).style.opacity = "0.5";
		$.ajax({
			type: 'POST',
			url:  '<?php echo BASE_URL; ?>/admin/image/delete/'+id,
			success: function(data) {
			var element = document.getElementById(id);
			element.parentNode.removeChild(element);
			var $container = $('#sortable');
			$container.masonry({
				itemSelector: '.box',
				isFitWidth: true
    });
		} 
		
	});
	}
</script>
<script type="text/javascript">
$(function () {
	
	if(document.getElementById('file_upload'))
		{
			function prepareUpload(event)
			{
				files = event.target.files;
				uploadFiles(event);
			}
	
			function uploadFiles(event)
			{
				event.stopPropagation();
				event.preventDefault();
	
				$('#loading_pic').show();
	
				var data = new FormData();
				$.each(files, function(key, value){ data.append(key, value); });
				
				$.ajax({
					url: '<?php echo BASE_URL; ?>/admin/settings/submit/?files',
					type: 'POST',
					data: data,
					cache: false,
					dataType: 'json',
					processData: false,
					contentType: false,
					success: function(data, textStatus, jqXHR){
						if(data!='0')
						{
							$('#logo_preloaded').show();
							document.getElementById('logo_preloaded').src = '<?php echo BASE_URL; ?>/uploads/' + data;
							document.getElementById('galHeaderImage').value = data;
							$('#loading_pic').hide();
						}
						else
							alert('Error! The file is not an image.');
					}
				});
			}
	
			function submitForm(event, data)
			{
				$form = $(event.target);
				var formData = $form.serialize();
				$.each(data.files, function(key, value){ formData = formData + '&filenames[]=' + value; });
	
				$.ajax({
					url: '<?php echo BASE_URL; ?>/admin/settings/submit',
					type: 'POST',
					data: formData,
					cache: false,
					dataType: 'json',
					success: function(data, textStatus, jqXHR){
						if(typeof data.error === 'undefined')
							console.log('SUCCESS: ' + data.success);
						else
							console.log('ERRORS: ' + data.error);
					},
					error: function(jqXHR, textStatus, errorThrown){
						console.log('ERRORS: ' + textStatus);
					},
					complete: function()
					{
						$('#loading_pic').hide();
					}
				});
			}
			
			var files;
			$('#file_upload').on('change', prepareUpload);
		}
		
		
	});	
</script>

<?php echo $footer; ?>
