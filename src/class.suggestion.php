<?php

	include_once 'database.php';
	class suggestion {
		private $slNo,$time,$name,$emailId,$msg,$resourcevar;
		
		public function __construct() {
			$a = func_get_args();
			$i = func_num_args(); 
			if($i==1)
				call_user_func_array(array($this,'viewSuggestion'),$a);
			if($i==3)
				call_user_func_array(array($this,'saveSuggestion'),$a);
		}
		public function __destruct() {}
		
		/* fuction to insert suggestion details into the table.*/
		function saveSuggestion($sName,$sEmailId,$sMsg) {
			$this->name = pg_escape_string($sName);
			$this->emailId = pg_escape_string($sEmailId);
			$this->msg = pg_escape_string($sMsg);
			$query = "insert into suggestion (name,emailid,msg) values (
						'".$this->name."',
						'".$this->emailId."',
						'".$this->msg."')";
			dbquery($query);
		}

		/* This fuction returns all the rows by taking the Sl No*/
		function viewSuggestion($key) {
			$qry = "select * from suggestion where slNo = '".$key."'";
			$res = dbquery($qry);
			$this->resourcevar = (resource2array($res));
			$res = dbquery($qry);
			$rec = pg_fetch_row($res);
			$this->slNo = $rec[0];
			$this->time = $rec[1];
			$this->name = $rec[2];
			$this->emailid = $rec[3];
			$this->msg = $rec[4];
		}
		
		public function getResourceArray() {
			return $this->resourcevar;
		}
		
		public static function searchSuggestion($arg) {
			$arg='%'.$arg.'%';
			$qry = "select * from suggestion where 
						(name like '".$arg."') OR 
						(emailid like '".$arg."') OR 
						(msg like '".$arg."')";
			return (resource2array(dbquery($qry)));
		}
	}
?>
