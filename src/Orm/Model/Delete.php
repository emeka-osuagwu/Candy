<?php

namespace Emeka\Potato\Model;

use PDO;
use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Database\Connections\Connect;

class Delete extends Connect
{
    public static function delete ( $id, $table )
    {
        $rowCount = 0;
        $sql = "DELETE FROM $table WHERE id = $id";
        $query =  self::getDataInstance();
        $query = $query->prepare($sql);
        $query->execute();
        if ( ! $query->execute() ) 
        {
            return false;
        }
        return true;
    }
}
