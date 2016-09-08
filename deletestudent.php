

<?php

    $enrollment=$_GET['student'];
    $query="delete from students where enrollmentno='".$enrollment."';";
    //echo $query;
    mysqli_query($GLOBALS["___mysqli_ston"], $query);
    
    ?>
    <h3> <span class="label label-success">
                        <icon class="fa fa-check-circle"></icon>
                       Student deleted successfully! 
                        <br>
                        </span>
                   </h3>
<?php
die;


?>
