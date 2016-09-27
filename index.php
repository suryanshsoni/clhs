<?php
require 'header.inc.php';
if($data=isloggedin()){
    header ("Location: ./admin_home.php");
    exit;
}
$correct_password=FALSE;
if(isset($_POST['submitbtn'])){
if(!isset($_POST['username']))
die("Error: Enter the username");
else if(!isset($_POST['password']))
die("Error: Enter the password");
$query=("select id from users where username='". mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']) ."' and password ='". mysqli_real_escape_string($GLOBALS["___mysqli_ston"], sha1($_POST['password'])) ."';");
$execquery=  mysqli_query($GLOBALS["___mysqli_ston"], $query);
if(mysqli_num_rows($execquery)){

$sessid=  mysqli_real_escape_string($GLOBALS["___mysqli_ston"], session_id()) ;
$hash=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], hash("sha512",$sessid.$_SERVER['HTTP_USER_AGENT'])) ;
$userdata = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $query));
$expires=time()+(15*60);
$query2 ="insert into active_users(user,session_id,hash,expires) values('".$userdata['id']."','".$sessid."','".$hash."',".$expires.");" ;
//print($query2);
mysqli_query($GLOBALS["___mysqli_ston"], $query2);

echo '<script type="text/javascript">';
echo 'window.location.href="./admin_home.php"';
echo '</script>';
exit;
}
else{
print("invalid");
?>
<script>
   document.getElementById("mypanelhead").innerHTML="failed";
</script>
<?php
echo '<script>$("#mysnack").snackbar("show");</script>';
//header ("Location: index.php");
//exit;
}
}
else
print("<br>");

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
    <meta name="google-signin-client_id" content="668791001514-nk241ksbt17t0g5iksij3p3phspocgru.apps.googleusercontent.com">
      <?php require 'header.php' ?>
    <title>
        Cricket league Hosting System
    </title>
    <style>

    body {
            background: url("src/resources/background.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
    }


   .panel-transparent {
        background: none;
        color: white;
    }

    .panel-transparent .panel-heading{
        background: rgba(122, 130, 136, 0.7)!important;
    }

    .panel-transparent .panel-body{
        background: rgba(46, 51, 56, 0.7)!important;
        
    }
    
     .panel-transparent-lighter {
        background: none;
        color: white;
    }

    .panel-transparent-lighter .panel-heading{
        background: rgba(122, 130, 136, 0.4)!important;
    }

    .panel-transparent-lighter .panel-body{
        background: rgba(46, 51, 56, 0.4)!important;
        
    }
    .material-icons{
        color: white;
    }
    .form-control{
        color: white;
    }

        </style>
    </head>
    <body>
        
        <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-lg-6">
                <div class="container" style="padding-top:2px;">
                    <div class="row">
                        <div class="col-lg-6 " style="color: white; font-family:Roboto;">
                                <h1>CricScorer</h1>
                                <h3>Your matches,now on your web!</h3>
                                
                             <div style="padding-top:150px;">   
                                <h2>CricScorer makes it easy to organise your cricket tournaments,and display it in real time.</h2>
                                <br><br>
                                <h3>Have a hassle free scoring!!</h3>
                               
                            <!--This name can be changed in the later stages of the project-->
                               
                        </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--descrition ends-->
            <!--login starts-->
            <div class="col-lg-6" style="padding-top:80px;">
            <div class="row-fluid">
            <div class="col-lg-offset-2 col-lg-10" style="padding-top: 20px;">
                <div class="panel panel-info panel-transparent">
                      <div id="mypanelhead" class="panel-heading">
                        <h3 class="panel-title text-center">Login</h3>
                      </div>
                      <div class="panel-body">

                    <form id="loginform" class="" method="post" action="">
                           <div class="form-group input-group label-floating">
                                <span class="input-group-addon"><i class="material-icons">account_circle</i></span>
                                <label for="username" class="control-label"></label>
                                <input type="text" class="form-control" name="username" placeholder="Enter username">
                             </div>
                          <div class="form-group input-group label-floating">
                              <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                               <input type="password" class="form-control" name="password" placeholder="Enter Password">
                          </div>
                        <button type="submit" name="submitbtn" style="background: #03A9F4;color:white;"class="form-control btn btn-primary">Login</button>
                         <a href="forgotpassword.php">  Forgot Password?</a>
                         <span data-toggle=snackbar
                                data-content="Some text"
                                data-style="toast"
                                data-timeout="100"
                                data-html-allowed="true">
                            Click me
                          </span>
                         <span class="btn btn-material-deeppurple" data-toggle="snackbar" data-content="This is a snackbar! Click to dismiss me." data-timeout="2000" data-snackbar-id="mysnack">Show or hide a snackbar</span>
                         
                         <div class="g-signin2" data-onsuccess="onSignIn"></div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
            </div>

        </div>

     </div>


        <!--outermost container ends-->
<?php require 'footer.php'?>
<script>$("#mysnack").snackbar("show");</script>
    	<script src="https://apis.google.com/js/platform.js" async defer></script>
    </body>
</html>
