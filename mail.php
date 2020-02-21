<?php
    /*$to = 'gerardo@inmerte.com';
    $firstname = $_POST["fname"];
    $email= $_POST["email"];
    $text= $_POST["message"];
    


    /$headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$firstname.'  '.$laststname.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>Email: '.$text.'</td></tr>
        
    </table>';

    if (@mail($to, $email, $message, $headers))
    {
        echo 'The message has been sent.';
    }else{
        echo 'failed';
    }*/
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = "nuevo mensaje desde inmerte.com";
    header('Content-Type: application/json');
    if ($name === ''){
    print json_encode(array('message' => 'Name cannot be empty', 'code' => 0));
    exit();
    }
    if ($email === ''){
    print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
    exit();
    } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
    exit();
    }
    }
    if ($message === ''){
    print json_encode(array('message' => 'Message cannot be empty', 'code' => 0));
    exit();
    }
    $content="From: $name \nEmail: $email \nMessage: $message";
    $recipient = "contact@inmerte.com";
    $mailheader = "From: $email \r\n";
    mail($recipient, $subject, $content, $mailheader) or die("Error!");
    echo 'The message has been sent.';
    print json_encode(array('message' => 'The message has been sent.'));
    exit();
?>