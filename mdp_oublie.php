<?php
    include("session_connex.php");
    $erreur=0;
    $res = "Aucune valeur";
    $identifiant=session_existe();
    if(isset ($_POST["envoi"])){
        if ((!empty(trim($_POST["id"]))) && (!empty(trim($_POST["nom"]))) && (!empty(trim($_POST["prenom"]))) && (!empty(trim($_POST["date_naiss"])))){
            if(!isset($_SESSION['identifiant'])){
                $_SESSION['identifiant'] = $_POST["id"];
            }
            include("connex.inc.php");
            $idcom=connex("ele","myparam");
            $id =mysqli_real_escape_string($idcom,  $_POST["id"]);
            $nom = mysqli_real_escape_string($idcom, $_POST["nom"]);
            $prenom =mysqli_real_escape_string($idcom,  $_POST["prenom"]);
            $date_naiss = mysqli_real_escape_string($idcom, $_POST["date_naiss"]);
            $requete="SELECT ID_Membre FROM Membre_CO M, Participant P WHERE P.ID_Participant = M.ID_Participant AND Nom_Participant = '$nom' AND Prenom_Participant = '$prenom' AND Date_Naiss_Participant = '$date_naiss' AND ID_Membre = $id ";
            $result=@mysqli_query($idcom,$stid);
            if(!$result) {
                $erreur=1;
            }
            else{
                while($ligne=mysqli_fetch_array($result,OCI_ASSOC+OCI_RETURN_NULLS)){
                    $res = $ligne[0];
                }
                if($res == "Aucune valeur"){
                    $erreur = 1;
                }
                else{
                    header("Location: mdp_modification.php");
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
            <form method="post" action="oubli.php"> 
                <div>
                    <FONT size = "6pt">
                        <h2 align=center>Les Jeux Olympiques de 2024 </h2>
                    </FONT>
                </div>
                <div>
                    <img class="pos_m" width="200" src="logo.jpg" alt="Logo JO"><br>
                    <fieldset class="align fieldset_m">
                    <label class="g_m"> Veuillez rentrer les informations suivantes afin de vous identifier </label>
                            <br>
                            <br>
                            <label for="identifiant"> Identifiant : </label> <input type="text" id="identifiant" name="id"><br><br>
                            <label for="identifiant"> Nom : </label> <input type="text" id="nom" name="nom"><br><br>
                            <label for="identifiant"> Prenom : </label> <input type="text" id="prenom" name="prenom"><br><br>
                            <label for="motdepasse"> Date de naissance : </label> <input type="password" id="date_naiss" placeholder="20/06/2020" name="date_naiss"><br> <br> 
                        <input class="button_m" type="submit" name="envoi" value="S'identifier" /><br><br>
                        <?php
                            if($erreur==1){
                                echo "<label class=\"erreur \"> Les informations saisies sont incorrectes. </label> <br>
                                <label class=\" erreur\"> Veuillez r&eacute;essayer </label><br>";
                            }
                        ?>
                    </fieldset>
                </div>
                <div>
                    <img class="pos1_m" width="300" src="imagefemme.jpg" alt="Logo JO"><br>
                </div>
            </form>
		</body>