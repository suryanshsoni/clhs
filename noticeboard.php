<title>NoticeBoard</title>
<h1 class="container text-center" style="margin-top:30px;">Notice Board</h1>
             <hr>
<div class="container" style="padding-top: 50px;">
        <div class="row">
            <!--panel starts-->
                    <div class=" col-lg-6">
                         <div class="panel panel-default panel-primary">
                             <div class="panel-heading"><h3 class="panel-title"><strong>
                                         <?php
                                         
                                          $noticequery="select * from notices where displayat=1;";
                                          //print("\n".$noticequery);
                                            $title="";
                                            $content="";
                                            $date="";
                                            $issuer="";
                                            $result=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $noticequery));
                                            if($result){
                                                echo $result['title'];
                                                $title=$result['title'] ;
                                                $content=$result['content'];
                                                $date=$result['date'];
                                                $issuer=$result['issuer'];
                                            }
                                            else
                                                echo (($___mysqli_res = mysqli_connect_error()));
                                            
//                                         ?>
                                     </strong></h3></div>
				<div class="panel-body dashboard">
                                    <h5 class="text-center"><strong>NOTICE</strong></h5>
                                    <h5><strong>Date</strong> <?php echo $date;?> </h5>
                                     <?php echo nl2br($content);?>       
                                    
                                    <h5>Issued By: </h5><strong><?php echo nl2br($issuer)?></strong>
                                
				</div>
                         </div>          
                    </div>
            <!--panel ends-->
             <!--panel starts-->
                    <div class=" col-lg-6">
                         <div class="panel panel-default panel-primary">
                             <div class="panel-heading"><h3 class="panel-title"><strong>
                                         <?php
                                         
                                          $noticequery="select * from notices where displayat=2;";
                                          //print("\n".$noticequery);
                                            $title="";
                                            $content="";
                                            $date="";
                                            $issuer="";
                                            $result=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $noticequery));
                                            if($result){
                                                echo $result['title'];
                                                  $title=$result['title'] ;
                                               $content=$result['content'];
                                                $date=$result['date'];
                                                $issuer=$result['issuer'];
                                            }
                                            else
                                                echo (($___mysqli_res = mysqli_connect_error()));
                                            
//                                         ?>
                                     </strong></h3></div>
				<div class="panel-body dashboard">
                                    <h5 class="text-center"><strong>NOTICE</strong></h5>
                                    <h5><strong>Date</strong> <?php echo $date;?> </h5>
                                     <?php echo nl2br($content);?>        
                                    
                                    <h5>Issued By: </h5><strong><?php echo nl2br($issuer)?></strong>
                                
				</div>
                         </div>          
                    </div>
            <!--panel ends-->
 
             <!--panel starts-->
                    <div class=" col-lg-6">
                         <div class="panel panel-default panel-primary">
                             <div class="panel-heading"><h3 class="panel-title"><strong>
                                         <?php
                                         
                                          $noticequery="select * from notices where displayat=3;";
                                          //print("\n".$noticequery);
                                            $title="";
                                            $content="";
                                            $date="";
                                            $issuer="";
                                            $result=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $noticequery));
                                            if($result){
                                                echo $result['title'];
                                                  $title=$result['title'] ;
                                               $content=$result['content'];
                                                $date=$result['date'];
                                                $issuer=$result['issuer'];
                                            }
                                            else
                                                echo (($___mysqli_res = mysqli_connect_error()));
                                            
//                                         ?>
                                     </strong></h3></div>
				<div class="panel-body dashboard">
                                    <h5 class="text-center"><strong>NOTICE</strong></h5>
                                    <h5><strong>Date</strong> <?php echo $date;?> </h5>
                                     <?php echo nl2br($content);?>    
                                    
                                    <h5>Issued By: </h5><strong><?php echo nl2br($issuer)?></strong>

                                
				</div>
                         </div>          
                    </div>
            <!--panel ends-->
            <!--panel starts-->
                    <div class=" col-lg-6">
                         <div class="panel panel-default panel-primary">
                             <div class="panel-heading"><h3 class="panel-title"><strong>
                                         <?php
                                         
                                          $noticequery="select * from notices where displayat=4;";
                                          //print("\n".$noticequery);
                                            $title="";
                                            $content="";
                                            $date="";
                                            $issuer="";
                                            $result=  mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $noticequery));
                                            if($result){
                                                echo $result['title'];
                                                  $title=$result['title'] ;
                                               $content=$result['content'];
                                                $date=$result['date'];
                                                $issuer=$result['issuer'];
                                            }
                                            else
                                                echo (($___mysqli_res = mysqli_connect_error()));
                                            
//                                         ?>
                                     </strong></h3></div>
				<div class="panel-body dashboard">
                                    <h5 class="text-center"><strong>NOTICE</strong></h5>
                                    <h5><strong>Date</strong> <?php echo $date;?> </h5>
                                    <?php echo nl2br($content);?>    
                                    
                                    <h5>Issued By: </h5><strong><?php echo nl2br($issuer)?></strong>
                                
				</div>
                         </div>          
                    </div>
            <!--panel ends-->
        </div>  

    <!--row ends-->
</div>     
            
</div>

