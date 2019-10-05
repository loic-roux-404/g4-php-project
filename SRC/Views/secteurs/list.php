<div class="row my-3">
    <?php foreach ($this->_data as $key => $val) :; ?>
        <div class="col-md-4 my-2">
            <div class="card text-center">
                <div class="card-header"><?php echo $val['LIBELLE']; ?></div>
                <div class="card-body">
                    <div class="d-table h-100 w-100">
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