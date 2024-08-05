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
                    Veillez selectionner la table dans laquelle vous voulez modifier un &eacute;l&eacute;ment : <br><br>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="participant" name = "choix" value="participant"/>
                        Participant 
                        <div class="invisible align">
                            &nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="sel" type="radio" id="membre" name = "type_p" value="membre"/>
                                Membre du Comit&eacute; d'Organisation 
                                <div class="invisible">
                                    <br>
                                    Nom : <input type="texte" maxlength = "30" name="nom_1"/>&nbsp;
                                    Prenom : <input type="texte" maxlength = "30" name="prenom_1"/>&nbsp;
                                    Date de naissance : <input type="date" name="date_naiss_1" max="2003-01-01"/>&nbsp;
                                    <?php
                                        $requete1="SELECT DISTINCT Nationalite_Participant FROM Participant P, Membre_CO M WHERE P.ID_Participant = M.ID_Participant";
                                        $result1=@mysqli_query($idcom,$requete1);
                                        if(!$result1){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Nationalit&eacute; :
                                            <select name=\"nationalite_1\">";
                                            while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;";
                                        
                                        }
                                    ?>
                                    <br><br>
                                    L'authorisation de modifier le mot de passe n'est pas authoris&eacute;e. Le membre a un mot de passe personnel, et seulement lui pourra le modifier.
                                </div>
                            </label>
                            <br>
                            &nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="sel" type="radio" id="athlete" name = "type_p" value="athlete"/>
                                Athl&egrave;te 
                                <div class="invisible">
                                    <br>
                                    Nom : <input type="texte" maxlength = "30" name="nom_2"/>&nbsp;
                                    Prenom : <input type="texte" maxlength = "30" name="prenom_2"/>&nbsp;
                                    Date de naissance : <input type="date" name="date_naiss_2" max="2003-01-01"/>&nbsp;
                                    <?php
                                        $requete2="SELECT DISTINCT Nationalite_Participant FROM Participant P, Athlete A WHERE P.ID_Participant = A.ID_Participant";
                                        $result2=@mysqli_query($idcom,$requete2);
                                        if(!$result2){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Nationalit&eacute; :
                                            <select name=\"nationalite_2\">";
                                            while($ligne=mysqli_fetch_array($result2,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;";
                                        
                                        }
                                    ?><br>
                                    Taille : <input type="texte" name="taille_2"/> <br><br>
                                    Poids : <input type="texte" name="poids_2"/> &nbsp;
                                    Genre :  
                                        <select name="genre_athlete"> 
                                            <option value="f&eacute;minin">F&eacute;minin</option> 
                                            <option value="masculin">Masculin</option>  
                                        </select> &nbsp;
                                    Nom entra&icirc;neur : <input type="texte" maxlength = "30" name="nom_entraineur_2"/>&nbsp; <br>
                                    Prenom entra&icirc;neur : <input type="texte" maxlength = "30" name="prenom_entraineur_2"/>
                                </div>
                            </label>
                            <br>
                            &nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="sel" type="radio" id="personnel" name = "type_p" value="personnel"/>
                                Personnel
                                <div class="invisible">
                                    <br>
                                    Nom : <input type="texte" maxlength = "30" name="nom_3"/>&nbsp;
                                    Prenom : <input type="texte" maxlength = "30" name="prenom_3"/>&nbsp;
                                    Date de naissance : <input type="date" name="date_naiss_3" max="2003-01-01"/>&nbsp; 
                                    <?php
                                        $requete3="SELECT DISTINCT Nationalite_Participant FROM Participant P, Personnel Pers WHERE P.ID_Participant = Pers.ID_Participant";
                                        $result3=@mysqli_query($idcom,$requete3);
                                        if(!$result3){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Nationalit&eacute; :
                                            <select name=\"nationalite_3\">";
                                            while($ligne=mysqli_fetch_array($result3,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;";
                                        
                                        }
                                    ?>
                                    <?php
                                        $requete4="SELECT DISTINCT Ville_Personnel FROM Personnel";
                                        $result4=@mysqli_query($idcom,$requete4);
                                        if(!$result4){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Ville :
                                            <select name=\"ville_3\">";
                                            while($ligne=mysqli_fetch_array($result4,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;";
                                        
                                        }
                                    ?>
                                    <?php
                                        $requete5="SELECT DISTINCT Role_Personnel FROM Personnel";
                                        $result5=@mysqli_query($idcom,$requete5);
                                        if(!$result5){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "R&ocirc;le :
                                            <select name=\"role_3\">";
                                            while($ligne=mysqli_fetch_array($result5,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select> &nbsp;";
                                            
                                        }
                                    ?>
                                </div>
                            </label>
                            <br>
                            &nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="sel" type="radio" id="entraineur" name = "type_p" value="entraineur"/>
                                Entra&icirc;neur 
                                <div class="invisible">
                                    <br>
                                    Nom : <input type="texte" maxlength = "30" name="nom_4"/>&nbsp;
                                    Prenom : <input type="texte" maxlength = "30" name="prenom_4"/>&nbsp;
                                    Date de naissance : <input type="date" name="date_naiss_4" max="2003-01-01"/>&nbsp;
                                    <?php
                                        $requete6="SELECT DISTINCT Nationalite_Participant FROM Participant P, Entraineur E WHERE P.ID_Participant = E.ID_Participant";
                                        $result6=@mysqli_query($idcom,$requete6);
                                        if(!$result6){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Nationalit&eacute; :
                                            <select name=\"nationalite_4\">";
                                            while($ligne=mysqli_fetch_array($result6,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;";
                                            
                                        }
                                    ?>
                                    <?php
                                        $requete7="SELECT DISTINCT Diplome_Entraineur FROM Entraineur";
                                        $result7=@mysqli_query($idcom,$requete7);
                                        if(!$result7){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Diplo&ocirc;me :
                                            <select name=\"diplome_4\">";
                                            while($ligne=mysqli_fetch_array($result7,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select><br><br>";
                                            
                                        }
                                    ?>
                                </div>
                            </label>
                        </div> 
                    </label>
                    <br><br>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="equipe" name = "choix" value="equipe"/>
                        Equipe 
                        <div class="invisible align">
                            <br>
                            <label>
                                <?php
                                    $requete8="SELECT DISTINCT Nom_Equipe FROM Equipe";
                                    $result8=@mysqli_query($idcom,$requete8);
                                    if(!$result8){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nom :
                                        <select name=\"nom_equipe\">";
                                        while($ligne=mysqli_fetch_array($result8,MYSQL_NUM)){
                                            echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                Nom de l'entraineur de l'&eacute;quipe : <input type="texte" maxlength = "30" name="nom_entraineur_equipe"/>&nbsp;
                                Pr&eacute;nom de l'entraineur de l'&eacute;quipe : <input type="texte" maxlength = "30" name="prenom_entraineur_equipe"/>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div>

                <div> 
                    <label>
                        <input class="sel" type="radio" id="chambre" name = "choix" value="chambre"/>
                        Chambre
                        <div class="invisible align">
                            <br>
                            <label>
                                <?php
                                    $requete9="SELECT DISTINCT ID_Chambre FROM Chambre";
                                    $result9=@mysqli_query($idcom,$requete9);
                                    if(!$result9){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Num&eacute;ro de chambre :
                                        <select name=\"numero_chambre\">";
                                        while($ligne=mysqli_fetch_array($result9,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp";
                                        
                                    }
                                ?>
                                <?php
                                    $requete10="SELECT DISTINCT Batiment_Chambre FROM Chambre";
                                    $result10=@mysqli_query($idcom,$requete10);
                                    if(!$result10){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "B&acirc;timent :
                                        <select name=\"batiment_chambre\">";
                                        while($ligne=mysqli_fetch_array($result10,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                <?php
                                    $requete11="SELECT DISTINCT Ville_Chambre FROM Chambre";
                                    $result11=@mysqli_query($idcom,$requete11);
                                    if(!$result11){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Ville :
                                        <select name=\"ville_chambre\">";
                                        while($ligne=mysqli_fetch_array($result11,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                <?php
                                    $requete12="SELECT DISTINCT Nb_Lit_Chambre FROM Chambre";
                                    $result12=@mysqli_query($idcom,$requete12);
                                    if(!$result12){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nombre de lits :
                                        <select name=\"nombre_lit\">";
                                        while($ligne=mysqli_fetch_array($result12,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>";
                                    }
                                ?>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div>

                <div> 
                    <label>
                        <input class="sel" type="radio" id="categorie" name = "choix" value="categorie"/>
                        Cat&eacute;gorie
                        <div class="invisible align">
                            <br>
                            <label>
                                <?php
                                    $requete13="SELECT DISTINCT Nom_Categorie FROM Categorie";
                                    $result13=@mysqli_query($idcom,$requete13);
                                    if(!$result13){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nom :
                                        <select name=\"nom_categorie\">";
                                        while($ligne=mysqli_fetch_array($result13,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                Genre :                                         
                                    <select name="genre_categorie"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select>     
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="discipline" name = "choix" value="discipline"/>
                        Discipline
                        <div class="invisible align">
                            <br>
                            <label>
                                <?php
                                    $requete14="SELECT DISTINCT Nom_Discipline FROM Discipline";
                                    $result14=@mysqli_query($idcom,$requete14);
                                    if(!$result14){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nom :
                                        <select name=\"nom_discipline\">";
                                        while($ligne=mysqli_fetch_array($result14,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                <?php
                                    $requete15="SELECT DISTINCT Record_Prec_Discipline FROM Discipline";
                                    $result15=@mysqli_query($idcom,$requete15);
                                    if(!$result15){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Ancien record :
                                        <select name=\"rec_discipline\">";
                                        while($ligne=mysqli_fetch_array($result15,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                <?php
                                        $requete16="SELECT DISTINCT Nom_Categorie FROM Categorie";
                                        $result16=@mysqli_query($idcom,$requete16);
                                        if(!$result16){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Categorie :
                                            <select name=\"categorie_nom\">";
                                            while($ligne=mysqli_fetch_array($result16,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;";
                                            
                                        }
                                ?>
                                Genre :                                         
                                    <select name="genre_discipline"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> 
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="competition" name = "choix" value="competition"/>
                        Comp&eacute;tition
                        <div class="invisible align">
                            <br>
                            <label>
                                <?php
                                    $requete17="SELECT DISTINCT Niveau_Competition FROM Competition";
                                    $result17=@mysqli_query($idcom,$requete17);
                                    if(!$result17){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Niveau :
                                        <select name=\"niveau_compet\">";
                                        while($ligne=mysqli_fetch_array($result17,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                Date : <input type="date" name="date_compet" min="2024-07-27" max="2024-08-12" />&nbsp;
                                Horaire du d&eacute;but : <input type="time" name="horaire_compet" min="08:00" max="21:00" /> &nbsp;
                                <?php
                                        $requete18="SELECT DISTINCT Ville_Competition FROM Competition";
                                        $result18=@mysqli_query($idcom,$requete18);
                                        if(!$result18){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Ville :
                                            <select name=\"ville_compet\">";
                                            while($ligne=mysqli_fetch_array($result18,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;";
                                            
                                        }
                                ?>
                                <?php
                                        $requete19="SELECT DISTINCT Nom_Discipline FROM Discipline";
                                        $result19=@mysqli_query($idcom,$requete19);
                                        if(!$result19){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Discipline :
                                            <select name=\"nom_discipline_compet\">";
                                            while($ligne=mysqli_fetch_array($result19,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;";
                                            
                                        }
                                ?>
                                Genre :                                         
                                    <select name="genre_competition"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> 
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="palmares" name = "choix" value="palmares"/>
                        Palmar&egrave;s
                        <div class="invisible align">
                            <br>
                            <label>
                                Medaille : 
                                    <select name="medaille_palma"> 
                                        <option value="or">Or</option> 
                                        <option value="argent">Argent</option> 
                                        <option value="bronze">Bronze</option>  
                                    </select>&nbsp;
                                <?php
                                    $requete20="SELECT DISTINCT Resultat_Palmares FROM Palmares";
                                    $result20=@mysqli_query($idcom,$requete20);
                                    if(!$result20){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "R&eacute;sultat :
                                        <select name=\"resultat_palma\">";
                                        while($ligne=mysqli_fetch_array($result20,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                Date du palmar&egrave;s : <input type="date" name="date_palma" min="2024-07-27" max="2024-08-12" />&nbsp; 
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 


                <div> 
                    <label>
                        <input class="sel" type="radio" id="cat_per" name = "choix" value="cat_per"/>
                        Cat&eacute;gorie d'un personnel
                        <div class="invisible align">
                            <br>
                            <label>
                                <label class="important"> 
                                    Cat&eacute;gorie <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_cat_per"/>&nbsp;
                                Genre :                                         
                                    <select name="genre_cat_per"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select>  <br><br>

                                <label class="important"> 
                                    Personnel <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_cat_pers"/>&nbsp;
                                Prenom : <input type="texte" maxlength = "30" name="prenom_cat_per"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_cat_per" max="2003-01-01"/>&nbsp; 
                                <?php
                                    $requete21="SELECT DISTINCT Nationalite_Participant FROM Participant P, Personnel Pers WHERE P.ID_Participant = Pers.ID_Participant";
                                    $result21=@mysqli_query($idcom,$requete21);
                                    if(!$result21){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nationalit&eacute; :
                                        <select name=\"nationalite_cat_per\">";
                                        while($ligne=mysqli_fetch_array($result21,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                <?php
                                    $requete22="SELECT DISTINCT Ville_Personnel FROM Personnel";
                                    $result22=@mysqli_query($idcom,$requete22);
                                    if(!$result22){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Ville :
                                        <select name=\"ville_cat_per\">";
                                        while($ligne=mysqli_fetch_array($result22,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                <?php
                                    $requete23="SELECT DISTINCT Role_Personnel FROM Personnel";
                                    $result23=@mysqli_query($idcom,$requete23);
                                    if(!$result23){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "R&ocirc;le :
                                        <select name=\"role_cat_per\">";
                                        while($ligne=mysqli_fetch_array($result23,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select> &nbsp;";
                                        
                                    }
                                ?>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="comp_per" name = "choix" value="comp_per"/>
                        Comp&eacute;tition d'un personnel
                        <div class="invisible align">
                            <br>
                            <label>
                                <label class="important"> 
                                    Comp&eacute;tition <br><br>
                                </label>
                                <?php
                                    $requete24="SELECT DISTINCT Niveau_Competition FROM Competition";
                                    $result24=@mysqli_query($idcom,$requete24);
                                    if(!$result24){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Niveau :
                                        <select name=\"niveau_comp_per\">";
                                        while($ligne=mysqli_fetch_array($result24,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                Date : <input type="date" name="date_comp_per" min="2024-07-27" max="2024-08-12" />&nbsp;
                                Horaire du d&eacute;but : <input type="time" name="horaire_comp_per" min="08:00" max="21:00" /> &nbsp;
                                <?php
                                    $requete25="SELECT DISTINCT Ville_Competition FROM Competition";
                                    $result25=@mysqli_query($idcom,$requete25);
                                    if(!$result25){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Ville :
                                        <select name=\"ville_comp_per\">";
                                        while($ligne=mysqli_fetch_array($result25,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;<br>";
                                        
                                    }
                                ?>
                                <?php
                                    $requete26="SELECT DISTINCT Nom_Discipline FROM Discipline";
                                    $result26=@mysqli_query($idcom,$requete26);
                                    if(!$result26){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Discipline :
                                        <select name=\"nom_discipline_comp_per\">";
                                        while($ligne=mysqli_fetch_array($result26,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                Genre :                                         
                                    <select name="genre_comp_per"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> <br><br>

                                <label class="important"> 
                                    Personnel <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_comp_per"/>&nbsp;
                                Prenom : <input type="texte" maxlength = "30" name="prenom_comp_per"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_comp_per" max="2003-01-01"/>&nbsp; 
                                <?php
                                    $requete27="SELECT DISTINCT Nationalite_Participant FROM Participant P, Personnel Pers WHERE P.ID_Participant = Pers.ID_Participant";
                                    $result27=@mysqli_query($idcom,$requete27);
                                    if(!$result27){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nationalit&eacute; :
                                        <select name=\"nationalite_comp_per\">";
                                        while($ligne=mysqli_fetch_array($result27,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                <?php
                                    $requete28="SELECT DISTINCT Ville_Personnel FROM Personnel";
                                    $result28=@mysqli_query($idcom,$requete28);
                                    if(!$result28){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Ville :
                                        <select name=\"ville_comp_per\">";
                                        while($ligne=mysqli_fetch_array($result28,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                <?php
                                    $requete29="SELECT DISTINCT Role_Personnel FROM Personnel";
                                    $result29=@mysqli_query($idcom,$requete29);
                                    if(!$result29){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "R&ocirc;le :
                                        <select name=\"role_comp_per\">";
                                        while($ligne=mysqli_fetch_array($result29,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select> &nbsp;";
                                        
                                    }
                                ?>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 


                <div> 
                    <label>
                        <input class="sel" type="radio" id="palma_dis" name = "choix" value="palma_dis"/>
                        Palmar&egrave;s d'une discipline
                        <div class="invisible align">
                            <br>
                            <label>
                                <label class="important"> 
                                    Palmar&egrave;s <br><br>
                                </label>
                                Medaille : 
                                    <select name="medaille_palma_dis"> 
                                        <option value="or">Or</option> 
                                        <option value="argent">Argent</option> 
                                        <option value="bronze">Bronze</option>  
                                    </select>&nbsp;
                                <?php
                                    $requete30="SELECT DISTINCT Resultat_Palmares FROM Palmares";
                                    $result30=@mysqli_query($idcom,$requete30);
                                    if(!$result30){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "R&eacute;sultat :
                                        <select name=\"resultat_palma_dis\">";
                                        while($ligne=mysqli_fetch_array($result30,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                Date du palmar&egrave;s : <input type="date" name="date_palma_dis" min="2024-07-27" max="2024-08-12" />&nbsp;
                                 <br><br>

                                <label class="important"> 
                                    Discipline <br><br>
                                </label>
                                <?php
                                    $requete31="SELECT DISTINCT Nom_Discipline FROM Discipline";
                                    $result31=@mysqli_query($idcom,$requete31);
                                    if(!$result31){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nom :
                                        <select name=\"nom_palma_dis\">";
                                        while($ligne=mysqli_fetch_array($result31,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                <?php
                                    $requete32="SELECT DISTINCT Record_Prec_Discipline FROM Discipline";
                                    $result32=@mysqli_query($idcom,$requete32);
                                    if(!$result32){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Ancien record :
                                        <select name=\"rec_palma_dis\">";
                                        while($ligne=mysqli_fetch_array($result32,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                <?php
                                        $requete33="SELECT DISTINCT Nom_Categorie FROM Categorie";
                                        $result33=@mysqli_query($idcom,$requete33);
                                        if(!$result33){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Categorie :
                                            <select name=\"categorie_palma_dis\">";
                                            while($ligne=mysqli_fetch_array($result33,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;";
                                            
                                        }
                                ?>
                                Genre :                                         
                                    <select name="genre_palma_dis"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> 
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 

                <div> 
                    <label>
                        <input class="sel" type="radio" id="ch_p" name = "choix" value="ch_p"/>
                            Chambre du participant
                        <div class="invisible align">
                            <br>
                            <label>
                                <label class="important"> 
                                    Chambre <br><br>
                                </label>
                                <?php
                                    $requete34="SELECT DISTINCT ID_Chambre FROM Chambre";
                                    $result34=@mysqli_query($idcom,$requete34);
                                    if(!$result34){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Num&eacute;ro de chambre :
                                        <select name=\"numero_ch_p\">";
                                        while($ligne=mysqli_fetch_array($result34,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp";
                                        
                                    }
                                ?>
                                <?php
                                    $requete35="SELECT DISTINCT Batiment_Chambre FROM Chambre";
                                    $result35=@mysqli_query($idcom,$requete35);
                                    if(!$result35){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "B&acirc;timent :
                                        <select name=\"batiment_ch_p\">";
                                        while($ligne=mysqli_fetch_array($result35,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                <?php
                                    $requete36="SELECT DISTINCT Ville_Chambre FROM Chambre";
                                    $result36=@mysqli_query($idcom,$requete36);
                                    if(!$result36){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Ville :
                                        <select name=\"ville_ch_p\">";
                                        while($ligne=mysqli_fetch_array($result36,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                Date de d&eacute;but du s&eacute;jour : <input type="date" name="date_deb_ch_p" min="2024-07-10" max="2024-08-17" />&nbsp;
                                Date de fin du s&eacute;jour : <input type="date" name="date_fin_ch_p" min="2024-07-10" max="2024-08-17" />&nbsp;
                                <?php
                                    $requete37="SELECT DISTINCT Nb_Lit_Chambre FROM Chambre";
                                    $result37=@mysqli_query($idcom,$requete37);
                                    if(!$result37){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nombre de lits :
                                        <select name=\"nombre_ch_p\">";
                                        while($ligne=mysqli_fetch_array($result37,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>";
                                    }
                                ?>
                                <br><br>

                                <label class="important"> 
                                    Participant <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_ch_p"/>&nbsp;
                                Prenom : <input type="texte "  maxlength = "30" name="prenom_ch_p"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_ch_p" max="2003-01-01"/>&nbsp;
                                <?php
                                    $requete38="SELECT DISTINCT Nationalite_Participant FROM Participant P, Membre_CO M WHERE P.ID_Participant = M.ID_Participant";
                                    $result38=@mysqli_query($idcom,$requete38);
                                    if(!$result38){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nationalit&eacute; :
                                        <select name=\"nationalite_ch_p\">";
                                        while($ligne=mysqli_fetch_array($result38,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    }
                                ?>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 

                <div> 
                    <label>
                        <input class="sel" type="radio" id="comp_eq" name = "choix" value="comp_eq"/>
                            Comp&eacute;tition d'une &eacute;quipe
                        <div class="invisible align">
                            <br>
                            <label>
                                <label class="important"> 
                                    Comp&eacute;tition <br><br>
                                </label>
                                <?php
                                    $requete39="SELECT DISTINCT Niveau_Competition FROM Competition";
                                    $result39=@mysqli_query($idcom,$requete39);
                                    if(!$result39){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Niveau :
                                        <select name=\"niveau_comp_eq\">";
                                        while($ligne=mysqli_fetch_array($result39,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                Date : <input type="date" name="date_comp_eq" min="2024-07-27" max="2024-08-12" />&nbsp;
                                Horaire du d&eacute;but : <input type="time" name="horaire_comp_eq" min="08:00" max="21:00" /> &nbsp;
                                <?php
                                        $requete40="SELECT DISTINCT Ville_Competition FROM Competition";
                                        $result40=@mysqli_query($idcom,$requete40);
                                        if(!$result40){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "Ville :
                                            <select name=\"ville_comp_eq\">";
                                            while($ligne=mysqli_fetch_array($result40,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;<br>";
                                            
                                        }
                                ?>
                                <?php
                                    $requete41="SELECT DISTINCT Nom_Discipline FROM Discipline";
                                    $result41=@mysqli_query($idcom,$requete41);
                                    if(!$result41){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Discipline :
                                        <select name=\"nom_discipline_comp_eq\">";
                                        while($ligne=mysqli_fetch_array($result41,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                Genre :                                         
                                    <select name="genre_comp_eq"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> <br><br>

                                <label class="important"> 
                                    Equipe <br><br>
                                </label>
                                <?php
                                    $requete42="SELECT DISTINCT Nom_Equipe FROM Equipe";
                                    $result42=@mysqli_query($idcom,$requete42);
                                    if(!$result42){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nom :
                                        <select name=\"nom_comp_eq\">";
                                        while($ligne=mysqli_fetch_array($result42,MYSQL_NUM)){
                                            echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                Nom de l'entraineur de l'&eacute;quipe : <input type="texte"  maxlength = "30" name="nom_entraineur_comp_eq"/>&nbsp;
                                Pr&eacute;nom de l'entraineur de l'&eacute;quipe : <input type="texte"  maxlength = "30" name="prenom_entraineur_comp_eq"/>&nbsp;
                                Classement &eacute;quipe : <input type="texte" name="place_comp_eq"/>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 

                <div> 
                    <label>
                        <input class="sel" type="radio" id="comp_ath" name = "choix" value="comp_ath"/>
                            Comp&eacute;tition d'un athl&egrave;te
                        <div class="invisible align">
                            <br>
                            <label>
                                <label class="important"> 
                                    Comp&eacute;tition <br><br>
                                </label>
                                <?php
                                    $requete43="SELECT DISTINCT Niveau_Competition FROM Competition";
                                    $result43=@mysqli_query($idcom,$requete43);
                                    if(!$result43){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Niveau :
                                        <select name=\"niveau_comp_ath\">";
                                        while($ligne=mysqli_fetch_array($result43,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                        
                                    }
                                ?>
                                Date : <input type="date" name="date_comp_ath" min="2024-07-27" max="2024-08-12" />&nbsp;
                                Horaire du d&eacute;but : <input type="time" name="horaire_comp_ath" min="08:00" max="21:00" /> &nbsp;
                                <?php
                                    $requete44="SELECT DISTINCT Ville_Competition FROM Competition";
                                    $result44=@mysqli_query($idcom,$requete44);
                                    if(!$result44){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Ville :
                                        <select name=\"ville_comp_ath\">";
                                        while($ligne=mysqli_fetch_array($result44,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;<br>";
                                    }
                                ?>
                                <?php
                                    $requete45="SELECT DISTINCT Nom_Discipline FROM Discipline";
                                    $result45=@mysqli_query($idcom,$requete45);
                                    if(!$result45){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Discipline :
                                        <select name=\"nom_discipline_comp_ath\">";
                                        while($ligne=mysqli_fetch_array($result45,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    }
                                ?>
                                Genre :                                         
                                    <select name="genre_comp_ath"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> <br><br>

                                <label class="important"> 
                                    Athl&egrave;te <br><br>
                                </label>
                                Nom : <input type="texte"  maxlength = "30" name="nom_comp_ath"/>&nbsp;
                                Prenom : <input type="texte"  maxlength = "30" name="prenom_comp_ath"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_comp_ath" max="2003-01-01"/>&nbsp;
                                <?php
                                    $requete46="SELECT DISTINCT Nationalite_Participant FROM Participant P, Athlete A WHERE P.ID_Participant = A.ID_Participant";
                                    $result46=@mysqli_query($idcom,$requete46);
                                    if(!$result46){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nationalit&eacute; :
                                        <select name=\"nationalite_comp_ath\">";
                                        while($ligne=mysqli_fetch_array($result46,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                Taille : <input type="texte" name="taille_comp_ath"/> <br><br>
                                Poids : <input type="texte" name="poids_comp_ath"/> &nbsp;
                                Genre :  
                                    <select name="genre_comp_ath"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option>  
                                    </select> &nbsp;
                                Classement athl&egrave;te : <input type="texte" name="place_comp_ath"/>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 

                <div> 
                    <label>
                        <input class="sel" type="radio" id="palma_ath" name = "choix" value="palma_ath"/>
                            Palmar&egrave;s d'un athl&egrave;te
                        <div class="invisible align">
                            <br>
                            <label>
                                <label class="important"> 
                                    Palmar&egrave;s  <br><br>
                                </label>
                                Medaille : 
                                    <select name="medaille_palma_ath"> 
                                        <option value="or">Or</option> 
                                        <option value="argent">Argent</option> 
                                        <option value="bronze">Bronze</option>  
                                    </select>&nbsp;
                                    <?php
                                        $requete47="SELECT DISTINCT Resultat_Palmares FROM Palmares";
                                        $result47=@mysqli_query($idcom,$requete47);
                                        if(!$result47){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "R&eacute;sultat :
                                            <select name=\"resultat_palma_ath\">";
                                            while($ligne=mysqli_fetch_array($result47,MYSQL_NUM)){
                                                    echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                            }
                                            echo "</select>&nbsp;";

                                        }
                                    ?>
                                        Date du palmar&egrave;s : <input type="date" name="date_palma_ath" min="2024-07-27" max="2024-08-12" />&nbsp;
                                        <br><br>
                                        
                                        <label class="important"> 
                                            Athl&egrave;te <br><br>
                                        </label>
                                        Nom : <input type="texte"  maxlength = "30" name="nom_palma_ath"/>&nbsp;
                                        Prenom : <input type="texte"  maxlength = "30" name="prenom_palma_ath"/>&nbsp;
                                        Date de naissance : <input type="date" name="date_naiss_palma_ath" max="2003-01-01"/>&nbsp;
                                        <?php
                                            $requete48="SELECT DISTINCT Nationalite_Participant FROM Participant P, Athlete A WHERE P.ID_Participant = A.ID_Participant";
                                            $result48=@mysqli_query($idcom,$requete48);
                                            if(!$result48){
                                                echo "Erreur de connexion a la base de donn&eacute;e";
                                            }
                                            else {
                                                echo "Nationalit&eacute; :
                                                <select name=\"nationalite_palma_ath\">";
                                                while($ligne=mysqli_fetch_array($result48,MYSQL_NUM)){
                                                        echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                                }
                                                echo "</select>&nbsp;";
                                            
                                            }
                                        ?>
                                        Taille : <input type="texte" name="taille_palma_ath"/> <br><br>
                                        Poids : <input type="texte" name="poids_palma_ath"/> &nbsp;
                                        Genre :  
                                            <select name="genre_palma_ath"> 
                                                <option value="f&eacute;minin">F&eacute;minin</option> 
                                                <option value="masculin">Masculin</option>  
                                            </select> &nbsp;
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 

                <div> 
                    <label>
                        <input class="sel" type="radio" id="dis_ath" name = "choix" value="dis_ath"/>
                            Discipline d'un athl&egrave;te
                        <div class="invisible align">
                            <br>
                            <label>
                                <label class="important"> 
                                    Discipline  <br><br>
                                </label>
                                <?php
                                    $requete49="SELECT DISTINCT Nom_Discipline FROM Discipline";
                                    $result49=@mysqli_query($idcom,$requete49);
                                    if(!$result49){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nom :
                                        <select name=\"nom_discipline_ath\">";
                                        while($ligne=mysqli_fetch_array($result49,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    }
                                ?>
                                <?php
                                    $requete50="SELECT DISTINCT Record_Prec_Discipline FROM Discipline";
                                    $result50=@mysqli_query($idcom,$requete50);
                                    if(!$result50){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Ancien record :
                                        <select name=\"rec_dis_ath\">";
                                        while($ligne=mysqli_fetch_array($result50,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    }
                                ?>
                                <?php
                                    $requete51="SELECT DISTINCT Nom_Categorie FROM Categorie";
                                    $result51=@mysqli_query($idcom,$requete51);
                                    if(!$result51){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Categorie :
                                        <select name=\"categorie_dis_ath\">";
                                        while($ligne=mysqli_fetch_array($result51,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    }
                                ?>
                                Genre :                                         
                                    <select name="genre_discipline_ath"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> <br><br>

                                <label class="important"> 
                                    Athl&egrave;te <br><br>
                                </label>
                                Nom : <input type="texte"  maxlength = "30" name="nom_dis_ath"/>&nbsp;
                                Prenom : <input type="texte"  maxlength = "30"  name="prenom_dis_ath"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_dis_ath" max="2003-01-01"/>&nbsp;
                                <?php
                                    $requete52="SELECT DISTINCT Nationalite_Participant FROM Participant P, Athlete A WHERE P.ID_Participant = A.ID_Participant";
                                    $result52=@mysqli_query($idcom,$requete52);
                                    if(!$result52){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nationalit&eacute; :
                                        <select name=\"nationalite_dis_ath\">";
                                        while($ligne=mysqli_fetch_array($result52,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                Taille : <input type="texte" name="taille_dis_ath"/> <br><br>
                                Poids : <input type="texte" name="poids_dis_ath"/> &nbsp;
                                Genre :  
                                    <select name="genre_dis_ath"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option>  
                                    </select> &nbsp;
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 


                <div> 
                    <label>
                        <input class="sel" type="radio" id="eq_ath" name = "choix" value="eq_ath"/>
                            Equipe d'un athl&egrave;te
                        <div class="invisible align">
                            <br>
                            <label>
                                <label class="important"> 
                                    Equipe <br><br>
                                </label>
                                <?php
                                    $requete53="SELECT DISTINCT Nom_Equipe FROM Equipe";
                                    $result53=@mysqli_query($idcom,$requete53);
                                    if(!$result53){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nom :
                                        <select name=\"nom_equipe_ath\">";
                                        while($ligne=mysqli_fetch_array($result53,MYSQL_NUM)){
                                            echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                Nom de l'entraineur de l'&eacute;quipe : <input type="texte"  maxlength = "30" name="nom_entraineur_eq_ath"/>&nbsp;
                                Pr&eacute;nom de l'entraineur de l'&eacute;quipe : <input type="texte"  maxlength = "30" name="prenom_entraineur_eq_ath"/><br><br>

                                <label class="important"> 
                                    Athl&egrave;te <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_eq_ath"/>&nbsp;
                                Prenom : <input type="texte" maxlength = "30" name="prenom_eq_ath"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_eq_ath" max="2003-01-01"/>&nbsp;
                                <?php
                                    $requete54="SELECT DISTINCT Nationalite_Participant FROM Participant P, Athlete A WHERE P.ID_Participant = A.ID_Participant";
                                    $result54=@mysqli_query($idcom,$requete54);
                                    if(!$result54){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "Nationalit&eacute; :
                                        <select name=\"nationalite_eq_ath\">";
                                        while($ligne=mysqli_fetch_array($result54,MYSQL_NUM)){
                                                echo "<option value=\"$ligne[0]\">$ligne[0]</option>";
                                        }
                                        echo "</select>&nbsp;";
                                    
                                    }
                                ?>
                                Taille : <input type="texte" name="taille_eq_ath"/> <br><br>
                                Poids : <input type="texte" name="poids_eq_ath"/> &nbsp;
                                Genre :  
                                    <select name="genre_eq_ath"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option>  
                                    </select> &nbsp;
                                Place dans l'&eacute;quipe <select name="place_eq_ath">
                                    <option value="Titulaire">Titulaire</option> 
                                    <option value="Rempla&ccedil;ant">Rempla&ccedil;ant</option>  
                                </select> &nbsp;
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 



                <div class="align">
                    <div>
                        Op&eacute;rations sur les tables : 
                        <input class="button_m" type="submit" name="modifier" value="Modification" /> 
                    </div>
                    <?php
                        if(isset ($_POST["modifier"])){
                            header("Location: resultat_modifier.php");
                        }
                    ?>
                </div>
            </form>
		</body>
</html>