<?php
if(isset($_POST['addnewplayerbtn'])){
    $name=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']) ;
    $dob=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['date']) ;

    $battingstyle= mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['battingstyle']) ;
    $bowlingstyle= mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['bowlingstyle']) ;

    $query = "INSERT INTO players (p_name,p_dob,p_batting_style,p_bowling_style) VALUES ('".$name."','".$dob."','".$battingstyle."','".$bowlingstyle."'".");";
    //print($query);
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
?>
                    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       Player added to records Successfully!
                        <br>
                        </span>
                   </h3>
<?php
}
if(isset($_POST['canceladdplayerbtn'])){

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
<h1 class="container text-center" style="margin-top:30px;">Add New Player</h1>
             <hr>
             <div class="container">
                 <form action=""  method="post">
                 <div class="row">
                     <div class="container col-lg-6">
                     <div class="well ">
                         <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary">
                              <i class="material-icons"></i>1
                            </button>
                             <h4><strong>Basic Details</strong></h4>
                         </div>
                            <!--form-->

                    <div class="form-group">
                        <label for="title" class="control-label">Enter Name</label>
                        <input type="text" required name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="date" class="control-label">Enter Date Of Birth</label>
                        <input type="date" required name="date" class="form-control">
                    </div>

                     </div>

                     </div>


                     <!--container ends-->
                     <div class="container col-lg-6">
                     <div class="well ">
                         <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                              <i class="material-icons"></i>2
                            </button>
                             <h4><strong>Player Profile</strong></h4>
                         </div>
                            <!--form-->

                            <div class="form-group">
                                <label for="battingstyle" class="control-label">Batting Style</label>
                                    <select name="battingstyle" class="form-control">
                                        <option>Right Hand Batsman</option>
                                        <option>Left Hand Batsman</option>
                                    </select>
				            </div>


                            <div class="form-group">
                                <label for="bowlingstyle" class="control-label">Bowling Style</label>
                                 <select name="bowlingstyle" class="form-control">
                                     <option>Right Hand Fast</option>
                                     <option>Right Hand Slow</option>
                                     <option>Right Hand Medium</option>
                                     <option>Right Hand Off Spin</option>
                                     <option>Right Hand Leg Spin</option>
                                     <option>Left Hand Fast</option>
                                     <option>Left Hand Slow</option>
                                     <option>Left Hand Medium</option>
                                     <option>Left Hand  Off Spin</option>
                                  </select>
                            </div>


                     </div>

                     </div>
                     <!--conatienr ends-->
                 </div>
                 <div class="container text-center">
                     <button type="submit" class="btn btn-primary" name="addnewplayerbtn">Add Player</button>
                     <button type="submit" class="btn btn-default" name="canceladdplayerbtn">Cancel</button>
                 </div>
                 </form>
             </div>
