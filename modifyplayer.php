<?php 
    $player_id=$_GET['player'];
    $query="select *from players where p_id='".$player_id."';";
   // echo $query;
    $row=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $query));
        
        $name=$row['p_name'];
        $dob=$row['p_dob'];
        $batting_style=$row['p_batting_style'];
        $bowling_style=$row['p_bowling_style'];
        

   //echo $address;
   //echo $dob;
    
?>

<?php
if(isset($_POST['modifyplayersbtn'])){
    
    $query="delete from players where p_id='".$player_id."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    $name=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']) ;
    $dob=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['date']) ;

    $battingstyle= mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['battingstyle']) ;
    $bowlingstyle= mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['bowlingstyle']) ;

    $query = "INSERT INTO players (p_id,p_name,p_dob,p_batting_style,p_bowling_style) VALUES (".$player_id.",'".$name."','".$dob."','".$battingstyle."','".$bowlingstyle."'".");";
    //print($query);
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


<h1 class="container text-center" style="margin-top:30px;">Modify players</h1>

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
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?>">
                    </div>

                    <div class="form-group">
                        <label for="date" class="control-label">Enter Date Of Birth</label>
                        <input type="date" name="date" class="form-control" value="<?php echo $dob ?>">
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
                                        <option <?php if($batting_style=="Right Hand Batsman") echo 'selected';?> >Right Hand Batsman</option>
                                        <option <?php if($batting_style=="Left Hand Batsman") echo 'selected';?> >Left Hand Batsman</option>
                                    </select>
				            </div>


                            <div class="form-group">
                                <label for="bowlingstyle" class="control-label">Bowling Style</label>
                                 <select name="bowlingstyle" class="form-control">
                                     <option <?php if($bowling_style=="Right Hand Fast") echo 'selected';?>>Right Hand Fast</option>
                                     <option <?php if($bowling_style=="Right Hand Slow") echo 'selected';?>>Right Hand Slow</option>
                                     <option <?php if($bowling_style=="Right Hand Medium") echo 'selected';?>>Right Hand Medium</option>
                                     <option <?php if($bowling_style=="Right Hand Off Spin") echo 'selected';?>>Right Hand Off Spin</option>
                                     <option <?php if($bowling_style=="Right Hand Leg Spin") echo 'selected';?>>Right Hand Leg Spin</option>
                                     <option <?php if($bowling_style=="Left Hand Fast") echo 'selected';?>>Left Hand Fast</option>
                                     <option <?php if($bowling_style=="Left Hand Slow") echo 'selected';?>>Left Hand Slow</option>
                                     <option <?php if($bowling_style=="Left Hand Medium") echo 'selected';?>>Left Hand Medium</option>
                                     <option <?php if($bowling_style=="Left Hand  Off Spin") echo 'selected';?>>Left Hand  Off Spin</option>
                                  </select>
                            </div>


                     </div>

                     </div>
                     <!--container ends-->
                </div>
                 <div class="container text-center">
                     <button type="submit" class="btn btn-primary" name="modifyplayersbtn">Save changes</button>
                     <button type="submit" class="btn btn-default" name="cancelmodifyplayersbtn">Cancel</button>
                 </div>
                 </form>
             </div>
