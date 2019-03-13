
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb square">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Social Portal</li>
        <li class="breadcrumb-item active">Advert</li>
      </ol>

      <!-- Action Buttons -->
      <div class="action-btn">
      <div class="btn-group btn-actions">
        <button type="submit" class="btn btn-success square" title="Add New Page" onClick="document.getElementById('view').value='advert';document.myform.submit();"><i class="fa fa-plus"></i> Advert</button>
      </div>
      </div>

      <!-- Example DataTables Card -->
      
      <span id="msg"> <?php $engine->msgBox($msg,$status); ?></span>

      <div class="card mb-3 square">
        <div class="card-header">
          <i class="fa fa-list"></i> Posts</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </tfoot>
              <tbody>
              <?php 
              $i=1;
              while($page = $listdata->FetchRow()){
              list($id,$advtitle,$advimage,$advurl,$advdescription,$advdate,$advstatus)=array_values($page);
              ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $engine->readMore($advtitle,20); ?></td>
                  <td width="600px"><?php echo $engine->readMore($advdescription,200); ?></td>
                  <td><?php echo date('d M Y',strtotime($advdate)); ?></td>
                  <td class="status"><?php echo ($advstatus=='1')?'<i class="fa fa-circle publish"></i>' :'<i class="fa fa-circle draft"></i>'; ?></td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-info square" type="submit" onclick="document.getElementById('keys').value='<?php echo $id;?>';document.getElementById('viewpage').value='edit';document.getElementById('view').value='advert';document.myform.submit;">Edit</button>
                    <button class="btn btn-danger square" type="button" onclick="confirmDelete('<?php echo $id;?>')" >Delete</button>
                  </div>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->

    <script>
      function confirmDelete(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to delete this page!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#17A2B8',
                cancelButtonColor: '#DC3545',
                confirmButtonText: 'Yes, Delete!'
              }).then(function () {
                document.getElementById('keys').value=id;
                document.getElementById('viewpage').value='delete';
                document.getElementById('view').value='';
                document.myform.submit();
              })
        }
    </script>