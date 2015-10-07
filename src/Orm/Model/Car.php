<?php

namespace Emeka\Potato\Model;

use Emeka\Potato\Helpers\Emeka;

class Car extends Emeka
{

    public
    $name,
    $price,
    $amount;   // public function save ( $t   // public function save ( $table )
    // {
    //     $car = new Car;
    //     $query ="INSERT INTO $table ( name, role, age )
    //     VALUES( 'Emeka', 'Developer', '20' )";
    //     return $query;
    //     return $this->fetchData( $query );
    //     return $car->fillable();
    // }able )
    // {
    //     $car = new Car;
    //     $query ="INSERT INTO $table ( name, role, age )
    //     VALUES( 'Emeka', 'Developer', '20' )";
    //     return $query;
    //     return $this->fetchData( $query );
    //     return $car->fillable();
    // }

    public function fillable ()
    {
        $fillable =
        [
            'name'  =>  $this->name,
            'price' =>  $this->price,
            'amount' =>  $this->amount,
        ];
        return $fillable;
    }





}
