<?php

$sql = "SELECT * FROM students WHERE Student_ID = '$Student_ID'";
$search = mysqli_query($conn, $sql);

if (mysqli_num_rows($search) == 1){
    $sql = "UPDATE students SET Sessions_Joined = Sessions_Joined + 1 WHERE Student_ID = '$Student_ID'";
    
    if (!$conn->query($sql)) {
        $result = "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
}


?>