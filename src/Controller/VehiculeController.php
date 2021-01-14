<?php

namespace App\Controller;

use App\Core\AbstractController;
use App\Model\VehiculeModel;

class VehiculeController extends AbstractController
{
    public function index()
    {
        // On crée un objet de la classe VehiculeModel
        $vehiculeModel = new VehiculeModel($this->database);

        $vehicules = $vehiculeModel->getAllVehicule();

        render('vehicule', [
            'vehicules' => $vehicules,
        ]);
    }

    public function addVehicule()
    {
        // Initialisations
        $errors = null;

        // Si le formulaire est soumis
        if (!empty($_POST)) {

            // Récupérer les données du formulaire
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $couleur = $_POST['couleur'];
            $immatriculation = $_POST['immatriculation'];

            // Validation des données
            $errors = validateVehiculeForm($marque, $modele, $couleur, $immatriculation);

            // Si tout est ok
            if (empty($errors)) {

                // Insertion du vehicule dans la BDD
                $vehiculeModel = new VehiculeModel($this->database);
                $vehiculeModel->insertVehicule($marque, $modele, $couleur, $immatriculation);

                header('Location: /vehicule');
            }

            // On crée un objet de la classe VehiculeModel
            $vehiculeModel = new VehiculeModel($this->database);

            $vehicules = $vehiculeModel->getAllVehicule();

            render('vehicule', [
                'vehicules' => $vehicules,
                'errors' => $errors,
            ]);
            }
    }
}