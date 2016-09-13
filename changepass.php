<?php
$changed=false;
$curr_password= mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select password from users where id=".isloggedin().";"));
$curr_password=$curr_password['password'];

if(isset($_POST['cancelchangepwdbtn'])){
   header('Location: ' . $_SERVER['HTTP_REFERER']);    
   die;
   
}
?>

 <div class="well"style="margin-top:30px;"><legend>Change your Password 
     <?php
         if($changed){
     ?>
     <?php
         }
         ?></legend>
<div class="container ">
 
      
     <div class="form-group" >
         <fieldset>
                <form id="loginform" class="  col-lg-4" method="post" action="">
<?php
if(isset($_POST['changepwdbtn'])){
    $old_password=  sha1( mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oldpassword']) );
    $new_password=  sha1( mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['newpassword']) );
    $repeat_password=sha1( mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['repeatpassword']) );
    
    if($new_password!=$repeat_password || $new_password==""||$old_password!=$curr_password){
         if($new_password==""){
        ?>
                    <div class="form-group "> 
                    <label for="oldpassword">Old Password</label>
                    <input type="password" class="form-control" name="oldpassword" placeholder="Old Password">
                    </div>
                  
                    <div class="form-group has-error has-feedback">
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control" name="newpassword" placeholder="Enter new Password">
                     <span class="glyphicon glyphicon-remove form-control-feedback"></span>
		    <p class="help-block">New password cannot be blank!</p>
                    </div>
                    
                    <div class="form-group ">    
                    <label>Re-enter password</label>
                    <input type="password" class="form-control" name="repeatpassword" placeholder="Once Again">
                    
                     </div>
                     <button type="submit" name="changepwdbtn" class="btn btn-primary">Change Password</button>
                     <button type="submit" name="cancelchangepwdbtn" class="btn btn-default">Cancel</button>
        <?php
        }
        
        else if($new_password!=$repeat_password){
            ?>
                    <div class="form-group "> 
                    <label for="oldpassword">Old Password</label>
                    <input type="password" class="form-control" name="oldpassword" placeholder="Old Password">
                    </div>
                  
                    <div class="form-group ">
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control" name="newpassword" placeholder="Enter new Password">
                    </div>
                     
                    <div class="form-group has-error has-feedback">    
                    <label>Re-enter password</label>
                    <input type="password" class="form-control" name="repeatpassword" placeholder="Once Again">
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
		    <p class="help-block">Passwords must be same!</p>
                     </div>
                     
                    <button type="submit" name="changepwdbtn" class="btn btn-primary">Change Password</button>
                    <button type="submit" name="cancelchangepwdbtn" class="btn btn-default">Cancel</button>
        <?php
         }
        else{
       // print($old_password." ".$new_password);
        ?>
             <div class="form-group has-error has-feedback "> 
                    <label for="oldpassword">Old Password</label>
                    <input type="password" class="form-control" name="oldpassword" placeholder="Old Password">
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
		    <p class="help-block">Incorrect Password!!</p>
                    </div>
                  
                    <div class="form-group ">
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control" name="newpassword" placeholder="Enter new Password">
                    
                    </div>
                     
                    <div class="form-group">    
                    <label>Re-enter password</label>
                    <input type="password" class="form-control" name="repeatpassword" placeholder="Once Again">
                    
                     </div>
                     
                    <button type="submit" name="changepwdbtn" class="btn btn-primary">Change Password</button>
                    <button type="submit" name="cancelchangepwdbtn" class="btn btn-default">Cancel</button>       
        <?php
        }
    }
    else{
        
        $query="update users set password='".$new_password."' where id=".isloggedin().";";
        //print($query);
        mysqli_query($GLOBALS["___mysqli_ston"], $query);
        $changed=true;
   ?>
                    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                        Password Changed Successfully! 
                        <br>
                         </span>
                   </h3>
    <?php
   
    }
    ?>
<?php                    
}
else{
?>

                    <div class="form-group "> 
                    <label for="oldpassword">Old Password</label>
                    <input type="password" class="form-control" name="oldpassword" placeholder="Old Password">
                    </div>
                  
                    <div class="form-group "> 
                    <label for="newpassword" style=" display: block-inline;">New Password</label>
                    <input type="password" class="form-control" name="newpassword" placeholder="Enter new Password">
                    </div>
                    
                    <div class="form-group "> 
                    <label>Re-enter password</label>
                    <input type="password" class="form-control" name="repeatpassword" placeholder="Once Again">
                     </div>

                 <button type="submit" name="changepwdbtn" class="btn btn-primary">Change Password</button>
                 <button type="submit" name="cancelchangepwdbtn" class="btn btn-default">Cancel</button>
<?php
}

?>      
                </form>
         </fieldset>        
    </div>
   
      
</div>
     
</div>   



