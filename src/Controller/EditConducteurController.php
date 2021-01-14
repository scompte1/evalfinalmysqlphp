<?php

namespace App\Controller;

// Import des classes
use App\Core\AbstractController;
use App\Model\ConducteurModel;

// Déclaration de la classe
class EditConducteurController extends AbstractController
{
    public function index()
    {
        // Initialisations
        $errors = null;

        // Création du conducteurModel
        $conducteurModel = new ConducteurModel($this->database);

        // Si le formulaire est soumis 
        if (!empty($_POST)) {

            // Récupérer les données du formulaire
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $conducteurId = intval($_POST['conducteur-id']);

            // Validation des données
            $errors = validateConducteurForm($prenom, $nom);

            // Si tout est ok
            if (empty($errors)) {

                // Mise à jour du conducteur dans la BDD
                $conducteurModel->updateConducteur($prenom, $nom, $conducteurId);

                header('Location: /conducteur');
                exit;
            }        
        }

        if (!isset($conducteurId) && (!array_key_exists('id', $_GET) || !isset($_GET['id']) || !ctype_digit($_GET['id']))) {
            echo 'Error : no product id parameter';
            exit;
        }

        // Si tout est ok on récupère l'id du conducteur
        $conducteurId = $conducteurId ?? $_GET['id'];

        // Séléction du conducteur à modifier
        $conducteur = $conducteurModel->getConducteurById($conducteurId);

        render('edit_conducteur', [
            'conducteur' => $conducteur,
            'errors' => $errors
        ]);
    }
}