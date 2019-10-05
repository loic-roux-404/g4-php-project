<?php

namespace SRC\Entities;

use SRC\Models\ModelManager;

class Secteur extends ModelManager
{
    const TABLE_NAME = 'secteur';

    private $libelle = '';
    //private $entity;

    public function __construct()
    {
        //array_pop($tmpVars);
        parent::__construct(get_object_vars($this));
    }

    /**
     * Set the value of libelle
     * @return  string
     */
    final public function getLibelle(): string
    {
        return $this->libelle;
    }

}
