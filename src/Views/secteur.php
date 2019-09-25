<?php
ini_set('display_errors', 1);

use src\Autoloader;
use src\Controllers\Secteur;

//import 
require_once '../bootstrap.php';
Autoloader::register();


$secteur = new Secteur();
//var_dump($secteur);


if (isset($_POST['libelle'])) {
    $secteur->add(array('libelle' => $_POST['libelle']));
}

?>

<h1>Archive données</h1>

<?php

foreach ($secteur->selectAll() as $key => $val) {
    echo <<<SECTEUR
    <div class="card">
        <div class="card-header">{$val['LIBELLE']}</div>
        <div class="card-footer text-center"> ID : {$key}</div>
    </div><br>
SECTEUR;
}

?>

<h1>Créer secteur</h1>
<form action="" method="post">
    <input class="form-control" type="text" name="libelle">
    <button type="submit">Ajouter</button>
</form>