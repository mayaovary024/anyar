<?php
$dbserver = 'localhost';
$dbuser = 'root'; 
$dbpass = '';  
$db = 'coba'; 
$connect =  mysql_connect($dbserver, $dbuser, $dbpass);

if (!$connect){
    echo 'Not Connected!!';
}
else{
    mysql_select_db($db, $connect);  
}
?>