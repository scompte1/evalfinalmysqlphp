<?php

namespace App\Controller;

// Import des classes
use App\Core\AbstractController;
use App\Model\AssociationModel;

// Déclaration de la classe
class EditAssociationController extends AbstractController
{
    public function index()
    {
        // Initialisations
        $errors = null;

        // Création du associationModel
        $associationModel = new AssociationModel($this->database);

        // Si le formulaire est soumis 
        if (!empty($_POST)) {

            // Récupérer les données du formulaire
            $conducteurId = intval($_POST['conducteur']);
            $vehiculeId = intval($_POST['vehicule']);
            $associationId = intval($_POST['association-id']);

            // Si tout est ok
            if (empty($errors)) {

                // Mise à jour du conducteur dans la BDD
                $associationModel->updateAssociation($conducteurId, $vehiculeId, $associationId);


                header('Location: /association');
                exit;
            }
        }

        if (!isset($associationId) && (!array_key_exists('id', $_GET) || !isset($_GET['id']) || !ctype_digit($_GET['id']))) {
            echo 'Error : no product id parameter';
            exit;
        }

        // Si tout est ok on récupère l'id du conducteur
        $associationId = $associationId ?? $_GET['id'];

        // Séléction de l'association à modifier
        $association = $associationModel->getAssociationById($associationId);
        $associations = $associationModel->getAllAssociation();

        render('edit_association', [
            'association' => $association,
            'associations' => $associations,
            'errors' => $errors	
        ]);

    }
}