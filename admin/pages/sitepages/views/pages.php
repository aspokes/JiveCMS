<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Pages</li>
    <li class="breadcrumb-item active">Add New</li>
  </ol>

  <!-- Action Buttons -->
  <div class="action-btn">
      <div class="btn-group btn-actions-save">
        <?php if(empty($keys)){?>
        <button type="submit" onclick="document.getElementById('viewpage').value='savepage';document.getElementById('view').value='pages';document.myform.submit;"
          class="btn btn-success square" title="Save">
          <i class="fa fa-save"></i> Save Page
        </button>
        <?php }else{?>
        <button type="submit" onclick="document.getElementById('keys').value='<?php echo $keys; ?>';document.getElementById('viewpage').value='updatepage';document.getElementById('view').value='';document.myform.submit;"
          class="btn btn-success square" title="Save">
          <i class="fa fa-save"></i> Update Page
        </button>
        <?php } ?>

        <button type="submit" onclick="document.getElementById('view').value='';document.myform.submit;" class="btn btn-danger square"
          title="Save">
          <i class="fa fa-close"></i> Cancel
        </button>
      </div>
  </div>

  <!-- Example DataTables Card-->
  <span id="msg">
    <?php $engine->msgBox($msg,$status); ?>
  </span>

  <div class="card mb-3 square">
    <div class="card-header">
      <i class="fa fa-list"></i> Add Page
      <div class="pagestatus">
        <label>Page Status: </label>
        <select name="pagestate" id="pagestate">
          <option <?php echo (($pagestate=='2' ))? 'selected' : ''; ?> value="2">Draft</option>
          <option <?php echo (($pagestate=='1' ))? 'selected' : ''; ?> value="1">Publish</option>
        </select>
      </div>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="form-group col-sm-12">
          <label for="pagetitle"> Title </label>
          <input class="form-control" type="text" name="pagetitle" id="pagetitle" placeholder="Title" value="<?php echo(($pagetitle))?$pagetitle:''; ?>"
          />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-3">
          <label for="pagetitle"> Slug </label>
          <input class="form-control" type="text" name="pageslug" id="pageslug" placeholder="Slug" value="<?php echo(($pageslug))?$pageslug:''; ?>"
          />
        </div>
        <div class="form-group col-sm-9">
          <label for="pagetitle"> Short Description </label>
          <input class="form-control" type="text" name="pageshortdesc" id="pageshortdesc" placeholder="Short Description" value="<?php echo(($pageshortdesc))?$pageshortdesc:''; ?>"
          />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-12">
          <label for="pagesbody">Body</label>
          <textarea name="pagesbody" class="form-control" id="pagesbody" width="100%" cols="30" rows="30">
            <?php echo(($pagesbody))?$pagesbody:''; ?>
          </textarea>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-6">
          <label for="pagetitle"> Template Name </label>
          <input class="form-control" type="text" name="pagetempname" id="pagetempname" placeholder="Template Name" value="<?php echo(($pagetempname))?$pagetempname:''; ?>"
          />
        </div>
        <div class="form-group col-sm-6">
          <label for="pagemeta"> Meta tags </label>
          <input class="form-control" type="text" name="pagemeta" id="pagemeta" placeholder="home,site...etc" value="<?php echo(($pagemeta))?$pagemeta:''; ?>"
          />
        </div>
      </div>

    </div>
  </div>
  <!-- /.container-fluid-->
  <script>
  var area2 = new nicEditor({fullPanel : true}).panelInstance('pagesbody',{hasPanel : true});
 </script>