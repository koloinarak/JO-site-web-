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
            <div>
                <div class='align'> 
                    <br>
                    Voici les r&eacute;sultats de votre recherche <br><br>
                </div> 
                <div class = "container">
					<?php
                        if(isset ($_POST["bouton"])){
                            if (!empty(trim($_POST['barre'])) && !empty($_POST['filtre'])) {
                                // Effectuer la recherche avec un filtre sur une seule table
                                $recherche = $_POST['barre'];
                                $filtre = $_POST['filtre'];
                                // Effectuer la recherche
                                $resultats_recherche = array();
                                    $recherche = mysqli_real_escape_string($idcom, $recherche);
                                    // Requête de recherche en fonction du filtre sélectionné
                                    switch ($filtre) {
                                        case "participant":
                                            $requete_recherche = "SELECT Nom_Participant, Prenom_Participant, Nationalite_Participant, Date_Naiss_Participant 
                                                                  FROM Participant 
                                                                  WHERE Nom_Participant LIKE '%$recherche%' 
                                                                  OR Prenom_Participant LIKE '%$recherche%' 
                                                                  OR Nationalite_Participant LIKE '%$recherche%'";
                                            break;
                                        case "equipe":
                                            $requete_recherche = "SELECT Nom_Equipe, Nom_Participant, Prenom_Participant 
                                                                  FROM Equipe E, Participant P, Entraineur EN 
                                                                  WHERE E.ID_Entraineur = EN.ID_Entraineur 
                                                                  AND EN.ID_Participant = P.ID_Participant 
                                                                  AND (Nom_Participant LIKE '$recherche%' OR Prenom_Participant LIKE '$recherche%' OR Nom_Equipe LIKE '$recherche%')";
                                            break;
                                        case "competition":
                                            $requete_recherche = "SELECT Niveau_Competition, Nom_Discipline, Genre_Categorie 
                                                                  FROM Competition C, Categorie CAT, Discipline D 
                                                                  WHERE C.ID_Discipline = D.ID_Discipline 
                                                                  AND D.ID_Categorie = CAT.ID_Categorie
                                                                  AND (Niveau_Competition LIKE '$recherche%' OR Nom_Discipline LIKE '$recherche%' OR Genre_Categorie LIKE '$recherche%')";
                                            break;
                                        default:
                                            // Gérer le cas par défaut ou une erreur
                                            break;
                                    }
                                    $result_recherche = @mysqli_query($idcom, $requete_recherche);
                                    if ($result_recherche && mysqli_num_rows($result_recherche) > 0) {
                                        while ($ligne = mysqli_fetch_array($result_recherche, MYSQL_NUM)) {
                                            $resultats_recherche[] = $ligne;
                                        }
                                    }
                                
                                // Afficher les résultats de la recherche
                                if (!empty(trim($resultats_recherche))) {
                                    echo "<table border='1'>";
                                    foreach ($resultats_recherche as $resultat) {
                                        echo "<tr>";
                                        foreach ($resultat as $num) {
                                            echo "<td>" . $num . "</td>";
                                        }
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "Aucun résultat trouvé pour la recherche.";
                                }
                            }
                            else if (!empty(trim($_POST['barre']))){
    
                                $recherche = $_POST['barre'];
                                    echo "<br>";
                                    $recherche = mysqli_real_escape_string($idcom, $recherche); 
                                
                                    // Première requête
                                    $requete_b1 = "SELECT Nom_Participant, Prenom_Participant, Nationalite_Participant, Date_Naiss_Participant 
                                                    FROM Participant 
                                                    WHERE Nom_Participant LIKE '$recherche%' OR Prenom_Participant LIKE '$recherche%' OR Nationalite_Participant LIKE '$recherche%'";
                                    $result_b1 = @mysqli_query($idcom, $requete_b1);
                                
                                    if (!$result_b1) {
                                        echo "Erreur de connexion à la base de données";
                                    } else {
                                        if (mysqli_num_rows($result_b1) > 0) {
                                            echo "<table border ='1'>";
                                            while ($ligne = mysqli_fetch_array($result_b1, MYSQL_NUM)) {
                                                echo "<tr>";
                                                foreach ($ligne as $num) {
                                                    echo "<td>".$num."</td>";
                                                }
                                                echo "</tr>";
                                            }
                                            echo "</table>";
                                        }
                                        else{
                                            // Deuxième requête
                                            $requete_b2 = "SELECT Nom_Equipe, Nom_Participant, Prenom_Participant 
                                                FROM Equipe E, Participant P, Entraineur EN 
                                                WHERE E.ID_Entraineur = EN.ID_Entraineur 
                                                AND EN.ID_Participant = P.ID_Participant 
                                                AND (Nom_Participant LIKE '$recherche%' OR Prenom_Participant LIKE '$recherche%' OR Nom_Equipe LIKE '$recherche%')";
                                            $result_b2 = @mysqli_query($idcom, $requete_b2);

                                            if (!$result_b2) {
                                                echo "Erreur de connexion à la base de données";
                                            } 
                                            else {
                                                if (mysqli_num_rows($result_b2) > 0) {
                                                    echo "<table border ='1'>";
                                                    while ($ligne = mysqli_fetch_array($result_b2, MYSQL_NUM)) {
                                                        echo "<tr>";
                                                        foreach ($ligne as $num) {
                                                            echo "<td>".$num."</td>";
                                                        }
                                                        echo "</tr>";
                                                    }
                                                echo "</table>";
                                                }
                                                else {
                                                    // Troisième requête
                                                    $requete_b3 = "SELECT Niveau_Competition, Nom_Discipline, Genre_Categorie 
                                                        FROM Competition C, Categorie CAT, Discipline D 
                                                        WHERE C.ID_Discipline = C.ID_Discipline 
                                                        AND D.ID_Categorie = CAT.ID_Categorie
                                                        AND (Niveau_Competition LIKE '$recherche%' OR Nom_Discipline LIKE '$recherche%' OR Genre_Categorie LIKE '$recherche%')";
                                                    $result_b3 = @mysqli_query($idcom, $requete_b3);
                
                                                    if (!$result_b3) {
                                                        echo "Erreur de connexion à la base de données";
                                                    } else {
                                                        if (mysqli_num_rows($result_b3) > 0) {
                                                            echo "<table border ='1'>";
                                                            while ($ligne = mysqli_fetch_array($result_b3, MYSQL_NUM)) {
                                                                echo "<tr>";
                                                                foreach ($ligne as $num) {
                                                                    echo "<td>".$num."</td>";
                                                                }
                                                                echo "</tr>";
                                                            }
                                                            echo "</table>";
                                                        }
                                                    }
                                                }
                                                
                                            }
                                        }
                                    }
                


                            }
                            else if (!empty(trim($_POST['filtre']))){
                                $selected_filter = $_POST['filtre'];
                                // Tableau pour stocker les colonnes sélectionnées
                                $selected_columns = array();

                                // Construction de la requête SQL en fonction des filtres sélectionnés
                                switch ($selected_filter) {
                                    case "participant":
                                        if (isset($_POST['nom_p'])) {
                                            $selected_columns[] = "Nom_Participant";
                                        }
                                        if (isset($_POST['prenom_p'])) {
                                            $selected_columns[] = "Prenom_Participant";
                                        }
                                        if (isset($_POST['nationalite_p'])) {
                                            $selected_columns[] = "Nationalite_Participant";
                                        }
                                        if (isset($_POST['date_p'])) {
                                            $selected_columns[] = "Date_Naiss_Participant";
                                        }
                                        $table = "Participant";
                                        break;
                                    case "equipe":
                                        if (isset($_POST['nom_e'])) {
                                            $selected_columns[] = "Nom_Equipe";
                                        }
                                        if (isset($_POST['nom_en'])) {
                                            $selected_columns[] = "Nom_Participant";
                                        }
                                        if (isset($_POST['pre_e'])) {
                                            $selected_columns[] = "Prenom_Participant";
                                        }
                                        $table = "Equipe E, Entraineur EN, Participant P WHERE  P.ID_Participant = EN.ID_Participant AND E.ID_Entraineur = EN.ID_Entraineur";
                                        break;
                                    case "competition":
                                        if (isset($_POST['niv_c'])) {
                                            $selected_columns[] = "Niveau_Competition";
                                        }
                                        if (isset($_POST['date_c'])) {
                                            $selected_columns[] = "Date_Competition";
                                        }
                                        if (isset($_POST['horaire_c'])) {
                                            $selected_columns[] = "Horaire_Competition";
                                        }
                                        if (isset($_POST['ville_c'])) {
                                            $selected_columns[] = "Ville_Competition";
                                        }
                                        if (isset($_POST['discipline_c'])) {
                                            $selected_columns[] = "Nom_Discipline";
                                        }
                                        if (isset($_POST['genre_c'])) {
                                            $selected_columns[] = "Genre_Categorie";
                                        }
                                        $table = "Competition C, Discipline D, Categorie CAT WHERE C.ID_Discipline = D.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie";
                                        break;
                                    default:
                                        break;
                                }
                            
                            
                                // Construction de la partie SELECT de la requête SQL
                                $select_part = implode(", ", $selected_columns);
                            
                                // Construction de la requête SQL complète
                                $requete_sql = "SELECT $select_part FROM $table";
                                $resultat_requete = @mysqli_query($idcom, $requete_sql);
                            
                                // Vérifier si la requête a réussi
                                if (!$resultat_requete) {
                                    echo "Erreur lors de l'exécution de la requête : " . mysqli_error($idcom);
                                } else {
                                    // Afficher les résultats
                                    if (mysqli_num_rows($resultat_requete) > 0) {
                                        echo "<table border='1'>";
                                        while ($ligne = mysqli_fetch_array($resultat_requete, MYSQL_NUM)) {
                                            echo "<tr>";
                                            foreach ($ligne as $num) {
                                                echo "<td>" . $num . "</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "Aucun résultat trouvé pour les critères sélectionnés.";
                                    }
                                }

                            }
                            else {
                                echo "<br><br> Aucun r&eacute;sultat pour cette recherche <br><br>";
                            }
                        }
                        

                    ?>
                </div>
			</div>

            </form>
		</body>
</html>