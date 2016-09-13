<?php
if(isset($_POST['addnewgroundbtn'])){
    $name=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']) ;
    $city=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['city']) ;
    $country= mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['country']) ;
    
    $query = "INSERT INTO grounds(g_name,g_city,g_country) VALUES ('".$name."','".$city."','".$country."');";
   // print($query);
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
?>
                    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       <?php echo $name ?> added to records Successfully!
                        <br>
                        </span>
                   </h3>
<?php
}
if(isset($_POST['canceladdgroundbtn'])){

    header('Location: ./admin_home.php');
   die;

}

?>
<style>
    .well .btn-circle {
    padding: 18px 28px;
    font-size: 22px;
    border-radius: 100%;

    }
</style>
<h1 class="container text-center" style="margin-top:30px;">Add New Ground</h1>
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
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="city" class="control-label">City</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                            
                    <div class="form-group">
                        <label for="country" class="control-label">Country</label>
                        <input type="text" name="country" class="form-control">
                    </div>

                     </div>

                     </div>


                     <!--container ends-->
                     
                 </div>
                 <div class="container text-center">
                     <button type="submit" class="btn btn-primary" name="addnewgroundbtn">Add Ground</button>
                     <button type="submit" class="btn btn-default" name="canceladdgroundbtn">Cancel</button>
                 </div>
                 </form>
             </div>
