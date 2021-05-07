<?php
session_start();

ini_set('error_reporting', E_ALL);

use Model\Client;
use Component\Http\Request;

$request = new Request();

if(isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['email']) && isset($_SESSION['entreprise']) && isset($_SESSION['ca'])) {

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<h1>Okassur : votre devis</h1>

<h1>Félicitation ! voici votre nouveau devis</h1><br>
Nom : <?php echo $_SESSION['prenom']; ?><br>
Prénom : <?php echo $_SESSION['nom']; ?><br>
Entreprise : <?php echo $_SESSION['entreprise']; ?><br>
Chiffre d'affaire : <?php echo $_SESSION['ca']; ?> €<br><br>
Montant mensuel : 
<?php

$val;

if($_SESSION['ca_annuel'] < 500000) {
    echo '49€ HT';
    $val = 49;
} else {
    echo '69€ HT';
    $val = 69;
}

?>
Total annuel: 
<?php $total = $val*12; echo $val*12; ?>€ HT<br>
Total (TVA 20%): 
<?php echo $total + ($total*20/100); ?>€ TTC<br>
</body>
</html>

<?php
} else if(!isset($_SESSION['prenom']) && !isset($_SESSION['nom']) && !isset($_SESSION['email']) && !isset($_SESSION['entreprise']) && !isset($_SESSION['ca'])) {
    header('Location: index.php?controller=okassur&view=souscription');
} else {
    header('Location: index.php?controller=okassur&view=entreprise');
}

?>