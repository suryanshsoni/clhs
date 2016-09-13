<?php
if(isset($_POST['addnewleaguebtn'])){
    $name=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']) ;
    $overs=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['overs']) ;
    $points=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['points']) ; 
    $start=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['date']) ; 
   
    
    $query = "INSERT INTO leagues(l_name,l_overs,l_win_points,l_start_date) VALUES ('".$name."',".$overs.",".$points.",'".$start."');";
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
if(isset($_POST['canceladdleaguebtn'])){

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
<h1 class="container text-center" style="margin-top:30px;">Add New League</h1>
             <hr>
             <div class="container">
                 <form action=""  method="post">
                 <div class="row">
                     <div class="container col-lg-offset-3 col-lg-6">
                     <div class="well ">
                         <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary">
                              <i class="material-icons"></i>L
                            </button>
                             <h4><strong>League Details</strong></h4>
                         </div>
                            <!--form-->

                    <div class="form-group">
                        <label for="name" class="control-label">League's Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    
                            
                    <div class="form-group">
                        <label for="overs" class="control-label">Maximum Overs</label>
                        <select class="form-control" name="overs">
                          <option value="" disabled selected>Choose your option</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            <option value='13'>13</option>
                            <option value='14'>14</option>
                            <option value='15'>15</option>
                            <option value='16'>16</option>
                            <option value='17'>17</option>
                            <option value='18'>18</option>
                            <option value='19'>19</option>
                            <option value='20'>20</option>

                        </select>
                        
                    </div>
                          
                    <div class="form-group">
                        <label for="country" class="control-label">Win Points</label>
                        <input type="number" name="points" min="0" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="date" class="control-label">Start Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                            
                     </div>

                     </div>

                     <!--container ends-->
                     
                 </div>
                 <div class="container text-center">
                     <button type="submit" class="btn btn-primary" name="addnewleaguebtn">Create League</button>
                     <button type="submit" class="btn btn-default" name="canceladdleaguebtn">Cancel</button>
                 </div>
                 </form>
             </div>
