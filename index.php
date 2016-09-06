<?php
require 'header.inc.php';
if($data=isloggedin()){
    header ("Location: ./admin_home.php");
    exit;
  
}

?>      
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" type="image/ico" href="favicon.ico">

    <!-- Bootstrap -->
    <link href="src/css/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <title>
        Cricket league Hosting System
    </title>
    <style>
        .jumbotron {
            position: relative;
            background: url("resources/hostel.jpg") no-repeat center center;
            width:100%;
            height: 300px;
            background-size: 100% 100%;
            background-size: cover;
  
}

        </style>
    </head>
    <body>
        <header>
          
            
            <div class="jumbotron" >
                <div class="container" style="padding-top:2px;">
                    <div class="row">
                        <div class="col-lg-4">
                            <!--This name can be changed in the later stages of the project-->
                    <h1 style="font-family:Roboto;">CricScorer</h1>
                        </div>
                        <div >
                            <h2 class="pull-right" style="font-family:Open-Sans;">Cricket League Hosting System</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
       
        <div class="container text-center" style="padding-top:2px;">
            <?php
       
        $correct_password=FALSE;
        
        if(isset($_POST['submitbtn'])){
           
            if(!isset($_POST['username']))
                die("Error: Enter the username");
            else if(!isset($_POST['password']))
                 die("Error: Enter the password");
           $query=("select id from users where username='".mysql_real_escape_string($_POST['username'])."' and password ='".mysql_real_escape_string(sha1($_POST['password']))."';");
            
          // print($query);
          // print(sha1($_POST['password']));
           $execquery=  mysql_query($query);
           if(mysql_num_rows($execquery)){
               
                $sessid= mysql_real_escape_string(session_id());
                $hash=  mysql_real_escape_string(hash("sha512",$sessid.$_SERVER['HTTP_USER_AGENT']));
                $userdata = mysql_fetch_assoc(mysql_query($query));
                $expires=time()+(15*60);
                $query2 ="insert into active_users(user,session_id,hash,expires) values('".$userdata['id']."','".$sessid."','".$hash."',".$expires.");" ;
                //print($query2);
                mysql_query($query2);
//                
                //print("logged in successfilly");
                header ("Location: ./admin_home.php");
                    exit;
           }
               
            else{
            print("<div style='color:red;'>Incorrect Username or Password</div>");
            //header ("Location: index.php");
            //exit;
             }
           }
    else
        print("<br>");
               
        
?>
           
            <div class="form-group">
                <form id="loginform" class="col-lg-4 col-lg-offset-4" method="post" action="">
                    <strong>Login to Continue</strong>
                    <hr>
                  <div class="form-group input-group"> 
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" name="username" placeholder="Enter username">
                  </div>
                  <div class="form-group input-group">
                      <span class="input-group-addon"><icon class="fa fa-key"></icon></span>
                       <input type="password" class="form-control" name="password" placeholder="Enter Password">
                  </div> 
                 <button type="submit" name="submitbtn" class="btn btn-primary">Login</button>
                 <a href="forgotpassword.php">  Forgot Password?</a>
             </form>
                 
            </div>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="src/css/bootstrap-3.3.6-dist/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="src/css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </body>
</html>
