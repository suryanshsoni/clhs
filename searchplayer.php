<!DOCTYPE html>
<?php
if(isset($_POST['search_donebtn'])){
    echo $opt;
    switch($opt){
        case 'updateplayer':{
          //  echo 'player update go'." ".$_POST['selected_player'];
         header ("Location: ./admin_home.php?option=modifyplayer&player=".$_POST['selected_player']);
        }break;
        case 'deleteplayer':{
          //  echo 'player update go'." ".$_POST['selected_player'];
         header ("Location: ./admin_home.php?option=removeplayer&player=".$_POST['selected_player']);
        }break;
        case 'addaccount':{
          //  echo 'player update go'." ".$_POST['selected_player'];
         header ("Location: ./admin_home.php?option=createaccount&player=".$_POST['selected_player']);
        }break;
        case 'viewplayer':{
            header ("Location: ./admin_home.php?option=displayplayer&player=".$_POST['selected_player']);
            
        }break;
    }
    die;
}
?>

<h1 class="container text-center" style="margin-top:30px;">Select player</h1>

             <hr>
             
             <div class="well">
                
                 <div class="container text-center"style="padding-right:0px;">
                    
                    <form  method="post" class="form-inline">
		    <div class="form-group"> 
                         <strong>Enter Player's Name</strong>
                         
                    <input type="text" class="form-control" name="searchterm" placeholder="Player's Name ">
                    </div>
				<button type="submit" name="searchplayerbtn" class="btn btn-primary">Search </button>
		    </form>
                     <?php
                     if(isset($_POST['searchplayerbtn'])){
                        
                         $searchname=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['searchterm']);
                         $playerquery=  getplayer($searchname);
                         if(mysqli_num_rows($playerquery)){
                         ?>
                 </div>
                            <br><br>
                    <div class="row">
                        <form action="" method="post">
                        <div  class="text-left container col-lg-offset-2 col-lg-8 ">
                            
				<table  class="table table-striped table-bordered table-condensed">
                                  <thead class="thead-inverse">
                                    <tr>
                                      <th style="width:20%">Player ID</th>
                                      <th style="width:20%">Name</th>
                                      <th style="width:20%">Team</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                         <?php
                            while($player=  mysqli_fetch_assoc($playerquery)){
                             $player_name=$player['p_name'];
                             $team_id=$player['p_team_id'];
                             $player_id=$player['p_id']
                           ?>
                                      <tr>
                                        <td class="text-left">
                                             <div class="radio-inline">
                                                    <label>
                                                   <input type="radio" checked value="<?php echo $player_id?>" name="selected_player">
                                                    <?php echo $player_id ?>
                                                    </label>
                                                        </div>
                                        </td>
                                      <td><?php echo $player_name ?></td>
                                      <td><?php echo $team_id ?></td>
                                  
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
        