<?php

namespace Emeka\Potato\Database\Connections;

use Dotenv\Dotenv;

class Setup
{
    public $db_host;
    public $db_name;
    public $db_user;
    public $database;
    public $db_password;

    public function __construct ()
    {
        $this->db_name = $this->db_name();
        $this->db_user = $this->db_user();
        $this->db_host = $this->db_host();
        $this->database = $this->database();
        $this->db_password = $this->db_password();
    }

    protected function getAccess()
    {
        $dotenv = new Dotenv(__DIR__ . "/../../../../" );
        return $dotenv->load();
    }

    public function db_name()
    {
        $this->getAccess();
        return getenv('db_name');
    }

    public function db_user()
    {
        $this->getAccess();
        return getenv('db_user');
    }

    public function db_password()
    {
        $this->getAccess();
        return getenv('db_password');
    }

    public function db_host()
    {
        $this->getAccess();
        return getenv('db_host');
    }

    public function database()
    {
        $this->getAccess();
        return getenv('database');
    }
}






