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
}