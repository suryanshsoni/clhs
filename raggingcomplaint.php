

    <h1 class="container text-center" style="margin-top:30px;">Register Complaint</h1>
             <hr>

<div class="container">
    <div class="col-lg-offset-3 col-lg-6">
        <form action="" method="post">
                            
                            <div class="text-center">
                                <h3><strong> New Ragging  Complaint </strong></h3>
                                <?php
                    if(isset($_POST['submithcomplaintbtn'])){
                     $title=$_POST['title'];
                     $content=   mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['content']) ;
                     $content=  wordwrap($content,20,"\n");
                     $location=$_POST['timedate'];

                     $query="insert into complaints(title,content,location,status,type,student_enroll) values('".$title."','".$content."','".$location."','pending','ragging','".$enroll."');";
                    // echo $query;
                     mysqli_query($GLOBALS["___mysqli_ston"], $query);
                ?>
                    <div class="conatiner text-center">
                                        <h4> 
                                            <icon class="fa fa-check"></icon>
                                            Your Complaint has been registered !<br>Keep track of your complaint from your dashboard.<br><br>Don't worry,your identity will not be revealed.
                                            <br>
                                         </h4>
                                        <a href="index.php">
                                            <button class="btn btn-success">
                                            <icon class="fa fa-backward"></icon>    
                                                Go Back</button>
                                        </a>
                                        </div>
                <?php
                    die;
                    }
                ?>
                            </div>
				<div class="form-group">
					<label for="title" class="control-label">Name of the senior</label>
                                        <input type="text" name="title" class="form-control" >
				</div>
				
				 <div class="form-group ">
					<label for="content" class="control-label">Details of the event</label>
                                        <textarea cols="20" rows="10" name="content" class="form-control"></textarea>
				</div>
            
				<div class="form-group">
					<label for="timedate" class="control-label">Time and Date of occurence</label>
					<input type="text" name="timedate" class="form-control">
				</div>
				
                                
                               
                                
                                
                                <button type="submit" name="submithcomplaintbtn" class="btn btn-info"><i class="fa fa-check"></i>
                                 Submit
                                </button>
			</form>
</div>

           
    </div>
             

