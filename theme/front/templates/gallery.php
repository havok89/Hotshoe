<?php echo $header; ?>
<!-- JUMBOTRON 
=================================-->
			<?php 
             foreach ($gallery as $g){
            $title = $g['galTitle'];
            $desc = $g['galDescription'];
            $loc = $g['galLocation'];
			$ref = $g['galREF'];
			$heroEnable = $g['galHeaderImageEnable'];
			$hero = $g['galHeaderImage'];
            }
            ?>
<div class="jumbotron  pagepadding">
<?php if ($heroEnable == 1) {?>
    <img class="hero-image" src="/images/<?php echo $hero; ?>" alt="<?php echo $title; ?>" />
    <?php } ?>
    <div class="container" id="masonry">
        <div class="row">
            <div class="col-md-6">
            <h4>Title:</h4><p><?php echo $title; ?></p>
            <h4>Location:</h4><p><?php echo $loc; ?></p>
            </div>
            <div class="col-md-6">
            <h4>Description:</h4>
			<p><?php echo $desc; ?></p>
            </div>
            
        </div>
     
      </div>
    </div> 

    
<!-- /JUMBOTRON container-->
<!-- CONTENT
=================================-->
<div id="masonry-content" class="container">
    <div class="row">
      <div class="col-md-12 text-center">
            <p>Click on a thumbnail to view a larger version</p>
            </div>
     </div>
      <div class="row" id="list">
			      <?php 
				 $t=1;
				  foreach ($images as $i){
					  echo "<a class='item' title='REF: ".$ref.$t."' data-gallery href='".$i['image']."'><img src='".$i['thumb']."'></a>";
					  $t++;
				  } ?>
                  <div class="purge"></div>
        </div>
  	<hr>
</div>
<!-- /CONTENT ============-->

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>