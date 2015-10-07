<?php

namespace Emeka\Potato\Helpers;

use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Database\Connections\Connect;

class Save
{

    public function __construct ( $name, $tableName)
    {
        $this->name = $name;
        $this->tableName = $tableName;
    }

    public function save( $name )
    {
        return $name;
    }



}
