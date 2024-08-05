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
            <form method="post" action="ajouter.php"> 
                <div class='align'> 
                    <br>
                    Veillez selectionner la table dans laquelle vous voulez ajouter un &eacute;l&eacute;ment : <br><br>
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
                                    Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_1"/><br><br>
                                    L'authorisation de donner un mot de passe n'est pas authoris&eacute;e. Le membre ajout&eacute; aura le mot de passe de base, pour qu'il puisse ensuite le modifier comme il le souhaite.
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
                                    Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_2"/> &nbsp;
                                    Taille : <input type="texte" name="taille_2"/> <br><br>
                                    Poids : <input type="texte" name="poids_2"/> &nbsp;
                                    Genre :  
                                        <select name="genre_athlete"> 
                                            <option value="f&eacute;minin">F&eacute;minin</option> 
                                            <option value="masculin">Masculin</option>  
                                        </select> &nbsp;
                                    Nom de l'entraineur de l'athl&egrave;te : <input type="texte" maxlength = "30" name="nom_entraineur_athlete"/>&nbsp;
                                    Pr&eacute;nom de l'entraineur de l'athl&egrave;te : <input type="texte" maxlength = "30" name="prenom_entraineur_athlete"/><br><br>
                                    <label class="important"> 
                                        Discipline de l'athl&egrave;te <br><br>
                                    </label>
                                    Nom : <input type="texte" maxlength = "30" name="nom_dis_2"/>&nbsp;
                                    Record : <input type="texte" maxlength = "30" name="rec_dis_2"/>&nbsp;
                                    Cat&eacute;gorie : <input type="texte" maxlength = "30" name="categorie_dis_2"/>&nbsp;
                                    Genre :                                         
                                        <select name="genre_discipline_2"> 
                                            <option value="f&eacute;minin">F&eacute;minin</option> 
                                            <option value="masculin">Masculin</option> 
                                            <option value="mixte">Mixte</option>  
                                        </select> <br><br>
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
                                    Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_3"/> &nbsp;
                                    Ville : <input type="texte" maxlength = "30" name="ville_3"/> &nbsp;
                                    R&ocirc;le : <input type="texte"  maxlength = "30" name="role_3"/> <br><br>
                                    <label class="important"> 
                                        Comp&eacute;tition du personnel <br><br>
                                    </label>
                                    Niveau : <input type="texte" maxlength = "30" name="niveau_comp_3"/>&nbsp;
                                    Date : <input type="date" name="date_comp_3" min="2024-07-27" max="2024-08-12" />&nbsp;
                                    Horaire du d&eacute;but : <input type="time" name="horaire_comp_3" min="08:00" max="21:00" /> &nbsp;
                                    Ville : <input type="texte" maxlength = "30" name="ville_comp_3"/>&nbsp; <br>
                                    Discipline : <input type="texte" maxlength = "30" name="nom_discipline_comp_3"/>&nbsp;
                                    Genre :                                         
                                        <select name="genre_comp_3"> 
                                            <option value="f&eacute;minin">F&eacute;minin</option> 
                                            <option value="masculin">Masculin</option> 
                                            <option value="mixte">Mixte</option>  
                                        </select> <br><br>
                                    <label class="important"> 
                                        Cat&eacute;gorie du personnel <br><br>
                                    </label>
                                    Nom : <input type="texte" maxlength = "30" name="nom_cat_3"/>&nbsp;
                                    Genre :                                         
                                        <select name="genre_cat_3"> 
                                            <option value="f&eacute;minin">F&eacute;minin</option> 
                                            <option value="masculin">Masculin</option> 
                                            <option value="mixte">Mixte</option>  
                                        </select>  <br><br>
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
                                    Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_4"/> &nbsp;
                                    Dipl&ocirc;me : <input type="texte" maxlength = "50" name="diplome_4"/>
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
                                Nom : <input type="texte" maxlength = "30" name="nom_equipe"/>&nbsp;
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
                                Num&eacute;ro de chambre : <input type="texte" name="numero_chambre"/>&nbsp;
                                B&acirc;timent : <input type="texte" maxlength = "10" name="batiment_chambre"/>&nbsp;
                                Ville : <input type="texte" maxlength = "30" name="ville_chambre"/>&nbsp;
                                Nombre de lits : <input type="texte" name="nombre_lit"/>
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
                                Nom : <input type="texte" maxlength = "30" name="nom_categorie"/>&nbsp;
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
                                Nom : <input type="texte" maxlength = "30" name="nom_discipline"/>&nbsp;
                                Record : <input type="texte" maxlength = "30" name="rec_discipline"/>&nbsp;
                                Cat&eacute;gorie : <input type="texte" maxlength = "30" name="categorie_nom"/>&nbsp;
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
                                Niveau : <input type="texte" maxlength = "30" name="niveau_compet"/>&nbsp;
                                Date : <input type="date" name="date_compet" min="2024-07-27" max="2024-08-12" />&nbsp;
                                Horaire du d&eacute;but : <input type="time" name="horaire_compet" min="08:00" max="21:00" /> &nbsp;
                                Ville : <input type="texte" maxlength = "30" name="ville_compet"/>&nbsp; <br>
                                Discipline : <input type="texte" maxlength = "30" name="nom_discipline_compet"/>&nbsp;
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
                                R&eacute;sultat : <input type="texte" maxlength = "30" name="resultat_palma"/>&nbsp;
                                Date du palmar&egrave;s : <input type="date" name="date_palma" min="2024-07-27" max="2024-08-12" /><br><br>
                                <label class="important"> 
                                    Discipline du palmar&egrave;s <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_dis_palma"/>&nbsp;
                                Record : <input type="texte" maxlength = "30" name="rec_dis_palma"/>&nbsp;
                                Cat&eacute;gorie : <input type="texte" maxlength = "30" name="categorie_dis_palma"/>&nbsp;
                                Genre :                                         
                                    <select name="genre_discipline_palma"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> <br><br>
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
                                Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_cat_per"/> &nbsp;
                                Ville : <input type="texte" maxlength = "30" name="ville_cat_per"/> &nbsp;
                                R&ocirc;le : <input type="texte" maxlength = "30" name="role_cat_per"/> &nbsp;
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
                                Niveau : <input type="texte" maxlength = "30" name="niveau_comp_per"/>&nbsp;
                                Date : <input type="date" name="date_comp_per" min="2024-07-27" max="2024-08-12" />&nbsp;
                                Horaire du d&eacute;but : <input type="time" name="horaire_comp_per" min="08:00" max="21:00" /> &nbsp;
                                Ville : <input type="texte" maxlength = "30" name="ville_comp_per"/>&nbsp; <br>
                                Discipline : <input type="texte" maxlength = "30" name="nom_discipline_comp_per"/>&nbsp;
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
                                Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_comp_per"/> &nbsp;
                                Ville : <input type="texte" maxlength = "30" name="ville_comp_per"/> &nbsp;
                                R&ocirc;le : <input type="texte" maxlength = "30" name="role_comp_per"/> &nbsp;
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
                                R&eacute;sultat : <input type="texte" maxlength = "30" name="resultat_palma_dis"/>&nbsp;
                                Date du palmar&egrave;s : <input type="date" name="date_palma_dis" min="2024-07-27" max="2024-08-12" />&nbsp;
                                 <br><br>

                                <label class="important"> 
                                    Discipline <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_palma_dis"/>&nbsp;
                                Record : <input type="texte" maxlength = "30" name="rec_palma_dis"/>&nbsp;
                                Cat&eacute;gorie : <input type="texte" maxlength = "30" name="categorie_palma_dis"/>&nbsp;
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
                                Num&eacute;ro de chambre : <input type="texte" name="numero_ch_p"/>&nbsp;
                                B&acirc;timent : <input type="texte" maxlength = "10" name="batiment_ch_p"/>&nbsp;
                                Ville : <input type="texte" maxlength = "30" name="ville_ch_p"/>&nbsp;
                                Date de d&eacute;but du s&eacute;jour : <input type="date" name="date_deb_ch_p" min="2024-07-10" max="2024-08-17" />&nbsp;
                                Date de fin du s&eacute;jour : <input type="date" name="date_fin_ch_p" min="2024-07-10" max="2024-08-17" />&nbsp;
                                Nombre de lits : <input type="texte" name="nombre_ch_p"/><br><br>

                                <label class="important"> 
                                    Participant <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_ch_p"/>&nbsp;
                                Prenom : <input type="texte" maxlength = "30" name="prenom_ch_p"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_ch_p" max="2003-01-01"/>&nbsp;
                                Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_ch_p"/>
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
                                Niveau : <input type="texte" maxlength = "30" name="niveau_comp_eq"/>&nbsp;
                                Date : <input type="date" name="date_comp_eq" min="2024-07-27" max="2024-08-12" />&nbsp;
                                Horaire du d&eacute;but : <input type="time" name="horaire_comp_eq" min="08:00" max="21:00" /> &nbsp;
                                Ville : <input type="texte" maxlength = "30" name="ville_comp_eq"/>&nbsp; <br>
                                Discipline : <input type="texte" maxlength = "30" name="nom_discipline_comp_eq"/>&nbsp;
                                Genre :                                         
                                    <select name="genre_comp_eq"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> <br><br>

                                <label class="important"> 
                                    Equipe <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_comp_eq"/>&nbsp;
                                Nom de l'entraineur de l'&eacute;quipe : <input type="texte" maxlength = "30" name="nom_entraineur_comp_eq"/>&nbsp;
                                Pr&eacute;nom de l'entraineur de l'&eacute;quipe : <input type="texte" maxlength = "30" name="prenom_entraineur_comp_eq"/> &nbsp;
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
                                Niveau : <input type="texte" maxlength = "30" name="niveau_comp_ath"/>&nbsp;
                                Date : <input type="date" name="date_comp_ath" min="2024-07-27" max="2024-08-12" />&nbsp;
                                Horaire du d&eacute;but : <input type="time" name="horaire_comp_ath" min="08:00" max="21:00" /> &nbsp;
                                Ville : <input type="texte" maxlength = "30" name="ville_comp_ath"/>&nbsp; <br>
                                Discipline : <input type="texte" maxlength = "30" name="nom_discipline_comp_ath"/>&nbsp;
                                Genre :                                         
                                    <select name="genre_comp_ath"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> <br><br>

                                <label class="important"> 
                                    Athl&egrave;te <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_comp_ath"/>&nbsp;
                                Prenom : <input type="texte"  maxlength = "30" name="prenom_comp_ath"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_comp_ath" max="2003-01-01"/>&nbsp;
                                Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_comp_ath"/> &nbsp;
                                Taille : <input type="texte" name="taille_comp_ath"/> <br><br>
                                Poids : <input type="texte" name="poids_comp_ath"/> &nbsp;
                                Genre :  
                                    <select name="genre_compet_ath"> 
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
                                        <option value="Or">Or</option> 
                                        <option value="Argent">Argent</option> 
                                        <option value="Bronze">Bronze</option>  
                                    </select>&nbsp;
                                R&eacute;sultat : <input type="texte" maxlength = "30" name="resultat_palma_ath"/>&nbsp;
                                Date du palmar&egrave;s : <input type="date" name="date_palma_ath" min="2024-07-27" max="2024-08-12" />&nbsp;
                                <br><br>

                                <label class="important"> 
                                    Athl&egrave;te <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_palma_ath"/>&nbsp;
                                Prenom : <input type="texte" maxlength = "30" name="prenom_palma_ath"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_palma_ath" max="2003-01-01"/>&nbsp;
                                Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_palma_ath"/> &nbsp;
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
                                Nom : <input type="texte" maxlength = "30" name="nom_discipline_ath"/>&nbsp;
                                Record : <input type="texte" maxlength = "30" name="rec_dis_ath"/>&nbsp;
                                Cat&eacute;gorie : <input type="texte" maxlength = "30" name="categorie_dis_ath"/>&nbsp;
                                Genre :                                         
                                    <select name="genre_discipline_ath"> 
                                        <option value="f&eacute;minin">F&eacute;minin</option> 
                                        <option value="masculin">Masculin</option> 
                                        <option value="mixte">Mixte</option>  
                                    </select> <br><br>

                                <label class="important"> 
                                    Athl&egrave;te <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_dis_ath"/>&nbsp;
                                Prenom : <input type="texte" maxlength = "30" name="prenom_dis_ath"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_dis_ath" max="2003-01-01"/>&nbsp;
                                Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_dis_ath"/> &nbsp;
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

                                Nom : <input type="texte" maxlength = "30" name="nom_equipe_ath"/>&nbsp;
                                Nom de l'entraineur de l'&eacute;quipe : <input type="texte" maxlength = "30" name="nom_entraineur_eq_ath"/>&nbsp;
                                Pr&eacute;nom de l'entraineur de l'&eacute;quipe : <input type="texte" maxlength = "30" name="prenom_entraineur_eq_ath"/><br><br>

                                <label class="important"> 
                                    Athl&egrave;te <br><br>
                                </label>
                                Nom : <input type="texte" maxlength = "30" name="nom_eq_ath"/>&nbsp;
                                Prenom : <input type="texte" maxlength = "30" name="prenom_eq_ath"/>&nbsp;
                                Date de naissance : <input type="date" name="date_naiss_eq_ath" max="2003-01-01"/>&nbsp;
                                Nationalit&eacute; : <input type="texte" maxlength = "30" name="nationalite_eq_ath"/> &nbsp;
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
                        <input class="button_m" type="submit" name="ajouter" value="Ajout" /> 
                    </div>
                    <?php
                        $erreur=0;
                        $reussite=0;
                        $message = 0;
                        $res = "Aucune valeur";
                        $res_1 = "Aucune valeur";
                        $res_2 = "Aucune valeur";
                        $res_3 = "Aucune valeur";
                        if(isset ($_POST["ajouter"])){
                            if(!empty(trim($_POST["choix"]))){
                                $attribut=$_POST["choix"];
                                //participant
                                if($attribut == "participant"){ 
                                    if(!empty(trim($_POST["type_p"]))){
                                        $requete_1="SELECT MAX(ID_Participant) FROM Participant";
                                        $resultat_1=@mysqli_query($idcom,$requete_1);
                                        if(!$resultat_1){
                                            $erreur=3;
                                        }
                                        else{
                                            while($ligne=mysqli_fetch_array($resultat_1,MYSQL_NUM)){
                                                $id_p = $ligne[0] +1;
                                            }
                                        }
                                        $participant=$_POST["type_p"];
                                        if($participant == "membre"){
                                            if(!empty(trim($_POST["nom_1"])) && !empty(trim($_POST["prenom_1"])) && !empty(trim($_POST["date_naiss_1"])) && !empty(trim($_POST["nationalite_1"]))){
                                                $nom_1=mysqli_real_escape_string($idcom, $_POST["nom_1"]);
                                                $prenom_1=mysqli_real_escape_string($idcom, $_POST["prenom_1"]);
                                                $date_1=mysqli_real_escape_string($idcom, $_POST["date_naiss_1"]);
                                                $nationalite_1=mysqli_real_escape_string($idcom, $_POST["nationalite_1"]);

                                                $requete_m1="SELECT ID_Membre FROM Membre_CO M, Participant P WHERE P.ID_Participant = M.ID_Participant AND Nom_Participant ='$nom_1' AND Prenom_Participant = '$prenom_1' AND Date_Naiss_Participant ='$date_1' AND Nationalite_Participant = '$nationalite_1'";
                                                $resultat_m1=@mysqli_query($idcom,$requete_m1);
                                                if(!$resultat_m1){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_m1,MYSQL_NUM)){
                                                        $res = $ligne[0];
                                                    }
                                                    if($res == "Aucune valeur"){
                                                        $requete_m2="SELECT MAX(ID_Membre) FROM Membre_CO";
                                                        $resultat_m2=@mysqli_query($idcom,$requete_m2);
                                                        if(!$resultat_m2){
                                                            $erreur=3;
                                                        }
                                                        else{
                                                            while($ligne=mysqli_fetch_array($resultat_m2,MYSQL_NUM)){
                                                                $id_m = $ligne[0] +1;
                                                            }
                                                            $mdp=MD5("HelloToJO");
                                                            $requete_m3="INSERT INTO Participant Values ('$id_p', '$nom_1','$prenom_1','$date_1', '$nationalite_1')";
                                                            $requete_m4="INSERT INTO Membre_CO Values ('$id_m','$mdp', '$id_p')";
                                                            $resultat_m3=@mysqli_query($idcom,$requete_m3);
                                                            $resultat_m4=@mysqli_query($idcom,$requete_m4);
                                                            if(!$resultat_m3 && !$resultat_m4){
                                                                $erreur=3;
                                                            }
                                                            else{
                                                                $reussite = 1;
                                                            }
                                                        
                                                        }
                                                    }
                                                    else {
                                                        $erreur=4;
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

                                                if(!empty(trim($_POST["nom_dis_2"])) && !empty(trim($_POST["rec_dis_2"])) && !empty(trim($_POST["categorie_dis_2"])) && !empty(trim($_POST["genre_discipline_2"]))){
                                                    $nom_dis_2 = mysqli_real_escape_string($idcom, $_POST["nom_dis_2"]);
                                                    $rec_dis_2 = mysqli_real_escape_string($idcom, $_POST["rec_dis_2"]);
                                                    $categorie_dis_2 = mysqli_real_escape_string($idcom, $_POST["categorie_dis_2"]);
                                                    $genre_discipline_2 = mysqli_real_escape_string($idcom, $_POST["genre_discipline_2"]);

                                                    $requete_a1="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant = '$nom_2'
                                                        AND Prenom_Participant = '$prenom_2' AND Date_Naiss_Participant = '$date_2' AND Nationalite_Participant = '$nationalite_2'
                                                        AND Taille_Athlete = '$taille_2' AND Poids_Athlete = '$poids_2' AND Genre_Athlete = '$genre_2'";
                                                    $resultat_a1=@mysqli_query($idcom,$requete_a1);
                                                    if(!$resultat_a1){
                                                        $erreur=3;
                                                    }
                                                    else{
                                                        while($ligne=mysqli_fetch_array($resultat_a1,MYSQL_NUM)){
                                                            $res = $ligne[0];
                                                        }
                                                        if ($res == "Aucune valeur"){
                                                            $requete_a2="SELECT MAX(ID_Athlete) FROM Athlete";
                                                            $resultat_a2=@mysqli_query($idcom,$requete_a2);
                                                            $requete_a3="SELECT ID_Entraineur FROM Entraineur E, Participant P WHERE E.ID_Participant = P.ID_Participant AND Nom_Participant = '$nom_entraineur_athlete' AND Prenom_Participant ='$prenom_entraineur_athlete'";
                                                            $resultat_a3=@mysqli_query($idcom,$requete_a3);
                                                            $requete_a6="SELECT ID_Discipline FROM Discipline D, Categorie CAT WHERE CAT.ID_Categorie = D.ID_Categorie AND Nom_Categorie = '$categorie_dis_2' AND Genre_Categorie = '$genre_discipline_2' AND Nom_Discipline = '$nom_dis_2' AND Record_Discipline = '$rec_dis_2' ";
                                                            $resultat_a6=@mysqli_query($idcom,$requete_a6);
                                                            if(!$resultat_a2 && !$resultat_a3 && !$resultat_a6){
                                                                $erreur=3;
                                                            }
                                                            else {
                                                                while($ligne=mysqli_fetch_array($resultat_a2,MYSQL_NUM)){
                                                                    $res_1 = $ligne[0] + 1;
                                                                }
                                                                while($ligne=mysqli_fetch_array($resultat_a3,MYSQL_NUM)){
                                                                    $res_2 = $ligne[0];
                                                                }
                                                                while($ligne=mysqli_fetch_array($resultat_a6,MYSQL_NUM)){
                                                                    $res_3= $ligne[0];
                                                                }
                                                                if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                                                    echo "<br><br> <label class=\"erreur\"> L'entra&icirc;neur ou la discipline que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                                                }
                                                                else {
                                                                    $requete_a4="INSERT INTO Participant Values ('$id_p', '$nom_2','$prenom_2','$date_2', '$nationalite_2')";
                                                                    $resultat_a4=@mysqli_query($idcom,$requete_a4);
                                                                    $requete_a5="INSERT INTO Athlete Values ('$res_1','$taille_2', '$poids_2', '$genre_2', '$res_2', '$id_p')";
                                                                    $resultat_a5=@mysqli_query($idcom,$requete_a5);
                                                                    $requete_a7="INSERT INTO specialise_d Values ('$res_1','$res_3')";
                                                                    $resultat_a7=@mysqli_query($idcom,$requete_a7);
                                                                    if(!$resultat_a4 && !$resultat_a5 && !$resultat_a7){
                                                                        $erreur=3;
                                                                    }
                                                                    else {
                                                                        $reussite = 1;
                                                                    }
                                                                }
                                                            }

                                                        }
                                                        else {
                                                            $erreur = 4;
                                                        }

                                                    }
                                                }
                                                else{
                                                    $erreur = 2;
                                                }
                                            }
                                            else{
                                                $erreur=2;
                                            }
                                        }
                                        else if($participant == "personnel"){
                                            if(!empty(trim($_POST["nom_3"])) && !empty(trim($_POST["prenom_3"])) && !empty(trim($_POST["date_naiss_3"])) && !empty(trim($_POST["nationalite_3"])) && !empty(trim($_POST["ville_3"])) && !empty(trim($_POST["role_3"])) && !empty(trim($_POST["nom_categorie_3"])) && !empty(trim($_POST["niveau_compet_3"])) && !empty(trim($_POST["date_compet_3"])) && !empty(trim($_POST["horaire_compet_3"])) && !empty(trim($_POST["nom_discipline_compet_3"])) && !empty(trim($_POST["genre_3"]))){
                                                $nom_3=mysqli_real_escape_string($idcom, $_POST["nom_3"]);
                                                $prenom_3=mysqli_real_escape_string($idcom, $_POST["prenom_3"]);
                                                $date_naiss_3=mysqli_real_escape_string($idcom, $_POST["date_naiss_3"]);
                                                $nationalite_3=mysqli_real_escape_string($idcom, $_POST["nationalite_3"]);
                                                $ville_3=mysqli_real_escape_string($idcom, $_POST["ville_3"]);
                                                $role_3=mysqli_real_escape_string($idcom, $_POST["role_3"]);
                                                
                                                if(!empty(trim($_POST["nom_cat_3"])) && !empty(trim($_POST["genre_cat_3"])) && !empty(trim($_POST["niveau_comp_3"])) && !empty(trim($_POST["date_comp_3"])) && !empty(trim($_POST["horaire_comp_3"])) && !empty(trim($_POST["ville_comp_3"])) && !empty(trim($_POST["nom_discipline_comp_3"])) && !empty(trim($_POST["genre_comp_3"]))){
                                                    $nom_cat_3 = mysqli_real_escape_string($idcom, $_POST["nom_cat_3"]);
                                                    $genre_cat_3 = mysqli_real_escape_string($idcom, $_POST["genre_cat_3"]);
                                                    $niveau_comp_3 = mysqli_real_escape_string($idcom, $_POST["niveau_comp_3"]);
                                                    $date_comp_3 = mysqli_real_escape_string($idcom, $_POST["date_comp_3"]);
                                                    $horaire_comp_3 = mysqli_real_escape_string($idcom, $_POST["horaire_comp_3"]);
                                                    $ville_comp_3 = mysqli_real_escape_string($idcom, $_POST["ville_comp_3"]);
                                                    $nom_discipline_comp_3 = mysqli_real_escape_string($idcom, $_POST["nom_discipline_comp_3"]);
                                                    $genre_comp_3 = mysqli_real_escape_string($idcom, $_POST["genre_comp_3"]);
            
                                                    $requete_pers1="SELECT ID_Personnel FROM Personnel PERS, Participant P WHERE PERS.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_3'
                                                    AND Prenom_Participant = '$prenom_3' AND Date_Naiss_Participant ='$date_naiss_3' AND Nationalite_Participant = '$nationalite_3' AND Ville_Personnel = '$ville_3' AND Role_Personnel = '$role_3'";
                                                    $resultat_pers1=@mysqli_query($idcom,$requete_pers1);
                                                    if(!$resultat_pers1){
                                                        $erreur=3;
                                                    }
                                                    else {
                                                        while($ligne=mysqli_fetch_array($resultat_pers1,MYSQL_NUM)){
                                                            $res = $ligne[0];
                                                        }
                                                        if($res == "Aucune valeur"){
                                                            $requete_pers2="SELECT MAX(ID_Personnel) FROM Personnel";
                                                            $resultat_pers2=@mysqli_query($idcom,$requete_pers2);
                                                            $requete_pers5="SELECT ID_Categorie FROM Categorie WHERE Nom_Categorie ='$nom_cat_3' AND Genre_Categorie ='$genre_cat_3' ";
                                                            $resultat_pers5=@mysqli_query($idcom,$requete_pers5);
                                                            $requete_pers6="SELECT ID_Competition FROM Competition C, Categorie CAT, Discipline D WHERE 
                                                                C.ID_Discipline = D.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie AND
                                                                Genre_Categorie = '$genre_comp_3' AND Nom_Discipline = '$nom_discipline_comp_3' AND
                                                                Niveau_Competition = '$niveau_comp_3' AND Date_Competition = '$date_comp_3' AND Ville_Competition = '$ville_comp_3' AND Horaire_Competition = '0000-00-00'";
                                                            $resultat_pers6=@mysqli_query($idcom,$requete_pers6);
                                                            if(!$resultat_pers2 && !$resultat_pers5 && !$resultat_pers6){
                                                                $erreur=3;
                                                            }
                                                            else {
                                                                while($ligne=mysqli_fetch_array($resultat_pers2,MYSQL_NUM)){
                                                                    $res_1 = $ligne[0] + 1;
                                                                }
                                                                while($ligne=mysqli_fetch_array($resultat_pers5,MYSQL_NUM)){
                                                                    $res_2 = $ligne[0] ;
                                                                }
                                                                while($ligne=mysqli_fetch_array($resultat_pers6,MYSQL_NUM)){
                                                                    $res_3 = $ligne[0] ;
                                                                }
                                                                if($res_2 == "Aucune valeur" || $res_3 == "Aucune valeur"){
                                                                    echo "<br><br> <label class=\"erreur\"> La comp&eacute;tition ou la cat&eacute;gorie que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                                                }
                                                                else{
                                                                    $requete_pers3="INSERT INTO Participant Values ('$id_p', '$nom_3','$prenom_3','$date_naiss_3', '$nationalite_3')";
                                                                    $resultat_pers3=@mysqli_query($idcom,$requete_pers3);
                                                                    $requete_pers4="INSERT INTO Personnel Values ('$res_1','$ville_3', '$role_3', '$id_p')";
                                                                    $resultat_pers4=@mysqli_query($idcom,$requete_pers4);
                                                                    $requete_pers7="INSERT INTO specialise_c Values ('$res_1','$res_2')";
                                                                    $resultat_pers7=@mysqli_query($idcom,$requete_pers7);
                                                                    $requete_pers8="INSERT INTO participe_p Values ('$res_1','$res_3')";
                                                                    $resultat_pers8=@mysqli_query($idcom,$requete_pers8);
                                                                    if(!$resultat_pers3 && !$resultat_pers4 && !$resultat_pers7 && !$resultat_pers8){
                                                                        $erreur=3;
                                                                    }
                                                                    else{
                                                                        $reussite = 1;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        else {
                                                            $erreur=4;
                                                        }
                                                    }
                                                }
                                                else{
                                                    $erreur = 2;
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

                                                $requete_entr1="SELECT ID_Entraineur FROM Entraineur E, Participant P WHERE E.ID_Participant = P.ID_Participant 
                                                AND Nom_Participant ='$nom_4' AND Prenom_Participant = '$prenom_4' AND Date_Naiss_Participant ='$date_4' 
                                                AND Nationalite_Participant = '$nationalite_4' AND Diplome_Entraineur = '$diplome_4'";
                                                $resultat_entr1=@mysqli_query($idcom,$requete_entr1);
                                                if(!$resultat_entr1){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_entr1,MYSQL_NUM)){
                                                        $res = $ligne[0];
                                                    }
                                                    if($res == "Aucune valeur"){
                                                        $requete_entr2="SELECT MAX(ID_Entraineur) FROM Entraineur";
                                                        $resultat_entr2=@mysqli_query($idcom,$requete_entr2);
                                                        if(!$resultat_entr2){
                                                            $erreur=3;
                                                        }
                                                        else{
                                                            while($ligne=mysqli_fetch_array($resultat_entr2,MYSQL_NUM)){
                                                                $res_1 = $ligne[0] + 1;
                                                            }
                                                            $requete_entr3="INSERT INTO Participant Values ('$id_p', '$nom_4','$prenom_4','$date_4', '$nationalite_4')";
                                                            $resultat_entr3=@mysqli_query($idcom,$requete_entr3);
                                                            $requete_entr4="INSERT INTO Entraineur Values  ('$res_1','$diplome_4', '$id_p')";
                                                            $resultat_entr4=@mysqli_query($idcom,$requete_entr4);
                                                            if(!$resultat_entr3 && !$resultat_entr4){
                                                                $erreur=3;
                                                            }
                                                            else{
                                                                $reussite = 1;
                                                            }
                                                        
                                                        }
                                                    }
                                                    else {
                                                        $erreur=4;
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
                                    if(!empty(trim($_POST["nom_equipe"])) && !empty(trim($_POST["nom_entraineur_equipe"])) && !empty(trim($_POST["prenom_entraineur_equipe"])) ){
                                        $nom_e = mysqli_real_escape_string($idcom, $_POST["nom_equipe"]);
                                        $nom_entraineur_e = mysqli_real_escape_string($idcom, $_POST["nom_entraineur_equipe"]);
                                        $prenom_entraineur_e = mysqli_real_escape_string($idcom, $_POST["prenom_entraineur_equipe"]);

                                        $requete_e1="SELECT ID_Entraineur FROM Entraineur E, Participant P WHERE E.ID_Participant = P.ID_Participant AND Nom_Participant = '$nom_entraineur_e' AND Prenom_Participant = '$prenom_entraineur_e' ";
                                        $resultat_e1=@mysqli_query($idcom,$requete_e1);
                                        if(!$resultat_e1){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_e1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            if($res == "Aucune valeur"){
                                                echo "<br><br> <label class=\"erreur\"> L'entra&icirc;neur que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                            }
                                            else{
                                                $requete_e2="SELECT ID_Equipe FROM Equipe WHERE Nom_Equipe = '$nom_e' AND ID_Entraineur = '$res' ";
                                                $resultat_e2=@mysqli_query($idcom,$requete_e2);
                                                if(!$resultat_e2){
                                                    $erreur=3;
                                                }
                                                else{
                                                    while($ligne=mysqli_fetch_array($resultat_e2,MYSQL_NUM)){
                                                        $res_1 = $ligne[0];
                                                    }
                                                    if($res_1 == "Aucune valeur"){
                                                        $requete_e3="SELECT MAX(ID_Equipe) FROM Equipe ";
                                                        $resultat_e3=@mysqli_query($idcom,$requete_e3);
                                                        if(!$resultat_e3){
                                                            $erreur=3;
                                                        }
                                                        else{
                                                            while($ligne=mysqli_fetch_array($resultat_e3,MYSQL_NUM)){
                                                                $res_2 = $ligne[0] + 1;
                                                            }
                                                            $requete_e4="INSERT INTO Equipe VALUES ('$res_2', '$nom_e', '$res')";
                                                            $resultat_e4=@mysqli_query($idcom,$requete_e4);
                                                            if(!$resultat_e4){
                                                                $erreur=3;
                                                            }
                                                            else {
                                                                $reussite = 1;
                                                            }
                                                        }
                                                    }   
                                                    else {
                                                        $erreur = 4;
                                                    }
                                                }
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
                                            if($res == "Aucune valeur"){
                                                $requete_ch2="INSERT INTO Chambre VALUES ('$id_chambre', '$bat_chambre', '$ville_chambre', '$nb_lit_chambre')";
                                                $resultat_ch2=@mysqli_query($idcom,$requete_ch2);
                                                if(!$resultat_ch2){
                                                    $erreur=3;
                                                }
                                                else {
                                                    $reussite=1;
                                                }
                                            }
                                            else {
                                                $erreur=4;
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
                                                $requete_cat2="SELECT MAX(ID_Categorie) FROM Categorie";
                                                $resultat_cat2=@mysqli_query($idcom,$requete_cat2);
                                                if(!$resultat_cat2){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_cat2,MYSQL_NUM)){
                                                        $id_cat = $ligne[0] + 1;
                                                    }
    
                                                    $requete_cat3="INSERT INTO Categorie VALUES ('$id_cat', '$nom_cat', '$genre_cat')";
                                                    $resultat_cat3=@mysqli_query($idcom,$requete_cat3);
                                                    if(!$resultat_cat3){
                                                        $erreur=3;
                                                    }
                                                    else {
                                                        $reussite = 1;
                                                    }
                                                }
                                            }
                                            else{
                                                $erreur=4;
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
                                            if($res == "Aucune valeur"){
                                                $requete_d2="SELECT MAX(ID_Discipline) FROM Discipline";
                                                $resultat_d2=@mysqli_query($idcom,$requete_d2);
                                                $requete_d3="SELECT ID_Categorie FROM Categorie WHERE Nom_Categorie = '$nom_cat_d' AND Genre_Categorie ='$genre_d'";
                                                $resultat_d3=@mysqli_query($idcom,$requete_d3);
                                                if(!$resultat_d2 && !$resultat_d3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_d2,MYSQL_NUM)){
                                                        $id_d = $ligne[0] + 1;
                                                    }
                                                    while($ligne=mysqli_fetch_array($resultat_d3,MYSQL_NUM)){
                                                        $id_cat_d = $ligne[0];
                                                    }
    
                                                    $requete_d4="INSERT INTO Discipline VALUES ('$id_d', '$nom_d', '$rec_d', '$id_cat_d')";
                                                    $resultat_d4=@mysqli_query($idcom,$requete_d4);
                                                    if(!$resultat_d4){
                                                        $erreur=3;
                                                    }
                                                    else {
                                                        $reussite = 1;
                                                    }
                                                }
                                            }
                                            else{
                                                $erreur=4;
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


                                        $requete_compet1="SELECT ID_Competition FROM Competition C, Discipline D, Categorie CAT WHERE D.ID_Categorie = CAT.ID_Categorie AND C.ID_Discipline = D.ID_Discipline AND Nom_Discipline = '$discipline_c' AND Niveau_Competition ='$niveau_c' AND Genre_Categorie = '$genre_c' AND Date_Competition ='$date_c' AND Horaire_Competition ='0000-00-00' AND Ville_Competition ='$ville_c'";
                                        $resultat_compet1=@mysqli_query($idcom,$requete_compet1);
                                        if(!$resultat_compet1){
                                            $erreur=3;
                                        }
                                        else{
                                            while($ligne=mysqli_fetch_array($resultat_compet1,MYSQL_NUM)){
                                                $res= $ligne[0];
                                            }
                                            if($res == "Aucune valeur"){
                                                $requete_compet2="SELECT MAX(ID_Competition) FROM Competition";
                                                $resultat_compet2=@mysqli_query($idcom,$requete_compet2);
                                                $requete_compet3="SELECT ID_Discipline FROM Discipline D, Categorie C WHERE D.ID_Categorie = C.ID_Categorie AND Nom_Discipline = '$discipline_c' AND Genre_Categorie ='$genre_c'";
                                                $resultat_compet3=@mysqli_query($idcom,$requete_compet3);
                                                if(!$resultat_compet2 && !$resultat_compet3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    $id_compet_d = 0;
                                                    while($ligne=mysqli_fetch_array($resultat_compet2,MYSQL_NUM)){
                                                        $id_compet = $ligne[0] + 1;
                                                    }
                                                    while($ligne=mysqli_fetch_array($resultat_compet3,MYSQL_NUM)){
                                                        $id_compet_d = $ligne[0];
                                                    }
                                                    if($id_compet_d != 0){
                                                        $requete_compet4="INSERT INTO Competition VALUES ('$id_compet', '$niveau_c', '$date_c', '$horaire_c', '$ville_c', '$id_compet_d')";
                                                        $resultat_compet4=@mysqli_query($idcom,$requete_compet4);
                                                        if(!$resultat_compet4){
                                                            $erreur=3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                    }
                                                    else{
                                                        echo "<br><br> <label class=\"erreur\"> La discipline que vous avez renseign&eacute;e n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                                    }
                                                }
                                            }
                                            else{
                                                $erreur=4;
                                            }
                                        }
                                    }
                                    else {
                                        $erreur=2;
                                    }
                                }
                                else if($attribut == "palmares"){
                                    if(!empty(trim($_POST["medaille_palma"])) && !empty(trim($_POST["resultat_palma"])) && !empty(trim($_POST["date_palma"])) ){
                                        $medaille_palma = mysqli_real_escape_string($idcom, $_POST["medaille_palma"]);
                                        $resultat_palma = mysqli_real_escape_string($idcom, $_POST["resultat_palma"]);
                                        $date_palma = mysqli_real_escape_string($idcom, $_POST["date_palma"]);

                                        if(!empty(trim($_POST["nom_dis_palma"])) && !empty(trim($_POST["rec_dis_palma"])) && !empty(trim($_POST["categorie_dis_palma"])) && !empty(trim($_POST["genre_discipline_palma"]))){
                                            $nom_dis_palma = mysqli_real_escape_string($idcom, $_POST["nom_dis_palma"]);
                                            $rec_dis_palma = mysqli_real_escape_string($idcom, $_POST["rec_dis_palma"]);
                                            $categorie_dis_palma = mysqli_real_escape_string($idcom, $_POST["categorie_dis_palma"]);
                                            $genre_discipline_palma = mysqli_real_escape_string($idcom, $_POST["genre_discipline_palma"]);

                                            $requete_palma1="SELECT P.ID_Palmares FROM Palmares P, depend_de DEP, Discipline D, Categorie C WHERE D.ID_Categorie = C.ID_Categorie AND DEP.ID_Discipline = D.ID_Discipline AND DEP.ID_Palmares = P.ID_Palmares AND Nom_Discipline = '$discipline_palma' AND Genre_Categorie ='$genre_palma' AND Medaille_Palmares ='$medaille_palma' AND Resultat_Palmares ='$resultat_palma' AND Date_Palmares ='$date_palma'";
                                            $resultat_palma1=@mysqli_query($idcom,$requete_palma1);
                                            if(!$resultat_palma1){
                                                $erreur=3;
                                            }
                                            else{
                                                while($ligne=mysqli_fetch_array($resultat_palma1,MYSQL_NUM)){
                                                    $res= $ligne[0];
                                                }
                                                if($res == "Aucune valeur"){
                                                    $requete_palma2="SELECT MAX(ID_Palmares) FROM Palmares";
                                                    $resultat_palma2=@mysqli_query($idcom,$requete_palma2);
                                                    $requete_palma4="SELECT ID_Discipline FROM Discipline D, Categorie C WHERE D.ID_Categorie = C.ID_Categorie AND Nom_Discipline ='$nom_dis_palma' AND Record_Discipline ='$rec_dis_palma' AND Nom_Categorie ='$categorie_dis_palma' AND Genre_Categorie ='$genre_discipline_palma' ";
                                                    $resultat_palma4=@mysqli_query($idcom,$requete_palma4);
                                                    if(!$resultat_palma2 && !$resultat_palma4){
                                                        $erreur=3;
                                                    }
                                                    else {
                                                        while($ligne=mysqli_fetch_array($resultat_palma2,MYSQL_NUM)){
                                                            $res_1 = $ligne[0] + 1;
                                                        }
                                                        while($ligne=mysqli_fetch_array($resultat_palma4,MYSQL_NUM)){
                                                            $res_2 = $ligne[0] ;
                                                        }
                                                        $requete_palma3="INSERT INTO Palmares VALUES ('$res_1', '$medaille_palma', '$resultat_palma', '$date_palma')";
                                                        $resultat_palma3=@mysqli_query($idcom,$requete_palma3);
                                                        $requete_palma5="INSERT INTO depend_de VALUES ('$res_1', '$res_2')";
                                                        $resultat_palma5=@mysqli_query($idcom,$requete_palma5);
                                                        if(!$resultat_palma3 && !$resultat_palma5){
                                                            $erreur=3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                    }
                                                }
                                                else{
                                                    $erreur=4;
                                                }
                                            }
                                        }
                                        else{
                                            $erreur = 2;
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
                                                $res_1= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_cp2,MYSQL_NUM)){
                                                $res_2= $ligne[0];
                                            }
                                            if($res_1 == "Aucune valeur" || $res_2 == "Aucune valeur"){
                                                echo "<br><br> <label class=\"erreur\"> La cat&eacute;gorie ou le personnel que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                            }
                                            else {
                                                $requete_cp3="SELECT ID_Personnel FROM specialise_c WHERE ID_Personnel ='$res_2' AND ID_Categorie ='$res_1' ";
                                                $resultat_cp3=@mysqli_query($idcom,$requete_cp3);
                                                if(!$resultat_cp3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_cp3,MYSQL_NUM)){
                                                        $res_3= $ligne[0];
                                                    }
                                                    if ($res_3 == "Aucune valeur"){
                                                        $requete_cp4="INSERT INTO specialise_c VALUES ('$res_2', '$res_1') ";
                                                        $resultat_cp4=@mysqli_query($idcom,$requete_cp4);
                                                        if(!$resultat_cp4){
                                                            $erreur=3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                        
                                                    }
                                                    else {
                                                        $erreur =4;
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
                                                $res_1= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_cpers2,MYSQL_NUM)){
                                                $res_2= $ligne[0];
                                            }
                                            if($res_1 == "Aucune valeur" || $res_2 == "Aucune valeur"){
                                                echo "<br><br> <label class=\"erreur\"> La comp&eacute;tition ou le personnel que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                            }
                                            else {
                                                $requete_cpers3="SELECT ID_Personnel FROM participe_p WHERE ID_Personnel ='$res_2' AND ID_Competition ='$res_1' ";
                                                $resultat_cpers3=@mysqli_query($idcom,$requete_cpers3);
                                                if(!$resultat_cpers3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_cpers3,MYSQL_NUM)){
                                                        $res_3= $ligne[0];
                                                    }
                                                    if ($res_3 == "Aucune valeur"){
                                                        $requete_cpers4="INSERT INTO participe_p VALUES ('$res_2', '$res_1') ";
                                                        $resultat_cpers4=@mysqli_query($idcom,$requete_cpers4);
                                                        if(!$resultat_cpers4){
                                                            $erreur=3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                    }
                                                    else {
                                                        $erreur =4;
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
                                                $res_1= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_palmd2,MYSQL_NUM)){
                                                $res_2= $ligne[0];
                                            }
                                            if($res_1 == "Aucune valeur" || $res_2 == "Aucune valeur"){
                                                echo "<br><br> <label class=\"erreur\"> La palmar&egrave;s ou la discipline que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                            }
                                            else {
                                                $requete_palmd3="SELECT ID_Palmares FROM depend_de WHERE ID_Palmares ='$res_1' AND ID_Discipline ='$res_2' ";
                                                $resultat_palmd3=@mysqli_query($idcom,$requete_palmd3);
                                                if(!$resultat_palmd3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_palmd3,MYSQL_NUM)){
                                                        $res_3= $ligne[0];
                                                    }
                                                    if ($res_3 == "Aucune valeur"){
                                                        $requete_palmd4="INSERT INTO depend_de VALUES ('$res_1', '$res_2')";
                                                        $resultat_palmd4=@mysqli_query($idcom,$requete_palmd4);
                                                        if(!$resultat_palmd4){
                                                            $erreur=3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                    }
                                                    else {
                                                        $erreur = 4;
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
                                                $res_1= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_chp2,MYSQL_NUM)){
                                                $res_2= $ligne[0];
                                            }
                                            if($res_1 == "Aucune valeur" || $res_2 == "Aucune valeur"){
                                                echo "<br><br> <label class=\"erreur\"> Le participant ou la chambre que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                            }
                                            else {
                                                $requete_chp3="SELECT ID_Chambre FROM constitue WHERE ID_Chambre = '$res_1' AND Batiment_Chambre = '$batiment_ch_p' AND Ville_Chambre = '$ville_ch_p' AND ID_Participant ='$res_2' AND Date_Deb = '$date_deb_ch_p' AND Date_Fin = '$date_fin_ch_p' ";
                                                $resultat_chp3=@mysqli_query($idcom,$requete_chp3);
                                                if(!$resultat_chp3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_chp3,MYSQL_NUM)){
                                                        $res_3= $ligne[0];
                                                    }
                                                    if ($res_3 == "Aucune valeur"){
                                                        $requete_chp4="INSERT INTO constitue VALUES ('$res_2', '$res_1', '$batiment_ch_p' , '$ville_ch_p' , '$date_deb_ch_p' , '$date_fin_ch_p' ";
                                                        $resultat_chp4=@mysqli_query($idcom,$requete_chp4);
                                                        if(!$resultat_chp4){
                                                            $erreur=3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                    }
                                                    else {
                                                        $erreur = 4;
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
                                                $res_1= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_cpe2,MYSQL_NUM)){
                                                $res_2= $ligne[0];
                                            }
                                            if($res_1 == "Aucune valeur" || $res_2 == "Aucune valeur"){
                                                echo "<br><br> <label class=\"erreur\"> L'&eacute;quipe ou la comp&eacute;tition que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                            }
                                            else {
                                                $requete_cpe3="SELECT ID_Equipe FROM joue WHERE ID_Equipe = '$res_2' AND ID_Competition = '$res_1' ";
                                                $resultat_cpe3=@mysqli_query($idcom,$requete_cpe3);
                                                if(!$resultat_cpe3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_cpe3,MYSQL_NUM)){
                                                        $res_3= $ligne[0];
                                                    }
                                                    if ($res_3 == "Aucune valeur"){
                                                        $requete_cpe4="INSERT INTO joue VALUES ( '$res_2' , '$res_1', '$place_comp_eq') ";
                                                        $resultat_cpe4=@mysqli_query($idcom,$requete_cpe4);
                                                        if (!$resultat_cpe4){
                                                            $erreur = 3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                    }
                                                    else {
                                                        $erreur = 4;
                                                    }
                                                }
                                            }

                                        }

                                    }
                                }
                                else if($attribut == "comp_ath"){
                                    if(!empty(trim($_POST["niveau_comp_ath"])) && !empty(trim($_POST["date_comp_ath"])) && !empty(trim($_POST["horaire_comp_ath"]))  && !empty(trim($_POST["ville_comp_ath"]))  && !empty(trim($_POST["nom_discipline_comp_ath"])) && !empty(trim($_POST["genre_comp_ath"])) && !empty(trim($_POST["nom_comp_ath"])) && !empty(trim($_POST["prenom_comp_ath"])) && !empty(trim($_POST["date_naiss_comp_ath"])) && !empty(trim($_POST["nationalite_comp_ath"])) && !empty(trim($_POST["taille_comp_ath"])) && !empty(trim($_POST["poids_comp_ath"])) && !empty(trim($_POST["genre_compet_ath"])) && !empty(trim($_POST["place_comp_ath"]))){
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
                                        $genre_compet_ath = mysqli_real_escape_string($idcom, $_POST["genre_compet_ath"]);
                                        $place_comp_ath = mysqli_real_escape_string($idcom, $_POST["place_comp_ath"]);

                                        $requete_cpa1="SELECT ID_Competition FROM Competition C, Categorie CAT, Discipline D WHERE 
                                            C.ID_Discipline = D.ID_Discipline AND D.ID_Categorie = CAT.ID_Categorie AND
                                            Genre_Categorie = '$genre_comp_ath' AND Nom_Discipline = '$nom_discipline_comp_ath' AND
                                            Niveau_Competition = '$niveau_comp_ath' AND Date_Competition = '$date_comp_ath' AND Ville_Competition = '$ville_comp_ath' AND Horaire_Competition = '0000-00-00'";
                                        $resultat_cpa1=@mysqli_query($idcom,$requete_cpa1);
                                        $requete_cpa2="SELECT ID_Athlete FROM Athlete A, Participant P WHERE A.ID_Participant = P.ID_Participant AND Nom_Participant ='$nom_comp_ath' AND Prenom_Participant ='$prenom_comp_ath' AND Date_Naiss_Participant ='$date_naiss_comp_ath' AND Nationalite_Participant ='$nationalite_comp_ath' AND Taille_Athlete ='$taille_comp_ath' AND Poids_Athlete ='$poids_comp_ath' AND Genre_Athlete ='$genre_compet_ath' ";
                                        $resultat_cpa2=@mysqli_query($idcom,$requete_cpa2);
                                        if(!$resultat_cpa1 && !$resultat_cpa2){
                                            $erreur=3;
                                        }
                                        else {
                                            while($ligne=mysqli_fetch_array($resultat_cpa1,MYSQL_NUM)){
                                                $res_1= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_cpa2,MYSQL_NUM)){
                                                $res_2= $ligne[0];
                                            }
                                            if($res_1 == "Aucune valeur" || $res_2 == "Aucune valeur"){
                                                echo "<br><br> <label class=\"erreur\"> L'athl&egrave;te ou la comp&eacute;tition que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                            }
                                            else {
                                                $requete_cpa3="SELECT ID_Athlete FROM participe_a WHERE ID_Athlete = '$res_2' AND ID_Competition = '$res_1' ";
                                                $resultat_cpa3=@mysqli_query($idcom,$requete_cpa3);
                                                if(!$resultat_cpa3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_cpa3,MYSQL_NUM)){
                                                        $res_3= $ligne[0];
                                                    }
                                                    if ($res_3 == "Aucune valeur"){
                                                        $requete_cpa4="INSERT INTO participe_a VALUES ( '$res_2' , '$res_1', '$place_comp_ath') ";
                                                        $resultat_cpa4=@mysqli_query($idcom,$requete_cpa4);
                                                        if(!$resultat_cpa4){
                                                            $erreur=3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                    }
                                                    else {
                                                        $erreur = 4;
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
                                                $res_1= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_palmaa2,MYSQL_NUM)){
                                                $res_2= $ligne[0];
                                            }
                                            if($res_1 == "Aucune valeur" || $res_2 == "Aucune valeur"){
                                                echo "<br><br> <label class=\"erreur\"> L'athl&egrave;te ou le palmar&egrave;s que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                            }
                                            else {
                                                $requete_palmaa3="SELECT ID_Athlete FROM possede WHERE ID_Athlete = '$res_2' AND ID_Palmares = '$res_1' ";
                                                $resultat_palmaa3=@mysqli_query($idcom,$requete_palmaa3);
                                                if(!$resultat_palmaa3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_palmaa3,MYSQL_NUM)){
                                                        $res_3= $ligne[0];
                                                    }
                                                    if ($res_3 == "Aucune valeur"){
                                                        $requete_palmaa4="INSERT INTO possede VALUES ( '$res_2' , '$res_1' ";
                                                        $resultat_palmaa4=@mysqli_query($idcom,$requete_palmaa4);
                                                        if(!$resultat_palmaa4){
                                                            $erreur=3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                    }
                                                    else {
                                                        $erreur = 4;
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
                                                $res_1= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_disca2,MYSQL_NUM)){
                                                $res_2= $ligne[0];
                                            }
                                            if($res_1 == "Aucune valeur" || $res_2 == "Aucune valeur"){
                                                echo "<br><br> <label class=\"erreur\"> L'athl&egrave;te ou la discipline que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                            }
                                            else {
                                                $requete_disca3="SELECT ID_Athlete FROM specialise_d WHERE ID_Athlete = '$res_2' AND ID_Discipline = '$res_1' ";
                                                $resultat_disca3=@mysqli_query($idcom,$requete_disca3);
                                                if(!$resultat_disca3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_disca3,MYSQL_NUM)){
                                                        $res_3= $ligne[0];
                                                    }
                                                    if ($res_3 == "Aucune valeur"){
                                                        $requete_disca4="INSERT INTO specialise_d VALUES ( '$res_2' , '$res_1' ";
                                                        $resultat_disca4=@mysqli_query($idcom,$requete_disca4);
                                                        if(!$resultat_disca4){
                                                            $erreur=3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                    }
                                                    else {
                                                        $erreur = 4;
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
                                                $res_1= $ligne[0];
                                            }
                                            while($ligne=mysqli_fetch_array($resultat_eqa2,MYSQL_NUM)){
                                                $res_2= $ligne[0];
                                            }
                                            if($res_1 == "Aucune valeur" || $res_2 == "Aucune valeur"){
                                                echo "<br><br> <label class=\"erreur\"> L'athl&egrave;te ou l'&eacute;quipe que vous avez renseign&eacute; n'existe pas. L'ajout des &eacute;l&eacute;ments a &eacute;t&eacute; bloqu&eacute; </label>";
                                            }
                                            else {
                                                $requete_eqa3="SELECT ID_Athlete FROM compose_e WHERE ID_Athlete = '$res_2' AND ID_Equipe = '$res_1' ";
                                                $resultat_eqa3=@mysqli_query($idcom,$requete_eqa3);
                                                if(!$resultat_eqa3){
                                                    $erreur=3;
                                                }
                                                else {
                                                    while($ligne=mysqli_fetch_array($resultat_eqa3,MYSQL_NUM)){
                                                        $res_3= $ligne[0];
                                                    }
                                                    if ($res_3 == "Aucune valeur"){
                                                        $requete_eqa4="INSERT INTO compose_e VALUES ( '$res_2' , '$res_1' , '$place_eq_ath'";
                                                        $resultat_eqa4=@mysqli_query($idcom,$requete_eqa4);
                                                        if(!$resultat_eqa4){
                                                            $erreur=3;
                                                        }
                                                        else {
                                                            $reussite = 1;
                                                        }
                                                    }
                                                    else {
                                                        $erreur = 4;
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
                            echo "<br><br><label class=\"erreur\"> Vous n'avez pas s&eacute;l&eacute;ctionn&eacute; d'&eacute;l&eacute;ment. </label>";
                        }  
                        if($erreur == 2){
                            echo "<br><br><label class=\"erreur\"> Vous n'avez pas renseign&eacute; tous les champs. </label>";
                        } 
                        if($erreur == 3){
                            echo "<br><br><label class=\"erreur\"> Erreur de connexion &agrave; la base de donn&eacute;e. </label>";
                        } 
                        if($erreur == 4){
                            echo "<br><br><label class=\"erreur\"> Les &eacute;l&eacute;ments que vous essayez d'ajouter sont d&eacute;j&agrave; existants. </label>";
                        } 
                        if($reussite != 0){
                            echo "<br><br><label> L'insertion s'est bien pass&eacute;e. </label>";
                        } 
                    ?>
                </div>
            </form>
		</body>
</html>