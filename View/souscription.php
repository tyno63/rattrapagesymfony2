<?php
session_start();

ini_set('error_reporting', E_ALL);

use Model\Client;
use Component\Http\Request;

$request = new Request();

if ($request->hasPostParam('prenom') && $request->hasPostParam('nom') && $request->hasPostParam('email')) {
    $_SESSION['prenom'] = $_POST['prenom'];
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['email'] = $_POST['email'];
    header('Location: index.php?controller=okassur&view=entreprise');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<h1>OkAssur : souscription en ligne</h1>
<form action="index.php?controller=okassur&view=souscription" method="post">
    <input placeholder="Nom" type="text" name="prenom"><br><br>
    <input placeholder="Prénom" type="text" name="nom"><br><br>
    <input placeholder="Email" type="text" name="email"><br><br>
    <button type="submit">Continuer</button>
</form>
</body>
</html>