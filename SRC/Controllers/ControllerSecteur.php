<?php

namespace SRC\Controllers;

use SRC\Controllers\AbstractController;
use src\Entities\Secteur;
use SRC\Forms\FormBuilder;
use SRC\Helpers\Globals;
use SRC\Helpers\UrlHelper;

class ControllerSecteur extends AbstractController
{
    protected $route = 'secteurs';
    private $_entity;
    private $_builder;
    private $_data;

    public function __construct(string $req = null)
    {
        $this->_entity = new Secteur;
        parent::__construct($this->route, $this->_entity, $req);
        $this->_builder = $this->getBuilder();
        $this->_data = $this->getData();
    }

    /**
     * Get the value of _data
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * Set the value of _data

     */
    public function setData($_data)
    {
        $this->_data = $_data;
    }
}
