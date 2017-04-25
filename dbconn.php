<?php

define("HOSTNAME", "localhost");
define("USERNAME", "ifernand_angular");
define("PASSWORD", "##4ng8l4r!!");
define("DATEBASE", "ifernand_angulartest");

$dbhandle=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATEBASE)or die("erro");

?>