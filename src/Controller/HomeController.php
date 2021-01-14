<?php

// PAGE D'ACCUEIL

namespace App\Controller;

use App\Core\AbstractController;
use App\Model\HomeModel;

class HomeController extends AbstractController
{
    public function index()
    {
        $homeModel = new HomeModel($this->database);

        // Nombre de conducteurs
        $nbConducteurs = $homeModel->getNbConducteurs();

        // Nombre de véhicules
        $nbVehicules = $homeModel->getNbVehicules();

        // Nombre d'associations
        $nbAssociations = $homeModel->getNbAssociations();
        
        render('home', [
            'nbConducteurs' => $nbConducteurs,
            'nbVehicules' => $nbVehicules,
            'nbAssociations' => $nbAssociations,
        ]);
    }
}