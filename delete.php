<?php
include ("dbconn.php");

$data=json_decode(file_get_contents("php://input"));
$id=$data->id;

$query="DELETE FROM tbmyapp WHERE id=".$id; 

$dbhandle->query($query);

?>