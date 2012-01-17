<?php
	include "class.confirmation.php"
	include "class.registration.php"
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	echo "blah";
#	/* register() function inserts a new row into the table 'registration'*/
#	function register($teamId,$teamName,$collegeName,$teamLeader,$emailId,$phoneNo,$password) {
#		$obj = new registration($teamId,$teamName,$collegeName,$teamLeader,$emailId,$phoneNo,$password);
#	}
#	
#	/* viewRegistration() function helps you view all the details of the team who registered
#		with teamId */
#	function viewRegistration($teamId) {
#		$obj = new registration($teamId);
#		return json_encode($obj -> resourcevar);
#	}
#	
#	function searchRegistration($searchText) {
#		return registration::searchRegisteredTeam($searchText);
#	}
#	
#	function confirmTeam($teamId,$part1,$part2,$part3,$part4) {
#		$obj = new registration($teamId);
#		$objRegn = new confirmation($obj->$teamId,$obj->$teamName,$obj->$collegeName,$obj->$teamLeader,$part1,$part2,$part3,$part4,$obj->$phoneNo);
#	}
?>
