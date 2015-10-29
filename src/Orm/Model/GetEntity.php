<?php

namespace Emeka\Candy\Model;

use PDO;
use Emeka\Candy\Contracts\JsonConverter;
use Emeka\Candy\Database\Connections\Connect;

class GetEntity extends Connect implements JsonConverter
{

    public static function all ( $table )
    {
        $sql    = "SELECT * FROM $table";
        $query  = self::getDataInstance();
    	$result = $query->prepare($sql);
        
    	$result->execute();
    	
        return self::toJson($result->fetchAll(PDO::FETCH_ASSOC));
    }

    protected static function toJson ( $object )
    {
    	return json_encode ( $object );
    }
}




