<?php
session_start();
require 'config.php';

$user=  isloggedin();
if($user){
    $expires=  time()+60*15;
    mysql_query("update active_users set expires ='".$expires."' where user=".$user.";");  
 
}
function isloggedin(){
    
    $sessid = mysql_real_escape_string(session_id());
    $hash=  mysql_real_escape_string(hash("sha512",$sessid.$_SERVER['HTTP_USER_AGENT']));
        
   $query="select user from active_users where session_id='".$sessid."' and hash='".$hash."' and expires >'".  time()."';";
   //print($query);
   $exec_query=  mysql_query($query);
   if($exec_query===false)
       print "Error is ".mysql_error ();
   if(mysql_num_rows($exec_query)){
       $data=  mysql_fetch_assoc($exec_query);
      return $data['user'];
      
   }else
       return false;
    
}

function getuserdetails(){
   $user=  isloggedin();
    if($user){
    $query=mysql_query("select * from users where id=".(int) $user.";");
    return mysql_fetch_assoc($query);
    
    }
    else
        return false;
}
function getuser(){
    $user=  isloggedin();
    if($user){
    $query=mysql_query("select name,password from users where id=".(int) $user.";");
    return mysql_fetch_assoc($query);
    
    }
    else
        return false;
    
    
}

function getstudent($name){
   $query= "select *from students where name like '%".$name."%' or roomno like '%".$name."%';";
   //echo $query;
   $query=mysql_query($query);
   return $query;
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


