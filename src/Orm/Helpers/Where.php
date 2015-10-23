<?php

namespace Emeka\Potato\Helpers;

use PDO;
use Emeka\Potato\Database\Connections\Connect;
use Emeka\Base\Exceptions\ModelNotFoundException;

class Where
{
    public function connect()
    {
        $connection = new Connect;
        return $connection = $connection->connect();
    }

    public function where( $table, $columnName, $value )
    {
       try 
       {
            $connection = $this->connect();
            $sql = "SELECT * FROM " . $table . " WHERE " . $columnName . " = ?";
            $result = $connection->prepare($sql);
            $result->execute([$value]);
            $objects = $result->fetchAll(PDO::FETCH_ASSOC);

            if($objects == null) 
            {
                throw new ModelNotFoundException('The Model is not found');
            }

            if(count($objects) == 1) 
            {
                return json_encode($objects[0]);
            } 
            else
            {
                return json_encode($objects);
            }    
       } 
       catch (ModelNotFoundException $e) 
       {
           return $e->getMessage();
       }
    }
}
