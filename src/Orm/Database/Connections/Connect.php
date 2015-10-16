<?php

namespace Emeka\Potato\Database\Connections;

use PDO;
use Dotenv\Dotenv;
use Emeka\Potato\Database\Connections\Driver;

/**
*
*/
class Connect 
{
    protected $getDriver;
    protected $db_connection;

    public function __construct ()
    {
        $dotenv = new Dotenv($_SERVER['DOCUMENT_ROOT']);
        $dotenv->load();
        $this->db_host      = getenv('db_host');
        $this->db_name      = getenv('db_name');
        $this->db_user      = getenv('db_user');
        $this->database     = getenv('database');
        $this->db_password  = getenv('db_password');
    }

    public function connect()
    {
        $db_user        =  $this->db_user;
        $db_host        =  $this->db_host;
        $db_name        =  $this->db_name;
        $database       =  $this->database;
        $db_password    =  $this->db_password;

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
