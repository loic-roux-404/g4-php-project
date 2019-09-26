<?php

use src\Models\Structure;

ini_set('display_errors', 1);
$structure = new Structure();
$idToUpdate = $_GET['id'];


?>


<h1>Mettre à jour <?php  ?></h1>
<form action="" method="post">
    <input class="form-control" type="text" name="nom">
    <input type="hidden" value="">
    <button type="submit">Ajouter</button>
</form>