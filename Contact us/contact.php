
 <?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 $msg = '';
    //Load Composer's autoloader
    require ('PHPMailer/Exception.php');
    require ('PHPMailer/SMTP.php');
    require ('PHPMailer/PHPMailer.php');
    
     if(isset($_POST['submit'])){
         $name = $_POST['name'];
         $email = $_POST['email'];
         $message = $_POST['message'];

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'cajiibxaaji02@gmail.com';                     //SMTP username
            $mail->Password   = 'aitfana87';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465; //465;                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('cajiibxaaji02@gmail.com', 'Abdulqadir Mohamed');
            $mail->addAddress('cajiibxaaji02@gmail.com');     //Add a recipient
            
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Contact us';
            $mail->Body    = "Name: $name <br> Email: $email <br> Message: $message";
        
        
            $mail->send();
            //echo "<script> alert('Message has been sent')</script>";
            $msg = '<div class="alert alert-success">Message sent Thank you</div>';
        } catch (Exception $e) {
            $msg = '<div class="alert alert-success">  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}" </div>';
    
        }
        

     }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >

</head>
<body class="bg-light">
    <div class="container">
        <form method="post" class="form-group my-5 bg-white shadow-lg p-5 rounded" autocomplete="off" style="width: 50%; margin: auto;">
            <h2>Contact Us</h2>
            <?php echo $msg?>
            <input type="text" class="form-control my-3" name="name" placeholder="Name" required>
            <input type="email" class="form-control my-3" name="email" placeholder="Email" required>
            <textarea cols="10" rows="5" class="form-control" name="message" placeholder="Message" require></textarea>
            <button type="submit" name="submit" class="btn btn-danger my-2">Send</button>
        </form>
    </div>


   
</body>
</html>