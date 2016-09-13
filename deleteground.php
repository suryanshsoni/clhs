

<?php

    $ground_id=$_GET['ground'];
    $query="delete from grounds where g_id='".$ground_id."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    
    ?>
    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       Ground deleted successfully! 
                        <br>
                        </span>
                   </h3>
<?php
die;


?>
