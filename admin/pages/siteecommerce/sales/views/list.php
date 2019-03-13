
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb square">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Sales</li>
      </ol>

      <!-- Action Buttons -->
      <div class="action-btn">
      <div class="btn-group btn-actions">
        <!-- <button type="button" class="btn btn-success square" title="Add New Page" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus"></i> Category</button> -->
      </div>
      </div>

      <!-- Example DataTables Card-->
      
      <span id="msg"> <?php $engine->msgBox($msg,$status); ?></span>

      <div class="card mb-3 square">
        <div class="card-header">
          <i class="fa fa-list"></i> Sales</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="20px">#</th>
                  <th width="50px">Icon</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th width="50px">Status</th>
                  <th width="150px">Options</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Icon</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </tfoot>
              <tbody>
              <?php 
              $i=1;
              while($page = $listposts->FetchRow()){
              list($id,$name,$image,$dateadded,$status)=array_values($page);
              ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><img src="../media/uploaded/productphotos/<?php echo $image ?>" width="40px" alt="icon"></td>
                  <td><?php echo $name ?></td>
                  <td><?php echo date('d M Y',strtotime($dateadded)); ?></td>
                  <td class="status"><?php echo ($status=='1')?'<i class="fa fa-circle publish"></i>' :'<i class="fa fa-circle draft"></i>'; ?></td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-info square" type="button" data-toggle="modal" data-target="#editCategory_<?php echo $id;?>" >Edit</button>
                    <button class="btn btn-danger square" type="button" onclick="confirmDelete('<?php echo $id;?>')" >Delete</button>
                  </div>
                  </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editCategory_<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId_<?php echo $id;?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-plus"></i> Category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="">Category Name</label>
                          <input type="text"
                            class="form-control" name="catname<?php echo $id;?>" id="catname<?php echo $id;?>" aria-describedby="helpId" value="<?php echo $name;?>">
                          <small id="helpId" class="form-text text-muted">eg. top 5</small>
                        </div>
                        <div class="form-group">
                          <label for="">Category Image</label>
                          <input type="file" class="form-control" name="catphoto<?php echo $id;?>" id="catphoto<?php echo $id;?>" aria-describedby="helpId" value="<?php echo $name;?>">
                          <input type="text" value="" name="oldcatimage<?php echo $id;?>" id="oldcatimage<?php echo $id;?>" hidden>
                          <small id="helpId" class="form-text text-muted">eg. top 5</small>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" onclick="document.getElementById('keys').value='<?php echo $id; ?>';document.getElementById('viewpage').value='update';document.myform.submit;" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.container-fluid-->

              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-plus"></i> Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Category Name</label>
              <input type="text"
                class="form-control" name="catname" id="catname" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">eg. top 5</small>
            </div>
            <div class="form-group">
                          <label for="">Category Image</label>
                          <input type="file" class="form-control" name="catphoto" id="catphoto" aria-describedby="helpId">
                          <small id="helpId" class="form-text text-muted">eg. top 5</small>
                        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" onclick="document.getElementById('viewpage').value='save';document.getElementById('view').value='';document.myform.submit;" class="btn btn-primary">Save</button>
          </div>
        </div>
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