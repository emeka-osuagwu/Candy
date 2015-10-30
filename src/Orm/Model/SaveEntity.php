<?php

namespace Emeka\Candy\Model;

use PDO;
use Emeka\Candy\Database\Connections\Connect;

class SaveEntity extends Connect
{

    public static function executeInsertQuery ( $properties, $table, $primaryKey, $connection = null)
    {
        $total_properties_count = count($properties);
        $x = 0;

        $sql = "INSERT INTO " . $table . " (";
        $sqlSetColumns = "";
        $sqlSetValues = "";

        foreach($properties as $key => $value){
            $x++;
            if($key == $primaryKey) 
            {
                continue;
            }
            
            $sqlSetColumns  .= $key;
            $sqlSetValues   .= ":" . $key;
            if($x != $total_properties_count) 
            {
                $sqlSetColumns .= ", ";
                $sqlSetValues .= ", ";
            }
        }

        $sql .= $sqlSetColumns . " ) VALUES ( " . $sqlSetValues . " )";

        try 
        {
            
            if ( is_null($connection) ) 
            {
                $connection = Connect::getDataInstance();
            }

            
            $result = $connection->prepare($sql);
            foreach($properties as $key => $value)
            {
              $result->bindValue(':' . $key, $value);
            }
            return $result->execute();
        } 
        catch(PDOException $e) 
        {
            return $e->getMessage();
        }
    }

    public static function executeUpdateQuery ( $properties, $table, $primaryKey, $connection = null)
    {
        try 
        {     
            if ( is_null($connection) ) 
            {
                $connection = Connect::getDataInstance();
            }

            $count     =  0;
            $sql       =  "UPDATE ".$table." SET ";

            foreach ($properties as $key => $value) 
            {
                $count++;
                if ($key == 'id') 
                {
                 continue;
                }
                
                $sql .= "$key = ?";
                if ($count < count($properties)) 
                {
                 $sql .= ", ";
                }
            }
            
            $sql .= " WHERE " .$primaryKey ." = ?";
            $statement = $connection->prepare($sql);
            $indexCount = 0;
            
            foreach ($properties as $key => $value) 
            {
                if ($key === 'id') 
                {
                 continue;
                }
                ++$indexCount;
                $statement->bindValue($indexCount, $value);
            }
            
            $statement->bindValue(++$indexCount, $properties['id']);
            $result = $statement->execute();
        } 
        catch (PDOException $e) 
        {
            return $e->getMessage();
        }

        return $result;
    }

}
