<?php

namespace Emeka\Candy\Model;

use PDO;
use Emeka\Candy\Database\Connections\Connect;

class DeleteEntity extends Connect
{
    public static function delete ( $id, $table )
    {
        $rowCount = 0;
        $sql    = "DELETE FROM $table WHERE id = $id";
        $query  =  self::getDataInstance();
        $query  = $query->prepare($sql);
        
        $query->execute();
        
        if ( ! $query->execute() ) 
        {
            return false;
        }
        
        return true;
    }
}
