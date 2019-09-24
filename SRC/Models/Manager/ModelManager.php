<?php

namespace SRC\Models\Manager;

abstract class ModelManager
{
    private $_entity;

    public function __construct(Entity $_entity)
    {
        $this->_entity = $_entity;
    }


}
