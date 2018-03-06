<?php
include 'usedCarDB.inc'

if (!isset($_POST))
{
	$msg = "NO POST MESSAGE SET";
	echo json_encode($msg);
	exit(0);
}

$usr = $_POST['usr'];
$pass = $_POST['pass'];

if (validateRep($user, $pass))
{
    if (determineUser($user))
    {
        return "rep";
    }
    else
    {
        return "owner";
    }
}







?>