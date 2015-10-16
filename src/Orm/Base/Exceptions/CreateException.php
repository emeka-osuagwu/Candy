<?php

namespace Emeka\Base\Exceptions;

use Exception;

class CreateException extends Exception
{
    public function unSetVariable()
    {
        return ' Some Variable not set';
    }

    public function isNotArray()
    {
        return 'Aceept only array';
    }
}
