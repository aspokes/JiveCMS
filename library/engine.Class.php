<?php
class engineClass{
	public  $sql;
	public $session;
	public $phpmailer;
	function  __construct() {
			global $sql,$session,$phpmailer;
			$this->session= $session;
			$this->sql = $sql;
			$this->phpmailer = $phpmailer;
	}
	
	public function concatmoney($num){
		if($num>1000000000000) {
			return round(($num/1000000000000),1).' tri';
		}else if($num>1000000000){ return round(($num/1000000000),1).' bil';
		}else if($num>1000000) {return round(($num/1000000),1).' mil';
		}else if($num>1000){ return round(($num/1000),1).' k';
		}
		return number_format($num);
	}// end of money abreviation function 

	public function getActorDetails(){
		$actor_id = $this->session->get("actorid");
		$branchcode = $this->session->get("branchcode");
		$churchcode = $this->session->get("churchcode");
		$stmt = $this->sql->Prepare("SELECT * FROM church_users WHERE USR_ID = ".$this->sql->Param('a')." AND USR_BRAN_CODE=".$this->sql->Param('b')." AND USR_CHUR_CODE=".$this->sql->Param('c')." ");
		$stmt = $this->sql->Execute($stmt,array($actor_id,$branchcode,$churchcode));
		if($stmt && ($stmt->RecordCount() > 0)){
		 	return $stmt->FetchNextObject();
		}else{
			return false;
		}
	}//end of getActorsDetails


	public function msgBox($msg,$status){
		if(!empty($status)){
			if($status == "success"){
				echo '<div class="alert alert-success"> '.$msg.'</div>';
			}elseif($status == "info"){
				echo '<div class="alert alert-info"> '.$msg.'</div>';
			}else{
				 echo '<div class="alert alert-danger"> '.$msg.'</div>';
			}
		}
	}

	public function validatePostForm($microtime){
     	$postkey = $this->session->get('postkey');
     	if(empty($postkey)){
     		$postkey = 2;
     	}
     	if($postkey != $microtime){
     		if($postkey == 2){
     			$this->session->set('postkey',$microtime);
     		}else{
                 $this->session->del('postkey');
                 $this->session->set('postkey',$microtime);
             }
     		return true;
     	}else{
     		return false;
     	}
    }

	public function readMore($string,$txtcount){
		 $string = strip_tags($string);

		if (strlen($string) > $txtcount) {

			// truncate string
			$stringCut = substr($string, 0, $txtcount);

			// make sure it ends in a word so assassinate doesn't become ass...
			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
		}
		return $string;
	}
	
	public function generateNameforClientPhoto($clientname){
        $rand_numb = md5(uniqid(microtime()));
        $neu_name = $rand_numb.$clientname;
        return $neu_name;
    }
	
	public function generateApiKey(){
		$length = '64';
		$token = bin2hex(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,$length));
		return $token;
	}

	public function generateCode($table, $prefix, $code_column){
        $code_column = strtoupper($code_column);
        $final = uniqid($prefix) ;
        #check if code already exists
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT {$code_column}  FROM {$table} WHERE {$code_column}={$this->sql->Param('a')} LIMIT 1"),[$final]);
        if($stmt->RecordCount()>0){
            return  $this->generateCode($table, $prefix, $code_column);
        }
        
        return $final ;
    }
	 
	// The function gets Agent Code
	public function getMemberID(){
		$items= 'COL';
		$stmt = $this->sql->Execute($this->sql->Prepare("SELECT MEM_GENID FROM webmin_membership ORDER BY MEM_ID DESC LIMIT 1 "));
		print $this->sql->ErrorMsg();

		if($stmt->RecordCount() > 0){
			$obj = $stmt->FetchNextObject();
			$order = substr($obj->MEM_GENID,3,10000);
			$order = $order + 1;
			if(strlen($order) == 1){
				$orderno = $items.'000'.$order;
			}else if(strlen($order) == 2){
				$orderno = $items.'00'.$order;
			}else if(strlen($order) == 3){
				$orderno = $items.'0'.$order;
			}else{
				$orderno = $items.$order;
			}
		}else{
			$orderno = $items.'0001';
		}
	}

	public function getProductCode(){
		$items= 'PRD';
		$stmt = $this->sql->Execute($this->sql->Prepare("SELECT PROD_CODE FROM webmin_products ORDER BY PROD_ID DESC LIMIT 1 "));
		print $this->sql->ErrorMsg();
		if($stmt->RecordCount() > 0){
			$obj = $stmt->FetchNextObject();
			$order = substr($obj->PROD_CODE,3,10000);
			$order = $order + 1;
			if(strlen($order) == 1){
				$orderno = $items.'000'.$order;
			}else if(strlen($order) == 2){
				$orderno = $items.'00'.$order;
			}else if(strlen($order) == 3){
				$orderno = $items.'0'.$order;
			}else{
				$orderno = $items.$order;
			}
		}else{
			$orderno = $items.'0001';
		}
		return $orderno;
	}


	public function getTransactionCode(){
		$items= 'TRX';
		$stmt = $this->sql->Execute($this->sql->Prepare("SELECT TX_CODE FROM webmin_transactions ORDER BY TX_ID DESC LIMIT 1 "));
		print $this->sql->ErrorMsg();
		if($stmt->RecordCount() > 0){
			$obj = $stmt->FetchNextObject();
			$order = substr($obj->TX_CODE,3,10000);
			$order = $order + 1;
			if(strlen($order) == 1){
				$orderno = $items.'000'.$order;
			}else if(strlen($order) == 2){
				$orderno = $items.'00'.$order;
			}else if(strlen($order) == 3){
				$orderno = $items.'0'.$order;
			}else{
				$orderno = $items.$order;
			}
		}else{
			$orderno = $items.'0001';
		}
		return $orderno;
	}
	 
}
