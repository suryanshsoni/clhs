

<?php

    $umpire_id=$_GET['umpire'];
    $query="delete from umpires where u_id='".$umpire_id."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    
    ?>
    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       Umpire deleted successfully! 
                        <br>
                        </span>
                   </h3>
<?php
die;


?>
