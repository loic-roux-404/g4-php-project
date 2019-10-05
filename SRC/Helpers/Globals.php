<?php

namespace SRC\Helpers;

use SRC\Helpers\Alert;

class Globals extends Alert
{

    public function __construct()
    {
        parent::__construct($this);
    }
    /**
     * Cookie Creation function
     * @param [type] $nom
     * @param [string|array] $payload
     */
    public function createC(string $nom, $payload)
    {
        $c1 = setcookie(
            $nom,
            is_array($payload) ? json_encode(serialize($payload)) : $payload,
            time() + (30 * 24 * 3600),
            "/",
            "localhost",
            false,
            false
        );
        if ($c1) {
            echo "<script defer type='text/javascript'> console.log('Cookie " . $nom . " déposé correctement')<script/>";
        } else {
            echo "<script defer type='text/javascript'> console.log('Cookie non déposé')<script/>";
        }
    }

    /**
     * Getter Session 
     * @param [string] $nom
     * @return array|string
     */
    public function getS(string $nom)
    {
        if (isset($_SESSION[$nom])) {
            if ($this->isJson($_SESSION[$nom])) {
                return json_decode($_SESSION[$nom], true);
            } else {
                return $_SESSION[$nom];
            };
        }
    }

    /**
     * Setter Session
     * @param string $nom
     * @param [array|string] $payload
     */
    public function setS(string $nom, $payload)
    {
        if (is_array($payload)) {
            $_SESSION[$nom] = json_encode($payload);
        } else {
            $_SESSION[$nom] = $payload;
        }
    }

    /**
     * Getter Cookie
     * @param [string] $nom
     * @return array|string
     */
    public function getC($nom)
    {
        if (isset($_COOKIE[$nom])) {
            if ($this->isJson($_COOKIE[$nom])) {
                return json_decode($_COOKIE[$nom], true);
            } else {
                return $_COOKIE[$nom];
            };
        }
    }

    /**
     * Setter Existing Cookie
     * @param string $nom
     * @param [array|string] $payload
     */

    public function setC($nom, $payload)
    {
        if (is_array($payload)) {
            $_COOKIE[$nom] = json_encode($payload);
        } else {
            $_COOKIE[$nom] = $payload;
        }
    }

    public function isJson($string)
    {
        json_decode($string, true);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public function setUpdated($id)
    {
        $this->setS('updated', $id);
    }

    public function getUpdated()
    {
        return (int) $this->getS('updated');
    }
}
