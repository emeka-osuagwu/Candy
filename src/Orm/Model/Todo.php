<?php

namespace Emeka\Potato\Model;

use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Database\Connections\Connect;

class Todo extends Connect
{

    /*
    | getTodoList select table from database
    | accepts one arameter
    | return's an array
    */
    public function getTodoList( $table )
    {
        $query = "SELECT * FROM $table";
        return $this->fetchData( $query );
    }

    public function createTodo()
    {
            $query ="INSERT INTO USERS ( name, role, age )
            VALUES( 'Emeka', 'Developer', '20' )";
            return $this->fetchData( $query );
    }

    public function createBicycle()
    {
            $query ="INSERT INTO cars ( name, ammount, price)
            VALUES('title', '200', '$200')";
            return $this->fetchData( $query );
    }


    // public function createTodo( array $values_to_be_inserted )
    //  {
    //     list( $id, $title, $message, $created_at, $updated_at ) = $values_to_be_inserted;
    //     $query ="INSERT INTO ITEM ( id, title, message, created_at, updated_at)
    //     VALUES( $id, $title, $message, $created_at, $updated_at )";
    //     return $this->FetchData( $query );
    // }
}
