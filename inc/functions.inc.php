<?php


/*
Fonction qui renvoie true si l'utilisateur est connecté, false sinon
*/

function isConnect()
{
	if (!isset($_SESSION["user"]) OR empty($_SESSION["user"]))
	{
		return false;
	}
	return true;
}


/*
Fonction qui renvoie true si l'utilisateur est admin, false sinon
*/
function isAdmin()
{
	if (!isConnect())
	{
		return false;
	}
	if ($_SESSION["user"]["statut"] == 0)
	{
		return false;
	}
	return true;
}