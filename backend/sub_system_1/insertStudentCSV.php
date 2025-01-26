<?php
    $fileName = $_FILES['student_csv']['tmp_name'];

    if ($_FILES['student_csv']['size'] > 0) {
        $file = fopen($fileName, 'r');

        fgetcsv($file);       //skips the first line

        
        while (($column = fgetcsv($file, 1000, ',')) !== FALSE) {
            $REF_KEY = $conn->real_escape_string($column[0]);
            $Name_Surname = $conn->real_escape_string($column[1]);
            $Student_ID = $conn->real_escape_string($column[2]);
            $Student_Status = $conn->real_escape_string($column[3]);
            $Sessions_Joined = $conn->real_escape_string($column[4]);
            $Tier = $conn->real_escape_string($column[5]);



            $sql = "SELECT * FROM students WHERE Student_ID = '$Student_ID'";
            $search = mysqli_query($conn, $sql);
    
            
            if (mysqli_num_rows($search) == 0){
                $sql = "INSERT INTO students
                            VALUES ('$REF_KEY','$Name_Surname', '$Student_ID', '$Student_Status', $Sessions_Joined, $Tier)";

                    if (!$conn->query($sql)) {
                        $result = "Error: " . $sql . "<br>" . $conn->error . "<br>";
                    }
            }
        }
        fclose($file);
        $result = "CSV file successfully uploaded!";
    } else {
        $result = "Please select a valid CSV file.";
    }
?>