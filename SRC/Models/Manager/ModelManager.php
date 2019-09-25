<?php

namespace SRC\Models\Manager;
 
class ModelManager implements IModelManager
{
    private $_entity;

    public function __construct(Entity $_entity)
    {
        $this->_entity = $_entity;
    }


}
