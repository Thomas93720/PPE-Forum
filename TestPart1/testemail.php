<?php
    include("header.php");
    include("datamanagers/DatabaseLinker.php");
    include("data/fildediscussion.php");
    include("datamanagers/compteManager.php");
    include("data/message.php");
    
    session_start();
    
    echo $_SESSION["idUser"];
    $compte = compteManager::getCompteWithId($_SESSION["idUser"]);
    
    ini_set( 'display_errors', 1 );
 
    error_reporting( E_ALL ); 
            
    $from = "Auros1805@gmail.com";
 
    $to = $compte->getEmail();
 
    $subject = 'certification du compte';
 
    $message = "Un compte avec cette adresse email a etait crée sur ppe forum, clicer sur le lien pour certifier:"."<a href='http://sio.jbdelasalle.com/~tprezot/Forum/indexConfirm.php'>Certification</a>";
 
    $headers = "From:" . $from;
 
    mail($to,$subject,$message, $headers);
 
    echo "L'email a été envoyé.";
?>


