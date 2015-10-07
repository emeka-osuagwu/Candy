<?php

namespace Emeka\Potato\Database\Migrations;

use PDO;
use Emeka\Potato\Database\Migrations;
use Emeka\Potato\Database\Connections\Connect;

class CreateItemTable extends Connect
{

    // public function setUpTable()
    // {
    //     $db = $this->connect();
    //     $table = "users";
    //     try
    //     {
    //         $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    //         $sql ="CREATE table $table
    //         (
    //             ID              SERIAL PRIMARY KEY      NOT NULL,
    //             NAME            VARCHAR ( 50 )          NOT NULL,
    //             ROLE            VARCHAR ( 50 )          NOT NULL,
    //             AGE             VARCHAR ( 50 )          NOT NULL
    //         );";

    //         $db->exec($sql);
    //         echo " =>>>>>>>>>>>>>>>>>>>> Table " . $table . " Successfull Create <<<<<<<<<<<<<<<<<<<<=";
    //     }

    //     catch(PDOException $e)
    //     {
    //         echo $e->getMessage('');
    //     }
    // }


    public function setUpTable()
    {
        $db = $this->connect();
        $table = "cars";
        try
        {
            $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $sql ="CREATE table $table
            (
                ID              SERIAL PRIMARY KEY      NOT NULL,
                NAME            VARCHAR ( 50 )          NOT NULL,
                AMMOUNT         VARCHAR ( 50 )          NOT NULL,
                PRICE           VARCHAR ( 50 )          NOT NULL
            );";

            $db->exec($sql);
            echo " =>>>>>>>>>>>>>>>>>>>> Table " . $table . " Successfull Create <<<<<<<<<<<<<<<<<<<<=";
        }

        catch(PDOException $e)
        {
            echo $e->getMessage('');
        }
    }




    public function PullDown ()
    {

    }



}