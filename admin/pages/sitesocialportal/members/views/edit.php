      <form  action="#" method="post" name="myform" id="myform" autocomplete="off" style="padding: 100px 65px 40px 65px;" enctype="multipart/form-data">
        <input type="hidden" name="action_key" id="action_key" value="<?php echo md5(microtime());?>" />
        <input type="hidden" value="" name="viewpage" id="viewpage" />
        <input type="hidden" value="" name="view" id="view" />
        <input type="hidden" value="<?php echo $keys; ?>" name="keys" id="keys" />

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Member Registration</li>
    <li class="breadcrumb-item active">Edit New Member</li>
  </ol>
  <!-- Action Buttons -->
  <div class="action-btn">
      <div class="btn-group btn-actions-save">

<button type="submit" onclick="document.getElementById('keys').value='<?php echo $keys; ?>';document.getElementById('viewpage').value='updatepage';document.getElementById('view').value='';document.myform.submit;"
          class="btn btn-success square" title="Save">
          <i class="fa fa-save"></i> Update Page
        </button>

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
      <i class="fa fa-list"></i> Edit Member
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
      <div class="row">
        <div class="form-group col-sm-4">
          <label for="fname"><b> First Name</b><span style="color:#F30206">*</span> </label>
          <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name" value="<?php echo(($oname))?$oname:''; ?>" />
        </div>
        <div class="form-group col-sm-4">
          <label for="oname"><b> Othername(s)</b><span style="color:#F30206">*</span> </label>
          <input class="form-control" type="text" name="oname" id="oname" placeholder="Othername(s)"  value="<?php echo(($fname))?$fname:''; ?>"/>
        </div>
        
        <div class="form-group col-sm-4">
        <label><b>Gender</b><span style="color:#F30206">*</span> </label>
        <select name="gender" id="gender" class="form-control">
          <option value="">Select ..</option>
          <option value="Male" <?php echo (($gender=='Male' ))? 'selected' : ''; ?>>Male</option>
          <option  value="Female" <?php echo (($gender=='Female' ))? 'selected' : ''; ?>>Female</option>
        </select>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-4">
        <label><b>Marital Status</b> <span style="color:#F30206">*</span></label>
        <select name="maritalstatus" id="maritalstatus" class="form-control">
          <option value="">Select ..</option>
          <option value="1" <?php echo (($maritalstatus=='1' ))? 'selected' : ''; ?>>Single</option>
          <option  value="2" <?php echo (($maritalstatus=='2' ))? 'selected' : ''; ?>>Married</option>
        </select>
        </div>
        <div class="form-group col-sm-4">
          <label for="phoneno"> <b>Contact</b><span style="color:#F30206">*</span></label>
          <input class="form-control" type="text" name="phoneno" id="phoneno" placeholder="Contact"  value="<?php echo(($phoneno))?$phoneno:''; ?>"/>
        </div>

        <div class="form-group col-sm-4">
          <label for="ressaddress"><b> Location</b><span style="color:#F30206">*</span> </label>
          <input class="form-control" type="text" name="ressaddress" id="ressaddress" placeholder="Location" value="<?php echo(($ressaddress))?$ressaddress:''; ?>" />
        </div>

      </div>

      <div class="row">

        <div class="form-group col-sm-4">
          <label for="placeofbirth"><b> Hometown</b><span style="color:#F30206">*</span></label>
          <input class="form-control" type="text" name="placeofbirth" id="placeofbirth" placeholder="Home Town"  value="<?php echo(($placeofbirth))?$placeofbirth:''; ?>"/>
        </div>

        <div class="form-group col-sm-4">
          <label for="mememail"><b> Email</b><span style="color:#F30206">*</span> </label>
          <input class="form-control" type="email" name="mememail" id="mememail" placeholder="Email"  value="<?php echo(($mememail))?$mememail:''; ?>"/>
        </div>

        <div class="form-group col-sm-4">
          <label for="profession"><b> Profession</b><span style="color:#F30206">*</span> </label>
          <input class="form-control" type="text" name="profession" id="profession" placeholder="Profession" value="<?php echo(($profession))?$profession:''; ?>" />
        </div>

      </div>
      
      
