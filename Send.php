<?php
use PHPMailer\PHPMailer\PHPMailer;
use PhpMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';   
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['send'])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = ''; // Your email address
    $mail->Password = ''; // Your email account password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom(''); // Your email address

    $mail->addAddress($_POST['email']);

    $mail->isHTML(true);

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];
    
    $mail->send();
    echo"
    <script>
        alert('Message has been sent!')
        document.location.href = 'index.php'; 
    </script>
    ";
}
?>