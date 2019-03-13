
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb square">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Themes</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3 square">
        <div class="card-header">
          <i class="fa fa-th"></i> Theme List</div>
        <div class="card-body">
          <div class="row">
          <?php
            $dirname = "../public/template/";
            $files = glob($dirname."*.php");
            foreach($files as $file) {
            echo '<div class="col-xl-3 col-sm-6 mb-3"><div class="template"><img src="../media/img/template/default.png"><label>'.basename($file).'</label></div></div>';
            }
          ?>
          </div>
        </div>
        </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->