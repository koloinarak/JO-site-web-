<?php
    include("session_connex.php");
    include("connex.inc.php");
    $idcom=connex("ele","myparam");
    $identifiant=session_existe();
    
    $nb = 0;
    $requete="SELECT count(*) FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant";
    $result=@mysqli_query($idcom,$requete);
    if(!$result){
        echo "Erreur de connexion a la base de donn&eacute;e";
    }
    else {
        while($ligne=mysqli_fetch_array($result,MYSQL_NUM)){
            $nb = $ligne[0] ;
        }
    }

    $nb_1 = 0;
    $requete1="SELECT count(DISTINCT Ville_Competition) FROM Competition";
    $result1=@mysqli_query($idcom,$requete1);
    if(!$result1){
        echo "Erreur de connexion a la base de donn&eacute;e";
    }
    else {
        while($ligne=mysqli_fetch_array($result1,MYSQL_NUM)){
            $nb_1 = $ligne[0] ;
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
		<body class ="fond">
            <form method="post" action="accueil.php"> 
            <br><br><br><br>
            <div> 
                <img class="pos1_m" width="650" src="accueil.jpg" alt="Accueil JO">
                <p class="p2 align"> 
                    Les jeux se rapprochent de plus en plus et la France se pr&eacute;pare au mieux pour ces Jeux Olympiques. <br>
                    Voici quelques informations cruciales.
                </p>
                <p class="p2 align"> 
                    Les jeux se d&eacute;rouleront du 27 juillet au 12 ao&ucirc;t 2024. <br>
                    Plusieurs milliards de t&eacute;l&eacute;spectateurs et 9.7 millions de spectateurs ! <br>
                    Il y aura <?php  echo " ".$nb." " ;  ?> athl&egrave;tes qui participeront &agrave; ces jeux.
                </p>
                <p class="p2 align">
                    <?php  echo " ".$nb_1." " ;  ?> sites de comp&eacute;tition :<br>
                    <?php
                        $requete2="SELECT DISTINCT Ville_Competition FROM Competition";
                        $result2=@mysqli_query($idcom,$requete2);
                        if(!$result2){
                            echo "Erreur de connexion a la base de donn&eacute;e";
                        }
                        else {
                            while($ligne=mysqli_fetch_array($result2,MYSQL_NUM)){
                                $ville = $ligne[0] ;
                                echo $ville." : ";
                                $requete3="SELECT DISTINCT Nom_Categorie FROM Categorie C, Discipline D, Competition COMP WHERE C.ID_Categorie = D.ID_Categorie AND COMP.ID_Discipline = D.ID_Discipline AND Ville_Competition = '$ville'";
                                $result3=@mysqli_query($idcom,$requete3);
                                if(!$result3){
                                    echo "Erreur de connexion a la base de donn&eacute;e";
                                }
                                else{
                                    $rows = mysqli_num_rows($result3);
                                    $nb_r = 0;
                                    while($ligne=mysqli_fetch_array($result3,MYSQL_NUM)){
                                        foreach($ligne as $comp){
                                            echo " ".$comp;
                                            $nb_r = $nb_r + 1;
                                            if($nb_r < $rows){
                                                echo " , ";
                                            }
                                        }
                                    }
                                    echo ";";
                                }
                                echo "<br>";
                            }
                        }
                    ?>
                </p>
            </div>
            </form>
		</body>
</html>