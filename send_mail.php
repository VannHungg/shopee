<?php
// Base files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

function email($email, $name, $subject, $body) {
    // create object of PHPMailer class with boolean parameter which sets/unsets exception.
    $mail = new PHPMailer(true);    
    $mail -> CharSet = "UTF-8";                          
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP(); // using SMTP protocol                                     
        $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
        $mail->SMTPAuth = true;  // enable smtp authentication                             
        $mail->Username = 'mychanneltorelax@gmail.com';  // sender gmail host              
        $mail->Password = 'gmyjlgxifmzdlmti'; // sender gmail host password                          
        $mail->SMTPSecure = 'tls';  // for encrypted connection                           
        $mail->Port = 587;   // port for SMTP  
    
        $mail->setFrom('mychanneltorelax@gmail.com', "DEK Technologies"); // sender's email and name
        $mail->addAddress($email, $name);  // receiver's email and name
    
        // $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) { // handle error.
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>