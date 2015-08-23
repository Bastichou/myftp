<?php
echo "TEST Page..\n";

#$connect = ftp_connect("front148.sdbx.co") or die("Connect failed");
$login = ftp_login(ftp_connect("front148.sdbx.co"),"Bastichou95","sdb55FTW42") or die("login failed");
echo $login;

$data = ftp_rawlist(ftp_connect("front148.sdbx.co"),"/");

echo $data;
//if(is_array($data)) {
//	echo "ARRAY";
//} else {
//	echo "NO ARRAY";
//}
?>
