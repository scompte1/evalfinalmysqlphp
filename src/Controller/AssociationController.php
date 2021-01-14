<?php

namespace App\Controller;

use App\Core\AbstractController;
use App\Model\AssociationModel;

class AssociationController extends AbstractController
{
    public function index()
    {
        // On créé un objet de la classe AssociationModel
        $associationModel = new AssociationModel($this->database);

        $associations = $associationModel->getAllAssociation();

        render('association', [
            'associations' => $associations,
        ]);
    }

    public function addAssociation()
    {
        // Initialisations
        $errors = null;

        // Si le formulaire est soumis
        if (!empty($_POST)) {
            
            // Récupérer les données du formulaire
            $conducteurId = intval($_POST['conducteur']);
            $vehiculeId = intval($_POST['vehicule']);

            // Si tout est ok
            if (empty($errors)) {

                // Mise à jour de l'association dans la BDD
                $associationModel = new AssociationModel($this->database);
                $associationModel->insertAssociation($conducteurId, $vehiculeId);

                header('Location: /association');
            }

            // On créé un objet de la classe AssociationModel
            $associationModel = new AssociationModel($this->database);

            $associations = $associationModel->getAllAssociation();

            render('association', [
                'associations' => $associations,
                'errors' => $errors,
            ]);
        }
    }
}