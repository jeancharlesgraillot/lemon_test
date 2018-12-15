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

// We instance an object $formManager with our PDO object
$formManager = new FormManager($db);
$message = "";

// Update account
if ($_POST['id']) 
{
    $id = intval($_POST['id']);
    
    if (isset($_POST['firstname']) && !empty($_POST['firstname'])
    && isset($_POST['lastname']) && !empty($_POST['lastname'])
    && isset($_POST['birthdate']) && !empty($_POST['birthdate'])
    && isset($_POST['email']) && !empty($_POST['email']) && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])
    && isset($_POST['gender']) && !empty($_POST['gender'])
    && isset($_POST['country']) && !empty($_POST['country'])
    && isset($_POST['profession']) && !empty($_POST['profession'])) 
    {
            
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $birthdate = htmlspecialchars($_POST['birthdate']);
            $email = htmlspecialchars($_POST['email']);
            $gender = htmlspecialchars($_POST['gender']);
            $country = htmlspecialchars($_POST['country']);
            $profession = htmlspecialchars($_POST['profession']);
            $admin = 0;

            if (isset($_POST['update'])) 
            {
                $userByCountry = new User([
                'id' => $id,
                'firstname'=> $firstname,
                'lastname'=> $lastname,
                'birthdate'=> $birthdate,
                'email'=> $email,
                'gender'=> $gender,
                'country'=> $country,
                'profession'=> $profession,
                'admin'=> $admin
                ]);

                $formManager->updateUser($userByCountry);

                $message = "L'utilisateur a bien été mis à jour !";
                
                header('refresh:1;url=adminBack.php');
            }
    }else{
        $message = "Veuillez remplir tous les champs !";
    }
}


$usersByCountry = $formManager->getUsersByCountry();

include "../views/adminBackUpdateView.php";

?>