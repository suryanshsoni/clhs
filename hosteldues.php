<!DOCTYPE html>
<?php
if(isset($_POST['goback'])){
    header("Location: admin_home.php");
    die;
}
  
?>

<h1 class="container text-center" style="margin-top:30px;">Charge Miscellaneous Dues</h1>
<hr>
    <div class="container ">
    <div class="section ">
        <div class="container text-center">
            <form action="" class="form-inline " method="post">
                <div clas="row">
                    
                
                    
                 
                    
                
                <div class="form-group " style="padding-left: 2px;"> 
                    <label for="selecttype">Search By</label>
                                                <select name="selecttype" class="form-control">
                                                    <option value="year">Year</option>
                                                    <option value="branch">Branch</option>
                                                    <option value="name">Name</option>
                                                </select>
                                                
                    </div>
              
               
                <div class="form-group" style="padding-left: 2px;">
                        <label for="search" class="control-label">Search Term</label>
                        <input type="text" name="search" class="form-control" placeholder="year/branch/Name">
                </div>
                <button  type="submit" name="multistudentsearch" class=" btn btn-primary">
                     Search
                </button>
                   
                </div>
                <?php
               
                       
                    if(isset($_POST['multistudentsearch'])){
                         $criteria=$_POST['selecttype'];
                         $searchterm=$_POST['search'];
                         //echo $criteria;
                        $query;
                        switch ($criteria){
                         case 'year':{
                             $query="Select enrollmentno,Name,current_year,roomno from students where current_year=".$searchterm.";";
                            }break;
                         case 'branch':{
                             $query="Select enrollmentno,Name,current_year,roomno from students where branch like '%".$searchterm."%';";
                            }break;
                         case 'name':{
                             $query="Select enrollmentno,Name,current_year,roomno from students where Name like '%".$searchterm."%';";
                            }break;
                        }
                        
                        
                ?>
                <div class="col-lg-offset-3" style="padding-top: 25px;">
                <table class="mdl-data-table mdl-js-data-table  ">
  <thead>
    <tr>
        <th>Select</th>
      <th >Enrollment Number</th>
      <th>Name</th>
      <th>Year</th>
      <th>Room Number</th>
    </tr>
  </thead>
  <tbody>
      <?php
        //echo $query;
        $query=  mysqli_query($GLOBALS["___mysqli_ston"], $query);
        while($row=  mysqli_fetch_assoc($query)){
      ?>
        <tr>
          <td>
              <input class="checkbox" type="checkbox" name="enrolls[]" value="<?php echo $row['enrollmentno']?>" />
             
              </td>
          <td><?php echo $row['enrollmentno'];?></td>
          <td><?php echo $row['Name'];?></td>
          <td><?php echo $row['current_year'];?></td>
          <td><?php echo $row['roomno'];?></td>
        </tr>
      <?php
        }
      ?>
    
  </tbody>
</table>
                </div>
                <div style="padding-top:15px;">
                 <div class="form-group "  >
                        <label for="amount" class=" control-label">Enter Amount</label>
                        <input type="number" name="amount" class="form-control">
                </div>
                 <div class="form-group "  >
                        <label for="reason" class=" control-label">Reason</label>
                        <input type="text" name="reason" class="form-control">
                </div>
                <div class="" style="padding-top:15px;">
                 <button  type="submit" name="chargeduesbtn" class=" btn btn-primary">
                     Charge Dues
                </button>
                </div>
                </div>
              <?php
                    }
                    if(isset($_POST['chargeduesbtn'])){
                        $enos= $_POST['enrolls'];
                        $amount=$_POST['amount'];
                        $reason=$_POST['reason'];
                        //echo $amount." ".$reason;
                      if(empty($enos)) 
                      {
                        echo("You didn't select any student!!.");
                      } 
                      else
                      {
                        $N = count($enos);

                        //echo("You selected $N door(s): ");
                        for($i=0; $i < $N; $i++)
                        {
                          $query1="update students set other=other+". $amount." where enrollmentno='".$enos[$i]."';";
                         // echo $query1;
                          $query2="update students set reason='".$reason."' where enrollmentno='".$enos[$i]."';";
                         //echo $query2;
                          if(!mysqli_query($GLOBALS["___mysqli_ston"], $query1))
                              echo (($___mysqli_res = mysqli_connect_error()));
                          if(!mysqli_query($GLOBALS["___mysqli_ston"], $query2))
                              echo (($___mysqli_res = mysqli_connect_error()));
                          
                              
                          
                        }?>
                <div class="well col-lg-offset-4 col-lg-4" style="margin-top: 30px;">
                        <div class="conatiner text-center">
                                        <h4> 
                                            <icon class="fa fa-check"></icon>
                                            Dues have been charged successfully! 
                                            <br>
                                         </h4>
                           
                            
                            <button name="goback" type="submit" class="btn btn-success">
                                            <icon class="fa fa-backward"></icon>    
                                            Go Back
                                            </button>
                                      
                      </div>
                </div>
                <?php
                      }
              }
             
              
              ?>
            </form>
           
        </div>
    </div>
    </div>