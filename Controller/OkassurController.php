<?php

namespace Controller;

use Component\Http\Session;
use Component\Http\Request;

class OkassurController
{
    public function souscription()
    {
        include 'View/souscription.php';
    }

    public function entreprise()
    {
        include 'View/entreprise.php';
    }

    public function devis()
    {
        include 'View/devis.php';
    }
}