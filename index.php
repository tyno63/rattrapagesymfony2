<?php

require 'autoload.php';

use Component\Http\Request;
use Component\Http\Exception\HttpException;
use Component\Http\Exception\MethodNotAllowedHttpException;
use Component\Http\Exception\NotFoundHttpException;
use Controller\OkassurController;

$request = new Request();

$controller = $request->_get('controller');
$view = $request->_get('view');
$method = $request->getMethod();

switch ($controller) {
    case 'okassur':
        $okassurController = new \Controller\OkassurController();
        switch ($view) {
            case 'souscription':
                $okassurController->souscription();
                break;
            case 'entreprise':
                $okassurController->entreprise();
                break;
            case 'devis':
                $okassurController->devis();
                break;
        }
        break;
    break;
}

?>

