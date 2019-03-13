<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Menus</li>
  </ol>

  <span id="msg"> <?php $engine->msgBox($msg,$status); ?></span>
  <!-- Example DataTables Card-->
  <div class="card mb-3 square">

    <div class="card-header">
      <i class="fa fa-th"></i> Menu List</div>
    <div class="card-body">
      
 <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Menu Name</th> 
                  <th>Options</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Menu Name</th> 
                  <th>Options</th>
                </tr>
              </tfoot>
              <tbody>
              <?php 
              $i=1;
              foreach($menuopt as $page){
              list($id,$name)=array_values($page);
              ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $name; ?></td> 
                  <td width="100px">
                  <div class="btn-group">
                    <button class="btn btn-info square" type="submit" onclick="document.getElementById('keys').value='<?php echo $id;?>';
                    document.getElementById('viewpage').value='viewpages';document.getElementById('view').value='addpages';document.myform.submit();">Add Pages</button>
                    <button class="btn btn-danger square" type="button" onclick="confirmDelete('<?php echo $id;?>')">Delete Menu</button>
                  </div>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>

      
      <div class="col-sm-8">
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</div>
<!-- /.container-fluid-->

