<?php
session_start();

ini_set('error_reporting', E_ALL);

use Model\Client;
use Component\Http\Request;

$request = new Request();

if(isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['email'])) {
    if ($request->hasPostParam('entreprise') && $request->hasPostParam('ca')) {
        $_SESSION['entreprise'] = $_POST['entreprise'];
        $_SESSION['ca'] = $_POST['ca'];
        header('Location: index.php?controller=okassur&view=devis');
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
<h1>OkAssur : votre entreprise</h1>
<form action="index.php?controller=okassur&view=entreprise" method="post">
    <input placeholder="Nom de votre société" type="text" name="entreprise"><br><br>
    <input placeholder="Chiffre d'affaire annuel" type="text" name="ca"><br><br>
    <button type="submit">Continuer</button>
</form>
</body>
</html>

<?php
} else {
    header('Location: index.php?controller=okassur&view=souscription');
}

?>