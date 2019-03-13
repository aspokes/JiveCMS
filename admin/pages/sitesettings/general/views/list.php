<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">General</li>
  </ol>

  <!-- Action Buttons -->
  <div class="action-btn">
    <div class="btn-group btn-actions-save">
      <?php if(empty($obj)){?>
      <button type="submit" onclick="document.getElementById('viewpage').value='settings';document.getElementById('view').value='pages';document.myform.submit;"
        class="btn btn-success square" title="Save">
        <i class="fa fa-save"></i> Save Page
      </button>
      <?php }else{?>
      <button type="submit" onclick="document.getElementById('keys').value='<?php echo $siteid; ?>';document.getElementById('viewpage').value='settings';document.getElementById('view').value='';document.myform.submit;"
        class="btn btn-success square" title="Save">
        <i class="fa fa-save"></i> Update Page
      </button>
      <?php } ?>
    </div>
  </div>

  <span id="msg"> <?php $engine->msgBox($msg,$status); ?></span>

  <!-- Example DataTables Card-->
  <div class="card mb-3 square">
    <div class="card-header">
      <i class="fa fa-sliders"></i> General</div>
    <div class="card-body">

      <div class="row">
        <div class="form-group col-sm-12">
          <label for="pagetitle">Site Title </label>
          <input class="form-control" type="text" name="sitetitle" id="sitetitle" placeholder="Site Title" value="<?php echo(($sitetitle))?$sitetitle:''; ?>" />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-6">
          <label for="pagetitle"> Meta Tags </label>
          <input class="form-control" type="text" name="sitemeta" id="sitemeta" placeholder="meta tag" value="<?php echo(($sitemeta))?$sitemeta:''; ?>" />
        </div>
        <div class="form-group col-sm-6">
          <label for="pagetitle"> Short Description </label>
          <input class="form-control" type="text" name="siteshortdesc" id="siteshortdesc" placeholder="Short Description"
            value="<?php echo(($siteshortdesc))?$siteshortdesc:''; ?>" />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-12">
          <label for="pagetitle">Location </label>
          <input class="form-control" type="text" name="sitelocation" id="sitelocation" placeholder="Location" value="<?php echo(($sitelocation))?$sitelocation:''; ?>" />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-12">
          <label for="pagetitle">Postal Address </label>
          <input class="form-control" type="text" name="sitepostaddress" id="sitepostaddress" placeholder="Postal Address"
            value="<?php echo(($sitepostaddress))?$sitepostaddress:''; ?>" />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-6">
          <label for="pagetitle">Website Url </label>
          <input class="form-control" type="text" name="siteurl" id="siteurl" placeholder="Website URL" value="<?php echo(($siteurl))?$siteurl:''; ?>" />
        </div>
        <div class="form-group col-sm-6">
          <label for="pagetitle">Contact Email Address </label>
          <input class="form-control" type="text" name="siteemil" id="siteemail" placeholder="Email Address" value="<?php echo(($siteemil))?$siteemil:''; ?>" />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-12">
          <label for="pagetitle">Contact Number</label>
          <input class="form-control" type="text" name="sitecontact" id="sitecontact" placeholder="Contact" value="<?php echo(($sitecontact))?$sitecontact:''; ?>" />
        </div>
      </div>

    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</div>
<!-- /.container-fluid-->