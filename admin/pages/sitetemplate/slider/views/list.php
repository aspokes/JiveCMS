<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Slider</li>
  </ol>

   <!-- Action Buttons -->
   <div class="action-btn">
    <div class="btn-group btn-actions">
      <button type="submit" class="btn btn-success square" title="Add New Page" onclick="document.getElementById('viewpage').value='viewpages';document.getElementById('view').value='slides';document.myform.submit();"><i class="fa fa-plus"></i> Add Slide</button>
    </div>
  </div>

  <span id="msg"><?php $engine->msgBox($msg,$status); ?></span>
  <!-- Example DataTables Card-->
  <div class="card mb-3 square">

    <div class="card-header">
      <i class="fa fa-th"></i> Slides</div>
    <div class="card-body">

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Slide</th>
              <th>Order</th>
              <th>Title</th>
              <th>Options</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Slide</th>
              <th>Order</th>
              <th>Title</th>
              <th>Options</th>
            </tr>
          </tfoot>
          <tbody>
            <?php 
              $i=1;
              foreach($sliders as $slide){
              list($id,$title,$subtitle,$subtitletwo,$image,$imageorder,$dataadded)=array_values($slide);
              ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><img src="../media/uploaded/slides/<?php echo $image; ?>" alt="slide" width="90px"> </td>
              <td><?php  echo $imageorder;?></td>
              <td><?php  echo $title;?></td>
              <td width="100px">
                <div class="btn-group">
                  <button class="btn btn-info square" type="submit" onclick="document.getElementById('keys').value='<?php echo $id;?>';
                    document.getElementById('viewpage').value='edit';document.getElementById('view').value='slides';document.myform.submit();">Edit</button>
                  <button class="btn btn-danger square" type="button" onclick="confirmDelete('<?php echo $id;?>')">Delete</button>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
    </div>


    <div class="col-sm-8"></div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</div>
<!-- /.container-fluid-->

<script>
      function confirmDelete(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Logout!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007BFF',
                cancelButtonColor: '#DC3545',
                confirmButtonText: 'Yes, Logout!'
              }).then((res)=>{
                if (res) {
                  document.getElementById('viewpage').value='delete';
                  document.getElementById('keys').value=id;
                  document.myform.submit();
                }
              })
        }
    </script>