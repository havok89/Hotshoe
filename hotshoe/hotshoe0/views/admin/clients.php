<?php echo $header; ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span12">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-user"></i>
              <h3>All Clients</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                   
<table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Username </th>
                    <th> Firstname </th>
                    <th> Surname </th>
                    <th> Email Address </th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
					foreach ($clients as $u) {
						echo '<tr>';
						echo '<td>'.$u['userName'].'</td>';
						echo '<td>'.$u['firstName'].'</td>';
						echo '<td>'.$u['lastName'].'</td>';
						echo '<td>'.$u['email'].'</td>';
						echo '<td class="td-actions"><a href="/admin/clients/edit/'.$u['clientID'].'" class="btn btn-small btn-success"><i class="btn-icon-only icon-pencil"> </i></a><a data-toggle="modal" role="button" class="btn btn-danger btn-small" href="#dlt'.$u['clientID'].'"><i class="btn-icon-only icon-remove"> </i></a></td>';
						echo '</tr>';
					} ?>
                </tbody>
              </table>
              <?php echo $this->pagination->create_links(); ?>
                <!-- /widget-content --> 
            <?php foreach ($clients as $u) {
			echo '<div id="dlt'.$u['clientID'].'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
            echo '<h3 id="myModalLabel">Delete client "'.$u['userName'].'"?</h3>';
            echo '</div><div class="modal-body">';
            echo '<p>This cannot be undone</p>';
			echo '</div>';
            echo '<div class="modal-footer">';
            echo '<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>';
            echo '<a class="btn btn-danger" href="'.BASE_URL.'/admin/clients/delete/'.$u['clientID'].'">Delete</a>';
            echo '</div></div>';
			} ?>
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
