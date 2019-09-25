<?php

namespace SRC\Models;

use SRC\Models\Manager\IModelManager;

class SecteursStructure implements IModelManager
{
  const CLASS_NAME = 'SecteursStructure';

  private $_id_SectStruct;
  private $_id_Structure;
  private $_id_Secteur;

  public function __invoke(){
    IModelManager::cells(get_object_vars($this));
  }

  function __contstruct($idSectStruct, $idStructure, $idSecteur)
  {
    $this->_idSectStruct = $idSectStruct;
    $this->_idStructure = $idStructure;
    $this->_idSecteur = $idSecteur;
  }

  public function index(int $id)
  {
    IModelManager::index(CLASS_NAME, $id);
  }

}
