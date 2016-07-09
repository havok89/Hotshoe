<?php echo $header; ?>
<link href="<?php echo ADMIN_THEME; ?>/js/upload/dropzone.css" rel="stylesheet">
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-picture"></i>
              <h3>Add Images</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <div class="content">
			<form action="/admin/galleries/image/upload/<?php echo $this->uri->segment(4); ?>"
              enctype="multipart/form-data"
              method="post"
              class="dropzone"
              id="my-awesome-dropzone">
              </form>
             
            </div>
            <div class="form-actions">
                 <a class="btn btn-primary" href="<?php echo BASE_URL."/admin/galleries/edit/".$this->uri->segment(4); ?>">Continue</a>
				</div> <!-- /form-actions -->
          </div>
          <!-- /widget -->
 
         
     </div>
     </div>
      <!-- /span12 -->
      <script src="<?php echo ADMIN_THEME; ?>/js/upload/dropzone.js"></script> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<?php echo $footer; ?>
