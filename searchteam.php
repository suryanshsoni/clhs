<!DOCTYPE html>
<?php
if(isset($_POST['search_donebtn'])){
    echo $opt;
    switch($opt){
        case 'updateteam':{
          //  echo 'team update go'." ".$_POST['selected_team'];
         header ("Location: ./admin_home.php?option=modifyteam&team=".$_POST['selected_team']);
        }break;
        case 'deleteteam':{
          //  echo 'team update go'." ".$_POST['selected_team'];
         header ("Location: ./admin_home.php?option=removeteam&team=".$_POST['selected_team']);
        }break;
        case 'addaccount':{
          //  echo 'team update go'." ".$_POST['selected_team'];
         header ("Location: ./admin_home.php?option=createaccount&team=".$_POST['selected_team']);
        }break;
        case 'viewteam':{
            header ("Location: ./admin_home.php?option=displayteam&team=".$_POST['selected_team']);
            
        }break;
    }
    die;
}
?>

<h1 class="container text-center" style="margin-top:30px;">Select team</h1>

             <hr>
             
             <div class="well">
                
                 <div class="container text-center"style="padding-right:0px;">
                    
                    <form  method="post" class="form-inline">
		    <div class="form-group"> 
                         <strong>Enter Team's Name</strong>
                         
                    <input type="text" class="form-control" name="searchterm" placeholder="Team's Name ">
                    </div>
				<button type="submit" name="searchteambtn" class="btn btn-primary">Search </button>
		    </form>
                     <?php
                     if(isset($_POST['searchteambtn'])){
                         $league=$GLOBALS['leagueid'];
                         $searchname=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['searchterm']);
                         $teamquery=  getteam($searchname,$league);
                         if(mysqli_num_rows($teamquery)){
                         ?>
                 </div>
                            <br><br>
                    <div class="row">
                        <form action="" method="post">
                        <div  class="text-left container col-lg-offset-2 col-lg-8 ">
                            
				<table  class="table table-striped table-bordered table-condensed">
                                  <thead class="thead-inverse">
                                    <tr>
                                      <th style="width:20%">Team #</th>
                                      <th style="width:20%">Name</th>
                                      <th style="width:20%">Captain</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                         <?php
                            while($team=mysqli_fetch_assoc($teamquery)){
                             $team_name=$team['t_name'];
                             $team_captainid=$team['t_captain_id'];
                             $captain=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"],"select p_name from players where p_id=".$team_captainid.";"))['p_name'];
                             $team_id=$team['t_id']
                           ?>
                                      <tr>
                                        <td class="text-left">
                                             <div class="radio-inline">
                                                    <label>
                                                   <input type="radio" checked value="<?php echo $team_id?>" name="selected_team">
                                                    <?php echo $team_id ?>
                                                    </label>
                                            </div>
                                        </td>
                                      <td><?php echo $team_name ?></td>
                                      <td><?php echo $captain ?></td>
                                  
                                    </tr>
                            <?php
                                  }?>
                                    </tbody>
                                </table>
                                
                                  </div>
                        <div style="padding-right:1px;"class="conatiner">
                            <br><br>
                            
                            <button  type="submit" name="search_donebtn" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                                <i class="material-icons fa fa-long-arrow-right"></i>
                            </button>
                        
                        </div>
                            </form>
                        <?php
                                  }
                                
                                else{
                                        print("<br><br><div style='color:red;'>No Record Exists!!</div>");
                                }
                            ?>
                     <?php
                     }                 
                     ?>
                    
                
             </div>
        