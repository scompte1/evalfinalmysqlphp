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