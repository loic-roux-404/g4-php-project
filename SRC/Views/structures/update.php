<h1 class="display-3 mt-2">Mettre à jour <?php echo $this->_data['NOM'] ?> </h1>
<form action="" method="post" class="row">
    <input type="hidden" name="ID" value="<?php echo $this->_data['ID'] ?>">

    <div class="col-xl-9">
        <div class="row">
            <div class="col-xl-6 py-2">
                <input class="form-control" type="text" name="NOM" placeholder="Nom" value="<?php echo $this->_data['NOM'] ?>">
            </div>
            <div class="col-xl-6 py-2">
                <input class="form-control" type="text" name="RUE" placeholder="Rue" value="<?php echo $this->_data['RUE'] ?>">
            </div>
            <div class="col-xl-6 py-2">
                <input class="form-control" type="text" name="CP" placeholder="Code Postal" maxlength="5" value="<?php echo $this->_data['CP'] ?>">
            </div>
            <div class="col-xl-6 py-2">
                <input class="form-control" type="text" name="VILLE" placeholder="Ville" value="<?php echo $this->_data['VILLE'] ?>">
            </div>
            <div class="col-xl-4 py-2 text-left">
                <div class="form-group d-flex ">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="ESTASSO" id="c1" class="custom-control-input" value="1" <?php echo $this->_data['ESTASSO'] === "1" ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="c1">Association</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="c2" name="ESTASSO" class="custom-control-input" value="0" <?php echo $this->_data['ESTASSO'] === "0" ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="c2">Entreprise</label>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 py-2">
                <input class="form-control" type="number" name="NB_DONATEURS" max="99999999999" placeholder="Nombre donnateurs" value="<?php echo $this->_data['NB_DONATEURS'] ?? 0 ?>">
            </div>
            <div class="col-xl-4 py-2">
                <input class="form-control" type="number" name="NB_ACTIONNAIRES" max="99999999999" placeholder="Nombre actionnaires" value="<?php echo $this->_data['NB_ACTIONNAIRES'] ?? 0 ?>">
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <input class="btn btn-info w-100" type="submit" name="btn-submit" value="Modifier">
    </div>
    </div>
</form>