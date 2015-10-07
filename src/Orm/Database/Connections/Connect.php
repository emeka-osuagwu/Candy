<?php

namespace Emeka\Potato\Database\Connections;

use PDO;
use Emeka\Potato\Database\Connections\Driver;

/**
*
*/
class Connect extends Driver
{
    protected $getDriver;

    protected $db_connection;

    protected function getDriver()
    {
        return $this->useDriver();
    }

    public function connect()
    {
        $db_host        =  $this->getDriver()["db_host"];
        $db_name        =  $this->getDriver()["db_name"];
        $db_user        =  $this->getDriver()["db_user"];
        $database       =  $this->getDriver()["database"];
        $db_password    =  $this->getDriver()["db_password"];

        $db_connection = new PDO
        (
            $database .
            ":host = $db_host;
            dbname=" . $db_name,
            $db_user,
            $db_password
        );

        return $db_connection;
    }

    protected function fetchData ( $query )
    {
        $db_connection = $this->connect();

        if ( ! $db_connection )
        {
            echo "Error : Unable to open database\n";
        }

        $data = $db_connection->prepare($query);
        $data->execute();
        return $data->fetchAll();
    }
}
