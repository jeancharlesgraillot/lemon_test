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
&& isset($_POST['email']) && !empty($_POST['email']))
{
    if (isset($_POST['inscription_admin']))
    {
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $admin = 1;

        if($formManager->checkIfExist($firstname, $lastname))
        {
            $message = "L'administrateur existe déjà !";
        }else
        {
            
            $admin = new User([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'admin' => $admin
            ]);


            $formManager->addUser($admin);

            $message = "Vous êtes bien enregistré comme nouvel administrateur !";

        }
    }
}else{
    $message = "Veuillez remplir tous les champs !";
}

include "../views/adminView.php";

