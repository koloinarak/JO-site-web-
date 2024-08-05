<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="esthetique.css" rel="stylesheet">
	<title>
		Jeux olympiques 2024
	</title>
	</head>
		<body>
            <form method="post" action="header.php"> 
                <div class="align">
                    <img class="pos_m" width="100" src="logo.jpg" alt="Logo JO">
                    <img class="pos1_m" width="100" src="logo2.jpg" alt="Logo JO">
                    <FONT size = "6pt">
                        <h2>Les Jeux Olympiques 2024 </h2>
                    </FONT>
                </div>
                <div class="align"> 
                    <input class="bouton p1" type="submit" name="accueil" value="Accueil" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="bouton p1" type="submit" name="espace" value="Espace Personnel" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="bouton p1" type="submit" name="annuaire" value="Annuaire" /> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="bouton p1" type="submit" name="recherche" value="Recherche" /> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="bouton p1" type="submit" name="deconnexion" value="Deconnexion" />
                </div>
                <?php
                    if(isset ($_POST["accueil"])){
                        header("Location: accueil.php");
                    }
                    if(isset ($_POST["espace"])){
                        header("Location: espace.php");
                    }
                    if(isset ($_POST["annuaire"])){
                        header("Location: annuaire.php");
                    }
                    if(isset ($_POST["recherche"])){
                        header("Location: recherche.php");
                    }
                    if(isset ($_POST["deconnexion"])){
                        session_unset();
                        session_destroy();
                        header("Location: connexion.php");
                    }
                ?>
            </form>
		</body>
</html>