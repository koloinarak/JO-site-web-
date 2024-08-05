<?php
    $erreur = 0;
    $reussite = 0;
    include("session_connex.php");
    include("connex.inc.php");
    $idcom=connex("ele","myparam");
    $ids = session_existe();
    $requete="SELECT Nom_Participant, Prenom_Participant FROM Membre_CO M, Participant P WHERE ID_Membre = $ids AND M.ID_Participant = P.ID_Participant";
    $result=@mysqli_query($idcom,$requete);
    if(!$result){
        $erreur = 6;
    }
    if(isset ($_POST["envoi"])){
        if ((!empty(trim($_POST["motdp"]))) && (!empty(trim($_POST["motdep"])))){
            $mdp1 = mysqli_real_escape_string($idcom, $_POST["motdp"]);
            $mdp2 = mysqli_real_escape_string($idcom, $_POST["motdep"]);
            if( $mdp1 == $mdp2){
                $mdpcrypte = MD5($mdp1);
                $mdpex = MD5("HelloToJO");
                if( $mdpcrypte != $mdpex){
                    $requete1="SELECT MDP_Membre FROM Membre_CO WHERE ID_Membre = $ids";
                    $result1=@mysqli_query($idcom,$requete1);
                    if(!$result1){
                        $erreur=1;
                    }
                    else{
                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                            $mdp_existant = $ligne[0];
                        }
                        if($mdp_existant == $mdpcrypte){
                            $erreur = 3;
                        }
                        else {
                            $requete2="UPDATE Membre_CO SET MDP_Membre='$mdpcrypte' WHERE ID_Membre = $ids";
                            $result2=@mysqli_query($idcom,$requete2);
                            if(!$result2){
                                $erreur=1;
                            }
                            else{
                                $reussite = 1;
                            }
                        }
                    }
                }
                else{
                    $erreur = 2;
                }
            }
            else{
                $erreur = 4;
            }
        }
        else {
            $erreur = 5;
        }
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="esthetique.css" rel="stylesheet">
	<title>
		Jeux olympiques 2024
	</title>
	</head>
		<body class ="fond_m">
            <form method="post" action="mdp_modification.php"> 
                <div>
                    <FONT size = "6pt">
                        <h2 align=center>Les Jeux Olympiques de 2024 </h2>
                    </FONT>
                </div>
                <div>
                    <fieldset class="align fieldset_m">
                    Bonjour et bienvenu
                    <?php
                        if($erreur == 6){
                            echo "<label class=\"erreur \"> Erreur Identification </label> <br>";
                        }
                        else {
                            while($ligne=mysqli_fetch_array($result,MYSQL_NUM)){
                                echo $ligne[0]." ".$ligne[1];
                            }
                        }
                    ?>
                    <br><br>
                    <label class="g_m"> Modification du mot de passe </label>
                            <br>
                            <br>
                            <label for="motdepasse">Mot de passe : </label> <input type="password" id="motdepasse" name="motdp"><br> <br> 
                            <label for="mdp">Confirmer le mot de passe : </label> <input type="password" id="mdp" name="motdep"><br> <br> 
                        <input class="button_m" type="submit" name="envoi" value="Modification" /><br><br>
                        <?php
                            if($erreur == 1){
                                echo "<label class=\"erreur \"> Le mot de passe n'a pas pu etre modifi&eacute; </label> <br>
                                <label class=\" erreur\"> Veuillez r&eacute;essayer </label><br>";
                            }
                            else if($erreur ==2){
                                echo "<label class=\"erreur \"> Le mot de passe doit etre diff&eacute;rent de celui actuel </label> <br>";
                            }
                            else if($erreur == 3){
                                echo "<label class=\"erreur \"> Le mot de passe doit etre diff&eacute;rent de celui actuel </label> <br>";
                            }
                            else if($erreur == 4){
                                echo "<label class=\"erreur \"> Le mot de passe n'est pas &eacute;quivalent </label> <br>";
                            }
                            else if($erreur == 5) {
                                echo "<label class=\"erreur \"> Le mot de passe saisi est incorrect </label> <br>
                                <label class=\" erreur\"> Veuillez r&eacute;essayer </label><br>";
                            }
                            if($reussite == 1){
                                header("Location: accueil.php");
                            }
                        ?>
                    </fieldset>
                </div>
            </form>
		</body>
</html>