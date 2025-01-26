<?php
    //  SETUPS
    require("backend/database.php"); 
    $result = '';
    // $connection = connection message
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Main Page</title>
        <link rel="StyleSheet" href="style.css" type="text/css">
        <link rel="SHORTCUT ICON" href="favicon.ico">
    </head>
    <body>

        <div class="wrapper">
            <!--  Headings : This one I took from the old TimeSheet website -->
            <div style="margin-bottom:5px; background-image:url(siit.png); background-repeat:no-repeat; height:70px; padding-left:90px; color:#8800aa;">
                <div>Sirindhorn International Institute of Technology, Thammasat University</div>
                <div style="font-size:26px; font-weight:bold;">Scholarship Recipient Time Sheet System</div>
                <div>by Student Affairs and Alumni Relations Division</div>
            </div>
            
            <!-- connection test -->
            <h1> database connection : <?php echo $connection ; ?></h1>
          
            <h1>SUB_SYSTEM 1</h1>
                    <!-- insert data -->
                    <div class = "action">
                        <h1>insert new student data</h1> <br>
                        <form class="insertStudentData" action="index.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="student_csv" accept=".csv" required>
                            <input type="submit" name="insertStudentCSV" value="insert">
                        </form>
                    </div>
                    <!-- reassigning status -->
                    <div class = "action">
                        <h1>reassign student status</h1><br>
                        <form class="studentStatus" action="index.php" method="post">
                            Enter Student ID:<input type="text" name="Student_ID">
                            <select name="studentStatus" id="studentStatus">
                                <option value="active">active</option>
                                <option value="expelled">expelled</option>
                                <option value="leave">leave</option>
                            </select>
                            <input type="submit" name="reassignStatus" value="reassignStatus">
                        </form>
                    </div>
                    <!-- lookup student data -->
                    <div class = "action">
                        <h1>search student data</h1><br>
                        <form class="insertData" action="index.php" method="post">                        
                            Enter Student ID:<input type="text" name="Student_ID">
                            <input type="submit" name="searchStudent" value="search">
                        </form>
                    </div>
            
            <h1> SUB_SYSTEM 2</h1>
                    <!-- update database : conference -->
                    <div class = "action">
                        <h1>insert Conference Data</h1><br>
                        <form class="insertConferenceData" action="index.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="conference_csv" accept=".csv" required>
                            <input type="submit" name="insertConferenceCSV" value="insert">
                        </form>
                    </div>
                    
                    <!-- update database : Alumni -->
                    <div class = "action">
                        <h1>insert Alumni Data</h1><br>
                        <form class="insertAlumniData" action="index.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="AlumniProfile_csv" accept=".csv" required>
                            <input type="submit" name="insertAlumniCSV" value="insert">
                        </form>
                    </div>

            <h1> SUB_SYSTEM 3 </h1>
                    <!-- download certificate -->
                    <div class = "action">
                        <h1>download certificate</h1><br>
                        <form class="generatePDF" action="index.php" method="post">                        
                            Enter Student ID:<input type="text" name="Student_ID" required>
                            <input type="submit" name="create" value="create">
                        </form>
                    </div>

                    <!-- Send certificates -->
                    <div class = "action">
                        <h1>[temp, automate this asshole]send certificate</h1><br>
                        <form class="sendEmail" action="index.php" method="post">
                            Enter Student ID:<input type="text" name="Student_ID">                     
                            <input type="submit" name="send_certif" value="send certificates">
                        </form>
                    </div>

                    <!-- Check Attendance -->
                    <div class = "action">
                    <h1>check Attendance</h1><br>
                        <form class="button" action="index.php" method="post">
                            <input type="submit" name="checkAttendance" value="check">
                        </form>
                    </div>

                    <!-- Check Certificate -->
                    <div class = "action">
                        <h1>Check Certificate</h1><br>
                        <form class="generatePDF" action="index.php" method="post">                  
                            Enter Student Name:<input type="text" name="name" required><br>
                            Enter Student ID:<input type="text" name="Student_ID" required><br>
                            Enter Certificate ID:<input type="text" name="CER_REF_KEY" required>
                            <input type="submit" name="checkCertificate" value="checkCertificate">
                        </form>
                    </div>


            <h1> SUB_SYSTEM 4 </h1>

                    <!-- lookup Alumni Talk data -->
                    <div class = "action">
                        <h1>search Alumni Talk data</h1><br>
                        <form class="insertData" action="index.php" method="post">                        
                            Enter Alumni Talk Reference Key:<input type="text" name="AL_REF_KEY">
                            <input type="submit" name="searchAlumni" value="search">
                        </form>
                    </div>

                    <!-- report numbers of certificates handed -->
                    <div class = "action">
                    <h1>report numbers of certificates</h1><br>
                        <form class="button" action="index.php" method="post">
                            <input type="submit" name="reportCerf" value="report">
                        </form>
                    </div>

                    <!-- report numbers of Alumni Talk Event held -->
                    <div class = "action">
                    <h1>report numbers of Alumni Talk Event held</h1><br>
                        <form class="button" action="index.php" method="post">
                            <input type="submit" name="reportAlumniTalk" value="report">
                        </form>
                    </div>

            <h1> SUB_SYSTEM 5 </h1>

