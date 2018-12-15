<?php
$ip = $_SERVER['REMOTE_ADDR']; // Get visitor ip

$query = @unserialize(file_get_contents('http://ip-api.com/php/'.'185.126.66.172')); //Connection to ip-api.com server and get data. If site is online, you can change second parameter with $ip

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