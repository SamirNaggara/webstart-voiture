<?php

include("inc/init.inc.php");


$title = "Inscription";
//print_r($_COOKIE);
//print_r($_SESSION);


if(!empty($_POST)){ //On appelle les portiers que si le formulaire est validé
	
	if (!isset($_POST["nom"]) || empty($_POST["nom"]))
	{
		$_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  SVP, veuillez remplir le champs Nom !
		</div>";
	
	}

	if (!isset($_POST["prenom"]) || empty($_POST["prenom"]))
	{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  SVP, veuillez remplir le champs Prénom !
		</div>";
	}

	if (!isset($_POST["user"]) || empty($_POST["user"]))
	{
	$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  SVP, veuillez remplir le champs Login !
		</div>";

	}

	if (!isset($_POST["email"]) || empty($_POST["email"]))
		{
			$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
				  SVP, veuillez remplir le champs Email !
			</div>";
		}

	if (!isset($_POST["password"]) || empty($_POST["password"]))
		{
			$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
				  SVP, veuillez remplir le champs mot de passe !
			</div>";
	}

	if (!isset($_POST["number"]) || empty($_POST["number"]))
		{
			$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
				  SVP, veuillez remplir le champs Numéro de téléphone !
			</div>";
	}

	// S'il n'y a pas de messages d'erreurs...
	if (empty($_SESSION["message"]))
	{

		$user = strtolower(htmlspecialchars($_POST["user"]));
		$email = strtolower(htmlspecialchars($_POST["email"]));
		$password = htmlspecialchars($_POST["password"]);
		$prenom = strtolower(htmlspecialchars($_POST["prenom"]));
		$nom = strtolower(htmlspecialchars($_POST["nom"]));
		$telephone = htmlspecialchars($_POST["number"]);

		// Enregistrement en bdd

		$requete = "INSERT INTO `user`( `login`, `mail`, `password`, `telephone`, `nom`, `prenom`) VALUES (?, ?, ?, ?, ?, ?)";

		$requetePrepare = $bdd->prepare($requete);

		$reponse = $requetePrepare->execute([
			$user, 
			$email, 
			$password,
			$telephone,
			$nom,
			$prenom
		]);

		if ($reponse)
		{
			$_SESSION["message"] = "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
  				Bravo vous zetes bien inscrit, il est temps de vous connecter !
			</div>";
			header("Location:connexion.php");
			exit;
		}else
		{
			$_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
  				Il y a eu une erreur lors de l'ajout en base de donnée
			</div>";
		}



	}
}



include("inc/head.inc.php");


?>
	<h1 class="text-center my-5">Inscription</h1>
	<?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 
			$_SESSION["message"] = "";
	?>
	<form method="post" action="" class="w-50 mx-auto">
	
		<div class="row g-3">
			<div class="form-floating col-md-6 mb-3">
				<input type="text" class="form-control" id="nom" placeholder="nom" name="nom">
				<label for="nom">Nom</label>
			</div>

			<div class="form-floating col-md-6 mb-3">
				<input type="text" class="form-control" id="prenom" placeholder="Prenom" name="prenom">
				 <label for="prenom">Prénom</label>
			</div>
		</div>

		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="user" placeholder="admin" name="user">
			<label for="user">Login</label>
		</div>

		<div class="form-floating mb-3">
			<input type="email" class="form-control" id="email" placeholder="email" name="email">
			<label for="user">Email</label>
		</div>


		<div class="form-floating mb-3">
			<input type="password" class="form-control" id="password" placeholder="votre mdp" name="password">
			<label for="floatingPassword">Mot de Passe</label>
		</div>

		<div class="form-floating mb-3">
			<input type="tel" class="form-control" id="number" placeholder="telephone" name="number">
			<label for="floatingPassword">Numero de téléphone</label>
		</div>
		<input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">
	</form>

<?php







include("inc/footer.inc.php")



?>