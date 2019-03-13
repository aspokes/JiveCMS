                        <form method="post" name="myform" method="post" action="#" id="myform">
                            <input type="hidden" name="action_key" id="action_key" value="<?php echo md5(microtime());?>" />
                             <input type="hidden" value="" name="viewpage" id="viewpage" />
                             <input type="hidden" value="" name="view" id="view" />
                             <input type="hidden" value="<?php echo  $keys ;?>" name="keys" id="keys" />
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb square">
    <li class="breadcrumb-item">
      <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Member Registration</li>
    <li class="breadcrumb-item active">Add New Member</li>
  </ol>
  <!-- Action Buttons -->
  <div class="action-btn">
      <div class="btn-group btn-actions-save">

        <button type="submit" onclick="document.getElementById('viewpage').value='savemem';document.getElementById('view').value='add';document.myform.submit;"
          class="btn btn-success square" title="Save">
          <i class="fa fa-save"></i> Save Page
        </button>

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
      <i class="fa fa-list"></i> Add Member
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
          <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name"  />
        </div>
        <div class="form-group col-sm-4">
          <label for="oname"><b> Othername(s)</b><span style="color:#F30206">*</span> </label>
          <input class="form-control" type="text" name="oname" id="oname" placeholder="Othername(s)"  />
        </div>
        
        <div class="form-group col-sm-4">
        <label><b>Gender</b><span style="color:#F30206">*</span> </label>
        <select name="gender" id="gender" class="form-control">
          <option value="">Select ..</option>
          <option value="Male">Male</option>
          <option  value="Female">Female</option>
        </select>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-4">
        <label><b>Marital Status</b> <span style="color:#F30206">*</span></label>
        <select name="maritalstatus" id="maritalstatus" class="form-control">
          <option value="">Select ..</option>
          <option value="1">Single</option>
          <option  value="2">Married</option>
        </select>
        </div>
        <div class="form-group col-sm-4">
          <label for="phoneno"> <b>Contact</b><span style="color:#F30206">*</span></label>
          <input class="form-control" type="text" name="phoneno" id="phoneno" placeholder="Contact"  />
        </div>

        <div class="form-group col-sm-4">
          <label for="ressaddress"><b> Location</b><span style="color:#F30206">*</span> </label>
          <input class="form-control" type="text" name="ressaddress" id="ressaddress" placeholder="Location"  />
        </div>

      </div>

      <div class="row">

        <div class="form-group col-sm-4">
          <label for="placeofbirth"><b> Hometown</b><span style="color:#F30206">*</span></label>
          <input class="form-control" type="text" name="placeofbirth" id="placeofbirth" placeholder="Home Town"  />
        </div>

        <div class="form-group col-sm-4">
          <label for="mememail"><b> Email</b><span style="color:#F30206">*</span> </label>
          <input class="form-control" type="email" name="mememail" id="mememail" placeholder="Email"  />
        </div>

        <div class="form-group col-sm-4">
          <label for="profession"><b> Profession</b><span style="color:#F30206">*</span> </label>
          <input class="form-control" type="text" name="profession" id="profession" placeholder="Profession"  />
        </div>

      </div>
            
</div>


            <div class="col-sm-3">
          <div class="row">
            <div class="col-sm-12">

          <label for="passpicture"> <b>Passport Picture</b></label>
          <img src="<?php echo '../media/passportpictures/defaultpic.png'; ?>" id="profile-img-tag" width="200px" height="150px" />
			<input id="profile-img" class="form-control" type="file"  name="passpicture" placeholder="Passport Picture">
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
                  <option value="01">Jan</option>
                  <option value="02">Feb</option>
                  <option value="03">Mar</option>
                  <option value="04">Apr</option>
                  <option value="05">May</option>
                  <option value="06">Jun</option>
                  <option value="07">Jul</option>
                  <option value="08">Aug</option>
                  <option value="09">Sept</option>
                  <option value="10">Oct</option>
                  <option value="11">Nov</option>
                  <option value="12">Dec</option>
                </select>
            </div>
        <div class="form-group col-sm-3">
                <!-- <input id="gender" class="input100" type="text" name="fname" placeholder="Gender"> -->
                <select id="dayy" class="form-control" name="days" data-validate="Day">
                  <option>Day</option>
                  <?php
                                    for($day = 1; $day <= 31; $day++){
                                       echo "<option value = '".$day."'>".$day."</option>";
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
                                            echo "<option value = '".$y."'>".$y."</option>";
                                        }
                                    ?>
                </select>
            </div>

        <div class="form-group col-sm-3">

                            <select id="countrie" class="form-control" name="countries">
							<option value="" > Select Country </option>
                            <?php
                            
                            foreach($countries as $key => $value) {
                            
                            ?>
                            <option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                            <?php
                            
                            }
                            
                            ?>
                            </select>						
        </div>

       <!-- <div class="form-group col-sm-4">
          <label for="placeofbirth"> <b>Date of Birth</b></label>
			<input id="dob" class="form-control datepicker" type="date" name="dob" placeholder="Date of Birth">
        </div>-->
        </div>
         
         
         
          <div class="row">
            <div class="col-sm-12">
      <div class="row">
        <div class="form-group col-sm-3">
          <label for="mothername"><b> Mother's Name</b> </label>
          <input class="form-control" type="text" name="mothername" id="mothername" placeholder="Mother's Name"  />
        </div>
        <div class="form-group col-sm-3">
          <label for="motherhometown"><b> Mother's Hometown</b> </label>
          <input class="form-control" type="text" name="motherhometown" id="motherhometown" placeholder="Mother's Hometown"  />
        </div>
        <div class="form-group col-sm-3">
          <label for="fathername"><b> Father's Name</b> </label>
          <input class="form-control" type="text" name="fathername" id="fathername" placeholder="Father's Name"  />
        </div>
        <div class="form-group col-sm-3">
          <label for="fatherhometown"> <b>Father's Hometown</b></label>
          <input class="form-control" type="text" name="fatherhometown" id="fatherhometown" placeholder="Father's Hometown"  />
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
							<option value="1">Voter ID</option>
							<option value="2">NHIS ID</option>
							<option value="3">Passport</option>
							<option value="4">SSNIT ID</option>
							<option value="5">National ID</option>
                            
						</select>
        </div>

        <div class="form-group col-sm-3">
          <label for="idnumber"><b> ID Number</b></label>
          <input class="form-control" type="text" name="idnumber" id="idnumber" placeholder="ID Number"  />
        </div>

        <div class="form-group col-sm-3">
          <label for="workplace"><b> Place of Work</b> </label>
          <input class="form-control" type="text" name="workplace" id="workplace" placeholder="Place of Work"  />
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
