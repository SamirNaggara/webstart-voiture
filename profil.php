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

	// On fait la requete en base de donnee que si les 2 premiers portier n'ont pas vue d'erreurs
	if (!empty($_SESSION["message"]))
	{
		header('Location: connexion.php');
		exit();
	}

	// On fait la requete en base de donne avec le login

	$login = strtolower(htmlspecialchars($_POST["user"]));
	$password = htmlspecialchars($_POST["password"]);


	$requete = "SELECT * FROM user WHERE login = ?";

	$requetePreparee = $bdd->prepare($requete);

	$reponse = $requetePreparee->execute([
			$login
		]);

	if (!$reponse)
	{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				Il y a eu un probleme avec l'execution de la requete
			</div>";
		header('Location: connexion.php');
		exit();
	}

	// Si le login n'existe pas en bdd, message d'erreur
	if ($requetePreparee->rowCount() == 0)
	{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				Votre login n'existe pas
			</div>";
		header('Location: connexion.php');
		exit();
	}

	// Si le user existe, on verifie le mdp
	if ($requetePreparee->rowCount() == 1)
	{
		$userFromBdd = $requetePreparee->fetch(PDO::FETCH_ASSOC);
		// echo "<pre>";
		// print_r($userFromBdd);
		// echo "</pre>";
		// die;

		$hach_password = $userFromBdd["password"];
		if (!password_verify($password, $hach_password))
		{
			$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				Votre mdp est incorrect
			</div>";
		}
	
	}



	if (!empty($_SESSION["message"]))
	{
		header('Location: connexion.php');
		exit();
	}

	setcookie("login", $_POST["user"], time() + 3 * 30 * 24 * 60 * 60);
	$_SESSION["user"] = $userFromBdd;
}

include("inc/head.inc.php");
include("inc/header.inc.php");




?>

<h1 class="text-center my-5">Page de profil<h1>

<?php
include("inc/footer.inc.php");
