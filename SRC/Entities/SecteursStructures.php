<?php

namespace SRC\Entities;

use SRC\Models\ModelManager;

class SecteursStructures extends ModelManager
{
  const TABLE_NAME = 'secteurs_structures';
  //right to left join

  private $id_structure;
  private $id_secteur;

  public function __construct()
  {
    parent::__construct(get_object_vars($this));
  }

  /**
   * @return int
   */
  final public function getIdStructure(): int
  {
    return $this->id_structure;
  }

  /**
   * Get the value of estasso
   */
  final public function getIdSsecteur(): int
  {
    return $this->id_secteur;
  }
}
