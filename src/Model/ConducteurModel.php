<?php

namespace App\Model;

// Import des classes
use App\Core\AbstractModel;

class ConducteurModel extends AbstractModel
{
    // Requête SQL pour récuperer tous les conducteurs
    function getAllConducteur()
    {
        $sql = 'SELECT id_conducteur, prenom, nom
                FROM conducteur';

        return $this->database->SelectAll($sql);
    }

    // Requête SQL pour insérer un conducteur dans la BDD
    function insertConducteur(string $prenom, string $nom)
    {
        $sql = 'INSERT INTO conducteur (prenom, nom)
                VALUES (?, ?)';

        $this->database->prepareAndExecuteQuery($sql, [$prenom, $nom]);
    }

    // Met à jour un conducteur
    function updateConducteur(string $prenom, string $nom, int $conducteurId)
    {
        $sql = 'UPDATE conducteur
                SET prenom = ?, nom = ?
                WHERE id_conducteur = ?';

        $this->database->prepareAndExecuteQuery($sql, [$prenom, $nom, $conducteurId]);
    }

    // Récupère un conducteur à partir de son id
    function getConducteurById(int $id)
    {
        $sql = 'SELECT id_conducteur, prenom, nom
                FROM conducteur
                WHERE id_conducteur = ?';

        return $this->database->selectOne($sql, [$id]);
    }

    // Supprime un conducteur à partir de son id
    function removeConducteur(int $conducteurId)
    {
        $sql = 'DELETE FROM conducteur
                WHERE id_conducteur = ?';

        $this->database->prepareAndExecuteQuery($sql, [$conducteurId]);
    }
}