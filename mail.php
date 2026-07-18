<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);

//  $mail->Password   = 'x9TQ!EMEt@6F';   

try {

    $mail->isSMTP();
    $mail->Host       = 'mail.shreelaxmiengservices.com'; // Domain mail server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'web@shreelaxmiengservices.com';  // Domain email
    $mail->Password   = 'x9TQ!EMEt@6F';           // Email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     // SSL
    $mail->Port       = 465;

    // Optional but recommended
    $mail->SMTPDebug  = 0; // Set 2 for debugging
    $mail->CharSet    = 'UTF-8';

    $from = 'web@shreelaxmiengservices.com'; // this is the sender's Email address "sender"

    $to = "ankitthakur0504@gmail.com"; 
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject_message = $_POST['subject'];
    $message_data = $_POST['message'];

    $subject = "Enquiry From Website";

    $message = '<html>
                        <head>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <style>
                        td {
                            vertical-align: top;
                            }
                            /* Extra small devices (phones, 600px and down) */
                        @media only screen and (max-width: 600px) 
                        {
                            .side-space{
                                width:0%
                            }
                            .main-content{
                                width:100%
                            }
                        }

                        /* Small devices (portrait tablets and large phones, 600px and up) */
                        @media only screen and (min-width: 600px) 
                        {
                            .side-space{
                                width:5%
                            }
                            .main-content{
                                width:90%
                            }
                        }

                        /* Medium devices (landscape tablets, 768px and up) */
                        @media only screen and (min-width: 768px) 
                        {
                            .side-space{
                                width:10%
                            }
                            .main-content{
                                width:80%
                            }
                        }

                        /* Large devices (laptops/desktops, 992px and up) */
                        @media only screen and (min-width: 992px) 
                        {
                            .side-space{
                                width:20%
                            }
                            .main-content{
                                width:60%
                            }
                        }

                        /* Extra large devices (large laptops and desktops, 1200px and up) */
                        @media only screen and (min-width: 1200px) 
                        {
                            .side-space{
                                width:30%
                            }
                            .main-content{
                                width:40%
                            }
                        }
                        .emailid_class a{
                            color:white !important;
                        }
                        </style>
                        </head>
                            <body style="background-color:#ebeef4;padding:10px 0px">
                                <table style="width:100%">
                                <tr>
                                <td class="side-space"></td>
                                <td class="main-content">
                                <div style="border: 1px solid #042e71;border-radius: 7px;">
                                            <div style="background-color:white;padding:25px 0px;text-align:center;border-top-left-radius: 7px;border-top-right-radius: 7px;">
                                            <img src="https://www.shreelaxmiengservices.com/images/home/logo.png" style="max-width: 200px;" /></div>
                                            <table style="width:100%;background-color:#042e71;padding: 10px;border-bottom-left-radius: 7px;border-bottom-right-radius: 7px;">
                                                <tbody>
                                        
                                                    <tr>
                                                        <td style="font-size:20px;font-weight:bold;color:white;width:40%">Name:</td>
                                                        <td style="font-size:20px;font-weight:bold;color:white;width:5%">:</td>
                                                        <td style="font-size:18px;color:white;">'.$name.'</td>
                                                    </tr>
                                                     <tr>
                                                        <td style="font-size:20px;font-weight:bold;color:white;">Mobile No:</td>
                                                        <td style="font-size:20px;font-weight:bold;color:white;width:5%">:</td>
                                                        <td style="font-size:18px;color:white;">'.$phone.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size:20px;font-weight:bold;color:white;">Email Id:</td>
                                                        <td style="font-size:20px;font-weight:bold;color:white;width:5%">:</td>
                                                        <td style="font-size:18px;color:white;" class="emailid_class">'.$email.'</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size:20px;font-weight:bold;color:white;">Subject:</td>
                                                        <td style="font-size:20px;font-weight:bold;color:white;width:5%">:</td>
                                                        <td style="font-size:18px;color:white;" class="emailid_class">'.$subject_message.'</td>
                                                    </tr>
                                            
                                                
                                                    <tr>
                                                        <td style="font-size:20px;font-weight:bold;color:white;">Message:</td>
                                                        <td style="font-size:20px;font-weight:bold;color:white;width:5%">:</td>
                                                        <td style="font-size:18px;color:white;">'.$message_data.'</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                </td>
                                <td class="side-space"></td>
                                </tr>
                                </table>
                            </body>
                        </html>';



    

    //Recipients
    $mail->setFrom($from, $name);
    $mail->addAddress($to);

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;

        // File Attachment
  

    $mail->send();
    header('location: thank_you.php');
    // echo 'Mail has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>
   