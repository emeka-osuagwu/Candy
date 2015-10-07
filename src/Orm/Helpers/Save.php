<?php

namespace Emeka\Potato\Helpers;

use Emeka\Potato\Model\Car;
use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Database\Connections\Connect;

class Save extends Connect
{

    protected
    $car;

    public function save ( $table )
    {
        $car = new Car;
        $query ="INSERT INTO $table ( name, role, age )
        VALUES( 'Emeka', 'Developer', '20' )";
        return $query;
        // return $this->fetchData( $query );
        // return $car->fillable();
    }


}
