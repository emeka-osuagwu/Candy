<?php

namespace Emeka\Potato\Helpers;
use PDO;
use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Database\Connections\Connect;

class Get extends Connect
{

    /*
    | getAll select result from
    */
    public function getAll( $table )
    {
        $query = "SELECT * FROM $table";
        return $this->fetchData( $query );
    }
}
