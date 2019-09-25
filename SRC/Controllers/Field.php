<?php

namespace SRC\Controllers;

class Form
{
    private $_fieldName;
    private $_fieldType;
    private $_arrayData;

    public function __construct($_arrayData)
    {
        $this->ArrayData = $_arrayData;
    }


    public function generate(){
        
    }
}


/**
 * TODO
 * Creér des getter et setter
 * Créer des instanciations de cookie et session pour préremplir les formulaires
 */