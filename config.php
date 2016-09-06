<?php
$path="localhost:3309";
$username="root";
$password="leopard";
$dbname="clhs";

$dbconn=  mysql_connect($path,$username,$password);

if($dbconn){
  
    mysql_select_db($dbname);
    
    //echo "connection successful";
}
else
    die("<strong>connection failed<strong>");
 /* To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

