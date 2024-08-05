<?php
    include("session_connex.php");
    include("connex.inc.php");
    $idcom=connex("ele","myparam");
	$identifiant=session_existe();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="esthetique.css" rel="stylesheet">
    <?php 
        include("header.php")
    ?>
	<title>
		Jeux olympiques 2024
	</title>
	</head>
		<body class ="fond2">
			<form method="post" action="resultat_recherche.php"> 
			<br><br><br><br><br><br><br><br>
			<div class="align bordure">
				<div>
					<input class="recherche bordure2" type="search" name = "barre" placeholder="equipe" /> 
					<input class="button_recherche" type="submit" name="bouton" value="Rechercher" /> 
				</div>
				<div>
					<label class="important">
						Filtre : <br><br>
					</label>
					<div> 
                    <label>
                        <input class="sel" type="radio" id="participant" name = "filtre" value="participant"/>
                        Participant 
                        <div class="invisible align">
                            <br>
								<input type="checkbox" name="nom_p"/> <label> Nom </label>
                                <input type="checkbox" name="prenom_p" /> <label> Prenom </label>
								<input type="checkbox" name="nationalite_p" /> <label> Nationalit&eacute; </label>
								<input type="checkbox" name="date_p" /> <label> Date de naissance </label>
							<br>
                        </div> 
                        <br><br>
                    </label>
                </div>
				<div> 
                    <label>
                        <input class="sel" type="radio" id="equipe" name = "filtre" value="equipe"/>
                        Equipe 
                        <div class="invisible align">
                            <br>
								<input type="checkbox" name="nom_e"/> <label> Nom de l'&eacute;quipe </label>
                                <input type="checkbox" name="nom_en" /> <label> Nom de l'entraineur de l'&eacute;quipe </label>
								<input type="checkbox" name="pre_e" /> <label> Pr&eacute;nom de l'entraineur de l'&eacute;quipe </label>
							<br>
                        </div> 
                        <br><br>
                    </label>
                </div>
				<div> 
                    <label>
                        <input class="sel" type="radio" id="competition" name = "filtre" value="competition"/>
                        Comp&eacute;tition 
                        <div class="invisible align">
                            <br>
								<input type="checkbox" name="niv_c"/> <label> Nom de la comp&eacute;tition </label>
                                <input type="checkbox" name="date_c" /> <label> Date </label>
								<input type="checkbox" name="horaire_c" /> <label> Horaire </label>
								<input type="checkbox" name="ville_c"/> <label> Ville </label>
                                <input type="checkbox" name="discipline_c" /> <label> Discipline </label>
								<input type="checkbox" name="genre_c" /> <label> Genre </label>
							<br>
                        </div> 
                        <br><br>
                    </label>
                </div>
			</div>
            </form>
		</body>
</html>