
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb square">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Registered Member List </li>
      </ol>

      
       <!-- Action Buttons -->
      <div class="action-btn">
      <div class="btn-group btn-actions">
        <button type="submit" class="btn btn-success square" title="Add New Page" onclick="document.getElementById('view').value='add';document.myform.submit;"><i class="fa fa-plus"></i> Add Member</button>
      </div>
      </div>


      <!-- Example DataTables Card-->
      <span id="msg"> <?php $engine->msgBox($msg,$status); ?></span>

      <div class="card mb-3 square">
        <div class="card-header">
          <i class="fa fa-list"></i> Member List
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Options</th>
                </tr>
              </tfoot>
              <tbody>
              <?php 
              $i=1; //echo $listmem;
              while($mem = $listmem->FetchRow()){
			
              list($id,$fullname,$gender,$contact,$username,$date,$status)=array_values($mem);
              ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $fullname; ?></td>
                  <td><?php echo $gender; ?></td>
                  <td><?php echo $contact; ?></td>
                  <td><?php echo $username; ?></td>
                  <td><?php echo date('d M Y',strtotime($date)); ?></td>
                  <td class="status"><?php echo ($status=='1')?'<i class="fa fa-circle publish"></i>' :'<i class="fa fa-circle draft"></i>'; ?></td>
                  <td>
                  <div class="btn-group">
                    <button class="btn btn-info square" type="submit" onclick="document.getElementById('keys').value='<?php echo $id;?>';document.getElementById('viewpage').value='edit';document.getElementById('view').value='edit';document.myform.submit();">Edit</button>&nbsp;&nbsp;
                    <button class="btn btn-primary square" type="submit" onclick="document.getElementById('keys').value='<?php echo $id;?>';document.getElementById('viewpage').value='edit';document.getElementById('view').value='preview';document.myform.submit();">Preview</button>&nbsp;&nbsp;
                    <button class="btn btn-danger square" type="button" onclick="confirmDelete('<?php echo $id;?>')">Delete</button>
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
                text: "You want to delete this Member!",
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