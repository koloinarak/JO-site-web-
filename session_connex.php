<?php
function session_existe()
{
	session_start();
	if(!isset($_SESSION['identifiant']))
	{
		session_unset();
		session_destroy();
		header("Location: connexion.php");
	}
    else {
        return $_SESSION['identifiant'];
    }
}
?>