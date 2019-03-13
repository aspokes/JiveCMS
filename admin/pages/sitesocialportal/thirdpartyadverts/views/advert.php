<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Social Portal</li>
    <li class="breadcrumb-item active">Advert</li>
    <li class="breadcrumb-item active">Add New</li>
  </ol>

   <!-- Action Buttons -->
   <div class="action-btn">
   <div class="btn-group btn-actions">
  <?php if(empty($keys)){?>
    <button type="submit" onclick="document.getElementById('viewpage').value='saveposts';document.getElementById('view').value='';document.myform.submit;" class="btn btn-success square" title="Save">
      <i class="fa fa-save"></i> Save Advert
    </button>
  <?php }else{?>
    <button type="submit" onclick="document.getElementById('keys').value='<?php echo $keys; ?>';document.getElementById('viewpage').value='updatepost';document.myform.submit;" class="btn btn-success square" title="Save">
      <i class="fa fa-save"></i> Update Advert
    </button>
  <?php } ?>
  <button type="submit" onclick="document.getElementById('view').value='';document.myform.submit;" class="btn btn-danger square" title="Save">
  <i class="fa fa-close"></i> Cancel
    </button>
  </div>
   </div>

  <!-- Example DataTables Card-->
  <span id="msg"> <?php $engine->msgBox($msg,$status); ?></span>
  
  <div class="card mb-3 square">
    <div class="card-header">
      <i class="fa fa-list"></i> Add Advert
      <div class="pagestatus">
        <label>Page Status: </label>
        <select name="advstatus" id="advstatus">
          <option <?php echo (($advstatus=='2'))?'selected' : ''; ?> value="2">Draft</option>
          <option <?php echo (($advstatus=='1'))?'selected' : ''; ?> value="1">Publish</option>
        </select>
      </div>
    </div>
    <div class="card-body">

        <div class="row">
          <div class="form-group col-sm-12">
            <label for="advtitle"> Title </label>
            <input class="form-control" type="text" name="advtitle" id="advtitle" placeholder="Title" value="<?php echo(($advtitle))?$advtitle:''; ?>" />
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-12">
            <label for="advdescription">Discription</label>
            <textarea name="advdescription" class="form-control" id="advdescription" width="100%" cols="30" rows="10"><?php echo(($advdescription))?$advdescription:''; ?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6">
            <label for="pagetitle"> Image </label>
            <input class="form-control" type="file" name="photo" id="photo" placeholder="home,site...etc"  />
            <input type="text" name="oldphoto" id="oldphoto" value="<?php echo(($advimage))?$advimage:''; ?>" hidden>
          </div>
          <div class="form-group col-sm-6">
            <label for="pagetitle"> URL </label>
            <input class="form-control" type="text" name="advurl" id="advurl" placeholder="advert url"  />
          </div>
        </div>

    </div>
  </div>
  <!-- /.container-fluid-->
 <script>
  var area2 = new nicEditor({fullPanel : true}).panelInstance('postbody',{hasPanel : true});
 </script>
  