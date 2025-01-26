<?php

    $Student_Id = $_POST["Student_ID"];

    $sql = "SELECT * FROM students WHERE Student_ID = '$Student_Id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $result = 'Name: '.$row['Name_Surname']. "<br>".
                  'Student ID: '.$row['Student_ID']. "<br>".
                  'Status: '.$row['Student_Status']. "<br>".
                  'Sessions Joined: '.$row['Sessions_Joined']. "<br>";
    }
    else if(mysqli_num_rows($result) > 1){
        $result = "Duplicates data are found";
    }
    else{
        $result = "No user found";
    }

?>