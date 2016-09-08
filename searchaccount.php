<!DOCTYPE html>
<?php
if(isset($_POST['search_donebtn'])){
    echo $opt;
    switch($opt){
        case 'updatestudent':{
          //  echo 'student update go'." ".$_POST['selected_student'];
         header ("Location: ./admin_home.php?option=modifystudent&student=".$_POST['selected_student']);
        }break;
        case 'deletestudent':{
          //  echo 'student update go'." ".$_POST['selected_student'];
         header ("Location: ./admin_home.php?option=removestudent&student=".$_POST['selected_student']);
        }break;
    }
    die;
}
?>

<h1 class="container text-center" style="margin-top:30px;">Select student</h1>

             <hr>
             
             <div class="well">
                
                 <div class="container text-center"style="padding-right:0px;">
                    
                    <form  method="post" class="form-inline">
		    <div class="form-group"> 
                         <strong>Enter Name Or Room Number</strong>
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">Text...</label>
                           </div>
                    </div>
				<button type="submit" name="searchstudentbtn" class="btn btn-primary">Search </button>
		    </form>
                     <?php
                     if(isset($_POST['searchstudentbtn'])){
                        
                         $searchname=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['searchterm']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
                         
                         $studentquery=  getstudent($searchname);
                         if(mysqli_num_rows($studentquery)){
                         ?>
                 </div>
                            <br><br>
                    <div class="row">
                        <form action="" method="post">
                        <div  class="text-left container col-lg-offset-2 col-lg-8 ">
                            
				<table  class="table table-striped table-bordered table-condensed">
                                  <thead class="thead-inverse">
                                    <tr>
                                      <th style="width:20%">Enrollment Number</th>
                                      <th style="width:20%">Name</th>
                                      <th style="width:20%">Room Number</th>
                                      <th style="width:20%">Branch</th>
                                      <th style="width:20%">Year</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                         <?php
                            while($student=  mysqli_fetch_assoc($studentquery)){
                             $student_name=$student['Name'];
                             $roomno=$student['roomno'];
                             $branch=$student['branch'];
                             $year=$student['current_year'];
                             $enroll=$student['enrollmentno'];
                           
                     
                            ?>
                                      <tr>
                                        <td class="text-left">
                                             <div class="radio-inline">
                                                    <label>
                                                   <input type="radio" checked value="<?php echo $enroll?>" name="selected_student">
                                                    <?php echo $enroll ?>
                                                    </label>
                                                        </div>
                                        </td>
                                      <td><?php echo $student_name ?></td>
                                      <td><?php echo $roomno ?></td>
                                      <td><?php echo $branch?></td>
                                      <td><?php echo $year ?></td>
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
        