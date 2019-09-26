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

<?php include('partials/head.php'); ?>

<body>
    <div class="container">
        <?php include("partials/navbar.php"); ?>


        <?php
        foreach ($secteur->selectAll() as $key => $val) :;
        //array_push($_SESSION["secteurUpdate"],[$key$val);

            echo <<<SECTEUR
    <div class="card">
        <div class="card-header">{$val['LIBELLE']}</div>
        <div class="d-table h-100">
            <div class="d-table-cell align-middle">
                <a href="crud/update_secteur.php?id={$key}">Mettre à jour</a>
            </div>
        </div>
        <div class="card-footer text-center"> ID : {$key}</div>
    </div><br>
SECTEUR;
        endforeach;

        ?>

        <h1>Créer secteur</h1>
        <form action="" method="post">
            <input class="form-control" type="text" name="libelle">
            <button type="submit">Ajouter</button>
        </form>

        <?php include("partials/footer.php"); ?>
    </div>

    <?php 
        $_SESSION["secteur"] = $secteur;
    ?>
</body>

</html>