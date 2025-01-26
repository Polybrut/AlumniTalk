<?php

    // fetch number of rows
    $sql = "SELECT REF_KEY FROM students";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);

    for($i = 1; $i <= $count ; $i++){
        //create REF_KEY
        $REF_KEY = "ATalkST" . str_pad($i,4,"0", STR_PAD_LEFT);
        
        // fetch data
        $sql = "SELECT Student_ID, Sessions_Joined, Tier FROM students WHERE REF_KEY = '$REF_KEY'";
        $table = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $Student_ID = $table['Student_ID'];
        $Sessions_Joined = $table['Sessions_Joined'];
        $Tier = $table['Tier'];


        // Granting Certifications when joined 5 sessions (i can't english for shit)
        if (($Sessions_Joined % 5) == 0 and floor($Sessions_Joined / 5) > ($Tier)){

        //generate the certificate
        include ('certificate/index.php');
        //sending the cerf
        //include('sendmail/SendingEmail.php');
        
        $result = $result . "Mail successfully sent to " . $Student_ID . "<br>"; 
        
        //update student's tier
            $sql = "UPDATE students SET Tier = Tier + 1 WHERE REF_KEY = '$REF_KEY'";
            mysqli_query($conn, $sql);
            //text output
        }

    }


        


?>