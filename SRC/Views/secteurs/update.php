<h1 class="display-3 pt-2">Mettre à jour <?php echo $this->_data["ID"]; ?></h1>

<form action="" method="post" class="row">
    <div class="col-md-9">
        <input class="form-control" type="text" name="LIBELLE" value="<?php echo $this->_data["LIBELLE"]; ?>">
        <input type="hidden" name="ID" value="<?php echo $this->_data["ID"]; ?>">
    </div>
    <div class="col-md-3">
        <input class="btn btn-info w-100" type="submit" name="btn-submit" value="Modifier">
    </div>
</form>