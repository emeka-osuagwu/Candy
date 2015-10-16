<?php

ERROR_REPORTING(E_ALL);
ini_set('display_errors', 1);
include "vendor/autoload.php";

use Emeka\Potato\Model\Car;
use Emeka\Potato\Model\Todo;
use Emeka\Potato\Model\User;
use Emeka\Potato\Model\Bicycle;


use Emeka\Potato\Helpers\Get;
use Emeka\Potato\Model\Create;
use Emeka\Potato\Helpers\Save;
use Emeka\Potato\Helpers\Model;
use Emeka\Potato\Helpers\Insert;

use Emeka\Potato\Database\Connections\Setup;
use Emeka\Potato\Database\Connections\Driver;
use Emeka\Potato\Database\Connections\Connect;
use Emeka\Potato\Database\Migrations\CreateItemTable;













// $car = new Car;
// $car->name = "emeka";
// $car->ammount = "emwdsj";
// $car->price = "emefkjerfearhjwdsj";
// var_dump($car->save());


//$user = new User;
//var_dump($user->getAll());
//var_dump(gettype($user->getAll()));
// $user->name = "csldcdfvddf";
// $user->age = "csldcdfvddf";

// $user = new User;
// $user->getAll();


// $user = new Car;
// var_dump($user->delete(2));
















// $info = [
//     "name" => "bobo",
//     "role"   => "developer",
//     "age"   => '10'
// ];


// $user = new User;
// var_dump($user->getAll());
// echo $user->tabelName();

// $car = new Bicycle;
// var_dump($car->getAll());
// echo $car->tableName();






// $save = new Save ( $info, $info );
// var_dump($save->save( $info ));
// $save->name = "fscdsfdsf";

// $get = new Get ( $info );
// var_dump($get->getAll( $info ));

$connect = new Connect;
var_dump($connect->connect());
// list($a, list($b, $c)) = array(1, array(2, 3));
// var_dump($a, $b, $c);

// $setup = new Setup;
// var_dump($setup->db_name);


// $driver = new Driver;
// var_dump($driver->useDriver());


// $todo = new Todo;
// var_dump($todo->createTodo());


// $todo = new Todo;
// var_dump($todo->createBicycle());

// $create = new CreateItemTable;
// $create->setUpTable();













//$params = parse_ini_file(sprintf('%s/parameters.ini', __DIR__), true);