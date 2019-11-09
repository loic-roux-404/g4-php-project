<?php

namespace SRC\Helpers\Types;

/**
 * Special type
 */
class IntNull
{
    public function __construct($v = null)
    {
        return  gettype($v) === null || gettype($v) === Number ?? $v;
    }
}
