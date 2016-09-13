

<?php

    $league_id=$_GET['league'];
    $query="delete from leagues where l_id='".$league_id."';";
    echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    
    ?>
    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       League deleted successfully! 
                        <br>
                        </span>
                   </h3>
<?php
die;


?>
