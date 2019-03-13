
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Member Registration</li>
    <li class="breadcrumb-item active">Preview Member</li>
  </ol>
  <!-- Action Buttons -->
  <div class="action-btn">
      <div class="btn-group btn-actions-save">

        <button type="submit" onclick="document.getElementById('view').value='';document.myform.submit;" class="btn btn-info square"
          title="Save">
          <i class="fa fa-arrow-left"></i> Back
        </button>
      </div>
  </div>

  <!-- Example DataTables Card-->
  <span id="msg">
    <?php //$engine->msgBox($msg,$status); ?>
  </span>

  <div class="card mb-3 square">
    <div class="card-header">
      <i class="fa fa-list"></i> Preview Member Details
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
            <div class="col-sm-9">
                <table class="table table-hover" width="100%">
                <tr>
                <td><strong>Frist Name:</strong> <br><?php echo(($oname))?$oname:'- -'; ?> </td>
                <td><strong>Other Name:</strong> <br> <?php echo(($fname))?$fname:'- -'; ?></td>
                </tr>
                 <tr>
                <td><strong>Date Of Birth:</strong> <br> <?php  echo (($ddob))?$ddob:''; ?> </td>
                <td><strong>Place Of Birth:</strong> <br><?php  echo (($placeofbirth))?$placeofbirth:'- -'; ?></td>
                </tr>
                 <tr>
                <td><strong>Gender:</strong> <br><?php  echo (($gender))?$gender:''; ?> </td>
                <td><strong>Ress. Addr.:</strong> <br><?php  echo (($ressaddress))?$ressaddress:'- -'; ?></td>
                </tr>
                 <tr>
                <td><strong>Country:</strong><br>  <?php foreach($countries as $kay => $value) {?>                            
 <?php echo (($kay == $countrier)?$value:'') ;?> <?php }  ?> </td>
                <td><strong>Phone Number:</strong><br> <?php  echo (($phoneno))?$phoneno:'- -'; ?></td>
                </tr>
                 <tr>
                <td><strong>Email:</strong><br> <?php  echo (($mememail))?$mememail:'- -'; ?></td>
                <td><strong>Marital Status:</strong><br> <?php 	if ($maritalstatus=='1'){ echo 'Single';}elseif($maritalstatus=='2'){ echo 'Married';}
 ?></td>
                </tr>
                <tr>
                <td><strong>Mother's Name:</strong><br> <?php  echo (($mothername))?$mothername:'- -'; ?> </td>
                <td><strong>Mother's Hometown:</strong><br> <?php  echo (($motherhometown))?$motherhometown:''; ?></td>
                </tr>
                 <tr>
               <td><strong>Father's Name:</strong><br> <?php  echo (($fathername))?$fathername:'- -'; ?> </td>
                <td><strong>Father's Hometown:</strong><br> <?php  echo (($fatherhometown))?$fatherhometown:''; ?></td>
                
                </tr>
                 <tr>
                <td><strong>Profession:</strong> <br> <?php  echo (($profession))?$profession:'- -'; ?> </td>
                <td><strong>Place Of Work:</strong><br> <?php  echo (($workplace))?$workplace:'- -'; ?></td>
                </tr>
                 <tr>
               <td><strong>ID Type:</strong><br> <?php 	if($idtypes=='1'){echo 'Voter ID';}elseif($idtypes=='2'){ echo 'NHIS ID'; }elseif($idtypes=='3'){ echo 'Passport'; }elseif($idtypes=='4'){ echo 'SSNIT ID'; }elseif($idtypes=='5'){ echo 'National ID'; }
 ?></td>
                <td><strong>ID Number:</strong> <br> <?php  echo (($idnumber))?$idnumber:'- -'; ?></td>
                
                </tr>

                </table>
      
</div>


            <div class="col-sm-3">
          <div class="row">
            <div class="col-sm-12">

        <tr>
                <td colspan="2"><strong>Passport Picture:</strong>
                                <img src="<?php echo((!empty($passpicture))?'../media/passportpictures/'.$passpicture:'../media/passportpictures/defaultpic.png');?>" alt="" id="profile-img-tag" style="width:200px !important; height:150px !important; ">
                                </td>
                </tr>
        </div>
       </div>
            
            </div>
        </div>
        
    </div>
  </div>
  </div>
  <!-- /.container-fluid-->
  <script>
     CKEDITOR.replace( 'pagesbody' );
  </script>
<script type="text/javascript">

    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            

            reader.onload = function (e) {

                $('#profile-img-tag').attr('src', e.target.result);

            }

            reader.readAsDataURL(input.files[0]);

        }

    }

    $("#profile-img").change(function(){

        readURL(this);

    });

</script>    
