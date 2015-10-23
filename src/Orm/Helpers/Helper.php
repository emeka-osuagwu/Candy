<?php

namespace Emeka\Potato\Helpers;

use PDO;
use Emeka\Potato\Helpers\Get;
use Emeka\Potato\Base\Inflect;
use Emeka\Potato\Helpers\Save;
use Emeka\Potato\Helpers\Find;
use Emeka\Potato\Helpers\Where;
use Emeka\Potato\Helpers\Create;
use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Helpers\Delete;
use Emeka\Potato\Database\Connections\Connect;

abstract class Model
{
    private
    $get,
    $save,
    $find,
    $where,
    $delete,
    $inflect,
    $classname,
    $tableName,
    $properties = [],
    $primaryKey = 'id';

    public function __construct()
    {
        $this->get          = new Get;
        $this->save         = new Save;
        $this->find         = new Find;
        $this->where        = new Where;
        $this->delete       = new Delete;
        $this->inflect      = new Inflect;
        $this->classname    = $this->getClassName();
    }

    /*
    |
    */
    public function __get ( $property )
    {
        return $this->properties[$property];
    }

    /*
    |
    */
    public function __set ( $property, $value )
    {
       $this->properties[$property] = $value;
    }


    /*
    | getClass returns class called
    | return string
    | accepts no parameter
    */
    public static function getClass()
    {
        return get_called_class();
    }

    /*
    | getClassName returns class name in singular form
    | return string
    | accepts class class
    */
    public function getClassName()
    {
        return substr(strrchr(static::getClass(), '\\'), 1);
    }

    /*
    | tabalName returns pluralized form of the class name
    | return string
    | accepts classname
    */
    public function tableName()
    {
       return $this->inflect->pluralize($this->classname);
    }

    /*
    | getAll returns result from Get class
    | return Array
    | accepts tableName from method tableName()
    */
    public function getAll ()
    {
        return $this->get->getAll($this->tableName());
    }

    public function find ( $id )
    {
        return $this->find->find( $this->tableName(), $id, $this->properties );
    }

    public  function where ( $columnName, $value )
    {
        return $this->where->where( strtolower($this->tableName()), $columnName, $value);
    }

    public function delete ( $id )
    {
        return $this->delete->delete( $id, strtolower($this->tableName()) );
    }

    public function exists()
    {
        if(isset($this->properties) && isset($this->properties[$this->primaryKey]) && is_numeric($this->properties[$this->primaryKey])) 
        {
            return true;
        } 
        else
        {
            return false;
        }
    }

    public function save ()
    {
        if( $this->exists() ) 
        {
            return $this->save->executeUpdateQuery( $this->properties, $this->tableName(), $this->primaryKey );
        } 
        else
        {
            return $this->save->executeInsertQuery( $this->properties, $this->tableName(), $this->primaryKey );
        }
    } 
}
