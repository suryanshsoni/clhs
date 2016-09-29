/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//To initailize material design
$.material.init();

//Functions to add players to the team
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
//For cancel buttons
function redirect(){
 window.location="./admin_home.php";
}

function verifypass(pass,repass){
    var passfield=document.getElementById(pass);
    var repassfield=document.getElementById(repass);
    var help=document.getElementById("repasshelp");
    help.setAttribute("visibility","visible");
    if(passfield.value===repassfield.value){
         help.innerHTML="Passwords match!!";
         help.setAttribute("style","font-size: 15px;color:white;font-weight:bold;");
        return true;
    }
    else{
       
        help.innerHTML="Passwords don't match!!";
        help.setAttribute("style","font-size: 15px;color:orange;font-weight:bold");
        return false;
    }
}