<?php

namespace Emeka\Potato\Helpers;
use PDO;
use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Database\Connections\Connect;

class Find extends Connect
{
    public function find( $table, $id, $properties )
    {


        $result = null;
        $connection = null;
        $class = new static;
        $connection = $this->connect();

        $statement = $connection->prepare("SELECT * FROM {$table} WHERE id = ?");
        if ( $statement )
        {
            $statement->bindParam(1, $id);
            $statement->execute();
            $result   =  $statement->fetch(PDO::FETCH_ASSOC);
        }

        $class->id = $result['id'];
        $class->name = $result['name'];
        return $class;


        //return $table ."". $id;
        // $query = 'SELECT * FROM ' . $table . ' WHERE id = ' .$id ;
        // $connection = $this->connect();
        // $result = $connection->prepare($query);
        // $result->execute();
        //return $result->fetch(PDO::FETCH_ASSOC);
        //return $properties;
    }
}
