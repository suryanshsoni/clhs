<?php
if(isset($_POST['addnewteambtn'])){
    $players=$_POST['selectedPlayers'];
    $name=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']) ;
    $captain=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['captain']) ;
    
    $query = "INSERT INTO teams(t_name,t_captain_id,t_league_id) VALUES ('".$name."',".$captain.",".$GLOBALS['leagueid'].");";
    //echo $query.'<br>';
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    
    $query="select t_id from teams where t_name='".$name."' and t_league_id= ".$GLOBALS['leagueid'].";";
    //echo $query.'<br>';
    $team_id=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],$query ))['t_id'];
    //echo "Team id is ".$team_id.'<br>';
    
    foreach($players as $player){
        $query="delete from plays_for where player_id=".$player." and league_id=".$GLOBALS['leagueid'].";";
       // echo $query.'<br>';
        mysqli_query($GLOBALS["___mysqli_ston"], $query);
        
        $query="insert into plays_for values(".$player.",".$team_id.",".$GLOBALS['leagueid'].");";
        //echo $query.'<br>';
        mysqli_query($GLOBALS["___mysqli_ston"], $query);
    }
       
?>
                    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       <?php echo $name ?> added to records Successfully!
                        <br>
                        </span>
                   </h3>
<?php
}
?>
<style>
    .well .btn-circle {
    padding: 18px 28px;
    font-size: 22px;
    border-radius: 100%;

    }
</style>
<h1 class="container text-center" style="margin-top:30px;">Add New Team</h1>
             <hr>
             <div class="container">
                <div class="row">
                    <div class="container col-lg-offset-3 col-lg-6">
                     <div class="well ">
                        <div class="text-center">
                         <!-- Colored FAB button -->
                            <button class="btn btn-success btn-fab">
                            T
                            </button>
                             <h4><strong>Team Details</strong></h4>
                        </div>
                         <div>
                            <!--form starts-->
                    <form action="" method="post" onsubmit="return submitForm();">
                        <div class="form-group label-floating">
                            <label for="name" class="control-label">Team's Name</label>
                            <input type="text" name="name" required class="form-control">
                        </div>
                       
                        <div class="form-group">
                                 <div class="row">
                                        <div class="form-group col-lg-5">
                                            <label for="availablePlayers[]" >Available Players</label>
                                            <select class="form-control" name="availablePlayers[]" size="10"  id="availablePlayers"  multiple="multiple">;
                                                 <?php
                                                    $query="SELECT p_id,p_name from players where p_id not in(select distinct player_id from plays_for where league_id=".$GLOBALS['leagueid'].");";
                                                    $query=mysqli_query($GLOBALS["___mysqli_ston"], $query);

                                                    if(mysqli_num_rows($query)){

                                                        while($result=mysqli_fetch_assoc($query)){
                                                            echo "<option  value='".$result['p_id']."'>".$result['p_name']."()</option>";
                                                            //echo $result['p_name']."<br>";
                                                        }
                                                    }

                                                    $query="SELECT p_id,p_name,t_name from players p,plays_for pf,teams t where pf.player_id=p.p_id and pf.team_id=t.t_id and league_id=".$GLOBALS['leagueid'].";";
                                                    echo $query;
                                                    $query=mysqli_query($GLOBALS["___mysqli_ston"], $query);

                                                    if(mysqli_num_rows($query)){

                                                        while($result=mysqli_fetch_assoc($query)){
                                                            echo "<option value='".$result['p_id']."'>".$result['p_name']."(".$result['t_name'].")</option>";
                                                            //echo $result['p_name']."<br>";
                                                        }
                                                    }


                                          ?>
                                            </select>
                                        </div>
                                            <div class="container col-lg-2" style="padding-top: 50px;">
                                            <input type="button" class="btn btn-primary" value=">>" onclick="javascript:moveToRight();" role="button" aria-disabled="false">
                                            <br>
                                            <br>
                                            <input type="button" value="<<" onclick="javascript:moveToLeft();" class="btn btn-primary" role="button" aria-disabled="false">
                                        </div>
                                        <div class="col-lg-5">
                                            <label for="selectedPlayers[]" >Selected Players</label>
                                            <select class="form-control" name="selectedPlayers[]" size="10"  id="selectedPlayers"  multiple>;

                                            </select>
                                        </div>
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="captain" class="control-label">Captain</label>
                                <select name="captain" id="captain"  class="form-control">

                                </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" name="addnewteambtn">Add Team</button>
                            <button type="button" class="btn btn-default" onclick="redirect();"name="canceladdteambtn">Cancel</button>
                       </div>
                    </form>  
                            <!--form ends-->
                         </div>
                     </div>
                    </div>
                 </div>
                 
             </div>
              <!--container ends-->

          