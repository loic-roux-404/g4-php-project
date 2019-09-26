<?php

namespace src\Models;

include_once 'Manager/ModelManager.php';

use src\Models\ModelManager;

class Secteurs_Structure extends ModelManager
{
  /**
   * const Dataabse table value
   */
  const CLASS_NAME = 'secteurs_structure';

  private $_id_Structure;
  private $_id_Secteur;

  public function __invoke()
  {
    IModelManager::setCells(get_object_vars($this));
  }

  function __contstruct($_id_Structure, $_id_Secteur)
  {
    $this->_id_Structure = $_id_Structure;
    $this->_id_Secteur = $_id_Secteur;
  }

  public function index($en, int $id)
  {
    IModelManager::index(CLASS_NAME, $id);
  }
}
