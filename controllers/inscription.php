<?php

function loadClass($classname)
{
    if(file_exists('../models/'. $classname.'.php'))
    {
        require '../models/'. $classname.'.php';
    }
    else 
    {
        require '../entities/' . $classname . '.php';
    }
}

spl_autoload_register('loadClass');
session_start();
require 'geolocalisation.php';

// We connect to the database
$db = Database::DB();

// We instance an object $vehicleManager with our PDO object
$formManager = new FormManager($db);
$message = "";


if (isset($_POST['firstname']) && !empty($_POST['firstname'])
&& isset($_POST['lastname']) && !empty($_POST['lastname'])
&& isset($_POST['birthdate']) && !empty($_POST['birthdate'])
&& isset($_POST['email']) && !empty($_POST['email']) && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])
&& isset($_POST['gender']) && !empty($_POST['gender'])
&& isset($_POST['country']) && !empty($_POST['country'])
&& isset($_POST['profession']) && !empty($_POST['profession'])) 
{
    if (isset($_POST['inscription'])) 
    {

        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $birthdate = htmlspecialchars($_POST['birthdate']);
        $email = htmlspecialchars($_POST['email']);
        $gender = htmlspecialchars($_POST['gender']);
        $country = htmlspecialchars($_POST['country']);
        $profession = htmlspecialchars($_POST['profession']);
        $admin = 0;

        if($formManager->checkIfExist($firstname, $lastname))
        {
            $message = "L'utilisateur existe déjà !";
        }else
        {
            // Create a user with sent variables 
            $user = new User([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'birthdate' => $birthdate,
            'email' => $email,
            'gender' => $gender,
            'country' => $country,
            'profession' => $profession,
            'admin' => $admin
            ]);

            //Add the user in database
            $formManager->addUser($user);

            // Send an email to the new user
            $recipients = [$_POST['email']];
                
                $to = implode(',', $recipients);
                $subject = '[LEMON] Récapitulatif inscription';
                $mailMessage = '
                        <html>
                        <head>
                        </head>
                        <body>
                        <p>Bonjour'.' '.$_POST['firstname'].'</p>
                        
                        </body>
                        </html>
                        ';
                
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                
                $headers[] = 'From: Admin lemon-test <noreply@lemon.fr>';
                
                mail($to, $subject, $mailMessage, implode("\r\n", $headers));
                header('Location: index.php');

        }
    }
}else{
    $message = "Veuillez remplir tous les champs !";
}

$users = $formManager->getUsers();

include "../views/inscriptionView.php";

 ?>