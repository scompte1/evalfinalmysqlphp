<?php

namespace App\Controller;

// Import des classes
use App\Core\AbstractController;
use App\Model\ConducteurModel;

// Déclaration de la classe
class ConducteurController extends AbstractController
{
    public function index()
    {
        // On crée un objet de la classe ConducteurModel
        $conducteurModel = new ConducteurModel($this->database);

        // On fait ensuite appel à la méthode getAllConducteur sur notre objet
        $conducteurs = $conducteurModel->getAllConducteur();

        // Inclusion du template
        render('conducteur', [
            'conducteurs' => $conducteurs,
        ]);
    }

    public function addConducteur()
    {
        // Initialisations
        $errors = null;

        // Si le formulaire est soumis
        if (!empty($_POST)) {
            
            // Récupérer les données du formulaire
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];

            // Validation des données
            $errors = validateConducteurForm($prenom, $nom);

            // Si tout est OK
            if (empty($errors)) {

                // Insertion du conducteur dans la BDD
                $conducteurModel = new ConducteurModel($this->database);
                $conducteurModel->insertConducteur($prenom, $nom);

                header('Location: /conducteur');
            }

            // On crée un objet de la classe ConducteurModel
            $conducteurModel = new ConducteurModel($this->database);

            $conducteurs = $conducteurModel->getAllConducteur();

            render('conducteur', [
                'conducteurs' => $conducteurs,
                'errors' => $errors,
            ]);
        }
    }
}
