<?php

namespace Emeka\Candy\Model;

use PDO;
use Emeka\Candy\Contracts\JsonConverter;
use Emeka\Candy\Database\Connections\Connect;

class FindEntity implements JsonConverter
{

    public static function find ( $id, $table, $connection = null )
    {
        $sql    = "SELECT * FROM $table WHERE id = $id";
        
        if ( is_null($connection) ) 
        {
            $connection = Connect::getDataInstance();
        }

        $result  =  $connection->prepare($sql);
        $result->execute();
        return self::toJson($result->fetchAll(PDO::FETCH_ASSOC));
    }

    

    public static function toJson ( $object )
    {
        return json_encode ( $object );
    }
}