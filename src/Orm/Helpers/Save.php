<?php

namespace Emeka\Potato\Helpers;

use Emeka\Potato\Database\Connections\Connect;
use Emeka\Base\Exceptions\ModelNotFoundException;

class Save
{

    public function connect()
    {
        $connection = new Connect;
        return $connection = $connection->connect();
    }
    
    public function executeInsertQuery ( $properties, $table, $primaryKey )
    {
        $total_properties_count = count($properties);
        $x = 0;

        $sql = "INSERT INTO " . $table . " (";
        $sqlSetColumns = "";
        $sqlSetValues = "";
        foreach($properties as $key => $value){
            $x++;
            if($key == $primaryKey) {
                continue;
            }
            $sqlSetColumns .= $key;
            $sqlSetValues .= ":" . $key;
            if($x != $total_properties_count) {
                $sqlSetColumns .= ", ";
                $sqlSetValues .= ", ";
            }
        }

        $sql .= $sqlSetColumns . " ) VALUES ( " . $sqlSetValues . " )";

        try 
        {
            $connection = $this->connect();
            $stmt = $connection->prepare($sql);
            foreach($properties as $key => $value)
            {
                $stmt->bindValue(':' . $key, $value);
            }
            return $stmt->execute();
        } 
        catch(PDOException $e) 
        {
            return $e->getMessage();
        }
    }

    public function executeUpdateQuery ( $properties, $table, $primaryKey )
    {
        $total_properties_count = count($properties);
        $x = 0;
        $sql = "UPDATE " . $table . " SET ";
        $sqlSetColumns = "";
        $valueArray = [];

        foreach($properties as $key => $value){
            $x++;
            if($key == $primaryKey) {
                $valueArray[":" . $key] = $value;
                continue;
            }

            if(isset($value)) 
            {
                $sqlSetColumns .= $key . " = :" . $key;
                $valueArray[":" . $key] = $value;
            }

            if($x != $total_properties_count) 
            {
                if(isset($value)) 
                {
                    $sqlSetColumns .= ", ";
                }
            }
        }

        $sql .= $sqlSetColumns . " WHERE " . $primaryKey . " = :" . $primaryKey;

        try 
        {
            $connection = $this->connect();
            $update = $connection->prepare($sql);
            $update = $update->execute($valueArray);
            if ( $update == false ) 
            {
                throw new ModelNotFoundException('The Model is not found');
            }
            return $update;
        } 
        catch(ModelNotFoundException $e) 
        {
            return $e->getMessage();
        }
    }
}
