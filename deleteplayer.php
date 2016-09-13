

<?php

    $player_id=$_GET['player'];
    $query="delete from players where p_id='".$player_id."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    
    ?>
    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       Player deleted successfully! 
                        <br>
                        </span>
                   </h3>
<?php
die;


?>
