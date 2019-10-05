<?php

namespace SRC\Entities;

use SRC\Models\ModelManager;

class Structure extends ModelManager
{
    const TABLE_NAME = 'structure';

    private $nom;
    private $rue;
    private $cp;
    private $ville;
    private $estasso;
    private $nb_donateurs;
    private $nb_actionnaires;

    public function __construct()
    {
        //var_dump($this);
        parent::__construct(get_object_vars($this));
    }

    /**
     * Get the value of nom
     */
    final public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Get the value of rue
     */
    final public function getRue(): string
    {
        return $this->rue;
    }

    /**
     * Get the value of cp
     */
    final public function getCp(): string
    {
        return $this->cp;
    }

    /**
     * Get the value of ville
     */
    final public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * Get the value of estasso
     */
    final public function getEstasso(): int
    {
        return $this->estasso;
    }

    /**
     * Get the value of actionnaires
     */
    final public function getActionnaires(): \IntNull
    {
        return $this->nb_actionnaires;
    }


    /**
     * Get the value of donateurs
     */
    final public function getDonateurs(): \IntNull
    {
        return $this->nb_donateurs;
    }
}
