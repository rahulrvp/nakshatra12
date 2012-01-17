<?php
	include "interface.php"
	error_reporting(E_ALL);
		ini_set('display_errors', '1');

	echo "bla";
#	if (isset($_POST['teamId'])) {
#		echo viewRegistration($_POST['temId']);
#	}
#	
#	if (isset($_POST['search'])) {
#		echo searchRegistration($_POST['search']);
#	}

	if (isset($_POST['teamID']) &&
		 isset($_POST['teamName']) &&
		 isset($_POST['collegeName']) &&
		 isset($_POST['teamLeader']) &&
		 isset($_POST['emailId']) &&
		 isset($_POST['phoneNo']) &&
		 isset($_POST['passwd']) &&
		 isset($_POST['cpasswd']) ) {
		 echo "in";
			echo register($_POST['teamID'],$_POST['teamName'],$_POST['collegeName'],$_POST['teamLeader'],$_POST['emailId'],$_POST['phoneNo'],$_POST['passwd']);
		}
	
?>
