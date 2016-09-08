<?php
    $enroll=$_GET['student'];
    $query="select username from users where enrollmentno='".$enroll."';";
    if(isset($_POST['goback'])){
    header("Location: admin_home.php");
    die;
}
    //echo $query;
    if(mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], $query))){
?>  
    <div class="container text-center " style="padding-top:50px;">
        <h3> 
                        <icon class="fa fa-warning"></icon>
                                Account already exists!!
                        <br>
                        
        </h3>
        <a href="admin_home.php?option=addaccount">
            <button class="btn btn-warning">
            <icon class="fa fa-backward"></icon>    
                Go Back</button>
        </a>
    </div>

<?php
    die;
    }
        
?>
<?php
if(isset($_POST['cancelnewaccountbtn'])){
    header('Location: ./admin_home.php');    
   die;
    }
?>

<h1 class="container text-center" style="margin-top:30px;">Create New Account</h1>
             <hr>
             <div class="container">
                 
                 <div class="row">
                     <div class="container col-lg-offset-4 col-lg-4">
                     <div class="well ">
                         <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                              <i class="fa fa-plus-circle"></i>
                            </button>
                             <h4><strong>New Account</strong></h4>
                         </div>
                            <form action=""  method="post">
                           <?php
                            if(isset($_POST['createnewaccountbtn'])){
                                 //echo 'buttom pressed';
                                if(isset($_POST['username'])){
                                    $query="select *from users where username='".$_POST['username']."';";
                                    //echo $query;
                                    if(mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], $query))){
                                    ?>
                                        <div class="form-group has-error has-feedback">
                                        <label for="username">Choose Username</label>
                                        <input type="text" name="username" class="form-control">
                                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                        <p class="help-block">Username already exists!!</p>
                                        </div>
                            <?php
                                    }
                                    else{
                                        $username=$_POST['username'];
                                        $password=$_POST['password'];
                                        $query=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select Name,email from students where enrollmentno='".$enroll."';"));
                                        $name=$query['Name'];
                                        $email=$query['email'];
                                        $query="insert into users(username,password,name,type,enrollmentno,email) values('".$username."','".sha1($password)."','".$name."','student','".$enroll."','".$email."');";
                                        //echo $query;
                                        mysqli_query($GLOBALS["___mysqli_ston"], $query);
                                        
                            ?>          
                                        <div class="conatiner text-center">
                                        <h2> 
                                            <icon class="fa fa-check"></icon>
                                            Account Created Successfully!
                                            <br>
                                         </h2>
                                        
                                            <button name="goback" type="submit"class="btn btn-success">
                                            <icon class="fa fa-backward"></icon>    
                                                Go Back</button>
                                        
                                        </a>
                                        </div>
                                
                                </form>
                                     </div>
                                     </div>    
                                     </div> 

                             </div>
                                
                    
             
                                        
                            <?php
                                die;
                               
                                    }
                                }
                            }
                            else{
                               
                                ?>
                                <div class="form-group">
					<label for="username" class="control-label">Choose Username</label>
					<input type="text" name="username" class="form-control">
                                </div>
                            <?php
                            }
                           ?>
                                    
				
				
				<div class="form-group">
					<label for="password" class="control-label">Create Password</label>
					<input type="password" name="password" class="form-control">
				</div>
                            
                                
                            <div class="col-lg-offset-2">
                            <button type="submit" class="btn btn-primary" name="createnewaccountbtn">Create Account</button>
                            <button type="submit" class="btn btn-default" name="cancelnewaccountbtn">Cancel</button>
                            
                            </div>
                                </form>
                     </div>
                     </div>    
                     </div> 
                    
             </div>
