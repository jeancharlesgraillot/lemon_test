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
&& isset($_POST['lastname']) && !empty($_POST['lastname']))
{
    
    if ($_POST['connexion']) 
    {
        
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $checkIfExist = $formManager->checkIfExist($firstname, $lastname);
        if ($checkIfExist) 
        {
            
            $_SESSION['firstname'] = $firstname;
            $_SESSION['admin'] = $checkIfExist->getAdmin();

            if ($_SESSION['admin'] == 0)
            {
                header('Location: index.php');

            }else
            {
                header('Location: adminBack.php');
            }
            
        }else{
            $message = 'Veuillez vous inscrire !';
        }
    }
}else{
    $message = "Veuillez remplir tous les champs !";
}

$users = $formManager->getUsers();

include "../views/connexionView.php";