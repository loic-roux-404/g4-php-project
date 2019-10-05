<?php

namespace SRC\Controllers;

use src\Entities\Structure;
use src\Helpers\Globals;

/**
 * Override Abtract controller class (specific case)
 */
class ControllerStructure extends AbstractController
{
    public $route = 'structures';
    private $_entity;
    private $_builder;
    private $_data;

    public function __construct(string $req = null)
    {

        $this->_entity = new Structure;
        //if ($this->specialCase()) {
            parent::__construct($this->route, $this->_entity, $req, $this->specialCase());
        //} 
    }
    /**
     * Add this function to execute Entity specific programs
     * Ici on vérifie que l'utilisateur utilise une entreprise ou une association
     * @return bool
     */
    public function specialCase(): bool
    {
        $isAsso = null;
        $hasDonn = null;
        $hasActio = null;
        //var_dump($_POST);

        if (isset($_POST['ESTASSO'])) {
            $isAsso = (int) $_POST['ESTASSO'];
        }
        if (isset($_POST['NB_DONATEURS'])) {
            $hasDonn = $_POST['NB_DONATEURS'] > 0 ? true : false;
        }
        if (isset($_POST['NB_ACTIONNAIRES'])) {
            $hasActio = $_POST['NB_ACTIONNAIRES'] > 0 ? true : false;
        }

        if ($isAsso === 1 && $hasActio) {
            echo "<br> no asso ";
            (new Globals())->setAlert('error', 'danger', null, 'Une association na pas d\'actionnaires', false);
            return true;
        } else if ($isAsso === 0 && $hasDonn) {
            echo "<br> no ent ";
            (new Globals())->setAlert('error', 'danger', null, 'Une entreprise na pas de donnateurs', false);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the value of data
     */
    public function setData($_data)
    {
        $this->_data = $_data;
    }
}
