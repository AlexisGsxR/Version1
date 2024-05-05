<?php 

$ip = $_SERVER['SERVER_ADDR'];


if ($ip == '::1'){    
    $base_url = "http://localhost/xampp/startbootstrap/"; 
}
else{    
    $base_url = "http://$ip/xampp/startbootstrap/"; 
}


if(empty($_SESSION)) // if the session not yet started 
    session_start();

if(!isset($_SESSION['username'])) { //if not yet logged in
    header("Location: ".$base_url."login.php");// send to login page
    exit;
} 


$path = $_SERVER['DOCUMENT_ROOT']."/xampp/startbootstrap/";


?>
