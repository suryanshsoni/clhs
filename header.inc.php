<?php
session_start();
require 'config.php';

$GLOBALS["leagueid"]=1;

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
       print "Error is ".(($___mysqli_res = mysqli_connect_error()));
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
    //print $query;    
    return mysqli_fetch_assoc($query);
    
    }
    else
        return false;
 }

function getplayer($name){
   $query= "select * from players where p_name like '%".$name."%';";
   
   //echo $query;
   $query=mysqli_query($GLOBALS["___mysqli_ston"], $query);
   return $query;
}

function getteam($name,$league){
   $query= "select * from teams where t_name like '%".$name."%' and t_league_id=".$league.";";
   
   //echo $query;
   $query=mysqli_query($GLOBALS["___mysqli_ston"], $query);
   return $query;
}

function getground($name){
   $query= "select * from grounds where g_name like '%".$name."%';";
   
   //echo $query;
   $query=mysqli_query($GLOBALS["___mysqli_ston"], $query);
   return $query;
}

function getumpire($name){
   $query= "select * from umpires where u_name like '%".$name."%';";
   
   //echo $query;
   $query=mysqli_query($GLOBALS["___mysqli_ston"], $query);
   return $query;
}

function getleague($name){
   $query= "select * from leagues where l_name like '%".$name."%';";
   
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


