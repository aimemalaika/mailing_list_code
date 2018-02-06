<?php
        include 'config.php'; // conection to database
        $choosen = $con->query("SELECT * FRO suscribers"); //fetching emails in your suscribers table
    ob_start();
   
            $subject = $_POST['sujet'];
            $from_user = "MARKETING DEPARTMENT";
            $from_email = "server.email.forwarder@gmail.com";
            date_default_timezone_set('Etc/UTC');

            require '../../PHPMailer/PHPMailerAutoload.php';

            $mail = new PHPMailer;

            $mail->SMTPDebug = 2;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'server.email.forwarder@gmail.com';                 // SMTP username
            $mail->Password = 'Peaceall236@';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
             while ($ls = $choosen->fetch()) { // loop to select emails in your suscribers table
            $mail->setFrom($from_email, $from_user);
            $mail->addAddress($ls['emails'], "");     // Add a recipient

            $mail->addReplyTo($from_email, $from_user);
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = $subject;
            
                $mail->Body    = '
                    <html>
                        <body>
                            <div align="center">
                                <img style="width:100%" src="https://amutangana.com/images/courses/baniere.jpg"/></div><div>'.
                                    $_POST['editor1']
                                 .'</div><p>Thank you for being part of us.</p>
                            <div align="center"><img src="https://amutangana.com/images/courses/line.jpg"/>
                            </div>
                        </body>
                    </html>
                ';
            }
                if(!$mail->send()) {
                    header('Location: ../sendmessage.php');
                } else {
                    session_start();
                    header('Location: ../conf.html');
                }
?>
