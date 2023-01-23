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
			  Quelque chose ne s'est pas déroulé correctement pendant la requete
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

// echo "<pre>";
// print_r($allUsers);
// echo "</pre>";



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
			      <th scope="col">Actions</th>
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
	  					<td><?=$user["statut"] ? "Administrateur" : ""?></td>
	  					<td>
	  						<?php 
	  							if ($user["statut"] == 0)
	  							{
	  								?>
	  								<a href="<?=URL?>admin/gestion_admin.php?id=<?=$user["id_user"]?>" class="btn btn-secondary">Devenir administrateur</a>
	  								<?php
	  							}
	  							?>
	  					</td>
	  				</tr>
	  				<?php
	  			}

	  			?>
	  	</tbody>
</table>


<?php 



include("../inc/footer.inc.php");