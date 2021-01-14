<?php

namespace App\Model;

// Import des classes
use App\Core\AbstractModel;

class AssociationModel extends AbstractModel
{
    // Requête SQL pour récuperer toutes les associations
    function getAllAssociation()
    {
        $sql = 'SELECT id_association, A.id_vehicule, A.id_conducteur, prenom, nom, marque, modele
                FROM association_vehicule_conducteur AS A
                INNER JOIN conducteur AS C ON A.id_conducteur = C.id_conducteur
                INNER JOIN vehicule AS V ON A.id_vehicule = V.id_vehicule';

        return $this->database->SelectAll($sql);
    }

    // Requête SQL pour insérer une association a la BDD
    function insertAssociation(int $conducteurId, int $vehiculeId)
    {
        $sql = 'INSERT INTO association_vehicule_conducteur (id_conducteur, id_vehicule)
                VALUES (?, ?)';

        $this->database->prepareAndExecuteQuery($sql, [$conducteurId, $vehiculeId]);
    }

    // Met à jour une association
    function updateAssociation($conducteurId, $vehiculeId, $associationId)
    {
        $sql = 'UPDATE association_vehicule_conducteur
                SET id_vehicule = ?, id_conducteur = ?
                WHERE id_association = ?'; 
        
        $this->database->prepareAndExecuteQuery($sql, [$vehiculeId, $conducteurId, $associationId]);
    }

    // Recupère une association à partir de son id
    function getAssociationById(int $id)
    {
        $sql = 'SELECT id_association, id_vehicule, id_conducteur
                FROM association_vehicule_conducteur
                WHERE id_association = ?';

        return $this->database->selectOne($sql, [$id]);
    }

    // Supprime une association à partir de son id
    function removeAssociation(int $associationId)
    {
        $sql = 'DELETE FROM association_vehicule_conducteur
                WHERE id_association = ?';

        $this->database->prepareAndExecuteQuery($sql, [$associationId]);
    }
}