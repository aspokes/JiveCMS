<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Item</li>
    <li class="breadcrumb-item active">Add New</li>
  </ol>

   <!-- Action Buttons -->
   <div class="action-btn">
   <div class="btn-group btn-actions">
  <?php if(empty($keys)){?>
    <button type="submit" onclick="document.getElementById('viewpage').value='save';document.getElementById('view').value='';document.myform.submit;" class="btn btn-success square" title="Save">
      <i class="fa fa-save"></i> Save Item
    </button>
  <?php }else{?>
    <button type="submit" onclick="document.getElementById('keys').value='<?php echo $keys; ?>';document.getElementById('viewpage').value='update';document.myform.submit;" class="btn btn-success square" title="Update">
      <i class="fa fa-save"></i> Update Item
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
      <i class="fa fa-list"></i> Add Item
      <div class="pagestatus">
        <label>Product Type: </label>
        <select name="prodtype" id="prodtype">
          <option <?php echo (($prodtype=='1'))?'selected' : ''; ?> value="1">Item</option>
          <option <?php echo (($prodtype=='2'))?'selected' : ''; ?> value="2">File</option>
        </select>
      </div>
    </div>
    <div class="card-body">

        <div class="row">
          <div class="form-group col-sm-3">
            <label for="prodisbn"> ISBN </label>
            <input class="form-control" type="text" name="prodisbn" id="prodisbn" placeholder="isbn" value="<?php echo(($prodisbn))?$prodisbn:''; ?>" />
          </div>
          <div class="form-group col-sm-3">
            <label for="prodmadedate"> Expirey Date </label>
            <input class="form-control" type="text" name="prodmadedate" id="prodmadedate" placeholder="dd-mm-yy" value="<?php echo(($prodmadedate))?$prodmadedate:''; ?>" />
          </div>
          <div class="form-group col-sm-3">
            <label for="prodquantity"> Quantity</label>
            <input class="form-control" type="text" name="prodquantity" id="prodquantity" placeholder="quantity" value="<?php echo(($prodquantity))?$prodquantity:''; ?>" />
          </div>
          <div class="form-group col-sm-3">
            <label for="prodcatcode"> Category </label>
            <select name="prodcatcode" id="prodcatcode" class="form-control">
              <option value="" disabled selected>select a category...</option>
              <?php foreach($catdata as $cat){?>
              <option <?php echo(($cat->PRC_ID == $prodcatcode))?'selected':''; ?> value="<?php echo $cat->PRC_ID; ?>"><?php echo $cat->PRC_NAME; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-9">
            <label for="prodname"> Name </label>
            <input class="form-control" type="text" name="prodname" id="prodname" placeholder="product name" value="<?php echo(($prodname))?$prodname:''; ?>" />
          </div>
          <div class="form-group col-sm-3">
            <label for="prodfinalamount"> Amount </label>
            <input class="form-control" type="text" name="prodfinalamount" id="prodfinalamount" value="<?php echo(($prodfinalamount))?$prodfinalamount:''; ?>" readonly />
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-12">
            <label for="proddescipt">Description</label>
            <textarea name="proddescipt" class="form-control" id="proddescipt" width="100%" cols="30" rows="10"><?php echo(($proddescipt))?$proddescipt:''; ?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6">
            <label for="pagetitle"> Product Image </label>
            <input class="form-control" type="file" name="prodimg" id="prodimg"/>
            <input type="text" name="oldphoto" id="oldphoto" value="<?php echo(($prodimage))?$prodimage:''; ?>" hidden>
          </div>
          <div class="form-group col-sm-6">
            <label for="prodimage"> Product file </label>
            <input class="form-control" type="file" name="prodfile" id="prodfile" />
            <input type="text" name="oldfile" id="oldfile" value="<?php echo(($prodfilename))?$prodfilename:''; ?>" hidden>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6">
          <label for="prodcost"> Cost </label>
            <input class="form-control" type="text" name="prodcost" id="prodcost" placeholder="product cost" value="<?php echo(($prodcost))?$prodcost:''; ?>" />
          </div>
          <div class="form-group col-sm-6">
            <label for="prodamount"> Amount </label>
            <input class="form-control" type="text" name="prodamount" id="prodamount" placeholder="sell amount" value="<?php echo(($prodamount))?$prodamount:''; ?>" />
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-6">
          <label for="prodtaxid"> Tax </label>
            <select name="prodtaxid" id="prodtaxid" class="form-control">
              <option value="" disabled selected>select tax type...</option>
              <?php foreach($taxs as $tax){?>
              <option <?php echo(($tax->TAX_ID == $prodtaxid))?'selected':''; ?> value="<?php echo $tax->TAX_ID.' @@ '.$tax->TAX_PERCENTAGE; ?>"><?php echo $tax->TAX_NAME; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-sm-6">
            <label for="prodtaxpercent"> Tax Percentage </label>
            <input class="form-control" type="text" name="prodtaxpercent" id="prodtaxpercent"  value="<?php echo(($prodtaxpercent))?$prodtaxpercent:''; ?>" readonly/>
          </div>
        </div>

    </div>
  </div>
  <!-- /.container-fluid-->
 <script>
  var area2 = new nicEditor({fullPanel : true}).panelInstance('proddescipt',{hasPanel : true});
  $(document).ready(function(){
    var pvalue, final, initamount;
    $('#prodtaxid').on('change',function(){
      var code = $('#prodtaxid').val().split('@@');
      console.log(code);
      $('#prodtaxpercent').val(code[1]);
      initamount = Number($('#prodamount').val());
      pvalue = Number($('#prodtaxpercent').val() / 100);
      final = initamount * pvalue;
      $('#prodfinalamount').val(final+initamount).tofixed(2);
    });

    $('#prodamount').on('keyup',function(){
      initamount = Number($('#prodamount').val());
      pvalue = Number($('#prodtaxpercent').val() / 100);
      final = initamount * pvalue;
      $('#prodfinalamount').val(final+initamount);
      console.log(this.pvalue);
    })

  })
    
 </script>
  