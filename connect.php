<?php

$localhost	= "sql202.infinityfree.com";
$username	= "if0_39243473";
$password	= "I4w9pkAeWaY";
$dbname		= "if0_39243473_muafa";

$con = new mysqli($localhost, $username, $password, $dbname);

if($con->connect_error) {
	die("connection failed : " . $conn->connect_error);
}
