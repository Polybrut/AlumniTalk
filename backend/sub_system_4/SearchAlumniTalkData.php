<?php

    $REF_KEY = $_POST["AL_REF_KEY"];

    $sql = "SELECT * FROM AlumniTalkProfile WHERE REF_KEY = '$REF_KEY'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $result = '<b>Reference Key: </b>'.$row['REF_KEY']. "<br>".
                  '<b>Speaker: </b>'.$row['Alumni_Speaker']. "<br>".
                  '<b>Event Name: </b>'.$row['Event_Name']. "<br>".
                  '<b>Date: </b>'.$row['Date']. "<br>".
                  '<b>Time Frame: </b>'.$row['Start_Time'] . "-" . $row['End_Time']. "<br>";
    }
    else if(mysqli_num_rows($result) > 1){
        $result = "Duplicates data are found";
    }
    else{
        $result = "No profile found";
    }

?>