</div>


            <div class="col-sm-3">
          <div class="row">
            <div class="col-sm-12">

          <label for="passpicture"> <b>Passport Picture</b></label>
                                <img src="<?php echo((!empty($passpicture))?'../media/passportpictures/'.$passpicture:'../media/passportpictures/defaultpic.png');?>" alt="" id="profile-img-tag" style="width:200px !important; height:150px !important; ">
			<input id="profile-img" class="form-control" type="file"  name="passpicturea" placeholder="Passport Picture">
        </div>
       </div>
            
            </div>
        </div>
        
         
      <div class="row">

        <div class="form-group col-sm-3">
          <label for="profession"><b> Birthday</b><span style="color:#F30206">*</span> </label>
          </div>
        <div class="form-group col-sm-3">
		</div>
        <div class="form-group col-sm-3">
        </div>
        <div class="form-group col-sm-3">
          <label for="profession"><b> Country</b><span style="color:#F30206">*</span> </label>
          </div>
          </div>
          
      <div class="row">
        <div class="form-group col-sm-3">

                <select id="monthh" class="form-control" name="months" data-validate="Month">
                  <option value="-">Month</option>
                  <option value="01" <?php echo (($bmonth=='01' ))? 'selected' : ''; ?>>Jan</option>
                  <option value="02" <?php echo (($bmonth=='02' ))? 'selected' : ''; ?>>Feb</option>
                  <option value="03" <?php echo (($bmonth=='03' ))? 'selected' : ''; ?>>Mar</option>
                  <option value="04" <?php echo (($bmonth=='04' ))? 'selected' : ''; ?>>Apr</option>
                  <option value="05" <?php echo (($bmonth=='05' ))? 'selected' : ''; ?>>May</option>
                  <option value="06" <?php echo (($bmonth=='06' ))? 'selected' : ''; ?>>Jun</option>
                  <option value="07" <?php echo (($bmonth=='07' ))? 'selected' : ''; ?>>Jul</option>
                  <option value="08" <?php echo (($bmonth=='08' ))? 'selected' : ''; ?>>Aug</option>
                  <option value="09" <?php echo (($bmonth=='09' ))? 'selected' : ''; ?>>Sept</option>
                  <option value="10" <?php echo (($bmonth=='10' ))? 'selected' : ''; ?>>Oct</option>
                  <option value="11" <?php echo (($bmonth=='11' ))? 'selected' : ''; ?>>Nov</option>
                  <option value="12" <?php echo (($bmonth=='12' ))? 'selected' : ''; ?>>Dec</option>
                </select>
            </div>
        <div class="form-group col-sm-3">
                <!-- <input id="gender" class="input100" type="text" name="fname" placeholder="Gender"> -->
                <select id="dayy" class="form-control" name="days" data-validate="Day">
                  <option>Day</option>
                  <?php
                                    for($day = 1; $day <= 31; $day++){
                                       echo "<option value = '".$day."'".(($day == $bday)?'selected="selected"':'').">".$day."</option>";
                                }
                            ?>
                </select>
            </div>
        <div class="form-group col-sm-3">
                <!-- <input id="gender" class="input100" type="text" name="fname" placeholder="Gender"> -->
                <select id="yearr" class="form-control" name="years" data-validate="Year">
                  <option>Year</option>
                  <?php
                                        $y = date("Y", strtotime("+8 HOURS"));
                                        for($year = 1930; $y >= $year; $y--){
                                            echo "<option value = '".$y."'".(($y == $byear)?'selected="selected"':'').">".$y."</option>";
                                      
									  
									    }
                                  
								    ?>
                </select>
            </div>

                            
        <div class="form-group col-sm-3">
          <label for="countries"><b> Country </b></label>
                            <select id="countrie" class="form-control" name="countries">
							<option value="" > Select Country </option>
                            <?php
                           
                            foreach($countries as $kay => $value) {
                            
                            ?>                            
                            
                            <option value="<?= $kay ?>" <?php echo (($kay == $countrier)?'selected="selected"':'') ;?> title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                            <?php
                            
                            }
                            
                            ?>
                            </select>						
        </div>

      </div>
         
         
          <div class="row">
            <div class="col-sm-12">
      <div class="row">
        <div class="form-group col-sm-3">
          <label for="mothername"><b> Mother's Name</b> </label>
          <input class="form-control" type="text" name="mothername" id="mothername" placeholder="Mother's Name"  value="<?php echo(($mothername))?$mothername:''; ?>"/>
        </div>
        <div class="form-group col-sm-3">
          <label for="motherhometown"><b> Mother's Hometown</b> </label>
          <input class="form-control" type="text" name="motherhometown" id="motherhometown" placeholder="Mother's Hometown"  value="<?php echo(($motherhometown))?$motherhometown:''; ?>"/>
        </div>
        <div class="form-group col-sm-3">
          <label for="fathername"><b> Father's Name</b> </label>
          <input class="form-control" type="text" name="fathername" id="fathername" placeholder="Father's Name"  value="<?php echo(($fathername))?$fathername:''; ?>"/>
        </div>
        <div class="form-group col-sm-3">
          <label for="fatherhometown"> <b>Father's Hometown</b></label>
          <input class="form-control" type="text" name="fatherhometown" id="fatherhometown" placeholder="Father's Hometown" value="<?php echo(($fatherhometown))?$fatherhometown:''; ?>" />
        </div>
      </div>
</div>
          </div>

          <div class="row">
            <div class="col-sm-12">

      <div class="row">

        <div class="form-group col-sm-3">
          <label for="idtype"><b> ID Type</b></label>
						<select id="idtype" class="form-control" name="idtype" data-validate="ID Type">
							<option value="" > Select ID Type </option>
							<option value="1" <?php echo (($idtypes=='1' ))? 'selected' : ''; ?>>Voter ID</option>
							<option value="2" <?php echo (($idtypes=='2' ))? 'selected' : ''; ?>>NHIS ID</option>
							<option value="3" <?php echo (($idtypes=='3' ))? 'selected' : ''; ?>>Passport</option>
							<option value="4" <?php echo (($idtypes=='4' ))? 'selected' : ''; ?>>SSNIT ID</option>
							<option value="5" <?php echo (($idtypes=='5' ))? 'selected' : ''; ?>>National ID</option>
                            
						</select>
        </div>

        <div class="form-group col-sm-3">
          <label for="idnumber"><b> ID Number</b></label>
          <input class="form-control" type="text" name="idnumber" id="idnumber" placeholder="ID Number"  value="<?php echo(($idnumber))?$idnumber:''; ?>"/>
        </div>

        <div class="form-group col-sm-3">
          <label for="workplace"><b> Place of Work</b> </label>
          <input class="form-control" type="text" name="workplace" id="workplace" placeholder="Place of Work"  value="<?php echo(($workplace))?$workplace:''; ?>"/>
        </div>

      </div>
     </div>
    </div>


        
    </div>
  </div>
  </div>
  </form>
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
