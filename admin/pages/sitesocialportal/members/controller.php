<?php
    global $id,$fname,$oname,$fullname,$gender,$placeofbirth,$profession,$phoneno,$ressaddress,$mememail,$dob,$countries,$phoneno,$profession,$workplace,$mothername,$motherhometown,$fathername,$fatherhometown,$idtype,$idnumber,$passpicture,$pagestate,$idtyp,$maristatus,$maritalstate,$mailer,$items,$stmtcode;	

include SPATH_LIBRARIES.DS."import.Class.php";


$engine = new engineClass();
$crypt = new cryptCls();
$upload = new importClass();
$actualdate = date('Y-m-d H:i:s');
$actor_id = $session->get("actorid");
	

switch ($viewpage){
	
	
	
    case "savemem":
	#die();

        if (!empty($fname) && !empty($oname) && !empty($gender) && !empty($placeofbirth) && !empty($profession) && !empty($phoneno) && !empty($ressaddress) && !empty($mememail)){
							
				
			//check if Username already exist 
                $stmtuname = $sql->Execute($sql->Prepare("SELECT MEM_USERNAME FROM webmin_membership WHERE MEM_STATUS = '1' AND MEM_USERNAME =".$sql->Param('a').""),array($mememail));
                if ($stmtuname->RecordCount()>0){
					
			$msg = "Unsuccessful. Username already exist!.";
			$status = "error";

				}
				
				else{ 		
			
	
        // die(var_dump(basename($_FILES['passpicture']['name'])));
                $passpicture = $upload->uploadImage($_FILES['passpicture'],SHOST_IMAGES_PASSPIC);
                $passpicture_ext = $_FILES['passpicture']['type'];
				//var_dump($passpicture);

			   $table='webmin_membership';
			   $prefix='KPN'; 
			   $code_column='MEM_GENID';
			   $code_column = strtoupper($code_column);
        $no_prec = 3;#Maximum number of preceding Zeros;
        $pref_len = strlen($prefix);
        $pref_len_m = $pref_len+1;
        $surplus = $no_prec - $pref_len;
        $stmt = $sql->Execute($sql->Prepare("SELECT  MAX(CAST( SUBSTRING({$code_column} FROM {$pref_len_m}) AS UNSIGNED)) AS {$code_column}  FROM {$table} LIMIT 1"));
        print $sql->ErrorMsg();
        if($stmt->RecordCount() > 0){
            $obj = $stmt->FetchNextObject();
            $prev_code = $obj->$code_column;
            $next_code = $prev_code + 1;

            $multiplier = $no_prec - strlen($next_code);
            $multiplier = $multiplier <= 0 ? 0 : $multiplier ;
            $code = str_repeat("0",$multiplier) . $next_code;
        }else{
            $code = str_repeat("0",$no_prec) . 1;
        }
        $membershipid = $prefix.$code;


		$inputpwd = $crypt->loginPassword($mememail,$membershipid);

					#exit();	
					$fullname = $fname.' '.$oname;
					$dob = $years.'-'.$months.'-'.$days;
					
                $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_membership(MEM_GENID,MEM_USERNAME,MEM_PASSWORD,MEM_SURNAME, MEM_OTHERNAMES,MEM_FULLNAME, MEM_GENDER, MEM_DOB,MEM_BDAY,MEM_BMONTH,MEM_BYEAR, MEM_BIRTHPLACE,MEM_MARITALSTATUS, MEM_RESSADD, MEM_COUNTRY, MEM_PHONENO,  MEM_PROFESSION, MEM_WORKPLACE,MEM_MOTHERNAME,MEM_MOTHER_HOMETOWN, MEM_FATHERNAME,MEM_FATHER_HOMETOWN,MEM_IDCARD,MEM_IDCARD_NUMBER,MEM_PASSPICTURE) 
            VALUES (".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').",".$sql->Param('10').",".$sql->Param('11').",".$sql->Param('12').",".$sql->Param('13').",".$sql->Param('14').",".$sql->Param('15').",".$sql->Param('16').",".$sql->Param('17').",".$sql->Param('18').",".$sql->Param('19').",".$sql->Param('20').",".$sql->Param('21').",".$sql->Param('22').",".$sql->Param('23').",".$sql->Param('24').",".$sql->Param('25').")"),
                    array($membershipid,$mememail,$membershipid,$oname,$fname,$fullname,$gender,$dob,$days,$months,$years,$placeofbirth,$maritalstatus,$ressaddress,$countries,$phoneno,$profession,$workplace,$mothername,$motherhometown,$fathername,$fatherhometown,$idtype,$idnumber,$passpicture));
                print $sql->ErrorMsg();
               
			   $veri_pcode=uniqid();
			   
                $stmtusr = $sql->Execute($sql->Prepare("INSERT INTO webmin_users(USR_GENID,USR_SURNAME,USR_OTHERNAME,USR_USERNAME, USR_PASSWORD,USR_EMAIL, USR_ACCESS_LEVEL, USR_STATUS,USR_ACTIVATION_CODE) 
            VALUES (".$sql->Param('1').",".$sql->Param('2').",".$sql->Param('3').",".$sql->Param('4').",".$sql->Param('5').",".$sql->Param('6').",".$sql->Param('7').",".$sql->Param('8').",".$sql->Param('9').")"),
                    array($membershipid,$oname,$fname,$mememail,$inputpwd,$mememail,'1','1',$veri_pcode));
                print $sql->ErrorMsg();
					
					
	 try{
//                        
//                        $mailer->send([$mememail],"Email Verification",
//                            "Thank you for registering as part of Kwahu Professional Netwok. Your Username is : {$mememail} and your Password is : {$membershipid} . Thank You");
//                        $msg = 'Registration successfully. Check Email for verification'; $status = "success";


$to = $memusername;                        
$subject = "KPN Account Validation";
$txt = '<div id=":305" class="a3s aXjCH msg-3472892775465917295"><div class="adM">
</div><u></u>
<div>
<div style="color:transparent;opacity:0;font-size:0px;border:0;max-height:1px;width:1px;margin:0px;padding:0px;border-width:0px!important;display:none!important;line-height:0px!important">
    
    
</div>

<table class="m_-3472892775465917295m_bg_white" width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="m_-3472892775465917295m_w320 m_-3472892775465917295m_pt0" width="580" align="center" style="padding-top:20px">
<table class="m_-3472892775465917295m_w320 m_-3472892775465917295m_b0" height="40" width="580" align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff">
<tbody><tr>
<td class="m_-3472892775465917295m_w280 m_-3472892775465917295m_pl20 m_-3472892775465917295m_pr20 m_-3472892775465917295m_pt20 m_-3472892775465917295m_pb20" width="580" align="left" style="padding:30px 30px 20px 30px">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
<tbody><tr>
<td class="m_-3472892775465917295m_pb25" align="left" valign="bottom" style="padding:0 0 35px 0">
<table class="m_-3472892775465917295m_w280" width="520">
<tbody><tr>
<td class="m_-3472892775465917295m_overflow200 m_-3472892775465917295m_fs21 m_-3472892775465917295m_lh23" style="font-size:32px;line-height:36px;padding:0 0 0 0;font-family:helvetica neue,helvetica,arial,sans-serif;font-weight:bold;color:#444444;max-width:300px;overflow:hidden;text-overflow:ellipsis">
Welcome to <span style="color:#bd081c">Kwahu Professionals Network (KPN)</span>
</td>
<td valign="top">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="m_-3472892775465917295m_h40" align="right" valign="top" height="50">

</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table class="m_-3472892775465917295m_bg_white" width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td width="580" align="center">
<table class="m_-3472892775465917295m_w320" width="580" align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff">
<tbody><tr>
<td width="580" align="center" style="padding-bottom:50px">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color:#ffffff">
<tbody><tr>
<td class="m_-3472892775465917295m_w280 m_-3472892775465917295m_pl20 m_-3472892775465917295m_pr20" width="580" align="center" style="padding:0 30px 0 30px;background-color:#ffffff">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
<tbody><tr>
<td class="m_-3472892775465917295m_h3" align="left" valign="bottom" style="padding:0px 0 40px 0;font-family:helvetica neue,helvetica,arial,sans-serif;font-size:22px;line-height:26px;color:#444444">
Please take a second to active your account by clicking the button below.
</td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td class="m_-3472892775465917295m_w280 m_-3472892775465917295m_pl20 m_-3472892775465917295m_pr20" width="580" align="center" style="padding:0 30px 0 30px;background-color:#ffffff">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
<tbody><tr>
<td class="m_-3472892775465917295m_plr0" align="center" style="padding:0 35px 0 35px">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td align="center" style="padding:14px 20px 14px 20px;background-color:#bd081c;border-radius:4px">
<a class="m_-3472892775465917295m_overflow280" href="https://k-pn.com/web/index.php?action=verify&keys='.base64_encode($mememail).'&code='.$veri_pcode.'" style="font-family:helvetica neue,helvetica,arial,sans-serif;font-weight:bold;font-size:18px;line-height:1.5;color:#ffffff;text-decoration:none;display:block;text-align:center;max-width:400px;overflow:hidden;text-overflow:ellipsis" target="_blank" >
Click to activate your account
</a>
</td>
</tr>
</tbody></table>
</a>
</td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td class="m_-3472892775465917295m_w280 m_-3472892775465917295m_pl20 m_-3472892775465917295m_pr20" width="580" align="center" style="padding:0 30px 0 30px;background-color:#ffffff">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
<tbody><tr>
<td style="height:30px;font-size:30px">
&nbsp;
</td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td class="m_-3472892775465917295m_w280 m_-3472892775465917295m_pl20 m_-3472892775465917295m_pr20" width="580" align="center" style="padding:0 30px 0 30px;background-color:#ffffff">

</td>
</tr>
</tbody></table>
</div></div></div>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: KPN <register@k-pn.com>' . "\r\n";



mail($to,$subject,$txt,$headers);  



                        $msg = 'Registration successfully. Check Email for verification'; $status = "success";
                    

                    }catch (Exception $e){
						echo $e->getMessage();
				        //$logger->error($e->getTraceAsString());
                       $msg = 'Registration successfully. Email Verification Failed '; $status = "error";
                    }
                        $msg = 'Membership Created successful';
                        $status = 'success';
			   			$view ='';
						

           }
}else{
                    $msg = 'Failed: Required Fields cannot be left empty!';
                    $status = 'error';
                }
    break;



        case 'edit':
				
		$stmt = $sql->Execute($sql->Prepare("SELECT * FROM webmin_membership WHERE MEM_ID =".$sql->Param('a')),array($keys));
		print $sql->ErrorMsg();
		if($stmt->RecordCount()>0){

			$editobj = $stmt->FetchNextObject();
			$id = $editobj->MEM_ID;
			$fname = $editobj->MEM_SURNAME;
			$oname = $editobj->MEM_OTHERNAMES;
			$ddob=$editobj->MEM_DOB;
			$bday=$editobj->MEM_BDAY;
			$bmonth=$editobj->MEM_BMONTH;
			$byear=$editobj->MEM_BYEAR;
			$placeofbirth = $editobj->MEM_BIRTHPLACE;
			$maritalstatus = $editobj->MEM_MARITALSTATUS;
			$ressaddress = $editobj->MEM_RESSADD;
			$countrier = $editobj->MEM_COUNTRY;
			$phoneno = $editobj->MEM_PHONENO;
			$profession = $editobj->MEM_PROFESSION;
			$workplace = $editobj->MEM_WORKPLACE;
			$gender = $editobj->MEM_GENDER;
			$mememail = $editobj->MEM_USERNAME;
			$date = $editobj->MEM_INPUTTIME;
			$status = $editobj->MEM_STATUS;
			$mothername = $editobj->MEM_MOTHERNAME;
			$motherhometown = $editobj->MEM_MOTHER_HOMETOWN;
			$fathername = $editobj->MEM_FATHERNAME;
			$fatherhometown = $editobj->MEM_FATHER_HOMETOWN;
			$idtypes = $editobj->MEM_IDCARD;
			$idnumber = $editobj->MEM_IDCARD_NUMBER;
			$passpicture = $editobj->MEM_PASSPICTURE;
			

//				
//				
//				
//				
//				echo 'keys'.$keys;
//                if($keys){
//                $stmt = $sql->Execute($sql->Prepare("SELECT webmin_membership.MEM_ID,webmin_membership.MEM_SURNAME,webmin_membership.MEM_OTHERNAMES,webmin_membership.MEM_DOB,webmin_membership.MEM_BIRTHPLACE,webmin_membership.MEM_MARITALSTATUS,webmin_membership.MEM_RESSADD,webmin_membership.MEM_COUNTRY,webmin_membership.MEM_PHONENO,webmin_membership.MEM_PROFESSION,webmin_membership.MEM_WORKPLACE,webmin_membership.MEM_GENDER,webmin_membership.MEM_USERNAME,webmin_membership.MEM_INPUTTIME,webmin_membership.MEM_STATUS,webmin_membership.MEM_MOTHERNAME,webmin_membership.MEM_MOTHER_HOMETOWN,webmin_membership.MEM_FATHERNAME,webmin_membership.MEM_FATHER_HOMETOWN,webmin_membership.MEM_IDCARD,webmin_membership.MEM_IDCARD_NUMBER ,webmin_membership.MEM_PASSPICTURE  FROM webmin_membership WHERE webmin_pages.MEM_ID = ".$sql->Param('a')." "),array($keys));
//                $editmem = $stmt->FetchNextObject();
//
//              list($id,$fname,$oname,$dob,$placeofbirth,$maritalstatus,$ressaddress,$countries,$phoneno,$profession,$workplace,$gender,$mememail,$date,$status,$mothername,$motherhometown,$fathername,$fatherhometown,$idtype,$idnumber,$passpicture)=array_values($editmem);
//                }else{
//                    $msg = 'Error fetching this page...try again.';
//                    $status = 'info';
//                }
           }
        break;


        case 'updatepage': 
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($keys)){
					
                $passpicturea = $upload->uploadImage($_FILES['passpicturea'],SHOST_IMAGES_PASSPIC);
                $passpicture_ext = $_FILES['passpicturea']['type'];

					
						if(empty($passpicturea)){
					
					$fullname = $fname.' '.$oname;
					
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_membership SET MEM_SURNAME=".$sql->Param('a').",MEM_OTHERNAMES=".$sql->Param('a').",MEM_FULLNAME=".$sql->Param('a').",MEM_USERNAME=".$sql->Param('a').",MEM_GENDER=".$sql->Param('a').",MEM_DOB=".$sql->Param('a').",MEM_BIRTHPLACE=".$sql->Param('a').",MEM_MARITALSTATUS=".$sql->Param('a').",MEM_RESSADD=".$sql->Param('a').",MEM_COUNTRY=".$sql->Param('a').",MEM_PHONENO=".$sql->Param('a').",MEM_PROFESSION=".$sql->Param('a').",MEM_WORKPLACE=".$sql->Param('a').",MEM_MOTHERNAME=".$sql->Param('a').",MEM_MOTHER_HOMETOWN=".$sql->Param('a').",MEM_FATHERNAME=".$sql->Param('a').",MEM_FATHER_HOMETOWN=".$sql->Param('a').",MEM_IDCARD_NUMBER=".$sql->Param('a').",MEM_IDCARD=".$sql->Param('a')." WHERE MEM_ID=".$sql->Param('h')." "),
                    array($oname,$fname,$fullname,$mememail,$gender,$dob,$placeofbirth,$maritalstatus,$ressaddress,$countries,$phoneno,$profession,$workplace,$mothername,$motherhometown,$fathername,$fatherhometown,$idnumber,$idtype,$keys));
                   
			   $veri_pcode=uniqid();
			   
                    $stmtusr = $sql->Execute($sql->Prepare("UPDATE webmin_users SET USR_SURNAME=".$sql->Param('a').",USR_OTHERNAME=".$sql->Param('a').",USR_USERNAME=".$sql->Param('a').",USR_EMAIL=".$sql->Param('a').",USR_ACCESS_LEVEL=".$sql->Param('a').",USR_EMAIL_VERIFICATION=".$sql->Param('a').",USR_ACTIVATION_CODE=".$sql->Param('a')." WHERE MEM_ID=".$sql->Param('h')." "),
                    array($oname,$fname,$mememail,$mememail,'1','1',$veri_pcode,$keys));
				   
						}elseif(!empty($passpicturea)){
							
					$fullname = $fname.' '.$oname;
					
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_membership SET MEM_SURNAME=".$sql->Param('a').",MEM_OTHERNAMES=".$sql->Param('a').",MEM_FULLNAME=".$sql->Param('a').",MEM_USERNAME=".$sql->Param('a').",MEM_GENDER=".$sql->Param('a').",MEM_DOB=".$sql->Param('a').",MEM_BIRTHPLACE=".$sql->Param('a').",MEM_MARITALSTATUS=".$sql->Param('a').",MEM_RESSADD=".$sql->Param('a').",MEM_COUNTRY=".$sql->Param('a').",MEM_PHONENO=".$sql->Param('a').",MEM_PROFESSION=".$sql->Param('a').",MEM_WORKPLACE=".$sql->Param('a').",MEM_MOTHERNAME=".$sql->Param('a').",MEM_MOTHER_HOMETOWN=".$sql->Param('a').",MEM_FATHERNAME=".$sql->Param('a').",MEM_FATHER_HOMETOWN=".$sql->Param('a').",MEM_IDCARD_NUMBER=".$sql->Param('a').",MEM_IDCARD=".$sql->Param('a').",MEM_PASSPICTURE=".$sql->Param('a')." WHERE MEM_ID=".$sql->Param('h')." "),
                    array($oname,$fname,$fullname,$mememail,$gender,$dob,$placeofbirth,$maritalstatus,$ressaddress,$countries,$phoneno,$profession,$workplace,$mothername,$motherhometown,$fathername,$fatherhometown,$idnumber,$idtype,$passpicturea,$keys));
                   
			   $veri_pcode=uniqid();
			   
                    $stmtusr = $sql->Execute($sql->Prepare("UPDATE webmin_users SET USR_SURNAME=".$sql->Param('a').",USR_OTHERNAME=".$sql->Param('a').",USR_USERNAME=".$sql->Param('a').",USR_EMAIL=".$sql->Param('a').",USR_ACCESS_LEVEL=".$sql->Param('a').",USR_EMAIL_VERIFICATION=".$sql->Param('a').",USR_ACTIVATION_CODE=".$sql->Param('a')." WHERE MEM_ID=".$sql->Param('h')." "),
                    array($oname,$fname,$mememail,$mememail,'1','1',$veri_pcode,$keys));
							
							}
				   
				   
				    if($stmt == true){
                        $msg = 'Updated successfully';
                        $status = 'success';
                    }else{
                        $msg = $sql->errorMsg();
                        $status = 'error';
                    }
                }else{
                    $msg = 'Please fill all required fields and try again';
                    $status = 'info';
                }
            }
        break;


        case 'delete':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_membership SET MEM_STATUS='0' WHERE MEM_ID = ".$sql->Param('b')." "),array($keys));
                if($stmt == true){
                    $msg = 'Deleted successfully';
                    $status = 'success';
                }else{
                    $msg = $sql->errorMsg();
                    $status = 'error';
                }
            }
        break;




}

    $listmem = $sql->Execute($sql->Prepare("SELECT webmin_membership.MEM_ID,webmin_membership.MEM_FULLNAME,webmin_membership.MEM_GENDER,webmin_membership.MEM_PHONENO,webmin_membership.MEM_USERNAME,webmin_membership.MEM_INPUTTIME,webmin_membership.MEM_STATUS FROM webmin_membership WHERE webmin_membership.MEM_STATUS !='0' "));
    // GET MEMBERS

