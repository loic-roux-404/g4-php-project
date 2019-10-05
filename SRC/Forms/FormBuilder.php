<?php

namespace SRC\Forms;

use SRC\Helpers\Globals;
use SRC\Helpers\UrlHelper;


/**
 * Class to manage forms and submissions
 */
class FormBuilder
{
    private $_entity;
    private $route;
    private $_globals;
    private $_urlHelper;
    private $_modelsAndTypes;

    public function __construct(object $_entity, string $route)
    {
        $this->_globals = new Globals();
        $this->_urlHelper = new UrlHelper();
        $this->_entity = $_entity;
        $this->route = $route;
        $this->setmodelAndTypes();
    }
    /**
     * Update values
     * @return void
     */
    public function submitUpdate(): void
    {
        if (isset($_POST['btn-submit'], $_POST["ID"]) || isset($_POST['update'])) {
            $payload = $this->genPayload();
            $this->_entity->update(
                $payload,
                $_POST["ID"] ?? $_GET["id"]
            );
        }
    }
    /**
     * Create function
     * conditionnaly returning an array added to main data
     * @param boolean $isReturning
     * @return bool|null
     */
    public function submitCreate($isReturning = true)
    {
        if (isset($_POST['btn-submit']) || isset($_POST['create'])) {
            $tmp = $this->genPayload();
            $id = $this->_entity->create(
                $tmp
            );
            $tmp['ID'] = $id;
            return $isReturning && $id ? $tmp : null;
        }
    }

    /**
     * generate object to send to db
     * @return array
     */
    public function genPayload(): array
    {
        $payload = [];

        foreach ($this->_modelsAndTypes as $cellKey => $type) {

            $ck = strtoupper($cellKey);
            if (isset($_POST[$ck])) {
                if ($type === 'IntNull' && !is_int($_POST[$ck])) {
                    settype($_POST[$ck], "int");
                } else if (!is_int($_POST[$ck])) {
                    settype($_POST[$ck], $type);
                }
                $payload[$ck] = $_POST[$ck];
            }
        }

        return $payload;
    }

    /**
     * Get the types and names of differents entity value
     * @return void
     */
    public function setModelAndTypes(): void
    {
        $refl = (new \ReflectionClass($this->_entity))->getMethods(\ReflectionMethod::IS_FINAL);
        $model = $this->_entity->getModel();

        $this->_modelsAndTypes = [];
        for ($i = 0; sizeof($model) > $i; $i++) {
            $modelKey = array_keys($model)[$i];
            $this->_modelsAndTypes[$modelKey] = $refl[$i]->getReturnType() ? $refl[$i]->getReturnType()->getName() : null;
        }
    }
}
