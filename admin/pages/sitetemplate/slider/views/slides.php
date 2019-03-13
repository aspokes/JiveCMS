<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active"><?php echo (($keys))?'Edit Slider':'Add Slider'; ?></li>
  </ol>

   <!-- Action Buttons -->
   <div class="action-btn">
    <div class="btn-group btn-actions">
      <button class="btn btn-success square" onclick="document.getElementById('viewpage').value='saveslider';document.getElementById('keys').value='<?php echo $keys; ?>';document.myform.submit();" type="save"><i class="fa fa-save"></i> Save</button>

      <button type="submit" onclick="document.getElementById('view').value='';document.myform.submit;" class="btn btn-danger square" title="cancel"><i class="fa fa-close"></i> Cancel</button>
    </div>
  </div>

  <span id="msg">
    <?php $engine->msgBox($msg,$status); ?></span>
  <!-- Example DataTables Card-->
  <div class="card mb-3 square">

    <div class="card-header">
      <i class="fa fa-th"></i> Menu List</div>
    <div class="card-body row">
      <div class="col-sm-8">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-sm-6">
            <label for="sliderimage"> Slider Image</label>
            <input type="file" class="form-control" name="sliderimage" id="sliderimage">
            <input type="text" class="form-control" name="sliderimageold" id="sliderimageold" value="<?php echo $slidedata['SL_IMAGE']?>" hidden>
          </div>
          <div class="col-sm-2">
            <label for="sliderorder"> Slider Order</label>
            <select name="sliderorder" id="sliderorder" class="form-control">
              <option selected disabled> ------ </option>
              <option <?php echo (($slidedata['SL_IMAGE_ORDER']=='1'))?'selected':''; ?> value="1">First</option>
              <option <?php echo (($slidedata['SL_IMAGE_ORDER']=='2'))?'selected':''; ?> value="2">Second</option>
              <option <?php echo (($slidedata['SL_IMAGE_ORDER']=='3'))?'selected':''; ?> value="3">Third</option>
              <option <?php echo (($slidedata['SL_IMAGE_ORDER']=='4'))?'selected':''; ?> value="4">Forth</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12" style="margin-bottom:20px;">
            <label for="slidertitle">Slider Title</label>
            <textarea type="text" class="form-control" name="slidertitle" id="slidertitle" ><?php echo $slidedata['SL_MAIN_TITLE']; ?></textarea>
          </div>
          <div class="col-sm-12" style="margin-bottom:20px;">
            <label for="slidertitle">Slider Sub Title</label>
            <textarea type="text" class="form-control" name="slidersubtitle" id="slidersubtitle"><?php echo $slidedata['SL_SUB_TITLE']; ?></textarea>
          </div>
          <div class="col-sm-12" style="margin-bottom:20px;">
            <label for="slidertitlecrumbs">Slider Title Crumbs</label>
            <textarea type="text" class="form-control" name="slidertitlecrumbs" id="slidertitlecrumbs"><?php echo $slidedata['SL_SU_TITLE_TWO']; ?></textarea>
          </div>
        </div>

      
      </div>

      <?php if($keys){ ?>
        <div class="col-sm-4">
            <div class="row slide_img pull-right">
              <img src="../media/img/slides/<?php echo $slidedata['SL_IMAGE']?>" alt="slide" width="300px;" height="190px">
            </div>
        </div>
      <?php } ?>
    </div>
    <div class="spacer"></div>
   
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</div>
<!-- /.container-fluid-->