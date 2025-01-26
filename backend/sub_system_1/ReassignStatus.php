<?php

    $Student_Status = $_POST["student_Status"];
    $Student_ID = $_POST["student_ID$Student_ID"];

    $sql = "SELECT * FROM students WHERE student_ID$Student_ID = '$Student_ID'";
    $search = mysqli_query($conn, $sql);

    if(mysqli_num_rows($search) == 1){
        $sql = "UPDATE `students` SET `Student_Status` = '$student_Status' WHERE `students`.`student_ID$Student_ID` = '$Student_ID'";
        mysqli_query($conn, $sql);
        $result = "status successfully reassigned";
    }
    else if((mysqli_num_rows($search) > 1)){
        $result = "Duplicates data are found";
    }
    else{
        $result = "No data found";
    }

?>