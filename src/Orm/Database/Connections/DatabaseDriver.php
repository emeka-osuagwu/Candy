<?php

namespace Emeka\Potato\Database\Connections;

use Emeka\Potato\Database\Connections\Setup;

class Driver
{
    public $db_name;
    public $db_user;
    public $database;
    public $driver;
    public $db_host;
    public $db_password;

    public function __construct ()
    {
        $access = new Setup;
        $this->db_name      = $access->db_name;
        $this->db_host      = $access->db_host;
        $this->db_user      = $access->db_user;
        $this->database     = $access->database;
        $this->db_password  = $access->db_password;
        $this->driver       = $this->driver ();
    }

    /*
    | Compile drivers as to array
    | return's driver as an array
    */
    public function driver ()
    {
        $driver =  [
            "db_host"       => $this->db_host,
            "db_name"       => $this->db_name,
            "db_user"       => $this->db_user,
            "database"      => $this->database,
            "db_password"   => $this->db_password
        ];
        return $driver;
    }


    /*
    | return's driver as an array
    */
    public function useDriver ()
    {
        return $this->driver;
    }
}
