<!DOCTYPE html>
<?php
if(isset($_POST['update_passwordbtn'])){
    $account=$_POST['selected_account'];
    $password=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select password from users where username='".$account."';"))['password'];
   // echo $password;
    $query= "update users set password='".sha1($password)."' where username='".$account."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    header("Location : recoverpassword.php");
    
}
?>

<h1 class="container text-center" style="margin-top:30px;">New Password Requests</h1>

             <hr>
             
             <div class="well">
                
                 <div class="container text-center"style="padding-right:0px;">
                    <strong>Below are the requests for resetting the password.Notify the new password to the account holder<br>Select the delievered passwords and click on change password to update the password.</strong>
                    
                 </div>
                            <br><br>
                            <form action="" method="post">
                    <div class="form-group">
                        <div class="col-lg-offset-4">
                        <div  class="text-left container">
                             <?php
                                        $query="select username,password  from users where length(password)=8;";
                                        $query=  mysqli_query($GLOBALS["___mysqli_ston"], $query);
                                        if(mysqli_num_rows($query)){
                            ?>  
                                         <table class="mdl-data-table">
                                         <thead>
                                            <tr>
                                              <th class="mdl-data-table__cell--non-numeric">Username</th>
                                              <th>New Password</th>
                                              <th>Select</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        
                            <?php
                                          while($row=  mysqli_fetch_assoc($query)){
                            ?>
                                              <tr>
                                                  <td><?php echo $row['username'];?></td>
                                                  <td><?php echo $row['password'];?></td>
                                                  <td>
                                                      <input type="radio" checked value="<?php echo $row['username']?>" name="selected_account">
                                                   
                                                  </td>
                                                      
                                              </tr>
                            <?php
                                              
                                            }  
                            ?>
                                         </tbody>
                                        </table>
                                        </div>
                            <br>
                                        <div class="col-lg-offset-1">
                                         <button  type="submit" name="update_passwordbtn" class=" btn btn-primary">
                                             Update with new password
                                        </button>
                                        </div>
                                            
                            <?php
                                        
                                        }
                                        else{
                            ?>  
                                        <div class="container">
                                        <h4> 
                                            <icon class="fa fa-bell fa-2x"> All caught up!<br><small>No new password requests.</small></icon>
                                            <br>
                                            
                                            <br>
                                         </h4>
                                        </div>
                                        
                            <?php
                                        
                                        }
                             ?>
                        
                        </div>
                                
                          </div>
                               
                            </form>
                          
                          </div>
                           
                       
                    
                               