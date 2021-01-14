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

}