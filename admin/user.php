<?php

include("../inc/init.inc.php");
include("../inc/functions.inc.php");

$title = "Liste des utilisateurs";

if (!isAdmin())
{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  Grillé ! Vous n'avez pas accès à cette page !
		</div>";
		header("Location:" . URL . "connexion.php");
		exit;

}



// On fait la requete en base de donnée

$requete = "SELECT * FROM user LIMIT 100";


$requetePreparee = $bdd->prepare($requete);

$reponse = $requetePreparee->execute();

if (!$reponse)
{
	$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  Grillé ! Vous n'avez pas accès à cette page !
		</div>";

}

if ($reponse)
{
	$allUsers = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
	// echo "<pre>";
	// print_r($allUsers);
	// echo "</pre>";

}


include("../inc/head.inc.php");
include("../inc/header.inc.php");


?>

<h1 class="text-center my-5">Liste utilisateur</h1>

<table class="table table-striped">
	  <thead>
		    <tr>
			      <th scope="col">Id</th>
			      <th scope="col">Nom</th>
			      <th scope="col">Prenom</th>
			      <th scope="col">Login</th>
			      <th scope="col">Email</th>
			      <th scope="col">Statut</th>
		    </tr>
	  </thead>
	  <tbody class="table-striped">

	  		<?php
	  			foreach ($allUsers as $user)
	  			{
	  				?>
	  				<tr>
	  					<td><?=$user["id_user"]?></td>
	  					<td><?=$user["nom"]?></td>
	  					<td><?=$user["prenom"]?></td>
	  					<td><?=$user["login"]?></td>
	  					<td><?=$user["mail"]?></td>
	  					<td><?=$user["statut"]?></td>
	  				</tr>
	  				<?php
	  			}

	  			?>
	  	</tbody>
</table>


<?php 



include("../inc/footer.inc.php");