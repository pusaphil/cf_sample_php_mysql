<?php
$services = getenv("VCAP_SERVICES"); 
$services_json = json_decode($services,true);
$mysql_config = $services_json["db-mysql"][0]["credentials"];
$db = $mysql_config["name"];
$host = $mysql_config["hostname"]; 
$port = $mysql_config["port"]; 
$username = $mysql_config["username"];
$password = $mysql_config["password"];

$conn = mysql_connect($host . ':' . $port, $username, $password); if(! $conn ) { die('Could not connect: ' . mysql_error()); } 
mysql_select_db($db);	

$res = mysql_query("SHOW TABLES LIKE \"tbllogin\"");
$num = mysql_num_rows($res);

if($num == 0) {
$sql = 
 "CREATE TABLE `tbllogin` (
  	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  	`username` varchar(45) NOT NULL,
  	`psd` varchar(45) NOT NULL,
  	PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
	"; 
 mysql_query($sql);
}
	
?>
