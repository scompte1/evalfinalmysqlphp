<?php

namespace App\Controller;

use App\Core\AbstractController;
use App\Model\AssociationModel;

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

        $associationModel = new AssociationModel($this->database);
        $associationModel->removeAssociation($associationId);

        header('Location: /association');
        exit;
    }
}