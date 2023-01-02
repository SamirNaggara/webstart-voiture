<?php 

include("inc/init.inc.php");


$title = "Connexion";
//print_r($_COOKIE);
print_r($_SESSION);

if (isset($_GET["message"]) && $_GET["message"] == "empty_user")
{
	$msg = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				SVP, veuillez remplir le champs login
			</div>";
}

if (isset($_GET["message"]) && $_GET["message"] == "empty_pswd")
{
	$msg = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				SVP, veuillez remplir le champs mot de passe
			</div>";
}

if (isset($_GET["message"]) && $_GET["message"] == "error_auth")
{
	$msg = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				Login ou Mot de passe incorrect
			</div>";
}

// if (isset($_COOKIE["login"]))
// {
// 	echo $_COOKIE["login"];
// }

// echo (TEST) ? (TRUE) : (FALSE)






include("inc/head.inc.php");
// include_once("inc/head.inc.php"); Pour etre sur qu'il apparait juste une fois
//require("inc/hea.inc.php"); // Si le fichier n'est pas trouvé, on envoie une erreur fatal
//require_once("inc/hea.inc.php"); // Require + il apparait juste une fois



?>

		<h1 class="text-center my-5">Connexion</h1>
		<?= $msg; ?>
		<form method="post" action="profil.php" class="w-50 mx-auto">
			<div class="form-floating mb-3">
			 	<input type="text" class="form-control" id="user" placeholder="admin" name="user" value="<?=isset($_COOKIE["login"]) ? $_COOKIE["login"] : "";?>">
			 	<label for="user">Votre login</label>
			</div>
			<div class="form-floating">
			  	<input type="password" class="form-control" id="password" placeholder="votre mdp" name="password">
			  	<label for="floatingPassword">Votre Mot de Passe</label>
			</div>
			<input type="submit" class="btn btn-primary mt-3" value="Envoyer">
		</form>

<?php
include("inc/footer.inc.php")

?>

