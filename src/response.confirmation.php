<?php

	include "interface.php"
	
	/* This function returns the json encoded form of confirmation
		details of a particular team with teamId */
	if (isset($_POST['teamId'])) {
		return jaosn_encode(getTeamDetails($_POST['teamId']));
	}

	/* This function inserts details of confirmed teams into the
		confirmation table */
	if (isset($_POST['teamId']))
?>
