<?php
if(isset($_POST['addnewumpirebtn'])){
    $name=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']) ;
    $experience=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['experience']) ;
   
    $query = "INSERT INTO umpires(u_name,u_experience) VALUES ('".$name."','".$experience."');";
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
if(isset($_POST['canceladdumpirebtn'])){

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
<h1 class="container text-center" style="margin-top:30px;">Add New Umpire</h1>
             <hr>
             <div class="container">
                 <form action=""  method="post">
                 <div class="row">
                     <div class="container col-lg-offset-3 col-lg-6">
                     <div class="well ">
                         <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary">
                              <i class="material-icons"></i>U
                            </button>
                             <h4><strong>Umpire Details</strong></h4>
                         </div>
                            <!--form-->

                    <div class="form-group">
                        <label for="name" class="control-label">Umpire's Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    
                            
                    <div class="form-group">
                        <label for="country" class="control-label">Experience</label>
                        <input type="number" name="experience" class="form-control">
                    </div>

                     </div>

                     </div>

                     <!--container ends-->
                     
                 </div>
                 <div class="container text-center">
                     <button type="submit" class="btn btn-primary" name="addnewumpirebtn">Add Umpire</button>
                     <button type="submit" class="btn btn-default" name="canceladdumpirebtn">Cancel</button>
                 </div>
                 </form>
             </div>
