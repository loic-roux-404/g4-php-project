<?php

namespace SRC\Models\Manager;

interface IModelManager
{
    static function index();

    static function delete();

    static function update();

    static function create();

    static function cells();
}
