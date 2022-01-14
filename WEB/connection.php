<?php
$link = mysqli_connect($DB_HOST, $DB_ID, $DB_PW, $DB_NAME) or die("Could not connect.");

if(!$link) 

	die("database conn error");

if(!mysqli_select_db($link,"sms"))

 	die("No database selected.");
?>