$countries  = array("AF" => "Afghanistan", "AL" => "Albania", "DZ" => "Algeria", "AS" => "American Samoa", "AD" => "Andorra", "AO" => "Angola", "AI" => "Anguilla", "AQ" => "Antarctica", "AG" => "Antigua and Barbuda", "AR" => "Argentina", "AM" => "Armenia", "AW" => "Aruba", "AU" => "Australia", "AT" => "Austria", "AZ" => "Azerbaijan", "AX" => "Åland Islands", "BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados", "BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin", "BM" => "Bermuda", "BT" => "Bhutan", "BO" => "Bolivia", "BA" => "Bosnia and Herzegovina", "BW" => "Botswana", "BV" => "Bouvet Island", "BR" => "Brazil", "BQ" => "British Antarctic Territory", "IO" => "British Indian Ocean Territory", "VG" => "British Virgin Islands", "BN" => "Brunei", "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon", "CA" => "Canada", "CT" => "Canton and Enderbury Islands", "CV" => "Cape Verde", "KY" => "Cayman Islands", "CF" => "Central African Republic", "TD" => "Chad", "CL" => "Chile", "CN" => "China", "CX" => "Christmas Island", "CC" => "Cocos [Keeling] Islands", "CO" => "Colombia", "KM" => "Comoros", "CG" => "Congo - Brazzaville", "CD" => "Congo - Kinshasa", "CK" => "Cook Islands", "CR" => "Costa Rica", "HR" => "Croatia", "CU" => "Cuba", "CY" => "Cyprus", "CZ" => "Czech Republic", "CI" => "Côte d’Ivoire", "DK" => "Denmark", "DJ" => "Djibouti", "DM" => "Dominica", "DO" => "Dominican Republic", "NQ" => "Dronning Maud Land", "DD" => "East Germany", "EC" => "Ecuador", "EG" => "Egypt", "SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia", "ET" => "Ethiopia", "FK" => "Falkland Islands", "FO" => "Faroe Islands", "FJ" => "Fiji", "FI" => "Finland", "FR" => "France", "GF" => "French Guiana", "PF" => "French Polynesia", "TF" => "French Southern Territories", "FQ" => "French Southern and Antarctic Territories", "GA" => "Gabon", "GM" => "Gambia", "GE" => "Georgia", "DE" => "Germany", "GH" => "Ghana", "GI" => "Gibraltar", "GR" => "Greece", "GL" => "Greenland", "GD" => "Grenada", "GP" => "Guadeloupe", "GU" => "Guam", "GT" => "Guatemala", "GG" => "Guernsey", "GN" => "Guinea", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HT" => "Haiti", "HM" => "Heard Island and McDonald Islands", "HN" => "Honduras", "HK" => "Hong Kong SAR China", "HU" => "Hungary", "IS" => "Iceland", "IN" => "India", "ID" => "Indonesia", "IR" => "Iran", "IQ" => "Iraq", "IE" => "Ireland", "IM" => "Isle of Man", "IL" => "Israel", "IT" => "Italy", "JM" => "Jamaica", "JP" => "Japan", "JE" => "Jersey", "JT" => "Johnston Island", "JO" => "Jordan", "KZ" => "Kazakhstan", "KE" => "Kenya", "KI" => "Kiribati", "KW" => "Kuwait", "KG" => "Kyrgyzstan", "LA" => "Laos", "LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia", "LY" => "Libya", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg", "MO" => "Macau SAR China", "MK" => "Macedonia", "MG" => "Madagascar", "MW" => "Malawi", "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta", "MH" => "Marshall Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MU" => "Mauritius", "YT" => "Mayotte", "FX" => "Metropolitan France", "MX" => "Mexico", "FM" => "Micronesia", "MI" => "Midway Islands", "MD" => "Moldova", "MC" => "Monaco", "MN" => "Mongolia", "ME" => "Montenegro", "MS" => "Montserrat", "MA" => "Morocco", "MZ" => "Mozambique", "MM" => "Myanmar [Burma]", "NA" => "Namibia", "NR" => "Nauru", "NP" => "Nepal", "NL" => "Netherlands", "AN" => "Netherlands Antilles", "NT" => "Neutral Zone", "NC" => "New Caledonia", "NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria", "NU" => "Niue", "NF" => "Norfolk Island", "KP" => "North Korea", "VD" => "North Vietnam", "MP" => "Northern Mariana Islands", "NO" => "Norway", "OM" => "Oman", "PC" => "Pacific Islands Trust Territory", "PK" => "Pakistan", "PW" => "Palau", "PS" => "Palestinian Territories", "PA" => "Panama", "PZ" => "Panama Canal Zone", "PG" => "Papua New Guinea", "PY" => "Paraguay", "YD" => "People's Democratic Republic of Yemen", "PE" => "Peru", "PH" => "Philippines", "PN" => "Pitcairn Islands", "PL" => "Poland", "PT" => "Portugal", "PR" => "Puerto Rico", "QA" => "Qatar", "RO" => "Romania", "RU" => "Russia", "RW" => "Rwanda", "RE" => "Réunion", "BL" => "Saint Barthélemy", "SH" => "Saint Helena", "KN" => "Saint Kitts and Nevis", "LC" => "Saint Lucia", "MF" => "Saint Martin", "PM" => "Saint Pierre and Miquelon", "VC" => "Saint Vincent and the Grenadines", "WS" => "Samoa", "SM" => "San Marino", "SA" => "Saudi Arabia", "SN" => "Senegal", "RS" => "Serbia", "CS" => "Serbia and Montenegro", "SC" => "Seychelles", "SL" => "Sierra Leone", "SG" => "Singapore", "SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands", "SO" => "Somalia", "ZA" => "South Africa", "GS" => "South Georgia and the South Sandwich Islands", "KR" => "South Korea", "ES" => "Spain", "LK" => "Sri Lanka", "SD" => "Sudan", "SR" => "Suriname", "SJ" => "Svalbard and Jan Mayen", "SZ" => "Swaziland", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syria", "ST" => "São Tomé and Príncipe", "TW" => "Taiwan", "TJ" => "Tajikistan", "TZ" => "Tanzania", "TH" => "Thailand", "TL" => "Timor-Leste", "TG" => "Togo", "TK" => "Tokelau", "TO" => "Tonga", "TT" => "Trinidad and Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TM" => "Turkmenistan", "TC" => "Turks and Caicos Islands", "TV" => "Tuvalu", "UM" => "U.S. Minor Outlying Islands", "PU" => "U.S. Miscellaneous Pacific Islands", "VI" => "U.S. Virgin Islands", "UG" => "Uganda", "UA" => "Ukraine", "SU" => "Union of Soviet Socialist Republics", "AE" => "United Arab Emirates", "GB" => "United Kingdom", "US" => "United States", "ZZ" => "Unknown or Invalid Region", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VU" => "Vanuatu", "VA" => "Vatican City", "VE" => "Venezuela", "VN" => "Vietnam", "WK" => "Wake Island", "WF" => "Wallis and Futuna", "EH" => "Western Sahara", "YE" => "Yemen", "ZM" => "Zambia", "ZW" => "Zimbabwe");


    
?>