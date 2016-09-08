<?php
require 'header.inc.php';
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
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <title>
        Hostel Management System
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
                    <h1 style="font-family:Roboto;">Lazarus</h1>
                        </div>
                        <div >
                            <h2 class="pull-right" style="font-family:Open-Sans;">Hostel Management System</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
       
        <div class="container col-lg-4 col-lg-offset-4 text-center" style="padding-top:10px;">
            <div class="well">
                <?php
                    if(isset($_POST['sendpasswordbtn'])){
                        $username=$_POST['email'];
                        $query="update users set password='". generateRandomString(8)."' where username='".$username."';";
                        //echo $query;
                        mysqli_query($GLOBALS["___mysqli_ston"], $query);
                        
                        
                ?>
                    <div class="conatiner text-center">
                                        <h4> 
                                            <icon class="fa fa-check"></icon>
                                            Your Password has been reset !<br>Contact the administrator for the new password.
                                            <br>
                                         </h4>
                                        <a href="index.php">
                                            <button class="btn btn-success">
                                            <icon class="fa fa-backward"></icon>    
                                                Go Back</button>
                                        </a>
                                        </div>
                <?php
                    die;
                    }
                ?>
                <strong>Recover your password</strong><br><br>
                <form action="" method="post">
                     <div class="form-group col-lg-8">
                         <input type="text" name="email" class="form-control" placeholder="Enter your username">
                    </div>
                    <button name="sendpasswordbtn" class="btn btn-primary">Send Password</button>
                </form>
            </div>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap-3.3.6-dist/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </body>
</html>
