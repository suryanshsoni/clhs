<?php
ob_start();
require("header.inc.php");
if(!isloggedin()){
 header ("Location: ./index.php");
 exit;
}
$userdetails=  getuserdetails();
$enroll=$userdetails['enrollmentno'];
    

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
   <!--MDL-->
   <link rel="stylesheet" href="mdl/material.min.css">

    <!-- Bootstrap -->
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6-dist/css/bootstrap-next.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>
        Hostel Management System
        
    </title>
    <style>
        .dashboard img {
           display: table;
           width: 100%;          
        }
        .dashboard .btn {
          width:100%;
          white-space: normal;
        }
          

    </style>
    </head>
    <body>
        <header>
 
        <div class="navbar navbar-default navbar-inverse navbar-fixed-top" id="mynav">
            <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#coll">
                    <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                </button>
                
                <a href="student_home.php" class="navbar-brand">Lazarus</a>
                
            </div> 
            <div class="collapse navbar-collapse" id="coll">
              
            <ul class="nav navbar-nav">
                <li>
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">
                        View Details
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="fade in active"><a href="student_home.php?option=trackcomplaint">Track Complaint</a></li>
                        <li><a href='student_home.php?option=displaystudent&student=<?php
                            echo $enroll;
                        ?>
                        '>My Details and Dues</a></li>
                     
                        
                    </ul>    
                </li>
                   
                
                
               
                  
                 <li class="navbar-right"><a href="student_home.php?option=noticeboard">View Notice Board</a></li>                    
            </ul>
             
            <ul class="nav navbar-nav navbar-right">
                 <li>
                     
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">
                     <?php 
                              if(isloggedin()){
                                   $name=  isloggedin();
                                   $query="select name,type from users where id=".$name.";";
                                   $name=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $query));
                                   
                                   
                                   if($name['type']=="admin"){
                                       header("Location: ./student_home.php");
                                       die;
                                   }
                                   //echo $enroll;
                                   echo $name['name'];
                              }
                        ?>    
                       <!--welcome part here-->
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        
                        <li><a href="student_home.php?option=changepass">Change Password</a></li>
                        <li><a href="student_home.php?option=logout">Logout</a></li>
                        
                    </ul>    
                </li>     
            </ul>
            </div>
                </div>
        </div>
            
        </header>
        
        <div class="container" style="margin-top:50px;">
      <?php 
        @$opt= $_GET['option'];
        if($opt==""){
        ?>
            <h1 class="container" style="margin-top:30px;">Dashboard</h1>
             <hr>
            <div class="row-fluid">
              <div id="dashboard" class="container text-center">
                  <!--panel starts-->
                    <div class=" col-lg-6">
                         <div class="panel panel-default panel-green">
                             <div class="panel-heading"><h3 class="panel-title">View Details</h3></div>
				<div class="panel-body dashboard text-">
					 <div class="col-lg-6">
                                            <a href="student_home.php?option=trackcomplaint">
                                            <div class="well">
                                            <img src="resources/student-notice.png" alt=""/>
                                            </div>   
                                              <button  class="btn btn-primary">Track Complaint</button></a>
                     				</div>
                                        <div class="col-lg-6">
                                            <div class="well">
                                                <a href='student_home.php?option=displaystudent&student=<?php
                            echo $enroll;
                        ?>
                        '>
                                                <img src="resources/student-money.png" alt=""/>
                                                </div>   
                                            <button  class="btn btn-primary">My Details and Dues</button></a>
                                        </div> 
                                        
				</div>
                         </div>          
                    </div>
              <!--panel ends-->      
                   <!--panel starts-->
                    <div class=" col-lg-6">
                         <div class=" panel panel-default panel-green">
                             <div class="panel-heading"><h3 class="panel-title">Register Complaint</h3></div>
				<div class="panel-body dashboard ">
					 <div class=" col-lg-6">
                                            <a href="student_home.php?option=registerhcomplaint">
                                            <div class=" well ">
                                                
                                            <img src="resources/student-hostel.png" alt=""/>
                                            </div>   
                                             <button  class="btn btn-primary">Hostel Complaint</button></a>
                                          </div>
                                        <div class="col-lg-6">
                                            <a href="student_home.php?option=registerrcomplaint"> 
                                            <div class="well ">
                                                
                                                <img src="resources/student-ragging.png" alt=""/>
                                                </div>   
                                              <button  class="btn btn-primary"><text style="font-size:12px;"> Ragging Complaint</text></button></a>
                                        </div> 
                                       
				</div>
                         </div>          
                    </div>
              <!--panel ends--> 
                        
             
                               

                        
                </div>
            </div>
            <!--row ends-->
      <?php
        }
        else{
            switch($opt){
            case 'logout':
            {
                    $id=  isloggedin();
                    $query="delete from active_users where user=".$id.";";
                    //print("<br><br><br><br><br><br><br>".$query);
                    mysqli_query($GLOBALS["___mysqli_ston"], $query);
                    session_destroy();
                    header("Location: ./index.php");
                    exit;
            }
            break;
            case 'displaystudent':{
                    require 'displaystudent.php';
            }break;
        case 'noticeboard':{
                    require 'noticeboard.php';
            }break;
             case 'registerhcomplaint':{
                    require 'hostelcomplaint.php';
            }break; 
         case 'registerrcomplaint':{
                    require 'raggingcomplaint.php';
            }break;
        case 'trackcomplaint':{
                    require 'mycomplaints.php';
            }break;
        case 'changepass':{
                require 'changepass.php';                
            }break;
        }
        }
        
       ?>
            </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap-3.3.6-dist/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
?>