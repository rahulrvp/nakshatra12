<?php

//	echo "reg class before";
	include_once 'database.php';
//	echo "reg class";
	class registration {
		private $teamId,$teamName,$collegeName,$teamLeader,$emailId,$phoneNo,$password,$resourcevar;
		
		public function __construct() {
			$a = func_get_args();
			$i = func_num_args(); 
			if($i==1)
				call_user_func_array(array($this,'viewRegistration'),$a);
			if($i==7)
				call_user_func_array(array($this,'registerTeam'),$a);
		}
		public function __destruct() {}
		
		/* fuction to insert registration details into the table.*/
		function registerTeam($cTeamId,$cTeamName,$cCollegeName,$cTeamLeader,$cEmailId,$cPhoneNo,$cPassword) {
			$this->teamId = pg_escape_string($cTeamId);
			$this->teamName = pg_escape_string($cTeamName);
			$this->collegeName = pg_escape_string($cCollegeName);
			$this->teamLeader = pg_escape_string($cTeamLeader);
			$this->emailId = pg_escape_string($cEmailId);
			$this->phoneNo = pg_escape_string($cPhoneNo);
			$this->password = pg_escape_string($cPassword);
			$query = "insert into registration values (
						'".$this->teamId."',
						'".$this->teamName."',
						'".$this->collegeName."',
						'".$this->teamLeader."',
						'".$this->emailId."',
						'".$this->phoneNo."'
						'".$this->password."')";
			dbquery($query);
		}

		/* This fuction returns all the rows by taking the team ID*/
		function viewRegistration($teamId) {
			$qry = "select * from registration where teamid = '".$teamId."'";
			$res = dbquery($qry);
			$this->resourcevar = (resource2array($res));
			$res = dbquery($qry);
			$rec = pg_fetch_row($res);
			$this->teamId = $rec[0];
			$this->teamName = $rec[1];
			$this->collegeName = $rec[2];
			$this->teamLeader = $rec[3];
			$this->emailId = $rec[4];
			$this->phoneNo = $rec[5];
			$this->password = $rec[6];
		}
		
		public function getResourceArray() {
			return $this->resourcevar;
		}
		
		/* function to retuen the resourcevar after searching in the table for contents that matches.*/
		public static function searchRegisteredTeam($arg) {
			$arg='%'.$arg.'%';
			$qry = "select * from registration where 
						(teamname like '".$arg."') OR 
						(teamid like '".$arg."') OR 
						(teamleader like '".$arg."')";
						
			return (resource2array(dbquery($qry)));
		}
	}
?>
