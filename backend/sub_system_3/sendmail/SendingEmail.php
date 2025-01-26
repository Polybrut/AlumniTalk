<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$Student_ID = $_POST['Student_ID'];
// put saf email here
$sender_email = 'bowlerwillcat@gmail.com';
$recipient_email = $Student_ID . '@g.siit.tu.ac.th';


// check if the student is allegible to recieve a certificate




if ($Student_Status == 'active'){
    try{
        $email = new PHPMailer();
        
        $email->SetFrom("bowlerwillcat@gmail.com", 'Mailer'); //Name is optional
        $email->AddAddress("bowlerwillcat@gmail.com", "$Student_ID");
        $email->isHTML(true);
        $email->Subject   = 'Alumni Talk Certificate';
        $email->Body      = 'Congratulations on your <b>5TH!</b> alumni talk participation';    //HTML
        $email->AltBody    = 'Congratulations on your 5TH! alumni talk participation';
        
        $file_to_attach = "D:/XAMPP/htdocs/alumniTalk_CODE/certificate/download_certificate/$Student_ID.pdf";
    
        $email->AddAttachment( $file_to_attach , "$Student_ID.pdf" );
    
        $email->Send();
        $result = 'Message has been sent';
    } catch (Exception $e) {
        $result = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>