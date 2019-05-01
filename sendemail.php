<?php
require 'PHPMailerAutoload.php';
require 'credentials.php';
include('sqloperations.php');
try{
$file  = fopen("details.csv", "w");
$sql= new sqloperations();
$show=$sql->read();
while ($res = mysqli_fetch_array($show)) {
    fputcsv($file, $res);
}
fclose($file);
}
catch (Exception $ex) 
{
   echo $ex->getMessage();
}
try{
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = EMAIL;
$mail->Password   = PASS; 
$mail->SMTPSecure = 'tls'; 
$mail->Port       = 587; 
$mail->setFrom(EMAIL, 'Mailer');
$mail->addAddress('varmaharshendra@gmail.com'); 
$mail->addReplyTo(EMAIL, 'Information');
$file_name = 'details.csv';
$mail->addAttachment("" . $file_name);
$mail->isHTML(true); 
$mail->Subject = 'full report';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo "<script>alert('mail could not be sent!'); location.href='dashboardfinal.php';</script>";
} else {
    echo "<script>alert('mail sent succesfully!'); location.href='dashboardfinal.php';</script>";
}
}
catch (Exception $ex) 
{
   echo $ex->getMessage();
}
?>