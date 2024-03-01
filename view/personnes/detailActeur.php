<?php ob_start(); // lien avec le fichier template.php ?>

        <section class="detail">
        <?php foreach($requeteActeur->fetchAll() as $acteur) { 
            //condition pour savoir comment accorder la phrase
            if($acteur["sexe"] =="femme"){
                $accord="née le ";
            } else {
                $accord="né le ";
            }
            ?>
            <div class="card-header">
                <figure><img src="<?=$acteur["photo"]?>" alt="photo de l'acteur"></figure>
                <div class="card-info">
                    <p><?= $acteur["nomActeur"].', '.$accord.$acteur["date_naissance"]?></p> 
                    <div class="filmographie">
                        <h4>Filmographie</h4>
                        <?php foreach($acteurFilmographie->fetchAll() as $filmo){
                        // liste de la filmographie avec un lien qui redirige vers le détail du film
                        ?> <ul>
                            <li>
                                <a href="index.php?action=detailFilm&id=<?=$filmo["id_film"]?>"> <?=$filmo["titre"] ?> </a> dans le rôle de <a href="index.php?action=listeRole&id=<?=$filmo["id_role"]?>"> <?=$filmo["nom_personnage"]?> </a>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
            <p><?=$acteur["biographie"]?></p>
    </section>

<?php  }
        }

$description="Page dédiée à l'acteur ".$acteur["nomActeur"].", contenant ses infos principales";
$titre= "Détail Acteur";
$titre_secondaire = $acteur["nomActeur"];
$contenu = ob_get_clean();

require_once "view/template.php";