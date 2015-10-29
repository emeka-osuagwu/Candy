<?php

namespace Emeka\Candy\Model;

use PDO;
use Emeka\Candy\Contracts\JsonConverter;
use Emeka\Candy\Database\Connections\Connect;

class WhereEntity extends Connect implements JsonConverter
{
    public static function where ( $column, $value, $table )
    {
        $sql    = "SELECT * FROM $table WHERE $column = '$value'";
        $query  =  self::getDataInstance();
        $result = $query->prepare($sql);
        
        $result->execute();
        
        return self::toJson($result->fetchAll(PDO::FETCH_ASSOC));
    }

    public static function toJson ( $object )
    {
        return json_encode ( $object );
    }


}