<!DOCTYPE html>
<?php
if(isset($_POST['search_donebtn'])){
    echo $opt;
    switch($opt){
        case 'updateumpire':{
          //  echo 'umpire update go'." ".$_POST['selected_umpire'];
         header ("Location: ./admin_home.php?option=modifyumpire&umpire=".$_POST['selected_umpire']);
        }break;
        case 'deleteumpire':{
          //  echo 'umpire update go'." ".$_POST['selected_umpire'];
         header ("Location: ./admin_home.php?option=removeumpire&umpire=".$_POST['selected_umpire']);
        }break;
        
        case 'viewumpire':{
            header ("Location: ./admin_home.php?option=displayumpire&umpire=".$_POST['selected_umpire']);
            
        }break;
    }
    die;
}
?>

<h1 class="container text-center" style="margin-top:30px;">Select umpire</h1>

             <hr>
             
             <div class="well">
                
                 <div class="container text-center"style="padding-right:0px;">
                    
                    <form  method="post" class="form-inline">
		    <div class="form-group"> 
                         <strong>Enter Umpire's Name</strong>
                         
                    <input type="text" class="form-control" name="searchterm" placeholder="Umpire's Name ">
                    </div>
				<button type="submit" name="searchumpirebtn" class="btn btn-primary">Search </button>
		    </form>
                     <?php
                     if(isset($_POST['searchumpirebtn'])){
                        
                         $searchname=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['searchterm']);
                         $umpirequery=  getumpire($searchname);
                         if(mysqli_num_rows($umpirequery)){
                         ?>
                 </div>
                            <br><br>
                    <div class="row">
                        <form action="" method="post">
                        <div  class="text-left container col-lg-offset-2 col-lg-8 ">
                            
				<table  class="table table-striped table-bordered table-condensed">
                                  <thead class="thead-inverse">
                                    <tr>
                                      <th style="width:33%">Umpire ID</th>
                                      <th style="width:33%">Umpire Name</th>
                                      <th style="width:33%">Experience</th>
                                      
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                         <?php
                            while($umpire=  mysqli_fetch_assoc($umpirequery)){
                             $umpire_name=$umpire['u_name'];
                             $experience=$umpire['u_experience'];
                             $umpire_id=$umpire['u_id'];
                           ?>
                                      <tr>
                                        <td class="text-left">
                                             <div class="radio-inline">
                                                    <label>
                                                   <input type="radio" checked value="<?php echo $umpire_id?>" name="selected_umpire">
                                                    <?php echo $umpire_id ?>
                                                    </label>
                                                        </div>
                                        </td>
                                      <td><?php echo $umpire_name ?></td>
                                      <td><?php echo $experience ?></td>
                                      
                                  
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
        