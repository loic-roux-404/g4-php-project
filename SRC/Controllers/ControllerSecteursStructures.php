<?php

namespace SRC\Controllers;

use src\Controllers\AbstractController;
use src\Entities\SecteursStructures;
use src\Entities\Structure;
use src\Entities\Secteur;
use SRC\Forms\FormBuilder;


/**
 * Override Abtract controller class (specific case)
 */
class ControllerSecteursStructures extends AbstractController
{
    public $route = 'secteurs_structures';
    private $_entity;
    private $_builder;
    private $_data;
    private $_secteur;
    private $_structure;

    public function __construct(string $req = null)
    {
        $this->_entity = new SecteursStructures();
        $this->_secteur = new Secteur();
        $this->_structure = new Structure();
        $this->_builder = new FormBuilder($this->_entity, $this->route);
        $this->specialCase();
        //$this->loadRoutes($req);
    }
    /**
     * Too specific controller to use basic crud of AbstractController
     * Manage an association with this special case
     * @return void
     */
    public function specialCase()
    {
        $del = $this->deleteCase();
        if (!$del) {
            $this->_builder->submitUpdate();
            $this->_builder->submitCreate(false);
        }

        $this->_data = $this->_entity->customQuery(
            "SELECT secteur.ID as ID_SECTEUR, structure.ID as ID_STRUCTURE, structure.NOM, secteurs_structures.ID
        FROM secteur
        LEFT OUTER JOIN secteurs_structures ON secteur.ID = secteurs_structures.ID_SECTEUR
        RIGHT OUTER JOIN structure  ON structure.ID = secteurs_structures.ID_STRUCTURE
        ",
            true
        );

        $secteurs = $this->_secteur->fetch();
        require VF . "{$this->route}/list.php";
    }

    /**¨
     * Override form functions
     */

    public function deleteCase()
    {
        if (isset($_POST["ID_SECTEUR"]) && $_POST["ID_SECTEUR"] === "delete") {
            if ((int) $_POST["ID"]) {
                $this->_entity->delete($_POST["ID"]);
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the value of _data
     */
    public function setData($_data)
    {
        $this->_data = $_data;
    }
}
