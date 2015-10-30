<?php

namespace Emeka\Candy\Model;

use PDO;
use Emeka\Candy\Contracts\JsonConverter;
use Emeka\Candy\Database\Connections\Connect;

class GetEntity implements JsonConverter
{
    public static function all ( $table, $connection = null)
    {
        $sql    = "SELECT * FROM $table";
        
        if ( is_null($connection) ) 
        {
            $connection = Connect::getDataInstance();
        }
        
        $result = $connection->prepare($sql);

        $result->execute();
        
        return self::toJson($result->fetchAll(PDO::FETCH_ASSOC));
    }

    public static function toJson ( $object )
    {
    	return json_encode ( $object );
    }
}
