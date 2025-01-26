<?php
    $fileName = $_FILES['conference_csv']['tmp_name'];

    if ($_FILES['conference_csv']['size'] > 0) {
        $file = fopen($fileName, 'r');

        //fgetcsv($file);       //skips the first line

        while (($column = fgetcsv($file, 1000, ',')) !== FALSE) {
            $Student_ID = $conn->real_escape_string($column[1]);
            $time = $conn->real_escape_string($column[2]);

            //add to conference data
            $sql = "SELECT * FROM conference WHERE Student_ID = '$Student_ID'";
            $search = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($search) == 0){
                $sql = "INSERT INTO conference (Student_ID, Register_time) 
                            VALUES ('$Student_ID', '$time')";

                if (!$conn->query($sql)) {
                    $result = "Error: " . $sql . "<br>" . $conn->error . "<br>";
                }
            }

            // increment sessions joined
            include("incrementSessionsJoined.php");

        }
        fclose($file);
        $result = "CSV file successfully uploaded and database updated!  <br>";
    } else {
        $result = "Please select a valid CSV file.";
    }
?>