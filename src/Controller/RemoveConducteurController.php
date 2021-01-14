<?php

namespace App\Controller;

use App\Core\AbstractController;
use App\Model\ConducteurModel;

class RemoveConducteurController extends AbstractController
{
    public function index()
    {
        // Récupération de l'id du produit à modifier dans la chaîne de requête de l'URL
        if (!array_key_exists('id', $_GET) || !isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            echo 'Error : no product id parameter';
            exit;
        }

        $conducteurId = $_GET['id'];

        $conducteurModel = new ConducteurModel($this->database);
        $conducteurModel->removeConducteur($conducteurId);

        header('Location: /conducteur');
        exit;
    }
}
