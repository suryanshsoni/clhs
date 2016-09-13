<!DOCTYPE html>
<?php
if(isset($_POST['search_donebtn'])){
    echo $opt;
    switch($opt){
        case 'updateground':{
          //  echo 'ground update go'." ".$_POST['selected_ground'];
         header ("Location: ./admin_home.php?option=modifyground&ground=".$_POST['selected_ground']);
        }break;
        case 'deleteground':{
          //  echo 'ground update go'." ".$_POST['selected_ground'];
         header ("Location: ./admin_home.php?option=removeground&ground=".$_POST['selected_ground']);
        }break;
        
        case 'viewground':{
            header ("Location: ./admin_home.php?option=displayground&ground=".$_POST['selected_ground']);
            
        }break;
    }
    die;
}
?>

<h1 class="container text-center" style="margin-top:30px;">Select ground</h1>

             <hr>
             
             <div class="well">
                
                 <div class="container text-center"style="padding-right:0px;">
                    
                    <form  method="post" class="form-inline">
		    <div class="form-group"> 
                         <strong>Enter Ground's Name</strong>
                         
                    <input type="text" class="form-control" name="searchterm" placeholder="Ground's Name ">
                    </div>
				<button type="submit" name="searchgroundbtn" class="btn btn-primary">Search </button>
		    </form>
                     <?php
                     if(isset($_POST['searchgroundbtn'])){
                        
                         $searchname=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['searchterm']);
                         $groundquery=  getground($searchname);
                         if(mysqli_num_rows($groundquery)){
                         ?>
                 </div>
                            <br><br>
                    <div class="row">
                        <form action="" method="post">
                        <div  class="text-left container col-lg-offset-2 col-lg-8 ">
                            
				<table  class="table table-striped table-bordered table-condensed">
                                  <thead class="thead-inverse">
                                    <tr>
                                      <th style="width:25%">Ground ID</th>
                                      <th style="width:25%">Ground Name</th>
                                      <th style="width:25%">City</th>
                                      <th style="width:25%">Country</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                         <?php
                            while($ground=  mysqli_fetch_assoc($groundquery)){
                             $ground_name=$ground['g_name'];
                             $city=$ground['g_city'];
                             $country=$ground['g_country'];
                             $ground_id=$ground['g_id']
                           ?>
                                      <tr>
                                        <td class="text-left">
                                             <div class="radio-inline">
                                                    <label>
                                                   <input type="radio" checked value="<?php echo $ground_id?>" name="selected_ground">
                                                    <?php echo $ground_id ?>
                                                    </label>
                                                        </div>
                                        </td>
                                      <td><?php echo $ground_name ?></td>
                                      <td><?php echo $city ?></td>
                                      <td><?php echo $country ?></td>
                                  
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
        