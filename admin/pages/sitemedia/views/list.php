
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb square">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Media</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3 square">
        <div class="card-header">
          <i class="fa fa-photo"></i> Media Files</div>
        <div class="card-body">
          <div class="row">
          <?php
            $files = glob("../media/img/*.*");
            for ($i=0; $i<count($files); $i++)
             {
               $image = $files[$i];
               $supported_file = array(
                       'gif',
                       'jpg',
                       'jpeg',
                       'png'
                );
       
                $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                if (in_array($ext, $supported_file)) {
                   echo "<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
                    echo '<div class="col-sm-3 mediaimages"><img src="'.$image .'" alt="Random image" /><label>'.basename($image).'</label>'."</div>";
                   } else {
                       continue;
                   }
                 }
          ?>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->