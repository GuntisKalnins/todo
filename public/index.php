<?php
session_start();
require_once "../config/cfg.php";
require_once "../src/classes/View.php";
require_once "../src/classes/Model.php";
require_once "../src/classes/Controller.php";

//model->view controller->model
$view = new View(); 
$model = new Model($config, $view);
$controller = new Controller($model);
$controller->route();

