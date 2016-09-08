<?php
require 'header.inc.php';
if(isset($_POST['submitnoticebtn'])){
    //echo 'insde';
    $title=$_POST['title'];
    $issuer=$_POST['issuer'];
    $content=$_POST['content'];
    $date=$_POST['date'];
    $displayat=  ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['displayat']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    //echo nl2br($_POST['content']);
    $query="insert into notices(title,date,issuer,content,displayat) values('".$title."','".$date."','".$issuer."','".$content."',".$displayat.");";
    //echo $query;
    if(mysqli_query($GLOBALS["___mysqli_ston"], $query))
        echo 'added';
    else {
        mysqli_query($GLOBALS["___mysqli_ston"], "delete from notices where displayat=".$displayat.";");
        mysqli_query($GLOBALS["___mysqli_ston"], $query);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
            
}
    ?>
