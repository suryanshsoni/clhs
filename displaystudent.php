<!DOCTYPE html>
<?php

    $enrollment=$_GET['student'];
    $query="select *from students where enrollmentno='".$enrollment."';";
  
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
        $hdues=$row['hostel'];
        $mdues=$row['mess'];
        $odue=$row['other'];
        $reason=$row['reason'];
?>


<h1 class="container text-center" style="margin-top:30px;">Student Details</h1>

             <hr>
             
<!-- Square card -->
<style>
.demo-card-square.mdl-card {
  width: 200px;
  height: auto;
}
.demo-card-square > .mdl-card__title {
 
  color: #fff;
  background:
  #46B6AC;
  
}
.demo-list-item {
  width: 300px;
}
</style>
<div class="row">
        <div class="conatiner col-lg-3">
<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title ">
      <div class="container">
    <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary">
                              <i class="material-icons fa fa-user"></i>
                            </button>
                             <h4><strong>Basic Details</strong></h4>
                         </div>
  </div>
  </div>
 
  
              <div class="list-group">
				<a href="" class="list-group-item">Name : <?php echo $name?></a>
                                <a href="" class="list-group-item">Father: <?php echo $fname?></a>
				<a href="" class="list-group-item">Mother:<?php echo $mname?></a>
				<a href="" class="list-group-item">DOB :<?php echo $dob?></a>
			</div>
    
 
</div>
        </div>
<!-- card over-->


<div class="conatiner col-lg-3">
<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title ">
      <div class="container">
    <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary">
                              <i class="material-icons fa fa-phone"></i>
                            </button>
                             <h4><strong>Contact Details</strong></h4>
                         </div>
  </div>
  </div>
 
  <div class="list-group">
				<a href="" class="list-group-item">Mobile: <?php echo $mobile?></a>
                                <a href="" class="list-group-item">Email: <?php echo $emailid?></a>
                                <a href="" class="list-group-item">Address:<?php echo nl2br($address)?></a>
				<a href="" class="list-group-item">Parent's Mobile<?php echo $parent_mobile?>
                                </a>
			</div>

</div>
        </div>
<!-- card over-->


<div class="conatiner col-lg-3">
<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title ">
      <div class="container">
    <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary">
                              <i class="material-icons fa fa-graduation-cap"></i>
                            </button>
                             <h4><strong>Academic  Details</strong></h4>
                         </div>
  </div>
  </div>
 
   <div class="list-group">
				<a href="" class="list-group-item">Enrollment No : <?php echo $enroll?></a>
                                <a href="" class="list-group-item">Year: <?php echo $year?></a>
				<a href="" class="list-group-item">Branch:<?php echo $branch?></a>
				<a href="" class="list-group-item">Room Number:<?php echo $roomno?></a>
                                <a href="" class="list-group-item">Date of allotment:<?php echo $allotdate?></a>
			</div>
</div>
        </div>
<!-- card over-->


<div class="conatiner col-lg-3">
<div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title ">
      <div class="container">
    <div class="text-center">
                             <!-- Colored FAB button -->
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--primary">
                              <i class="material-icons fa fa-money"></i>
                            </button>
                             <h4><strong>Due Details</strong></h4>
                         </div>
  </div>
  </div>
    <div class="list-group">
				<a href="" class="list-group-item">Hostel Due : <?php echo $hdues?></a>
                                <a href="" class="list-group-item">Mess Due: <?php echo $mdues?></a>
				<a href="" class="list-group-item">Other Dues:<?php echo $odue?></a>
                                <a href="" class="list-group-item">Reason:<?php echo $reason?></a>
				
			</div>
 
</div>
        </div>
<!-- card over-->

</div>
        
                           
                       
                    
                               