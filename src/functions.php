<?php

/**
* Envoi en sortie le rendu d'un fichier de template
*/
function render(string $template, array $values = [])
{
// Extraction des variables
extract($values);

// Inclusion du template de base
include '../templates/' . $template . '.phtml';
}

function validateConducteurForm($prenom, $nom)
{
    $errors = [];

    if (!$prenom) {
        $errors[] = "Le prénom du conducteur est obligatoire";
    }

    if (!$nom) {
        $errors[] = "Le nom du conducteur est obligatoire";
    }
    
    return $errors;
}