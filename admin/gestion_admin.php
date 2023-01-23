<?php

include("../inc/init.inc.php");
include("../inc/functions.inc.php");


if (!isAdmin())
{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  Grillé ! Vous n'avez pas accès à cette page !
		</div>";
		header("Location:" . URL . "connexion.php");
		exit;
}



if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "delete")
{
	$requete = "DELETE FROM `user` WHERE id_user = ?";

	$requetePreparee = $bdd->prepare($requete);

	$reponse = $requetePreparee->execute([
		$_GET["id"]
		]);

	if (!$reponse)
	{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  La requete ne s'est pas déroulé correctement
		</div>";
		header("Location:" . URL . "admin/user.php");
		exit;
	}

	if ($requetePreparee->rowCount() == 0)
	{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  L'utilisateur que vous essayez de supprimer, n'existe pas !
		</div>";
		header("Location:" . URL . "admin/user.php");
		exit;
	}

	if ($requetePreparee->rowCount() == 1)
	{
		$_SESSION["message"] .= "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
			  Vous avez bien supprimé l'utilisateur dont l'id est " . $_GET["id"] . "
		</div>";
		header("Location:" . URL . "admin/user.php");
		exit;
	}
}



$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  Quelque chose ne s'est pas déroulé correctement
		</div>";
header("Location:" . URL . "admin/user.php");
exit;

