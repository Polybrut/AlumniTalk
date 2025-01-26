<?php

    require('fpdf/fpdf.php');
    require ('D:\XAMPP\htdocs\alumniTalk_CODE\backend\database.php');
    $time = time();
    $datetime = gmdate("d-m-Y",$time);
    $upload_Directory = __DIR__ . "/upload_certificate";
    
//picks up name from the db
    //session_start();
    //$Student_ID = $_SESSION["Student_ID"];
    $Student_ID = $_POST["Student_ID"];
    $sql = "SELECT * FROM students WHERE Student_ID = '$Student_ID'";
    $data = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($data);
    mysqli_close($conn);
    //session_destroy();

//generate certificate [status : working]
    $Name_Surname = $row['Name_Surname'];
    $Tier = $row['Tier'];
    $CERTIFICATE_REF_KEY = $row['REF_KEY'] . substr($Tier,3,2);
    $filename = $Student_ID."($datetime)";
    $font = __DIR__.("/Comic Sans MS.ttf");
    $image_directory = __DIR__ . ('/TestTemplate.jpg');
    $im = imagecreatefromjpeg($image_directory);      // enable GD Library, then restart the server.
    $text_color = imagecolorallocate($im, 58, 14, 91);
    imagefttext($im,60,0,690,800,$text_color,$font, $Name_Surname);             // add name
    imagefttext($im,20,0,1700,1350,$text_color,$font, $CERTIFICATE_REF_KEY);       // add reference key
    //imagejpeg($im);       //Output the image generated
    $image = "$upload_Directory/$filename.jpg";
    imagejpeg($im,$image);      // create a jpeg file
    imagedestroy($im);
    

//generate pdf [status : working]
    $pdf = new fpdf();
    $pdf->AddPage("L","A5");
    $pdf->Image($image,0,0,210,148);
    ob_end_clean();
    //$pdf->Output();
    $pdf->Output('F', "$upload_Directory/$Student_ID.pdf",);      // send to a folder

    //echo $text;
?>