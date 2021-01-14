<?php

namespace App\Controller;

// Import des classes
use App\Core\AbstractController;
use App\Model\ConducteurModel;

// Déclaration de la classe
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

        // On créé un objet de la classe ConducteurModel
        $conducteurModel = new ConducteurModel($this->database);

        // On fait ensuite appel à la méthode removeConducteur sur notre objet
        $conducteurModel->removeConducteur($conducteurId);

        header('Location: /conducteur');
        exit;
    }
}
