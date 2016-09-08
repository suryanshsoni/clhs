<!DOCTYPE html>
<h1 class="container text-center" style="margin-top:30px;">My Complaints</h1>

             <hr>
             
             <div class="well">
                
                 <div class="container text-center"style="padding-right:0px;">
                    <strong>Here are your complaints.</strong>
                    
                 </div>
                            <br><br>
                            <form action="" method="post">
                    <div class="form-group">
                        <div class="col-lg-offset-2">
                        <div  class="text-center container">
                             <?php
                                        $query="select *from complaints where student_enroll='".$enroll."'";
                                        $query=  mysqli_query($GLOBALS["___mysqli_ston"], $query);
                                        if(mysqli_num_rows($query)){
                            ?>  
                                         <table class="mdl-data-table text-center">
                                         <thead>
                                            <tr>
                                              <th class="mdl-data-table__cell--non-numeric">ID</th>
											  <th>Title/Senior Name</th>
                                              <th>Content</th>
                                              <th>Location</th>
                                              <th>Type</th>
                                              <th>Status</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                        
                            <?php
                                          while($row=  mysqli_fetch_assoc($query)){
                            ?>
                                              <tr>
                                                  <td><?php echo $row['id'];?></td>
                                                  <td><?php echo $row['title'];?></td>
                                                  <td><?php echo $row['content'];?></td>
                                                  <td><?php echo $row['location'];?></td>
                                                  
                                                  <td><?php echo $row['type'];?></td>
                                                  <td><?php echo $row['status'];?></td>
                                                      
                                              </tr>
                            <?php
                                              
                                            }  
                            ?>
                                         </tbody>
                                        </table>
                                        </div>
                            <br>
                                        
                                            
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
                           
                       
                    
                               