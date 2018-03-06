<?php
$host = 'localhost';
$user = 'ubuntu';
$pass = 'monkey';
$db = 'Used_Cars';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$sql = "select * from reps";
$result = $mysqli->query($sql);
var_dump($result);
?>