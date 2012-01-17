<?php

	include_once 'database.php';
	echo "clss.conf";
	class confirmation {
		private $teamId,$teamName,$collegeName,$teamLeader,$participant1,$participant2,$participant3,$participant4,$phoneNo,$resourcevar;
		
		public function __construct() {
			$a = func_get_args();
			$i = func_num_args(); 
			if($i==1)
				call_user_func_array(array($this,'viewConfirmation'),$a);
			if($i==9)
				call_user_func_array(array($this,'confirmTeam'),$a);
		}
		public function __destruct() {}
		
		/* fuction to insert confirmation details into the table.*/
		function confirmTeam($cTeamId,$cTeamName,$cCollegeName,$cTeamLeader,$cParticipant1,$cParticipant2,$cParticipant3,$cParticipant4,$cPhoneNo) {
			$this->teamId = pg_escape_string($cTeamId);
			$this->teamName = pg_escape_string($cTeamName);
			$this->collegeName = pg_escape_string($cCollegeName);
			$this->teamLeader = pg_escape_string($cTeamLeader);
			$this->participant1 = pg_escape_string($cParticipant1);
			$this->participant2 = pg_escape_string($cParticipant2);
			$this->participant3 = pg_escape_string($cParticipant3);
			$this->participant4 = pg_escape_string($cParticipant4);
			$this->phoneNo = pg_escape_string($cPhoneNo);
			$query = "insert into confirmation values (
						'".$this->teamId."',
						'".$this->teamName."',
						'".$this->collegeName."',
						'".$this->teamLeader."',
						'".$this->participant1."',
						'".$this->participant2."',
						'".$this->participant3."',
						'".$this->participant4."',
						'".$this->phoneNo."')";
			dbquery($query);
		}
		
		/* This fuction returns all the rows by taking the team ID*/
		function viewConfirmation($teamId) {
			$qry = "select * from confirmation where teamid='".$teamId."'";
			$res = dbquery($qry);
			$this->resourcevar = (resource2array($res));
			$res = dbquery($qry);
			$rec = pg_fetch_row($res);
			$this->teamId = $rec[0];
			$this->teamName = $rec[1];
			$this->collegeName = $rec[2];
			$this->teamLeader = $rec[3];
			$this->participant1 = $rec[4];
			$this->participant2 = $rec[5];
			$this->participant3 = $rec[6];
			$this->participant4 = $rec[7];
			$this->phoneNo = $rec[8];
		}
		public function getResourceArray() {
			return $this->resourcevar;
		}
		
		/* function to retuen the resourcevar after searching in the table for contents that matches.*/
		public static function searchConfirmedTeam($arg) {
			$arg='%'.$arg.'%';
			$qry = "select * from confirmation where 
						(teamname like '".$arg."') OR 
						(teamid like '".$arg."') OR 
						(teamleader like '".$arg."')";
						
			return (resource2array(dbquery($qry)));
		}
	}
?>
