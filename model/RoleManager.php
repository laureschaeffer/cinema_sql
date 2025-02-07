<?php
//fichier qui traite les requetes sql
namespace Model;

class RoleManager extends Manager{
    protected $tableName = "role";

    //liste des roles avec leur film et acteurs
    public function listRole($id){
        $pdo = Connect::seConnecter();
        $requeteRole = $pdo->prepare("SELECT f.id_film, f.titre, f.annee_sortie_fr, r.nom_personnage, CONCAT(p.prenom, ' ', p.nom) AS nomActeur, a.id_acteur
        FROM castings c
        INNER JOIN film f ON c.id_film = f.id_film
        INNER JOIN acteur a ON c.id_acteur = a.id_acteur
        INNER JOIN role r ON c.id_role = r.id_role
        INNER JOIN personne p ON a.id_personne = p.id_personne
        WHERE r.id_role = :id");
        $requeteRole->execute(["id"=> $id]);

        return $requeteRole->fetchAll();


    }

    //getters et setters
    public function getTableName()
    {
        return $this->tableName;
    }


    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }


}