
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb square">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Messages </li>
      </ol>

      
       <!-- Action Buttons -->
      <div class="action-btn">
      <div class="btn-group btn-actions">
        <button type="submit" class="btn btn-success square" title="Add New Page" onclick="document.getElementById('view').value='pages';document.myform.submit;"><i class="fa fa-plus"></i> Send Message</button>
      </div>
      </div>


      <!-- Example DataTables Card-->
      <span id="msg"> <?php $engine->msgBox($msg,$status); ?></span>

      <div class="card mb-3 square">
        <div class="card-header">
          <i class="fa fa-list"></i> Messages
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Location</th>
                  <th>Data Added</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Location</th>
                  <th>Data Added</th>
                  <th>Options</th>
                </tr>
              </tfoot>
              <tbody>
              <?php 
              $i=1;
              while($page = $listpages->FetchRow()){
              list($id,$name,$email,$phone,$location,$description,$dateadded,$status)=array_values($page);
              ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $phone; ?></td>
                  <td><?php echo $location; ?></td>
                  <td><?php echo date('d M Y',strtotime($dateadded)); ?></td>
                  <td>
                  <div class="btn-group">
                    <button class="btn <?php echo (($status=='1'))?'btn-info':'btn-default';?> square" type="button" data-toggle="modal" data-target="#myModal_<?php echo $id;?>">View Details</button>
                    <button class="btn btn-danger square" type="button" onclick="confirmDelete('<?php echo $id;?>')">Delete</button>
                  </div>
                  </td>
                </tr>

                <!-- The Modal -->
                <div class="modal fade" id="myModal_<?php echo $id;?>">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
                      <div class="modal-body">
                       <div class="modal-row">
                        <div id="title">Name:</div>
                        <div id="details"><?php echo $name;?></div>
                       </div>
                       <div class="modal-row">
                        <div id="title">Email:</div>
                        <div id="details"><?php echo $email;?></div>
                       </div>
                       <div class="modal-row">
                        <div id="title">Phone:</div>
                        <div id="details"><?php echo $phone;?></div>
                       </div>
                       <div class="modal-row">
                        <div id="title">Description:</div>
                        <div id="details"><?php echo $description;?></div>
                       </div>
                       <div class="modal-row">
                        <div id="title">Date:</div>
                        <div id="details"><?php echo date('d M Y',strtotime($dateadded)); ?></div>
                       </div>
                      </div>
                      
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger square" data-dismiss="modal" onclick="document.getElementById('keys').value='<?php echo $id;?>';document.getElementById('viewpage').value='markasread';document.getElementById('view').value='';document.myform.submit();">Close</button>
                      </div>
                      
                    </div>
                  </div>
                </div>

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