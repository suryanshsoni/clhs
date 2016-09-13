<!DOCTYPE html>
<?php
if(isset($_POST['search_donebtn'])){
    echo $opt;
    switch($opt){
        case 'updateleague':{
          //  echo 'league update go'." ".$_POST['selected_league'];
         header ("Location: ./admin_home.php?option=modifyleague&league=".$_POST['selected_league']);
        }break;
        case 'deleteleague':{
          //  echo 'league update go'." ".$_POST['selected_league'];
         header ("Location: ./admin_home.php?option=removeleague&league=".$_POST['selected_league']);
        }break;
        
        case 'viewleague':{
            header ("Location: ./admin_home.php?option=displayleague&league=".$_POST['selected_league']);
            
        }break;
    }
    die;
}
?>

<h1 class="container text-center" style="margin-top:30px;">Select league</h1>

             <hr>
             
             <div class="well">
                
                 <div class="container text-center"style="padding-right:0px;">
                    
                    <form  method="post" class="form-inline">
		    <div class="form-group"> 
                         <strong>Enter League's Name</strong>
                         
                    <input type="text" class="form-control" name="searchterm" placeholder="League's Name ">
                    </div>
				<button type="submit" name="searchleaguebtn" class="btn btn-primary">Search </button>
		    </form>
                     <?php
                     if(isset($_POST['searchleaguebtn'])){
                        
                         $searchname=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['searchterm']);
                         $leaguequery=  getleague($searchname);
                         if(mysqli_num_rows($leaguequery)){
                         ?>
                 </div>
                            <br><br>
                    <div class="row">
                        <form action="" method="post">
                        <div  class="text-left container col-lg-offset-2 col-lg-8 ">
                            
				<table  class="table table-striped table-bordered table-condensed">
                                  <thead class="thead-inverse">
                                    <tr>
                                      <th style="width:10%"></th>
                                      <th style="width:45%">League Name</th>
                                      <th style="width:45%">Start Date</th>
                                      
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                         <?php
                            while($league=  mysqli_fetch_assoc($leaguequery)){
                             $league_id=$league['l_id'];
                             $league_name=$league['l_name'];
                             $start=$league['l_start_date'];
                           ?>
                                      <tr>
                                        <td class="text-left">
                                             <div class="radio-inline" >
                                                    <label>
                                                   <input type="radio" style="margin-top :-6px;" value="<?php echo $league_id?>" name="selected_league" checked >
                                                    </label>
                                                        </div>
                                        </td>
                                      <td><?php echo $league_name ?></td>
                                      <td><?php echo $start ?></td>
                                      
                                  
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
        