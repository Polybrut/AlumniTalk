<?php

    $fileName = $_FILES['AlumniProfile_csv']['tmp_name'];


    //read file
    if ($_FILES['AlumniProfile_csv']['size'] > 0) {
        $file = fopen($fileName, 'r');

        fgetcsv($file);       //skips the first line


        while (($column = fgetcsv($file, 1000, ',')) !== FALSE) {
            $REF_KEY = $conn->real_escape_string($column[0]);           //ATalkALXXX
            $Event_Name = $conn->real_escape_string($column[1]);
            $Date = $conn->real_escape_string($column[2]);
            $Start_Time = $conn->real_escape_string($column[3]);
            $End_Time = $conn->real_escape_string($column[4]);
            $Alumni_Speaker = $conn->real_escape_string($column[5]);

    //create alumni profile
            $sql = "SELECT * FROM alumniTalkProfile WHERE Event_Name = '$Event_Name' AND Alumni_Speaker = '$Alumni_Speaker'";
            $search = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($search) == 0){
                $sql = "INSERT INTO AlumniTalkProfile
                            VALUES ('$REF_KEY', '$Event_Name', '$Date', '$Start_Time', '$End_Time', '$Alumni_Speaker')";

                if (!$conn->query($sql)) {
                    $result = "Error: " . $sql . "<br>" . $conn->error . "<br>";
                }
            }
        }
        fclose($file);
        $result = "CSV file successfully uploaded and database updated!  <br>";
    } else {
        $result = "Please select a valid CSV file.";
    }
?>