<?php

namespace App\Model;

// Import des classes
use App\Core\AbstractModel;

class HomeModel extends AbstractModel
{
    // Requête pour compter le nombre de conducteur
    function getNbConducteurs()
    {
        $sql = 'SELECT COUNT(*) FROM conducteur';

        return $this->database->selectOne($sql);
    }

    // Requête pour compter le nombre de vehicule
    function getNbVehicules()
    {
        $sql = 'SELECT COUNT(*) FROM vehicule';

        return $this->database->selectOne($sql);
    }

    // Requête pour compter le nombre d'associations
    function getNbAssociations()
    {
        $sql = 'SELECT COUNT(*) FROM association_vehicule_conducteur';

        return $this->database->selectOne($sql);
    }

    // Requête de selection des vehicules n'ayant pas de conducteur
    function getVehiculeWithNoConducteur()
    {
        $sql = 'SELECT id_vehicule
                FROM vehicule
                EXCEPT
                SELECT id_vehicule 
                FROM association_vehicule_conducteur';

        return $this->database->selectAll($sql);
    }

    // Requête de selection des conducteus n'ayant pas de véhicules
    function getConducteurWithNoVehicule()
    {
        $sql = 'SELECT id_conducteur
                FROM conducteur
                EXCEPT
                SELECT id_conducteur
                FROM association_vehicule_conducteur';

        return $this->database->selectAll($sql);
    }

    // Requête de selection des véhicules conduit par "Philippe Pandre"
    function getVehiculePandre()
    {
        $sql = 'SELECT id_vehicule
                FROM association_vehicule_conducteur
                WHERE id_conducteur = 3';

        return $this->database->selectAll($sql);
    }

    // Requête de selection de tous les conducteurs ainsi que les véhicules
    function getAllConducteurWithVehicule()
    {
        $sql = 'SELECT prenom, marque
                FROM association_vehicule_conducteur AS A
                INNER JOIN conducteur AS C ON A.id_conducteur = C.id_conducteur
                INNER JOIN vehicule AS V ON A.id_vehicule = V.id_vehicule';

        return $this->database->SelectAll($sql);
    }

}