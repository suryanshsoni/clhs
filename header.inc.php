<?php
session_start();
require 'config.php';

$user=  isloggedin();
if($user){
    $expires=  time()+60*15;
    mysqli_query($GLOBALS["___mysqli_ston"], "update active_users set expires ='".$expires."' where user=".$user.";");  
 
}
function isloggedin(){
    
    $sessid = mysqli_real_escape_string($GLOBALS["___mysqli_ston"],session_id());
    $hash=  mysqli_real_escape_string($GLOBALS["___mysqli_ston"],hash("sha512",$sessid.$_SERVER['HTTP_USER_AGENT']));
        
   $query="select user from active_users where session_id='".$sessid."' and hash='".$hash."' and expires >'".  time()."';";
   //print($query);
   $exec_query=  mysqli_query($GLOBALS["___mysqli_ston"], $query);
   if($exec_query===false)
       print "Error is ".((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false));
   if(mysqli_num_rows($exec_query)){
       $data=  mysqli_fetch_assoc($exec_query);
      return $data['user'];
      
   }else
       return false;
    
}

function getuserdetails(){
   $user=  isloggedin();
    if($user){
    $query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where id=".(int) $user.";");
    return mysqli_fetch_assoc($query);
    
    }
    else
        return false;
}
function getuser(){
    $user=  isloggedin();
    if($user){
    $query=mysqli_query($GLOBALS["___mysqli_ston"], "select name,password from users where id=".(int) $user.";");
    return mysqli_fetch_assoc($query);
    
    }
    else
        return false;
    
    
}

function getstudent($name){
   $query= "select *from students where name like '%".$name."%' or roomno like '%".$name."%';";
   //echo $query;
   $query=mysqli_query($GLOBALS["___mysqli_ston"], $query);
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


