<?php
$host="localhost";
$user="root";
$pass="";
$dbc = mysql_connect("$host","$user","$pass");
if(!$dbc){
die("NOT CONNECTED:" . mysql_error());
}
//select database
$db_select =mysql_select_db("employee",$dbc);
if(!$db_select){
die("cant connect :" . mysql_error());
}

?>
 

 