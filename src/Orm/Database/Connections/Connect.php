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

    protected static
    $db_host,
    $db_name,
    $db_user,
    $database,
    $db_password;

    public function __construct ()
    {
        $dotenv             = new Dotenv($_SERVER['DOCUMENT_ROOT']);
        $dotenv->load();
        self::$db_host      = getenv('db_host');
        self::$db_name      = getenv('db_name');
        self::$db_user      = getenv('db_user');
        self::$database     = getenv('database');
        self::$db_password  = getenv('db_password');
    }

    protected static function connect()
    {
        $db_user        =  self::$db_user;
        $db_host        =  self::$db_host;
        $db_name        =  self::$db_name;
        $database       =  self::$database;
        $db_password    =  self::$db_password;
        
        $db_connection  = new PDO
        (
            $database .
            ":host = $db_host;
            dbname=" . $db_name,
            $db_user,
            $db_password
        );
        
        return $db_connection;
    }

    protected static function fetchData ( $query )
    {
        $db_connection = $this->connect();

        if ( ! $db_connection )
        {
            echo "Error : Unable to open database\n";
        }

        $data = $db_connection->prepare($query);
        $data->execute();
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }
}
