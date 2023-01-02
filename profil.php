<?php 

include("inc/init.inc.php");


$title = "Profil";

//echo time();

include("inc/head.inc.php");

// Si il n'y a pas de session, on fait toutes les vérifs
// Sinon, on passe directe sur la page
if (!isset($_SESSION["user"])) 
{
	// On rentre dans le if si le user n'existe pas ou si il est vide
	if (!isset($_POST["user"]) || empty($_POST["user"]))
	{
		header('Location: connexion.php?message=empty_user');
		exit;
	}

	// On rentre dans le if si le user n'existe pas ou si il est vide
	if (!isset($_POST["password"]) || empty($_POST["password"]))
	{
		header('Location: connexion.php?message=empty_pswd');
		exit;
	}


	if ($_POST["user"] != "admin" || $_POST["password"] != "pikachu")
	{
		header('Location: connexion.php?message=error_auth');
		exit;
	}

	setcookie("login", $_POST["user"], time() + 3 * 30 * 24 * 60 * 60);
	$_SESSION["user"] = $_POST["user"];
}






?>

<h1 class="text-center my-5">Page de profil<h1>

<?php
include("inc/footer.inc.php");
