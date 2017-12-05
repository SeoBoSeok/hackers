<?php

error_reporting(E_ALL^ E_NOTICE); 
ini_set("display_errors", 1); 
@session_start(); 
$connect = mysql_connect('localhost', 'root', 'localhost'); 
mysql_query("set names 'euckr'"); 
mysql_select_db('test' ,$connect);

?>