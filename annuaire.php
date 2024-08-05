<?php
    include("session_connex.php");
    include("connex.inc.php");
    $idcom=connex("ele","myparam");
    $identifiant=session_existe();

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="fichier.css" rel="stylesheet">
    <?php 
        include("header.php")
    ?>
	<title>
		Jeux olympiques 2024
	</title>
	</head>
		<body class ="fond3">
            <form method="post" action="ajouter.php"> 
                <div class='align'> 
                    <br>
                    Veillez selectionner une table pour voir les &eacute;l&eacute;ments  : <br><br>
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
                                <div class="invisible  ">
                                    <?php
                                    $requete="SELECT Nom_Participant, Prenom_Participant, Date_Naiss_Participant, Nationalite_Participant FROM Membre_CO M, Participant P WHERE M.ID_Participant = P.ID_Participant";
                                    $result=@mysqli_query($idcom,$requete);
                                    if(!$result){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Nom Membre</td><td> Prenom Membre</td><td> Date de naissance Membre</td><td> Nationalite Membre</td></tr>";
                                        while($ligne=mysqli_fetch_array($result,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                    ?>
                                </div>
                            </label>
                            <br>
                            &nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="sel" type="radio" id="athlete" name = "type_p" value="athlete"/>
                                Athl&egrave;te 
                                <div class="invisible  ">
                                    <?php
                                        $requete1="SELECT P.Nom_Participant, P.Prenom_Participant, P.Date_Naiss_Participant, P.Nationalite_Participant, Taille_Athlete, Poids_Athlete, Genre_Athlete, P1.Nom_Participant, P1.Prenom_Participant FROM Athlete A, Entraineur E, Participant P, Participant P1 WHERE A.ID_Participant = P.ID_Participant AND E.ID_Participant = P1.ID_Participant AND A.ID_Entraineur = E.ID_Entraineur";
                                        $result1=@mysqli_query($idcom,$requete1);
                                        if(!$result1){
                                            echo "Erreur de connexion a la base de donn&eacute;e";
                                        }
                                        else {
                                            echo "<table border = '1' >";
                                            echo "<tr><td>Nom Athlete </td><td> Prenom Athlete </td><td> Date de naissance Athlete </td><td> Nationalite Athlete </td><td> Taille de l'Athlete </td><td> Poids de l'Athlete </td><td> Genre de l'Athlete </td><td> Nom de l'entraineur </td><td> Prenom de l'entraineur</td></tr>";
                                            while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                                echo "<tr>";
                                                foreach($ligne as $comp){
                                                    echo "<td>".$comp."</td>";
                                                }
                                                echo "</tr>";
                                            }
                                            echo "</table>";
                                        }
                                    ?>
                                </div>
                            </label>
                            <br>
                            &nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="sel" type="radio" id="personnel" name = "type_p" value="personnel"/>
                                Personnel
                                <div class="invisible  ">
                                    <br>
                                    <?php
                                    $requete1="SELECT Nom_Participant, Prenom_Participant, Nationalite_Participant, Date_Naiss_Participant, Ville_Personnel, Role_Personnel FROM Personnel PER, Participant P WHERE PER.ID_Participant = P.ID_Participant ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Nom du Personnel </td><td> Prenom du Personnel </td><td> Nationalite du Personnel </td><td> Date de naissance du Personnel </td><td> Ville du Personnel </td><td> Role du Personnel</td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                    ?>
                                </div>
                            </label>
                            <br>
                            &nbsp;&nbsp;&nbsp;
                            <label>
                                <input class="sel" type="radio" id="entraineur" name = "type_p" value="entraineur"/>
                                Entra&icirc;neur 
                                <div class="invisible  ">
                                    <br>
                                    <?php
                                    $requete1="SELECT Nom_Participant, Prenom_Participant, Nationalite_Participant, Date_Naiss_Participant, Diplome_Entraineur FROM Entraineur E , Participant P WHERE E.ID_Participant = P.ID_Participant ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Nom de l'Entraineur </td><td> Prenom de l'Entraineur </td><td> Nationalite de l'Entraineur </td><td> Date de naissance de l'Entraineur </td><td> Diplome de l'Entraineur</td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
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
                        <div class="invisible  ">
                            <br>
                            <?php
                                    $requete1="SELECT Nom_Equipe, Nom_Participant, Prenom_Participant FROM Equipe E, Entraineur EN, Participant P WHERE EN.ID_Participant = P.ID_Participant AND EN.ID_Entraineur = E.ID_Entraineur";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Nom de l'Equipe</td><td> Nom de l'Entraineur </td><td> Prenom de l'Entraineur </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                    ?>
                        </div> 
                        <br><br>
                    </label>
                </div>

                <div> 
                    <label>
                        <input class="sel" type="radio" id="chambre" name = "choix" value="chambre"/>
                        Chambre
                        <div class="invisible   ">
                            <br>
                            <label>
                            <?php
                                    $requete1="SELECT * FROM Chambre ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Numero de chambre </td><td> Batiment de la chambre </td><td> Ville de la chambre </td><td> Nombre de lits </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
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
                        <div class="invisible   ">
                            <br>
                            <?php
                                    $requete1="SELECT Nom_Categorie, Genre_Categorie FROM Categorie";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Nom de la Categorie </td><td> Genre de la Categorie </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                    ?>
                        </div> 
                        <br><br>
                    </label>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="discipline" name = "choix" value="discipline"/>
                        Discipline
                        <div class="invisible  ">
                            <br>
                            <?php
                                    $requete1="SELECT Nom_Discipline, Record_Prec_Discipline, Genre_Categorie FROM Categorie CAT, Discipline D WHERE D.ID_Categorie = CAT.ID_Categorie";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Nom de la Discipline </td><td> Record de la Discipline </td><td> Genre de la Discipline </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                    ?>
                        </div> 
                        <br><br>
                    </label>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="competition" name = "choix" value="competition"/>
                        Comp&eacute;tition
                        <div class="invisible  ">
                            <br>
                            <?php
                                    $requete1="SELECT Niveau_Competition, Date_Competition, Horaire_Competition, Ville_Competition, Nom_Discipline, Genre_Categorie FROM Categorie CAT, Competition C, Discipline D WHERE D.ID_Discipline = C.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Niveau de la Competition </td><td> Date de la Competition </td><td> Horaire de la Competition </td><td> Ville de la Competition </td><td> Nom de la Discipline </td><td> Genre de la Discipline </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                    ?>
                        </div> 
                        <br><br>
                    </label>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="palmares" name = "choix" value="palmares"/>
                        Palmar&egrave;s
                        <div class="invisible  ">
                            <br>
                            <?php
                                    $requete1="SELECT Medaille_Palmares, Resultat_Palmares, Date_Palmares FROM Palmares ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Medaille du Palmares </td><td> Resultat du Palmares </td><td> Date du Palmares </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                ?>
                        </div> 
                        <br><br>
                    </label>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="cat_per" name = "choix" value="cat_per"/>
                        Cat&eacute;gorie d'un personnel
                        <div class="invisible  ">
                            <br>
                            <label>
                                <label class="important"> 
                                <?php
                                    $requete1="SELECT Nom_Categorie, Genre_Categorie, Nom_Participant, Prenom_Participant, Nationalite_Participant, Date_Naiss_Participant, Ville_Personnel, Role_Personnel FROM Categorie C, specialise_c S, Personnel PER, Participant P WHERE S.ID_Categorie = C.ID_Categorie AND S.ID_Personnel = PER.ID_Personnel AND PER.ID_Participant = P.ID_Participant ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Nom de la Categorie </td><td> Genre de la Categorie </td><td> Nom du Personnel </td><td> Prenom du Personnel </td><td> Nationalite du Personnel </td><td> Date de naissance du Personnel </td><td> Ville du Personnel </td><td> Role du Personnel </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                ?>
                                </label>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 
                
                <div> 
                    <label>
                        <input class="sel" type="radio" id="comp_per" name = "choix" value="comp_per"/>
                        Comp&eacute;tition d'un personnel
                        <div class="invisible  ">
                            <br>
                            <label>
                            <?php
                                    $requete1="SELECT Niveau_Competition, Date_Competition, Horaire_Competition, Ville_Competition, Nom_Discipline, Genre_Categorie, Nom_Participant, Prenom_Participant, Nationalite_Participant, Date_Naiss_Participant, Ville_Personnel, Role_Personnel FROM Categorie CAT, Competition C, Discipline D, participe_P PAR, Personnel PER, Participant P WHERE PAR.ID_Competition = C.ID_Competition AND PAR.ID_Personnel = PER.ID_Personnel AND D.ID_Discipline = C.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie AND PER.ID_Participant = P.ID_Participant ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Niveau de la Competition </td><td> Date de la Competition </td><td> Horaire de la Competition </td><td> Ville de la Competition </td><td> Nom de la Discipline </td><td> Genre de la Discipline </td><td> Nom du Personnel </td><td> Prenom du Personnel </td><td> Nationalite du Personnel </td><td> Date de naissance du Personnel </td><td> Ville du Personnel </td><td> Role du Personnel </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
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
                        <div class="invisible  ">
                            <br>
                            <label>
                            <?php
                                    $requete1="SELECT Nom_Discipline, Record_Prec_Discipline, Genre_Categorie, Medaille_Palmares, Resultat_Palmares, Date_Palmares FROM Categorie CAT, Discipline D, depend_de DEP, Palmares P WHERE D.ID_Categorie = CAT.ID_Categorie AND DEP.ID_Palmares = P.ID_Palmares AND DEP.ID_Discipline = D.ID_Discipline ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Nom de la Discipline </td><td> Record de la Discipline </td><td> Genre de la Discipline </td><td> Medaille du Palmares </td><td> Resultat du Palmares </td><td> Date du Palmares </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                ?>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 

                <div> 
                    <label>
                        <input class="sel" type="radio" id="ch_p" name = "choix" value="ch_p"/>
                            Chambre du participant
                        <div class="invisible  ">
                            <br>
                            <label>
                            <?php
                                    $requete1="SELECT C.*, Date_Deb, Date_Fin, Nom_Participant, Prenom_Participant, Date_Naiss_Participant, Nationalite_Participant FROM Chambre C, constitue CO, Participant P WHERE C.ID_Chambre = CO.ID_Chambre AND CO.ID_Participant = P.ID_Participant AND CO.Batiment_Chambre = C.Batiment_Chambre AND CO.Ville_Chambre = C.Ville_Chambre ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Numero de chambre </td><td> Batiment de la chambre </td><td> Ville de la chambre </td><td> Nombre de lits </td><td> Date de debut de sejour </td><td> Date de fin de sejour </td><td> Nom du Participant </td><td> Prenom du Participant </td><td> Date de naissance du Participant </td><td> Nationalite du Participant </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
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
                        <div class="invisible  ">
                            <br>
                            <label>
                            <?php
                                    $requete1="SELECT Nom_Equipe, Nom_Participant, Prenom_Participant, Classement_Equipe, Niveau_Competition, Date_Competition, Horaire_Competition, Ville_Competition, Nom_Discipline, Genre_Categorie FROM joue J, Equipe E, Entraineur EN, Participant P, Categorie CAT, Competition C, Discipline D WHERE J.ID_Equipe = E.ID_Equipe AND J.ID_Competition = C.ID_Competition AND EN.ID_Participant = P.ID_Participant AND EN.ID_Entraineur = E.ID_Entraineur AND D.ID_Discipline = C.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td>Nom de l'Equipe</td><td> Nom de l'Entraineur </td><td> Prenom de l'Entraineur </td><td> Classement de l'Equipe </td><td> Niveau de la Competition </td><td> Date de la Competition </td><td> Horaire de la Competition </td><td> Ville de la Competition </td><td> Nom de la Discipline </td><td> Genre de la Discipline  </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                ?>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 

                <div> 
                    <label>
                        <input class="sel" type="radio" id="comp_ath" name = "choix" value="comp_ath"/>
                            Comp&eacute;tition d'un athl&egrave;te
                        <div class="invisible  ">
                            <br>
                            <label>
                            <?php
                                    $requete1="SELECT P.Nom_Participant, P.Prenom_Participant, P.Date_Naiss_Participant, P.Nationalite_Participant, Taille_Athlete, Poids_Athlete, Genre_Athlete, P1.Nom_Participant, P1.Prenom_Participant, Classement_Athlete, Niveau_Competition, Date_Competition, Horaire_Competition, Ville_Competition, Nom_Discipline, Genre_Categorie FROM Athlete A, Entraineur E, Participant P, Participant P1, Categorie CAT, Competition C, Discipline D, participe_a PAR WHERE PAR.ID_Athlete = A.ID_Athlete AND PAR.ID_Competition = C.ID_Competition AND D.ID_Discipline = C.ID_Discipline AND A.ID_Participant = P.ID_Participant AND E.ID_Participant = P1.ID_Participant AND A.ID_Entraineur = E.ID_Entraineur AND D.ID_Categorie = CAT.ID_Categorie ";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td> Nom Athlete </td><td> Prenom Athlete </td><td> Date de naissance Athlete </td><td> Nationalite Athlete </td><td> Taille de l'Athlete </td><td> Poids de l'Athlete </td><td> Genre de l'Athlete </td><td> Nom de l'entraineur </td><td> Prenom de l'entraineur </td><td> Classement de l'Athlete </td><td> Niveau de la Competition </td><td> Date de la Competition </td><td> Horaire de la Competition </td><td> Ville de la Competition </td><td> Nom de la Discipline </td><td> Genre de la Discipline  </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                ?>

                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 

                <div> 
                    <label>
                        <input class="sel" type="radio" id="palma_ath" name = "choix" value="palma_ath"/>
                            Palmar&egrave;s d'un athl&egrave;te
                        <div class="invisible  ">
                            <br>
                            <label>
                            <?php
                                    $requete1="SELECT P.Nom_Participant, P.Prenom_Participant, P.Date_Naiss_Participant, P.Nationalite_Participant, Taille_Athlete, Poids_Athlete, Genre_Athlete, P1.Nom_Participant, P1.Prenom_Participant, Medaille_Palmares, Resultat_Palmares, Date_Palmares FROM Palmares PALM, possede PO, Athlete A, Entraineur E, Participant P, Participant P1 WHERE PALM.ID_Palmares = PO.ID_Palmares AND PO.ID_Athlete = A.ID_Athlete AND A.ID_Participant = P.ID_Participant AND E.ID_Participant = P1.ID_Participant AND A.ID_Entraineur = E.ID_Entraineur";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td> Nom Athlete </td><td> Prenom Athlete </td><td> Date de naissance Athlete </td><td> Nationalite Athlete </td><td> Taille de l'Athlete </td><td> Poids de l'Athlete </td><td> Genre de l'Athlete </td><td> Nom de l'entraineur </td><td> Prenom de l'entraineur </td><td> Medaille du Palmares </td><td> Resultat du Palmares </td><td> Date du Palmares </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                ?>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 

                <div> 
                    <label>
                        <input class="sel" type="radio" id="dis_ath" name = "choix" value="dis_ath"/>
                            Discipline d'un athl&egrave;te
                        <div class="invisible  ">
                            <br>
                            <label>
                            <?php
                                    $requete1="SELECT P.Nom_Participant, P.Prenom_Participant, P.Date_Naiss_Participant, P.Nationalite_Participant, Taille_Athlete, Poids_Athlete, Genre_Athlete, P1.Nom_Participant, P1.Prenom_Participant, Nom_Discipline, Record_Prec_Discipline, Genre_Categorie FROM Athlete A, Entraineur E, Participant P, Participant P1, Categorie CAT, specialise_d SPE, Discipline D WHERE  SPE.ID_Discipline = D.ID_Discipline AND SPE.ID_Athlete = A.ID_Athlete AND A.ID_Participant = P.ID_Participant AND E.ID_Participant = P1.ID_Participant AND A.ID_Entraineur = E.ID_Entraineur AND D.ID_Categorie = CAT.ID_Categorie";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td> Nom Athlete </td><td> Prenom Athlete </td><td> Date de naissance Athlete </td><td> Nationalite Athlete </td><td> Taille de l'Athlete </td><td> Poids de l'Athlete </td><td> Genre de l'Athlete </td><td> Nom de l'entraineur </td><td> Prenom de l'entraineur </td><td> Nom de la Discipline </td><td> Record de la Discipline </td><td> Genre de la Discipline </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                ?>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 


                <div> 
                    <label>
                        <input class="sel" type="radio" id="eq_ath" name = "choix" value="eq_ath"/>
                            Equipe d'un athl&egrave;te
                        <div class="invisible  ">
                            <br>
                            <label>                            
                                <?php
                                    $requete1="SELECT P.Nom_Participant, P.Prenom_Participant, P.Date_Naiss_Participant, P.Nationalite_Participant, Taille_Athlete, Poids_Athlete, Genre_Athlete, P1.Nom_Participant, P1.Prenom_Participant, Nom_Equipe, P3.Nom_Participant, P3.Prenom_Participant, Position_Equipe FROM compose_e COM ,Equipe E, Entraineur EN, Participant P3, Athlete A, Entraineur EA, Participant P, Participant P1 WHERE COM.ID_Athlete = A.ID_Athlete AND E.ID_Equipe = COM.ID_Equipe AND A.ID_Participant = P.ID_Participant AND EA.ID_Participant = P1.ID_Participant AND A.ID_Entraineur = EA.ID_Entraineur AND EN.ID_Participant = P3.ID_Participant AND EN.ID_Entraineur = E.ID_Entraineur";
                                    $result1=@mysqli_query($idcom,$requete1);
                                    if(!$result1){
                                        echo "Erreur de connexion a la base de donn&eacute;e";
                                    }
                                    else {
                                        echo "<table border = '1' >";
                                        echo "<tr><td> Nom Athlete </td><td> Prenom Athlete </td><td> Date de naissance Athlete </td><td> Nationalite Athlete </td><td> Taille de l'Athlete </td><td> Poids de l'Athlete </td><td> Genre de l'Athlete </td><td> Nom de l'entraineur </td><td> Prenom de l'entraineur </td><td> Nom de l'Equipe</td><td> Nom de l'Entraineur </td><td> Prenom de l'Entraineur </td></tr>";
                                        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
                                            echo "<tr>";
                                            foreach($ligne as $comp){
                                                echo "<td>".$comp."</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    }
                                ?>
                            </label>
                        </div> 
                        <br><br>
                    </label>
                </div> 
            </form>
		</body>
</html>