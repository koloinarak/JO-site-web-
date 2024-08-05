<?php
    include("session_connex.php");
    $nom = "Aucune information";
    $prenom = "Aucune information";
    $date = "Aucune information";
    $nationalite = "Aucune information";
    include("connex.inc.php");
    $idcom=connex("ele","myparam");
    $ids =session_existe();
    $requete="SELECT Nom_Participant, Prenom_Participant, Date_Naiss_Participant, Nationalite_Participant FROM Membre_CO, Participant WHERE ID_Membre = $ids AND Membre_CO.ID_Participant = Participant.ID_Participant";
    $result=@mysqli_query($idcom,$requete);
    if(!$result){
        echo "Erreur de connexion a la base de donn&eacute;e";
    }
    else {
        while($ligne=mysqli_fetch_array($result,MYSQL_NUM)){
            $nom = $ligne[0];
            $prenom = $ligne[1];
            $date = $ligne[2];
            $nationalite = $ligne[3];
        }
    }

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
		<body class ="fond1">
            <form method="post" action="espace.php"> 
                <div class='align'> 
                    <br>
                    Voici votre espace Personnel : <br><br><br>
                    Nom : <?php echo "$nom"; ?><br><br><br>
                    Prenom : <?php echo "$prenom"; ?><br><br><br>
                    Date de naissance : <?php echo "$date"; ?><br><br><br>
                    Nationalit&eacute; : <?php echo "$nationalite"; ?><br><br><br>
                    <input class="button_e" type="submit" name="modification" value="Modifier" /> <br><br>
                    <?php
                        if(isset ($_POST["modification"])){
                            header("Location: personnel.php");
                        }    
                    ?>
                    <br><br>
                    <div>
                        Op&eacute;rations sur les tables : 
                        <input class="button_a" type="submit" name="ajouter" value="Ajout" /> 
                        <input class="button_a" type="submit" name="supprimer" value="Suppression" /> 
                        <input class="button_a" type="submit" name="modifier" value="Modification" /> 
                    </div>
                    <?php
                        if(isset ($_POST["ajouter"])){
                            header("Location: ajouter.php");
                        }    
                        if(isset ($_POST["supprimer"])){
                            header("Location: supprimer.php");
                        }    
                        if(isset ($_POST["modifier"])){
                            header("Location: modifier.php");
                        }    
                    ?>
                </div>
            </form>
		</body>
</html>