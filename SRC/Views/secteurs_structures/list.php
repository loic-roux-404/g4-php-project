<?php
// La structure n'a pas de secteur
$isAssociated = false;
?>
<div class="row">
    <?php foreach ($this->_data as $values) :; ?>
        <div class="col-md-4 my-2">
            <form action="" method="POST" class="card text-center rounded-0">
                <div class="card-header font-weight-bold"><?php echo $values['NOM']; ?></div>
                <div class="card-body">
                    <span>Secteur associé : </span>
                    <select name="ID_SECTEUR">
                        <?php foreach ($secteurs as $secteur) :; ?>
                            <?php $isAssociated = isset($values["ID_STRUCTURE"], $values["ID_SECTEUR"]); ?>

                            <option <?php if ($isAssociated && $values["ID_SECTEUR"] === $secteur["ID"]) {
                                                echo "selected";
                                            } ?> value="<?php echo $secteur["ID"]; ?>">
                                <?php echo $secteur["LIBELLE"]; ?>
                            </option>

                        <?php endforeach; ?>
                        <option value="delete" <?php echo !$isAssociated ? 'selected' : ''; ?>>Pas de secteur</option>
                    </select>
                </div>
                
                <input type="hidden" name="ID_STRUCTURE" value="<?php echo $values["ID_STRUCTURE"]; ?>">
                <input type="hidden" name="ID" value="<?php echo $values['ID']?>">

                <input class="btn btn-info rounded-0" type="submit" name="<?php echo $isAssociated ? 'update' : 'create'; ?>" value="Enregistrer">
            </form>
        </div>
    <?php endforeach; ?>
</div>