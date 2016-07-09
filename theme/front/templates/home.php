<?php echo $header; ?>
<!-- JUMBOTRON 
=================================-->


<div class="jumbotron errorpadding">
    <div class="container">
    <div class="row">
    <div class="col-md-6">
    <h2>Select a gallery to view:</h2>
    </div>
    </div>
      <div class="row">
			      <?php 
				  function wordlimit($string, $length = 40, $ellipsis = "...")
					{
						$string = strip_tags($string, '<div>');
						$string = strip_tags($string, '<p>');
						$words = explode(' ', $string);
						if (count($words) > $length)
							return implode(' ', array_slice($words, 0, $length)) . $ellipsis;
						else
							return $string.$ellipsis;
					}
				  $i=0;
				  foreach ($galleries as $g){
					  echo "<div class='gallery_box col-md-3 col-sm-6 col-xs-12'>";
					  echo "<h3>".$g['galTitle']."</h3>";
					  if ($g['galDescription'] != ""){
					  echo "<p>".wordlimit($g['galDescription'])."</p>";
					  }
					  echo "<a class='btn btn-primary' href='/view/".$g['galID']."'>View</a>";
					  echo "</div>";
					  $i++;
				  } 
				  if($i==0){
					echo "<p>It looks like you don't have access to any galleries :/</p>"; 
				  }?>
        </div>
      </div>
    </div> 
</div>
<!-- /JUMBOTRON container-->
<!-- CONTENT
=================================-->
<div class="container">
    
  	<hr>
</div>
<!-- /CONTENT ============-->

<?php echo $footer; ?>