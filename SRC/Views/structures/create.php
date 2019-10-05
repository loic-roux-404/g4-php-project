<h1>Créer une structure</h1>
<form action="" method="post" class="row">
    <div class="col-xl-9">
        <div class="row">
            <div class="col-xl-6 py-2">
                <input class="form-control" type="text" name="NOM" placeholder="Nom" required>
            </div>
            <div class="col-xl-6 py-2">
                <input class="form-control" type="text" name="RUE" placeholder="Rue" required>
            </div>
            <div class="col-xl-6 py-2">
                <input class="form-control" maxlength="5" type="text" name="CP" placeholder="Code Postal" required>
            </div>
            <div class="col-xl-6 py-2">
                <input class="form-control" type="text" name="VILLE" placeholder="Ville">
            </div>
            <div class="col-xl-6 py-2 text-left">
                <div class="form-group d-flex ">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="ESTASSO" id="c1" class="custom-control-input" value="1" checked>
                        <label class="custom-control-label" for="c1">Association</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="c2" name="ESTASSO" class="custom-control-input" value="0">
                        <label class="custom-control-label" for="c2">Entreprise</label>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 py-2">
                <input class="form-control" type="number" name="NB_DONATEURS" maxlength="11" placeholder="Nombre donnateurs">
            </div>
            <div class="col-xl-3 py-2">
                <input class="form-control" type="number" name="NB_ACTIONNAIRES" maxlength="11" placeholder="Nombre actionnaires">
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <input class="btn btn-info w-100" type="submit" name="btn-submit" value="Créer">
    </div>
    </div>
</form>