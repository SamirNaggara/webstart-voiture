<?php 

include("inc/init.inc.php");
include("inc/functions.inc.php");


$title = "Profil";

//echo time();



// Si il n'y a pas de session, on fait toutes les vérifs
// Sinon, on passe directe sur la page
if (!isset($_SESSION["user"])) 
{
	// On rentre dans le if si le user n'existe pas ou si il est vide
	if (!isset($_POST["user"]) || empty($_POST["user"]))
	{
		$_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				SVP, veuillez remplir le champs login
			</div>";
		
	}

	// On rentre dans le if si le user n'existe pas ou si il est vide
	if (!isset($_POST["password"]) || empty($_POST["password"]))
	{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				SVP, veuillez remplir le champs mot de passe
			</div>";
	}


	if ($_POST["user"] != "admin" || $_POST["password"] != "pikachu")
	{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				Login ou Mot de passe incorrect
			</div>";
	}


	if (!empty($_SESSION["message"]))
	{
		header('Location: connexion.php');
		exit();
	}

	setcookie("login", $_POST["user"], time() + 3 * 30 * 24 * 60 * 60);
	$_SESSION["user"] = $_POST["user"];
}

include("inc/head.inc.php");
include("inc/header.inc.php");




?>

<h1 class="text-center my-5">Page de profil<h1>

<?php
include("inc/footer.inc.php");
