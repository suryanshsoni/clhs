<?php 
    $umpire_id=$_GET['umpire'];
    $query="select *from umpires where u_id='".$umpire_id."';";
   // echo $query;
    $row=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $query));
        
        $name=$row['u_name'];
        $experience=$row['u_experience'];
        
?>

<?php
if(isset($_POST['modifyumpiresbtn'])){
    
    $query="delete from umpires where u_id='".$umpire_id."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    $name=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']) ;
    $experience=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['experience']) ;
    
    $query = "INSERT INTO umpires(u_id,u_name,u_experience) VALUES (".$umpire_id.",'".$name."','".$experience."');";
    //print($query)
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    ?>
    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       Records updated successfully! 
                        <br>
                        </span>
                   </h3>
<?php
die;
}
?>


<h1 class="container text-center" style="margin-top:30px;">Modify umpires</h1>

             <hr>
             <div class="container">
                 <form action=""  method="post">
                 <div class="row">
                     <div class="container col-lg-offset-3 col-lg-6">
                     <div class="well ">
                         <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary">
                              <i class="material-icons"></i>G
                            </button>
                             <h4><strong>Umpire Details</strong></h4>
                         </div>
                            <!--form-->
                   
                            
                    <div class="form-group">
                        <label for="name" class="control-label">Umpire's Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?>">
                    </div>

                    <div class="form-group">
                        <label for="country" class="control-label">Experience</label>
                        <input type="number" name="experience" class="form-control" value="<?php echo $experience ?>">
                    </div>

                                
                     </div>     
                         
                     </div>
                    <!--container ends-->
                     
                </div>
                 <div class="container text-center">
                     <button type="submit" class="btn btn-primary" name="modifyumpiresbtn">Save changes</button>
                     <button type="submit" class="btn btn-default" name="cancelmodifyumpiresbtn">Cancel</button>
                 </div>
                 </form>
             </div>
//complete