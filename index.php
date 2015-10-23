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



$connect = new Connect;
var_dump($connect::connect());



