<?php
// fichier qui crée les fonctions pour la table realisateur, en lien avec les boucles dans les fichiers "view" correspondantes; les méthodes sont appelées dans l'index
namespace Controller;
use Model\Connect;

class RealController{
    // liste de tous les reals
    public function listReals(){
        $pdo = Connect::seConnecter();
        $requeteLsReal = $pdo->query(
            "SELECT CONCAT(p.prenom, ' ', p.nom) AS nomReal, DATE_FORMAT(date_naissance, '%d/%m/%Y') AS date_naissance, r.id_realisateur, p.photo
            FROM realisateur r
            INNER JOIN personne p ON r.id_personne = p.id_personne
            ORDER BY nomReal"
        );
    

        require "view/personnes/listeReals.php";
    }

    // detail d'un real
    public function detailReal($id){
        $pdo = Connect::seConnecter();
        $requeteReal = $pdo->prepare("SELECT CONCAT(p.prenom, ' ', p.nom) AS nomReal, DATE_FORMAT(date_naissance, '%d/%m/%Y') AS date_naissance, p.photo, p.biographie, p.sexe, r.id_realisateur
        FROM realisateur r
        INNER JOIN personne p ON r.id_personne = p.id_personne
        WHERE id_realisateur = :id");
        $requeteReal->execute(["id" => $id]);

        // deuxième requete pour afficher la filmographie
        $realFilmographie = $pdo->prepare("SELECT f.titre, f.annee_sortie_fr, f.id_film  
        FROM film f
        INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
        INNER JOIN personne p ON r.id_personne = p.id_personne
        WHERE r.id_realisateur = :id");
        $realFilmographie->execute(["id"=> $id]);

        require "view/personnes/detailReal.php";
    }

    // fonctions ajout real

}