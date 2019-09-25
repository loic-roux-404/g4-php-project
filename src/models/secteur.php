<?php
namespace SRC\Models;


class Secteur
{
  private $_libelle;

  function __contstruct(string $libelle)
  {
      $this->_libelle = $libelle;
  }

  /**
   * Get the value of _libelle
   * @return string
   */ 
  public function getLibelle() : string
  {
    return $this->_libelle;
  }

  /**
   * Set the value of _libelle
   *
   * @param string $libelle
   */ 
  public function setLibelle(string $_libelle) 
  {
    $this->_libelle = $_libelle;
  }
}
