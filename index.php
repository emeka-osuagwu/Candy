<?php

ERROR_REPORTING(E_ALL);
ini_set('display_errors', 1);
include "vendor/autoload.php";

use Emeka\Candy\Test\User;
use Emeka\Candy\Model\BaseModel;

$user = new User;
//echo $user::all();
//echo $user::find(1000);
echo $user::where("username", "emeka");
//var_dump($user::delete(1));


// $user->id = 13;
// $user->username = "emeka osuagwu";
// $user->password = "pass";
// var_dump($user = User::save());





//var_dump($connect::databaseDriver());
// var_dump($connect::connect());
// var_dump($connect::$db_name);
// var_dump($connect::$db_user);
// var_dump($connect::$database);
// var_dump($connect::$db_password);
// var_dump($connect::connect());

// $user->id = 3;
// $user->username = "ben";
// $user->password = "pass";
// $user->token = 3;
// var_dump($user = User::save());



// $splitter = new Splitter('UserName');
// json_encode($splitter->split());
// json_encode($splitter->toLower());
// echo json_encode($splitter->format());
