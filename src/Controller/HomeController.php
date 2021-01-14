<?php

// PAGE D'ACCUEIL

namespace App\Controller;

use App\Core\AbstractController;

class HomeController extends AbstractController
{
    public function index()
    {
        render('home');
    }
}