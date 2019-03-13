<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a href="#">Settings</a>
    </li>
    <li class="breadcrumb-item active">Manage Users</li>
  </ol>

  <!-- Action Buttons -->
  <div class="action-btn">
    <div class="btn-group btn-actions-save">

      <button type="button" data-toggle="modal" data-target="#addUser" class="btn btn-success square" surname="Save">
        <i class="fa fa-plus"></i> Add User
      </button>

    </div>
  </div>
  <span id="msg"> <?php $engine->msgBox($msg,$status); ?></span>

  <!-- Example DataTables Card-->
  <div class="card mb-3 square">
    <div class="card-header">
      <i class="fa fa-sliders"></i> Manage Users</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Last Longin</th>
              <th>Status</th>
              <th>Options</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Last Longin</th>
              <th>Status</th>
              <th>Options</th>
            </tr>
          </tfoot>
          <tbody>
            <?php 
              $i=1;
              while($page = $listusers->FetchRow()){
              list($id,$surname,$othername,$username,$password,$email,$accesslevel,$lastlogin,$status,$photo)=array_values($page);
              ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $othername.' '.$surname; ?></td>
              <td><?php echo $username; ?></td>
              <td><?php echo $email; ?></td>
              <td><?php echo (($lastlogin))?date('d M Y',strtotime($lastlogin)):'---'; ?></td>
              <td class="status"><?php echo ($status=='1')?'<i class="fa fa-circle publish"></i>' :'<i class="fa fa-circle draft"></i>'; ?></td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-info square" type="button" data-toggle="modal" data-target="#EditUser_<?php echo $id;?>">Edit</button>
                  <button class="btn btn-danger square" type="button" onclick="confirmDelete('<?php echo $id;?>')">Delete</button>
                </div>
              </td>
            </tr>

            <!--Edit user Modal -->
            <div class="modal fade" id="EditUser_<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                          </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Edit User
                            </h4>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="form-group">
                                    <label for="userlevel">User Level</label>
                                    <select name="userlevel<?php echo $id;?>" class="form-control" id="userlevel<?php echo $id;?>">
                                        <option value="" disabled selected>------</option>
                                        <option <?php echo(($accesslevel=='1'))?'selected':''?> value="1">Adminstrator</option>
                                        <option <?php echo(($accesslevel=='2'))?'selected':''?> value="2">Editor</option>
                                    </select>
                                </div>
                                <div class="row">
                                  <div class="form-group col-sm-6">
                                      <label for="usersurname">Surname</label>
                                      <input type="text" class="form-control" name="usersurname<?php echo $id;?>" id="usersurname<?php echo $id;?>" value="<?php echo $surname;?>" placeholder="surname" />
                                  </div>
                                  <div class="form-group col-sm-6">
                                      <label for="userothername">Other Name</label>
                                      <input type="text" class="form-control" name="userothername<?php echo $id;?>" id="userothername<?php echo $id;?>" value="<?php echo $othername;?>" placeholder="other name" />
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="useremail">Email</label>
                                    <input type="text" class="form-control" name="useremail<?php echo $id;?>" id="useremail<?php echo $id;?>" value="<?php echo $email;?>" placeholder="email" />
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username<?php echo $id;?>" id="username<?php echo $id;?>" value="<?php echo $username;?>" placeholder="username" />
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" name="userpassword<?php echo $id;?>" id="userpassword<?php echo $id;?>" value="<?php echo $password;?>" placeholder="password" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default square" data-dismiss="modal"> Cancel </button>
                            <button type="submit" class="btn btn-success square" onClick="document.getElementById('keys').value='<?php echo $id;?>';document.getElementById('viewpage').value='saveuser';document.myform.submit;" >Save </button>
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

 <!--Add user Modal -->
 <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                  </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Add User
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="userlevel">User Level</label>
                            <select name="userlevels" class="form-control" id="userlevels">
                                <option value="" disabled selected>------</option>
                                <option value="1">Adminstrator</option>
                                <option value="2">Editor</option>
                            </select>
                        </div>
                        <div class="row">
                          <div class="form-group col-sm-6">
                              <label for="usersurname">Surname</label>
                              <input type="text" class="form-control" name="usersurnames" id="usersurnames" placeholder="surname" />
                          </div>
                          <div class="form-group col-sm-6">
                              <label for="userothername">Other Name</label>
                              <input type="text" class="form-control" name="userothernames" id="userothernames" placeholder="other name" />
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="useremail">Email</label>
                            <input type="text" class="form-control" name="useremails" id="useremails" placeholder="email" />
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="usernames" id="usernames" placeholder="usernames" />
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" name="userpasswords" id="userpasswords" placeholder="password" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default square" data-dismiss="modal"> Cancel </button>
                    <button type="submit" class="btn btn-success square" onClick="document.getElementById('viewpage').value='saveuser';document.myform.submit;" >Save </button>
                </div>
            </div>
        </div>
    </div>

<script>
  function confirmDelete(id) {
    swal({
      surname: 'Are you sure?',
      text: "You want to delete this page!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#17A2B8',
      cancelButtonColor: '#DC3545',
      confirmButtonText: 'Yes, Delete!'
    }).then(function () {
      document.getElementById('keys').value=id;
      document.getElementById('viewpage').value='deleteuser';
      document.getElementById('view').value='';
      document.myform.submit();
    })
  }
</script>