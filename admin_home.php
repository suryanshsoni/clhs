<?php
ob_start();
require("header.inc.php");
if(!isloggedin()){
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
   <link rel="stylesheet" href="src/css/mdl/material.min.css">


    <!-- Bootstrap -->

    <link href="src/css/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/bootstrap-3.3.6-dist/css/bootstrap-next.css" rel="stylesheet">
    <link href="src/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>
      League Administrator
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

                <a href="admin_home.php" class="navbar-brand">CricScorer</a>

            </div>
            <div class="collapse navbar-collapse" id="coll">

            <ul class="nav navbar-nav">
                <li>
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">
                        Add/Modify players
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="fade in active"><a href="admin_home.php?option=addplayer">Add Player</a></li>
                        <li><a href="admin_home.php?option=updateplayer">Modify Player Details</a></li>
                        <li><a href="admin_home.php?option=deleteplayer">Delete Player</a></li>

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
                    <a href="admin_home.php?option=viewplayer">View player</a>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                 <li>

                    <a href="" data-toggle="dropdown" class="dropdown-toggle">
                    <?php
                              if(isloggedin()){
                                   $name=  isloggedin();
                                   $query="select name from users where id=".$name.";";
                                   $name=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $query));

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
                <!--league panel starts-->
                 <div class=" col-lg-6">
                      <div class=" panel panel-default panel-yellow ">
                          <div class="panel-heading"><h3 class="panel-title">Leagues</h3></div>
     <div class="panel-body dashboard ">
        <div class=" col-lg-4">
                                         <a href="admin_home.php?option=addaccount">
                                         <div class=" well ">

                                         <img src="resources/create-account.png" alt=""/>
                                         </div>
                                          <button  class="btn btn-primary">Create Series</button></a>
                                       </div>
                                     <div class="col-lg-4">
                                         <a href="admin_home.php?option=deleteaccount">
                                         <div class="well ">
                                             <img src="resources/delete-account.png" alt=""/>
                                             </div>
                                         <button  class="btn btn-primary">Delete series</button></a>
                                     </div>
                                     <div class="col-lg-4">
                                         <a href="admin_home.php?option=recoverpassword">
                                         <div class="well" >
                                             <img src="resources/change-password.png" alt=""/>
                                             </div>
                                             <button class="btn btn-primary"><text style="font-size:12px;">Update Series</text></button></a>
                                     </div>
     </div>
                      </div>
                 </div>
           <!-- league panel ends-->

           <!--team panel starts-->
            <div class=" col-lg-6">
                 <div class=" panel panel-default panel-yellow ">
                     <div class="panel-heading"><h3 class="panel-title">Teams</h3></div>
     <div class="panel-body dashboard ">
        <div class="row-fluid">
                                  <div class=" col-lg-4">
                                    <a href="admin_home.php?option=addaccount">
                                    <div class=" well ">

                                    <img src="resources/create-account.png" alt=""/>
                                    </div>
                                     <button  class="btn btn-primary">Upload Teams</button></a>
                                  </div>
                                <div class="col-lg-4">
                                    <a href="admin_home.php?option=deleteaccount">
                                    <div class="well ">
                                        <img src="resources/delete-account.png" alt=""/>
                                        </div>
                                    <button  class="btn btn-primary">Create Team</button></a>
                                </div>
                                <div class="col-lg-4">
                                    <a href="admin_home.php?option=recoverpassword">
                                    <div class="well" >
                                        <img src="resources/change-password.png" alt=""/>
                                        </div>
                                        <button class="btn btn-primary"><text style="font-size:12px;">Update Team</text></button></a>
                                </div>
              </div>
              <div class="row">
                                <div class="col-lg-4">
                                    <a href="admin_home.php?option=recoverpassword">
                                    <div class="well" >
                                        <img src="resources/change-password.png" alt=""/>
                                        </div>
                                        <button class="btn btn-primary"><text style="font-size:12px;">Delete Team </text></button></a>
                                </div>

                               <div class="col-lg-4">
                                   <a href="admin_home.php?option=recoverpassword">
                                   <div class="well" >
                                       <img src="resources/change-password.png" alt=""/>
                                       </div>
                                       <button class="btn btn-primary"><text style="font-size:12px;">Copy from previous leagues </text></button></a>
                              </div>

              </div>
        </div>
     </div>
    </div>
      <!-- teams panel ends-->

                  <!--players panel starts-->
                    <div class=" col-lg-6">
                         <div class="panel panel-default panel-primary">
                             <div class="panel-heading"><h3 class="panel-title">Players</h3></h3></div>
				<div class="panel-body dashboard">
					 <div class="col-lg-4">
                                            <a href="admin_home.php?option=addplayer">
                                            <div class="well">
                                            <img src="resources/add-player.png" alt=""/>
                                            </div>
                                              <button  class="btn btn-primary">Add Player</button></a>
                                          </div>
                                        <div class="col-lg-4">
                                            <a href="admin_home.php?option=updateplayer">
                                            <div class="well">
                                                <img src="resources/shift-change.png" alt=""/>
                                                </div>
                                          <button  class="btn btn-primary">Modify Player</button></a>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="admin_home.php?option=deleteplayer">
                                            <div class="well">
                                                <img src="resources/delete-player.png" alt=""/>

                                                </div>
                                           <button  class="btn btn-primary">Delete Player</button></a>
                                        </div>
				</div>
                         </div>
                    </div>
              <!--players panel ends-->
                   <!--panel starts-->
                    <div class=" col-lg-6">
                         <div class=" panel panel-default panel-yellow ">
                             <div class="panel-heading"><h3 class="panel-title">Schedule</h3></div>
				<div class="panel-body dashboard ">
					 <div class=" col-lg-4">
                                            <a href="admin_home.php?option=addaccount">
                                            <div class=" well ">

                                            <img src="resources/create-account.png" alt=""/>
                                            </div>
                                             <button  class="btn btn-primary">Upload Schedule</button></a>
                                          </div>
                                        <div class="col-lg-4">
                                            <a href="admin_home.php?option=deleteaccount">
                                            <div class="well ">
                                                <img src="resources/delete-account.png" alt=""/>
                                                </div>
                                            <button  class="btn btn-primary">Create Fixture</button></a>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="admin_home.php?option=recoverpassword">
                                            <div class="well" >
                                                <img src="resources/change-password.png" alt=""/>
                                                </div>
                                                <button class="btn btn-primary"><text style="font-size:12px;">Delete Fixture</text></button></a>
                                        </div>
				</div>
                         </div>
                    </div>
              <!--panel ends-->
              <!-- grounds panel starts-->
               <div class=" col-lg-6">
                    <div class=" panel panel-default panel-yellow ">
                        <div class="panel-heading"><h3 class="panel-title">Grounds</h3></div>
   <div class="panel-body dashboard ">
      <div class=" col-lg-4">
                                       <a href="admin_home.php?option=addaccount">
                                       <div class=" well ">

                                       <img src="resources/create-account.png" alt=""/>
                                       </div>
                                        <button  class="btn btn-primary">Add Ground</button></a>
                                     </div>
                                   <div class="col-lg-4">
                                       <a href="admin_home.php?option=deleteaccount">
                                       <div class="well ">
                                           <img src="resources/delete-account.png" alt=""/>
                                           </div>
                                       <button  class="btn btn-primary">Delete Ground</button></a>
                                   </div>
                                   <div class="col-lg-4">
                                       <a href="admin_home.php?option=recoverpassword">
                                       <div class="well" >
                                           <img src="resources/change-password.png" alt=""/>
                                           </div>
                                           <button class="btn btn-primary"><text style="font-size:12px;">Update Ground</text></button></a>
                                   </div>
   </div>
                    </div>
               </div>
         <!--grounds panel ends-->
         <!-- umpires panel starts-->
          <div class=" col-lg-6">
               <div class=" panel panel-default panel-yellow ">
                   <div class="panel-heading"><h3 class="panel-title">Umpires</h3></div>
