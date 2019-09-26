<?php
ini_set('display_errors', 1);

$secteur = new Secteur();
$idToUpdate = $_GET['id'];
var_dump($idToUpdate);

//$secteur->
?>


<h1>Mettre à jour <?php  ?></h1>
<form action="" method="post">
    <input class="form-control" type="text" name="libelle">
    <input type="hidden" value="">
    <button type="submit">Ajouter</button>
</form>