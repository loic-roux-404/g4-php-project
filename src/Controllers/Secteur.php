<?php

namespace src\Controllers;

use src\Models\ModelManager;

class Secteur extends ModelManager
{
  /**
   * const Database table value
   */
  const TABLE_NAME = 'secteur';

  private $libelle;

  public function __construct()
  {
    parent::__construct(get_object_vars($this));
  }

  public function getById($id)
  {
    return parent::index(self::TABLE_NAME, $id);
  }

  public function selectAll()
  {
    return parent::fetchAll(self::TABLE_NAME);
  }

  public function add(array $val)
  {
    parent::create(self::TABLE_NAME, $val);
  }
}
