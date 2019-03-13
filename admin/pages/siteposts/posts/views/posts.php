<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Posts</li>
    <li class="breadcrumb-item active">Add New</li>
  </ol>

   <!-- Action Buttons -->
   <div class="action-btn">
   <div class="btn-group btn-actions">
  <?php if(empty($keys)){?>
    <button type="submit" onclick="document.getElementById('viewpage').value='saveposts';document.getElementById('view').value='';document.myform.submit;" class="btn btn-success square" title="Save">
      <i class="fa fa-save"></i> Save Post
    </button>
  <?php }else{?>
    <button type="submit" onclick="document.getElementById('keys').value='<?php echo $keys; ?>';document.getElementById('viewpage').value='updatepost';document.myform.submit;" class="btn btn-success square" title="Save">
      <i class="fa fa-save"></i> Update Page
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
      <i class="fa fa-list"></i> Add Post
      <div class="pagestatus">
        <label>Page Status: </label>
        <select name="pagestate" id="pagestate">
          <option <?php echo (($pagestate=='2'))?'selected' : ''; ?> value="2">Draft</option>
          <option <?php echo (($pagestate=='1'))?'selected' : ''; ?> value="1">Publish</option>
        </select>
      </div>
    </div>
    <div class="card-body">

        <div class="row">
          <div class="form-group col-sm-9">
            <label for="posttitle"> Title </label>
            <input class="form-control" type="text" name="posttitle" id="posttitle" placeholder="Title" value="<?php echo(($posttitle))?$posttitle:''; ?>" />
          </div>
          <div class="form-group col-sm-3">
            <label for="postslug"> Slug </label>
            <input class="form-control" type="text" name="postslug" id="postslug" placeholder="Slug" value="<?php echo(($postslug))?$postslug:''; ?>" />
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-12">
            <label for="postbody">Body</label>
            <textarea name="postbody" class="form-control" id="postbody" width="100%" cols="30" rows="10"><?php echo(($postbody))?$postbody:''; ?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6">
            <label for="pagetitle"> Page </label>
            <select name="postpageid" id="postpageid" class="form-control">
              <option value="" disabled selected>Select the page to assign post to...</option>
              <?php foreach($pages as $page){?>
              <option <?php echo(($page->PG_ID == $postpageid))?'selected':''; ?> value="<?php echo $page->PG_ID; ?>"><?php echo $page->PG_TITLE; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-sm-6">
            <label for="pagetitle"> Meta tags </label>
            <input class="form-control" type="text" name="postmeta" id="postmeta" placeholder="home,site...etc" value="<?php echo(($postmeta))?$postmeta:''; ?>" />
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6">
            <label for="pagetitle"> Main Image </label>
            <input class="form-control" type="file" name="photo" id="photo" placeholder="home,site...etc"  />
            <input type="text" name="oldphoto" id="oldphoto" value="<?php echo(($postphoto))?$postphoto:''; ?>" hidden>
          </div>
          <div class="form-group col-sm-6">
            <label for="pagetitle"> Category </label>
            <select name="postcategory" id="postcategory" class="form-control">
              <option value="" disabled selected>Select the page to assign post to...</option>
              <?php foreach($category as $cat){?>
              <option <?php echo(($cat->POC_ID == $postcategory))?'selected':''; ?> value="<?php echo $cat->POC_ID; ?>"><?php echo $cat->POC_NAME; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

    </div>
  </div>
  <!-- /.container-fluid-->
 <script>
  var area2 = new nicEditor({fullPanel : true}).panelInstance('postbody',{hasPanel : true});
 </script>
  