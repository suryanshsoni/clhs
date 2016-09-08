<?php
$localhost="localhost:3306";
$dbusername="root";
$dbpass="leopard";
$db="clhs";

$conn=($GLOBALS["___mysqli_ston"] = mysqli_connect("$localhost",  "$dbusername",  "$dbpass", "$db", "3306")) or die ('Cannot connect to the database because: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));


if($conn){
  
   //echo "connection successful";
}
else
    die("<strong>connection failed<strong>");
 /* To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

