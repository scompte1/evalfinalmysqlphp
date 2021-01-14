<?php

namespace App\Model;

// Import des classes
use App\Core\AbstractModel;

class VehiculeModel extends AbstractModel
{
    // Requête SQL pour récuperer tous les vehicules
    function getAllVehicule()
    {
        $sql = 'SELECT id_vehicule, marque, modele, couleur, immatriculation
                FROM vehicule';

        return $this->database->SelectAll($sql);
    }

    // Requête SQL pour insérer un vehicule dans la BDD
    function insertVehicule(string $marque, string $modele, string $couleur, string $immatriculation)
    {
        $sql = 'INSERT INTO vehicule (marque, modele, couleur, immatriculation)
                VALUES (?, ?, ?, ?)';

        $this->database->prepareAndExecuteQuery($sql, [$marque, $modele, $couleur, $immatriculation]);
    }

    // Met à jour un vehicule
    function updateVehicule(string $marque, string $modele, string $couleur, string $immatriculation, int $vehiculeId)
    {
        $sql = 'UPDATE vehicule
                SET marque = ?, modele = ?, couleur = ?, immatriculation = ?
                WHERE id_vehicule = ?';

        $this->database->prepareAndExecuteQuery($sql, [$marque, $modele, $couleur, $immatriculation, $vehiculeId]);
    }

    // Récupère un vehicule à partir de son id
    function getVehiculeById(int $id)
    {
        $sql = 'SELECT id_vehicule, marque, modele, couleur, immatriculation
                FROM vehicule
                WHERE id_vehicule = ?';

        return $this->database->selectOne($sql, [$id]);
    }

    // Supprime un vehicule à partir de son id
    function removeVehicule(int $vehiculeId)
    {
        $sql = 'DELETE FROM vehicule
                WHERE id_vehicule = ?';

        $this->database->prepareAndExecuteQuery($sql, [$vehiculeId]);
    }
}