<div class="panel-body dashboard ">
 <div class=" col-lg-4">
                                  <a href="admin_home.php?option=addaccount">
                                  <div class=" well ">

                                  <img src="resources/create-account.png" alt=""/>
                                  </div>
                                   <button  class="btn btn-primary">Add Umpire</button></a>
                                </div>
                              <div class="col-lg-4">
                                  <a href="admin_home.php?option=deleteaccount">
                                  <div class="well ">
                                      <img src="resources/delete-account.png" alt=""/>
                                      </div>
                                  <button  class="btn btn-primary">Delete Umpire</button></a>
                              </div>
                              <div class="col-lg-4">
                                  <a href="admin_home.php?option=recoverpassword">
                                  <div class="well" >
                                      <img src="resources/change-password.png" alt=""/>
                                      </div>
                                      <button class="btn btn-primary"><text style="font-size:12px;">Update Umpire</text></button></a>
                              </div>
</div>
               </div>
          </div>
    <!--umpires panel ends-->
                </div>
            </div>
            <!--row ends-->
            <br>

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
            case 'addplayer':{
                require 'addplayer.php';
            }break;
            case 'updateplayer':{
                require 'searchplayer.php';
            }break;
            case 'modifyplayer':{
                    require 'modifyplayer.php';
            }
            break;
            case 'deleteplayer':{
                    require 'searchplayer.php';
            }break;
            case 'removeplayer':{
                    require 'deleteplayer.php';
            }break;
            case 'addaccount':{
                    require 'searchplayer.php';
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
            case 'viewplayer':{
                require 'searchplayer.php';

            }break;
            case 'displayplayer':{
                    require 'displayplayer.php';
            }break;
            case 'processhcomplaint':{
                    require 'viewhcomplaint.php';
            }break;
            case 'processrcomplaint':{
                    require 'viewmcomplaint.php';
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
