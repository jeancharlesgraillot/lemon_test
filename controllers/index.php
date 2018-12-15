<?php

// Register our autoload.
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


// Connect to the database
$db = Database::DB();

// Instance an object $vehicleManager with our PDO object
$formManager = new FormManager($db);




include "../views/indexView.php";
?>
