<!DOCTYPE html>
<?php
if(isset($_POST['goback'])){
    header("Location: admin_home.php");
    die;
}
  
?>

<h1 class="container text-center" style="margin-top:30px;">Charge Hostel/Mess Dues</h1>
<hr>
            <div class="container text-center"style="padding-right:0px;">
                    <strong>Select due type,and enter the due amount to apply on all students.</strong>
                    
                 </div>
<br>
    <div class="container ">
    <div class="section ">
        <div class="container text-center">
            <form action="" class="form-inline " method="post">
                <div clas="row">
                    
                
                    
                 
                    
                
                <div class="form-group " style="padding-left: 2px;"> 
                    <label for="selecttype">Due type</label>
                                                <select name="selecttype" class="form-control">
                                                    <option value="hostel">Hostel Due</option>
                                                    <option value="mess">Mess Due</option>
                                                   
                                                </select>
                                                
                    </div>
              
               
                <div class="form-group "style="padding-left: 10px;"  >
                        <label for="amount" class=" control-label">Enter Amount</label>
                        <input type="number" name="amount" class="form-control">
                </div>
                <button  type="submit" name="chargeduebtn" class=" btn btn-primary">
                     Charge Dues
                </button>
                   
                </div>
                <?php
                if(isset($_POST['chargeduebtn'])){
                    $amt=$_POST['amount'];
                    $type=$_POST['selecttype'];
                    $duetype;
                    switch($type){
                        case 'hostel':{
                            $duetype='hostel';
                        }
                            break;
                        case 'mess':{
                            $duetype='mess';
                        }
                        break;
                    }
                    $query="update students set ".$duetype."=".$duetype."+".$amt.";";
if($amt>10000){
	echo "Due cannot be more than 10000";
	die;

}
                    mysqli_query($GLOBALS["___mysqli_ston"], $query);
                
               ?>
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
                ?>
               
            </form>
           
        </div>
    </div>
    </div>