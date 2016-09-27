 <?php
if(isset($_POST['addnewteambtn'])){
    $players=$_POST['selectedPlayers'];
    foreach($players as $player)
    echo $player.' ';
   // mysqli_query($GLOBALS["___mysqli_ston"], $query);
}
?>
                    
<style>
    .well .btn-circle {
    padding: 18px 28px;
    font-size: 22px;
    border-radius: 100%;

    }
</style>


    <!--form starts-->
                    <form action="" method="post" onsubmit="return submitForm();" >
                        <select name="availablePlayers[]" size="10"  id="availablePlayers"  multiple="multiple">;
                                  <option value="1">Option 1</option>
                                  <option value="2">Option 2</option>
                                  <option value="3">Option 3</option>          
                        </select>
                            <input type="button" class="btn btn-primary" value=">>" onclick="javascript:moveToRight();" role="button" aria-disabled="false">
                            <br>
                            <br>
                            <input type="button" value="<<" onclick="javascript:moveToLeft();" class="btn btn-primary" role="button" aria-disabled="false">

                        <select name="selectedPlayers[]" size="10"  id="selectedPlayers"  multiple="multiple">;
                                        
                        </select>
                                      
                                    
               <button type="submit" class="btn btn-primary" name="addnewteambtn">Add Team</button>
               <button type="button" class="btn btn-default" onclick="redirect();"name="canceladdteambtn">Cancel</button>

                    </form>  
                            <!--form ends-->




             <script>
                        function moveToRight(){
                                shuffleOptions("availablePlayers","selectedPlayers",11);
                                updateCaptain();
                        }
                        function moveToLeft(){
                                shuffleOptions("selectedPlayers","availablePlayers",0);
                                updateCaptain();
                        }
	
                        function shuffleOptions(from,to,limit){
                         var fromSelectBox = document.getElementById(from);
                         var toSelectBox = document.getElementById(to);
                         var toSelectBoxSize = toSelectBox.options.length;
                         for(var i=0; i< fromSelectBox.options.length; i++){
                                if(fromSelectBox.options[i].selected){
                                        if(limit > 0 && toSelectBoxSize >0 && toSelectBoxSize >= limit){
                                                $('#errorMessage').html('You have reached the maximum player limit for team roster:' + teamLimit);
                                                $('#errorMessage').dialog("open");
                                                break;
                                        }else{
                                                var optn = document.createElement("OPTION");
                                                optn.label = fromSelectBox.options[i].label;
                                                optn.text = fromSelectBox.options[i].text;
                                                optn.value = fromSelectBox.options[i].value;
                                                
                                                toSelectBox.options.add(optn);	 		
                                                fromSelectBox.remove(i);
                                                shuffleOptions(from,to,limit);
                                                break;
                                        }
                                }
                            }
                        }
                        function updateCaptain(){
                            var selectBox = document.getElementById("selectedPlayers");
                            var captainSelectBox = document.getElementById("captain");
                            captainSelectBox.length = 0;
                            var optn0 = document.createElement("OPTION");
                            optn0.label = '';
                            optn0.text = '';
                            optn0.value = '0';
                            if(selectBox.options[0].value == 0){
                                    optn0.selected = true;
                            }
                            
                             for(var i=0; i< selectBox.options.length; i++){
                                    var optn = document.createElement("OPTION");
                                    optn.label = selectBox.options[i].label;
                                    optn.text = selectBox.options[i].text;
                                    optn.value = selectBox.options[i].value;
                                    if(selectBox.options[i].value == 0){
                                            optn.selected = true;
                                    }
                                    captainSelectBox.options.add(optn);	
                                    var optn1 = document.createElement("OPTION");
                                    optn1.label = selectBox.options[i].label;
                                    optn1.text = selectBox.options[i].text;
                                    optn1.value = selectBox.options[i].value;
                                    if(selectBox.options[i].value == 0){
                                            optn1.selected = true;
                                    }
                                    
                             }

                    }

                    function submitForm(){
                            var selectBox = document.getElementById("selectedPlayers");
                            if(selectBox.options.length<2){
                                alert("Please select at least two persons to form a team");
                                return false;
                            }
                            if(selectBox.options.length>12){
                                alert("Please select at least two persons to form a team");
                                return false;
                            }
                            var selected=document.getElementById("selectedPlayers");
                            for(var i=0; i< selected.options.length; i++){
                                selected[i].selected=true;
                            }
                           }
                           
                     function redirect(){
                         window.location="./admin_home.php";
                     }


             </script>
             
     