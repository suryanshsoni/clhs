<?php
ob_start();
require("header.inc.php");
if(!isloggedin()){
  print 'not logged in';  
header ("Location: ./index.php");
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
   <!--MDL-->
   <link rel="stylesheet" href="mdl/material.min.css">
    

    <!-- Bootstrap -->
    
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6-dist/css/bootstrap-next.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>
        Student Dashboard
        
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
        .panel-title{
          text-align: center;
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
                
                <a href="admin_home.php" class="navbar-brand">Lazarus</a>
                
            </div> 
            <div class="collapse navbar-collapse" id="coll">
              
            <ul class="nav navbar-nav">
                <li>
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">
                        Add/Modify Students
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="fade in active"><a href="admin_home.php?option=addstudent">Add Student</a></li>
                        <li><a href="admin_home.php?option=updatestudent">Modify Student Details</a></li>
                        <li><a href="admin_home.php?option=deletestudent">Delete Student</a></li>
                        
                    </ul>    
                </li>
                   
                <li>
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">
                        Manage Accounts
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="fade in active"><a href="admin_home.php?option=addaccount">Create Account</a></li>
                        <li><a href="admin_home.php?option=deleteaccount">Delete Account</a></li>
                        <li><a href="admin_home.php?option=recoverpassword">Password Recovery Request</a></li>
                        
                    </ul>    
                </li>
                
                <li>
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">
                        Process Complaint
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="fade in active"><a href="admin_home.php?option=processhcomplaint">Hostel Complaint</a></li>
                        <li><a href="admin_home.php?option=processrcomplaint">Ragging Complaint</a></li>
                    </ul>    
                </li>
               
                  <li>
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">
                        Notice Board
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_home.php?option=maintainnotice">Manage Notice Board</a></li> 
                        <li class="active"><a href="admin_home.php?option=noticeboard">View Notice Board</a></li>
                    </ul>    
                </li>
                <li>
                    <a href="admin_home.php?option=viewstudent">View Student</a>
                </li>
                  
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
                                       header("Location: ./admin_home.php");
                                       die;
                                   }
                                   echo $name['name'];
                              }
                    
                        ?>
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        
                        <li><a href="admin_home.php?option=changepass">Change Password</a></li>
                        <li><a href="admin_home.php?option=logout">Logout</a></li>
                        
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
                         <div class="panel panel-default panel-primary">
                             <div class="panel-heading"><h3 class="panel-title">Update Student Database</h3></div>
				<div class="panel-body dashboard">
					 <div class="col-lg-4">
                                            <a href="admin_home.php?option=addstudent">
                                            <div class="well">
                                            <img src="resources/add-student.png" alt=""/>
                                            </div>   
                                              <button  class="btn btn-primary">Add New Student</button></a>
                                          </div>
                                        <div class="col-lg-4">
                                            <a href="admin_home.php?option=updatestudent"> 
                                            <div class="well">
                                                <img src="resources/shift-change.png" alt=""/>
                                                </div>   
                                          <button  class="btn btn-primary">Modify Student</button></a>
                                        </div> 
                                        <div class="col-lg-4"> 
                                            <a href="admin_home.php?option=deletestudent">
                                            <div class="well">
                                                <img src="resources/delete-student.png" alt=""/>
                                     
                                                </div>   
                                           <button  class="btn btn-primary">Delete Student</button></a>
                                        </div>
				</div>
                         </div>          
                    </div>
              <!--panel ends-->      
                   <!--panel starts-->
                    <div class=" col-lg-6">
                         <div class=" panel panel-default panel-yellow ">
                             <div class="panel-heading"><h3 class="panel-title">Manage Accounts</h3></div>
				<div class="panel-body dashboard ">
					 <div class=" col-lg-4">
                                            <a href="admin_home.php?option=addaccount">
                                            <div class=" well ">
                                                
                                            <img src="resources/create-account.png" alt=""/>
                                            </div>   
                                             <button  class="btn btn-primary">Create Account</button></a>
                                          </div>
                                        <div class="col-lg-4">  
                                            <a href="admin_home.php?option=deleteaccount"> 
                                            <div class="well ">
                                                <img src="resources/delete-account.png" alt=""/>
                                                </div>   
                                            <button  class="btn btn-primary">Delete account</button></a>
                                        </div> 
                                        <div class="col-lg-4">
                                            <a href="admin_home.php?option=recoverpassword">
                                            <div class="well" > 
                                                <img src="resources/change-password.png" alt=""/>
                                                </div>   
                                                <button class="btn btn-primary"><text style="font-size:12px;">Password Requests</text></button></a>
                                        </div>
				</div>
                         </div>          
                    </div>
              <!--panel ends--> 
                        
                </div>
            </div>
            <!--row ends-->
            <br>
             <!--next row-->
             <div class="row-fluid">
              <div id="dashboard" class="container text-center">
                  <!--panel starts-->
                    <div class=" col-lg-6">
                         <div class="panel panel-default panel-red">
                             <div class="panel-heading"><h3 class="panel-title">Charge Dues and View Details</h3></div>
				<div class="panel-body dashboard">
					 <div class="col-lg-4">
                                             
                                            <a href="admin_home.php?option=hostelmessdue">
                                            <div class="well">
                                                <img src="resources/hostel.png" alt=""/>
                                            </div>   
                                                <button  class="btn btn-primary"><text style="font-size: 12px;">Hostel/Mess Fees</text></button></a>
                                          </div>
                                        <div class="col-lg-4">
                                            <a href="admin_home.php?option=viewstudent">
                                            <div class="well">
                                                <img src="resources/view_student.png" alt=""/>
                                                
                                                </div>   
                                        <button  class="btn btn-primary"><text style="font-size: 12px;">View Student Details</text></button></a>
                                        </div> 
                                        <div class="col-lg-4">
                                            <a href="admin_home.php?option=otherdue">
                                            <div class="well">
                                                
                                                <img src="resources/other-dues.png" alt=""/>
                                                </div>   
                                            <button  class="btn btn-primary">Other dues</button></a>
                                        </div>
				</div>
                         </div>          
                        
                    </div>
              <!--panel ends-->      
                   <!--panel starts-->
                   <div class=" col-lg-6">
                         <div class="panel panel-default panel-green">
                             <div class="panel-heading"><h3 class="panel-title">Complaints and others</h3></div>
				<div class="panel-body dashboard">
                                    <div class="col-lg-4">
                                            <a href="admin_home.php?option=processhcomplaint">
                                            <div class="well">
                                                <img src="resources/complaint.png" alt=""/>
                                            </div>   
                                        <button  class="btn btn-primary">Hostel Complaint</button></a>
                                          </div>
                                        <div class="col-lg-4"> 
                                            <a href="admin_home.php?option=processrcomplaint">
                                            <div class="well">
                                        
                                                <img src="resources/ragging.png" alt=""/>
                                                </div>   
                                           <button  class="btn btn-primary"><text style="font-size:12px;"> Ragging Complaint</text></button></a>
                                        </div> 
                                        <div class="col-lg-4">
                                            <a href="admin_home.php?option=noticeboard">
                                            <div class="well">
                                                <img src="resources/notice.png" alt=""/>
                                                
                                                </div>   
                                            <button  class="btn btn-primary"> Notice Board</button></a>
                                        </div>
				</div>
                         </div>          
                    </div>           
                   
              <!--panel ends--> 
                               

                        
                </div>
            </div><!--row ends-->
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
                    header("Location: ./index.php");
                    session_destroy();
                   
            }
            break;
            case 'noticeboard':{
                    require 'noticeboard.php';
            }
            break;
            case 'maintainnotice':{
                require 'editnoticeboard.php';                
            }break;
            case 'changepass':{
                require 'changepass.php';                
            }break;
            case 'addstudent':{
                require 'addstudent.php';                
            }break;
            case 'updatestudent':{
                require 'searchstudent.php';                
            }break;
            case 'modifystudent':{
                    require 'modifystudent.php';
            }
            break;
            case 'deletestudent':{
                    require 'searchstudent.php';
            }break;
            case 'removestudent':{
                    require 'deletestudent.php';
            }break;
            case 'addaccount':{
                    require 'searchstudent.php';
            } break;
            case 'createaccount':{
                    require 'addaccount.php';
            }break;
            case 'recoverpassword' :{
                require 'recoverpassword.php';
            }break;
            case 'deleteaccount':{
                require 'deleteaccount.php';
            }break;
            case 'otherdue':{
                require 'hosteldues.php';
            }
            break;
            case 'hostelmessdue':{
                require 'hmdues.php';
            }break;
            case 'viewstudent':{
                require 'searchstudent.php';
                
            }break;
            case 'displaystudent':{
                    require 'displaystudent.php';
            }break;
        }
        }
        ob_end_flush();
       ?>
            </div>
      <?php 
      require 'footer.php';
      ?>
   
    </body>
</html>
