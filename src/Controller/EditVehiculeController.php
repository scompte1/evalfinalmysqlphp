<?php

namespace App\Controller;

// Import des classes
use App\Core\AbstractController;
use App\Model\VehiculeModel;

// Déclaration de la classe
class EditVehiculeController extends AbstractController
{
    public function index()
    {
        // Initialisations
        $errors = null;

        // Création du vehiculeModel
        $vehiculeModel = new VehiculeModel($this->database);

        // Si le formulaire est soumis
        if (!empty($_POST)) {

            // Récupérer les données du formulaire
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $couleur = $_POST['couleur'];
            $immatriculation = $_POST['immatriculation'];
            $vehiculeId = intval($_POST['vehicule-id']);

            // Validation des données
            $errors = validateVehiculeForm($marque, $modele, $couleur, $immatriculation);

            // Si tout est ok
            if (empty($errors)) {

                // Mise à jour du vehicule dans la BDD
                $vehiculeModel->updateVehicule($marque, $modele, $couleur, $immatriculation, $vehiculeId);
                header('Location: /vehicule');
                exit;
            }
        }

        if (!isset($vehiculeId) && (!array_key_exists('id', $_GET) || !isset($_GET['id']) || !ctype_digit($_GET['id']))) {
            echo 'Error : no product id parameter';
            exit;
        }

        // Si tout est ok on récupère l'id du vehicule
        $vehiculeId = $vehiculeId ?? $_GET['id'];

        // Séléction du vehicule à modifier
        $vehicule = $vehiculeModel->getVehiculeById($vehiculeId);

        render('edit_vehicule', [
            'vehicule' => $vehicule,
            'errors' => $errors,
        ]);
    }
}