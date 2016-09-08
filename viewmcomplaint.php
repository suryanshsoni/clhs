<!DOCTYPE html>
<?php
if(isset($_POST['goback'])){
    header("Location: admin_home.php");
    die;
}
 

                    
                    if(isset($_POST['processmcomplaintbtn'])){
                        @$ids= $_POST['ids'];
                        
                        //echo $amount." ".$reason;
                      if(empty($ids)) 
                      {
                        echo("<strong>You didn't select any complaint!!.</strong>");
                      } 
                      else
                      {
                        $N = count($ids);

                        //echo("You selected $N door(s): ");
                        for($i=0; $i < $N; $i++)
                        {
                          $query="update complaints set status='processed' where id='".$ids[$i]."';";
                          //echo $query;
                         if(!mysqli_query($GLOBALS["___mysqli_ston"], $query))
                              echo ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false));
                          
                          
                              
                          
                        }
                      }
                    }
?>

<h1 class="container text-center" style="margin-top:30px;">Mess Complaints</h1>

             <hr>
             
             <div class="well">
                
                 <div class="container text-center"style="padding-right:0px;">
                    <strong>Select the complaint to be processed.</strong>
                    
                 </div>
                            <br><br>
                            <form action="" method="post">
                    <div class="form-group">
                        <div class="col-lg-offset-1">
                        <div  class="text-left container">
                             <?php
                                        $query="select *from complaints where type='ragging' order by id desc;";
                                        $query=  mysqli_query($GLOBALS["___mysqli_ston"], $query);
                                        if(mysqli_num_rows($query)){
                            ?>  
                                         <table class="mdl-data-table">
                                         <thead>
                                            <tr>
                                             <th class="mdl-data-table__cell--non-numeric">ID</th>
											  <th>Name of Senior</th>
                                              <th>Content</th>
                                              <th>Location</th>
                                              <th>Registered By</th>
                                              <th>Status</th>
                                              <th>Change status to</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        
                            <?php
                                          while($row=  mysqli_fetch_assoc($query)){
                            ?>
                                              <tr>
                                                  <td><?php echo $row['id'];?></td>
                                                  <td><?php echo $row['title'];?></td>
                                                  <td><?php echo nl2br($row['content']);?></td>
                                                  <td><?php echo $row['location'];?></td>
                                                   <td><?php echo $row['student_enroll'];?></td>
                                                  
                                                  <td><?php echo $row['status'];?></td>
                                                  <td>
                                                    <input class="checkbox" type="checkbox" name="ids[]" value="<?php echo $row['id']?>" />
                                                  </td>   
                                              </tr>
                            <?php
                                              
                                            }  
                            ?>
                                         </tbody>
                                        </table>
                                        </div>
                            <br>
                                        <div class="col-lg-offset-4">
                                         <button  type="submit" name="processmcomplaintbtn" class=" btn btn-primary">
                                             Mark as Processed
                                        </button>
                                        </div>
                                            
                            <?php
                                        
                                        }
                                        else{
                            ?>  
                                        <div class="container">
                                        <h4> 
                                            <icon class="fa fa-bell fa-2x"> All caught up!<br><small>No new complaint.</small></icon>
                                            <br>
                                            
                                            <br>
                                         </h4>
                                        </div>
                                        
                            <?php
                                        
                                        }
                             ?>
                        
                        </div>
                                
                          </div>
                               
                            </form>
                          
                          </div>
                           
                       
                    
                               