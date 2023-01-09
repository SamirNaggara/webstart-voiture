<?php

session_start();


// Connexion à la BDD

$host = "localhost";
$dbname = "voiture";
$user = "root";
$pass = "root";

$bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);




