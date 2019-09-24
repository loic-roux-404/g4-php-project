<?php

class secteur
{
  private $_libelle;

  function __contstruct($libelle)
  {
      $this->_libelle = $libelle;
  }

  public function get_libelle()
  {
    return $this->_libelle;
  }

  public function set_libelle($libelle)
  {
    $this->_libelle = $libelle;
  }
}

?>
