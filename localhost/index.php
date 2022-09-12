<?php
session_start();
use App\Services\App;
require_once __DIR__ .  "\\vendor\\autoload.php";
App::stat();
require_once __DIR__ .  "\\router\\routes.php";


?>