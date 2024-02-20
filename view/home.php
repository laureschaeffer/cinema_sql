<?php ob_start() ; //temporisation de sortie ?>

<section id="home-container">
    <div id="intro">
        <p>Cinéphile est un site web francophone culturel. Le site propose de découvrir, de noter et d'écrire des critiques d'œuvres culturelles appartenant aux domaines du cinéma.</p>
    </div>
    <form class="subscribe">
        <p>Inscrivez-vous à la newsletter</p>
        <div class="subscribe-btn">
            <input type="text" placeholder="Entrez votre adresse e-mail">
            <button>Valider</button>
        </div>
    </form>
    <div id="coup-de-coeur">
        <h4>Notre coup de coeur</h4>
        <div class="card-movie">
            <div class="card-header">
                <figure><img src="public/img/affiches/winterbreak.webp" alt="affiche film winter break"></figure>
                <p><span class="titre-movie">Winter Break, </span>4,1/5</p>
                <p class="date-movie">13 décembre 2023</p>
                <p>De <span class="real-movie">Alexander Payne</span></p>
            </div>
            <p class="resume">Un instructeur maussade d'une école préparatoire de la Nouvelle-Angleterre reste sur le campus pendant les vacances de Noël pour garder une poignée d'étudiants qui n'ont nulle part où aller.</p>
        </div>
    </div>
    <div id="parallax">
        <!-- ici background img  -->
    </div>
</section>
<section id="sortie-recente">
    <h3>Sorties récentes</h3>
    <div class="card-movie">
        <div class="card-header">
            <figure><img src="public/img/affiches/laBete.jpg" alt="affiche film la bete"></figure>
            <p><span class="titre-movie">La bete, </span>3/5</p>
            <p class="date-movie">7 février 2024</p>
            <p>De <span class="real-movie">Bertrand Bonello</span></p>
        </div>
        <p class="resume">Dans un futur proche où règne l’intelligence artificielle, les émotions humaines sont devenues une menace. Pour s'en débarrasser, Gabrielle doit purifier son ADN en replongeant dans ses vies antérieures. Elle y retrouve Louis, son grand amour. Mais une peur l'envahit, le pressentiment qu'une catastrophe se prépare.</p>
    </div>
    <div class="card-movie">
        <div class="card-header">
            <figure><img src="public/img/affiches/greenBorder.jpg" alt="affiche film green border"></figure>
            <p><span class="titre-movie">Green Border, </span>3.3/5</p>
            <p class="date-movie">7 février 2024</p>
            <p>De <span class="real-movie">Agnieszka Holland</span></p>
        </div>
        <p class="resume">Ayant fui la guerre, une famille syrienne entreprend un éprouvant périple pour rejoindre la Suède. A la frontière entre le Belarus et la Pologne, synonyme d'entrée dans l'Europe, ils se retrouvent embourbés avec des dizaines d'autres familles, dans une zone marécageuse, à la merci de militaires aux méthodes violentes. </p>
    </div>
    
    <div class="card-movie">
        <div class="card-header">
            <figure><img src="public/img/affiches/daali.jpg" alt="affiche film Daaaaaali"></figure>
            <p><span class="titre-movie">DAAAAAALI !, </span>3.4/5</p>
            <p class="date-movie">7 février 2024</p>
            <p>De <span class="real-movie">Quentin Dupieux</span></p>
        </div>
        <p class="resume">Une journaliste française rencontre Salvador Dali à plusieurs reprises pour un projet de documentaire.</p>
    </div>

</section>
<section id="citations">
    <div class="card-citation">
        <p class="citation">Le cinéma, c'est un oeil ouvert sur le monde.</p>
        <p class="citation-auteur">-Joseph Bédier</p>
    </div>
    <div class="card-citation">
        <p class="citation">Le cinéma est le lieu du réel et de la vie.</p>
        <p class="citation-auteur">-Patrice Chéreau</p>
    </div>
    <div class="card-citation">
        <p class="citation">Le cinéma, ce n'est pas une reproduction de la réalité, c'est un oubli de la réalité. Mais on si enregistre cet oubli, on peut alors se souvenir et peut-être parvenir au réel.</p>
        <p class="citation-auteur">-Jean-Luc Godard</p>
    </div>
</section>
<section id="acteurs-moment">
    <h3>TOP Acteurs du moment</h3>
    <div class="card-acteur">
        <!-- 4 acteurs précisés dans la requete du controleur  -->
        <?php foreach($requeteHomeActeur->fetchAll() as $acteur){ ?>
            <img src="<?=$acteur["photo"]?>" alt="photo de l'acteur">
            <h3><?= $acteur["acteur"] ?></h3>
            <p><?=$acteur["biographie"]?> </p>
            <?php
               }
               ?>
    </div>
</section>



<?php
$titre= "Page d'accueil";
$titre_secondaire = "Cinéphile";
$contenu = ob_get_clean();

require_once "view/template.php";