<?php

    // you really need to make a controller



    //  FUNCTIONS

    // SUB_SYSTEM_1

    //insert new data (csv) : working
    if(isset($_POST["insertStudentCSV"])){
        include("backend/sub_system_1/insertStudentCSV.php");
    }
    
    //status assignment : working
    if(isset($_POST["reassignStatus"])){
        include("backend/sub_system_1/ReassignStatus.php");
    }

    //searching : working
    if(isset($_POST["searchStudent"])){
        include("backend/sub_system_1/SearchStudentData.php");
    }

    // SUB_SYSTEM_2

    if(isset($_POST["insertConferenceCSV"])){
        include("backend/sub_system_2/insertConferenceCSV.php");
    }

    if(isset($_POST["insertAlumniCSV"])){
        include("backend/sub_system_2/AlumniProfile.php");
    }

    // SUB_SYSTEM_3

    //generate pdf : working
    if(isset($_POST["create"])){
        if(empty($_POST["Student_ID"])){
            $result = "please enter student ID";
        }
        else{
            include("backend/sub_system_3/certificate/generate.php");
            //$pdf->Output();
        }
    }

    //send email [TEST] : Working, sorta
    if(isset($_POST["send_certif"])){
        $Student_ID = $_POST['Student_ID'];
        $sql = "SELECT * FROM students WHERE Student_ID = '$Student_ID'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($query);
        $Student_Status = $row['Student_Status'];

        if ($Student_Status == 'active'){
            include("backend/sub_system_3/sendmail/SendingEmail.php");
            // set up in php.ini and sendmail
            $result = "Mail successfully sent";
        } else {
            $result = "the student is not elligible to recieve a certificate, REASON : '$Student_Status'";
        }
    }
    
    //check attendance : working
    if(isset($_POST["checkAttendance"])){
        include("backend/sub_system_3/CheckAttendance.php");
    }

    //check certificate :

    if(isset($_POST["checkCertificate"])){
        include("backend/sub_system_3/CheckCertificate.php");
    }
    // SUB_SYSTEM_4

    // look up alumni : working
    if(isset($_POST["searchAlumni"])){
        include("backend/sub_system_4/SearchAlumniTalkData.php");
    }

    if(isset($_POST["reportCerf"])){
        include("backend/sub_system_4/AlumniTalkReport.php");
    }

    if(isset($_POST["reportAlumniTalk"])){
        include("backend/sub_system_4/CheckEventHeld.php");
    }


?>



            <!-- OUTPUT -->
            <fieldset class = "SearchData">
                <legend> Result </legend>
                <?php echo $result?>
            </fieldset>

        </div>        
    </body>
    </html>
    