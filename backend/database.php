<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "alumnitalk";
    $conn = "";
    
    
    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
        $connection = "connected";
    }
    catch(mysqli_sql_exception){
        $connection = "could not connect";
    }
?>