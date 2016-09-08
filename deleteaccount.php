<!DOCTYPE html>
<?php
if(isset($_POST['deleteaccountbtn'])){
    $account=$_POST['selected_account'];
    $query= "delete from users  where username='".$account."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    ?>
    <div class="container">
        <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       Account Deleted Successfully! 
                        <br>
                        </span>
                   </h3>
    </div>
<?php
    
}
?>

<h1 class="container text-center" style="margin-top:30px;">Delete Account</h1>

             <hr>
             
             <div class="well">
                
                 <div class="container text-center"style="padding-right:0px;">
                    <strong>Select the account to delete and click on delete button.</strong>
                    
                 </div>
                            <br><br>
                            <form action="" method="post">
                    <div class="form-group">
                        <div class="col-lg-offset-4">
                        <div  class="text-left container">
                             <?php
                                        $query="select username,name,enrollmentno  from users where type='student';";
                                        $query=  mysqli_query($GLOBALS["___mysqli_ston"], $query);
                                        if(mysqli_num_rows($query)){
                            ?>  
                                         <table class="mdl-data-table">
                                         <thead>
                                            <tr>
                                              <th class="mdl-data-table__cell--non-numeric">Username</th>
                                              <th>Name</th>
                                              <th>Enrollment Number</th>
                                              <th>Select</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        
                            <?php
                                          while($row=  mysqli_fetch_assoc($query)){
                            ?>
                                              <tr>
                                                  <td><?php echo $row['username'];?></td>
                                                  <td><?php echo $row['name'];?></td>
                                                  <td><?php echo $row['enrollmentno'];?></td>
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
                                        <div class="col-lg-offset-3">
                                         <button  type="submit" name="deleteaccountbtn" class=" btn btn-primary">
                                             Delete Account
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
                           
                       
                    
                               