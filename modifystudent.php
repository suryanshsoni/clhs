<?php 
    $enrollment=$_GET['student'];
    $query="select *from students where enrollmentno='".$enrollment."';";
   // echo $query;
    $row=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $query));
        $name=$row['Name'];
        $fname=$row['Father'];
        $mname=$row['Mother'];
        $dob=$row['dob'];
        $mobile=$row['mobile'];
        $emailid=$row['email'];
        $address=$row['address'];
        $parent_mobile=$row['parent_mobile'];
        $enroll=$row['enrollmentno'];
        $year=$row['current_year'];
        $branch=$row['branch'];
        $roomno=$row['roomno'];
        $allotdate=$row['allotmentdate'];
   //echo $address;
   //echo $dob;
    
?>

<?php
if(isset($_POST['modifystudentbtn'])){
    
    $query="delete from students where enrollmentno='".$enrollment."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    
    $name=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    $fname=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['fname']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    $mname=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['mname']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    $dob=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['date']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    
    $mobile=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['mobile']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    $emailid=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['emailid']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    $address=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['address']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    $parent_mobile=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['parent_mobile']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    
    $enrollno=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['enrollnumber']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    $year=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['current_year']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    $branch=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['branch']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    $roomno=((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['roomno']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    $allotdate=((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['allotmentdate']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    
    $query = "INSERT INTO students (Name,Father,Mother,dob,mobile,email,address,parent_mobile,enrollmentno, current_year, branch, roomno, allotmentdate) VALUES ('".$name
            . "',' ".$fname."',' ".$mname."','".$dob."',".$mobile.",' ".$emailid."','".$address."',".$parent_mobile.",' ".$enrollno."',' ".$year."',' ".$branch."', '".$roomno."', '".$allotdate."');";
   // print($query);
    mysqli_query($GLOBALS["___mysqli_ston"], $query); 
    ?>
    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       Records updated successfully! 
                        <br>
                        </span>
                   </h3>
<?php
die;
}

?>


<h1 class="container text-center" style="margin-top:30px;">Modify student</h1>

             <hr>
             <div class="container">
                 <form action=""  method="post">
                 <div class="row">
                     <div class="container col-lg-4">
                     <div class="well ">
                         <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary">
                              <i class="material-icons"></i>1
                            </button>
                             <h4><strong>Basic Details</strong></h4>
                         </div>
                            <!--form-->
                           
                            <div class="form-group">
					<label for="title" class="control-label">Enter Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo $name;?>">
				</div>
				
				
				<div class="form-group">
					<label for="issuer" class="control-label">Enter Father's Name</label>
					<input type="text" name="fname" class="form-control" value="<?php echo $fname;?>">
				</div>
                            
                                <div class="form-group">
					<label for="issuer" class="control-label">Enter Mother's Name</label>
                                        <input type="text" name="mname" class="form-control" value="<?php echo $mname;?>">
				</div>
				
                                <div class="form-group">
                                        
					<label for="date" class="control-label">Enter Date Of Birth</label>
                                        <input type="date" name="date" class="form-control" value="<?php echo$dob; ?>">
                                        
				</div>
                                
                     </div>     
                         
                     </div>
                    
                     <!--container ends-->
                     <div class="container col-lg-4">
                     <div class="well ">
                         <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab ">
                              <i class="material-icons"></i>2
                            </button>
                             <h4><strong>Contact Details</strong></h4>
                         </div>
                            <!--form-->
                           
                            <div class="form-group">
					<label for="title" class="control-label">Mobile Number</label>
					<input type="text" name="mobile" class="form-control" value="<?php echo $mobile;?>">
				</div>
				
				
				<div class="form-group">
					<label for="issuer" class="control-label">Email address</label>
                                        <input type="email" name="emailid" class="form-control" value="<?php echo $emailid;?>">
				</div>
                            
                                <div class="form-group">
					<label for="issuer" class="control-label">Residential address</label>
                                        <textarea name='address' class="form-control" rows='2'cols='10' ><?php echo $address;?></textarea>
				</div>
				
                                <div class="form-group">
                                        
					<label for="date" class="control-label">Parent's Mobile Number</label>
                                        <input type="text" name="parent_mobile" class="form-control" value="<?php echo $parent_mobile;?>">
				</div>
                            
                     </div>     
                         
                     </div>
                     <!--container ends-->
                     <!--container ends-->
                     <div class="container col-lg-4">
                     <div class="well ">
                         <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                              <i class="material-icons"></i>3
                            </button>
                             <h4><strong>Academic Details</strong></h4>
                         </div>
                            <!--form-->
                           
                            <div class="form-group">
					<label for="title" class="control-label">Enrollment Number</label>
					<input type="text" name="enrollnumber" class="form-control" value="<?php echo $enroll;?>">
				</div>
				
				
				<div class="form-group">
					<label for="issuer" class="control-label">Year of study</label>
					<input type="number" name="current_year" class="form-control" value="<?php echo $year;?>">
				</div>
                            
                                <div class="form-group">
					<label for="issuer" class="control-label">Branch</label>
                                        <input type="text" name="branch" class="form-control" value="<?php echo $branch;?>">
				</div>
                                <div class="form-group">
					<label for="issuer" class="control-label">Room number</label>
					<input type="text" name="roomno" class="form-control" value="<?php echo $roomno;?>">
				</div>
				
                                <div class="form-group">
                                    
					<label for="date" class="control-label">Date Of Allotment</label>
                                        <input type="date" name="allotmentdate" class="form-control" value="<?php echo $allotdate;?>">
                                 
				</div>
                                
                     </div>     
                         
                     </div>
                     <!--conatienr ends-->
                 </div>
                 <div class="container text-center">
                     <button type="submit" class="btn btn-primary" name="modifystudentbtn">Save changes</button>
                     <button type="submit" class="btn btn-default" name="cancelmodifystudentbtn">Cancel</button>
                 </div>
                 </form>
             </div>
