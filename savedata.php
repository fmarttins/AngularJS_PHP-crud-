<?php
include ("dbconn.php");

$data=json_decode(file_get_contents("php://input"));
$id=$dbhandle->real_escape_string($data->id);
$idd=$dbhandle->real_escape_string($data->idd);
$name=$dbhandle->real_escape_string($data->name);

$query="UPDATE tbmyapp SET id = '".$id."',name = '".$name."' WHERE idd ='".$idd."'";
$dbhandle->query($query);

?>