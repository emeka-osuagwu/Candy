<?php

namespace Emeka\Potato\Model;

use PDO;
use Emeka\Potato\Model\All;
use Emeka\Potato\Model\Save;
use Emeka\Potato\Model\Find;
use Emeka\Potato\Model\Where;
use Emeka\Potato\Model\Delete;
use Emeka\Potato\Model\Create;

use Emeka\Fetcher\Base;
use Emeka\Potato\Base\Inflect;
use Emeka\Potato\Base\Splitter;
use Emeka\Potato\Base\BaseClass;
use Emeka\Potato\Database\Connections\Connect;

abstract class BaseModel
{
    private static
    $save,
    $find,
    $where,
    $delete,
    $inflect,
    $classname,
    $tableName,
    $properties = [],
    $primaryKey = 'id';

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  string $key
     *
     * @return mixed
    */
    public function __get($key)
    {
        self::$properties[$key];
    }

    /**
     * Dynamically set attributes on the model.
     *
     * @param  string $key
     * @param  mixed $value
     *
     * @return void
    */
    public  function __set ( $property, $value )
    {
       self::$properties[$property] = $value;
    }


    /**
     * Get the Short Class Name of the current class.
     *
     * @return string
    */
    public static function getClassName()
    {
        $class = get_called_class();
        $class = explode("\\", $class);
        return end($class);
    }

    /**
     * Get the name of the table in the database that is tied to this model.
     *
     * @return string
    */
    public static function getTableName()
    {
        $splitter = new Splitter(self::getClassName());
        $tableName = $splitter->format();
        $tableName = Inflect::pluralize($tableName);
        return $tableName;
    }

    public static function exists ()
    {
        if ( isset(self::$properties['id']) && is_numeric(self::$properties['id'] ) ) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Fetch all record from the database 
     *
     * @return array
    */
    public static function all()
    {
        return All::all( self::getTableName() );
    }


    /**
     * Find a particular record from the database 
     * @return array
    */
    public static function find ( $id )
    {
        return Find::find( $id, self::getTableName() );
    }

    /**
     * Find a particular record from the database 
     * @return array
    */
    public static function where ( $column, $value )
    {
        return Where::where( $column, $value, self::getTableName() );
    }

    /**
     * Find a particular record from the database 
     * @return array
    */
    public static function delete ( $id )
    {
        return Delete::delete( $id, self::getTableName() );
    }

    /**
     * Find a particular record from the database 
     * @return array
    */
    public static function save ()
    {
        if (  ! self::exists() ) 
        {
           return  Save::executeInsertQuery( self::$properties, self::getTableName(), 'id');
        }
        else
        {
           return  Save::executeUpdateQuery( self::$properties, self::getTableName(), 'id');
        }
    }










    
}
