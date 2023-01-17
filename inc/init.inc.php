<?php

session_start();


// Connexion à la BDD

$host = "localhost";
$dbname = "voiture";
$user = "root";
$pass = "root";

$bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);


define("URL", "http://localhost:8888/php-cours/voiture/");
//define("ASSETS", URL . "assets/");
const ASSETS = URL . "assets/";

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";



