<?php

namespace App\Controller;

// Import des classes
use App\Core\AbstractController;
use App\Model\AssociationModel;

// Déclaration de la classe
class RemoveAssociationController extends AbstractController
{
    public function index()
    {
        // Récupération de l'id du produit à modifier dans la chaîne de requête de l'URL
        if (!array_key_exists('id', $_GET) || !isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            echo 'Error : no product id parameter';
            exit;
        }

        $associationId = $_GET['id'];

        // On créé un objet de la classe AssociationModel
        $associationModel = new AssociationModel($this->database);

        // On fait ensuite appel à la méthode removeAssociation sur notre objet
        $associationModel->removeAssociation($associationId);

        header('Location: /association');
        exit;
    }
}