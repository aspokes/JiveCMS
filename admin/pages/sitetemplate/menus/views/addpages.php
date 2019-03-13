<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Menus</li>
  </ol>

  <span id="msg"> <?php $engine->msgBox($msg,$status); ?></span>
  <!-- Example DataTables Card-->
  <div class="card mb-3 square">

    <div class="card-header">
      <i class="fa fa-th"></i> Menu List</div>
    <div class="card-body">

      <input type="hidden" name="selectpage" value='<?php echo serialize($selectedpages); ?>'>
      <div class="col-sm-12">
          <ul class="ulist">
          <?php foreach($pages as $opt){  ?> 
              <li><input class="chekki" value="<?php echo $opt['PG_SLUG']."@@".$opt['PG_TITLE'] ?>" <?php  foreach ($selectedpages as $spages){   echo (($spages['MENP_PAGE_SLUG']==$opt['PG_SLUG']))?'checked':''; }?> type="checkbox" name="pageadded[]" id="pageadded"> <?php echo $opt['PG_TITLE']?></li>
          <?php } ?>
          </ul>
      </div>
      <div class="col-sm-12">
        <button class="btn btn-success square" onclick="document.getElementById('viewpage').value='add_pages_to_menu';document.getElementById('keys').value='<?php echo $keys; ?>';document.myform.submit();" type="save"><i class="fa fa-save"></i> Save</button>
        <button type="submit" onclick="document.getElementById('view').value='';document.myform.submit;" class="btn btn-danger square" title="cancel"><i class="fa fa-close"></i> Cancel</button>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</div>
<!-- /.container-fluid-->


