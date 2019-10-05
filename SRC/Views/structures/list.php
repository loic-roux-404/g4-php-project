<div class="row my-3">
    <?php foreach ($this->_data as $key => $val) :; ?>
        <div class="col-md-4 my-2">
            <div class="card text-center">
                <div class="card-header"><?php echo $val['NOM']; ?></div>
                <div class="card-body p-0">
                    <div class="card-text p-0">
                        <h5 class="lead h5 border-bottom py-2 m-0">Informations</h5>
                        <div class="row text-center py-2">
                            <div class="col-md-6 py-2">
                                Rue :
                                <?php echo $val['RUE']; ?>
                            </div>
                            <div class="col-md-6 py-2">
                                Code Postal
                                <?php echo $val['CP']; ?>
                            </div>
                            <div class="col-md-6 py-2">
                                Ville :
                                <?php echo $val['VILLE']; ?>
                            </div>
                            <div class="col-md-6 py-2">
                                Association :
                                <?php echo $val['ESTASSO'] ? "Oui" : "Non"; ?>
                            </div>
                            <div class="col-md-6 py-2">
                                <?php echo $val['NB_DONATEURS'] ? "Donateurs : ${val['NB_DONATEURS']}" : "Pas de donnateurs"; ?>
                            </div>
                            <div class="col-md-6 py-2">
                                <?php echo $val['NB_ACTIONNAIRES'] ? "Actionnaires : ${val['NB_ACTIONNAIRES']}" : "Pas d'actionnaires"; ?>
                            </div>
                        </div>

                    </div>
                    <div class="d-table h-100 w-100 pb-2">
                        <div class="d-table-cell align-middle">
                            <a class="btn btn-success" <?php echo "href=\"{$this->url->URL}/{$this->route}/update?id={$val['ID']}\""; ?>">Mettre à jour</a>
                        </div>
                        <div class="d-table-cell align-middle">
                            <a class="btn btn-warning" <?php echo "href=\"{$this->url->URL}/{$this->route}/delete?id={$val['ID']}\""; ?>>Supprimer</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center"> ID : <?php echo $val["ID"]; ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>