<?php

namespace Emeka\Potato\Helpers;

use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Database\Connections\Connect;

class Insert
{



    public function insert ( $table, $properties )
     {

        $sql = "INSERT INTO $table (";
        $insertColumns = "";
        $insertValues = "";
        $count = 0;

        foreach ($properties as $key => $value)
        {
            if($key === 'id')
            {
                continue;
            }
            ++$count;
            $insertColumns .= $key;
            $insertValues .= ":".$key;
            if( $count < count( $properties ) )
            {
                $insertValues .= ", ";
                $insertColumns .= ", ";
            }
        }

        $sql .= $insertColumns .") VALUES(". $insertValues .")";
        $connection = $this->connect();
        $statement = $connection->prepare($sql);

        foreach ($properties as $key => $value)
        {
            $statement->bindValue(":".$key, $value);
        }

        $statement->execute();
        return $sql;
    }

}
