<?php

namespace Emeka\Potato\Helpers;
use PDO;
use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Database\Connections\Connect;

class Find
{
    public function connect()
    {
        $connection = new Connect;
        return $connection = $connection->connect();
    }

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
            $result = $statement->fetch(PDO::FETCH_LAZY);
        }
        $class->id = $result['id'];
        $class->name = $result['name'];
        echo json_encode($class);
    }
}
