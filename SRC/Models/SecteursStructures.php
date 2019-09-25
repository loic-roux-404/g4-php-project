<?php
namespace SRC\Models;

use SRC\Models\Manager\IModelManager;

class SecteursStructure{
  private $_idSectStruct;
  private $_idStructure;
  private $_idSecteur;

  function __contstruct($idSectStruct,$idStructure,$idSecteur)
  {
    $this->_idSectStruct = $idSectStruct;
    $this->_idStructure = $idStructure;
    $this->_idSecteur = $idSecteur;
  }

}
