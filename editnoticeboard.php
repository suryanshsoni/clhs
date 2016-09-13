<h1 class="container text-center" style="margin-top:30px;">Edit Notice Board</h1>
             <hr>

<div class="container">
    <div class="col-lg-6">
        <form action="./postnotice.php" method="post">
                            <div class="text-center">
                                <h3><strong> Add new notice </strong></h3>
                            </div>
				<div class="form-group">
					<label for="title" class="control-label">Enter title</label>
					<input type="text" name="title" class="form-control">
				</div>
				
				
				<div class="form-group">
					<label for="issuer" class="control-label">Enter issuer</label>
					<input type="text" name="issuer" class="form-control">
				</div>
				
                                <div class="form-group">
                                        
					<label for="date" class="control-label">Enter Date</label>
                                        <input type="date" name="date" class="form-control">
				</div>
                                <div class="form-group ">
					<label for="content" class="control-label">Enter notice content</label>
                                        <textarea cols="50" rows="10" name="content" class="form-control"></textarea>
				</div>
                                
                                 <div class="form-group">
                                                <label for="displayat">Display at position</label>
                                                <select name="displayat" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                </select>
                                            </div>
            <button type="submit" name="submitnoticebtn" class="btn btn-info"><i class="fa fa-check"></i>
                                 Submit
                                </button>
			</form>
</div>

             <div class="col-lg-6">
                 <div class="text-center">
                                <h3><strong> Current Notice Board Content </strong></h3>
                 </div>
                 <div class="well">
                <!--panel starts-->
                         <div class="panel panel-default panel-primary">
                             <div class="panel-heading"><h3 class="panel-title"><strong>
                                     Position 1    
                                     </strong></h3></div>
				<div class="panel-body ">
                                     <?php
                                         
                                          $noticequery="select title from notices where displayat=1;";
                                          //print("\n".$noticequery);
                                            $title="";
                                            
                                            $result=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $noticequery));
                                            if($result){
                                                echo $result['title'];
                                                 
                                            }
                                            else
                                                echo (($___mysqli_res = mysqli_connect_error()));
                                            
//                                         ?>
				</div>
                         </div>          
                    
            <!--panel ends-->
            <!--panel starts-->
                         <div class="panel panel-default panel-primary">
                             <div class="panel-heading"><h3 class="panel-title"><strong>
                                     Position 2    
                                     </strong></h3></div>
				<div class="panel-body ">
                                     <?php
                                         
                                          $noticequery="select title from notices where displayat=2;";
                                          //print("\n".$noticequery);
                                           
                                            
                                            $result=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $noticequery));
                                            if($result){
                                                echo $result['title'];
                                                 
                                            }
                                            else
                                                echo (($___mysqli_res = mysqli_connect_error()));
                                            
//                                         ?>
				</div>
                         </div>          
                   
            <!--panel ends-->
            <!--panel starts-->
                         <div class="panel panel-default panel-primary">
                             <div class="panel-heading"><h3 class="panel-title"><strong>
                                     Position 3 
                                     </strong></h3></div>
				<div class="panel-body ">
                                     <?php
                                         
                                          $noticequery="select title from notices where displayat=3;";
                                          //print("\n".$noticequery);
                                           
                                            
                                            $result=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $noticequery));
                                            if($result){
                                                echo $result['title'];
                                                 
                                            }
                                            else
                                                echo (($___mysqli_res = mysqli_connect_error()));
                                            
//                                         ?>
				</div>
                         </div>          
                    
            <!--panel ends-->
            <!--panel starts-->
                         <div class="panel panel-default panel-primary">
                             <div class="panel-heading"><h3 class="panel-title"><strong>
                                     Position 4   
                                     </strong></h3></div>
				<div class="panel-body ">
                                     <?php
                                         
                                          $noticequery="select title from notices where displayat=4;";
                                          //print("\n".$noticequery);
                                           
                                            
                                            $result=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $noticequery));
                                            if($result){
                                                echo $result['title'];
                                                 
                                            }
                                            else
                                                echo (($___mysqli_res = mysqli_connect_error()));
                                            
//                                         ?>
				</div>
                         </div>          
                    
            <!--panel ends-->
                 </div>
                  </div>
    </div>
             </div>             
</div>


