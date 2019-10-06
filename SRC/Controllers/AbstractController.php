<?php

namespace SRC\Controllers;

use SRC\Forms\FormBuilder;
use SRC\Helpers\Globals;
use SRC\Helpers\UrlHelper;

/**
 * Class : use this for a simple CRUD SYSTEM
 */
abstract class AbstractController
{
    protected $route;
    protected $special;
    private $_entity;
    private $_builder;
    private $_data;
    public $globals;
    public $url;

    public function __construct(string $route, object $_entity, string $req = null, $special = false)
    {
        $this->_entity = $_entity;
        $this->route = $route;
        $this->_builder = new FormBuilder($this->_entity, $this->route);
        $this->url = new UrlHelper();
        $this->globals = new Globals();
        $this->special = $special;
        $this->loadRoutes($req);
    }

    /**
     * Second routing phase
     * $req is second part of url (representing crud operations)
     * @param $req
     */
    public function loadRoutes($req)
    {
        if (!$req) {
            $this->listView();
        } else if (strpos($req, 'update')) {
            $this->updateView();
        } else if (strpos($req, 'delete')) {
            $this->onDelete();
            $this->listView();
        }
    }

    /**
     * Manage index of all data in an entity
     * Inject new data values in templates
     * Invoke CRUD operations before
     * @return void
     */
    public function listView(): void
    {
        $this->_data = $this->_entity->fetch();
        if (!$this->special) {
            $newData = $this->_builder->submitCreate();
            if ($newData) {
                array_push($this->_data, $newData);
            }
        }
        require VF . "{$this->route}/list.php";
        require VF . "{$this->route}/create.php";
    }

    /**
     * View for a data to update
     * @return void
     */
    public function updateView(): void
    {
        if (!$this->special) {
            $this->_builder->submitUpdate();
        }
        $this->_data = $this->_entity->fetch($_GET['id'])[0];

        require VF . "{$this->route}/update.php";
    }

    /**
     * Avoid delete twice and duplicate alerts
     * @return void
     */
    public function onDelete(): void
    {
        if ($this->globals->getUpdated() !== (int) $_GET['id']) {
            $this->_entity->delete($_GET['id']);
            $this->globals->setUpdated($_GET['id']);
            $this->globals->unsetAlert();
        }
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

    /**
     * Get the value of _formBuilder
     */
    public function getBuilder()
    {
        return $this->_builder;
    }
}
