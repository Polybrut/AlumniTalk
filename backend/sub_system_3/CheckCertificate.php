<?php

$name = $_POST["name"];
$Student_ID =$_POST["Student_ID"];
$CERTIFICATE_REF_KEY = $_POST["CER_REF_KEY"];

$STUDENT_REF_KEY = substr($CERTIFICATE_REF_KEY,0,11);
$Tier = substr($CERTIFICATE_REF_KEY,12,2);
$Tier = str_pad($Tier,5,"0",STR_PAD_LEFT);

$sql = "SELECT * FROM students WHERE REF_KEY = '$STUDENT_REF_KEY'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    if($name == $row['Name_Surname'] or $Student_ID == $row['Student_ID']){
        $result = 'Name: '.$row['Name_Surname']. "<br>".
                    'Student ID: '.$row['Student_ID']. "<br>".
                    'Status: '.$row['Student_Status']. "<br>".
                    'Sessions Joined: '.$row['Sessions_Joined']. "<br>".
                    'Student Current tier: '.$row['Tier']."<br>";
                    "Certificate Tier: $Tier";
        
        if($row['Tier'] == 0){
            $result = $result."<br> no certificate has be given out to the student!";
        } else {
            if((int)$Tier > $row['Tier']){
                $result = $result."<br> <b> ALERT! The certificate's tier is over the student's tier</b>";
            }
        }
    }else{
        $result =  "<b>ALERT!</b> student name or ID and the one in the database does not match";
    }
}else{
    $result = "No student found, Invalid Certificate";
}

?>