<?php
namespace SRC\Controllers;

interface IController {
    public function loadRoutes($req);

    public function listView();

    public function updateView();
    
}
