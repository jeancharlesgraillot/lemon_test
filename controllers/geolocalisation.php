<?php
$ip = $_SERVER['REMOTE_ADDR']; // Recuperation de l'IP du visiteur

$query = @unserialize(file_get_contents('http://ip-api.com/php/'.'185.126.66.172')); //connection au serveur de ip-api.com et recuperation des données

if($query && $query['status'] == 'success') 
{
    $query['region'];
    $query['city'];
    $query['org'];
    $query['as'];
    $query['lon'];
    $query['lat'];
    $query['isp'];
    $query['zip'];
    $query['timezone'];
    $query['country'];
    $query['countryCode'];
    $query['regionName'];
	
}
?>