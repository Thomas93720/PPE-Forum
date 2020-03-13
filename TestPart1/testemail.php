<?php
    include("header.php");
    include("datamanagers/DatabaseLinker.php");
    include("data/fildediscussion.php");
    include("datamanagers/compteManager.php");
    include("data/message.php");
    include("PHPMailer-master/src/PHPMailer.php");
    include("PHPMailer-master/src/SMTP.php");
    include("PHPMailer-master/src/Exception.php");
    
    session_start();
    
    echo $_SESSION["idUser"];
    $compte = compteManager::getCompteWithId($_SESSION["idUser"]);
    
    ini_set( 'display_errors', 1 );
 
    error_reporting( E_ALL ); 
            
    $from = "Auros1805@gmail.com";
 
    $to = $compte->getEmail();
 
    $subject = 'certification du compte';
 
    $message = "Un compte avec cette adresse email ";
 
    $headers = "From:" . $from;
 
    mail($to,$subject,$message, $headers);
 
    echo "L'email a été envoyé.";
    
    $mail = new PHPMailer(TRUE);

    /* Open the try/catch block. */
    try {
       /* Set the mail sender. */
       $mail->setFrom('email.sever@gmail.com', 'Serveur');

       /* Add a recipient. */
       $mail->addAddress($compte->getEmail());

       /* Set the subject. */
       $mail->Subject = 'Authentification';

       /* Set the mail message body. */
       $mail->Body = "Un compte avec cette adresse email a etait crée sur ppe forum, clicer sur le lien pour certifier:"."<a href='http://sio.jbdelasalle.com/~tprezot/Forum/indexConfirm.php'>Certification</a>";

       /* Finally send the mail. */
       $mail->send();
    }
    catch (Exception $e)
    {
       /* PHPMailer exception. */
       echo $e->errorMessage();
    }
    catch (\Exception $e)
    {
       /* PHP exception (note the backslash to select the global namespace Exception class). */
       echo $e->getMessage();
    }

?>


