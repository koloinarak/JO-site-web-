<?php
    include("session_connex.php");
    $erreur=0;
    $nom = "Aucune information";
    $prenom = "Aucune information";
    $date = "Aucune information";
    $nationalite = "Aucune information";
    include("connex.inc.php");
    $idcom=connex("ele","myparam");
    $ids =session_existe();
    $requete="SELECT Participant.ID_Participant, Nom_Participant, Prenom_Participant, Date_Naiss_Participant, Nationalite_Participant FROM Membre_CO, Participant WHERE ID_Membre = $ids AND Membre_CO.ID_Participant = Participant.ID_Participant";
    $result=@mysqli_query($idcom,$requete);
    if(!$result){
        echo "Erreur de connexion a la base de donn&eacute;e";
    }
    else {
        while($ligne=mysqli_fetch_array($result,MYSQL_NUM)){
            $id_p = $ligne[0];
            $nom = $ligne[1];
            $prenom = $ligne[2];
            $date = $ligne[3];
            $nationalite = $ligne[4];
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
            <form method="post" action="personnel.php"> 
                <div class='align'> 
                    <br>
                    Voici votre espace Personnel : <br><br><br>
                    Nom : <?php echo "<input type=\"texte\" maxlength = \"30\" name=\"nom_1\" value=\"$nom\"/><br><br>"; ?>
                    Prenom : <?php echo "<input type=\"texte\" maxlength = \"30\" name=\"prenom_1\" value=\"$prenom\"/><br><br>"; ?>
                    Date de naissance : <?php echo "<input type=\"texte\" name=\"date_naiss_1\" value=\"$date\"/><br><br>"; ?>
                    Nationalit&eacute; : <?php echo "<input type=\"texte\" maxlength = \"30\" name=\"nationalite_1\" value=\"$nationalite\"/><br><br>"; ?>
                    Mot de passe :  <input type="password" id="motdepasse" name="motdp"><br> <br> 
                    Confirmer le mot de passe : <input type="password" id="mdp" name="motdep"><br> <br> 

                    <input class="button_e" type="submit" name="appliquer" value="Appliquer" /> <br><br>
                    
                    <?php
                        if(isset ($_POST["appliquer"])){
                            $nom_1 = mysqli_real_escape_string($idcom, $_POST["nom_1"]);
                            $prenom_1 = mysqli_real_escape_string($idcom, $_POST["prenom_1"]);
                            $date_1 = mysqli_real_escape_string($idcom, $_POST["prenom_1"]);
                            $nationalite_1 = mysqli_real_escape_string($idcom, $_POST["nationalite_1"]);
                            if ((!empty(trim($_POST["motdp"]))) && (!empty(trim($nom_1))) && (!empty(trim($prenom_1))) && (!empty(trim($date_1))) && (!empty(trim($nationalite_1))) && (!empty(trim($_POST["motdep"])))){
                                $mdp1 = mysqli_real_escape_string($idcom, $_POST["motdp"]);
                                $mdp2 = mysqli_real_escape_string($idcom, $_POST["motdep"]);
                                if( $mdp1 == $mdp2){
                                    $mdpcrypte = MD5($mdp1);
                                    $mdpex = MD5("HelloToJO");
                                    if( $mdpcrypte != $mdpex){
                                        $requete1="SELECT MDP_Membre FROM Membre_CO WHERE ID_Membre = $ids";
                                        $resultat=@mysqli_query($idcom,$requete1);
                                        if(!$resultat)
                                        {
                                            echo "<label class=\"erreur\"> Le mot de passe n'a pas pu etre modifi&eacute; </label> <br>
                                            <label class=\" erreur\"> Veuillez r&eacute;essayer </label><br>";
                                        }
                                        else
                                        {
                                            if($resultat != null){
                                                while($ligne=mysqli_fetch_array($resultat,MYSQL_NUM)){
                                                   if($ligne[0] == $mdpcrypte){
                                                    echo "<label class=\"erreur \"> Le mot de passe doit etre diff&eacute;rent de celui actuel </label> <br>";
                                                   }
                                                   else {
                                                        $requete2="UPDATE Membre_CO SET MDP_Membre='$mdpcrypte' WHERE ID_Membre = $ids";
                                                        $requete3="UPDATE Participant SET Nom_Participant='$nom_1', Prenom_Participant='$prenom_1', Date_Naiss_Participant= '$date_1', Nationalite_Participant='$nationalite_1' WHERE ID_Participant = $id_p";
                                                        $resultat1=@mysqli_query($idcom,$requete2);
                                                        $resultat2=@mysqli_query($idcom,$requete3);
                                                        if(!$resultat1 && !$resultat2){
                                                            echo "Erreur : La modification n'a pas pu etre r&eacute;alis&eacute;e";
                                                        }
                                                        else {
                                                            if ($resultat1 != null && $resultat2 != null){
                                                                echo "La modification a &eacute;t&eacute; r&eacute;alis&eacute;e <br><br>";
                                                                echo "Veuillez recharger la page pour voir les modifications apport&eacute;es";
                                                            }
                                                        }
                                                   }
                                                }
                                            }
                                        }
                                    }
                                    else{
                                        echo "<label class=\"erreur \"> Le mot de passe doit etre diff&eacute;rent de celui que vous venez d'ins&eacute;rer </label> <br>";
                                    }
                                }
                                else{
                                    echo "<label class=\"erreur \"> Le mot de passe n'est pas &eacute;gal </label> <br>";
                                }
                            }
                            else if((empty(trim($_POST["motdp"]))) && (!empty(trim($nom_1))) && (!empty(trim($prenom_1))) && (!empty(trim($date_1))) && (!empty(trim($nationalite_1))) && (empty(trim($_POST["motdep"])))) {
                                $requete4="UPDATE Participant SET Nom_Participant='$nom_1', Prenom_Participant='$prenom_1', Date_Naiss_Participant= '$date_1', Nationalite_Participant='$nationalite_1' WHERE ID_Participant = $id_p";
                                $resultat3=@mysqli_query($idcom,$requete4);
                                if(!$resultat3){
                                    echo "Erreur : La modification n'a pas pu etre r&eacute;alis&eacute;e";
                                }
                                else {
                                    if ($resultat3 != null){
                                        echo "La modification a &eacute;t&eacute; r&eacute;alis&eacute;e <br><br>";
                                        echo "Veuillez retourner dans votre espace personnel pour voir les modifications apport&eacute;es";
                                    }
                                }
                            }
                            else {
                                echo "Erreur : La modification n'a pas pu etre r&eacute;alis&eacute;e";
                            }
                        }   
                        else if($erreur == 3){
                            echo "<label class=\"erreur \"> Le mot de passe doit etre diff&eacute;rent de celui actuel </label> <br>";
                        }
                        else if($erreur == 4){
                            echo "<label class=\"erreur \"> Le mot de passe n'est pas &eacute;gal </label> <br>";
                        }
                        else if($erreur == 5) {
                            echo "<label class=\"erreur \"> Le mot de passe saisi est incorrect </label> <br>
                            <label class=\" erreur\"> Veuillez r&eacute;essayer </label><br>";
                        }
                    ?>
                    </div>
                </div>
            </form>
		</body>
</html>