<?php
include ("dbconn.php");
$query="SELECT * FROM tbmyapp"; 
$rs=$dbhandle->query($query);

while($linha=$rs->fetch_assoc()){
	$data[]=$linha;
}

print json_encode($data);
?>