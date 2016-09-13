<?php 
    $league_id=$_GET['league'];
    $query="select *from leagues where l_id='".$league_id."';";
   // echo $query;
    $row=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $query));
        
        $name=$row['l_name'];
        $overs=$row['l_overs'];
        $points=$row['l_win_points'];
        $start=$row['l_start_date'];
?>

<?php
if(isset($_POST['modifyleaguesbtn'])){
    
    $query="delete from leagues where l_id='".$league_id."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    $name=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']) ;
    $overs=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['overs']) ;
    $points=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['points']) ; 
    $start=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['date']) ; 
   
    
    $query = "INSERT INTO leagues(l_name,l_overs,l_win_points,l_start_date) VALUES ('".$name."',".$overs.",".$points.",'".$start."');";
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


<h1 class="container text-center" style="margin-top:30px;">Modify leagues</h1>

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
                             <h4><strong>League Details</strong></h4>
                         </div>
                            <!--form-->
                     
                     <div class="form-group">
                        <label for="name" class="control-label">League's Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?>">
                    </div>

                    
                            
                    <div class="form-group">
                        <label for="overs" class="control-label">Maximum Overs</label>
                        <select class="form-control" name="overs">
                          <option value="" disabled selected>Choose your option</option>
                            <option <?php if($overs==1) echo 'selected';?> value="1">1</option>
                            <option <?php if($overs==2) echo 'selected';?> value="2">2</option>
                            <option <?php if($overs==3) echo 'selected';?> value="3">3</option>
                            <option <?php if($overs==4) echo 'selected';?> value='4'>4</option>
                            <option <?php if($overs==5) echo 'selected';?> value='5'>5</option>
                            <option <?php if($overs==6) echo 'selected';?> value='6'>6</option>
                            <option <?php if($overs==7) echo 'selected';?> value='7'>7</option>
                            <option <?php if($overs==8) echo 'selected';?> value='8'>8</option>
                            <option <?php if($overs==9) echo 'selected';?> value='9'>9</option>
                            <option <?php if($overs==10) echo 'selected';?> value='10'>10</option>
                            <option <?php if($overs==11) echo 'selected';?> value='11'>11</option>
                            <option <?php if($overs==12) echo 'selected';?> value='12'>12</option>
                            <option <?php if($overs==13) echo 'selected';?> value='13'>13</option>
                            <option <?php if($overs==14) echo 'selected';?> value='14'>14</option>
                            <option <?php if($overs==15) echo 'selected';?> value='15'>15</option>
                            <option <?php if($overs==16) echo 'selected';?> value='16'>16</option>
                            <option <?php if($overs==17) echo 'selected';?> value='17'>17</option>
                            <option <?php if($overs==18) echo 'selected';?> value='18'>18</option>
                            <option <?php if($overs==19) echo 'selected';?> value='19'>19</option>
                            <option <?php if($overs==20) echo 'selected';?> value='20'>20</option>

                        </select>
                        
                    </div>
                          
                    <div class="form-group">
                        <label for="country" class="control-label">Win Points</label>
                        <input type="number" name="points" min="0" class="form-control" value="<?php echo $points ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="date" class="control-label">Start Date</label>
                        <input type="date" name="date" class="form-control" value="<?php echo $start ?>">
                    </div>
                            
                    

                                
                     </div>     
                         
                     </div>
                    <!--container ends-->
                     
                </div>
                 <div class="container text-center">
                     <button type="submit" class="btn btn-primary" name="modifyleaguesbtn">Save changes</button>
                     <button type="submit" class="btn btn-default" name="cancelmodifyleaguesbtn">Cancel</button>
                 </div>
                 </form>
