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

    function insertAssociation(int $conducteurId, int $vehiculeId)
    {
        $sql = 'INSERT INTO association_vehicule_conducteur (id_conducteur, id_vehicule)
                VALUES (?, ?)';

        $this->database->prepareAndExecuteQuery($sql, [$conducteurId, $vehiculeId]);
    }
}