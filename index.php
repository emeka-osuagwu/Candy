<?php

ERROR_REPORTING(E_ALL);
ini_set('display_errors', 1);
include "vendor/autoload.php";

use Emeka\Candy\Test\User;
use Emeka\Candy\Helpers\Save;
use Emeka\Candy\Model\Create;
use Emeka\Candy\BaseModel\Get;
use Emeka\Candy\Helpers\Insert;
use Emeka\Candy\Model\BaseModel;

use Emeka\Candy\Database\Connections\Setup;
use Emeka\Candy\Database\Connections\Driver;
use Emeka\Candy\Database\Connections\Connect;
use Emeka\Candy\Database\Migrations\CreateItemTable;

use Emeka\Candy\Base\Splitter;

$connect = new Connect;
// var_dump($connect::databaseDriver());
// var_dump($connect::connect());
// var_dump($connect::$db_name);
// var_dump($connect::$db_user);
// var_dump($connect::$database);
// var_dump($connect::$db_password);
// var_dump($connect::connect());



$user = new User;
echo $user::all();
//echo $user::find(1);
//echo $user::where("username", "ben");
//var_dump($user::delete(10));

// $user->id = 3;
// $user->username = "ben";
// $user->password = "pass";
// $user->token = 3;
// var_dump($user = User::save());



// $splitter = new Splitter('UserName');
// json_encode($splitter->split());
// json_encode($splitter->toLower());
// echo json_encode($splitter->format());
