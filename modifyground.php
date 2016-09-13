<?php 
    $ground_id=$_GET['ground'];
    $query="select *from grounds where g_id='".$ground_id."';";
   // echo $query;
    $row=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $query));
        
        $name=$row['g_name'];
        $city=$row['g_city'];
        $country=$row['g_country'];
      
        

   //echo $address;
   //echo $dob;
    
?>

<?php
if(isset($_POST['modifygroundsbtn'])){
    
    $query="delete from grounds where g_id='".$ground_id."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    $name=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']) ;
    $city=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['city']) ;
    $country=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['country']) ;

    
    $query = "INSERT INTO grounds(g_id,g_name,g_city,g_country) VALUES (".$ground_id.",'".$name."','".$city."','".$country."');";
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


<h1 class="container text-center" style="margin-top:30px;">Modify grounds</h1>

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
                             <h4><strong>Ground Details</strong></h4>
                         </div>
                            <!--form-->
                    <div class="form-group">
                        <label for="name" class="control-label">Stadium's Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?>">
                    </div>
                            
                    <div class="form-group">
                        <label for="city" class="control-label">City</label>
                        <input type="text" name="city" class="form-control" value="<?php echo $city ?>">
                    </div>

                    <div class="form-group">
                        <label for="country" class="control-label">Country</label>
                        <input type="text" name="country" class="form-control" value="<?php echo $country ?>">
                    </div>
                                
                     </div>     
                         
                     </div>
                    <!--container ends-->
                     
                </div>
                 <div class="container text-center">
                     <button type="submit" class="btn btn-primary" name="modifygroundsbtn">Save changes</button>
                     <button type="submit" class="btn btn-default" name="cancelmodifygroundsbtn">Cancel</button>
                 </div>
                 </form>
             </div>
