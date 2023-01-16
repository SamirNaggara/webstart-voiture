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