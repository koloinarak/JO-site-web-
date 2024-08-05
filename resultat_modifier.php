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
		<body class ="fond1">
            <form method="post" action="resultat_modifier.php"> 
                <div class='align'> 
                    <br>
                    Vous pouvez ici modifier l'&eacute;l&eacute;ment s&eacute;l&eacute;ctionn&eacute; <br><br>
                </div> 
                
                <div class="align">
                    <?php
                        $erreur=0;
                        $option = 0;
                        $reussite=0;
                        $res = "Aucune valeur";
                        $res_1 = "Aucune valeur";
                        $res_2 = "Aucune valeur";
                        $res_3 = "Aucune valeur";
                        $res_5 = "Aucune valeur";
                        if(isset ($_POST["modifier"])){
                            if(!empty(trim($_POST["choix"]))){
                                $_SESSION['attribut'] = $_POST["choix"];
                                $attribut=$_POST["choix"];
                                //participant
                                if($attribut == "participant"){ 
                                    if(!empty(trim($_POST["type_p"]))){
                                        $_SESSION['participant'] = $_POST["type_p"];
                                        $participant=$_POST["type_p"];
                                        if($participant == "membre"){
                                            if(!empty(trim($_POST["nom_1"])) && !empty(trim($_POST["prenom_1"])) && !empty(trim($_POST["date_naiss_1"])) && !empty(trim($_POST["nationalite_1"]))){
                                                $nom_1=mysqli_real_escape_string($idcom, $_POST["nom_1"]);
                                                $prenom_1=mysqli_real_escape_string($idcom, $_POST["prenom_1"]);
                                                $date_1=mysqli_real_escape_string($idcom, $_POST["date_naiss_1"]);
                                                $nationalite_1=mysqli_real_escape_string($idcom, $_POST["nationalite_1"]);

                                                $requete_m1="SELECT P.ID_Participant FROM Membre_CO M, Participant P WHERE P.ID_Participant = M.ID_Participant AND Nom_Participant ='$nom_1' AND Prenom_Participant = '$prenom_1' AND Date_Naiss_Participant ='$date_1' AND Nationalite_Participant = '$nationalite_1'";
                                                $resultat_m1=@mysqli_query($idcom,$requete_m1);
                                                if(!$resultat_m1){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_m1,MYSQL_NUM)){
                                                        $res = $ligne[0];
                                                    }
                                                    if($res == "Aucune valeur "){
                                                        $erreur = 4;
                                                    }
                                                    else {
                                                        echo "<br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nom1\" value=\"$nom_1\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenom1\" value=\"$prenom_1\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"date1\" value=\"$date_1\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input type=\"texte\" maxlength = \"30\" name=\"nationalite1\" value=\"$nationalite_1\"/> &nbsp; <br><br>";   
                                                        $option = 1;    
                                                        $_SESSION['res'] = $res;
                                            
                                                    }
                                                }
                                            }
                                            else{
                                                $erreur=2;
                                            }
                                        }
                                        else if($participant == "athlete"){
                                            if(!empty(trim($_POST["nom_2"])) && !empty(trim($_POST["prenom_2"])) && !empty(trim($_POST["date_naiss_2"])) && !empty(trim($_POST["nationalite_2"])) && !empty(trim($_POST["taille_2"])) && !empty(trim($_POST["poids_2"])) && !empty(trim($_POST["genre_athlete"])) && !empty(trim($_POST["nom_entraineur_athlete"])) && !empty(trim($_POST["prenom_entraineur_athlete"]))){
                                                $nom_2=mysqli_real_escape_string($idcom, $_POST["nom_2"]);
                                                $prenom_2=mysqli_real_escape_string($idcom, $_POST["prenom_2"]);
                                                $date_2=mysqli_real_escape_string($idcom, $_POST["date_naiss_2"]);
                                                $nationalite_2=mysqli_real_escape_string($idcom, $_POST["nationalite_2"]);
                                                $taille_2=mysqli_real_escape_string($idcom, $_POST["taille_2"]);
                                                $poids_2=mysqli_real_escape_string($idcom, $_POST["poids_2"]);
                                                $genre_2=mysqli_real_escape_string($idcom, $_POST["genre_athlete"]);
                                                $nom_entraineur_athlete=mysqli_real_escape_string($idcom, $_POST["nom_entraineur_athlete"]);
                                                $prenom_entraineur_athlete=mysqli_real_escape_string($idcom, $_POST["prenom_entraineur_athlete"]);

                                                $requete_a1="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant = '$nom_2'
                                                    AND Prenom_Participant = '$prenom_2' AND Date_Naiss_Participant = '$date_2' AND Nationalite_Participant = '$nationalite_2'
                                                    AND Taille_Athlete = '$taille_2' AND Poids_Athlete = '$poids_2' AND Genre_Athlete = '$genre_2'";
                                                $resultat_a1=@mysqli_query($idcom,$requete_a1);
                                                $requete_a2="SELECT P.ID_Participant FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_2' 
                                                    AND Prenom_Participant = '$prenom_2' AND Date_Naiss_Participant ='$date_2' AND Nationalite_Participant = '$nationalite_2' 
                                                    AND Taille_Athlete = '$taille_2' AND Poids_Athlete = '$poids_2' AND Genre_Athlete = '$genre_2'";
                                                $resultat_a2=@mysqli_query($idcom,$requete_a2);
                                                if(!$resultat_a1 && !$resultat_a2){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_a1,MYSQL_NUM)){
                                                        $res = $ligne[0];
                                                    }
                                                    while($ligne=mysqli_fetch_array($resultat_a2,MYSQL_NUM)){
                                                        $res_1 = $ligne[0];
                                                    }
                                                    if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                        $erreur = 4;
                                                    }
                                                    else{
                                                        echo "<br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nom2\" value=\"$nom_2\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenom2\" value=\"$prenom_2\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"date2\" value=\"$date_2\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input type=\"texte\" maxlength = \"30\" name=\"nationalite2\" value=\"$nationalite_2\"/> &nbsp; <br><br>";
                                                        echo "Taille :  <input type=\"texte\" name=\"taille2\" value=\"$taille_2\"/> &nbsp;";
                                                        echo "Poids :  <input type=\"texte\" name=\"poids2\" value=\"$poids_2\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" name=\"genre2\" value=\"$genre_2\"/> &nbsp;<br><br>";
                                                        echo "Nom de l'entraineur de l'athl&egrave;te :  <input type=\"texte\" maxlength = \"30\" name=\"nomentraineurathlete\" value=\"$nom_entraineur_athlete\"/> &nbsp;"; 
                                                        echo "Pr&eacute;nom de l'entraineur de l'athl&egrave;te :  <input type=\"texte\" maxlength = \"30\" name=\"prenomentraineurathlete\" value=\"$prenom_entraineur_athlete\"/> &nbsp; <br><br>"; 
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                            else{
                                                $erreur=2;
                                            }                                            
                                        }
                                        
                                        else if($participant == "personnel"){
                                            if(!empty(trim($_POST["nom_3"])) && !empty(trim($_POST["prenom_3"])) && !empty(trim($_POST["date_naiss_3"])) && !empty(trim($_POST["nationalite_3"])) && !empty(trim($_POST["ville_3"])) && !empty(trim($_POST["role_3"]))){
                                                $nom_3=mysqli_real_escape_string($idcom, $_POST["nom_3"]);
                                                $prenom_3=mysqli_real_escape_string($idcom, $_POST["prenom_3"]);
                                                $date_3=mysqli_real_escape_string($idcom, $_POST["date_naiss_3"]);
                                                $nationalite_3=mysqli_real_escape_string($idcom, $_POST["nationalite_3"]);
                                                $ville_3=mysqli_real_escape_string($idcom, $_POST["ville_3"]);
                                                $role_3=mysqli_real_escape_string($idcom, $_POST["role_3"]);

                                                $requete_pers1="SELECT ID_Personnel FROM Personnel PERS, Participant P WHERE PERS.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_3' 
                                                    AND Prenom_Participant = '$prenom_3' AND Date_Naiss_Participant ='$date_3' AND Nationalite_Participant = '$nationalite_3' AND Ville_Personnel = '$ville_3' 
                                                    AND Role_Personnel = '$role_3'";
                                                $resultat_pers1=@mysqli_query($idcom,$requete_pers1);
                                                $requete_pers2="SELECT P.ID_Participant FROM Personnel PERS, Participant P WHERE PERS.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_3' 
                                                    AND Prenom_Participant = '$prenom_3' AND Date_Naiss_Participant ='$date_3' AND Nationalite_Participant = '$nationalite_3' AND Ville_Personnel = '$ville_3' 
                                                    AND Role_Personnel = '$role_3'";
                                                $resultat_pers2=@mysqli_query($idcom,$requete_pers2);
                                                if(!$resultat_pers1 && !$resultat_pers2){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_pers1,MYSQL_NUM)){
                                                        $res = $ligne[0];
                                                    }
                                                    while($ligne=mysqli_fetch_array($resultat_pers2,MYSQL_NUM)){
                                                        $res_1 = $ligne[0];
                                                    }
                                                    if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                        $erreur = 4;
                                                    }
                                                    else {
                                                        echo "<br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nom3\" value=\"$nom_3\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenom3\" value=\"$prenom_3\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"date3\" value=\"$date_3\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input type=\"texte\" maxlength = \"30\" name=\"nationalite3\" value=\"$nationalite_3\"/> &nbsp; <br><br>";
                                                        echo "Ville :  <input type=\"texte\" name=\"ville3\" maxlength = \"30\" value=\"$ville_3\"/> &nbsp;";
                                                        echo "R&ocirc;le :  <input type=\"texte\" name=\"role3\" maxlength = \"30\" value=\"$role_3\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                            else{
                                                $erreur=2;
                                            }
                                        }
                                        else if($participant == "entraineur"){
                                            if(!empty(trim($_POST["nom_4"])) && !empty(trim($_POST["prenom_4"])) && !empty(trim($_POST["date_naiss_4"])) && !empty(trim($_POST["nationalite_4"])) && !empty(trim($_POST["diplome_4"]))){
                                                $nom_4=mysqli_real_escape_string($idcom, $_POST["nom_4"]);
                                                $prenom_4=mysqli_real_escape_string($idcom, $_POST["prenom_4"]);
                                                $date_4=mysqli_real_escape_string($idcom, $_POST["date_naiss_4"]);
                                                $nationalite_4=mysqli_real_escape_string($idcom, $_POST["nationalite_4"]);
                                                $diplome_4=mysqli_real_escape_string($idcom, $_POST["diplome_4"]);

                                                $requete_entr1="SELECT ID_Entraineur FROM Entraineur E, Participant P WHERE E.ID_Participant = P.ID_Participant AND
                                                    Nom_Participant ='$nom_4' AND Prenom_Participant = '$prenom_4' AND Date_Naiss_Participant ='$date_4' 
                                                    AND Nationalite_Participant = '$nationalite_4' AND Diplome_Entraineur = '$diplome_4'";
                                                $resultat_entr1=@mysqli_query($idcom,$requete_entr1);
                                                $requete_entr2="SELECT P.ID_Participant FROM Entraineur E, Participant P WHERE E.ID_Participant = P.ID_Participant AND
                                                Nom_Participant ='$nom_4' AND Prenom_Participant = '$prenom_4' AND Date_Naiss_Participant ='$date_4' 
                                                AND Nationalite_Participant = '$nationalite_4' AND Diplome_Entraineur = '$diplome_4'";
                                                $resultat_entr2=@mysqli_query($idcom,$requete_entr2);
                                                if(!$resultat_entr1 && !$resultat_entr2){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_entr1,MYSQL_NUM)){
                                                        $res = $ligne[0];
                                                    }
                                                    while($ligne=mysqli_fetch_array($resultat_entr2,MYSQL_NUM)){
                                                        $res_1 = $ligne[0];
                                                    }
                                                    if($res == "Aucune valeur" || $res_1== "Aucune valeur"){
                                                        $erreur = 4;
                                                    }
                                                    else {
                                                        echo "<br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nom4\" value=\"$nom_4\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenom4\" value=\"$prenom_4\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"date4\" value=\"$date_4\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input type=\"texte\" maxlength = \"30\" name=\"nationalite4\" value=\"$nationalite_4\"/> &nbsp; <br><br>";
                                                        echo "Dipl&ocirc;me :  <input type=\"texte\" maxlength = \"30\" name=\"diplome4\" value=\"$diplome_4\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                            else{
                                                $erreur=2;
                                            }
                                        }

                                    }
                                    else{
                                        $erreur=1;
                                    }
                                }
                                //equipe
                                else if($attribut == "equipe"){
                                    if(!empty(trim($_POST["nom_equipe"])) && !empty(trim($_POST["nom_entraineur_equipe"])) && !empty(trim($_POST["prenom_entraineur_equipe"]))){
                                        $nom_e = mysqli_real_escape_string($idcom, $_POST["nom_equipe"]);
                                        $nom_entraineur_e = mysqli_real_escape_string($idcom, $_POST["nom_entraineur_equipe"]);
                                        $prenom_entraineur_e = mysqli_real_escape_string($idcom, $_POST["prenom_entraineur_equipe"]);
                                        
                                        $requete_e1="SELECT ID_Equipe FROM Entraineur E, Equipe EQ, Participant P WHERE E.ID_Participant = P.ID_Participant AND EQ.ID_Entraineur = E.ID_Entraineur AND Nom_Participant = '$nom_entraineur_e' AND Prenom_Participant = '$prenom_entraineur_e' AND Nom_Equipe = '$nom_e' ";
                                        $resultat_e1=@mysqli_query($idcom,$requete_e1);
                                        if(!$resultat_e1){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_e1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            if($res== "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                echo "<br><br>";
                                                echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nome\" value=\"$nom_e\"/> &nbsp;";
                                                echo "Nom de l'entraineur de l'&eacute;quipe  :  <input type=\"texte\" maxlength = \"30\" name=\"nomentraineure\" value=\"$nom_entraineur_e\"/> &nbsp;";
                                                echo "Pr&eacute;nom de l'entraineur de l'&eacute;quipe :  <input type=\"texte\" maxlength = \"30\" name=\"prenomentraineure\" value=\"$prenom_entraineur_e\"/> &nbsp;<br><br>";
                                                $option = 1;
                                                $_SESSION['res'] = $res;
                                            }
                                        }
                                    }
                                    else {
                                        $erreur=2;
                                    }
                                }
                                else if($attribut == "chambre"){
                                    if(!empty(trim($_POST["numero_chambre"])) && !empty(trim($_POST["batiment_chambre"])) && !empty(trim($_POST["ville_chambre"])) && !empty(trim($_POST["nombre_lit"]))){
                                        $id_chambre = mysqli_real_escape_string($idcom, $_POST["numero_chambre"]);
                                        $bat_chambre = mysqli_real_escape_string($idcom, $_POST["batiment_chambre"]);
                                        $ville_chambre = mysqli_real_escape_string($idcom, $_POST["ville_chambre"]);
                                        $nb_lit_chambre = mysqli_real_escape_string($idcom, $_POST["nombre_lit"]);

                                        $requete_ch1="SELECT ID_Chambre FROM Chambre WHERE ID_Chambre = '$id_chambre' AND Batiment_Chambre = '$bat_chambre' AND Ville_Chambre = '$ville_chambre' AND Nb_Lit_Chambre = '$nb_lit_chambre'";
                                        $resultat_ch1=@mysqli_query($idcom,$requete_ch1);
                                        if(!$resultat_ch1){
                                            $erreur=3;
                                        }
                                        else{
                                            while($ligne=mysqli_fetch_array($resultat_ch1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            if($res== "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                echo "<br><br>";
                                                echo "Num&eacute;ro de chambre : \"$id_chambre\" &nbsp;";
                                                echo "B&acirc;timent :  \"$bat_chambre\" &nbsp;";
                                                echo "Ville :  \"$ville_chambre\" &nbsp;";
                                                echo "Nombre de lits  :  <input type=\"texte\" name=\"nblitchambre\" value=\"$nb_lit_chambre\"/> &nbsp;<br><br>";
                                                $option = 1;
                                                $_SESSION['res'] = $res;
                                            }
                                        }
                                    }
                                    else {
                                        $erreur=2;
                                    }
                                }
                                else if($attribut == "categorie"){
                                    if(!empty(trim($_POST["nom_categorie"])) && !empty(trim($_POST["genre_categorie"]))){
                                        $nom_cat = mysqli_real_escape_string($idcom, $_POST["nom_categorie"]);
                                        $genre_cat = mysqli_real_escape_string($idcom, $_POST["genre_categorie"]);

                                        $requete_cat1="SELECT ID_Categorie FROM Categorie WHERE Nom_Categorie = '$nom_cat' AND Genre_Categorie ='$genre_cat'";
                                        $resultat_cat1=@mysqli_query($idcom,$requete_cat1);
                                        if(!$resultat_cat1){
                                            $erreur=3;
                                        }
                                        else{
                                            while($ligne=mysqli_fetch_array($resultat_cat1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            if($res == "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else{
                                                echo "<br><br>";
                                                echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomcat\" value=\"$nom_cat\"/> &nbsp;";
                                                echo "Genre  :  <input type=\"texte\" name=\"genrecat\" value=\"$genre_cat\"/> &nbsp;<br><br>";
                                                $option = 1;
                                                $_SESSION['res'] = $res;
                                            }
                                        }
                                    }
                                    else {
                                        $erreur=2;
                                    }
                                }
                                else if($attribut == "discipline"){
                                    if(!empty(trim($_POST["nom_discipline"])) && !empty(trim($_POST["rec_discipline"])) && !empty(trim($_POST["categorie_nom"])) && !empty(trim($_POST["genre_discipline"]))){
                                        $nom_d = mysqli_real_escape_string($idcom, $_POST["nom_discipline"]);
                                        $rec_d = mysqli_real_escape_string($idcom, $_POST["rec_discipline"]);
                                        $nom_cat_d = mysqli_real_escape_string($idcom, $_POST["categorie_nom"]);
                                        $genre_d = mysqli_real_escape_string($idcom, $_POST["genre_discipline"]);

                                        $requete_d1="SELECT ID_Discipline FROM Discipline D, Categorie C WHERE D.ID_Categorie = C.ID_Categorie AND Nom_Categorie = '$nom_cat_d' AND Genre_Categorie ='$genre_d' AND Nom_Discipline ='$nom_d' AND Record_Prec_Discipline ='$rec_d'";
                                        $resultat_d1=@mysqli_query($idcom,$requete_d1);
                                        if(!$resultat_d1){
                                            $erreur=3;
                                        }
                                        else{
                                            while($ligne=mysqli_fetch_array($resultat_d1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            if($res== "Aucune valeur"){
                                                $erreur=4;
                                            }
                                            else{
                                                echo "<br><br>";
                                                echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomd\" value=\"$nom_d\"/> &nbsp;";
                                                echo "Record :  <input type=\"texte\" maxlength = \"30\" name=\"recd\" value=\"$rec_d\"/> &nbsp;";
                                                echo "Cat&eacute;gorie :  <input type=\"texte\" maxlength = \"30\" name=\"nomcatd\" value=\"$nom_cat_d\"/> &nbsp;";
                                                echo "Genre :  <input type=\"texte\" name=\"genred\" value=\"$genre_d\"/> &nbsp; <br><br>";
                                                $option = 1;
                                                $_SESSION['res'] = $res;
                                            }
                                        }
                                    }
                                    else {
                                        $erreur=2;
                                    }
                                }
                                else if($attribut == "competition"){
                                    if(!empty(trim($_POST["niveau_compet"])) && !empty(trim($_POST["date_compet"])) && !empty(trim($_POST["horaire_compet"])) && !empty(trim($_POST["ville_compet"])) && !empty(trim($_POST["nom_discipline_compet"])) && !empty(trim($_POST["genre_competition"]))){
                                        $niveau_c = mysqli_real_escape_string($idcom, $_POST["niveau_compet"]);
                                        $date_c = mysqli_real_escape_string($idcom, $_POST["date_compet"]);
                                        $horaire_c = mysqli_real_escape_string($idcom, $_POST["horaire_compet"]);
                                        $ville_c = mysqli_real_escape_string($idcom, $_POST["ville_compet"]);
                                        $discipline_c = mysqli_real_escape_string($idcom, $_POST["nom_discipline_compet"]);
                                        $genre_c = mysqli_real_escape_string($idcom, $_POST["genre_competition"]);


                                        $requete_compet1="SELECT ID_Competition FROM Competition C, Discipline D, Categorie CAT WHERE D.ID_Categorie = CAT.ID_Categorie AND C.ID_Discipline = D.ID_Discipline AND Nom_Discipline = '$discipline_c' AND Genre_Categorie ='$genre_c' AND Niveau_Competition ='$niveau_c' AND Date_Competition ='$date_c' AND Horaire_Competition ='$horaire_c' AND Ville_Competition ='$ville_c'";
                                        $resultat_compet1=@mysqli_query($idcom,$requete_compet1);
                                        if(!$resultat_compet1){
                                            $erreur=3;
                                        }
                                        else{
                                            while($ligne=mysqli_fetch_array($resultat_compet1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            if($res== "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else{
                                                echo "<br><br>";
                                                echo "Niveau :  <input type=\"texte\" name=\"niveauc\" maxlength = \"30\" value=\"$niveau_c\"/> &nbsp;";
                                                echo "Date :  <input type=\"texte\" name=\"datec\" value=\"$date_c\"/> &nbsp;";
                                                echo "Horaire du d&eacute;but :  <input type=\"texte\" name=\"horairec\" value=\"$horaire_c\"/> &nbsp;";
                                                echo "Ville :  <input type=\"texte\" maxlength = \"30\" name=\"villec\" value=\"$ville_c\"/> &nbsp; <br><br>";
                                                echo "Discipline :  <input type=\"texte\" maxlength = \"30\" name=\"disciplinec\" value=\"$discipline_c\"/> &nbsp;";
                                                echo "Genre :  <input type=\"texte\" name=\"genrec\" value=\"$genre_c\"/> &nbsp; <br><br>";
                                                $option = 1;
                                                $_SESSION['res'] = $res;
                                            }
                                        }
                                    }
                                    else {
                                        $erreur=2;
                                    }
                                }
                                else if($attribut == "palmares"){
                                    if(!empty(trim($_POST["medaille_palma"])) && !empty(trim($_POST["resultat_palma"])) && !empty(trim($_POST["date_palma"]))){
                                        $medaille_palma = mysqli_real_escape_string($idcom, $_POST["medaille_palma"]);
                                        $resultat_palma = mysqli_real_escape_string($idcom, $_POST["resultat_palma"]);
                                        $date_palma = mysqli_real_escape_string($idcom, $_POST["date_palma"]);

                                        $requete_palma1="SELECT ID_Palmares FROM Palmares WHERE Medaille_Palmares ='$medaille_palma' AND Resultat_Palmares ='$resultat_palma' AND Date_Palmares ='$date_palma'";
                                        $resultat_palma1=@mysqli_query($idcom,$requete_palma1);
                                        if(!$resultat_palma1){
                                            $erreur=3;
                                        }
                                        else{
                                            while($ligne=mysqli_fetch_array($resultat_palma1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            if($res== "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else{
                                                echo "<br><br>";
                                                echo "Medaille :  <input type=\"texte\" name=\"medaillepalma\" value=\"$medaille_palma\"/> &nbsp;";
                                                echo "R&eacute;sultat :  <input type=\"texte\" maxlength = \"30\" name=\"resultatpalma\" value=\"$resultat_palma\"/> &nbsp;";
                                                echo "Date du palmar&egrave;s :  <input type=\"texte\" name=\"datepalma\" value=\"$date_palma\"/> &nbsp;<br><br>";
                                                $option = 1;
                                                $_SESSION['res'] = $res;
                                            }
                                        }
                                    }
                                    else {
                                        $erreur=2;
                                    }
                                }
                                else if($attribut == "cat_per"){
                                    if(!empty(trim($_POST["nom_cat_per"])) && !empty(trim($_POST["genre_cat_per"])) && !empty(trim($_POST["nom_cat_pers"])) && !empty(trim($_POST["prenom_cat_per"])) && !empty(trim($_POST["date_naiss_cat_per"])) && !empty(trim($_POST["nationalite_cat_per"])) && !empty(trim($_POST["ville_cat_per"])) && !empty(trim($_POST["role_cat_per"]))){
                                        $nom_cat_per = mysqli_real_escape_string($idcom, $_POST["nom_cat_per"]);
                                        $genre_cat_per = mysqli_real_escape_string($idcom, $_POST["genre_cat_per"]);
                                        $nom_cat_pers = mysqli_real_escape_string($idcom, $_POST["nom_cat_pers"]);
                                        $prenom_cat_per = mysqli_real_escape_string($idcom, $_POST["prenom_cat_per"]);
                                        $date_naiss_cat_per = mysqli_real_escape_string($idcom, $_POST["date_naiss_cat_per"]);
                                        $nationalite_cat_per = mysqli_real_escape_string($idcom, $_POST["nationalite_cat_per"]);
                                        $ville_cat_per = mysqli_real_escape_string($idcom, $_POST["ville_cat_per"]);
                                        $role_cat_per = mysqli_real_escape_string($idcom, $_POST["role_cat_per"]);

                                        $requete_cp1="SELECT ID_Categorie FROM Categorie WHERE Nom_Categorie ='$nom_cat_per' AND Genre_Categorie ='$genre_cat_per' ";
                                        $resultat_cp1=@mysqli_query($idcom,$requete_cp1);
                                        $requete_cp2="SELECT ID_Personnel FROM Personnel PER, Participant P WHERE PER.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_cat_pers' AND Prenom_Participant ='$prenom_cat_per' AND Date_Naiss_Participant ='$date_naiss_cat_per' AND Nationalite_Participant ='$nationalite_cat_per' AND Ville_Personnel ='$ville_cat_per'AND Role_Personnel ='$role_cat_per' ";
                                        $resultat_cp2=@mysqli_query($idcom,$requete_cp2);
                                        if(!$resultat_cp1 && !$resultat_cp2){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_cp1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_cp2,MYSQL_NUM)){
                                                $res_1= $ligne[0];
                                            }
                                            if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                $requete_cp3="SELECT ID_Personnel FROM specialise_c WHERE ID_Personnel = '$res_1' AND ID_Categorie = '$res' ";
                                                $resultat_cp3=@mysqli_query($idcom,$requete_cp3);
                                                if(!$resultat_cp3){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_cp3,MYSQL_NUM)){
                                                        $res_5 = $ligne[0];
                                                    }
                                                    if($res_5 == "Aucune valeur"){
                                                        $erreur = 4 ;
                                                    }
                                                    else {
                                                        echo "<br><br> <label class=\"important\"> Cat&eacute;gorie </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomcatper\" value=\"$nom_cat_per\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" maxlength = \"30\" name=\"genrecatper\" value=\"$genre_cat_per\"/> &nbsp;<br><br>";
                                                        echo "<label class=\"important\"> Personnel </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" name=\"nomcatpers\" maxlength = \"30\" value=\"$nom_cat_pers\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenomcatper\" value=\"$prenom_cat_per\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"datenaisscatper\" value=\"$date_naiss_cat_per\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input maxlength = \"30\" type=\"texte\" name=\"nationalitecatper\" value=\"$nationalite_cat_per\"/> &nbsp;<br><br>";
                                                        echo "Ville :  <input type=\"texte\" maxlength = \"30\" name=\"villecatper\" value=\"$ville_cat_per\"/> &nbsp;";
                                                        echo "R&ocirc;le :  <input type=\"texte\" maxlength = \"30\" name=\"rolecatper\" value=\"$role_cat_per\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                else if($attribut == "comp_per"){
                                    if(!empty(trim($_POST["niveau_comp_per"])) && !empty(trim($_POST["date_comp_per"])) && !empty(trim($_POST["horaire_comp_per"])) && !empty(trim($_POST["ville_comp_per"])) && !empty(trim($_POST["nom_discipline_comp_per"])) && !empty(trim($_POST["genre_comp_per"])) && !empty(trim($_POST["nom_comp_per"])) && !empty(trim($_POST["prenom_comp_per"])) && !empty(trim($_POST["date_naiss_comp_per"])) && !empty(trim($_POST["nationalite_comp_per"])) && !empty(trim($_POST["ville_comp_per"])) && !empty(trim($_POST["role_comp_per"]))){
                                        $niveau_comp_per = mysqli_real_escape_string($idcom, $_POST["niveau_comp_per"]);
                                        $date_comp_per = mysqli_real_escape_string($idcom, $_POST["date_comp_per"]);
                                        $horaire_comp_per = mysqli_real_escape_string($idcom, $_POST["horaire_comp_per"]);
                                        $ville_comp_per = mysqli_real_escape_string($idcom, $_POST["ville_comp_per"]);
                                        $nom_discipline_comp_per = mysqli_real_escape_string($idcom, $_POST["nom_discipline_comp_per"]);
                                        $genre_comp_per = mysqli_real_escape_string($idcom, $_POST["genre_comp_per"]);
                                        $nom_comp_per = mysqli_real_escape_string($idcom, $_POST["nom_comp_per"]);
                                        $prenom_comp_per = mysqli_real_escape_string($idcom, $_POST["prenom_comp_per"]);
                                        $date_naiss_comp_per = mysqli_real_escape_string($idcom, $_POST["date_naiss_comp_per"]);
                                        $nationalite_comp_per = mysqli_real_escape_string($idcom, $_POST["nationalite_comp_per"]);
                                        $ville_comp_per = mysqli_real_escape_string($idcom, $_POST["ville_comp_per"]);
                                        $role_comp_per = mysqli_real_escape_string($idcom, $_POST["role_comp_per"]);

                                        $requete_cpers1="SELECT ID_Competition FROM Competition C, Categorie CAT, Discipline D WHERE 
                                            C.ID_Discipline = D.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie AND
                                            Genre_Categorie = '$genre_comp_per' AND Nom_Discipline = '$nom_discipline_comp_per' AND
                                            Niveau_Competition = '$niveau_comp_per' AND Date_Competition = '$date_comp_per' AND Ville_Competition = '$ville_comp_per' AND Horaire_Competition = '0000-00-00'";
                                        $resultat_cpers1=@mysqli_query($idcom,$requete_cpers1);
                                        $requete_cpers2="SELECT ID_Personnel FROM Personnel PER, Participant P WHERE PER.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_comp_per' AND Prenom_Participant ='$prenom_comp_per' AND Date_Naiss_Participant ='$date_naiss_comp_per' AND Nationalite_Participant ='$nationalite_comp_per' AND Ville_Personnel ='$ville_comp_per'AND Role_Personnel ='$role_comp_per' ";
                                        $resultat_cpers2=@mysqli_query($idcom,$requete_cpers2);
                                        if(!$resultat_cpers1 && !$resultat_cpers2){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_cpers1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_cpers2,MYSQL_NUM)){
                                                $res_1= $ligne[0];
                                            }
                                            if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                $requete_cpers3="SELECT ID_Personnel FROM participe_p WHERE ID_Personnel ='$res_2' AND ID_Competition ='$res_1' ";
                                                $resultat_cpers3=@mysqli_query($idcom,$requete_cpers3);
                                                if(!$resultat_cpers3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_cpers3,MYSQL_NUM)){
                                                        $res_5 = $ligne[0];
                                                    }
                                                    if($res_5 == "Aucune valeur"){
                                                        $erreur = 4 ;
                                                    }
                                                    else{
                                                        echo "<br><br> <label class=\"important\"> Comp&eacute;tition </label><br><br>";
                                                        echo "Niveau :  <input type=\"texte\" maxlength = \"30\" name=\"niveaucompper\" value=\"$niveau_comp_per\"/> &nbsp;";
                                                        echo "Date :  <input type=\"texte\" name=\"datecompper\" value=\"$date_comp_per\"/> &nbsp;";
                                                        echo "Horaire du d&eacute;but :  <input type=\"texte\" name=\"horairecompper\" value=\"$horaire_comp_per\"/> &nbsp;";
                                                        echo "Ville :  <input type=\"texte\" maxlength = \"30\" name=\"villecompper\" value=\"$ville_comp_per\"/> &nbsp;<br><br>";
                                                        echo "Discipline :  <input type=\"texte\" maxlength = \"30\" name=\"nomdisciplinecompper\" value=\"$nom_discipline_comp_per\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" name=\"genrecompper\" value=\"$genre_comp_per\"/> &nbsp;<br><br>";
                                                        echo "<label class=\"important\"> Personnel </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomcompper\" value=\"$nom_comp_per\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenomcompper\" value=\"$prenom_comp_per\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"datenaisscompper\" value=\"$date_naiss_comp_per\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input type=\"texte\" maxlength = \"30\" name=\"nationalitecompper\" value=\"$nationalite_comp_per\"/> &nbsp;<br><br>";
                                                        echo "Ville :  <input type=\"texte\" name=\"villecompper\"maxlength = \"30\"  value=\"$villecompper\"/> &nbsp;";
                                                        echo "R&ocirc;le :  <input type=\"texte\" maxlength = \"30\" name=\"rolecompper\" value=\"$role_comp_per\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                else if($attribut == "palma_dis"){
                                    if(!empty(trim($_POST["medaille_palma_dis"])) && !empty(trim($_POST["resultat_palma_dis"])) && !empty(trim($_POST["date_palma_dis"]))  && !empty(trim($_POST["nom_palma_dis"])) && !empty(trim($_POST["rec_palma_dis"])) && !empty(trim($_POST["categorie_palma_dis"])) && !empty(trim($_POST["genre_palma_dis"]))){
                                        $medaille_palma_dis = mysqli_real_escape_string($idcom, $_POST["medaille_palma_dis"]);
                                        $resultat_palma_dis = mysqli_real_escape_string($idcom, $_POST["resultat_palma_dis"]);
                                        $date_palma_dis = mysqli_real_escape_string($idcom, $_POST["date_palma_dis"]);
                                        $nom_palma_dis = mysqli_real_escape_string($idcom, $_POST["nom_palma_dis"]);
                                        $rec_palma_dis = mysqli_real_escape_string($idcom, $_POST["rec_palma_dis"]);
                                        $categorie_palma_dis = mysqli_real_escape_string($idcom, $_POST["categorie_palma_dis"]);
                                        $genre_palma_dis = mysqli_real_escape_string($idcom, $_POST["genre_palma_dis"]);

                                        $requete_palmd1="SELECT ID_Palmares FROM Palmares WHERE Medaille_Palmares = '$medaille_palma_dis' AND Resultat_Palmares = '$resultat_palma_dis' AND Date_Palmares = '$date_palma_dis' ";
                                        $resultat_palmd1=@mysqli_query($idcom,$requete_palmd1);
                                        $requete_palmd2="SELECT ID_Discipline FROM Discipline D, Categorie C WHERE D.ID_Categorie = C.ID_Categorie AND Nom_Discipline ='$nom_palma_dis' AND Record_Discipline ='$rec_palma_dis' AND Nom_Categorie ='$categorie_palma_dis' AND Genre_Categorie ='$genre_palma_dis' ";
                                        $resultat_palmd2=@mysqli_query($idcom,$requete_palmd2);
                                        if(!$resultat_palmd1 && !$resultat_palmd2){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_palmd1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_palmd2,MYSQL_NUM)){
                                                $res_1= $ligne[0];
                                            }
                                            if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                $requete_palmd2="SELECT ID_Discipline FROM depend_de WHERE ID_Discipline = '$res_1' AND ID_Palmares = '$res' ";
                                                $resultat_palmd2=@mysqli_query($idcom,$requete_palmd2);
                                                if(!$resultat_palmd1 && !$resultat_palmd2){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_palmd1,MYSQL_NUM)){
                                                        $res_5 = $ligne[0];
                                                    }
                                                    if($res_5 == "Aucune valeur"){
                                                        $erreur = 4 ;
                                                    }
                                                    else{
                                                        echo "<br><br> <label class=\"important\"> Palmar&egrave;s </label><br><br>";
                                                        echo "Medaille :  <input type=\"texte\" name=\"medaillepalmadis\" value=\"$medaille_palma_dis\"/> &nbsp;";
                                                        echo "R&eacute;sultat :  <input type=\"texte\"  maxlength = \"30\" name=\"resultatpalmadis\" value=\"$resultat_palma_dis\"/> &nbsp;";
                                                        echo "Date du palmar&egrave;s :  <input type=\"texte\" name=\"datepalmadis\" value=\"$date_palma_dis\"/> &nbsp;<br><br>";
                                                        echo "<label class=\"important\"> Discipline </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" name=\"nompalmadis\" maxlength = \"30\" value=\"$nom_palma_dis\"/> &nbsp;";
                                                        echo "Record :  <input type=\"texte\" name=\"recpalmadis\" maxlength = \"30\" value=\"$rec_palma_dis\"/> &nbsp;";
                                                        echo "Cat&eacute;gorie :  <input type=\"texte\" maxlength = \"30\" name=\"categoriepalmadis\" value=\"$categorie_palma_dis\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" name=\"genrepalmadis\" value=\"$genre_palma_dis\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                else if($attribut == "ch_p"){
                                    if(!empty(trim($_POST["numero_ch_p"])) && !empty(trim($_POST["batiment_ch_p"])) && !empty(trim($_POST["ville_ch_p"]))  && !empty(trim($_POST["date_deb_ch_p"]))  && !empty(trim($_POST["date_fin_ch_p"])) && !empty(trim($_POST["nombre_ch_p"])) && !empty(trim($_POST["nom_ch_p"])) && !empty(trim($_POST["prenom_ch_p"])) && !empty(trim($_POST["date_naiss_ch_p"])) && !empty(trim($_POST["nationalite_ch_p"]))){
                                        $numero_ch_p = mysqli_real_escape_string($idcom, $_POST["numero_ch_p"]);
                                        $batiment_ch_p = mysqli_real_escape_string($idcom, $_POST["batiment_ch_p"]);
                                        $ville_ch_p = mysqli_real_escape_string($idcom, $_POST["ville_ch_p"]);
                                        $date_deb_ch_p = mysqli_real_escape_string($idcom, $_POST["date_deb_ch_p"]);
                                        $date_fin_ch_p = mysqli_real_escape_string($idcom, $_POST["date_fin_ch_p"]);
                                        $nombre_ch_p = mysqli_real_escape_string($idcom, $_POST["nombre_ch_p"]);
                                        $nom_ch_p = mysqli_real_escape_string($idcom, $_POST["nom_ch_p"]);
                                        $prenom_ch_p = mysqli_real_escape_string($idcom, $_POST["prenom_ch_p"]);
                                        $date_naiss_ch_p = mysqli_real_escape_string($idcom, $_POST["date_naiss_ch_p"]);
                                        $nationalite_ch_p = mysqli_real_escape_string($idcom, $_POST["nationalite_ch_p"]);

                                        $requete_chp1="SELECT ID_Chambre FROM Chambre WHERE ID_Chambre = '$numero_ch_p' AND Batiment_Chambre = '$batiment_ch_p' AND Ville_Chambre = '$ville_ch_p' AND Nb_Lit_Chambre = '$nombre_ch_p' ";
                                        $resultat_chp1=@mysqli_query($idcom,$requete_chp1);
                                        $requete_chp2="SELECT ID_Participant FROM Participant WHERE Nom_Participant ='$nom_ch_p' AND Prenom_Participant ='$prenom_ch_p' AND Date_Naiss_Participant ='$date_naiss_ch_p' AND Nationalite_Participant ='$nationalite_ch_p' ";
                                        $resultat_chp2=@mysqli_query($idcom,$requete_chp2);
                                        if(!$resultat_chp1 && !$resultat_chp2){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_chp1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_chp2,MYSQL_NUM)){
                                                $res_1= $ligne[0];
                                            }
                                            if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                $requete_chp3="SELECT ID_Participant FROM constitue WHERE ID_Participant ='$res_1' AND ID_Chambre = '$res' AND  ='$prenom_ch_p' AND Batiment_Chambre = '$batiment_ch_p' AND Ville_Chambre = '$ville_ch_p' AND Date_Deb ='$date_deb_ch_p' AND Date_Fin ='$date_fin_ch_p' ";
                                                $resultat_chp3=@mysqli_query($idcom,$requete_chp3);
                                                if(!$resultat_chp3){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_chp3,MYSQL_NUM)){
                                                        $res_5 = $ligne[0];
                                                    }
                                                    if($res_5 == "Aucune valeur"){
                                                        $erreur = 4 ;
                                                    }
                                                    else{
                                                        echo "<br><br> <label class=\"important\"> Chambre </label><br><br>";
                                                        echo "Num&eacute;ro de chambre :  <input type=\"texte\" name=\"numerochp\" value=\"$numero_ch_p\"/> &nbsp;";
                                                        echo "B&acirc;timent :  <input type=\"texte\" maxlength = \"10\" name=\"batimentchp\" value=\"$batiment_ch_p\"/> &nbsp;";
                                                        echo "Ville :  <input type=\"texte\" maxlength = \"30\" name=\"villechp\" value=\"$ville_ch_p\"/> &nbsp;";
                                                        echo "Date de d&eacute;but du s&eacute;jour :  <input type=\"texte\" name=\"datedebchp\" value=\"$date_deb_ch_p\"/> &nbsp;<br><br>";
                                                        echo "Date de fin du s&eacute;jour :  <input type=\"texte\" name=\"datefinchp\" value=\"$date_fin_ch_p\"/> &nbsp;";
                                                        echo "Nombre de lits :  <input type=\"texte\" name=\"nombrechp\" value=\"$nombre_ch_p\"/> &nbsp;<br><br>";
                                                        echo "<label class=\"important\"> Participant </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomchp\" value=\"$nom_ch_p\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenomchp\" value=\"$prenom_ch_p\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"datenaisschp\" value=\"$date_naiss_ch_p\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input type=\"texte\" maxlength = \"30\" name=\"nationalitechp\" value=\"$nationalite_ch_p\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                else if($attribut == "comp_eq"){
                                    if(!empty(trim($_POST["niveau_comp_eq"])) && !empty(trim($_POST["date_comp_eq"])) && !empty(trim($_POST["horaire_comp_eq"]))  && !empty(trim($_POST["ville_comp_eq"]))  && !empty(trim($_POST["nom_discipline_comp_eq"])) && !empty(trim($_POST["genre_comp_eq"])) && !empty(trim($_POST["nom_comp_eq"])) && !empty(trim($_POST["nom_entraineur_comp_eq"])) && !empty(trim($_POST["prenom_entraineur_comp_eq"])) && !empty(trim($_POST["place_comp_eq"]))){
                                        $niveau_comp_eq = mysqli_real_escape_string($idcom, $_POST["niveau_comp_eq"]);
                                        $date_comp_eq = mysqli_real_escape_string($idcom, $_POST["date_comp_eq"]);
                                        $horaire_comp_eq = mysqli_real_escape_string($idcom, $_POST["horaire_comp_eq"]);
                                        $ville_comp_eq = mysqli_real_escape_string($idcom, $_POST["ville_comp_eq"]);
                                        $nom_discipline_comp_eq = mysqli_real_escape_string($idcom, $_POST["nom_discipline_comp_eq"]);
                                        $genre_comp_eq = mysqli_real_escape_string($idcom, $_POST["genre_comp_eq"]);
                                        $nom_comp_eq = mysqli_real_escape_string($idcom, $_POST["nom_comp_eq"]);
                                        $nom_entraineur_comp_eq = mysqli_real_escape_string($idcom, $_POST["nom_entraineur_comp_eq"]);
                                        $prenom_entraineur_comp_eq = mysqli_real_escape_string($idcom, $_POST["prenom_entraineur_comp_eq"]);
                                        $place_comp_eq = mysqli_real_escape_string($idcom, $_POST["place_comp_eq"]);

                                        $requete_cpe1="SELECT ID_Competition FROM Competition C, Categorie CAT, Discipline D WHERE 
                                            C.ID_Discipline = D.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie AND
                                            Genre_Categorie = '$genre_comp_eq' AND Nom_Discipline = '$nom_discipline_comp_eq' AND
                                            Niveau_Competition = '$niveau_comp_eq' AND Date_Competition = '$date_comp_eq' AND Ville_Competition = '$ville_comp_eq' AND Horaire_Competition = '0000-00-00'";
                                        $resultat_cpe1=@mysqli_query($idcom,$requete_cpe1);
                                        $requete_cpe2="SELECT ID_Equipe FROM Equipe E, Entraineur EN, Participant P WHERE EN.ID_Entraineur = E.ID_Entraineur AND P.ID_Participant = EN.ID_Participant AND Nom_Participant ='$nom_entraineur_comp_eq' AND Prenom_Participant ='$prenom_entraineur_comp_eq' AND Nom_Equipe ='$nom_comp_eq' ";
                                        $resultat_cpe2=@mysqli_query($idcom,$requete_cpe2);
                                        if(!$resultat_cpe1 && !$resultat_cpe2){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_cpe1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_cpe2,MYSQL_NUM)){
                                                $res_1= $ligne[0];
                                            }
                                            if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                $requete_cpe3="SELECT ID_Equipe FROM joue WHERE ID_Competition = '$res' AND ID_Equipe = '$res_1' AND Classement_Equipe ='$place_comp_eq'";
                                                $resultat_cpe3=@mysqli_query($idcom,$requete_cpe3);
                                                if(!$resultat_cpe3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_cpe3,MYSQL_NUM)){
                                                        $res_5 = $ligne[0];
                                                    }
                                                    if($res_5 == "Aucune valeur"){
                                                        $erreur = 4 ;
                                                    }
                                                    else{
                                                        echo "<br><br> <label class=\"important\"> Comp&eacute;tition </label><br><br>";
                                                        echo "Niveau :  <input type=\"texte\" maxlength = \"30\" name=\"niveaucompeq\" value=\"$niveau_comp_eq\"/> &nbsp;";
                                                        echo "Date :  <input type=\"texte\" name=\"datecompeq\" value=\"$date_comp_eq\"/> &nbsp;";
                                                        echo "Horaire du d&eacute;but :  <input type=\"texte\" name=\"horairecompeq\" value=\"$horaire_comp_eq\"/> &nbsp;";
                                                        echo "Ville :  <input type=\"texte\" maxlength = \"30\" name=\"villecompeq\" value=\"$ville_comp_eq\"/> &nbsp;<br><br>";
                                                        echo "Discipline :  <input type=\"texte\" maxlength = \"30\" name=\"nomdisciplinecompeq\" value=\"$nom_discipline_comp_eq\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" name=\"genrecompeq\" value=\"$genre_comp_eq\"/> &nbsp;<br><br>";
                                                        echo "<label class=\"important\"> Equipe </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomcompeq\" value=\"$nom_comp_eq\"/> &nbsp;";
                                                        echo "Nom de l'entraineur de l'&eacute;quipe :  <input type=\"texte\" maxlength = \"30\" name=\"nomentraineurcompeq\" value=\"$nom_entraineur_comp_eq\"/> &nbsp;";
                                                        echo "Pr&eacute;nom de l'entraineur de l'&eacute;quipe :  <input type=\"texte\" maxlength = \"30\" name=\"prenomentraineurcompeq\" value=\"$prenom_entraineur_comp_eq\"/> &nbsp;";
                                                        echo "Classement &eacute;quipe :  <input type=\"texte\" name=\"placecompeq\" value=\"$place_comp_eq\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                else if($attribut == "comp_ath"){
                                    if(!empty(trim($_POST["niveau_comp_ath"])) && !empty(trim($_POST["date_comp_ath"])) && !empty(trim($_POST["horaire_comp_ath"]))  && !empty(trim($_POST["ville_comp_ath"]))  && !empty(trim($_POST["nom_discipline_comp_ath"])) && !empty(trim($_POST["genre_comp_ath"])) && !empty(trim($_POST["nom_comp_ath"])) && !empty(trim($_POST["prenom_comp_ath"])) && !empty(trim($_POST["date_naiss_comp_ath"])) && !empty(trim($_POST["nationalite_comp_ath"])) && !empty(trim($_POST["taille_comp_ath"])) && !empty(trim($_POST["poids_comp_ath"])) && !empty(trim($_POST["genre_compt_ath"])) && !empty(trim($_POST["place_comp_ath"]))){
                                        $niveau_comp_ath = mysqli_real_escape_string($idcom, $_POST["niveau_comp_ath"]);
                                        $date_comp_ath = mysqli_real_escape_string($idcom, $_POST["date_comp_ath"]);
                                        $horaire_comp_ath = mysqli_real_escape_string($idcom, $_POST["horaire_comp_ath"]);
                                        $ville_comp_ath = mysqli_real_escape_string($idcom, $_POST["ville_comp_ath"]);
                                        $nom_discipline_comp_ath = mysqli_real_escape_string($idcom, $_POST["nom_discipline_comp_ath"]);
                                        $genre_comp_ath = mysqli_real_escape_string($idcom, $_POST["genre_comp_ath"]);
                                        $nom_comp_ath = mysqli_real_escape_string($idcom, $_POST["nom_comp_ath"]);
                                        $prenom_comp_ath = mysqli_real_escape_string($idcom, $_POST["prenom_comp_ath"]);
                                        $date_naiss_comp_ath = mysqli_real_escape_string($idcom, $_POST["date_naiss_comp_ath"]);
                                        $nationalite_comp_ath = mysqli_real_escape_string($idcom, $_POST["nationalite_comp_ath"]);
                                        $taille_comp_ath = mysqli_real_escape_string($idcom, $_POST["taille_comp_ath"]);
                                        $poids_comp_ath = mysqli_real_escape_string($idcom, $_POST["poids_comp_ath"]);
                                        $genre_compt_ath = mysqli_real_escape_string($idcom, $_POST["genre_compt_ath"]);
                                        $place_comp_ath = mysqli_real_escape_string($idcom, $_POST["place_comp_ath"]);

                                        $requete_cpa1="SELECT ID_Competition FROM Competition C, Categorie CAT, Discipline D WHERE 
                                            C.ID_Discipline = D.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie AND
                                            Genre_Categorie = '$genre_comp_ath' AND Nom_Discipline = '$nom_discipline_comp_ath' AND
                                            Niveau_Competition = '$niveau_comp_ath' AND Date_Competition = '$date_comp_ath' AND Ville_Competition = '$ville_comp_ath' AND Horaire_Competition = '0000-00-00'";
                                        $resultat_cpa1=@mysqli_query($idcom,$requete_cpa1);
                                        $requete_cpa2="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_comp_ath' AND Prenom_Participant ='$prenom_comp_ath' AND Date_Naiss_Participant ='$date_naiss_comp_ath' AND Nationalite_Participant ='$nationalite_comp_ath' AND Taille_Athlete ='$taille_comp_ath' AND Poids_Athlete ='$poids_comp_ath' AND Genre_Athlete ='$genre_compt_ath' ";
                                        $resultat_cpa2=@mysqli_query($idcom,$requete_cpa2);
                                        if(!$resultat_cpa1 && !$resultat_cpa2){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_cpa1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_cpa2,MYSQL_NUM)){
                                                $res_1= $ligne[0];
                                            }
                                            if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                $requete_cpa3="SELECT ID_Athlete FROM participe_a WHERE ID_Competition = '$res' AND ID_Athlete = '$res_1' AND Classement_Athlete ='$place_comp_ath' ";
                                                $resultat_cpa3=@mysqli_query($idcom,$requete_cpa3);
                                                if(!$resultat_cpa3){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_cpa3,MYSQL_NUM)){
                                                        $res_5 = $ligne[0];
                                                    }
                                                    if($res_5 == "Aucune valeur"){
                                                        $erreur = 4 ;
                                                    }
                                                    else{
                                                        echo "<br><br> <label class=\"important\"> Comp&eacute;tition </label><br><br>";
                                                        echo "Niveau :  <input type=\"texte\" maxlength = \"30\" name=\"niveaucompath\" value=\"$niveau_comp_ath\"/> &nbsp;";
                                                        echo "Date :  <input type=\"texte\" name=\"datecompath\" value=\"$date_comp_ath\"/> &nbsp;";
                                                        echo "Horaire du d&eacute;but :  <input type=\"texte\" name=\"horairecompath\" value=\"$horaire_comp_ath\"/> &nbsp;";
                                                        echo "Ville :  <input type=\"texte\" maxlength = \"30\" name=\"villecompath\" value=\"$ville_comp_ath\"/> &nbsp;<br><br>";
                                                        echo "Discipline :  <input type=\"texte\" maxlength = \"30\" name=\"nomdisciplinecompath\" value=\"$nom_discipline_comp_ath\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" name=\"genrecompath\" value=\"$genre_comp_ath\"/> &nbsp;<br><br>";
                                                        echo "<label class=\"important\"> Athl&egrave;te </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomcompath\" value=\"$nom_comp_ath\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenomcompath\" value=\"$prenom_comp_ath\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"datenaisscompath\" value=\"$date_naiss_comp_ath\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input type=\"texte\" maxlength = \"30\" name=\"nationalitecompath\" value=\"$nationalite_comp_ath\"/> &nbsp;<br><br>";
                                                        echo "Taille :  <input type=\"texte\" name=\"taillecompath\" value=\"$taille_comp_ath\"/> &nbsp;";
                                                        echo "Poids :  <input type=\"texte\" name=\"poidscompath\" value=\"$poids_comp_ath\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" name=\"genrecomptath\" value=\"$genre_compt_ath\"/> &nbsp;";
                                                        echo "Classement athl&egrave;te :  <input type=\"texte\" name=\"placecompath\" value=\"$place_comp_ath\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                else if($attribut == "palma_ath"){
                                    if(!empty(trim($_POST["medaille_palma_ath"])) && !empty(trim($_POST["resultat_palma_ath"])) && !empty(trim($_POST["date_palma_ath"])) && !empty(trim($_POST["nom_palma_ath"])) && !empty(trim($_POST["prenom_palma_ath"])) && !empty(trim($_POST["date_naiss_palma_ath"])) && !empty(trim($_POST["nationalite_palma_ath"])) && !empty(trim($_POST["taille_palma_ath"])) && !empty(trim($_POST["poids_palma_ath"])) && !empty(trim($_POST["genre_palma_ath"]))){
                                        $medaille_palma_ath = mysqli_real_escape_string($idcom, $_POST["medaille_palma_ath"]);
                                        $resultat_palma_ath = mysqli_real_escape_string($idcom, $_POST["resultat_palma_ath"]);
                                        $date_palma_ath = mysqli_real_escape_string($idcom, $_POST["date_palma_ath"]);
                                        $nom_palma_ath = mysqli_real_escape_string($idcom, $_POST["nom_palma_ath"]);
                                        $prenom_palma_ath = mysqli_real_escape_string($idcom, $_POST["prenom_palma_ath"]);
                                        $date_naiss_palma_ath = mysqli_real_escape_string($idcom, $_POST["date_naiss_palma_ath"]);
                                        $nationalite_palma_ath = mysqli_real_escape_string($idcom, $_POST["nationalite_palma_ath"]);
                                        $taille_palma_ath = mysqli_real_escape_string($idcom, $_POST["taille_palma_ath"]);
                                        $poids_palma_ath = mysqli_real_escape_string($idcom, $_POST["poids_palma_ath"]);
                                        $genre_palma_ath = mysqli_real_escape_string($idcom, $_POST["genre_palma_ath"]);

                                        $requete_palmaa1="SELECT ID_Palmares FROM Palmares WHERE Medaille_Palmares = '$medaille_palma_ath' AND Resultat_Palmares = '$resultat_palma_ath' AND Date_Palmares = '$date_palma_ath' ";
                                        $resultat_palmaa1=@mysqli_query($idcom,$requete_palmaa1);
                                        $requete_palmaa2="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_palma_ath' AND Prenom_Participant ='$prenom_palma_ath' AND Date_Naiss_Participant ='$date_naiss_palma_ath' AND Nationalite_Participant ='$nationalite_palma_ath' AND Taille_Athlete ='$taille_palma_ath' AND Poids_Athlete ='$poids_palma_ath' AND Genre_Athlete ='$genre_palma_ath' ";
                                        $resultat_palmaa2=@mysqli_query($idcom,$requete_palmaa2);
                                        if(!$resultat_palmaa1 && !$resultat_palmaa2){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_palmaa1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_palmaa2,MYSQL_NUM)){
                                                $res_1= $ligne[0];
                                            }
                                            if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                $requete_palmaa3="SELECT ID_Athlete FROM possede WHERE ID_Palmares = '$res' AND ID_Athlete ='$res_1' ";
                                                $resultat_palmaa3=@mysqli_query($idcom,$requete_palmaa3);
                                                if(!$resultat_palmaa3){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_palmaa3,MYSQL_NUM)){
                                                        $res_5 = $ligne[0];
                                                    }
                                                    if($res_5 == "Aucune valeur"){
                                                        $erreur = 4 ;
                                                    }
                                                    else{
                                                        echo "<br><br> <label class=\"important\"> Palmar&egrave;s </label><br><br>";
                                                        echo "Medaille :  <input type=\"texte\" maxlength = \"30\" name=\"medaillepalmaath\" value=\"$medaille_palma_ath\"/> &nbsp;";
                                                        echo "R&eacute;sultat :  <input type=\"texte\" maxlength = \"30\" name=\"resultatpalmaath\" value=\"$resultat_palma_ath\"/> &nbsp;";
                                                        echo "Date du palmar&egrave;s :  <input type=\"texte\" name=\"datepalmaath\" value=\"$date_palma_ath\"/> &nbsp;<br><br>";
                                                        echo "<label class=\"important\"> Athl&egrave;te </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nompalmaath\" value=\"$nom_palma_ath\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenompalmaath\" value=\"$prenom_palma_ath\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"datenaisspalmaath\" value=\"$date_naiss_palma_ath\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input type=\"texte\" maxlength = \"30\" name=\"nationalitepalmaath\" value=\"$nationalite_palma_ath\"/> &nbsp;<br><br>";
                                                        echo "Taille :  <input type=\"texte\" name=\"taillepalmaath\" value=\"$taille_palma_ath\"/> &nbsp;";
                                                        echo "Poids :  <input type=\"texte\" name=\"poidspalmaath\" value=\"$poids_palma_ath\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" name=\"genrepalmaath\" value=\"$genre_palma_ath\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                else if($attribut == "dis_ath"){
                                    if(!empty(trim($_POST["nom_discipline_ath"])) && !empty(trim($_POST["rec_dis_ath"])) && !empty(trim($_POST["categorie_dis_ath"])) && !empty(trim($_POST["genre_discipline_ath"])) && !empty(trim($_POST["nom_dis_ath"])) && !empty(trim($_POST["prenom_dis_ath"])) && !empty(trim($_POST["date_naiss_dis_ath"])) && !empty(trim($_POST["nationalite_dis_ath"])) && !empty(trim($_POST["taille_dis_ath"])) && !empty(trim($_POST["poids_dis_ath"])) && !empty(trim($_POST["genre_dis_ath"]))){
                                        $nom_discipline_ath = mysqli_real_escape_string($idcom, $_POST["nom_discipline_ath"]);
                                        $rec_dis_ath = mysqli_real_escape_string($idcom, $_POST["rec_dis_ath"]);
                                        $categorie_dis_ath = mysqli_real_escape_string($idcom, $_POST["categorie_dis_ath"]);
                                        $genre_discipline_ath = mysqli_real_escape_string($idcom, $_POST["genre_discipline_ath"]);
                                        $nom_dis_ath = mysqli_real_escape_string($idcom, $_POST["nom_dis_ath"]);
                                        $prenom_dis_ath = mysqli_real_escape_string($idcom, $_POST["prenom_dis_ath"]);
                                        $date_naiss_dis_ath = mysqli_real_escape_string($idcom, $_POST["date_naiss_dis_ath"]);
                                        $nationalite_dis_ath = mysqli_real_escape_string($idcom, $_POST["nationalite_dis_ath"]);
                                        $taille_dis_ath = mysqli_real_escape_string($idcom, $_POST["taille_dis_ath"]);
                                        $poids_dis_ath = mysqli_real_escape_string($idcom, $_POST["poids_dis_ath"]);
                                        $genre_dis_ath = mysqli_real_escape_string($idcom, $_POST["genre_dis_ath"]);

                                        $requete_disca1="SELECT ID_Discipline FROM Discipline D, Categorie CAT WHERE CAT.ID_Categorie = D.ID_Categorie AND Nom_Categorie = '$categorie_dis_ath' AND Genre_Categorie = '$genre_discipline_ath' AND Nom_Discipline = '$nom_discipline_ath' AND Record_Discipline = '$rec_dis_ath' ";
                                        $resultat_disca1=@mysqli_query($idcom,$requete_disca1);
                                        $requete_disca2="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_dis_ath' AND Prenom_Participant ='$prenom_dis_ath' AND Date_Naiss_Participant ='$date_naiss_dis_ath' AND Nationalite_Participant ='$nationalite_dis_ath' AND Taille_Athlete ='$taille_dis_ath' AND Poids_Athlete ='$poids_dis_ath' AND Genre_Athlete ='$genre_dis_ath' ";
                                        $resultat_disca2=@mysqli_query($idcom,$requete_disca2);
                                        if(!$resultat_disca1 && !$resultat_disca2){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_disca1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_disca2,MYSQL_NUM)){
                                                $res_1= $ligne[0];
                                            }
                                            if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                $requete_disca3="SELECT ID_Athlete FROM specialise_d WHERE ID_Discipline = '$res' AND ID_Athlete ='$res_1' ";
                                                $resultat_disca3=@mysqli_query($idcom,$requete_disca3);
                                                if(!$resultat_disca3){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_disca3,MYSQL_NUM)){
                                                        $res_5 = $ligne[0];
                                                    }
                                                    if($res_5 == "Aucune valeur"){
                                                        $erreur = 4 ;
                                                    }
                                                    else{
                                                        echo "<br><br> <label class=\"important\"> Discipline </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomdisciplineath\" value=\"$nom_discipline_ath\"/> &nbsp;";
                                                        echo "Record :  <input type=\"texte\" maxlength = \"30\" name=\"recdisath\" value=\"$rec_dis_ath\"/> &nbsp;";
                                                        echo "Cat&eacute;gorie :  <input type=\"texte\" maxlength = \"30\" name=\"categoriedisath\" value=\"$categorie_dis_ath\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" name=\"genredisciplineath\" value=\"$genre_discipline_ath\"/> &nbsp;<br><br>";
                                                        echo "<label class=\"important\"> Athl&egrave;te </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomdisath\" value=\"$nom_dis_ath\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenomdisath\" value=\"$prenom_dis_ath\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"datenaissdisath\" value=\"$date_naiss_dis_ath\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input type=\"texte\" maxlength = \"30\" name=\"nationalitedisath\" value=\"$nationalite_dis_ath\"/> &nbsp;<br><br>";
                                                        echo "Taille :  <input type=\"texte\" name=\"tailledisath\" value=\"$taille_dis_ath\"/> &nbsp;";
                                                        echo "Poids :  <input type=\"texte\" name=\"poidsdisath\" value=\"$poids_dis_ath\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" name=\"genredisath\" value=\"$genre_dis_ath\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                else if($attribut == "eq_ath"){
                                    if(!empty(trim($_POST["nom_equipe_ath"])) && !empty(trim($_POST["nom_entraineur_eq_ath"])) && !empty(trim($_POST["prenom_entraineur_eq_ath"])) && !empty(trim($_POST["nom_eq_ath"])) && !empty(trim($_POST["prenom_eq_ath"])) && !empty(trim($_POST["date_naiss_eq_ath"])) && !empty(trim($_POST["nationalite_eq_ath"])) && !empty(trim($_POST["taille_eq_ath"])) && !empty(trim($_POST["poids_eq_ath"])) && !empty(trim($_POST["genre_eq_ath"])) && !empty(trim($_POST["place_eq_ath"]))){
                                        $nom_equipe_ath = mysqli_real_escape_string($idcom, $_POST["nom_equipe_ath"]);
                                        $nom_entraineur_eq_ath = mysqli_real_escape_string($idcom, $_POST["nom_entraineur_eq_ath"]);
                                        $prenom_entraineur_eq_ath = mysqli_real_escape_string($idcom, $_POST["prenom_entraineur_eq_ath"]);
                                        $nom_eq_ath = mysqli_real_escape_string($idcom, $_POST["nom_eq_ath"]);
                                        $prenom_eq_ath = mysqli_real_escape_string($idcom, $_POST["prenom_eq_ath"]);
                                        $date_naiss_eq_ath = mysqli_real_escape_string($idcom, $_POST["date_naiss_eq_ath"]);
                                        $nationalite_eq_ath = mysqli_real_escape_string($idcom, $_POST["nationalite_eq_ath"]);
                                        $taille_eq_ath = mysqli_real_escape_string($idcom, $_POST["taille_eq_ath"]);
                                        $poids_eq_ath = mysqli_real_escape_string($idcom, $_POST["poids_eq_ath"]);
                                        $genre_eq_ath = mysqli_real_escape_string($idcom, $_POST["genre_eq_ath"]);
                                        $place_eq_ath = mysqli_real_escape_string($idcom, $_POST["place_eq_ath"]);

                                        $requete_eqa1="SELECT ID_Equipe FROM Equipe E, Participant P, Entraineur EN WHERE EN.ID_Entraineur = E.ID_Entraineur AND EN.ID_Participant = P.ID_Participant AND Nom_Equipe = '$nom_equipe_ath' AND Nom_Participant = '$nom_entraineur_eq_ath' AND Prenom_Participant = '$prenom_entraineur_eq_ath' ";
                                        $resultat_eqa1=@mysqli_query($idcom,$requete_eqa1);
                                        $requete_eqa2="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_eq_ath' AND Prenom_Participant ='$prenom_eq_ath' AND Date_Naiss_Participant ='$date_naiss_eq_ath' AND Nationalite_Participant ='$nationalite_eq_ath' AND Taille_Athlete ='$taille_eq_ath' AND Poids_Athlete ='$poids_eq_ath' AND Genre_Athlete ='$genre_eq_ath' ";
                                        $resultat_eqa2=@mysqli_query($idcom,$requete_eqa2);
                                        if(!$resultat_eqa1 && !$resultat_eqa2){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_eqa1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_eqa2,MYSQL_NUM)){
                                                $res_1= $ligne[0];
                                            }
                                            if($res == "Aucune valeur" || $res_1 == "Aucune valeur"){
                                                $erreur = 4;
                                            }
                                            else {
                                                $requete_eqa3="SELECT ID_Athlete FROM compose_e WHERE ID_Equipe = '$res' AND ID_Athlete ='$res_1' AND Position_Equipe ='$place_eq_ath' ";
                                                $resultat_eqa3=@mysqli_query($idcom,$requete_eqa3);
                                                if(!$resultat_eqa3){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_eqa3,MYSQL_NUM)){
                                                        $res_5 = $ligne[0];
                                                    }
                                                    if($res_5 == "Aucune valeur"){
                                                        $erreur = 4 ;
                                                    }
                                                    else{
                                                        echo "<br><br> <label class=\"important\"> Equipe </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomequipeath\" value=\"$nom_equipe_ath\"/> &nbsp;";
                                                        echo "Nom de l'entraineur de l'&eacute;quipe :  <input type=\"texte\" maxlength = \"30\" name=\"nomentraineureqath\" value=\"$nom_entraineur_eq_ath\"/> &nbsp;";
                                                        echo "Pr&eacute;nom de l'entraineur de l'&eacute;quipe :  <input type=\"texte\" maxlength = \"30\" name=\"prenomentraineureqath\" value=\"$prenom_entraineur_eq_ath\"/> &nbsp;<br><br>";
                                                        echo "<label class=\"important\"> Athl&egrave;te </label><br><br>";
                                                        echo "Nom :  <input type=\"texte\" maxlength = \"30\" name=\"nomeqath\" value=\"$nom_eq_ath\"/> &nbsp;";
                                                        echo "Prenom :  <input type=\"texte\" maxlength = \"30\" name=\"prenomeqath\" value=\"$prenom_eq_ath\"/> &nbsp;";
                                                        echo "Date de naissance :  <input type=\"texte\" name=\"datenaisseqath\" value=\"$date_naiss_eq_ath\"/> &nbsp;";
                                                        echo "Nationalit&eacute; :  <input type=\"texte\" maxlength = \"30\" name=\"nationaliteeqath\" value=\"$nationalite_eq_ath\"/> &nbsp;<br><br>";
                                                        echo "Taille :  <input type=\"texte\" name=\"tailleeqath\" value=\"$taille_eq_ath\"/> &nbsp;";
                                                        echo "Poids :  <input type=\"texte\" name=\"poidseqath\" value=\"$poids_eq_ath\"/> &nbsp;";
                                                        echo "Genre :  <input type=\"texte\" name=\"genreeqath\" value=\"$genre_eq_ath\"/> &nbsp;";
                                                        echo "Place dans l'&eacute;quipe :  <input type=\"texte\" name=\"placeeqath\" value=\"$place_eq_ath\"/> &nbsp;<br><br>";
                                                        $option = 1;
                                                        $_SESSION['res'] = $res;
                                                        $_SESSION['res_1'] = $res_1;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            else{
                                $erreur=1;
                            }
                        }    
                        if($erreur == 1){
                            echo "<br><br><label class=\"erreur\"> Vous n'avez pas s&eacute;l&eacute;ctionn&eacute; d'&eacute;l&eacute;ment. </label> <br><br>";
                        }  
                        if($erreur == 2){
                            echo "<br><br><label class=\"erreur\"> Vous n'avez pas renseign&eacute; tous les champs. </label><br><br>";
                        } 
                        if($erreur == 3){
                            echo "<br><br><label class=\"erreur\"> Erreur de connexion &agrave; la base de donn&eacute;e. </label><br><br>";
                        } 
                        if($erreur == 4){
                            echo "<br><br><label class=\"erreur\"> Les &eacute;l&eacute;ments que vous essayez de modifier n'existent pas.</label><br><br>";
                        } 
                        if($reussite != 0){
                            echo "<br><br><label> La modification s'est bien pass&eacute;e. </label><br><br>";
                        } 
                        if(isset ($_POST["retour"])){
                            header("Location: modifier.php");
                        }
                    ?>
                    <div>
                        Actions possibles : 
                        <?php
                            if($option == 1){
                                echo "<input class=\"button_m\" type=\"submit\" name=\"modification\" value=\"Modification\" />";
                            }
                        ?> 
                        <input class="button_m" type="submit" name="retour" value="Retour" /> 
                    </div>
                    <?php
                        if(isset ($_POST["modification"])){
                            if (isset($_SESSION['attribut'])){
                                $attribut = $_SESSION['attribut'];
                            }
                            if (isset($_SESSION['participant'])){
                                $participant = $_SESSION['participant'];
                            }
                            if (isset($_SESSION['res'])){
                                $res = $_SESSION['res'];
                            }
                            if (isset($_SESSION['res_1'])){
                                $res_1 = $_SESSION['res_1'];
                            }
                            if($attribut == "participant"){ 
                                if($participant == "membre"){
                                    if(!empty(trim($_POST["nom1"])) && !empty(trim($_POST["prenom1"])) && !empty(trim($_POST["date1"])) && !empty(trim($_POST["nationalite1"]))){
                                        $nom1=mysqli_real_escape_string($idcom, $_POST["nom1"]);
                                        $prenom1=mysqli_real_escape_string($idcom, $_POST["prenom1"]);
                                        $date1=mysqli_real_escape_string($idcom, $_POST["date1"]);
                                        $nationalite1=mysqli_real_escape_string($idcom, $_POST["nationalite1"]);

                                        $requete_m2="UPDATE Participant SET Nom_Participant='$nom1', Prenom_Participant = '$prenom1', Date_Naiss_Participant ='$date1', Nationalite_Participant = '$nationalite1' WHERE ID_Participant = '$res'";
                                        $resultat_m2=@mysqli_query($idcom,$requete_m2);
                                        if(!$resultat_m2){
                                            $erreur=3;
                                        }
                                        else{
                                            $reussite = 1;    
                                        }
                                    }
                                    else{
                                        $erreur=2;
                                    }
                                }
                                else if($participant == "athlete"){
                                    if(!empty(trim($_POST["nom2"])) && !empty(trim($_POST["prenom2"])) && !empty(trim($_POST["date2"])) && !empty(trim($_POST["nationalite2"])) && !empty(trim($_POST["taille2"])) && !empty(trim($_POST["poids2"])) && !empty(trim($_POST["genre2"])) && !empty(trim($_POST["nomentraineurathlete"])) && !empty(trim($_POST["prenomentraineurathlete"]))){
                                        $nom2=mysqli_real_escape_string($idcom, $_POST["nom2"]);
                                        $prenom2=mysqli_real_escape_string($idcom, $_POST["prenom2"]);
                                        $date2=mysqli_real_escape_string($idcom, $_POST["date2"]);
                                        $nationalite2=mysqli_real_escape_string($idcom, $_POST["nationalite2"]);
                                        $taille2=mysqli_real_escape_string($idcom, $_POST["taille2"]);
                                        $poids2=mysqli_real_escape_string($idcom, $_POST["poids2"]);
                                        $genre2=mysqli_real_escape_string($idcom, $_POST["genre2"]);
                                        $nomentraineurathlete=mysqli_real_escape_string($idcom, $_POST["nomentraineurathlete"]);
                                        $prenomentraineurathlete=mysqli_real_escape_string($idcom, $_POST["prenomentraineurathlete"]);
                                        $requete_a3="UPDATE Athlete SET Taille_Athlete = '$taille2' AND Poids_Athlete = '$poids2' AND Genre_Athlete = '$genre2' WHERE ID_Athlete = '$res'";
                                        $resultat_a3=@mysqli_query($idcom,$requete_a1);
                                        $requete_a4="UPDATE Participant SET Nom_Participant ='$nom2' AND Prenom_Participant = '$prenom2' AND Date_Naiss_Participant ='$date2' AND Nationalite_Participant = '$nationalite2' WHERE ID_Participant = '$res_1'";
                                        $resultat_a4=@mysqli_query($idcom,$requete_a4);
                                        if(!$resultat_a3 && !$resultat_a4){
                                            $erreur=3;
                                        }
                                        else{
                                            $reussite = 1;
                                        }
                                    }
                                    else{
                                        $erreur=2;
                                    }                                            
                                }
                                
                                else if($participant == "personnel"){
                                    if(!empty(trim($_POST["nom3"])) && !empty(trim($_POST["prenom3"])) && !empty(trim($_POST["date3"])) && !empty(trim($_POST["nationalite3"])) && !empty(trim($_POST["ville3"])) && !empty(trim($_POST["role3"])) ){
                                        $nom3=mysqli_real_escape_string($idcom, $_POST["nom3"]);
                                        $prenom3=mysqli_real_escape_string($idcom, $_POST["prenom3"]);
                                        $date3=mysqli_real_escape_string($idcom, $_POST["date3"]);
                                        $nationalite3=mysqli_real_escape_string($idcom, $_POST["nationalite3"]);
                                        $ville3=mysqli_real_escape_string($idcom, $_POST["ville3"]);
                                        $role3=mysqli_real_escape_string($idcom, $_POST["role3"]);
                                        $requete_pers3="UPDATE Personnel SET Ville_Personnel = '$ville3' AND Role_Personnel = '$role3' WHERE ID_Personnel = '$res'";
                                        $resultat_pers3=@mysqli_query($idcom,$requete_pers3);
                                        $requete_pers4="UPDATE ID_Participant SET Nom_Participant ='$nom3' Prenom_Participant = '$prenom3' AND Date_Naiss_Participant ='$date3' AND Nationalite_Participant = '$nationalite3' WHERE ID_Participant = '$res_1'";
                                        $resultat_pers4=@mysqli_query($idcom,$requete_pers4);
                                        if(!$resultat_pers3 && !$resultat_pers4){
                                            $erreur=3;
                                        }
                                        else{
                                            $reussite = 1;
                                        }
                                    }
                                    else{
                                        $erreur=2;
                                    }
                                }
                                else if($participant == "entraineur"){
                                    if(!empty(trim($_POST["nom4"])) && !empty(trim($_POST["prenom4"])) && !empty(trim($_POST["date4"])) && !empty(trim($_POST["nationalite4"])) && !empty(trim($_POST["diplome4"]))){
                                        $nom4=mysqli_real_escape_string($idcom, $_POST["nom4"]);
                                        $prenom4=mysqli_real_escape_string($idcom, $_POST["prenom4"]);
                                        $date4=mysqli_real_escape_string($idcom, $_POST["date4"]);
                                        $nationalite4=mysqli_real_escape_string($idcom, $_POST["nationalite4"]);
                                        $diplome4=mysqli_real_escape_string($idcom, $_POST["diplome4"]);
                                        
                                        $requete_entr3="UPDATE Entraineur SET Diplome_Entraineur = '$diplome4' WHERE ID_Entraineur = '$res'";
                                        $resultat_entr3=@mysqli_query($idcom,$requete_entr3);
                                        $requete_entr4="UPDATE Participant SET Nom_Participant ='$nom4' AND Prenom_Participant = '$prenom4' AND Date_Naiss_Participant ='$date4' AND Nationalite_Participant = '$nationalite4' WHERE ID_Participant = '$res_1'";
                                        $resultat_entr4=@mysqli_query($idcom,$requete_entr4);
                                        if(!$resultat_entr3 && !$resultat_entr4){
                                            $erreur=3;
                                        }
                                        else{
                                            $reussite = 1;
                                        }
                                    }
                                    else{
                                        $erreur=2;
                                    }
                                }
                            }
                            //equipe
                            else if($attribut == "equipe"){
                                if(!empty(trim($_POST["nome"])) && !empty(trim($_POST["nomentraineure"])) && !empty(trim($_POST["prenomentraineure"]))){
                                    $nome = mysqli_real_escape_string($idcom, $_POST["nome"]);
                                    $nomentraineure = mysqli_real_escape_string($idcom, $_POST["nomentraineure"]);
                                    $prenomentraineure = mysqli_real_escape_string($idcom, $_POST["prenomentraineure"]);
                                    
                                    $requete_e2="SELECT ID_Entraineur FROM Entraineur E, Participant P WHERE P.ID_Participant = E.ID_Participant AND Nom_Participant = '$nomentraineure' AND Prenom_Participant = '$prenomentraineure'";
                                    $resultat_e2=@mysqli_query($idcom,$requete_e2);
                                    if(!$resultat_e2){
                                        $erreur=3;
                                    }
                                    else {
                                        while($ligne=mysqli_fetch_array($resultat_e2,MYSQL_NUM)){
                                            $res_1 = $ligne[0];
                                        }
                                        if($res_1 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else {
                                            $requete_e3="UPDATE Equipe SET Nom_Equipe = '$nome', ID_Entraineur = '$res_1' WHERE ID_Equipe = '$res'";
                                            $resultat_e3=@mysqli_query($idcom,$requete_e3);
                                            if(!$resultat_e3){
                                                $erreur = 3;
                                            }
                                            else {
                                                $reussite = 1;
                                            }
                                        }
                                    }
                                }
                                else {
                                    $erreur=2;
                                }
                            }
                            else if($attribut == "chambre"){
                                if(!empty(trim($_POST["nblitchambre"]))){
                                    $nblitchambre = mysqli_real_escape_string($idcom, $_POST["nblitchambre"]);

                                    $requete_ch2="UPDATE Chambre SET Nb_Lit_Chambre ='$nblitchambre' WHERE ID_Chambre = '$res' AND Batiment_Chambre = '$bat_chambre' AND Ville_Chambre = '$ville_chambre'";
                                    $resultat_ch2=@mysqli_query($idcom,$requete_ch2);
                                    if(!$resultat_ch2){
                                        $erreur=3;
                                    }
                                    else{
                                        $reussite = 1;
                                    }
                                }
                                else {
                                    $erreur=2;
                                }
                            }
                            else if($attribut == "categorie"){
                                if(!empty(trim($_POST["nomcat"])) && !empty(trim($_POST["genrecat"]))){
                                    $nomcat = mysqli_real_escape_string($idcom, $_POST["nomcat"]);
                                    $genrecat = mysqli_real_escape_string($idcom, $_POST["genrecat"]);
                                    $requete_cat2="UPDATE Categorie SET Nom_Categorie = '$nomcat' AND Genre_Categorie ='$genrecat' WHERE ID_Categorie = '$res'";
                                    $resultat_cat2=@mysqli_query($idcom,$requete_cat2);
                                    if(!$resultat_cat2){
                                        $erreur=3;
                                    }
                                    else{
                                        $reussite = 1;
                                    }
                                }
                                else {
                                    $erreur=2;
                                }
                            }
                            else if($attribut == "discipline"){
                                if(!empty(trim($_POST["nomd"])) && !empty(trim($_POST["recd"])) && !empty(trim($_POST["nomcatd"])) && !empty(trim($_POST["genred"]))){
                                    $nomd = mysqli_real_escape_string($idcom, $_POST["nomd"]);
                                    $recd = mysqli_real_escape_string($idcom, $_POST["recd"]);
                                    $nomcatd = mysqli_real_escape_string($idcom, $_POST["nomcatd"]);
                                    $genred = mysqli_real_escape_string($idcom, $_POST["genred"]);

                                    $requete_d2="SELECT ID_Categorie FROM Categorie C WHERE Nom_Categorie = '$nomcatd' AND Genre_Categorie ='$genred' ";
                                    $resultat_d2=@mysqli_query($idcom,$requete_d2);
                                    if(!$resultat_d2){
                                        $erreur=3;
                                    }
                                    else{
                                        while($ligne=mysqli_fetch_array($resultat_d2,MYSQL_NUM)){
                                            $res_1 = $ligne[0];
                                        }
                                        if($res_1 == "Aucune valeur"){
                                            $erreur=4;
                                        }
                                        else{
                                            $requete_d3="UPDATE Discipline SET Nom_Discipline ='$nomd' AND Record_Prec_Discipline ='$recd' AND ID_Categorie = '$res_1' WHERE ID_Discipline = '$res' ";
                                            $resultat_d3=@mysqli_query($idcom,$requete_d3);
                                            if(!$resultat_d3){
                                                $erreur=3;
                                            }
                                            else {
                                                $reussite = 1;
                                            }
                                        }
                                    }
                                }
                                else {
                                    $erreur=2;
                                }
                            }
                            else if($attribut == "competition"){
                                if(!empty(trim($_POST["niveauc"])) && !empty(trim($_POST["datec"])) && !empty(trim($_POST["horairec"])) && !empty(trim($_POST["villec"])) && !empty(trim($_POST["disciplinec"])) && !empty(trim($_POST["genrec"]))){
                                    $niveauc = mysqli_real_escape_string($idcom, $_POST["niveauc"]);
                                    $datec = mysqli_real_escape_string($idcom, $_POST["datec"]);
                                    $horairec = mysqli_real_escape_string($idcom, $_POST["horairec"]);
                                    $villec = mysqli_real_escape_string($idcom, $_POST["villec"]);
                                    $disciplinec = mysqli_real_escape_string($idcom, $_POST["disciplinec"]);
                                    $genrec = mysqli_real_escape_string($idcom, $_POST["genrec"]);

                                    $requete_compet2="SELECT ID_Discipline FROM Discipline D, Categorie CAT WHERE D.ID_Categorie = CAT.ID_Categorie AND Nom_Discipline = '$disciplinec' AND Genre_Categorie ='$genrec'";
                                    $resultat_compet2=@mysqli_query($idcom,$requete_compet2);
                                    if(!$resultat_compet2){
                                        $erreur=3;
                                    }
                                    else{
                                        while($ligne=mysqli_fetch_array($resultat_compet2,MYSQL_NUM)){
                                            $res_1 = $ligne[0];
                                        }
                                        if($res_1 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else{
                                            $requete_compet3="UPDATE Competition SET Niveau_Competition ='$niveauc' AND Date_Competition ='$datec' AND Horaire_Competition ='$horairec' AND Ville_Competition ='$villec', ID_Discipline = '$res_1' WHERE ID_Competition = '$res'";
                                            $resultat_compet3=@mysqli_query($idcom,$requete_compet3);
                                            if(!$resultat_compet3){
                                                $erreur=3;
                                            }
                                            else {
                                                $reussite=1;
                                            }
                                        }
                                    }
                                }
                                else {
                                    $erreur=2;
                                }
                            }
                            else if($attribut == "palmares"){
                                if(!empty(trim($_POST["medaillepalma"])) && !empty(trim($_POST["resultatpalma"])) && !empty(trim($_POST["datepalma"]))){
                                    $medaillepalma = mysqli_real_escape_string($idcom, $_POST["medaillepalma"]);
                                    $resultatpalma = mysqli_real_escape_string($idcom, $_POST["resultatpalma"]);
                                    $datepalma = mysqli_real_escape_string($idcom, $_POST["datepalma"]);

                                    $requete_palma2="UPDATE Palmares SET Medaille_Palmares ='$medaillepalma' AND Resultat_Palmares ='$resultatpalma' AND Date_Palmares ='$datepalma' WHERE ID_Palmares = '$res'";
                                    $resultat_palma2=@mysqli_query($idcom,$requete_palma2);
                                    if(!$resultat_palma2){
                                        $erreur=3;
                                    }
                                    else{
                                        $reussite = 1;
                                    }
                                }
                                else {
                                    $erreur=2;
                                }
                            }
                            else if($attribut == "cat_per"){
                                if(!empty(trim($_POST["nomcatper"])) && !empty(trim($_POST["genrecatper"])) && !empty(trim($_POST["nomcatpers"])) && !empty(trim($_POST["prenomcatper"])) && !empty(trim($_POST["datenaisscatper"])) && !empty(trim($_POST["nationalitecatper"])) && !empty(trim($_POST["villecatper"])) && !empty(trim($_POST["rolecatper"]))){
                                    $nomcatper = mysqli_real_escape_string($idcom, $_POST["nomcatper"]);
                                    $genrecatper = mysqli_real_escape_string($idcom, $_POST["genrecatper"]);
                                    $nomcatpers = mysqli_real_escape_string($idcom, $_POST["nomcatpers"]);
                                    $prenomcatper = mysqli_real_escape_string($idcom, $_POST["prenomcatper"]);
                                    $datenaisscatper = mysqli_real_escape_string($idcom, $_POST["datenaisscatper"]);
                                    $nationalitecatper = mysqli_real_escape_string($idcom, $_POST["nationalitecatper"]);
                                    $villecatper = mysqli_real_escape_string($idcom, $_POST["villecatper"]);
                                    $rolecatper = mysqli_real_escape_string($idcom, $_POST["rolecatper"]);

                                    $requete_cp4="SELECT ID_Categorie FROM Categorie WHERE Nom_Categorie ='$nomcatper' AND Genre_Categorie ='$genrecatper' ";
                                    $resultat_cp4=@mysqli_query($idcom,$requete_cp4);
                                    $requete_cp5="SELECT ID_Personnel FROM Personnel PER, Participant P WHERE PER.ID_Participant = P.ID_Participant AND Nom_Participant ='$nomcatpers' AND Prenom_Participant ='$prenomcatper' AND Date_Naiss_Participant ='$datenaisscatper' AND Nationalite_Participant ='$nationalitecatper' AND Ville_Personnel ='$villecatper'AND Role_Personnel ='$rolecatper' ";
                                    $resultat_cp5=@mysqli_query($idcom,$requete_cp5);
                                    if(!$resultat_cp4 && !$resultat_cp5){
                                        $erreur=3;
                                    }
                                    else {
                                        while($ligne=mysqli_fetch_array($resultat_cp4,MYSQL_NUM)){
                                            $res_2= $ligne[0];
                                        }
                                        while($ligne=mysqli_fetch_array($resultat_cp5,MYSQL_NUM)){
                                            $res_3= $ligne[0]; 
                                        }
                                        if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else {
                                            $requete_cp6="UPDATE specialise_c SET ID_Personnel = '$res_3' AND ID_Categorie = '$res_2' WHERE ID_Personnel = '$res_1' AND ID_Categorie = '$res' ";
                                            $resultat_cp6=@mysqli_query($idcom,$requete_cp6);
                                            if(!$resultat_cp6){
                                                $erreur=3;
                                            }
                                            else{
                                                $reussite=1;
                                            }
                                        }
                                    }
                                }
                            }
                            else if($attribut == "comp_per"){
                                if(!empty(trim($_POST["niveaucompper"])) && !empty(trim($_POST["datecompper"])) && !empty(trim($_POST["horairecompper"])) && !empty(trim($_POST["villecompper"])) && !empty(trim($_POST["nomdisciplinecompper"])) && !empty(trim($_POST["genrecompper"])) && !empty(trim($_POST["nomcompper"])) && !empty(trim($_POST["prenomcompper"])) && !empty(trim($_POST["datenaisscompper"])) && !empty(trim($_POST["nationalitecompper"])) && !empty(trim($_POST["villecompper"])) && !empty(trim($_POST["rolecompper"]))){
                                    $niveaucompper = mysqli_real_escape_string($idcom, $_POST["niveaucompper"]);
                                    $datecompper = mysqli_real_escape_string($idcom, $_POST["datecompper"]);
                                    $horairecompper = mysqli_real_escape_string($idcom, $_POST["horairecompper"]);
                                    $villecompper = mysqli_real_escape_string($idcom, $_POST["villecompper"]);
                                    $nomdisciplinecompper = mysqli_real_escape_string($idcom, $_POST["nomdisciplinecompper"]);
                                    $genrecompper = mysqli_real_escape_string($idcom, $_POST["genrecompper"]);
                                    $nomcompper = mysqli_real_escape_string($idcom, $_POST["nomcompper"]);
                                    $prenomcompper = mysqli_real_escape_string($idcom, $_POST["prenomcompper"]);
                                    $datenaisscompper = mysqli_real_escape_string($idcom, $_POST["datenaisscompper"]);
                                    $nationalitecompper = mysqli_real_escape_string($idcom, $_POST["nationalitecompper"]);
                                    $villecompper = mysqli_real_escape_string($idcom, $_POST["villecompper"]);
                                    $rolecompper = mysqli_real_escape_string($idcom, $_POST["rolecompper"]);

                                    $requete_cpers4="SELECT ID_Competition FROM Competition C, Categorie CAT, Discipline D WHERE 
                                        C.ID_Discipline = D.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie AND
                                        Genre_Categorie = '$genrecompper' AND Nom_Discipline = '$nomdisciplinecompper' AND
                                        Niveau_Competition = '$niveaucompper' AND Date_Competition = '$datecompper' AND Ville_Competition = '$villecompper' AND Horaire_Competition = '0000-00-00'";
                                    $resultat_cpers4=@mysqli_query($idcom,$requete_cpers4);
                                    $requete_cpers5="SELECT ID_Personnel FROM Personnel PER, Participant P WHERE PER.ID_Participant = P.ID_Participant AND Nom_Participant ='$nomcompper' AND Prenom_Participant ='$prenomcompper' AND Date_Naiss_Participant ='$datenaisscompper' AND Nationalite_Participant ='$nationalitecompper' AND Ville_Personnel ='$villecompper'AND Role_Personnel ='$rolecompper' ";
                                    $resultat_cpers5=@mysqli_query($idcom,$requete_cpers5);
                                    if(!$resultat_cpers4 && !$resultat_cpers5){
                                        $erreur=3;
                                    }
                                    else {
                                        while($ligne=mysqli_fetch_array($resultat_cpers4,MYSQL_NUM)){
                                            $res_2= $ligne[0];
                                        }
                                        while($ligne=mysqli_fetch_array($resultat_cpers5,MYSQL_NUM)){
                                            $res_3= $ligne[0];
                                        }
                                        if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else {
                                            $requete_cpers6="UPDATE participe_p SET ID_Personnel ='$res_3' AND ID_Competition ='$res_2' WHERE ID_Personnel ='$res_1' AND ID_Competition ='$res' ";
                                            $resultat_cpers6=@mysqli_query($idcom,$requete_cpers6);
                                            if(!$resultat_cpers6){
                                                $erreur=3;
                                            }
                                            else {
                                                $reussite=1;
                                            }
                                        }
                                    }
                                }
                            }
                            else if($attribut == "palma_dis"){
                                if(!empty(trim($_POST["medaillepalmadis"])) && !empty(trim($_POST["resultatpalmadis"])) && !empty(trim($_POST["datepalmadis"]))  && !empty(trim($_POST["nompalmadis"])) && !empty(trim($_POST["recpalmadis"])) && !empty(trim($_POST["categoriepalmadis"])) && !empty(trim($_POST["genrepalmadis"]))){
                                    $medaillepalmadis = mysqli_real_escape_string($idcom, $_POST["medaillepalmadis"]);
                                    $resultatpalmadis = mysqli_real_escape_string($idcom, $_POST["resultatpalmadis"]);
                                    $datepalmadis = mysqli_real_escape_string($idcom, $_POST["datepalmadis"]);
                                    $nompalmadis = mysqli_real_escape_string($idcom, $_POST["nompalmadis"]);
                                    $recpalmadis = mysqli_real_escape_string($idcom, $_POST["recpalmadis"]);
                                    $categoriepalmadis = mysqli_real_escape_string($idcom, $_POST["categoriepalmadis"]);
                                    $genrepalmadis = mysqli_real_escape_string($idcom, $_POST["genrepalmadis"]);

                                    $requete_palmd4="SELECT ID_Palmares FROM Palmares WHERE Medaille_Palmares = '$medaillepalmadis' AND Resultat_Palmares = '$resultatpalmadis' AND Date_Palmares = '$datepalmadis' ";
                                    $resultat_palmd4=@mysqli_query($idcom,$requete_palmd4);
                                    $requete_palmd5="SELECT ID_Discipline FROM Discipline D, Categorie C WHERE D.ID_Categorie = C.ID_Categorie AND Nom_Discipline ='$nompalmadis' AND Record_Discipline ='$recpalmadis' AND Nom_Categorie ='$categoriepalmadis' AND Genre_Categorie ='$genrepalmadis' ";
                                    $resultat_palmd5=@mysqli_query($idcom,$requete_palmd5);
                                    if(!$resultat_palmd4 && !$resultat_palmd5){
                                        $erreur=3;
                                    }
                                    else {
                                        while($ligne=mysqli_fetch_array($resultat_palmd4,MYSQL_NUM)){
                                            $res_2= $ligne[0];
                                        }
                                        while($ligne=mysqli_fetch_array($resultat_palmd5,MYSQL_NUM)){
                                            $res_3= $ligne[0];
                                        }
                                        if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else {
                                            $requete_palmd6="UPDATE depend_de SET ID_Palmares = '$res_2', ID_Discipline = '$res_3' WHERE ID_Palmares = '$res', ID_Discipline = '$res_1' ";
                                            $resultat_palmd6=@mysqli_query($idcom,$requete_palmd6);
                                            if(!$resultat_palmd6){
                                                $erreur=3;
                                            }
                                            else{
                                                $reussite = 1;
                                            }
                                        }
                                    }
                                }
                            }
                            else if($attribut == "ch_p"){
                                if(!empty(trim($_POST["numerochp"])) && !empty(trim($_POST["batimentchp"])) && !empty(trim($_POST["villechp"]))  && !empty(trim($_POST["datedebchp"]))  && !empty(trim($_POST["datefinchp"])) && !empty(trim($_POST["nombrechp"])) && !empty(trim($_POST["nomchp"])) && !empty(trim($_POST["prenomchp"])) && !empty(trim($_POST["datenaisschp"])) && !empty(trim($_POST["nationalitechp"]))){
                                    $numerochp = mysqli_real_escape_string($idcom, $_POST["numerochp"]);
                                    $batimentchp = mysqli_real_escape_string($idcom, $_POST["batimentchp"]);
                                    $villechp = mysqli_real_escape_string($idcom, $_POST["villechp"]);
                                    $datedebchp = mysqli_real_escape_string($idcom, $_POST["datedebchp"]);
                                    $datefinchp = mysqli_real_escape_string($idcom, $_POST["datefinchp"]);
                                    $nombrechp = mysqli_real_escape_string($idcom, $_POST["nombrechp"]);
                                    $nomchp = mysqli_real_escape_string($idcom, $_POST["nomchp"]);
                                    $prenomchp = mysqli_real_escape_string($idcom, $_POST["prenomchp"]);
                                    $datenaisschp = mysqli_real_escape_string($idcom, $_POST["datenaisschp"]);
                                    $nationalitechp = mysqli_real_escape_string($idcom, $_POST["nationalitechp"]);
                                    $requete_chp4="SELECT ID_Chambre FROM Chambre WHERE ID_Chambre = '$numerochp' AND Batiment_Chambre = '$batimentchp' AND Ville_Chambre = '$villechp' AND Nb_Lit_Chambre = '$nombrechp' ";
                                    $resultat_chp4=@mysqli_query($idcom,$requete_chp4);
                                    $requete_chp5="SELECT ID_Participant FROM Participant WHERE Nom_Participant ='$nomchp' AND Prenom_Participant ='$prenomchp' AND Date_Naiss_Participant ='$datenaisschp' AND Nationalite_Participant ='$nationalitechp' ";
                                    $resultat_chp5=@mysqli_query($idcom,$requete_chp5);
                                    if(!$resultat_chp4 && !$resultat_chp5){
                                        $erreur=3;
                                    }
                                    else {
                                        while($ligne=mysqli_fetch_array($resultat_chp4,MYSQL_NUM)){
                                            $res_2= $ligne[0];
                                        }
                                        while($ligne=mysqli_fetch_array($resultat_chp5,MYSQL_NUM)){
                                            $res_3= $ligne[0];
                                        }
                                        if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else {
                                            $requete_chp6="UPDATE constitue SET ID_Participant = '$res_3', ID_Chambre = '$res_2', Batiment_Chambre = '$batimentchp', Ville_Chambre ='$villechp', Nb_Lit_Chambre = '$nombrechp', Date_Deb = '$datedebchp', Date_Fin = '$datefinchp' WHERE ID_Participant = '$res_1' AND ID_Chambre = '$res' AND Batiment_Chambre = '$batiment_ch_p' AND Ville_Chambre = '$ville_ch_p' ";
                                            $resultat_chp6=@mysqli_query($idcom,$requete_chp6);
                                            if(!$resultat_chp6){
                                                $erreur=3;
                                            }
                                            else{
                                                $reussite = 1;
                                            }
                                        }
                                    }
                                }
                            }
                            else if($attribut == "comp_eq"){
                                if(!empty(trim($_POST["niveaucompeq"])) && !empty(trim($_POST["datecompeq"])) && !empty(trim($_POST["horairecompeq"]))  && !empty(trim($_POST["villecompeq"]))  && !empty(trim($_POST["nomdisciplinecompeq"])) && !empty(trim($_POST["genrecompeq"])) && !empty(trim($_POST["nomcompeq"])) && !empty(trim($_POST["nomentraineurcompeq"])) && !empty(trim($_POST["prenomentraineurcompeq"])) && !empty(trim($_POST["placecompeq"]))){
                                    $niveaucompeq = mysqli_real_escape_string($idcom, $_POST["niveaucompeq"]);
                                    $datecompeq = mysqli_real_escape_string($idcom, $_POST["datecompeq"]);
                                    $horairecompeq = mysqli_real_escape_string($idcom, $_POST["horairecompeq"]);
                                    $villecompeq = mysqli_real_escape_string($idcom, $_POST["villecompeq"]);
                                    $nomdisciplinecompeq = mysqli_real_escape_string($idcom, $_POST["nomdisciplinecompeq"]);
                                    $genrecompeq = mysqli_real_escape_string($idcom, $_POST["genrecompeq"]);
                                    $nomcompeq = mysqli_real_escape_string($idcom, $_POST["nomcompeq"]);
                                    $nomentraineurcompeq = mysqli_real_escape_string($idcom, $_POST["nomentraineurcompeq"]);
                                    $prenomentraineurcompeq = mysqli_real_escape_string($idcom, $_POST["prenomentraineurcompeq"]);
                                    $placecompeq = mysqli_real_escape_string($idcom, $_POST["placecompeq"]);

                                    $requete_cpe4="SELECT ID_Competition FROM Competition C, Categorie CAT, Discipline D WHERE 
                                        C.ID_Discipline = D.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie AND
                                        Genre_Categorie = '$genrecompeq' AND Nom_Discipline = '$nomdisciplinecompeq' AND
                                        Niveau_Competition = '$niveaucompeq' AND Date_Competition = '$datecompeq' AND Ville_Competition = '$villecompeq' AND Horaire_Competition = '0000-00-00'";
                                    $resultat_cpe4=@mysqli_query($idcom,$requete_cpe4);
                                    $requete_cpe5="SELECT ID_Equipe FROM Equipe E, Entraineur EN, Participant P WHERE EN.ID_Entraineur = E.ID_Entraineur AND P.ID_Participant = EN.ID_Participant AND Nom_Participant ='$nomentraineurcompeq' AND Prenom_Participant ='$prenomentraineurcompeq' AND Nom_Equipe ='$nomcompeq' ";
                                    $resultat_cpe5=@mysqli_query($idcom,$requete_cpe5);
                                    if(!$resultat_cpe4 && !$resultat_cpe5){
                                        $erreur=3;
                                    }
                                    else {
                                        while($ligne=mysqli_fetch_array($resultat_cpe4,MYSQL_NUM)){
                                            $res_2 = $ligne[0];
                                        }
                                        while($ligne=mysqli_fetch_array($resultat_cpe5,MYSQL_NUM)){
                                            $res_3 = $ligne[0];
                                        }
                                        if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else {
                                            $requete_cpe6="UPDATE joue SET ID_Equipe = '$res_3', ID_Competition = '$res_2', Classement_Equipe = '$placecompeq' WHERE ID_Competition = '$res'  AND ID_Equipe = '$res_1'  ";
                                            $resultat_cpe6=@mysqli_query($idcom,$requete_cpe6);
                                            if(!$resultat_cpe6){
                                                $erreur=3;
                                            }
                                            else {
                                                $reussite = 1;
                                            }
                                        }
                                    }
                                }
                            }
                            else if($attribut == "comp_ath"){
                                if(!empty(trim($_POST["niveaucompath"])) && !empty(trim($_POST["datecompath"])) && !empty(trim($_POST["horairecompath"]))  && !empty(trim($_POST["villecompath"]))  && !empty(trim($_POST["nomdisciplinecompath"])) && !empty(trim($_POST["genrecompath"])) && !empty(trim($_POST["nomcompath"])) && !empty(trim($_POST["prenomcompath"])) && !empty(trim($_POST["datenaisscompath"])) && !empty(trim($_POST["nationalitecompath"])) && !empty(trim($_POST["taillecompath"])) && !empty(trim($_POST["poidscompath"])) && !empty(trim($_POST["genrecompath"])) && !empty(trim($_POST["placecompath"]))){
                                    $niveaucompath = mysqli_real_escape_string($idcom, $_POST["niveaucompath"]);
                                    $datecompath = mysqli_real_escape_string($idcom, $_POST["datecompath"]);
                                    $horairecompath = mysqli_real_escape_string($idcom, $_POST["horairecompath"]);
                                    $villecompath = mysqli_real_escape_string($idcom, $_POST["villecompath"]);
                                    $nomdisciplinecompath = mysqli_real_escape_string($idcom, $_POST["nomdisciplinecompath"]);
                                    $genrecompath = mysqli_real_escape_string($idcom, $_POST["genrecompath"]);
                                    $nomcompath = mysqli_real_escape_string($idcom, $_POST["nomcompath"]);
                                    $prenomcompath = mysqli_real_escape_string($idcom, $_POST["prenomcompath"]);
                                    $datenaisscompath = mysqli_real_escape_string($idcom, $_POST["datenaisscompath"]);
                                    $nationalitecompath = mysqli_real_escape_string($idcom, $_POST["nationalitecompath"]);
                                    $taillecompath = mysqli_real_escape_string($idcom, $_POST["taillecompath"]);
                                    $poidscompath = mysqli_real_escape_string($idcom, $_POST["poidscompath"]);
                                    $genrecomptath = mysqli_real_escape_string($idcom, $_POST["genrecomptath"]);
                                    $placecompath = mysqli_real_escape_string($idcom, $_POST["placecompath"]);

                                    $requete_cpa4="SELECT ID_Competition FROM Competition C, Categorie CAT, Discipline D WHERE 
                                        C.ID_Discipline = D.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie AND
                                        Genre_Categorie = '$genrecompath' AND Nom_Discipline = '$nomdisciplinecompath' AND
                                        Niveau_Competition = '$niveaucompath' AND Date_Competition = '$datecompath' AND Ville_Competition = '$villecompath' AND Horaire_Competition = '0000-00-00'";
                                    $resultat_cpa4=@mysqli_query($idcom,$requete_cpa4);
                                    $requete_cpa5="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant ='$nomcompath' AND Prenom_Participant ='$prenomcompath' AND Date_Naiss_Participant ='$datenaisscompath' AND Nationalite_Participant ='$nationalitecompath' AND Taille_Athlete ='$taillecompath' AND Poids_Athlete ='$poidscompath' AND Genre_Athlete ='$genrecomptath' ";
                                    $resultat_cpa5=@mysqli_query($idcom,$requete_cpa5);
                                    if(!$resultat_cpa4 && !$resultat_cpa5){
                                        $erreur=3;
                                    }
                                    else {
                                        while($ligne=mysqli_fetch_array($resultat_cpa4,MYSQL_NUM)){
                                            $res_2= $ligne[0];
                                        }
                                        while($ligne=mysqli_fetch_array($resultat_cpa5,MYSQL_NUM)){
                                            $res_3= $ligne[0];
                                        }
                                        if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else {
                                            $requete_cpa6="UPDATE participe_a SET ID_Competition = '$res_2', ID_Athlete = '$res_3', Classement_Athlete = '$placecompath' WHERE ID_Competition = '$res'  AND ID_Athlete = '$res_1'  ";
                                            $resultat_cpa6=@mysqli_query($idcom,$requete_cpa6);
                                            if(!$resultat_cpa6){
                                                $erreur=3;
                                            }
                                            else {
                                                $reussite = 1;
                                            }
                                        }
                                    }
                                }
                            }
                            else if($attribut == "palma_ath"){
                                if(!empty(trim($_POST["medaillepalmaath"])) && !empty(trim($_POST["resultatpalmaath"])) && !empty(trim($_POST["datepalmaath"])) && !empty(trim($_POST["nompalmaath"])) && !empty(trim($_POST["prenompalmaath"])) && !empty(trim($_POST["datenaisspalmaath"])) && !empty(trim($_POST["nationalitepalmaath"])) && !empty(trim($_POST["taillepalmaath"])) && !empty(trim($_POST["poidspalmaath"])) && !empty(trim($_POST["genrepalmaath"]))){
                                    $medaillepalmaath = mysqli_real_escape_string($idcom, $_POST["medaillepalmaath"]);
                                    $resultatpalmaath = mysqli_real_escape_string($idcom, $_POST["resultatpalmaath"]);
                                    $datepalmaath = mysqli_real_escape_string($idcom, $_POST["datepalmaath"]);
                                    $nompalmaath = mysqli_real_escape_string($idcom, $_POST["nompalmaath"]);
                                    $prenompalmaath = mysqli_real_escape_string($idcom, $_POST["prenompalmaath"]);
                                    $datenaisspalmaath = mysqli_real_escape_string($idcom, $_POST["datenaisspalmaath"]);
                                    $nationalitepalmaath = mysqli_real_escape_string($idcom, $_POST["nationalite_palma_ath"]);
                                    $taillepalmaath = mysqli_real_escape_string($idcom, $_POST["taillepalmaath"]);
                                    $poidspalmaath = mysqli_real_escape_string($idcom, $_POST["poidspalmaath"]);
                                    $genrepalmaath = mysqli_real_escape_string($idcom, $_POST["genrepalmaath"]);
                                    $requete_palmaa4="SELECT ID_Palmares FROM Palmares WHERE Medaille_Palmares = '$medaillepalmaath' AND Resultat_Palmares = '$resultatpalmaath' AND Date_Palmares = '$datepalmaath' ";
                                    $resultat_palmaa4=@mysqli_query($idcom,$requete_palmaa4);
                                    $requete_palmaa5="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant ='$nompalmaath' AND Prenom_Participant ='$prenompalmaath' AND Date_Naiss_Participant ='$datenaisspalmaath' AND Nationalite_Participant ='$nationalitepalmaath' AND Taille_Athlete ='$taillepalmaath' AND Poids_Athlete ='$poidspalmaath' AND Genre_Athlete ='$genrepalmaath' ";
                                    $resultat_palmaa5=@mysqli_query($idcom,$requete_palmaa5);
                                    if(!$resultat_palmaa4 && !$resultat_palmaa5){
                                        $erreur=3;
                                    }
                                    else {
                                        while($ligne=mysqli_fetch_array($resultat_palmaa4,MYSQL_NUM)){
                                            $res_2= $ligne[0];
                                        }
                                        while($ligne=mysqli_fetch_array($resultat_palmaa5,MYSQL_NUM)){
                                            $res_3= $ligne[0];
                                        }
                                        if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else {
                                            $requete_palmaa6="UPDATE possede SET ID_Palmares = '$res_2', ID_Athlete = '$res_3' WHERE ID_Palmares = '$res'  AND ID_Athlete = '$res_1'  ";
                                            $resultat_palmaa6=@mysqli_query($idcom,$requete_palmaa6);
                                            if(!$resultat_palmaa6){
                                                $erreur=3;
                                            }
                                            else {
                                                $reussite = 1;
                                            }
                                        }
                                    }
                                }
                            }
                            else if($attribut == "dis_ath"){
                                if(!empty(trim($_POST["nomdisciplineath"])) && !empty(trim($_POST["recdisath"])) && !empty(trim($_POST["categoriedisath"])) && !empty(trim($_POST["genredisciplineath"])) && !empty(trim($_POST["nomdisath"])) && !empty(trim($_POST["prenomdisath"])) && !empty(trim($_POST["datenaissdisath"])) && !empty(trim($_POST["nationalite_dis_ath"])) && !empty(trim($_POST["taille_dis_ath"])) && !empty(trim($_POST["poids_dis_ath"])) && !empty(trim($_POST["genre_dis_ath"]))){
                                    $nomdisciplineath = mysqli_real_escape_string($idcom, $_POST["nomdisciplineath"]);
                                    $recdisath = mysqli_real_escape_string($idcom, $_POST["recdisath"]);
                                    $categoriedisath = mysqli_real_escape_string($idcom, $_POST["categoriedisath"]);
                                    $genredisciplineath = mysqli_real_escape_string($idcom, $_POST["genredisciplineath"]);
                                    $nomdisath = mysqli_real_escape_string($idcom, $_POST["nomdisath"]);
                                    $prenomdisath = mysqli_real_escape_string($idcom, $_POST["prenomdisath"]);
                                    $datenaissdisath = mysqli_real_escape_string($idcom, $_POST["datenaissdisath"]);
                                    $nationalitedisath = mysqli_real_escape_string($idcom, $_POST["nationalitedisath"]);
                                    $tailledisath = mysqli_real_escape_string($idcom, $_POST["tailledisath"]);
                                    $poidsdisath = mysqli_real_escape_string($idcom, $_POST["poidsdisath"]);
                                    $genredisath = mysqli_real_escape_string($idcom, $_POST["genredisath"]);

                                    $requete_disca4="SELECT ID_Discipline FROM Discipline D, Categorie CAT WHERE CAT.ID_Categorie = D.ID_Categorie AND Nom_Categorie = '$categoriedisath' AND genredisciplineath = '$genredisciplineath' AND Nom_Discipline = '$nomdisciplineath' AND Record_Discipline = '$recdisath' ";
                                    $resultat_disca4=@mysqli_query($idcom,$requete_disca4);
                                    $requete_disca5="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant ='$nomdisath' AND Prenom_Participant ='$prenomdisath' AND Date_Naiss_Participant ='$datenaissdisath' AND Nationalite_Participant ='$nationalitedisath' AND Taille_Athlete ='$tailledisath' AND Poids_Athlete ='$poidsdisath' AND Genre_Athlete ='$genredisath' ";
                                    $resultat_disca5=@mysqli_query($idcom,$requete_disca5);
                                    if(!$resultat_disca4 && !$resultat_disca5){
                                        $erreur=3;
                                    }
                                    else {
                                        while($ligne=mysqli_fetch_array($resultat_disca4,MYSQL_NUM)){
                                            $res_2= $ligne[0];
                                        }
                                        while($ligne=mysqli_fetch_array($resultat_disca5,MYSQL_NUM)){
                                            $res_3= $ligne[0];
                                        }
                                        if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else {
                                            $requete_disca6="UPDATE possede SET ID_Discipline = '$res_2', ID_Athlete = '$res_3' WHERE ID_Palmares = '$res'  AND ID_Athlete = '$res_1'  ";
                                            $resultat_disca6=@mysqli_query($idcom,$requete_disca6);
                                            if(!$resultat_disca6){
                                                $erreur=3;
                                            }
                                            else {
                                                $reussite = 1;
                                            }
                                        }
                                    }
                                }
                            }
                            else if($attribut == "eq_ath"){
                                if(!empty(trim($_POST["nomequipeath"])) && !empty(trim($_POST["nomentraineureqath"])) && !empty(trim($_POST["prenomentraineureqath"])) && !empty(trim($_POST["nomeqath"])) && !empty(trim($_POST["prenomeqath"])) && !empty(trim($_POST["datenaisseqath"])) && !empty(trim($_POST["nationaliteeqath"])) && !empty(trim($_POST["tailleeqath"])) && !empty(trim($_POST["poidseqath"])) && !empty(trim($_POST["genreeqath"])) && !empty(trim($_POST["placeeqath"]))){
                                    $nomequipeath = mysqli_real_escape_string($idcom, $_POST["nomequipeath"]);
                                    $nomentraineureqath = mysqli_real_escape_string($idcom, $_POST["nomentraineureqath"]);
                                    $prenomentraineureqath = mysqli_real_escape_string($idcom, $_POST["prenomentraineureqath"]);
                                    $nomeqath = mysqli_real_escape_string($idcom, $_POST["nomeqath"]);
                                    $prenomeqath = mysqli_real_escape_string($idcom, $_POST["prenomeqath"]);
                                    $datenaisseqath = mysqli_real_escape_string($idcom, $_POST["datenaisseqath"]);
                                    $nationaliteeqath = mysqli_real_escape_string($idcom, $_POST["nationaliteeqath"]);
                                    $tailleeqath = mysqli_real_escape_string($idcom, $_POST["tailleeqath"]);
                                    $poidseqath = mysqli_real_escape_string($idcom, $_POST["poidseqath"]);
                                    $genreeqath = mysqli_real_escape_string($idcom, $_POST["genreeqath"]);
                                    $placeeqath = mysqli_real_escape_string($idcom, $_POST["placeeqath"]);

                                    $requeteeqa4="SELECT ID_Equipe FROM Equipe E, Participant P, Entraineur EN WHERE EN.ID_Entraineur = E.ID_Entraineur AND EN.ID_Participant = P.ID_Participant AND Nom_Equipe = '$nomequipeath' AND Nom_Participant = '$nomentraineureqath' AND Prenom_Participant = '$prenomentraineureqath' ";
                                    $resultateqa4=@mysqli_query($idcom,$requete_eqa4);
                                    $requeteeqa5="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant ='$nomeqath' AND Prenom_Participant ='$prenomeqath' AND Date_Naiss_Participant ='$datenaisseqath' AND Nationalite_Participant ='$nationaliteeqath' AND Taille_Athlete ='$tailleeqath' AND Poids_Athlete ='$poidseqath' AND Genre_Athlete ='$genreeqath' ";
                                    $resultateqa5=@mysqli_query($idcom,$requete_eqa5);
                                    if(!$resultat_eqa4 && !$resultat_eqa5){
                                        $erreur=3;
                                    }
                                    else {
                                        while($ligne=mysqli_fetch_array($resultat_eqa4,MYSQL_NUM)){
                                            $res_2= $ligne[0];
                                        }
                                        while($ligne=mysqli_fetch_array($resultat_eqa5,MYSQL_NUM)){
                                            $res_3= $ligne[0];
                                        }
                                        if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                            $erreur = 4;
                                        }
                                        else {
                                            $requete_eqa6="UPDATE compose_e SET ID_Equipe = '$res_2', ID_Athlete = '$res_3', Position_Equipe = '$placeeqath' WHERE ID_Equipe = '$res'  AND ID_Athlete = '$res_1'  ";
                                            $resultat_eqa6=@mysqli_query($idcom,$requete_eqa6);
                                            if(!$resultat_eqa6){
                                                $erreur=3;
                                            }
                                            else {
                                                $reussite = 1;
                                            }
                                        }
                                    }
                                }
                            }
                                                    if($erreur == 1){
                            echo "<br><br><label class=\"erreur\"> Vous n'avez pas s&eacute;l&eacute;ctionn&eacute; d'&eacute;l&eacute;ment. </label> <br><br>";
                        }  
                        if($erreur == 2){
                            echo "<br><br><label class=\"erreur\"> Vous n'avez pas renseign&eacute; tous les champs. </label><br><br>";
                        } 
                        if($erreur == 3){
                            echo "<br><br><label class=\"erreur\"> Erreur de connexion &agrave; la base de donn&eacute;e. </label><br><br>";
                        } 
                        if($erreur == 4){
                            echo "<br><br><label class=\"erreur\"> Les &eacute;l&eacute;ments que vous essayez de modifier n'existent pas.</label><br><br>";
                        } 
                        if($reussite != 0){
                            echo "<br><br><label> La modification s'est bien pass&eacute;e. </label><br><br>";
                        } 
                        }
                    ?>
                </div>
            </form>
		</body>
</html>