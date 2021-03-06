<?php

namespace App\Controller;

// Import des classes
use App\Core\AbstractController;
use App\Model\VehiculeModel;

// Déclaration de la classe
class RemoveVehiculeController extends AbstractController
{
    public function index()
    {
        // Récupération de l'id du produit à modifier dans la chaîne de requête de l'URL
        if (!array_key_exists('id', $_GET) || !isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            echo 'Error : no product id parameter';
            exit;
        }

        $vehiculeId = $_GET['id'];


        // On créé un objet de la classe VehiculeModel
        $vehiculeModel = new VehiculeModel($this->database);

        // On fait ensuite appel à la méthode removeVehicule sur notre objet
        $vehiculeModel->removeVehicule($vehiculeId);

        header('Location: /vehicule');
        exit;
    }
}