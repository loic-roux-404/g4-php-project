<?php

ini_set('display_errors', 1);

use src\Autoloader;
use src\Controllers\Structure;

//import 
require_once '../bootstrap.php';
Autoloader::register();
$structure = new Structure;




if (isset($_POST['nom'])) {
    $secteur->add(array('nom' => $_POST['nom']));
}

?>

<?php include('partials/head.php'); ?>

<body>
    <div class="container">
        <?php include("partials/navbar.php"); ?>


        <?php
        foreach ($structure->selectAll() as $key => $val) :;

            echo <<<STRUCTURE
    <div class="card">
        <div class="card-header">{$val['NOM']}</div>
        <div class="d-table h-100">
            <div class="d-table-cell align-middle">
                <a href="crud/update_structure.php?id={$key}">Mettre à jour</a>
            </div>
        </div>
        <div class="card-footer text-center"> ID : {$key}</div>
    </div><br>
STRUCTURE;
        endforeach;

        ?>

        <h1>Créer structure</h1>
        <form action="" method="post">
            <input class="form-control" type="text" name="nom">
            <button type="submit">Ajouter</button>
        </form>

        <?php include("partials/footer.php"); ?>
    </div>

    <?php 
        $_SESSION["structure"] = $structure;
    ?>
</body>

</html>

?>