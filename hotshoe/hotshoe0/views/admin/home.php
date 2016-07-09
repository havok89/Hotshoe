<?php echo $header; ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-dashboard"></i>
              <h3>Welcome to Hotshoe</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                    <div class="text">
                    <p>This is your Hotshoe dashboard, Using the navigation above you can add or edit the clients, galleries or admin users on your website.</p>
                    </div>
                <!-- /widget-content --> 
            </div>
          </div>
          <!-- /widget -->

         
        </div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-file"></i>
              <h3>Recently Added Galleries</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <ul class="news-items">
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
				foreach ($recenltyAdded as $p) {
                echo "<li>";
                	echo '<div class="news-item-date"><span class="news-item-day">'.date("jS", strtotime($p["added"])).'</span> <span class="news-item-month">'.date("M", strtotime($p["added"])).'</span> </div>';
                  	echo '<div class="news-item-detail"> <a href="/admin/galleries/edit/'.$p['galID'].'" class="news-item-title" target="_blank">'.$p['galTitle'].'</a>';
                   	echo '<p class="news-item-preview">'.wordlimit($p['galDescription']).'</p>';
                  	echo '</div>';
				echo '</li>';
				} ?>
              </ul>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->


        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>

<?php echo $footer; ?>