<?php
    session_start();
    $erreur=0;
    if(isset ($_POST["envoi"])){
        if ((!empty(trim($_POST["id"]))) && (!empty(trim($_POST["mdp"])))){
            $_SESSION['identifiant'] = $_POST["id"];
            include("connex.inc.php");
            $idcom=connex("ele","myparam");
            $id = $_POST["id"];
            $mdp = mysqli_real_escape_string($idcom, $_POST["mdp"]);
            $mdpcrypte = MD5($mdp);
            $mdpbase = MD5("HelloToJO");
            $requete="SELECT MDP_Membre FROM Membre_CO WHERE ID_Membre = $id ";
            $result=@mysqli_query($idcom,$requete);
            if(!$result){
                $erreur=1;
            }
            else{
                while($ligne=mysqli_fetch_array($result,MYSQL_NUM)){
                    if(($mdpcrypte == $ligne[0]) && ($mdpcrypte == $mdpbase)){
                        header("Location: mdp_modification.php");
                    }
                    else if (($mdpcrypte == $ligne[0]) && ($mdpcrypte != $mdpbase)) {
                        header("Location: accueil.php");
                    }
                    else {
                        $erreur=1;
                    }
                }
            }
        }
        else {
            $erreur=1;
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
            <form method="post" action="connexion.php"> 
                <div>
                    <FONT size = "6pt">
                        <h2 align=center>Les Jeux Olympiques de 2024 </h2>
                    </FONT>
                </div>
                <div>
                    <img class="pos_m" width="200" src="logo.jpg" alt="Logo JO"><br>
                    <fieldset class="align fieldset_m">
                    <label class="g_m"> Identification </label>
                            <br>
                            <br>
                            <label for="identifiant"> Identifiant : </label> <input type="text" id="identifiant" name="id"><br><br>
                            <label for="motdepasse"> Mot de passe : </label> <input type="password" id="motdepasse" name="mdp"><br> <br> 
                        <input class="button_m" type="submit" name="envoi" value="Se connecter" /><br><br>
                        <a href="mdp_oublie.php" >Mot de passe oubli&eacute; </a><br><br>
                        <?php
                            if($erreur==1){
                                    echo "<label class=\"erreur \"> L'identifiant ou le mot de passe saisi est incorrect </label> <br>
                                    <label class=\" erreur\"> Veuillez r&eacute;essayer </label><br>";
                            }
                        ?>
                    </fieldset>
                </div>
                <div>
                    <img class="pos1_m" width="300" src="imagefemme.jpg" alt="Image JO"><br>
                </div>
            </form>
		</body>
</html>