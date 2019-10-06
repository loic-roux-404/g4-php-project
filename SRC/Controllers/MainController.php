<?php

namespace SRC\Controllers;

use \SRC\Controllers\ControllerSecteur;
use \SRC\Controllers\ControllerStructure;
use \SRC\Controllers\ControllerSecteursStructures;
use \SRC\Helpers\UrlHelper;

/**
 * Router class
 */
class MainController
{
    private $_urlHelper;

    public function __construct()
    {
        $this->_urlHelper = new UrlHelper();

        require VFP . "head.php";
        require VFP . "navbar.php";

        $req = $this->_urlHelper->getRequest();

        switch ($this->_urlHelper->getURI()) {
            case '/':
                new ControllerStructure($req);
                break;
            case '/secteurs' . $req:
                new ControllerSecteur($req);
                break;
            case '/structures' . $req:
                new ControllerStructure($req);
                break;
            case '/secteurs_structures' . $req:
                new ControllerSecteursStructures($req);
                break;
            default:
                require VF . 'partials/404.php';
                break;
        }

        \SRC\reset_globs();
        require VFP . "footer.php";
    }
}
